@extends('Layouts.layouts')
@section('content')
    <x-nav-component />
    <x-container>
        <div class="mt-[2rem]">
            <div class="text-[2rem] text-white" id="product-title">Update {{ $products->title }}</div>
            <div class="mt-[2rem] flex items-center justify-between">
                <form action="{{ route('admin.product') }}" method="get">
                    <button type="submit" class="bg-blue-300 px-3 py-2 text-white rounded capitalize">

                        <i class="fa fa-arrow-left mr-3 "></i>
                        back
                    </button>
                </form>
                <form action="{{ route('admin.product.destroy', $products->slug) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 flex items-center justify-between px-3 py-2 text-white rounded capitalize">
                        <i class="fa fa-trash mr-3 "></i>

                        delete
                    </button>
                </form>
            </div>
            <div class="my-[2rem]">
                <form action="{{ route('admin.product.update', $products->slug) }}" method="post"
                    class="bg-[#272e48] shadow p-4 grid grid-cols-2 rounded gap-4">
                    @csrf
                    @method('PUT')


                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product title</label>
                        <div>
                            <input type="text" value="{{ $products->title }}"
                                class="w-full bg-transparent placeholder:text-white text-white " id="product_title"
                                placeholder="product title" name="title">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">price</label>
                        <div>
                            <input type="number" value="{{ $products->price }}"
                                class="w-full bg-transparent placeholder:text-white text-white " id="product_title"
                                placeholder="price" name="price">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">quantity</label>
                        <div>
                            <input type="number" value="{{ $products->quantity }}"
                                class="w-full bg-transparent placeholder:text-white text-white " id="quantity"
                                placeholder="quantity" min="1" max="100" name="quantity">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">description</label>
                        <div>
                            <textarea type="text" name="description" class="w-full resize-none bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="product title">
                                {{ $products->description }}
                            </textarea>

                        </div>
                    </div>

                    <div class="grid grid-cols-4 col-span-2">
                        <button type="submit" class="bg-blue-500">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
@endsection
