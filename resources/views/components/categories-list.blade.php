@foreach( $categories as $category )
<a
    href="/thoughts/categories/{{ $category->slug }}"
    class="block text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"
    >{{ $category->name }}
    <span class="text-sm text-text-light dark:text-text-dark">{{ count($category->posts) }} thoughts</span></a
>
@endforeach
