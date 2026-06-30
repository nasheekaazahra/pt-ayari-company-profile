<?php

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Models\Message;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Models\Notification;
use App\Models\QcMessage;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);

Route::get('/admin/messages', function () {

    Notification::where(
    'title',
    'Client Message'
)->update([
    'is_read' => true
]);

    $orders = Order::latest()->get();

    return view(
        'admin.messages',
        compact('orders')
    );

});

Route::get('/admin/messages/{order}', function ($order) {

    $order = Order::findOrFail($order);

        Message::where(
            'order_id',
            $order->id
        )
        ->where(
            'sender_role',
            'client'
        )
        ->update([
            'is_read' => true
        ]);

    $orders = Order::latest()->get();

    $messages = Message::where(
        'order_id',
        $order->id
    )->oldest()->get();

    return view(
        'admin.messages',
        compact(
            'order',
            'orders',
            'messages'
            
        )
        
    );

});

Route::post('/admin/messages/send', function (Request $request) {

    Message::create([

        'order_id' => $request->order_id,

        'sender_role' => 'admin',

        'message' => $request->message,

        'is_read' => true

    ]);

    Notification::create([

        'title' => 'New Message',

        'message' =>
        'Admin sent message to ORD-'.$request->order_id,
        'is_read' => false

    ]);

    return back();

});

    Route::get('/admin/qc-messages', function () {

    Notification::whereIn(
    'title',
    [
        'QC Message',
        'QC Review',
        'QC Revision',
        'Client Revision'
    ]
)->update([
    'is_read' => true
]);

    $orders = Order::latest()->get();
    return view(
        'admin.qc-messages',
        compact('orders')
    );

});

Route::post('/admin/qc-messages/send', function(Request $request){
    
    QcMessage::create([

        'order_id' => $request->order_id,

        'sender_role' => 'admin',

        'message' => $request->message,

        'is_read' => true

    ]);

    return back();

});

    Route::get('/admin/qc-messages/{order}', function($order){

    $order = Order::findOrFail($order);

    QcMessage::where(
        'order_id',
        $order->id
    )
    ->where(
        'sender_role',
        'qc'
    )
    ->update([
        'is_read' => true
    ]);

    $orders = Order::latest()->get();

    $messages = QcMessage::where(
        'order_id',
        $order->id
    )->oldest()->get();

    return view(
        'admin.qc-messages',
        compact(
            'orders',
            'order',
            'messages'
        )
    );

});

    Route::delete('/admin/orders/{id}', function ($id) {

    Order::findOrFail($id)->delete();

    return redirect('/admin/orders');

    });
    
    Route::put('/admin/orders/{id}', function (Request $request, $id) {

    $order = Order::findOrFail($id);

    $order->update([
        'status' => $request->status
    ]);

    return redirect('/admin/orders');

    });

    Route::post('/admin/orders/{id}/send-revision', function($id){

    $order = Order::findOrFail($id);

    $order->status = 'Waiting Client Revision';

    $order->save();

    return back()->with(
        'success',
        'Revision has been sent to client.'
    );

});

    Route::post('/admin/orders/{id}/revision-approved', function($id){

    $order = Order::findOrFail($id);

    $order->status = 'Production';

    $order->tracking_step = 3;

    $order->save();

    return back();

});

    Route::post('/admin/orders/{id}/send-qc-review', function($id){

    $order = Order::findOrFail($id);

    $order->status = 'QC Review';
    $order->tracking_step = 4;
    $order->save();

    Notification::create([

        'title' => 'QC Review',

        'message' => 'Revision ready for QC on ORD-'.$order->id,

        'is_read' => false

    ]);

    return back();

});

    Route::post('/admin/orders', function (Request $request) {

    $design = null;

if($request->hasFile('design_file'))
{
    $design = $request
        ->file('design_file')
        ->store('designs', 'public');
}
    Order::create([
        'customer_name' => $request->customer_name,
    'email' => $request->email,
    'phone' => $request->phone,
    'address' => $request->address,

    'service_type' => $request->service_type,
    'product_name' => $request->product_name,

    'quantity' => $request->quantity,
    'deadline' => $request->deadline,

    'notes' => $request->notes,

    'design_file' => $design,

    ]);

    return redirect('/admin/orders');

    });

    Route::patch('/admin/orders/{id}/tracking',
    [AdminOrderController::class, 'updateTracking']);


    Route::get('/admin/orders', [AdminOrderController::class, 'index']);

    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])
    ->name('admin.orders.show');

    Route::get(
    '/admin/orders/{id}/payment',
    [AdminOrderController::class, 'payment']
)->name('admin.orders.payment');

    Route::post(
        '/admin/orders/{id}/payment',
        [AdminOrderController::class, 'updatePayment']
    )->name('admin.orders.payment.update');

    Route::get(
    '/admin/orders/{id}/invoice',
    [OrderController::class, 'invoice']
)->name('admin.orders.invoice');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', function () {
        return view('client.dashboard');
    });

    Route::get('/client/orders', function () {

    $orders = Order::latest()->get();

    return view('client.orders', compact('orders'));

    });
    Route::post('/client/rating/{id}', [OrderController::class, 'rating']);

    Route::get('/client/status', function () {

    $orders = Order::latest()->get();

    return view('client.status', compact('orders'));

    });

    Route::get(
    '/client/orders/{id}/invoice',
    [OrderController::class, 'invoice']
)->name('client.orders.invoice');

    Route::get('/client/create-order', function () {

    return view('client.create-order');

    });

    Route::post('/client/order/store', function (Request $request) {

    $design = null;

    if ($request->hasFile('design_file')) {
        $design = $request->file('design_file')
            ->store('designs', 'public');
    }

    Order::create([
        'customer_name' => $request->customer_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,

        'service_type' => $request->service_type,
        'product_name' => $request->product_name,

        'quantity' => $request->quantity,
        'deadline' => $request->deadline,

        'notes' => $request->notes,

        'design_file' => $design,

        'status' => 'Pending',
        'progress' => 0,
        'tracking_step' => 1,
    ]);

    Notification::create([

    'title' => 'New Order',

    'message' =>
        $request->customer_name .
        ' submitted order ' .
        $request->product_name,

'is_read' => false

]);

    return redirect('/client/status');
});

    Route::get('/client/tracking/search', function (Request $request) {

    $order = Order::where(
        'product_name',
        'like',
        '%'.$request->product_name.'%'
    )->latest()->first();

    if (!$order) {

        return back()->with(
            'error',
            'Product not found'
        );

    }

    return redirect('/client/tracking/'.$order->id);

});

Route::get('/client/tracking/{id}', function ($id) {

    $order = Order::findOrFail($id);

    return view('client.tracking', compact('order'));

});

Route::post('/client/orders/{id}/revision', function(Request $request, $id){

    $order = Order::findOrFail($id);

    $file = null;

    if($request->hasFile('client_revision_file'))
    {
        $file = $request
            ->file('client_revision_file')
            ->store('client-revisions', 'public');
    }

    $order->client_revision_notes =
        $request->client_revision_notes;

    $order->client_revision_file =
        $file;

    $order->status =
        'Client Revision Submitted';

    $order->save();

    Notification::create([
        'title' => 'Client Revision',
        'message' => 'Client uploaded revision for ORD-'.$order->id,
        'is_read' => false
    ]);

    return back();
});

Route::get('/client/messages', function () {

    $orders = Order::latest()->get();

    return view(
        'client.messages',
        compact('orders')
    );

});

Route::get('/client/messages/{order}', function ($order) {

    $order = Order::findOrFail($order);

    $orders = Order::latest()->get();

    $messages = Message::where(
    'order_id',
    $order->id
)->oldest()->get();

    return view(
        'client.messages',
        compact(
            'order',
            'messages',
            'orders'
        )
    );

});

Route::post('/client/messages/send', function (Request $request) {

    Message::create([

        'order_id' => $request->order_id,

        'sender_role' => 'client',

        'message' => $request->message,

        'is_read' => false

    ]);

    Notification::create([

    'title' => 'Client Message',

    'message' =>
    'New message on ORD-'.$request->order_id,
    'is_read' => false

]);

    return back();

});
});


Route::middleware(['auth', 'role:qc'])->group(function () {

    Route::get(
        '/qc',
        [AdminController::class, 'qcDashboard']
    );

    Route::get('/qc/orders', function () {

        $orders = Order::latest()->get();

        return view(
            'qc.orders',
            compact('orders')
        );

    });

    Route::get('/qc/orders/{id}', function ($id) {

    $order = Order::findOrFail($id);

    return view(
        'qc.show',
        compact('order')
    );

})->name('qc.orders.show');

    Route::post('/qc/orders/{id}/approve', function (Request $request, $id) {

    $order = Order::findOrFail($id);

    $photo = null;

    if($request->hasFile('qc_photo'))
    {
        $photo = $request
            ->file('qc_photo')
            ->store('qc-photos','public');
    }

    $order->update([

        'status' => 'Approved',

        'tracking_step' => 5,

        'shipping_at' => now(),

        'qc_notes' => $request->qc_notes,

        'logo_alignment' =>
        $request->has('logo_alignment'),

        'color_accuracy' =>
        $request->has('color_accuracy'),

        'printing_quality' =>
        $request->has('printing_quality'),

        'packaging_quality' =>
        $request->has('packaging_quality'),

        'qc_photo' => $photo

    ]);

    return redirect('/qc/orders');

});


    Route::post('/qc/orders/{id}/revision', function (Request $request, $id) {

    $order = Order::findOrFail($id);

    $order->status = 'Revision';

    $order->tracking_step = 3;

    $order->qc_notes = $request->qc_notes;

    $order->save();

    // notif admin
    Notification::create([

        'title' => 'QC Revision',

        'message' =>
        'ORD-'.$order->id.
        ' requires revision',
        'is_read' => false

    ]);

    // kirim pesan otomatis ke client
    Message::create([

        'order_id' => $order->id,

        'sender_role' => 'admin',

        'message' =>
        'QC requested revision: '.$request->qc_notes

    ]);

    return back();

});

    Route::post('/qc/orders/{id}/reject', function (Request $request, $id) {

    $order = Order::findOrFail($id);

    $photo = null;

    if($request->hasFile('qc_photo'))
    {
        $photo = $request
            ->file('qc_photo')
            ->store('qc', 'public');

    }

    $order->status = 'Revision';

    $order->tracking_step = 3;

    $order->qc_notes = $request->qc_notes;

    $order->logo_alignment =
        $request->has('logo_alignment');

    $order->color_accuracy =
        $request->has('color_accuracy');

    $order->printing_quality =
        $request->has('printing_quality');

    $order->packaging_quality =
        $request->has('packaging_quality');

    $order->qc_photo = $photo;

    $order->save();

    return back();

});

Route::post('/proposal', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }

    return back();

});


Route::get('/qc/orders/{id}/report', function ($id) {

    $order = Order::findOrFail($id);

    return view(
        'qc.report',
        compact('order')
    );

})->name('qc.report');

Route::get('/qc/messages', function(){

    $orders = Order::latest()->get();

    return view(
        'qc.messages',
        compact('orders')
    );

});

Route::post('/qc/messages/send', function(Request $request){

    QcMessage::create([

        'order_id' => $request->order_id,

        'sender_role' => 'qc',

        'message' => $request->message,
        'is_read' => false

    ]);

    return back();

});

Route::get('/qc/messages/{order}', function($order){

    $order = Order::findOrFail($order);

    $orders = Order::latest()->get();

    $messages = QcMessage::where(
        'order_id',
        $order->id
    )->oldest()->get();

    return view(
        'qc.messages',
        compact(
            'orders',
            'order',
            'messages'
        )
    );

});
});


require __DIR__.'/auth.php';