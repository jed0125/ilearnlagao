<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Student Dashboard - iLearnLagao</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#0a0a0a] text-white">
        {{-- Fixed left nav (~220px); collapses to top bar + drawer on mobile --}}
        <x-dashboard-sidebar active="dashboard" role="student" />

        {{-- Main + right widgets sit beside the fixed sidebar --}}
        <div class="min-h-screen lg:pl-[220px]">
            <div class="mx-auto flex max-w-7xl flex-col gap-8 px-4 pb-10 pt-20 lg:flex-row lg:px-8 lg:pt-8">

                {{-- Center column: lessons + assignments --}}
                <main class="min-w-0 flex-1 space-y-10">
                    <section>
                        <h2 class="mb-4 text-2xl font-semibold tracking-tight text-white">Recent lessons</h2>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            {{-- Placeholder lesson cards until the lessons module is wired --}}
                            <article class="overflow-hidden rounded-xl bg-[#1a1a1a]">
                                <div class="h-28 bg-[#1e3a5f]"></div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-white">Cell structure</h3>
                                    <p class="mt-1 text-sm text-zinc-400">Biology · posted Mon</p>
                                </div>
                            </article>
                            <article class="overflow-hidden rounded-xl bg-[#1a1a1a]">
                                <div class="h-28 bg-[#1a3d2e]"></div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-white">Derivatives intro</h3>
                                    <p class="mt-1 text-sm text-zinc-400">Calculus · posted Wed</p>
                                </div>
                            </article>
                        </div>
                    </section>

                    <section>
                        <h2 class="mb-4 text-2xl font-semibold tracking-tight text-white">Assignments</h2>
                        <div class="rounded-xl bg-[#1a1a1a] px-5 py-6">
                            <p class="text-zinc-400">No assignments due right now.</p>
                        </div>
                    </section>
                </main>

                {{-- Right rail: to-do list + recent grades --}}
                <aside class="w-full shrink-0 space-y-8 lg:w-72">
                    <section>
                        <h2 class="mb-4 text-xl font-semibold tracking-tight text-white">To do</h2>
                        <div class="rounded-xl bg-[#1a1a1a] px-5 py-4">
                            <p class="font-medium text-white">Lab report</p>
                            <p class="mt-1 text-sm text-zinc-400">Due Friday, 5:00 PM</p>
                        </div>
                    </section>

                    <section>
                        <h2 class="mb-4 text-xl font-semibold tracking-tight text-white">Recent grades</h2>
                        <div class="rounded-xl bg-[#1a1a1a] px-5 py-4">
                            <div class="flex items-center justify-between gap-3">
                                <p class="font-medium text-white">Quiz 1</p>
                                <span class="font-semibold text-emerald-400">88 / 100</span>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </body>
</html>
