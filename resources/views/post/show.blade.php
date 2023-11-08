<x-app-layout>
	<article class="space-y-6">
		<section class="space-y-2">
			<div class="flex justify-between align-middle">
				<div>
					<h1 class="mb-2 text-3xl font-bold text-green-200">{{ $post->title }}</h1>
					@foreach($post->categories as $category)
					<button
						class="rounded bg-blue-300 px-4 py-1 text-sm text-blue-900 hover:bg-red-400 hover:text-red-900"
					>
						<a href="/thoughts/categories/{{ $category->slug }}">{{ $category->name }}</a>
					</button>
					@endforeach
				</div>
				<div class="text-right text-white/25">
					<p>Published: {{ $post->published_at }}</p>
					<p>Updated: {{ $post->updated_at }}</p>
				</div>
			</div>
		</section>
		<section>
			<p>{{ $post->content }}</p>
		</section>
	</article>
</x-app-layout>
