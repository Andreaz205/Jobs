<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|unique:newsletters,email'
        ]);

        event(new UserSubscribed($data['email']));

        return back();
    }
}
