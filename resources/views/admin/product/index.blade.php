@extends('Layouts.layouts')
@section('content')
    <x-nav-component />
    <x-container>
        <div class="mt-[2rem] md:px-3 lg:px-0 ">
            <div class="flex items-center justify-between text-[2rem] text-white" id="product-title">
                <div class="text-[1rem] md:text-[2rem]">New product</div>
                <div>
                    <form action="{{ route('admin.product.create') }}" method="get" class="flex">
                        <button class="bg-blue-300 text-[1rem]  px-3 py-2 rounded">Add product</button>
                    </form>
                </div>
            </div>
            <div class="my-[2rem]">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">
                    @foreach ($products as $products)
                        <div>
                            <div class="bg-black h-[20vh] w-full rounded"></div>
                            <a href="{{ route('admin.product.edit', $products->slug) }}">
                                {{ $products->title }}
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- <form action="" class="bg-[#272e48] shadow p-4 grid grid-cols-3 rounded gap-4">
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product title</label>
                        <div>
                            <input type="text" class="w-full bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="product title">
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="slug_title">Product title</label>
                        <div>
                            <input type="text" class="w-full bg-transparent placeholder:text-white text-white "
                                id="slug_title" placeholder="slug">
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product title</label>
                        <div>
                            <input type="number" class="w-full bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="price">
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product title</label>
                        <div>
                            <textarea type="text" class="w-full resize-none bg-transparent placeholder:text-white text-white " id="product_title"
                                placeholder="product title">
                            </textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 col-span-2">
                        <button type="submit" class="bg-red-500">submit</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </x-container>
@endsection
