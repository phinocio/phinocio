@section('title', 'Home')

<x-app-layout>
    <section class="mb-8">
        <p class="leading-loose">
            Hi I'm Phin. I'm just a nerd that likes making websites and reading about cool tech stuff. This is my own
            small corner of the internet to show some stuff I've made, and write some random thoughts no one will ever
            read.
        </p>
    </section>

    <section class="mb-8">
        <h1 class="mb-4 text-2xl md:text-3xl  font-bold">Projects</h1>
{{--        <ul>--}}
{{--            <li>--}}
{{--                <a--}}
{{--                    href="#"--}}
{{--                    class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"--}}
{{--                    >Load Order Library</a--}}
{{--                >--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a--}}
{{--                    href="#"--}}
{{--                    class="text-blue-600 hover:text-blue-400 active:text-blue-400 dark:text-blue-400 dark:hover:text-blue-600 dark:active:text-blue-600"--}}
{{--                    >Nazeem</a--}}
{{--                >--}}
{{--            </li>--}}
{{--        </ul>--}}
        <x-projects-list :projects="$projects" />
    </section>

    <section>
        <h1 class="mb-4 text-2xl md:text-3xl  font-bold">Random Thoughts</h1>

        <x-posts-list :posts="$posts" />
    </section>
</x-app-layout>
