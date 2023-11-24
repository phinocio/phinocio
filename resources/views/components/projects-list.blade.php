<ul class="space-y-2">
    @forelse($projects as $project)
    <li>
        <a
            href="/projects/{{ $project->slug }}"
            class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
        >
            {{ $project->title }}
        </a>
    </li>
    @empty
    <li class="italic">No projects here</li>
    @endforelse
</ul>
