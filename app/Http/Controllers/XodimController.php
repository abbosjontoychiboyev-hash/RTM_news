<?php

namespace App\Http\Controllers;

use App\Models\Xodim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class XodimController extends Controller
{
    public function index()
    {
        $xodimlar = Xodim::orderByDesc('id')->paginate(12);
        return view('xodimlar.index', compact('xodimlar'));
    }

    public function create()
    {
        return view('xodimlar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['nullable','string','max:255'],
            'lavozim'   => ['nullable','string','max:255'],
            'telefon'   => ['nullable','string','max:100'],
            'telegram'  => ['nullable','string','max:100'],
            'email'     => ['nullable','email','max:255'],
            'website'   => ['nullable','string','max:255'],
            'bio'       => ['nullable','string'],
            'rasm'      => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('rasm')) {
            $data['rasm'] = $request->file('rasm')->store('xodimlar', 'public');
        }

        // Agar full_name bo'sh bo'lsa, eski ustunlarga tushirib ketamiz
        if (empty($data['full_name']) && $request->filled('fio')) {
            $data['full_name'] = $request->input('fio');
        }

        Xodim::create($data);

        return redirect()->route('xodimlar.index')->with('ok', 'Xodim qo‘shildi.');
    }

    public function edit(Xodim $xodim) // route-model binding: {xodimlar}
    {
           return view('xodimlar.edit', compact('xodim'));

    }

    public function update(Request $request, Xodim $xodim)
{
    $data = $request->validate([
        'full_name' => ['nullable','string','max:255'],
        'lavozim'   => ['nullable','string','max:255'],
        'telefon'   => ['nullable','string','max:100'],
        'telegram'  => ['nullable','string','max:100'],
        'email'     => ['nullable','email','max:255'],
        'website'   => ['nullable','string','max:255'],
        'bio'       => ['nullable','string'],
        'rasm'      => ['nullable','image','max:4096'],
    ]);

    if ($request->hasFile('rasm')) {
        if ($xodim->rasm) {
            Storage::disk('public')->delete($xodim->rasm);
        }
        $data['rasm'] = $request->file('rasm')->store('xodimlar', 'public');
    }

    $xodim->update($data);

    return redirect()->route('xodimlar.index')->with('ok', 'Xodim yangilandi.');
}

public function destroy(Xodim $xodim)
{
    if ($xodim->rasm) {
        Storage::disk('public')->delete($xodim->rasm);
    }

    $xodim->delete();

    return redirect()->route('xodimlar.index')->with('ok', 'Xodim o‘chirildi.');
}
}
