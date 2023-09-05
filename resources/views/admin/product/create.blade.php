@extends('Layouts.layouts')
@section('content')
    <x-nav-component />

    <x-container>
        <div class="mt-[2rem]">
            <div class="text-[2rem] text-white" id="product-title">Create New Product</div>
            <div class="my-[2rem]">
                <form action="{{ route('admin.product.store') }}" enctype="multipart/form-data" method="post"
                    class="bg-[#272e48] shadow p-4 grid grid-cols-2 items-start rounded gap-4" x-data="{
                        categories: [],
                        category: '',
                        brand: [],
                        brands: '',
                        getBrand() {
                            axios.post('brand', {
                                category: this.category
                            }).then(res => {
                                this.brand = res.data
                            })
                        },
                        onCategoryChange() {
                            axios.get('categories').then(res => {
                                this.categories = res.data
                            })
                        },
                        init() {
                            this.onCategoryChange()
                        }
                    }">
                    @csrf
                    <div class="grid col-span-2">
                        <label class="text-white mb-3" for="product_title">Product name</label>
                        <div>

                            <input type="file" class="w-full bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="product name" name="image">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product name</label>
                        <div>
                            <input type="text" class="w-full bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="product name" name="title">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product price</label>
                        <div>
                            <input type="number" class="w-full bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="price" name="price" min="50000" max="1000000">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="grid grid-cols-2" x-data="{ selectedCountry: [], countries: ['nigeria', 'usa', 'canada'], cities: { 'usa': ['love', 'hate'], 'canada': ['yo men', 'laf'], 'nigeria': ['oyo', 'osun'] } }">

                        <div class="grid col-span-2">
                            <label class="text-white mb-3" for="product_title">Product category</label>

                            <div class="flex justify-center w-full">
                                <div class="w-full" x-data="{
                                    open: false,
                                    toggle() {
                                        if (this.open) {
                                            return this.close()
                                        }

                                        this.$refs.button.focus()

                                        this.open = true
                                    },
                                    close(focusAfter) {
                                        if (!this.open) return

                                        this.open = false

                                        focusAfter && focusAfter.focus()
                                    }
                                }"
                                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']" class="relative">
                                    <!-- Button -->
                                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')" type="button"
                                        class="flex text-white items-center justify-between gap-2 border px-5 py-2.5 w-full shadow">
                                        select category

                                        <!-- Heroicon: chevron-down -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <!-- Panel -->
                                    <div class="relative">

                                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                            style="display: none;"
                                            class="absolute left-0 mt-2 w-full rounded-md bg-white shadow-md">

                                            <div>
                                                <form action="">
                                                    <div name="select">
                                                        <template x-for="country in countries" :key="country">
                                                            <button @click="selectedCountry = cities[country]"
                                                                type="button"
                                                                class="block border px-2 py-1 capitalize rounded w-full"
                                                                x-text="country">
                                                            </button>
                                                        </template>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('select')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="grid col-span-2">
                            <label class="text-white mb-2" for="product_title">Product brand</label>
                            <div>
                                <select name="" id="" class="w-full">
                                    <template x-for="(city, pos) in selectedCountry" :key="pos">
                                        <option :value="pos" x-text="city"></option>
                                    </template>
                                </select>
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div> --}}

                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product category</label>
                        <div>
                            <select name="category" x-model="category" @change="getBrand"
                                class="w-full resize-none h-full bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="product title">
                                <option> choose a category</option>
                                <template x-for="(cate, index) in categories" :key="cate.id">
                                    <option :value="cate.id" x-text="cate.name"></option>
                                </template>
                            </select>
                            @error('category')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product category</label>
                        <div>
                            <select name="brand" x-model="brands" @change="onCategoryChange"
                                class="w-full resize-none h-full bg-transparent placeholder:text-white text-white "
                                id="product_title" placeholder="product title">
                                <option> choose a brand</option>
                                <template x-for="(product, index) in brand" :key="product.id">
                                    <option :value="product.brand" x-text="product.brand"></option>
                                </template>
                            </select>
                            @error('brand')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">Product title</label>
                        <div>
                            <textarea type="text" row="4" name="description"
                                class="w-full resize-none h-full bg-transparent placeholder:text-white text-white " id="product_title"
                                placeholder="product title">
                            </textarea>
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-white mb-3" for="product_title">quantity</label>
                        <div>
                            <input type="number" class="w-full bg-transparent placeholder:text-white text-white "
                                id="quantity" placeholder="quantity" min="1" max="100" name="quantity">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="grid   place-self-end col-span-2">
                        <button type="submit" class=" bg-blue-500 grid grid-cols-3 py-3 rounded">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
@endsection
