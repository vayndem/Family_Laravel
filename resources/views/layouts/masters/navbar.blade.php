<nav class="bg-white dark:bg-gray-800 shadow-sm dark:border-b dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <div class="flex-shrink-0">
                <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800 dark:text-white">
                    MyFamily
                </a>
            </div>

            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">
                            Register
                        </a>
                    @endif

                @else
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 px-3 py-2 rounded-md text-sm font-medium"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                @endauth
            </div>

        </div>
    </div>
</nav>
