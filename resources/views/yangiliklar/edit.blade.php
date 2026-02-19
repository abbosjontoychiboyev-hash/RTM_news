@extends('layouts.admin')
@section('title','Yangilikni tahrirlash')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Tahrirlash</h1>
    <a href="{{ route('yangiliklar.index') }}"
       class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20">
        ← Orqaga
    </a>
</div>

@if ($errors->any())
    <div class="mb-4 p-3 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-200">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('yangiliklar.update', $yangilik) }}" enctype="multipart/form-data"
      class="p-4 rounded-2xl bg-white/5 border border-white/10 space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm text-slate-300 mb-1">Sarlovha *</label>
        <input name="sarlovha" value="{{ old('sarlovha', $yangilik->sarlovha) }}"
               class="w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white" required>
    </div>

    <div>
        <label class="block text-sm text-slate-300 mb-1">Matn</label>
        <textarea name="matn" rows="6"
                  class="w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white">{{ old('matn', $yangilik->matn) }}</textarea>
    </div>

    <div class="grid sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-slate-300 mb-1">CTA text</label>
            <input name="cta_text" value="{{ old('cta_text', $yangilik->cta_text) }}"
                   class="w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white">
        </div>
        <div>
            <label class="block text-sm text-slate-300 mb-1">CTA url</label>
            <input name="cta_url" value="{{ old('cta_url', $yangilik->cta_url) }}"
                   class="w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white">
        </div>
    </div>

    <div class="flex items-center gap-4">
        <div class="flex-1">
            <label class="block text-sm text-slate-300 mb-1">Yangi rasm</label>
            <input type="file" name="rasm"
                   class="w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white">
        </div>

        <div class="w-32 h-20 rounded-xl overflow-hidden bg-white/10 flex items-center justify-center">
            @if($yangilik->rasm)
                <img src="{{ asset('storage/'.$yangilik->rasm) }}" class="w-full h-full object-cover" alt="">
            @else
                <span class="text-slate-400 text-xs">NO IMAGE</span>
            @endif
        </div>
    </div>

    <div class="flex gap-3">
        <button class="px-4 py-2 rounded-xl bg-cyan-500/20 border border-cyan-400/30 hover:bg-cyan-500/30">
            Yangilash
        </button>
        <a href="{{ route('yangiliklar.index') }}"
           class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20">
            Bekor qilish
        </a>
    </div>
</form>
@endsection
