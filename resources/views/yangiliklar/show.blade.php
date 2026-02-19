@extends('layouts.site')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6">
  <div>
    <h1 class="space-grotesk text-3xl font-bold text-white">{{ $yangilik->sarlavha }}</h1>
    <p class="text-white/60 mt-1">
      Sana: {{ $yangilik->sanasi ? \Carbon\Carbon::parse($yangilik->sanasi)->format('d.m.Y') : '—' }}
    </p>
  </div>

  <div class="flex flex-wrap gap-2">
    <a href="{{ route('yangiliklar.edit', $yangilik) }}" class="glass-btn">Tahrirlash</a>
    <a href="{{ route('yangiliklar.index') }}" class="glass-btn">← Orqaga</a>
  </div>
</div>

@php
  $img = null;
  if(!empty($yangilik->rasm)){
    $img = \Illuminate\Support\Str::startsWith($yangilik->rasm, ['http://','https://'])
      ? $yangilik->rasm
      : asset('storage/'.$yangilik->rasm);
  }
@endphp

<div class="glass-card p-6">
  @if($img)
    <div class="w-full aspect-[16/9] rounded-3xl overflow-hidden border border-white/10 bg-white/5">
      <img src="{{ $img }}" alt="" class="w-full h-full object-cover">
    </div>
  @endif

  <div class="mt-6 text-white/80 leading-relaxed whitespace-pre-wrap">
    {{ $yangilik->malumot }}
  </div>
</div>
@endsection
