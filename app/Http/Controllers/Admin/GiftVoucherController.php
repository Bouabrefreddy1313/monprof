<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GiftVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GiftVoucherController extends Controller
{
   public function index()
{
    // Récupère tous les bons
    $vouchers = GiftVoucher::all();

    // Passe la variable $vouchers à la vue
    return view('bons.show', compact('vouchers'));
}


    public function create()
    {
        return view('admin.vouchers.create');
    }

   // Enregistrer un bon
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|integer|min:5000',
            'description' => 'nullable|string|max:255',
        ]);

        GiftVoucher::create([
            'code' => strtoupper(Str::random(10)),
            'title' => $request->title,
            'amount' => $request->amount,
            'description' => $request->description,
            'status' => 'active',
        ]);

        return view('admin.vouchers.create');

    }

    public function edit(GiftVoucher $voucher)
    {
        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, GiftVoucher $voucher)
    {
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|integer|min:5000',
            'description' => 'nullable|string|max:255',
        ]);

        $voucher->update($request->only('title', 'amount', 'description'));

        return redirect()->route('admin.vouchers.index')->with('success', 'Bon modifié !');
    }

   public function destroy($id)
{
    $voucher = GiftVoucher::findOrFail($id);
    $voucher->delete();

    return redirect()->back()->with('success', 'Bon supprimé avec succès.');
}

}
