@foreach($posts as $post)
<li {{ $attributes->
	class(['space-x-2', 'mb-2']) }}>
	<span class="font-mono text-sm">{{ $post->published_at->format("Y-m-d") }} -</span>
	<a href="/thoughts/{{ $post->slug }}" class="text-green-200 visited:text-red-300 hover:text-green-400">
		{{ $post->title }}
	</a>
	@foreach($post->categories as $category)
	<button class="hidden text-sm italic text-blue-200 md:inline-block">
		<a href="/thoughts/categories/{{ $category->slug }}" class="hover:text-blue-400">{{ $category->name }}</a>
	</button>
	@endforeach
</li>
@endforeach
