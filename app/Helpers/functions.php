<?php
use RealRashid\SweetAlert\Facades\Alert;

// function checkEndDisplayMsg($flat=true,$type,$title='',$mgs='',$route='') {
//     if($flat) {
//         Alert::$type($title, $mgs);
//         return redirect()->route($route);
//     }
//     Alert::error('Failed', 'Có lỗi xảy ra');
//     return redirect()->back();

// }
function checkEndDisplayMsg( $type = 'info',$flat = true, $title = '', $msg = '', $route = '') {
    // Kiểm tra loại thông báo hợp lệ
    $validTypes = ['info', 'success', 'warning', 'error'];
    if (!in_array($type, $validTypes)) {
        $type = 'info'; // Gán giá trị mặc định nếu loại không hợp lệ
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

    // Kiểm tra nếu $type không phải là "default", thêm chữ "Đơn hàng"
    $title = ($type == "default") ? "Đơn hàng " : "";

    switch ($text) {
        case 'ORDERPLACE':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Đã được tạo
                        </span>";
            break;
        case 'PACKED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Đã nhận và đang đóng gói
                        </span>";
            break;
        case 'SHIPPED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Đã được chuyển giao
                        </span>";
            break;
        case 'INTRANSIT':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Đang trên đường đến điểm đến
                        </span>";
            break;
        case 'OUTFORDELIVERY':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Đang được giao cho người nhận
                        </span>";
            break;
        case 'DELIVERED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Đã được giao thành công
                        </span>";
            break;
        case 'DELAYED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Gặp trễ hẹn trong quá trình vận chuyển
                        </span>";
            break;
        case 'EXCEPTION':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Gặp vấn đề hoặc ngoại lệ trong quá trình vận chuyển
                        </span>";
            break;
        case 'RETURNED':
            $status = "<span class='badge rounded-pill bg-primary-light text-primary fw-medium p-0' style='text-align:left;font-size:16px'>
                            $title Đã được trả lại cho người gửi
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
