@extends('layouts.site')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6">
  <div>
    <h1 class="space-grotesk text-3xl font-bold text-white">{{ $xodim->full_name }}</h1>
    <p class="text-white/60 mt-1">Xodim profili</p>
  </div>

  <div class="flex flex-wrap gap-2">
    <a href="{{ route('xodimlar.edit', $xodim) }}" class="glass-btn">Tahrirlash</a>
    <a href="{{ route('xodimlar.index') }}" class="glass-btn">← Orqaga</a>
  </div>
</div>

@php
  $img = null;
  if(!empty($xodim->rasm)){
    $img = \Illuminate\Support\Str::startsWith($xodim->rasm, ['http://','https://'])
      ? $xodim->rasm
      : asset('storage/'.$xodim->rasm);
  }
  $fanlarArr = [];
  if(isset($xodim->fanlar)){
    $fanlarArr = is_array($xodim->fanlar) ? $xodim->fanlar : (json_decode($xodim->fanlar, true) ?: []);
  }
@endphp

<div class="glass-card p-6">
  <div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-6">
    <div>
      <div class="w-full aspect-[4/3] rounded-3xl overflow-hidden bg-white/5 border border-white/10 flex items-center justify-center">
        @if($img)
          <img src="{{ $img }}" alt="" class="w-full h-full object-cover">
        @else
          <div class="text-white/40">Rasm yo‘q</div>
        @endif
      </div>

      @if($xodim->is_director)
        <div class="mt-3 inline-flex items-center gap-2 px-3 py-2 rounded-full bg-cyan-500/15 border border-cyan-500/30 text-cyan-200 text-sm">
          Mudir
        </div>
      @endif
    </div>

    <div class="space-y-4">
      <div class="glass-card p-5 border border-white/10">
        <div class="text-white/60 text-sm">Telefon</div>
        <div class="text-white font-semibold">{{ $xodim->phone ?? '—' }}</div>
      </div>

      <div class="glass-card p-5 border border-white/10">
        <div class="text-white/60 text-sm">Fanlar</div>
        @if(count($fanlarArr))
          <div class="flex flex-wrap gap-2 mt-2">
            @foreach($fanlarArr as $f)
              <span class="px-3 py-2 rounded-full bg-white/5 border border-white/10 text-white/80 text-sm">
                {{ $f }}
              </span>
            @endforeach
          </div>
        @else
          <div class="text-white/70 mt-1">—</div>
        @endif
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="glass-card p-5 border border-white/10">
          <div class="text-white/60 text-sm">Ish vaqti</div>
          <div class="text-white font-semibold mt-1">
            {{ $xodim->ish_vaqti_start ?? '—' }} – {{ $xodim->ish_vaqti_end ?? '—' }}
          </div>
        </div>

        <div class="glass-card p-5 border border-white/10">
          <div class="text-white/60 text-sm">Qabul vaqti</div>
          <div class="text-white font-semibold mt-1">
            {{ $xodim->qabul_vaqti_start ?? '—' }} – {{ $xodim->qabul_vaqti_end ?? '—' }}
          </div>
        </div>
      </div>

      <div class="glass-card p-5 border border-white/10">
        <div class="text-white/60 text-sm">Qabul xonasi</div>
        <div class="text-white font-semibold">{{ $xodim->qabul_xonasi ?? '—' }}</div>
      </div>
    </div>
  </div>
</div>
@endsection
