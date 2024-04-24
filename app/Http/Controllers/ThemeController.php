<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    public function create()
    {
        return view('user.create');
    }
    public function sauvegarder(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'titre' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
    
        $chemin = 'images';
        $file = $request->file('image');

        $chemin=$chemin.'/'.$file->getClientOriginalName();
        $file->move("images",$file->getClientOriginalName());

        $theme_nouveau=$request->post();
        $theme_nouveau['photo']=$chemin;
        Theme::create($theme_nouveau);
       
        return redirect()->back()->with('success', 'Theme ajouté avec succès.');
            
    }
    public function lister(){
        $themes=Theme::all();
        return view('user.listerTheme',compact('themes'));
    }
    public function supprimer($id){
        $theme=Theme::find($id);
        $theme->delete();
        return redirect()->back()->with('success', 'Theme supprimé avec succès.');
    }
}
