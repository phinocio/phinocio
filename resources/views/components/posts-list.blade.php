@foreach($posts as $post)
<li {{ $attributes->
	class(['space-x-2']) }}>
	<a href="/thoughts/{{ $post->slug }}" class="text-green-200 visited:text-red-300 hover:text-green-400"
		><span class="font-mono">{{ $post->published_at->format("Y-m-d") }}</span> <span class="px-2">-</span> {{
		$post->title }}
	</a>
	@foreach($post->categories as $category)
	<button class="text-sm italic text-blue-200">
		<a href="/thoughts/categories/{{ $category->slug }}" class="hover:text-blue-400">{{ $category->name }}</a>
	</button>
	@endforeach
</li>
@endforeach
