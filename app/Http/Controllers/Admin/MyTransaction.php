<?php

namespace App\Http\Controllers\Admin;

use App\Models\transaction;
use Illuminate\Http\Request;
use App\Models\transactionItem;
use App\Http\Controllers\Controller;


class MyTransaction extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mytransaction = transaction::with(['user'])->where('user_id',auth()->user()->id)->get();
        $pending = transaction::where('user_id',auth()->user()->id)->where('status','PENDING')->count();
        $expired = transaction::where('user_id',auth()->user()->id)->where('status','EXPIRED')->count();
        $settlement = transaction::where('user_id',auth()->user()->id)->where('status','SETTLEMENT')->count();
        return view('pages.admin.my-transaction.index',compact('mytransaction','pending','expired','settlement'));
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
    public function show($name)
    {
        $transactionItem = transactionItem::with(['product'])->where('transaction_id', $name)->get();
        
        return view ('pages.admin.my-transaction.show',compact('transactionItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showDataBySlugAndId($id, $slug)
    {
        $transaction = transaction::where('slug', $slug)->where('id', $id)->firstOrFail();

        return view('pages.admin.my-transaction.show', compact('transaction'));
    }


}
