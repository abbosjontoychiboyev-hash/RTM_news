@extends('layouts.admin')
@section('title','Xodimni tahrirlash')

@section('content')
<h1 class="text-2xl font-bold mb-6">Xodimni tahrirlash</h1>

<form method="POST" action="{{ route('xodimlar.update', $xodim) }}" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="text-sm text-slate-300">F.I.Sh</label>
        <input name="full_name" value="{{ old('full_name', $xodim->full_name) }}"
               class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
    </div>

    <div>
        <label class="text-sm text-slate-300">Lavozim</label>
        <input name="lavozim" value="{{ old('lavozim', $xodim->lavozim) }}"
               class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
    </div>

    <div class="grid sm:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-300">Telefon</label>
            <input name="telefon" value="{{ old('telefon', $xodim->telefon) }}"
                   class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
        <div>
            <label class="text-sm text-slate-300">Telegram</label>
            <input name="telegram" value="{{ old('telegram', $xodim->telegram) }}"
                   class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
    </div>

    <div class="grid sm:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-300">Email</label>
            <input name="email" value="{{ old('email', $xodim->email) }}"
                   class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
        <div>
            <label class="text-sm text-slate-300">Website</label>
            <input name="website" value="{{ old('website', $xodim->website) }}"
                   class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
    </div>

    <div>
        <label class="text-sm text-slate-300">Bio</label>
        <textarea name="bio" rows="4"
          class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10">{{ old('bio', $xodim->bio) }}</textarea>
    </div>

    <div>
        <label class="text-sm text-slate-300">Rasm</label>
        <input type="file" name="rasm" class="w-full mt-1" />
        @if($xodim->rasm)
            <div class="mt-2 text-slate-400 text-sm">Hozirgi rasm: {{ $xodim->rasm }}</div>
            <img src="{{ asset('storage/'.$xodim->rasm) }}" class="mt-2 w-40 rounded-xl border border-white/10" alt="">
        @endif
    </div>

    <div class="flex gap-2">
        <button class="px-4 py-2 rounded-xl bg-cyan-500/20 border border-cyan-400/30 hover:bg-cyan-500/30">Saqlash</button>
        <a href="{{ route('xodimlar.index') }}" class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20">Bekor</a>
    </div>
</form>
@endsection
