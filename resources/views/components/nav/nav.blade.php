<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img
                            src="https://miraino-katachi.co.jp/wp-content/uploads/2023/09/logo.png"
                            alt="大阪本町のプログラミング IT特化就労移行支援事業所　未来のかたち"
                            class="w-36"
                        >
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav.link :href="route('portfolios.index')" :active="request()->routeIs('portfolios.index')">
                        ポートフォリオ
                    </x-nav.link >
                    <x-nav.link :href="route('statistics')" :active="request()->routeIs('statistics')">
                        統計情報
                    </x-nav.link >
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav.responsive-link :href="route('portfolios.index')" :active="request()->routeIs('portfolios.index')">
                ポートフォリオ
            </x-nav.responsive-link>
            <x-nav.responsive-link :href="route('statistics')" :active="request()->routeIs('statistics')">
                統計情報
            </x-nav.responsive-link>
        </div>
    </div>
</nav>
