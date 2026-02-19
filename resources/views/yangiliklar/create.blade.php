@extends('layouts.admin')
@section('title','Yangi yangilik')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Yangi yangilik</h1>
    <a href="{{ route('yangiliklar.index') }}"
       class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20">
        ← Orqaga
    </a>
</div>

@if($errors->any())
    <div class="mb-4 p-3 rounded-xl bg-rose-500/15 border border-rose-500/30">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('yangiliklar.store') }}" enctype="multipart/form-data"
      class="space-y-4 p-4 rounded-2xl bg-white/5 border border-white/10">
    @csrf

    <div>
        <label class="text-sm text-slate-300">Sarlovha</label>
        <input name="sarlavha" value="{{ old('sarlavha') }}"
               class="mt-1 w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white"
               required>
    </div>

    <div>
        <label class="text-sm text-slate-300">Matn</label>
        <textarea name="matn" rows="6"
                  class="mt-1 w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white">{{ old('matn') }}</textarea>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-300">CTA text</label>
            <input name="cta_text" value="{{ old('cta_text') }}"
                   class="mt-1 w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white">
        </div>
        <div>
            <label class="text-sm text-slate-300">CTA url</label>
            <input name="cta_url" value="{{ old('cta_url') }}"
                   class="mt-1 w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white"
                   placeholder="https://...">
        </div>
    </div>

    <div>
        <label class="text-sm text-slate-300">Rasm</label>
        <input type="file" name="rasm" accept="image/*"
               class="mt-1 w-full rounded-xl bg-black/20 border border-white/10 px-3 py-2 text-white">
    </div>

    <button class="px-4 py-2 rounded-xl bg-cyan-500/20 border border-cyan-400/30 hover:bg-cyan-500/30">
        Saqlash
    </button>
</form>
@endsection
