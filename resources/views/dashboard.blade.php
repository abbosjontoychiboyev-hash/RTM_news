@extends('layouts.site')

@section('content')
  <div class="glass-card p-8 text-white">
    <h1 class="text-2xl font-bold mb-2">Dashboard</h1>
    <p class="text-white/70">Siz tizimga kirdingiz ✅</p>

    <div class="mt-6 flex gap-3">
      <a class="glass-btn" href="{{ route('xodimlar.index') }}">Xodimlar</a>
      <a class="glass-btn" href="{{ route('yangiliklar.index') }}">Yangiliklar</a>
    </div>
  </div>
@endsection
