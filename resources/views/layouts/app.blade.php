<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title') - {{ config('app.name', 'Phinocio') }}</title>
        @vite('resources/css/app.css')
    </head>

    <body class="flex min-h-screen flex-col bg-light text-text-light dark:bg-dark dark:text-text-dark">
        <header class="mb-6 border-b border-border-light text-black dark:border-border-dark dark:text-white">
            <nav class="container mx-auto flex flex-col px-4 py-4 md:flex-row lg:px-80">
                <div class="flex items-center justify-between">
                    <a href="/" class="text-2xl font-bold text-red-500 dark:text-red-400 md:mr-6">Phinocio</a>
                    <button
                        type="button"
                        onclick="toggleMenu('dropdown-nav')"
                        aria-label="Toggle menu"
                        class="rounded hover:bg-red-400 active:bg-red-400 dark:hover:bg-red-500 dark:active:bg-red-500 md:hidden"
                    >
                        <x-icons.menu />
                    </button>
                </div>
                <div
                    id="dropdown-nav"
                    class="mt-2 hidden w-full flex-col text-center md:mt-0 md:flex md:flex-row md:items-center md:justify-between"
                    aria-hidden="true"
                >
                    <div class="flex flex-col md:flex-row">
                        <a
                            href="/projects"
                            class="rounded-2xl py-2 hover:bg-red-300 active:bg-red-300 dark:hover:bg-red-500 dark:active:bg-red-500 md:px-4"
                            >Projects</a
                        >
                        <a
                            href="/thoughts"
                            class="rounded-2xl py-2 hover:bg-red-300 active:bg-red-300 dark:hover:bg-red-500 dark:active:bg-red-500 md:px-4"
                            >Random Thoughts</a
                        >
                    </div>
                    <div class="flex justify-center md:justify-end">
                        <a
                            href="https://discord.gg/K3KnEgrQE4"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="rounded-2xl px-4 py-2 hover:bg-red-400 active:bg-red-400 dark:hover:bg-red-500 dark:active:bg-red-500"
                        >
                            <x-icons.discord />
                        </a>
                        <a
                            href="https://github.com/phinocio"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="rounded-2xl px-4 py-2 hover:bg-red-400 active:bg-red-400 dark:hover:bg-red-500 dark:active:bg-red-500"
                        >
                            <x-icons.github />
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container mx-auto mb-20 flex h-full flex-grow flex-col px-4 lg:px-80 lg:text-xl">{{ $slot }}</main>
        <footer class="bg-[#dce0e8] text-center text-black dark:bg-[#11111b] dark:text-white">
            @auth
            <div
                class="absolute bottom-0 right-0 mb-8 mr-4 flex flex-col items-center rounded-2xl border border-border-light bg-light p-2 text-xs shadow-2xl dark:border-border-dark dark:bg-dark md:flex-row md:text-sm"
            >
                <a
                    href="/thoughts/create"
                    class="p-2 text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                >
                    New Thought
                </a>
                <a
                    href="/admin"
                    class="p-2 text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                >
                    Admin
                </a>

                <form action="/logout" method="POST" class="flex">
                    @csrf
                    <button
                        type="submit"
                        class="p-2 text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                    >
                        Logout
                    </button>
                </form>
            </div>
            @endauth
            <div class="container mx-auto flex flex-col px-4 py-4 text-gray-500 dark:text-gray-600 lg:px-40">
                Made by Phinocio
            </div>
        </footer>
        @vite('resources/js/app.js') @stack('scripts')
    </body>
</html>
