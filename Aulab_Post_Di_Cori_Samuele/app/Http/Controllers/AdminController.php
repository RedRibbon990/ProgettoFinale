<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $allRequests = [
            'amministratore' => User::where('is_admin', null)->get(),
            'revisore' => User::where('is_revisor', null)->get(),
            'redattore' => User::where('is_writer', null)->get(),
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
        // Assicurati che l'utente non sia già revisore
        if (!$user->is_revisor) {
            $user->update([
                'is_revisor' => true,
            ]);
    
            return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso revisore l\'utente scelto');
        }
    
        return redirect(route('admin.dashboard'))->with('message', 'L\'utente è già un revisore');
    }

    public function setWriter(User $user)
    {
        $user->update([
            'is_writer' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso redattore l\'utente scelto');
    }

    public function rejectRequest(User $user, $role = null)
    {
        // Rimuovi la richiesta per il ruolo specifico solo se $role è fornito
        if ($role !== null) {
            switch ($role) {
                case 'amministratore':
                    $user->update(['is_admin' => null]);
                    break;
                case 'revisore':
                    $user->update(['is_revisor' => null]);
                    break;
                case 'redattore':
                    $user->update(['is_writer' => null]);
                    break;
                // Aggiungi altri casi se necessario
            }
        }
    
        return redirect()->back()->with('success', 'Richiesta eliminata con successo.');
    }
}
