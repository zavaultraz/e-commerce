<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Exception;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = transaction::with('user')->select('id', 'name', 'user_id', 'email', 'total_price', 'addres', 'courier', 'phone', 'payment', 'payment_url', 'status', 'slug')->latest()->get();
        return view('pages.admin.transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get data transaction by id
        //
        $transaction = transaction::findOrFail($id);
        try {
            //update data transaction
            $transaction->update([
                'status' => $request->status
            ]);
            return redirect()->route('admin.transaction.index')->with('succsess', 'sukses abangku 🛫');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.transaction.index')->with('error', 'Terjadi Kesalahan ❌🍑');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showTransactionUserByAdminWithSlugAndId($id, $slug)
    {
        $transaction = transaction::where('slug', $slug)->where('id', $id)->firstOrFail();
        return view('pages.admin.transaction.show', compact('transaction'));
    }
}
