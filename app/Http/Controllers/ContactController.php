<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('home')
                ->withFragment('contact')
                ->withErrors($validator)
                ->withInput();
        }

        Message::create($validator->validated());

        return redirect()
            ->route('home')
            ->withFragment('contact')
            ->with('success', 'Pesan berhasil dikirim! Terima kasih telah menghubungi saya.');
    }
}
