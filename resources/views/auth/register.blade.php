<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold tracking-tight text-white">Create your account</h1>
        <p class="mt-2 text-sm text-zinc-400">iLearnLagao · Lagao National High School</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- Student / Teacher pill toggle; value posted via hidden input --}}
        <div>
            <label class="mb-1.5 block text-sm text-zinc-400">I am a</label>
            <div class="flex rounded-full bg-[#111] p-1 ring-1 ring-zinc-700">
                <button
                    type="button"
                    onclick="setRole('student')"
                    id="student-btn"
                    class="flex-1 rounded-full py-2.5 text-sm font-medium transition-colors bg-blue-500 text-white"
                >
                    Student
                </button>
                <button
                    type="button"
                    onclick="setRole('teacher')"
                    id="teacher-btn"
                    class="flex-1 rounded-full py-2.5 text-sm font-medium transition-colors text-zinc-400 hover:text-white"
                >
                    Teacher
                </button>
            </div>
            <input type="hidden" name="role" id="role-input" value="{{ old('role', 'student') }}">
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div>
            <label for="name" class="mb-1.5 block text-sm text-zinc-400">Full name</label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Juan Dela Cruz"
                class="w-full rounded-lg border border-zinc-700 bg-[#111] px-4 py-3 text-white placeholder-zinc-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
            >
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Section is student-only; hidden when Teacher is selected --}}
        <div id="section-field">
            <label for="section" class="mb-1.5 block text-sm text-zinc-400">Section</label>
            <input
                type="text"
                id="section"
                name="section"
                placeholder="e.g. Grade 10 - Diamond"
                class="w-full rounded-lg border border-zinc-700 bg-[#111] px-4 py-3 text-white placeholder-zinc-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                value="{{ old('section') }}"
                autocomplete="organization-title"
            >
            <x-input-error :messages="$errors->get('section')" class="mt-2" />
        </div>

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
                autocomplete="new-password"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="mb-1.5 block text-sm text-zinc-400">Confirm Password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="••••••••"
                class="w-full rounded-lg border border-zinc-700 bg-[#111] px-4 py-3 text-white placeholder-zinc-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                required
                autocomplete="new-password"
            >
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="w-full rounded-lg bg-blue-500 py-3 px-4 font-semibold text-white transition-colors hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-[#1a1a1a]"
        >
            Create account
        </button>

        <p class="pt-1 text-center text-sm text-zinc-400">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-blue-400 hover:text-blue-300">Log in</a>
        </p>
    </form>

    <script>
        function setRole(role) {
            document.getElementById('role-input').value = role;
            const studentBtn = document.getElementById('student-btn');
            const teacherBtn = document.getElementById('teacher-btn');
            const sectionField = document.getElementById('section-field');
            const sectionInput = document.getElementById('section');

            const active = ['bg-blue-500', 'text-white'];
            const inactive = ['text-zinc-400', 'hover:text-white'];

            if (role === 'student') {
                studentBtn.classList.add(...active);
                studentBtn.classList.remove(...inactive);
                teacherBtn.classList.remove(...active);
                teacherBtn.classList.add(...inactive);
                sectionField.classList.remove('hidden');
                sectionInput.required = true;
            } else {
                teacherBtn.classList.add(...active);
                teacherBtn.classList.remove(...inactive);
                studentBtn.classList.remove(...active);
                studentBtn.classList.add(...inactive);
                sectionField.classList.add('hidden');
                sectionInput.required = false;
                sectionInput.value = '';
            }
        }

        // Restore selected role after validation errors
        document.addEventListener('DOMContentLoaded', function () {
            const role = document.getElementById('role-input').value || 'student';
            setRole(role);
        });
    </script>
</x-guest-layout>
