<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\CommentStatus;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Comment extends Model
{
    use HasFactory, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'content',
        'email',
        'name',
        'status'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => CommentStatus::class,
        'commentable_id' => 'integer'
    ];


    //--------------------------------------------------------------------------
    // Relationships
    //--------------------------------------------------------------------------
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
