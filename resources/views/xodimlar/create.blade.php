@extends('layouts.admin')
@section('title','Yangi xodim')

@section('content')
<h1 class="text-2xl font-bold mb-6">Yangi xodim</h1>

<form method="POST" action="{{ route('xodimlar.store') }}" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="text-sm text-slate-300">F.I.Sh</label>
        <input name="full_name" class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
    </div>

    <div>
        <label class="text-sm text-slate-300">Lavozim</label>
        <input name="lavozim" class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
    </div>

    <div class="grid sm:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-300">Telefon</label>
            <input name="telefon" class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
        <div>
            <label class="text-sm text-slate-300">Telegram</label>
            <input name="telegram" class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
    </div>

    <div class="grid sm:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-300">Email</label>
            <input name="email" class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
        <div>
            <label class="text-sm text-slate-300">Website</label>
            <input name="website" class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10" />
        </div>
    </div>

    <div>
        <label class="text-sm text-slate-300">Bio</label>
        <textarea name="bio" rows="4" class="w-full mt-1 px-4 py-2 rounded-xl bg-white/5 border border-white/10"></textarea>
    </div>

    <div>
        <label class="text-sm text-slate-300">Rasm</label>
        <input type="file" name="rasm" class="w-full mt-1" />
    </div>

    <div class="flex gap-2">
        <button class="px-4 py-2 rounded-xl bg-cyan-500/20 border border-cyan-400/30 hover:bg-cyan-500/30">Saqlash</button>
        <a href="{{ route('xodimlar.index') }}" class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20">Bekor</a>
    </div>
</form>
@endsection
