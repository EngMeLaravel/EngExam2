<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContact()
    {
        return view('contact');
    }

    public function saveContact(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        Contact::insert($data);

        return redirect()->back();
    }
}
