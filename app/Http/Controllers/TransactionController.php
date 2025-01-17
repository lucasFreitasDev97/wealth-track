<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(): View
    {
        return \view('transaction.index');
    }

    public function form(Transaction $transaction = null): View
    {
        if ($transaction) {
            $transaction = Transaction::find($transaction->getKey());
        }

        return \view('transaction.form', ['transaction' => $transaction]);
    }

    public function store(): RedirectResponse
    {
        return redirect(route('transactions.index'));
    }

    public function update(): RedirectResponse
    {
        return redirect(route('transactions.index'));
    }

    public function destroy(): RedirectResponse
    {
        return redirect(route('transactions.index'));
    }
}
