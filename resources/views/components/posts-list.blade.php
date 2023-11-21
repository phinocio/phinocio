<ul class="space-y-2">
    @forelse($posts as $post)
    <li>
        <span class="font-mono text-sm">{{ $post->published_at->format("Y-m-d") }} - </span>
        <a
            href="/thoughts/{{ $post->slug }}"
            class="text-blue-600 visited:text-red-600 hover:text-blue-400 visited:hover:text-red-400 active:text-blue-400 visited:active:text-red-400 dark:text-blue-400 dark:visited:text-red-400 dark:hover:text-blue-600 dark:visited:hover:text-red-600 dark:active:text-blue-600 dark:visited:active:text-red-600"
        >
            {{ $post->title }}
        </a>
{{--        <section>--}}
{{--            @foreach($post->categories as $category)--}}
{{--            <a--}}
{{--                href="/thoughts/categories/{{ $category->slug }}"--}}
{{--                class="text-sm italic text-text-light dark:text-text-dark"--}}
{{--                >{{ $category->name }}</a--}}
{{--            >--}}
{{--            @endforeach--}}
{{--        </section>--}}
    </li>
    @empty
        <p class="italic">No thoughts here</p>
    @endforelse
</ul>
