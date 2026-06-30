<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Notification;
use App\Models\Message;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();

        $messageCount = Message::count();

        $clients = User::where('role', 'client')->count();

        $orders = Order::latest()->take(5)->get();

        $latestOrder = Order::latest()->first();

        $received = Order::where('tracking_step', 1)->count();

        $design = Order::where('tracking_step', 2)->count();

        $production = Order::where('tracking_step', 3)->count();

        $qc = Order::where('tracking_step', 4)->count();

        $shipping = Order::where('tracking_step', 5)->count();

        $completed = Order::where('tracking_step', 6)->count();

        $notifications = Notification::latest()
            ->take(5)
            ->get();

        $histories = Notification::latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'messageCount',
            'clients',
            'orders',
            'latestOrder',
            'received',
            'design',
            'production',
            'qc',
            'shipping',
            'completed',
            'notifications',
            'histories'
        ));
    }

     public function qcDashboard()
    {
        $pending = Order::where(
            'tracking_step',
            4
        )->count();

        $approved = Order::where(
            'status',
            'Approved'
        )->count();

        $rejected = Order::where(
            'status',
            'Rejected'
        )->count();

        $completed = Order::where(
            'tracking_step',
            6
        )->count();

        return view(
            'qc.dashboard',
            compact(
                'pending',
                'approved',
                'rejected',
                'completed'
            )
        );
    }
}