@section('title', '2FA Challenge')

<x-app-layout>
    <div class="container mx-auto w-1/2">
        <h1 class="mb-4 text-2xl font-bold md:text-3xl">2FA Challenge</h1>
        @if ($errors->any())
        <ul class="list-inside list-disc space-y-2">
            @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="/two-factor-challenge" class="space-y-4">
            @csrf
            <formgroup class="flex flex-col space-y-2">
                <label for="code" class="font-bold">2FA Code</label>
                <input id="code" type="text" name="code" class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700" />
            </formgroup>

            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Login</button>
        </form>

        <form method="POST" action="/two-factor-challenge" class="space-y-4">
            @csrf
            <formgroup class="flex flex-col space-y-2">
                <label for="recovery_code" class="font-bold">Recovery Code</label>
                <input
                    id="recovery_code"
                    type="text"
                    name="recovery_code"
                    class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                />
            </formgroup>

            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Login</button>
        </form>
    </div>
</x-app-layout>
