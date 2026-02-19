@extends('layouts.admin')
@section('title','Xodimlar')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Xodimlar</h1>
    <a href="{{ route('xodimlar.create') }}" class="px-4 py-2 rounded-xl bg-cyan-500/20 border border-cyan-400/30 hover:bg-cyan-500/30">
        + Yangi xodim
    </a>
</div>

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
@foreach($xodimlar as $x)
    <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
        <div class="flex gap-3">
            <div class="w-16 h-16 rounded-xl overflow-hidden bg-white/10 flex items-center justify-center">
                @if($x->rasm)
                    <img src="{{ asset('storage/'.$x->rasm) }}" class="w-full h-full object-cover" alt="">
                @else
                    <span class="text-slate-400">IMG</span>
                @endif
            </div>

            <div class="min-w-0">
                <div class="font-semibold truncate">{{ $x->full_name ?? $x->fio ?? $x->ism ?? $x->name }}</div>
                <div class="text-cyan-300 text-sm">{{ $x->lavozim }}</div>
                <div class="text-slate-400 text-xs mt-1">{{ $x->telefon }}</div>
            </div>
        </div>

        <div class="flex gap-2 mt-4">
           <a href="{{ route('xodimlar.edit', $x) }}" class="px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20">Edit</a>
            <form method="POST" action="{{ route('xodimlar.destroy', $x) }}"
                onsubmit="return confirm('O‘chirasizmi?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-3 py-2 rounded-lg bg-rose-500/15 border border-rose-500/30 hover:bg-rose-500/25">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endforeach
</div>

<div class="mt-8">
    {{ $xodimlar->links() }}
</div>
@endsection
