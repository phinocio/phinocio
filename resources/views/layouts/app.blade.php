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
		<header class="mb-6 bg-blue-300 px-4 py-2">
			<nav class="container mx-auto flex flex-col bg-red-200">
				<div class="flex justify-between align-middle">
					<a href="/" class="text-xl font-bold">Phinocio</a>
					<div>right</div>
				</div>
			</nav>
		</header>
		<main class="container mx-auto px-4 text-white md:text-lg lg:px-40">{{ $slot }}</main>
		@vite('resources/js/app.js')
	</body>
</html>
