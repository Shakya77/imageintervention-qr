<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GenerateQRController extends Controller
{
    public function generateQR()
    {
        $name = request()->input('name');
        $price = request()->input('price');

        $qrContent = "Product: $name\nPrice: Rs. $price";
        $fileName = Str::slug($name) . '.png';

        $qrImage = QrCode::format('png')
            ->size(300)
            ->margin(2)
            ->generate($qrContent);

        Storage::disk('public')->put("qrcodes/{$fileName}", $qrImage);

        $qrUrl = asset("storage/qrcodes/{$fileName}");

        return response()->json([
            'message' => 'QR code generated successfully',
            'qr_code_url' => $qrUrl,
        ]);
    }
}
