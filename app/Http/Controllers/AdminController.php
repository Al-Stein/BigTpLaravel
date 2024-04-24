<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        $user=User::all();
        return view('admin.showAdmin',compact('user'));
    }
    public function valide($id){
        $user=User::findOrFail($id);
        $user->update(['valide' => true]);

        return redirect()->back()->with('success', 'Utilisateur validé avec succès.');
    }
    public function devalide($id){
        $user=User::findOrFail($id);
        $user->update(['valide' => false]);

        return redirect()->back()->with('success', 'Utilisateur devalidé avec succès.');
    }
    public function delete($id){
        $user=User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}
