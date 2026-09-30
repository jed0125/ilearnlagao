<x-guest-layout>
    {{-- Matches the registration card: title + school branding inside the dark card --}}
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold tracking-tight text-white">Welcome back</h1>
        <p class="mt-2 text-sm text-zinc-400">iLearnLagao · Lagao National High School</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="mb-1.5 block text-sm text-zinc-400">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="name@school.edu.ph"
                class="w-full rounded-lg border border-zinc-700 bg-[#111] px-4 py-3 text-white placeholder-zinc-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="mb-1.5 block text-sm text-zinc-400">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                class="w-full rounded-lg border border-zinc-700 bg-[#111] px-4 py-3 text-white placeholder-zinc-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                required
                autocomplete="current-password"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-zinc-600 bg-[#111] text-blue-500 shadow-sm focus:ring-blue-500 focus:ring-offset-0"
                    name="remember"
                >
                <span class="ms-2 text-sm text-zinc-400">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-400 hover:text-blue-300" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <button
            type="submit"
            class="w-full rounded-lg bg-blue-500 py-3 px-4 font-semibold text-white transition-colors hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-[#1a1a1a]"
        >
            Log in
        </button>

        <p class="pt-1 text-center text-sm text-zinc-400">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-blue-400 hover:text-blue-300">Create account</a>
        </p>
    </form>
</x-guest-layout>
