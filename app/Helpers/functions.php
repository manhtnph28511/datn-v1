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
?>
