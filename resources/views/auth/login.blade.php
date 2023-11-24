@section('title', 'Login')

<x-app-layout>
    <div class="container mx-auto w-1/2">
        <h1 class="mb-4 text-2xl font-bold md:text-3xl">Login</h1>
        @if ($errors->any())
        <ul class="list-inside list-disc space-y-2">
            @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <formgroup class="flex flex-col space-y-2">
                <label for="name" class="font-bold">Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                    autofocus
                    autocomplete="name"
                />
            </formgroup>

            <formgroup class="flex flex-col space-y-2">
                <label for="password" class="font-bold">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                />
            </formgroup>

            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Login</button>
        </form>
    </div>
</x-app-layout>
