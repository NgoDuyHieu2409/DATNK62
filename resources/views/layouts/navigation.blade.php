
<nav id="main-nav" class="navbar navbar-default navbar-fixed-top">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="display: contents;">
        <div class="flex justify-between h-16" style="height: 64px; padding: 0 30px;">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>
              
                <!-- Navigation Links -->
                @php
                    $a = "#about";
                    $b = "#service";
                    $c = "#gallery";
                    $d = "#testimonial";
                    $e = "#contact";
                    $monga = "#ga";
                    $monvit = "#vit";
                    $monbo = "#bo";
                    $monde = "#de";
                    $monlau ="#lau";
                    $monhaisan = "#haisan";
                    $monkhaivi = "#khaivi";
                    $douong = "#douong";
                @endphp
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (request()->routeIs('datban'))
                         {{-- <x-nav-link :href="$a">
                            {{ __('Giới thiệu') }}
                        </x-nav-link>
                        <x-nav-link :href="$b">
                            {{ __('Dịch vụ') }}
                        </x-nav-link>
                        <x-nav-link :href="$b">
                            {{ __('Dịch vụ') }}
                        </x-nav-link>
                        <x-nav-link :href="$b">
                            {{ __('Dịch vụ') }}
                        </x-nav-link>            --}}
                    @elseif (request()->routeIs('danhsach'))
                        <x-nav-link :href="route('datban')">
                            {{ __('Chọn bàn') }}
                        </x-nav-link>
                        <x-nav-link :href="$monga">
                            {{ __('Món gà') }}
                        </x-nav-link>
                        <x-nav-link :href="$monvit">
                            {{ __('Món vịt') }}
                        </x-nav-link>
                        <x-nav-link :href="$monbo">
                            {{ __('Món bò') }}
                        </x-nav-link>
                        <x-nav-link :href="$monde">
                            {{ __('Món dê') }}
                        </x-nav-link>
                        <x-nav-link :href="$monlau">
                            {{ __('Món lẩu') }}
                        </x-nav-link>
                        <x-nav-link :href="$monkhaivi">
                            {{ __('Món khai vị') }}
                        </x-nav-link>
                        <x-nav-link :href="$monhaisan">
                            {{ __('Món hải sản') }}
                        </x-nav-link>
                        <x-nav-link :href="$douong">
                            {{ __('Đồ uống') }}
                        </x-nav-link>
                   
                    @else
                        <x-nav-link :href="$a">
                            {{ __('Giới thiệu') }}
                        </x-nav-link>
                        <x-nav-link :href="$b">
                            {{ __('Dịch vụ') }}
                        </x-nav-link>
                        <x-nav-link :href="$c">
                            {{ __('Hình ảnh') }}
                        </x-nav-link>
                        <x-nav-link :href="$d">
                            {{ __('Đánh giá') }}
                        </x-nav-link>
                        <x-nav-link :href="$e">
                            {{ __('Liên hệ') }}
                        </x-nav-link>
                        {{-- <x-nav-link :href="route('datban')">
                            {{ __('Đặt bàn') }}
                        </x-nav-link> --}}
                        @if (Auth::user())
                            <x-nav-link :href="route('datban')">
                                {{ __('Đặt bàn') }}
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('login')">
                                {{ __('Đăng nhập') }}
                            </x-nav-link>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            @if (Auth::user())
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button style="font-size: 14px;" class="flex items-center text-sm font-medium text-white hover:text-warning focus:outline-none focus:text-warning transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <ul>
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </ul>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif

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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @if (Auth::user())
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base ">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endif
    </div>
</nav>
