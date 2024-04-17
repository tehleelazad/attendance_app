<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function createForm()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        contact::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function createusers()
    {
        return view('users');
    }
    public function storeusers(Request $request)
    {
            $request->validate([
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'is_active' => 'required',
                'role_id' => 'required|integer:role',
        ]);

        users::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}