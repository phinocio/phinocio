<x-app-layout>
	<h1 class="mb-2 text-3xl font-bold text-blue-300">Random Thoughts</h1>

	<ul>
		<x-posts-list :posts="$posts" />
	</ul>
</x-app-layout>
