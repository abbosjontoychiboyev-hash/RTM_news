<?php

namespace App\Http\Controllers;

use App\Models\Yangilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class YangilikController extends Controller
{
    public function index()
    {
        // Pagination emas, faqat oxirgi 8 ta
        $yangiliklar = Yangilik::latest()->take(8)->get();

        return view('yangiliklar.index', compact('yangiliklar'));
    }

    public function create()
    {
        return view('yangiliklar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sarlavha' => ['required','string','max:255'],
            'matn'     => ['nullable','string'],
            'cta_text' => ['nullable','string','max:60'],
            'cta_url'  => ['nullable','string','max:255'],
            'rasm'     => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('rasm')) {
            $data['rasm'] = $request->file('rasm')->store('yangiliklar', 'public');
        }

        Yangilik::create($data);

        return redirect()->route('yangiliklar.index')->with('ok', 'Yangilik qo‘shildi.');
    }

    public function edit(Yangilik $yangilik)
    {
        return view('yangiliklar.edit', compact('yangilik'));
    }

    public function update(Request $request, Yangilik $yangilik)
    {
        $data = $request->validate([
            'sarlavha' => ['required','string','max:255'],
            'matn'     => ['nullable','string'],
            'cta_text' => ['nullable','string','max:60'],
            'cta_url'  => ['nullable','string','max:255'],
            'rasm'     => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('rasm')) {
            if ($yangilik->rasm) {
                Storage::disk('public')->delete($yangilik->rasm);
            }
            $data['rasm'] = $request->file('rasm')->store('yangiliklar', 'public');
        }

        $yangilik->update($data);

        return redirect()->route('yangiliklar.index')->with('ok', 'Yangilik yangilandi.');
    }

    public function destroy(Yangilik $yangilik)
    {
        if ($yangilik->rasm) {
            Storage::disk('public')->delete($yangilik->rasm);
        }

        $yangilik->delete();

        return redirect()->route('yangiliklar.index')->with('ok', 'Yangilik o‘chirildi.');
    }
}
