<div>
    <nav id="nav">
        <div id="toggle-btn">
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
