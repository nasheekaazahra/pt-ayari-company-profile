<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QcMessage extends Model
{
    protected $fillable = [
        'order_id',
        'sender_role',
        'message',
        'is_read',
    ];
}