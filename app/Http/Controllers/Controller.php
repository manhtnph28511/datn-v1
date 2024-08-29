<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getPublicId($path='') {
        $parts = explode('/', $path);
        $filenameWithExtension = end($parts); // Lấy tên file với phần mở rộng
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME); // Lấy phần tên file mà không có phần mở rộng

    return $filename;
    }
}
