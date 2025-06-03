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
        $fs= request()->get('size', 24);

        $img->text(strtoupper($title), $width / 2, $height / 2, function ($font) use ($fs) {
            $font->file(public_path('fonts/OpenSans-Italic2.ttf')); // Or comment this line to use default
            $font->size($fs);
            $font->color('#333333');
            $font->align('center');
            $font->valign('center');
        });

        return $img->response('png');
    }
}
