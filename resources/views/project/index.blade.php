@section('title', 'Projects')

<x-app-layout>
    <h1 class="mb-4 text-2xl font-bold">Projects</h1>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @forelse($projects as $project)
        <section
            class="flex flex-col rounded-xl border border-border-light px-4 py-2 shadow-md dark:border-border-dark"
        >
            <header class="flex justify-between border-b border-border-light dark:border-border-dark">
                <h1 class="flex justify-between text-2xl font-bold">
                    <a
                        href="/projects/{{ $project->slug }}"
                        class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                    >
                        {{ Str::title($project->title) }}
                    </a>
                </h1>
                <span class="flex space-x-2">
                    @if($project->github)
                    <a href="{{ $project->github }}" target="_blank" rel="noopener noreferrer">
                        <x-icons.github class="h-6 w-6"
                    /></a>
                    @endif @if( $project->website )
                    <a href="{{ $project->website }}" target="_blank" rel="noopener noreferrer">
                        <x-icons.external class="h-6 w-6"
                    /></a>
                    @endif
                </span>
            </header>
            <p class="py-4">{{ $project->summary ?? "No summary provided." }}</p>
        </section>
        @empty
        <section>
            <p class="italic">No projects here</p>
        </section>
        @endforelse
    </div>
</x-app-layout>
