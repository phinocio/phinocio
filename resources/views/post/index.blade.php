@section('title', 'All Thoughts')

<x-app-layout>
    <section class="mb-8">
        <h1 class="mb-4 text-3xl font-bold">Random Thoughts</h1>

        <x-posts-list :posts="$posts" />
    </section>
    <section>
        <h1 class="mb-4 text-3xl font-bold">Categories</h1>
        <x-categories-list :categories="$categories" />
    </section>
</x-app-layout>
