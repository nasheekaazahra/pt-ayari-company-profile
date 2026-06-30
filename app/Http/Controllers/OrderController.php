<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function rating(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->rating = $request->rating;

        $order->save();

        return back();
    }

    public function tracking($id)
{
    $order = Order::findOrFail($id);

    return view('client.tracking', compact('order'));
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

    $order->remaining_payment =
        $request->price - $request->dp;

    $order->payment_status =
        $request->payment_status;

    $order->save();

    return redirect()
        ->route('admin.orders.show', $id)
        ->with('success', 'Payment Updated Successfully');
}

public function invoice($id)
{
    $order = Order::findOrFail($id);

    return view('admin.invoice', compact('order'));
}
}