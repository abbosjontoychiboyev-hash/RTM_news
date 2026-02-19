@extends('layouts.admin')
@section('title','Yangiliklar')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Yangiliklar</h1>

    <a href="{{ route('yangiliklar.create') }}"
       class="px-4 py-2 rounded-xl bg-cyan-500/20 border border-cyan-400/30 hover:bg-cyan-500/30">
        + Yangi yangilik
    </a>
</div>

@if(session('ok'))
    <div class="mb-4 p-3 rounded-xl bg-emerald-500/15 border border-emerald-500/30">
        {{ session('ok') }}
    </div>
@endif

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
@foreach($yangiliklar as $y)
    <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
        <div class="w-full h-44 rounded-xl overflow-hidden bg-white/10 flex items-center justify-center">
            @if($y->rasm)
                <img src="{{ asset('storage/'.$y->rasm) }}" class="w-full h-full object-cover" alt="">
            @else
                <span class="text-slate-400">NO IMAGE</span>
            @endif
        </div>

        <div class="mt-4">
            <div class="font-semibold text-white line-clamp-1">
                {{ $y->sarlavha }}
            </div>
            <div class="text-slate-400 text-sm mt-1 line-clamp-3 whitespace-pre-wrap">
                {{ $y->matn }}
            </div>

            <div class="text-xs text-slate-500 mt-3">
                ID: {{ $y->id }} · {{ optional($y->created_at)->format('Y-m-d H:i') }}
            </div>
        </div>

        <div class="flex flex-wrap gap-2 mt-4">
            <a href="{{ route('yangiliklar.edit',$y->id) }}"
               class="px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20">
                Edit
            </a>

            <form method="POST" action="{{ route('yangiliklar.destroy',$y->id) }}"
                  onsubmit="return confirm('O‘chirasizmi?')">
                @csrf
                @method('DELETE')
                <button class="px-3 py-2 rounded-lg bg-rose-500/15 border border-rose-500/30 hover:bg-rose-500/25">
                    Delete
                </button>
            </form>

            @if($y->cta_text && $y->cta_url)
                <a href="{{ $y->cta_url }}" target="_blank"
                   class="px-3 py-2 rounded-lg bg-emerald-500/15 border border-emerald-500/30 hover:bg-emerald-500/25">
                    CTA
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
@endsection
