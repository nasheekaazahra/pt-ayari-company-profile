<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [

        'order_id',
        'sender_role',
        'message',
        'is_read',

    ];
}