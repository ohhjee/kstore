@extends('Layouts.layouts')
@section('content')
    <x-nav-component />
    <x-container>

        <div class="grid grid-cols-1 md:grid-cols-2  xl:grid-cols-3 mt-[2rem] gap-4">
            <div class=" bg-[#272e48] shadow text-white p-4 rounded">
                <div class="flex items-center md:items-center lg:items-start justify-between lg:flex-col">
                    <div class="text-[1.2rem]">
                        Congratulations Admin!

                    </div>
                    <div class="text-[.8rem] text-[#8a99b5]">
                        Best seller of the month
                    </div>
                </div>

                <div class="mt-[4rem]">
                    <div class="grid-cols-3 grid gap-2">
                        <div class=" col-span-2">
                            <div class="font-bold text-[1.5rem] text-[#5A8DEE]">
                                $89K
                            </div>
                            <div class="text-[.9rem] my-3 text-[#8a99b5]">

                                you hav done 57.9% more sales today.
                            </div>

                            <div>
                                <button
                                    class="!rounded bg-[#5A8DEE] px-4 py-1 shadow-[0px_1px_10px] shadow-black capitalize">view
                                    sales</-button>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            {{-- <i class="fa-solid fa-trophy text-[6rem] text-red-400"></i> --}}
                            <img src="{{ asset('assets/images/cup.png') }}" alt="" class="w-full h-full"
                                srcset="">
                        </div>



                    </div>
                </div>
            </div>
            <div class="bg-[#272e48] shadow text-white p-4 rounded">
                <div class="grid grid-cols-3">
                    <div class="col-span-2"> Visits in 2022</div>
                    <div class="content-end text-end">
                        i

                    </div>
                </div>
            </div>
            <div
                class="md:col-span-2 grid md:grid-cols-4 lg:grid-cols-4 lg:col-span-2 xl:grid-cols-2 xl:col-span-1 gap-4 xl:gap-0 xl:gap-y-2">

                <div class="grid grid-cols-2 xl:mr-2 ">
                    <div class="bg-[#272e48] shadow place-content-center col-span-2 xl:col-span-3 text-white p-4 rounded">
                        <div class="h-full flex items-center justify-center flex-col">
                            <div class="bg-[#39DA8A]/50 h-8 w-8 rounded-full flex items-center justify-center">
                                <i
                                    class="fa-solid fa-briefcase text-[#39DA8A] text-[.8rem] flex items-center justify-center"></i>
                            </div>
                            <div class="text-[#828D99] text-[.8rem] my-2">
                                New Product
                            </div>
                            <div class="">
                                {{ $product->count() }}

                            </div>
                        </div>
                    </div>

                </div>
                <div class="grid grid-cols-2  ">
                    <div class="bg-[#272e48] shadow col-span-2 xl:col-span-2 text-white p-4 rounded">
                        <div class="h-full flex items-center justify-center flex-col">
                            <div class="bg-[#FF5B5C]/50 h-8 w-8 rounded-full flex items-center justify-center">
                                <i
                                    class="fa-regular fa-user text-[.8rem] text-[#FF5B5C] flex items-center justify-center"></i>

                            </div>
                            <div class="text-[#828D99] text-[.8rem] my-2">
                                New User
                            </div>
                            <div class="">
                                {{ $user->count() }}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-span-2 grid-cols-2 xl:col-span-3 gird bg-[#272e48] shadow text-white p-4 rounded">
                    <div class="">

                    </div>
                </div>
            </div>

        </div>
    </x-container>
@endsection
