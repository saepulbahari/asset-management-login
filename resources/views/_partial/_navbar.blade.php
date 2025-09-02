<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-none">
        <a class="btn btn-ghost text-xl">Asset Management System</a>
    </div>
    <div class="flex-1">
        @auth
            <ul class="menu menu-horizontal px-1">
                <li><a href="/post">Post</a></li>
                <li><a href="/asset">Asset</a></li>
                <li><a href="/location">Location</a></li>
                <li><a href="/category">Category</a></li>
            </ul>
        @endauth
    </div>
    <div class="flex-none">
        @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost">
                    <div class="w-10 rounded-full">
                        <div class="avatar placeholder">
                            <div class="bg-neutral text-neutral-content rounded-full w-10">
                                <span class="text-sm">{{ substr(Auth::user()->name, 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a class="justify-between">{{ Auth::user()->name }}</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        @endauth
    </div>
</div>
