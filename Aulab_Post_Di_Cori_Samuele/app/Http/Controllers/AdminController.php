<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        // Ottenere le richieste
        $allRequests = [
            'amministratore' => User::where('is_admin', null)->get(),
            'revisore' => User::where('is_revisor', null)->get(),
            'redattore' => User::where('is_writer', null)->get(),
        ];
    
        $metaInfos = Tag::all();
        $tags = Tag::all();
        $categories = Category::all();
    
        // Determina la rotta corrente
        $currentRoute = $request->route()->getName();
        // Inizializza $formRoute a null
        $formRoute = null;
        // Verifica se la rotta corrente riguarda la modifica di una categoria
        if (Str::startsWith($currentRoute, 'admin.editCategory')) {
            $formRoute = 'admin.editCategory';
        } else {
            $formRoute = 'admin.editPost';
        }

        // Define the column name based on the route
        $columnName = ($formRoute === 'admin.editCategory') ? 'Nome tags' : 'Nome categoria';

        return view('admin.dashboard', compact('metaInfos', 'tags', 'categories', 'columnName', 'allRequests'));
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

    public function changeUserRole(User $user, Request $request)
    {
        // Assicurati che l'utente sia valido prima di procedere
        if (!$user) {
            return redirect()->back()->with('error', 'Utente non trovato');
        }
    
        // Verifica che il nuovo ruolo sia un ruolo valido
        $newRole = $request->input('new_role');
        if (!in_array($newRole, ['admin', 'revisor', 'writer'])) {
            return redirect()->back()->with('error', 'Ruolo non valido');
        }
    
        // Imposta il ruolo in base alla scelta
        $user->update([
            'is_admin' => $newRole === 'admin',
            'is_revisor' => $newRole === 'revisor',
            'is_writer' => $newRole === 'writer',
        ]);
    
        return redirect()->back()->with('success', 'Ruolo utente cambiato con successo')->with('newRole', $newRole);
    }
    
    
    public function showChangeUserRoleView(User $user, Request $request)
    {

        // Assicurati che l'utente sia valido prima di procedere
        if (!$user) {
            return redirect()->back()->with('error', 'Utente non trovato');
        }

        // Determina dinamicamente il ruolo corrente dell'utente
        $currentRole = $user->is_admin ? 'admin' : ($user->is_revisor ? 'revisor' : ($user->is_writer ? 'writer' : 'unknown'));
        
        if ($request->has('new_role')) {
            // Imposta il valore in base alla scelta
            $newRole = $request->input('new_role');
        } else {
            // Se non c'è una scelta, mantieni il ruolo corrente
            $newRole = $currentRole;

        }
        // Passa i dati alla vista
        return view('admin.changeUserRole', compact('user', 'currentRole', 'newRole'));
    }

    public function showAllUsers()
    { 
        $user = auth()->user();
        // Determina dinamicamente il ruolo corrente dell'utente
        $currentRole = $user->is_admin ? 'admin' : ($user->is_revisor ? 'revisor' : ($user->is_writer ? 'writer' : 'unknown'));
        $newRole = 'defaultRole';
        
        $users = User::all();
        return view('admin.showUsers', compact('users', 'currentRole', 'newRole'));
    }

    // Tag
    public function editTag(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags',
        ]);
        $tag->update([
            'name' => strtolower($request->name)
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato il Tag');
    }

    public function editCategory(Request $request, Category $category)
    {
        $category->update([
            'name' => strtolower($request->name),
        ]);

        return view('admin.dashboard')->with('message', 'Hai correttamente aggiornato la Categoria');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente inserito una nuova categoria');
    }

    public function deleteTag(Tag $tag)
    {
        foreach ($tag->articles as $article)
        {
            $article->tags()->detach($tag);
        }

        $tag->delete();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato il Tag');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato la Categoria');
    }
}    
