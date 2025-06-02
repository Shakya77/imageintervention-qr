<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageGeneratorController extends Controller
{
    public function generate(Request $request)
    {
        $width = $request->get('w', 600);
        $height = $request->get('h', 400);
        $title = $request->get('text', 'Product Name');
        $color = $request->get('color', '#eaeaea');
        $img = Image::canvas($width, $height, $color);

        $img->text(strtoupper($title), $width / 2, $height / 2, function ($font) {
            $font->file(public_path('fonts/OpenSans-Italic2.ttf')); // Or comment this line to use default
            $font->size(24);
            $font->color('#333333');
            $font->align('center');
            $font->valign('center');
        });

        return $img->response('png');
    }
}
