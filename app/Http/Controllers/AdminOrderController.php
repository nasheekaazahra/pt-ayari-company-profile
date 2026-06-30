<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Notification;

class AdminOrderController extends Controller
{
    public function index(Request $request)
{
    Notification::where(
        'title',
        'New Order'
    )->update([
        'is_read' => true
    ]);

    $query = Order::query();

    // SEARCH
    if ($request->filled('search')) {

        $query->where(function ($q) use ($request) {

            $q->where('customer_name', 'like', '%' . $request->search . '%')
              ->orWhere('product_name', 'like', '%' . $request->search . '%')
              ->orWhere('id', 'like', '%' . $request->search . '%');

        });

    }

    // FILTER STATUS TRACKING
    if ($request->filled('status')) {

        $query->where('tracking_step', $request->status);

    }

    $orders = $query->latest()->get();

    return view('admin.orders', compact('orders'));
}


    public function updateTracking(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $step = $request->tracking_step;

    $order->tracking_step = $step;

    $order->progress = match($step){
    1 => 16,
    2 => 33,
    3 => 50,
    4 => 66,
    5 => 83,
    6 => 100,
    default => 0
};

    if($step == 6)
{
    $order->status = 'Approved';
}

    if($step == 1 && !$order->received_at)
        $order->received_at = now();

    if($step == 2 && !$order->design_at)
        $order->design_at = now();

    if($step == 3 && !$order->production_at)
        $order->production_at = now();

    if($step == 4 && !$order->qc_at)
        $order->qc_at = now();

    if($step == 5 && !$order->shipping_at)
        $order->shipping_at = now();

    if($step == 6 && !$order->completed_at)
        $order->completed_at = now();

    $order->save();

    Notification::create([
    'title' => 'Tracking Updated',
    'message' => 'ORD-'.$order->id.
                 ' moved to step '.$request->tracking_step
]);

    return back();
}

public function payment($id)
{
    $order = Order::findOrFail($id);

    return view('admin.payment', compact('order'));
}

public function updatePayment(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $order->price = $request->price;
    $order->dp = $request->dp;
    $order->payment_status = $request->payment_status;

    $order->remaining_payment =
        $request->price - $request->dp;

    $order->save();

    Notification::create([
    'title' => 'Payment Updated',
    'message' => 'Payment for ORD-'.$order->id.
                 ' updated to Rp '.number_format($order->dp,0,',','.')
]);

    return redirect()
        ->route('admin.orders.show', $order->id);
}

public function updateDesign(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $order->design_status =
    $request->design_status;

    $order->save();

    Notification::create([

        'title' => 'Design Status',

        'message' =>
        'ORD-'.$order->id.
        ' design '.$request->design_status

    ]);

    return back();
}

public function show($id)
{
    $order = Order::findOrFail($id);

    return view('admin.order-detail', compact('order'));
}

public function qcShow($id)
{
    $order = Order::findOrFail($id);

    return view(
        'qc.show',
        compact('order')
    );
}
    
}