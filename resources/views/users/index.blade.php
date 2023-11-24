@section('title', 'Profile')

<x-app-layout>
    <h1 class="mb-4 text-2xl font-bold md:text-3xl">Profile</h1>

    <section class="mb-8 border-b border-border-light dark:border-border-dark">
        <h2 class="mb-4 text-xl font-bold">Update Password</h2>
        <form method="POST" action="{{ route('user-password.update') }}" class="mb-4">
            @csrf @method('PUT')

            <formgroup class="flex flex-col space-y-2">
                <label for="current_password" class="font-bold">Current Password</label>
                @error('current_password')
                <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
                @enderror
                <input
                    id="current_password"
                    type="password"
                    name="current_password"
                    class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                    required
                />
            </formgroup>
            <formgroup class="flex flex-col space-y-2">
                <label for="password" class="font-bold">New Password</label>
                @error('password')
                <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
                @enderror
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                    autocomplete="new-password"
                    required
                />
            </formgroup>

            <formgroup class="flex flex-col space-y-2">
                <label for="password_confirmation" class="font-bold">Confirm New Password</label>
                @error('password_confirmation')
                <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
                @enderror
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                    autocomplete="new-password"
                    required
                />
            </formgroup>

            <formgroup class="flex items-center justify-between align-middle">
                <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Update Password</button>
            </formgroup>
        </form>
    </section>

    <section>
        <h2 class="mb-4 text-xl font-bold">Two-Factor Auth</h2>

        @if(!auth()->user()->two_factor_secret)
        <form method="POST" action="{{ route('two-factor.enable') }}" class="mb-4">
            @csrf
            <formgroup class="flex items-center justify-between align-middle">
                <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Enable Two-Factor Auth</button>
            </formgroup>
        </form>
        @else

        <form method="POST" action="{{ route('two-factor.disable') }}" class="mb-4">
            @csrf @method('DELETE')
            <formgroup class="flex items-center justify-between align-middle">
                <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white">Disable Two-Factor Auth</button>
            </formgroup>
        </form>
        @endif

        <!-- 2fa enabled but not confirmed yet -->
        @if (session('status') == 'two-factor-authentication-enabled')
        <div class="mb-4 text-sm font-medium">Please finish configuring two-factor authentication below.</div>
        @endif

        <!-- 2fa disabled -->
        @if (session('status') == 'two-factor-authentication-disabled')
        <div class="mb-4 text-sm font-medium">Two-factor authentication has been disabled.</div>
        @endif

        <!-- 2fa enabled and confirmed -->
        @if (session('status') == 'two-factor-authentication-confirmed')
        <div class="mb-4 text-sm font-medium">Two factor authentication confirmed and enabled successfully.</div>
        @endif

        <!-- Show confirmation form -->
        @if(auth()->user()->two_factor_secret && !auth()->user()->two_factor_confirmed_at)
        <!-- Show QR code if 2fa enabled -->
        <div class="py-4">{!! auth()->user()->twoFactorQrCodeSvg() !!}</div>
        <div class="py-4">
            <h2 class="text-xl font-bold md:text-2xl">Recovery Codes</h2>
            <p>Keep these in a safe spot, they will not be shown again.</p>
            @foreach(auth()->user()->recoveryCodes() as $code)
            <p class="py-2">{{ $code }}</p>
            @endforeach
        </div>
        <h2 class="text-xl font-bold md:text-2xl">Confirm Two-Factor Auth:</h2>
        <form method="POST" action="{{ route('two-factor.confirm') }}" class="mb-4">
            @csrf
            <formgroup class="flex flex-col space-y-2">
                <label for="code" class="font-bold">Code</label>
                @error('code')
                <span class="rounded border border-red-500 bg-red-300 p-2 text-red-900">{{ $message }}</span>
                @enderror
                <input
                    id="code"
                    type="text"
                    name="code"
                    class="inset-1 rounded px-4 py-2 shadow dark:bg-slate-700"
                    placeholder="123456"
                    required
                />
            </formgroup>
            <formgroup class="flex items-center justify-between pt-2 align-middle">
                <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Confirm</button>
            </formgroup>
        </form>
        @endif
    </section>
</x-app-layout>
