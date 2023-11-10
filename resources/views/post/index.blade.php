<x-app-layout>
    <div class="mb-8 flex flex-col">
        <h1 class="text-2xl font-bold text-blue-500 dark:text-blue-400">Random Thoughts</h1>
        <a
            href="/thoughts/categories"
            class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600"
            >All Categories</a
        >
    </div>

    <x-posts-list :posts="$posts" />
</x-app-layout>
