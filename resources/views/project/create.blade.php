@section('title', 'Create Project')

<x-app-layout>
    {{-- @if ($errors->any())--}} {{--
    <ul class="list-inside list-disc space-y-2">
        --}} {{-- @foreach ($errors->all() as $error)--}} {{--
        <li class="text-red-500">{{ $error }}</li>
        --}} {{-- @endforeach--}} {{--
    </ul>
    --}} {{-- @endif--}}
    <!-- TODO: Add github and website fields -->
    <form method="post" action="/projects" id="markdownForm" class="space-y-4">
        @csrf
        <formgroup class="flex flex-col space-y-2">
            <label for="title" class="font-bold">Title </label>
            @error('title')
            <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
            @enderror
            <input
                id="title"
                type="text"
                name="title"
                class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                value="{{ old('title') }}"
            />
        </formgroup>

        <formgroup class="flex flex-col space-y-2">
            <label for="summary" class="font-bold">Summary </label>
            @error('summary')
            <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
            @enderror
            <input
                id="summary"
                type="text"
                name="summary"
                class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                value="{{ old('summary') }}"
            />
        </formgroup>

        <formgroup class="flex flex-col space-y-2">
            <label for="editor" class="font-bold">Content</label>
            @error('content')
            <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
            @enderror
            <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-light"></div>

            <input id="content" type="hidden" name="content" value="{{ old('content') }}" />
        </formgroup>

        <formgroup class="flex items-center justify-between align-middle">
            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Create Project</button>
        </formgroup>
    </form>

    @pushOnce('scripts') @vite('resources/js/editor.js') @endpushonce
</x-app-layout>
