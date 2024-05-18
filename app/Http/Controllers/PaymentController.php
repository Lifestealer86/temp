<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    public function show()
    {
        return Payment::all('id', 'name', 'money', 'date');
    }

    public function store(PaymentRequest $request)
    {
        return Payment::create([
            'name' => "xXx yYy",
            'money' => $request->money,
            'date' => $request->date
        ]);
    }

    public function my()
    {
        $user = auth('auth')->user();
        if($user) return $user;
        else return $user;
    }
}
