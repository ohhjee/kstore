    @extends('Layouts.layouts')
    @section('content')
        <div class="h-[100vh]  flex items-center justify-center">
            <div class="w-full mx-auto">
                <div class="flex items-center justify-center">
                    <form action="{{ route('admin.login') }}" method="post"
                        class="w-11/12 p-8 bg-gray-100 rounded-md md:w-7/12 xl:w-5/12">
                        @csrf
                        <div class=" text-center">
                            @if (session('message'))
                                <div class="text-red-500">

                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>


                        <div class="mb-4">
                            <label for="">Email</label>
                            <input type="text" placeholder="email" name="email" class="w-full p-3 mt-3 border"
                                value="admin@gmail.com">
                        </div>
                        <div class="mb-4">
                            <div class="flex items-center justify-between my-3">
                                <label for="">Password</label>
                                <div>
                                    <a href="#" class="text-blue-700">Forget password?</a>
                                </div>
                            </div>
                            <input type="password" placeholder="password" name="password" class="w-full p-3 border "
                                value="secret">
                        </div>
                        <div>
                            <x-button>
                                login
                            </x-button>
                        </div>
                        <div class="flex items-center mt-[2rem]">
                            <div>Don't have an account? </div>
                            <div>
                                {{-- <a href="{{ route('admin.reset.index') }}" class="pl-1 text-blue-600 underline">
                                    Register</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
