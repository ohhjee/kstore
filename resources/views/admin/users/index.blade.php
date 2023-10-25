@extends('Layouts.layouts')
@section('content')
    <x-nav-component />
    <x-container>
        <div class="mt-[2rem] md:px-3 lg:px-0 ">
            {{-- <div class="flex items-center justify-between text-[2rem] text-white" id="product-title">
                <div class="text-[1rem] md:text-[2rem]">New product</div>
                <div>
                    <form action="{{ route('admin.product.create') }}" method="get" class="flex">
                        <button class="bg-blue-300 text-[1rem]  px-3 py-2 rounded">Add product</button>
                    </form>
                </div>
            </div> --}}
            <div class="my-[2rem]">
                {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 "> --}}
                @if ($users->count() > 0)
                    <table class="border w-full items-center justify-center text-white ">
                        <tr class="border  ">
                            <th class="border uppercase">
                                first name
                            </th>
                            <th class="border uppercase">
                                last name
                            </th>
                            <th class="border uppercase">
                                email
                            </th>
                            <th class="border uppercase">
                                phone
                            </th>
                            <th class="border uppercase">
                                gender
                            </th>
                            <th class="border uppercase">
                                DOB
                            </th>
                            <th class="border uppercase">
                                ACTION
                            </th>
                        </tr>


                        @foreach ($users as $user)
                            <tr class=" hover:bg-gray-500 cursor-pointer ">
                                <td class="border  text-center">{{ $user->first_name }}</td>
                                <td class="border  text-center">{{ $user->last_name }}</td>
                                <td class="border  text-center">{{ $user->email }}</td>
                                <td class="border  text-center">{{ $user->phone }}</td>
                                <td class="border  text-center">{{ $user->gender }}</td>
                                <td class="border  text-center">{{ $user->dob }}</td>
                                <td class="border  text-center flex items-center justify-center space-x-3 p-3">
                                    <form action="">
                                        <button
                                            class="bg-blue-700 px-3 py-1 rounded shadow capitalize font-medium text-[1rem]">edit</button>
                                    </form>
                                    @if ($user->trashed())
                                        <form action="{{ route('admin.restore', $user->id) }}" method="post">
                                            @csrf
                                            <button
                                                class="bg-blue-500 px-3 py-1 rounded shadow capitalize font-medium text-[1rem]">restore</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.deletes', $user->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 px-3 py-1 rounded shadow capitalize font-medium text-[1rem]">delete</button>
                                        </form>
                                    @endif

                                </td>

                            </tr>
                        @endforeach




                        {{-- <div class="text-center"> --}}
                        {{-- <div class=" w- w-full rounded">
                                <img src="http://localhost:8000/{{ $products->image }}" claas="h-full object-fit w-full"
                                alt="">
                            </div>
                            <a href="{{ route('admin.product.edit', $products->slug) }}">
                                {{ $products->title }}
                            </a> --}}



                        {{-- {{ $user }} --}}
                        {{-- </div> --}}
                    </table>
                @else
                    no user
                @endif
                {{-- </div> --}}

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
