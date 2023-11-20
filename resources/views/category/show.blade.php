@section('title', ucfirst($category->name) . " Thoughts")

<x-app-layout>
    <h1 class="mb-8 text-3xl font-bold">
        Random Thoughts about <span class="text-blue-500 dark:text-blue-400">{{ $category->name }}</span>
    </h1>
    <x-posts-list :posts="$category->publishedPosts" />
</x-app-layout>
