<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>{{ config('app.name', 'Phinocio') }}</title>
		@vite('resources/css/app.css')

		<script>
			function toggleHidden(id) {
				document.getElementById(id).classList.toggle('hidden');
			}
		</script>
	</head>

	<body class="bg-dark">
		<nav class="text-black mb-4 justify-between bg-blue-300 text-xl sm:hidden md:flex">
			<div class="container mx-auto px-4 py-2 sm:flex sm:justify-between md:px-40">
				<div class="flex items-center justify-between space-x-2">
					<a href="/" class="mr-0 text-2xl font-extrabold text-red-600 sm:mr-6">Phinocio</a>
					<a class="hidden rounded px-2 py-1 hover:bg-red-300 sm:block" href="/">Projects</a>
					<a class="hidden rounded px-2 py-1 hover:bg-red-300 sm:block" href="/thoughts">Random Thoughts</a>
					<button type="button" class="sm:hidden" onclick="toggleHidden('mobile-menu')">
						<x-icons.menu />
					</button>
				</div>

				<div class="hidden py-4 sm:flex sm:items-center sm:justify-between" id="mobile-menu">
					<div class="flex flex-col items-center text-center sm:ml-6 sm:flex-row md:space-x-4">
						<a class="rounded px-2 py-1 hover:bg-red-500 sm:hidden" href="/projects">Projects</a>
						<a class="rounded px-2 py-1 hover:bg-red-500 sm:hidden" href="/thoughts">Random Thoughts</a>
						<a href="https://discord.gg/K3KnEgrQE4" target="_blank" rel="noopener noreferrer">
							<x-icons.discord />
						</a>
						<a href="https://github.com/phinocio" target="_blank" rel="noopener noreferrer">
							<x-icons.github />
						</a>
					</div>
				</div>
			</div>
		</nav>

		<main class="container mx-auto px-4 text-white md:text-lg lg:px-40">{{ $slot }}</main>
		@vite('resources/js/app.js')
	</body>
</html>
