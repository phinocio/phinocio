<x-app-layout>
	<div class="space-y-8">
		<div>
			<h1 class="mb-2 text-3xl font-bold text-blue-300">Random Thoughts about <em>{{ $category->name }}</em></h1>

			<ul>
				<x-posts-list :posts="$category->posts" />
			</ul>
		</div>
	</div>
</x-app-layout>
