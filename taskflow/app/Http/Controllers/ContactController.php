<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function store(Request $request) {
        $request->validate([
            'nom'     => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        DB::table('contacts')->insert([
            'nom'        => $request->nom,
            'email'      => $request->email,
            'message'    => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('contact');
    }
}