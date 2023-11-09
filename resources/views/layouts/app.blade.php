<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'Phinocio') }}</title>
        @vite('resources/css/app.css')

        <script>
            function toggleMenu(id) {
                document.getElementById(id).classList.toggle('hidden');
            }
        </script>
    </head>

    <body class="bg-slate-900 text-white">
        <header class="mb-6 bg-blue-500 px-4 py-2">
            <nav class="container mx-auto flex flex-col text-black">
                <div class="flex items-center justify-between">
                    <a href="/" class="text-xl font-bold">Phinocio</a>
                    <button type="button" onclick="toggleMenu('dropdown-nav')">
                        <x-icons.menu />
                    </button>
                </div>
                <div id="dropdown-nav" class="flex hidden flex-col text-center">
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
        <main class="container mx-auto px-4">{{ $slot }}</main>
        @vite('resources/js/app.js')
    </body>
</html>
