<x-app-layout>
    <h1 class="mb-8 text-2xl font-bold">
        Random Thoughts in <span class="text-blue-500 dark:text-blue-400">{{ $category->name }}</span>
    </h1>
    <x-posts-list :posts="$category->posts" />
</x-app-layout>
