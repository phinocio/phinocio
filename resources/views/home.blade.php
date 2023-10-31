<x-app-layout>
	<p class="mb-8">
		Hi I'm Phin. I'm just a nerd that likes making websites and reading about cool tech stuff. This is my own small
		corner of the internet to show some stuff I've made, and write some random thoughts no one will ever read.
	</p>

	<div class="space-y-8">
		<div>
			<h1 class="mb-2 text-3xl font-bold text-blue-300">Projects</h1>
			<ul>
				<li class="text-green-200">
					<a href="#" class="visited:text-red-300 hover:text-green-400">Load Order Library</a>
				</li>
				<li class="text-green-200"><a href="#" class="visited:text-red-300 hover:text-green-400">Nazeem</a></li>
			</ul>
		</div>

		<div>
			<h1 class="mb-2 text-3xl font-bold text-blue-300">Random Thoughts</h1>
			<ul>
				@foreach($posts as $post)
				<li class="list-item">
					<a
						href="/thoughts/{{ $post->slug }}"
						class="text-green-200 visited:text-red-300 hover:text-green-400"
						><span class="font-mono">{{ $post->published_at->format("Y-m-d") }}</span>
						<span class="px-2">-</span> {{ $post->title }}
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</x-app-layout>
