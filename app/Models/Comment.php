<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "text", "create_at", "user_id", "parent_id", "edit_check"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
