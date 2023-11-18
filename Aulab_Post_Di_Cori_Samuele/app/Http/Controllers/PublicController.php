<?php

namespace App\Http\Controllers;

use App\Mail\CareerRequestMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));

        $validRoles = ['admin', 'revisor', 'writer'];

        if (in_array($role, $validRoles)) {
            // Imposta il ruolo specificato su null e lascia gli altri invariati
            $updateData = array_fill_keys($validRoles, null);
            $updateData['is_' . $role] = null;
    
            $user->update($updateData);
        }

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato!');
    }

}
