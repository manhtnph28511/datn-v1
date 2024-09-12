<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        return $this->orders->map(function ($order) {
            return [
                'id' => $order->id,
                'user_id' => $order->user_id,
                'username' => $order->username,
                'phone' => $order->phone,
                'email' => $order->email,
                'address' => $order->address,
                'order_status' => $order->order_status,
                'shipment_status' => $order->shipment_status,
                'payment_method' => $order->payment_method,
                'total_price' => $order->orderDetails->sum('total_price'), // Tính tổng giá từ orderDetails
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Order ID',
            'User ID',
            'Username',
            'Phone',
            'Email',
            'Address',
            'Order Status',
            'Shipment Status',
            'Payment Method',
            'Total Price',
            'Created At',
        ];
    }
}
