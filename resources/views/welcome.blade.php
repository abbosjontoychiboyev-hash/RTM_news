<!doctype html>
<html lang="uz">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kokand University — Bosh sahifa</title>

    <!-- Tailwind CDN (welcome sahifa uchun tezkor yechim) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js (modal uchun) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* kichik qo‘shimcha: silliq scroll */
        html { scroll-behavior: smooth; }
    </style>
</head>

<body class="bg-slate-50 text-slate-900" x-data="{ newsOpen:false }">

@php
    // Kolleksiya/paginator bo‘lsa ham ishlashi uchun
    $newsCollection = $yangiliklar instanceof \Illuminate\Pagination\AbstractPaginator
        ? $yangiliklar->getCollection()
        : collect($yangiliklar ?? []);

    $staffCollection = $xodimlar instanceof \Illuminate\Pagination\AbstractPaginator
        ? $xodimlar->getCollection()
        : collect($xodimlar ?? []);

    $featured = $newsCollection->first();
    $latest8  = $newsCollection->take(8);
@endphp

<!-- TOP BAR -->
<div class="bg-red-800 text-white">
    <div class="max-w-7xl mx-auto px-4 py-2 flex flex-col sm:flex-row gap-2 sm:items-center sm:justify-between">
        <div class="flex flex-wrap gap-x-4 gap-y-1 text-sm opacity-95">
            <span class="inline-flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-red-300"></span>
                Kokand University — RTM kafedrasi
            </span>
            <span class="hidden sm:inline opacity-50">|</span>
            <span class="inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 12h18M3 19h18"/></svg>
                Akademik va yangiliklar
            </span>
        </div>

        <div class="flex items-center gap-2">

                <a href="https://www.kokanduni.uz/uz"
                   class="text-sm px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 border border-white/15">
                    Rasmiy sahifa
                </a>

        </div>
    </div>
</div>

<!-- HEADER / NAV -->
<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
        <a href="/" class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-xl overflow-hidden bg-white border border-slate-200 flex items-center justify-center">
                <img src="{{ asset('logo.jpg') }}"
                    alt="Logo"
                    class="w-full h-full object-contain p-1">
            </div>
            <div class="leading-tight">
                <div class="font-extrabold text-lg">Kokand University</div>
                <div class="text-xs text-slate-500">Ta’lim · Innovatsiya · Ilm-fan</div>
            </div>
        </a>

        <nav class="hidden md:flex items-center gap-6 text-sm font-semibold">
            <a href="#yangiliklar" class="text-slate-700 hover:text-red-700">Yangiliklar</a>
            <a href="#xodimlar" class="text-slate-700 hover:text-red-700">Xodimlar</a>
            <a href="#aloqa" class="text-slate-700 hover:text-red-700">Aloqa</a>
        </nav>

        <div class="md:hidden">
            <a href="#yangiliklar"
               class="px-3 py-2 rounded-lg bg-red-700 text-white text-sm font-semibold hover:bg-red-800">
                Bo‘limlar
            </a>
        </div>
    </div>
</header>

<!-- HERO -->
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-red-50 via-white to-sky-50"></div>
    <div class="absolute -top-20 -right-24 w-96 h-96 rounded-full bg-red-200/40 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-sky-200/40 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 py-12 md:py-16 grid md:grid-cols-12 gap-8 items-center">
        <div class="md:col-span-7">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-red-700/10 text-red-800 text-sm font-semibold">
                <span class="w-2 h-2 rounded-full bg-red-600"></span>
                Bosh sahifa
            </div>

            <h1 class="mt-4 text-3xl md:text-5xl font-extrabold leading-tight text-slate-900">
                Qo'qon universiteti - Raqamli texnologiyalar va matematika kafedrasi
            </h1>
            <p class="mt-4 text-slate-600 text-base md:text-lg max-w-2xl">
                <strong>Insoniyatning eng buyuk ixtirosi bu texnologiya emas,</strong>  balki texnologiya yordamida bir-birimiz bilan bog‘lanish qobiliyatimizdir. </br>
                <strong>Texnologiya bizga vaqtni tejash imkonini beradi,</strong> ammo o‘sha tejalgan vaqtni qanday sarflashimiz bizning madaniyatimizni belgilaydi.
            </p>


        </div>

        <div class="md:col-span-5">
            <!-- Featured news card -->
            <div class="rounded-3xl bg-white shadow-lg border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div class="font-extrabold text-slate-900">So‘nggi yangilik</div>
                    <a href="#yangiliklar" class="text-sm font-semibold text-red-700 hover:text-red-800">
                        Bo‘limga o‘tish →
                    </a>
                </div>

                @if($featured)
                    <div class="p-6">
                        <div class="w-full h-44 rounded-2xl overflow-hidden bg-slate-100 flex items-center justify-center">
                            @if($featured->rasm)
                                <img src="{{ asset('storage/'.$featured->rasm) }}" class="w-full h-full object-cover" alt="">
                            @else
                                <span class="text-slate-400 text-sm">Rasm yo‘q</span>
                            @endif
                        </div>

                        <div class="mt-4">
                            <div class="text-lg font-extrabold leading-snug">
                                {{ $featured->sarlovha ?? $featured->title ?? '—' }}
                            </div>
                            <div class="mt-2 text-slate-600 text-sm leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(($featured->matn ?? $featured->content ?? ''), 180) }}
                            </div>

                            <div class="mt-4 flex items-center justify-between text-xs text-slate-500">
                                <span>
                                    {{ optional($featured->created_at)->format('Y-m-d') }}
                                </span>
                                <button type="button"
                                        @click="newsOpen=true"
                                        class="font-semibold text-sky-700 hover:text-sky-800">
                                    Barchasini ko‘rish
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="p-6 text-slate-600">
                        Hozircha yangiliklar yo‘q.
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- YANGILIKLAR -->
<section id="yangiliklar" class="max-w-7xl mx-auto px-4 py-12">
    <div class="flex items-end justify-between gap-4">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold">Yangiliklar</h2>
            <p class="text-slate-600 mt-1">Kafedra yangiliklari</p>
        </div>
        <button type="button"
                @click="newsOpen=true"
                class="px-4 py-2 rounded-xl bg-red-700 text-white font-semibold hover:bg-red-800">
            Barcha yangiliklar
        </button>
    </div>

    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @forelse($latest8 as $y)
            <div class="rounded-2xl bg-white border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition">
                <div class="h-36 bg-slate-100 overflow-hidden flex items-center justify-center">
                    @if($y->rasm)
                        <img src="{{ asset('storage/'.$y->rasm) }}" class="w-full h-full object-cover" alt="">
                    @else
                        <span class="text-slate-400 text-sm">Rasm yo‘q</span>
                    @endif
                </div>

                <div class="p-4">
                    <div class="font-bold line-clamp-2">
                        {{ $y->sarlovha ?? $y->title ?? '—' }}
                    </div>
                    <div class="text-sm text-slate-600 mt-2 line-clamp-3 whitespace-pre-wrap">
                        {{ $y->matn ?? $y->content ?? '' }}
                    </div>
                    <div class="text-xs text-slate-500 mt-3">
                        {{ optional($y->created_at)->format('Y-m-d') }}
                    </div>

                    @php
                        $ctaText = $y->cta_text ?? null;
                        $ctaUrl  = $y->cta_url ?? null;
                    @endphp

                    @if($ctaText && $ctaUrl)
                        <a href="{{ $ctaUrl }}" target="_blank"
                           class="mt-3 inline-flex items-center justify-center w-full px-3 py-2 rounded-xl bg-sky-700/10 text-sky-900 font-semibold border border-sky-200 hover:bg-sky-700/15">
                            {{ $ctaText }}
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full p-6 rounded-2xl bg-white border border-slate-100 text-slate-600">
                Hozircha yangilik yo‘q.
            </div>
        @endforelse
    </div>
</section>

<!-- XODIMLAR -->
<section id="xodimlar" class="bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold">Xodimlar</h2>
                <p class="text-slate-600 mt-1">Jamoa a’zolari ro‘yxati.</p>
            </div>


        </div>

        <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse($staffCollection as $x)
                <div class="rounded-2xl border border-slate-100 bg-slate-50 overflow-hidden hover:shadow-md transition">
                    <div class="p-4 flex items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl overflow-hidden bg-white flex items-center justify-center border border-slate-100">
                            @if($x->rasm)
                                <img src="{{ asset('storage/'.$x->rasm) }}" class="w-full h-full object-cover" alt="">
                            @else
                                <span class="text-slate-400 text-xs">IMG</span>
                            @endif
                        </div>

                        <div class="min-w-0">
                            <div class="font-extrabold truncate">
                                {{ $x->full_name ?? $x->fio ?? $x->ism ?? $x->name ?? '—' }}
                            </div>
                            <div class="text-red-700 text-sm font-semibold truncate">
                                {{ $x->lavozim ?? $x->position ?? '' }}
                            </div>
                        </div>
                    </div>

                    <div class="px-4 pb-4 text-sm text-slate-600 space-y-1">
                        @if(!empty($x->telefon))
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-slate-500">Telefon</span>
                                <a class="font-semibold hover:text-red-700" href="tel:{{ $x->telefon }}">{{ $x->telefon }}</a>
                            </div>
                        @endif

                        @if(!empty($x->email))
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-slate-500">Email</span>
                                <a class="font-semibold hover:text-red-700 truncate" href="mailto:{{ $x->email }}">{{ $x->email }}</a>
                            </div>
                        @endif

                        @if(!empty($x->telegram))
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-slate-500">Telegram</span>
                                <a class="font-semibold hover:text-red-700 truncate" target="_blank"
                                   href="{{ str_starts_with($x->telegram,'http') ? $x->telegram : 'https://t.me/'.ltrim($x->telegram,'@') }}">
                                    {{ $x->telegram }}
                                </a>
                            </div>
                        @endif

                        @if(!empty($x->website))
                            <div class="pt-2">
                                <a target="_blank" href="{{ $x->website }}"
                                   class="inline-flex w-full items-center justify-center px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 font-semibold">
                                    Profil / Havola
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full p-6 rounded-2xl bg-slate-50 border border-slate-100 text-slate-600">
                    Hozircha xodimlar yo‘q.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer id="aloqa" class="bg-red-900 text-slate-200">
    <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
        <div>
            <div class="font-extrabold text-white text-lg">Kokand University</div>
            <div class="text-slate-400 mt-2 text-sm">
                Raqamli texnologiyalar va matematika kafedrasi
            </div><div class="text-slate-400 mt-2 text-sm">
                Kafedra mudiri: <strong>PhD. Qodirov S </strong>
            </div><div class="text-slate-400 mt-2 text-sm">
                Murojat uchun: B-304 13:30-16:20
            </div>
        </div>

        <div class="text-sm">
            <div class="font-bold text-white">Maxsus yo'nalishlar</div>
            <div class="mt-2 space-y-2">
                <a class="block hover:text-white" href="#">Matematika </a>
                <a class="block hover:text-white" href="#">Dasturlash asoslari</a>
                <a class="block hover:text-white" href="#">Data analitika</a>

            </div>
        </div>

        <div class="text-sm">
            <div class="font-bold text-white">Admin</div>
            <div class="mt-2">
                @auth
                    <a href="{{ route('xodimlar.index') }}"
                       class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-800 hover:bg-red-600 text-white font-semibold">
                        Admin panelga o‘tish
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 font-semibold">
                        Kirish
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 py-4 text-xs text-slate-400 flex flex-col sm:flex-row gap-2 sm:items-center sm:justify-between">
            <span>© {{ date('Y') }} Kokand University</span>
            <span class="opacity-80">Bosh sahifa </span>
        </div>
    </div>
</footer>

<!-- NEWS MODAL (barcha yangiliklar) -->
<div x-show="newsOpen" x-cloak
     class="fixed inset-0 z-50 flex items-end sm:items-center justify-center">
    <div class="absolute inset-0 bg-slate-900/60" @click="newsOpen=false"></div>

    <div class="relative w-full sm:max-w-4xl bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="font-extrabold text-lg">Barcha yangiliklar</div>
            <button class="p-2 rounded-xl hover:bg-slate-100" @click="newsOpen=false" aria-label="Yopish">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="p-5 max-h-[75vh] overflow-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($newsCollection as $y)
                    <div class="rounded-2xl border border-slate-100 overflow-hidden">
                        <div class="h-32 bg-slate-100 overflow-hidden flex items-center justify-center">
                            @if($y->rasm)
                                <img src="{{ asset('storage/'.$y->rasm) }}" class="w-full h-full object-cover" alt="">
                            @else
                                <span class="text-slate-400 text-sm">Rasm yo‘q</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <div class="font-bold line-clamp-2">
                                {{ $y->sarlovha ?? $y->title ?? '—' }}
                            </div>
                            <div class="text-sm text-slate-600 mt-2 line-clamp-4 whitespace-pre-wrap">
                                {{ $y->matn ?? $y->content ?? '' }}
                            </div>
                            <div class="text-xs text-slate-500 mt-3">
                                {{ optional($y->created_at)->format('Y-m-d H:i') }}
                            </div>

                            @php
                                $ctaText = $y->cta_text ?? null;
                                $ctaUrl  = $y->cta_url ?? null;
                            @endphp

                            @if($ctaText && $ctaUrl)
                                <a href="{{ $ctaUrl }}" target="_blank"
                                   class="mt-3 inline-flex w-full items-center justify-center px-3 py-2 rounded-xl bg-red-700/10 text-red-900 border border-red-200 font-semibold hover:bg-red-700/15">
                                    {{ $ctaText }}
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-6 rounded-2xl bg-slate-50 border border-slate-100 text-slate-600">
                        Hozircha yangilik yo‘q.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

</body>
</html>
