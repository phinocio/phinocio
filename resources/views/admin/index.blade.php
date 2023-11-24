@section('title', 'Admin')

<x-app-layout>
    <h1 class="mb-4 text-3xl font-bold">Published Posts</h1>
    <table class="mb-20 w-full">
        <thead>
            <tr class="border-b border-border-light dark:border-border-dark">
                <th>Title</th>
                <th>Category</th>
                <th>Published</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($posts as $post) @if($post->published_at !== null)
            <tr class="border-b border-border-light dark:border-border-dark">
                <td class="py-2">
                    <a
                        href="/thoughts/{{ $post->slug }}"
                        class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                        >{{ $post->title }}</a
                    >
                </td>
                <td>
                    @foreach($post->categories as $category)
                    <span class="">{{ $category->name }}</span>
                    @endforeach
                </td>
                <td>{{ $post->published_at?->diffForHumans() ?? "Unpublished" }}</td>
                <td>{{ $post->created_at->format( 'Y-m-d T') }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    <a
                        href="/thoughts/{{ $post->slug }}/edit"
                        class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                        >Edit</a
                    >
                    |
                    <form action="/thoughts/{{ $post->slug }}" method="POST" class="inline">
                        @csrf @method('DELETE')

                        <button
                            class="text-red-600 hover:text-red-400 active:text-red-400 dark:text-red-400 dark:hover:text-red-600 dark:active:text-red-600"
                        >
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endif @endforeach
        </tbody>
    </table>

    <h1 class="mb-4 text-3xl font-bold">Unpublished Posts</h1>
    <table class="mb-20 w-full">
        <thead>
            <tr class="border-b border-border-light dark:border-border-dark">
                <th>Title</th>
                <th>Category</th>
                <th>Published</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($posts as $post) @if($post->published_at === null)
            <tr class="border-b border-border-light dark:border-border-dark">
                <td class="py-2">
                    <a
                        href="/thoughts/{{ $post->slug }}"
                        class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                        >{{ $post->title }}</a
                    >
                </td>
                <td>
                    @foreach($post->categories as $category)
                    <span class="">{{ $category->name }}</span>
                    @endforeach
                </td>
                <td>{{ $post->published_at?->diffForHumans() ?? "Unpublished" }}</td>
                <td>{{ $post->created_at->format( 'Y-m-d T') }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    <a
                        href="/thoughts/{{ $post->slug }}/edit"
                        class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
                        >Edit</a
                    >
                    |
                    <form action="/thoughts/{{ $post->slug }}" method="POST" class="inline">
                        @csrf @method('DELETE')

                        <button
                            class="text-red-600 hover:text-red-400 active:text-red-400 dark:text-red-400 dark:hover:text-red-600 dark:active:text-red-600"
                        >
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endif @endforeach
        </tbody>
    </table>
</x-app-layout>
