<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Teacher Dashboard - iLearnLagao</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#0a0a0a] text-white">
        <x-dashboard-sidebar active="dashboard" role="teacher" />

        {{-- Content sits directly beside the 220px sidebar; columns stay close together --}}
        <div class="min-h-screen lg:pl-[220px]">
            <div class="grid grid-cols-1 gap-6 px-4 pb-8 pt-20 sm:px-6 lg:grid-cols-[minmax(0,1fr)_240px] lg:gap-6 lg:px-6 lg:pt-6">

                <main class="min-w-0 space-y-6">
                    <section>
                        <h2 class="mb-3 text-xl font-semibold tracking-tight text-white">My posted lessons</h2>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <article class="overflow-hidden rounded-xl bg-[#1a1a1a]">
                                <div class="h-24 bg-[#1e3a5f]" aria-hidden="true"></div>
                                <div class="px-4 py-3">
                                    <h3 class="font-semibold text-white">Cell structure</h3>
                                    <p class="mt-0.5 text-sm text-zinc-400">Biology · posted Mon</p>
                                </div>
                            </article>

                            <article class="overflow-hidden rounded-xl bg-[#1a1a1a]">
                                <div class="h-24 bg-[#1a3d2e]" aria-hidden="true"></div>
                                <div class="px-4 py-3">
                                    <h3 class="font-semibold text-white">Derivatives intro</h3>
                                    <p class="mt-0.5 text-sm text-zinc-400">Calculus · posted Wed</p>
                                </div>
                            </article>
                        </div>
                    </section>

                    <section>
                        <h2 class="mb-3 text-xl font-semibold tracking-tight text-white">Assignments</h2>
                        <div class="rounded-xl bg-[#1a1a1a] px-4 py-4">
                            <p class="text-sm text-zinc-400">3 active assignments across your sections.</p>
                        </div>
                    </section>
                </main>

                <aside class="space-y-6">
                    <section>
                        <h2 class="mb-3 text-xl font-semibold tracking-tight text-white">Pending grading</h2>
                        <div class="rounded-xl bg-[#1a1a1a] px-4 py-3">
                            <p class="font-medium text-white">Lab report</p>
                            <p class="mt-0.5 text-sm text-zinc-400">12 submissions to review</p>
                        </div>
                    </section>

                    <section>
                        <h2 class="mb-3 text-xl font-semibold tracking-tight text-white">Messages</h2>
                        <div class="rounded-xl bg-[#1a1a1a] px-4 py-3">
                            <p class="font-medium text-white">2 unread</p>
                            <p class="mt-0.5 text-sm text-blue-400">From students awaiting reply</p>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </body>
</html>
