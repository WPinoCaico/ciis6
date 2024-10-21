<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DemoMailController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return new JsonResponse(['success' => false, 'message' => $validator->errors()], 422);
        }



        if (1) {
            Mail::to($request->email)->send(new DemoMail($request->email));
            return new JsonResponse(
                [
                    'success' => true,
                    'message' => "Thank you for subscribing to our email, please check your inbox"
                ],
                200
            );
        }
    }
}
