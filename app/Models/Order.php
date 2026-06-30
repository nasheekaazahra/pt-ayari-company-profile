<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Order extends Model
{
    protected $fillable = [

    'customer_name',
    'email',
    'phone',
    'address',

    'service_type',
    'product_name',

    'quantity',
    'deadline',

    'notes',
    'design_file',
    'design_status',

    'status',
    'progress',

    'tracking_step',

    'payment_status',
    'price',
    'dp',
    'remaining_payment',

    'courier',
    'tracking_number',
    'shipping_date',

    'qc_notes',
    'qc_photo',

    'logo_alignment',
    'color_accuracy',
    'printing_quality',
    'packaging_quality',

    'client_revision_notes',
    'client_revision_file',

];

public function messages()
{
    return $this->hasMany(Message::class);
}
}
