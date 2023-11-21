<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $allRequests =
        [
            $adminRequests = User::where('is_admin', NULL)->get(),
            $adminRequests = User::where('is_admin', NULL)->get(),
            $adminRequests = User::where('is_admin', NULL)->get(),
        ];

        return view('admin.dashboard', compact('allRequests'));
    }

    public function setAdmin(User $user)
    {
        $user->update([
            'is_admin' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso amministratore l\'utente scelto');
    }

    public function setRevisor(User $user)
    {
        $user->update([
            'is_revisor' => true,
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso revisore l\'utente scelto');
    }

    public function setWriter(User $user)
    {
        $user->update([
            'is_writer' => true,
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso redattore l\'utente scelto');
    }


}
