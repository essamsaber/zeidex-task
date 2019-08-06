<?php

namespace App\Http\Controllers\Backend;

use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductImagesController extends Controller
{
    public function __invoke(Request $request)
    {
        $image =  ProductImage::where('path', $request->image)->firstOrFail();
        $image->delete();
    }
}
