<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Date;

class PaymentController extends Controller
{
    public function show()
    {
        return Payment::all('id', 'name', 'money', 'date');
    }

    public function store(PaymentRequest $request)
    {
        $user = Auth::user();
        $p = Payment::create([
            'name' => $user->name,
            'money' => $request->money,
            'date' => $request->date,
            'user_id' => $user->id
        ]);
        return ['name' => $p->name, 'money' => $p->money, 'date' => $p->date ];
    }

    public function my()
    {
        return Auth::user()->takePayments();
    }
}
