<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'Phinocio') }}</title>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-light text-text-light dark:bg-dark dark:text-text-dark">
        <header class="mb-6 border-b border-slate-400 text-black dark:border-slate-700 dark:text-white">
            <nav class="container mx-auto flex flex-col px-4 py-4 lg:px-40">
                <div class="flex items-center justify-between">
                    <a href="/" class="text-2xl font-bold text-red-500 dark:text-red-400">Phinocio</a>
                    <button
                        type="button"
                        onclick="toggleMenu('dropdown-nav')"
                        aria-label="Toggle menu"
                        class="rounded hover:bg-red-400 active:bg-red-400 dark:hover:bg-red-500 dark:active:bg-red-500"
                    >
                        <x-icons.menu />
                    </button>
                </div>
                <div id="dropdown-nav" class="mt-2 flex hidden flex-col text-center" aria-hidden="true">
                    <a href="/projects" class="rounded-2xl py-2 hover:bg-red-400 active:bg-red-400">Projects</a>
                    <a href="/thoughts" class="rounded-2xl py-2 hover:bg-red-400 active:bg-red-400">Random Thoughts</a>
                    <div class="flex justify-center">
                        <a
                            href="https://discord.gg/K3KnEgrQE4"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="rounded-2xl px-4 py-2 hover:bg-red-400 active:bg-red-400"
                        >
                            <x-icons.discord />
                        </a>
                        <a
                            href="https://github.com/phinocio"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="rounded-2xl px-4 py-2 hover:bg-red-400 active:bg-red-400"
                        >
                            <x-icons.github />
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container mx-auto px-4 lg:px-40 lg:text-xl">{{ $slot }}</main>
        @vite('resources/js/app.js')
    </body>
</html>
