@php
    $selected = 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium';
    $notSelected = 'text-gray-900 hover:bg-gray-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium';
    $selectedSm = 'bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium';
    $notSelectedSm = 'text-gray-900 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium';
@endphp
<nav class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="hidden sm:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/home" class="{{$header == 'Home' ? $selected : $notSelected}}">Home</a>
                        <a href="/stage" class="{{$header == 'stage' ? $selected : $notSelected}}">stage</a>
                        <a href="/demande" class="{{$header == 'Demande' ? $selected : $notSelected}}">Demande</a>
                        <a href="/users" class="{{($header == 'Users') ? $selected : $notSelected}}">Users</a>
                        <a href="/projets" class="{{($header == 'Projets') ? $selected : $notSelected}}">Projets</a>
                        <a href="/domaines" class="{{($header == 'Domaines') ? $selected : $notSelected}}">Domaines</a>
                    </div>
                </div>
            </div>
            <div class="ml-4 flex items-center ml-6">
                <div class="flex items-center ml-6">
                    <button type="button" id="dark-mode" class="flex justify-center mx-4 p-2 text-gray-500 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md lg:bg-white lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-700 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50" onclick="localStorage.theme = 'light'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 cursor-pointer hidden" id="toggle-dark"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 cursor-pointer hidden" id="toggle-light"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </button>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
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

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="flex sm:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <!--
                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/home" class="{{$header == 'Home' ? $selectedSm : $notSelectedSm}}">Home</a>
            <a href="/stage" class="{{$header == 'stage' ? $selectedSm : $notSelectedSm}}">stage</a>
            <a href="/demande" class="{{$header == 'Demande' ? $selectedSm : $notSelectedSm}}">Demande</a>
            <a href="/users" class="{{($header == 'Users') ? $selectedSm : $notSelectedSm}}">Users</a>
            <a href="/projets" class="{{($header == 'Projets') ? $selectedSm : $notSelectedSm}}">Projets</a>
            <a href="/domaines" class="{{($header == 'Domaines') ? $selected : $notSelected}}">Domaines</a>
        </div>
    </div>
</nav>

<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }
    .dropdown-content a:hover {background-color: #f1f1f1;}
    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>

<script>
    function getCookie(name) {
        let result = document.cookie.match("(^|[^;]+)\\s*" + name + "\\s*=\\s*([^;]+)")
        return result ? result.pop() : ""
    }

    var theme;
    if (getCookie("theme") === "") {
        theme = getCookie(theme);
        localStorage.setItem('theme', theme);
    } else {
        theme = localStorage.getItem('theme');
    }
    var userPrefersDark = window.matchMedia('(prefers-color-scheme: dark)');
    var toggleDark = document.getElementById('toggle-dark');
    var toggleLight = document.getElementById('toggle-light');
    var htmlElem = document.querySelector('html');

    if (theme === 'dark' || (!theme && userPrefersDark.matches)) {
        htmlElem.classList.add('dark');
        toggleDark.classList.add('visible');
        toggleLight.classList.remove('hidden');
    } else {
        toggleLight.classList.add('visible');
        toggleDark.classList.remove('hidden');
    }

    toggleLight.addEventListener('click', function () {
        localStorage.setItem('theme', 'light');
        htmlElem.classList.remove('dark');
        toggleDark.classList.add('visible');
        toggleDark.classList.remove('hidden');
        toggleLight.classList.add('hidden');
        toggleLight.classList.remove('visible');
        document.cookie = "theme = light; path=/";
        theme = 'light';
    });

    toggleDark.addEventListener('click', function () {
        localStorage.setItem('theme', 'dark');
        htmlElem.classList.add('dark');
        toggleLight.classList.add('visible');
        toggleLight.classList.remove('hidden');
        toggleDark.classList.add('hidden');
        toggleDark.classList.remove('visible');
        document.cookie = "theme = dark; path=/";
    });
</script>
