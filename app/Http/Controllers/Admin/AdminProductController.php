<?php

namespace App\Http\Controllers\Admin;

use App\Enums\types;
use App\Models\Brand;
use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\Console\Input\Input;

class AdminProductController extends Controller
{
    private function category()
    {
        $cate = array(
            "1" => "phone & tablets",
            "2" => "men's fashion",
            "3" => "women's fashion",
            "4" => "mobile accessories",
            "5" => "electronics",
            "6" => "health & beauty",
            "7" => "kids corner",
            "8" => "sporting good",
            "9" => "computing",
            "10" => "groceries",
            "11" => "video games",
            "12" => "home & office"

        );
        return $cate;
    }
    private function pt()
    {
        $phone = array(
            "1" => "phone & tablets",
            "2" => "men's fashion",
            "3" => "women's fashion",
            "4" => "mobile accessories",
            "5" => "electronics",
            "6" => "health & beauty",
            "7" => "kids corner",
            "8" => "sporting good",
            "9" => "computing",
            "10" => "groceries",
            "11" => "video games",
            "12" => "home & office"

        );
        return $phone;
    }
    public function getCate()
    {
        $category = Category::all();
        // dd($);

        return  response()->json($category);
    }
    public function getBrand(Request $request)
    {
        $brand = Brand::where('category_id', $request->category)->get();

        // dd($brand);
        return  response()->json($brand);
    }
    public function index(product $product)
    {
        $products = $product->get();
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {

        $category = Category::all();

        return view('admin.product.create', compact('category'));
    }
    public function store(Request $request)
    {
        $product = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required|string', 'quantity' => 'required'

        ]);
        // dd($product);
        product::create($product);
        return redirect('admin/product');
    }
    public function edit(product $product, $slug)
    {
        $products = $product->where('slug', $slug)->firstOrFail();
        return view('admin.product.edit', compact('products'));
    }
    public function update(Request $request, product $products, $slug)
    {
        $items = $products->where('slug', $slug)->firstOrFail();
        $UpdateProduct = $request->validate([
            'title' => 'required|string',
            'price' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required'
        ]);
        $items->update($UpdateProduct);

        return redirect()->route('admin.product');
    }
    public function destroy($slug)
    {
        $product = product::where('slug', $slug)->firstOrFail();
        $product->delete();
        return redirect()->route('admin.product');
    }
}
