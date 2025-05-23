<?php

namespace App\Listeners;

use App\Mail\AdminLoggedInNotification;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminLoginNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Check if the login guard is 'filament' and the user is an instance of App\Models\User
        if ($event->guard === 'filament' && $event->user instanceof User) {
            $adminEmail = config('cms.site_email'); // Uses the email from config/cms.php

            if ($adminEmail) {
                Mail::to($adminEmail)->send(new AdminLoggedInNotification($event->user));
            }
        }
    }
}
