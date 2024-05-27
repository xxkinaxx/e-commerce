<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::with('user')->latest()->get();
        $pending = Transaction::where('status', 'PENDING')->count();
        $settlement = Transaction::where('status', 'SETTLEMENT')->count();
        $expired = Transaction::where('status', 'EXPIRED')->count();
        $success = Transaction::where('status', 'SUCCESS')->count();
        return view('pages.admin.transaction.index', compact('transaction', 'pending', 'settlement', 'expired', 'success'));
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
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get data transaction by id
        $transaction = Transaction::findOrFail($id);

        try{
            $transaction->update([
                'status' => $request->status
            ]);
            return redirect()->back()->with('success', 'Status changed');
        } catch (Exception $e) {
            return redirect()->route('admin.transaction.index')->with('error', 'Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
