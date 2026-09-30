@props(['active' => 'dashboard', 'role' => 'student'])

@php
    $dashboardRoute = $role === 'teacher' ? route('teacher.dashboard') : route('student.dashboard');
    $roleLabel = $role === 'teacher' ? 'Teacher' : 'Student';
    $navClass = fn (string $key) => $active === $key
        ? 'bg-blue-500/15 text-blue-400'
        : 'text-zinc-400 hover:bg-white/5 hover:text-zinc-200';
@endphp

{{-- Mobile top bar: branding + hamburger --}}
<header class="lg:hidden fixed top-0 inset-x-0 z-40 flex h-14 items-center justify-between border-b border-white/5 bg-[#111] px-4">
    <span class="text-lg font-semibold text-white">iLearnLagao</span>
    <button
        type="button"
        id="sidebar-toggle"
        class="rounded-lg p-2 text-zinc-300 hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-blue-500"
        aria-label="Open navigation"
    >
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</header>

{{-- Dim overlay when mobile drawer is open --}}
<div
    id="sidebar-overlay"
    class="lg:hidden fixed inset-0 z-40 hidden bg-black/60"
    onclick="toggleSidebar()"
></div>

{{-- Shared sidebar panel (drawer on mobile, fixed column on desktop) --}}
<aside
    id="sidebar-panel"
    class="fixed left-0 top-0 z-50 flex h-full w-[220px] -translate-x-full flex-col border-r border-white/5 bg-[#141414] text-white transition-transform duration-300 lg:translate-x-0"
>
    <div class="flex items-center justify-between px-5 py-6">
        <a href="{{ $dashboardRoute }}" class="text-lg font-semibold tracking-tight text-white">
            iLearnLagao
        </a>
        <button
            type="button"
            class="rounded-lg p-1 text-zinc-400 hover:text-white lg:hidden"
            onclick="toggleSidebar()"
            aria-label="Close navigation"
        >
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <nav class="flex-1 space-y-1 px-3">
        <a href="{{ $dashboardRoute }}" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ $navClass('dashboard') }}">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 5h6v6H4V5zm10 0h6v6h-6V5zM4 15h6v6H4v-6zm10 0h6v6h-6v-6z" />
            </svg>
            Dashboard
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ $navClass('lessons') }}">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h10" />
            </svg>
            Lessons
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ $navClass('assignments') }}">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="5" y="3" width="14" height="18" rx="2" />
                <path stroke-linecap="round" d="M9 8h6M9 12h6M9 16h4" />
            </svg>
            Assignments
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ $navClass('grades') }}">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 19V5M9 19v-8M13 19V9M17 19v-4" />
            </svg>
            Grades
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ $navClass('messages') }}">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v10H8l-4 4V6z" />
            </svg>
            Messages
        </a>
    </nav>

    {{-- Authenticated user + role, with logout beside the name --}}
    <div class="mt-auto border-t border-white/5 px-4 py-4">
        <div class="flex items-center gap-2">
            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md border border-zinc-600 text-zinc-400" aria-hidden="true">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </span>
            <p class="min-w-0 flex-1 truncate text-sm text-zinc-400">
                {{ auth()->user()->name }} · {{ $roleLabel }}
            </p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="shrink-0 rounded-md px-2 py-1 text-xs font-medium text-zinc-400 transition-colors hover:bg-white/5 hover:text-white"
                    title="Log out"
                >
                    Log out
                </button>
            </form>
        </div>
    </div>
</aside>

<script>
    function toggleSidebar() {
        const panel = document.getElementById('sidebar-panel');
        const overlay = document.getElementById('sidebar-overlay');
        panel.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }

    document.getElementById('sidebar-toggle')?.addEventListener('click', toggleSidebar);
</script>
