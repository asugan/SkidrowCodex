<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactConroller extends Controller
{
    public function contact(Request $request)
    {
        $hamham = new Contact;
        $hamham->name = $request->name;
        $hamham->email = $request->email;
        $hamham->topic = $request->topic;
        $hamham->message = $request->message;
        $hamham->save();
        return redirect()->back()->with('message', 'Message sent succesfully !!!');
    }
}