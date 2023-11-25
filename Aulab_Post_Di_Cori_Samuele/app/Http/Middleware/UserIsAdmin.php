<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && Auth::user()->is_admin) {
            return $next($request);
        }
        return redirect(route('homepage'))->with('message', 'Non sei autorizzato');
    }

    public function changeUserRole(Request $request, $userId, $newRole)
    {
        // Validazione dei dati
        $request->validate([
            'user_id' => 'required|numeric',
            'new_role' => 'required|in:admin,revisor,writer',
        ]);

        // Trova l'utente
        $user = User::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Utente non trovato');
        }

        // Aggiorna il ruolo dell'utente
        switch ($newRole) {
            case 'admin':
                $user->update(['is_admin' => true, 'is_revisor' => null, 'is_writer' => null]);
                break;
            case 'revisor':
                $user->update(['is_admin' => null, 'is_revisor' => true, 'is_writer' => null]);
                break;
            case 'writer':
                $user->update(['is_admin' => null, 'is_revisor' => null, 'is_writer' => true]);
                break;
            // Aggiungi altri casi se necessario
        }

        return redirect()->back()->with('success', 'Ruolo aggiornato con successo');
    }
}
