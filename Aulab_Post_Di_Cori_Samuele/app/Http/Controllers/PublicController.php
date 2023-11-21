<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
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

        $user = User::find(Auth::id());
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        // Passa sia $info che $user quando istanzi CareerRequestMail
        $info = compact('role', 'email', 'message');
        $mail = new CareerRequestMail($info, $user);

        Mail::to('admin@theaulabpost.it')->send($mail);

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
