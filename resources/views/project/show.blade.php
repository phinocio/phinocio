@section('title', $project->title)
<x-app-layout>
    <article>
        <!-- project Info -->
        <header class="mb-20 space-y-4">
            <h1 class="text-3xl font-bold text-blue-500 dark:text-blue-400">{{ $project->title }}</h1>

            <p class="text-md {{ $project->summary ? 'italic' : 'hidden' }}">{{ $project->summary ?? '' }}</p>
        </header>
        {{--
        <hr class="mx-auto h-0.5 w-1/2 border-0 bg-slate-400" />
        --}}
        <!-- project Content -->
        <section class="space-y-8">{!! $project->content !!}</section>
        @can('update', $project)
        <p class="mt-2 border-t border-border-light pt-2 text-right text-xs dark:border-border-dark">
            <a
                href="/projects/{{ $project->slug }}/edit"
                class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                >Edit this project</a
            >
        </p>
        @endcan
    </article>
</x-app-layout>
