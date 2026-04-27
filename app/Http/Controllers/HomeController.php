<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function storeContact(StoreContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect()->route('contact')->with('success', 'Votre message a bien été envoyé !');
    }
}