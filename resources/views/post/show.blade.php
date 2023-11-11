@section('title', $post->title)

<x-app-layout>
    <article class="space-y-6">
        <!-- Post Info -->
        <header class="mb-20 space-y-2">
            <h1 class="text-3xl font-bold text-blue-500 dark:text-blue-400">{{ $post->title }}</h1>
            <div class="flex flex-col text-sm">
                <!-- TODO: Run through some kind of JS localization library. -->
                <p>Published: {{ $post->published_at?->diffForHumans() ?? 'Unpublished' }}</p>
                <p>Updated: {{ $post->updated_at->diffForHumans()}}</p>
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
        {{--
        <hr class="mx-auto h-0.5 w-1/2 border-0 bg-slate-400" />
        --}}
        <!-- Post Content -->
        <section class="space-y-8">{!! $post->content !!}</section>
    </article>
</x-app-layout>
