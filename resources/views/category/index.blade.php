<x-app-layout>
    <h1 class="mb-8 text-2xl font-bold text-blue-500 dark:text-blue-400">All Categories</h1>
    @foreach($categories as $category)
    <a
        href="/thoughts/categories/{{ $category->slug }}"
        class="block text-xl text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
        >{{ $category->name }}
        <span class="text-sm text-text-light dark:text-text-dark">{{ count($category->posts) }} thoughts</span></a
    >

    @endforeach
</x-app-layout>
