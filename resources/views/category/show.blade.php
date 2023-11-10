<x-app-layout>
    <h1 class="mb-8 text-2xl font-bold text-blue-500 dark:text-blue-400">
        Random Thoughts in <em>{{ $category->name }}</em>
    </h1>
    <x-posts-list :posts="$category->posts" />
</x-app-layout>
