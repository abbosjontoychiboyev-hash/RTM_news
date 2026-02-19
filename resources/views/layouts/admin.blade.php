<!doctype html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen">

<header class="border-b border-white/10 bg-slate-950/70 backdrop-blur">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center gap-4">
        <a href="/" class="text-cyan-300 font-semibold">← Saytga qaytish</a>

        <nav class="ml-auto flex items-center gap-3">
            <a href="{{ route('xodimlar.index') }}" class="px-3 py-2 rounded-lg hover:bg-white/10">Xodimlar</a>
            <a href="{{ route('yangiliklar.index') }}" class="px-3 py-2 rounded-lg hover:bg-white/10">Yangiliklar</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20">Logout</button>
            </form>
        </nav>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 py-8">
    @if(session('ok'))
        <div class="mb-5 p-4 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-200">
            {{ session('ok') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-5 p-4 rounded-xl bg-rose-500/15 border border-rose-500/30 text-rose-200">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>
