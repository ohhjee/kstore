<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(product $products, $slug): Response
    {
        $product = $products->where('slug', $slug)->firstOrFail();
        return Inertia::render(
            'productview',
            [
                'products' => $product
            ]
        );
    }
}
