@section('title', $post->title)

<x-app-layout>
    <article>
        <!-- Post Info -->
        <header class="mb-20 space-y-4">
            <h1 class="text-3xl font-bold text-blue-500 dark:text-blue-400">{{ $post->title }}</h1>
            <div class="text-sm">
                <!-- TODO: Run through some kind of JS localization library. -->
                <p>Published: {{ $post->published_at?->diffForHumans() ?? 'Unpublished' }}</p>
                <p>Updated: {{ $post->updated_at->diffForHumans()}}</p>
            </div>
            <p class="text-md {{ $post->summary ? 'italic' : 'hidden' }}">{{ $post->summary ?? '' }}</p>

            <div class="flex space-x-2">
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
        {{--
        <hr class="mx-auto h-0.5 w-1/2 border-0 bg-slate-400" />
        --}}
        <!-- Post Content -->
        <section class="space-y-8">{!! $post->content !!}</section>
        @can('update', $post)
        <p class="mt-2 border-t border-border-light pt-2 text-right text-xs dark:border-border-dark">
            <a
                href="/thoughts/{{ $post->slug }}/edit"
                class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                >Edit this post</a
            >
        </p>
        @endcan
    </article>
</x-app-layout>
