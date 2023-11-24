<x-app-layout>
    <h1 class="text-2xl font-bold">Confirm Password</h1>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <formgroup class="flex flex-col space-y-2">
            <label for="password" class="font-bold">Password</label>
            @error('password')
            <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
            @enderror
            <input
                id="password"
                type="password"
                name="password"
                class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                required
                autofocus
            />
        </formgroup>
        <formgroup class="flex items-center justify-between align-middle">
            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Confirm Password</button>
        </formgroup>
    </form>
</x-app-layout>
