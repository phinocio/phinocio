<x-app-layout>
    <article class="space-y-6">
        <!-- Post Info -->
        <header class="mb-12 space-y-2">
            <h1 class="text-2xl font-bold text-blue-500 dark:text-blue-400">{{ $post->title }}</h1>
            <div class="flex flex-col text-sm">
                <!-- TODO: Run through some kind of JS localization library. -->
                <p>Published: {{ $post->published_at->diffForHumans() }}</p>
                <p>Updated: {{ $post->updated_at->diffForHumans() }}</p>
            </div>
            <p class="text-md {{ $post->summary ? 'italic' : 'hidden' }}">{{ $post->summary ?? '' }}</p>

            <div class="space-x-1">
                @foreach($post->categories as $category)
                <a
                    href="/thoughts/categories/{{ $category->slug }}"
                    class="rounded bg-red-300 px-2 py-1 text-sm text-black hover:bg-red-400 active:bg-red-400 dark:bg-red-400 dark:hover:bg-red-500 dark:active:bg-red-500"
                >
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
        </header>
        <!-- Post Content -->
        <section class="space-y-2">
            <h2 class="text-xl font-bold">Meow blah blah content</h2>
            <p>{{ $post->content }}</p>
        </section>
    </article>
</x-app-layout>
