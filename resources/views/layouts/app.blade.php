<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>{{ config('app.name', 'Phinocio') }}</title>
		@vite('resources/css/app.css')
	</head>

	<body class="bg-dark">
		<nav class="text-black mb-4 h-20 justify-between bg-blue-300 text-xl sm:hidden md:flex">
			<div class="container mx-auto flex items-center justify-between lg:px-60">
				<div class="flex items-center space-x-6">
					<a href="/" class="text-2xl font-bold hover:text-green-200">Phinocio</a>
					<a href="/projects" class="hover:text-green-200">Projects</a>
					<a href="/thoughts" class="hover:text-green-200">Random Thoughts</a>
				</div>
				<div class="flex space-x-4">
					<a href="https://discord.gg/K3KnEgrQE4" target="_blank" rel="noopener noreferrer">
						<x-icons.discord />
					</a>
					<a href="https://github.com/phinocio" target="_blank" rel="noopener noreferrer">
						<x-icons.github />
					</a>
				</div>
			</div>
		</nav>
		<main class="container mx-auto text-lg text-white lg:px-60">{{ $slot }}</main>
		@vite('resources/js/app.js')
	</body>
</html>
