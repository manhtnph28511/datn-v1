@include('admin.layouts.side-bar')
<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="welcome-message">
            <p>Chào mừng trở lại, {{ Auth::user()->name }}</p>
        </div>
        @if(Auth::check())
            <div class="user-info">
                <img src="{{ Auth::user()->avatar }}" alt="User Avatar" class="user-avatar">
            </div>
        @endif
    </div>

    <style>
        /* CSS cho toàn bộ phần */
.dashboard {
    font-family: 'Arial', sans-serif; /* Chọn font chữ phù hợp */
}

.top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    background-color: #f9fafb; /* Màu nền */
    border-bottom: 1px solid #e5e7eb; /* Đường viền dưới */
}

.sidebar-toggle {
    font-size: 1.5rem;
    cursor: pointer;
}

.welcome-message {
    flex: 1;
    text-align: center;
    font-size: 1.25rem;
    font-weight: 600;
    color: #374151; /* Màu chữ */
}

.user-info {
    display: flex;
    align-items: center;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin-left: 1rem;
}

/* Optional: CSS cho các phần tử khác nếu cần */

    </style>
