<div class="relative">
    <div class="h-[100vh] fixed opacity-0 -z-20 top-0 left-0 bg-black/50 w-full   " id="closeDiv">
        <div class="bg-white h-full w-3/12 p-4">
            <div class="flex justify-end items-center">

                <i onclick="closeNav()"
                    class="fa-solid fa-xmark border w-fit text-right text-[1.4rem] text-[blue] hover:text-[red] transition-all duration-500 ease-in-out flex items-center justify-end"></i>
            </div>




            <div>
                <nav>

                    <ul class="space-y-3">

                        <li>
                            <a class="flex items-center space-x-3" href="{{ route('admin.user') }}">
                                <i
                                    class="fa-regular mr-2 fa-user text-[.8rem] text-[blue] flex items-center justify-center"></i>
                                Users
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.product') }}" class="flex items-center capitalize space-x-3">

                                <i
                                    class="fa-solid fa-briefcase text-[blue] mr-2 text-[.8rem] flex items-center justify-center"></i>
                                product
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.product') }}" class="flex items-center space-x-3">
                                <i
                                    class="fa-solid fa-truck-fast text-[blue] mr-2 text-[.8rem] flex items-center justify-center"></i>
                                {{-- <i class="fa-solid fa-briefcase "></i> --}}
                                Order
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

    </div>
    <nav id="nav">
        <div id="toggle-btn" class="" onclick="submit()">
            <span></span>
            <span></span>
            <span></span>

        </div>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">home</a></li>

            <li><a href="{{ route('admin.product') }}" class="text-white mx-2">product</a></li>
            <li>

                <form action="{{ route('admin.logouts') }}" method="get">

                    @csrf
                    <x-formbtn>
                        logout
                    </x-formbtn>
                </form>
            </li>
        </ul>
    </nav>
</div>

<script>
    const xtime = document.querySelector("#closeDiv")
    const submit = () => {
        xtime.classList.add("!opacity-100", "transistion-all", "z-[30]", "ease-in-out", "duration-[500ms]",
            "pointer-events-[visible]")
        xtime.classList.remove("opacity-0", "transistion-all", "ease-in-out", "duration-[500ms]",
            "pointer-events-none")
    }
    const closeNav = () => {

        xtime.classList.add("opacity-0", "transistion-all", "ease-in-out", "duration-[500ms]",
            "pointer-events-none")
        xtime.classList.remove("!opacity-100", "transistion-all", "ease-in-out", "duration-[500ms]",
            "pointer-events-[visible]")
    }
</script>
