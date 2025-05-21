<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\User;
use App\Mail\NewCommentNotification;
use App\Mail\CommentReplyNotification;
use App\Enums\CommentStatus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        try {
            $this->sendAdminNotification($comment);

            // if default status is 'approved', send email when replying
            if ($comment->status === CommentStatus::Approved && $comment->parent_id) {
                $this->sendReplyNotification($comment);
            }

        } catch (\Exception $e) {
            Log::error('Error in CommentObserver created method for comment ID: ' . $comment->id . '. Error: ' . $e->getMessage());

        }
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        // Check if the status was changed to 'approved' and it's a reply
        if ($comment->isDirty('status') && $comment->status === CommentStatus::Approved && $comment->parent_id) {
            $this->sendReplyNotification($comment);
        }
    }

    /**
     * Send email notification to all admin users.
     */
    private function sendAdminNotification(Comment $comment): void
    {
        try {
            $adminUsers = User::role(['admin', 'super_admin'])->get();

            if ($adminUsers->isEmpty()) {
                Log::warning('No admin users found to send new comment notification for comment ID: ' . $comment->id);
                return;
            }

            foreach ($adminUsers as $admin) {
                Mail::to($admin->email)->send(new NewCommentNotification($comment));
            }
        } catch (\Exception $e) {
            Log::error('Failed to send admin new comment notification for comment ID: ' . $comment->id . '. Error: ' . $e->getMessage());
        }
    }

    /**
     * Send email notification to the parent comment author if it's a reply.
     */
    private function sendReplyNotification(Comment $comment): void
    {
        if (!$comment->parent_id) {
            return;
        }

        try {
            $parentComment = $comment->parent; // Eloquent relationship

            if ($parentComment && !empty($parentComment->email)) {
                Mail::to($parentComment->email)->send(new CommentReplyNotification($comment, $parentComment));
                // Log::info('Comment reply notification sent to ' . $parentComment->email . ' for reply ID: ' . $comment->id);
            } elseif ($parentComment && empty($parentComment->email)) {
                // Log::info('Parent comment (ID: ' . $parentComment->id . ') for reply (ID: ' . $comment->id . ') does not have an email address. No notification sent.');
            } elseif (!$parentComment) {
                // Log::warning('Parent comment not found for reply ID: ' . $comment->id . '. No notification sent.');
            }
        } catch (\Exception $e) {
            Log::error('Failed to send comment reply notification for reply ID: ' . $comment->id . '. Error: ' . $e->getMessage());
        }
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}