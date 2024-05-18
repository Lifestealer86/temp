<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class PaymentRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            'money' => 'required',
            'date' => 'required',
        ];
    }
}
