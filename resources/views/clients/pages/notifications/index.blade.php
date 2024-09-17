@extends('clients.layouts.app')

@section('app')
<div class="notifications">
    @if ($notifications->count() > 0)
        <h3 class="text-xl font-semibold mb-4">Danh sách thông báo</h3>
        <table class="w-full text-sm text-left text-gray-500 border-separate border-spacing-2">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Tin nhắn</th>
                    <th scope="col" class="px-6 py-3">Thời gian</th>
                    <th scope="col" class="px-6 py-3">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                @php
                    $data = json_decode($notification->data);
                    $message = $data->message ?? 'Không có tin nhắn';
                    $orderId = $data->order_id ?? null;
                    $type = $notification->type;
                    $hideForm = in_array(trim($type), ['shipping_update', 'account_update']);
                @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $message }}</td>
                    <td class="px-6 py-4">{{ $notification->created_at->format('d/m/Y H:i') }}</td>



                    
                    @if (trim($notification->type) === 'đã đặt hàng')
                    <td class="px-6 py-4 cancel" data-order-id="{{ $notification->order_id }}">
                        <form action="{{ route('clients.notifications.cancelOrder', $notification->id) }}" method="POST" class="cancel-form">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hủy đơn</button>
                        </form>
                    </td>
                @elseif (trim($notification->type) === 'shipping_update')
                    <div class="shipping-update" data-order-id="{{ $notification->order_id }}"></div>
                @endif
              
                

                


                
                  



                  




                    @if (trim($message) === 'Chúng tôi đã nhận thấy 1 số hành động lại từ tài khoản của bạn nên đã tạm thời khóa nó . Vui lòng liên hệ qua trang chat')
                    <td class="px-6 py-4">
                        <form action="{{ route('clients.chats.index', ['userId' => auth()->user()->id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Chat với admin</button>
                        </form>
                    </td>
                   @endif


                   

                   
                    @if ($message === 'Đơn hàng của bạn đã được giao hàng thành công.')
                    <td class="px-6 py-4">
                        @if ($orderId)
                            @php
                                $orderDetails = \App\Models\OrderDetail::where('order_id', $orderId)->get();
                            @endphp
                            @foreach ($orderDetails as $orderDetail)
                                <form action="{{ route('clients.product.review', ['orderId' => $orderId, 'productId' => $orderDetail->pro_id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" style="margin:10px">Đánh giá sản phẩm {{ $orderDetail->pro_id }}</button>
                                </form>
                            @endforeach
                        @endif
                    </td>
                    @endif


                    <!-- Xóa thông báo -->
                    <td class="px-6 py-4">
                        <form action="{{ route('clients.notifications.delete', $notification->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('clients.index') }}" class="back-button mt-4 inline-block">Quay lại</a>
    @else
        <div role="alert" class="bg-red-100 border border-red-400 text-red-700 rounded px-4 py-3">
            <p class="font-bold">Thông báo</p>
            <p>Không có thông báo nào.</p>
        </div>
    @endif
</div>





@endsection

<style>
   
   .cancel-form {
    display: block; 
   }

.hidden {
    display: none;
}
.button-container {
    margin-top: 1rem; 
}

.button-container form {
    margin-bottom: 0.5rem;
}

.button-container form button {
    display: block; 
    margin-bottom: 0.5rem; 
    width: auto;
}

.back-button {
    display: inline-block;
    padding: 0.5rem 1rem; 
    background-color: #1d4ed8; 
    color: #ffffff; 
    text-decoration: none; 
    border-radius: 0.375rem; 
    font-weight: 500; 
    transition: background-color 0.3s ease; 
}

.back-button:hover {
    background-color: #2563eb; 
}


</style>
