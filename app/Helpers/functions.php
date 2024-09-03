<?php
use RealRashid\SweetAlert\Facades\Alert;


function checkEndDisplayMsg( $type = 'info',$flat = true, $title = '', $msg = '', $route = '') {
    // Kiểm tra loại thông báo hợp lệ
    $validTypes = ['info', 'success', 'warning', 'error'];
    if (!in_array($type, $validTypes)) {
        $type = 'info'; 
    }

    if ($flat) {
        Alert::$type($title, $msg);
        return redirect()->route($route);
    }

    Alert::error('Thất bại', 'Có lỗi xảy ra');
    return redirect()->back();
}

function getStatusOrderShip($text, $type = "default")
{
    $status = '';

    $title = ($type == "default") ? "Đơn hàng " : "";

    switch ($text) {
        case 'ORDERPLACE':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title đã được tạo
                        </span>";
            break;
        case 'PACKED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title đã nhận và đang xử lí
                        </span>";
            break;
        case 'SHIPPED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title đã được chuyển giao
                        </span>";
            break;
        case 'INTRANSIT':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title đang trên đường đến điểm đến
                        </span>";
            break;
        case 'OUTFORDELIVERY':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title đang được giao cho người nhận
                        </span>";
            break;
        case 'DELIVERED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title đã được giao thành công
                        </span>";
            break;
        case 'DELAYED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title gặp vấn đề trong quá trình vận chuyển
                        </span>";
            break;
        case 'CANCEL':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title đã huỷ
                        </span>";
            break;
        default:

            break;
    }

    return $status;
}
function getStatusOrder($text)
{
    $statusHtml = '';

    switch ($text) {
        case 'PAID':
            $statusHtml = "Đã thanh toán";
            break;
        case 'CANCELED':
            $statusHtml = "Đã huỷ";
            break;
        case 'PENDING':
            $statusHtml = "Chưa thanh toán";
            break;
        default:
            break;
    }

    return $statusHtml;
}
function formatPrice($price, $type = "default")
{
    if ($type == "default") {
        return str_replace(",", ".", number_format($price)) . ' đ';
    } else {
        return str_replace(",", ".", number_format($price));
    }
}
?>
