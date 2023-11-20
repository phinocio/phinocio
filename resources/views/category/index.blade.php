@section('title', 'All Categories')

<x-app-layout>
    <h1 class="mb-4 text-2xl font-bold">Categories</h1>
    <x-categories-list :categories="$categories" />
</x-app-layout>
