<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Gallery;
use App\Models\Blog;

class GalleryController extends Controller
{
    //la fonction pour la gallery chez l'employé

    public function galleryA()
    {
        $galleries = Gallery::all();
        $blogs = Blog::paginate(4);
        return view('/admins/gallery', compact('galleries', 'blogs'));
    }
    public function createA()
    {
        return view('/admins/gallery-create');
    }
    #save the image file in daschebore admin
    public function storeA(Request $request)
    {
        $user = Auth::user()->id;
        $request->validate([
            'titre' => ['required'],
            'category' => ['required'],
        ]);

        
        $image = $request->file('image');
        $image_img = time() . '-' . $image->getClientOriginalName();
        //$image_img = Str::random(12).'.'.$image->clientExtension();//aprendre a formationle non de nos fichiers getClientO
        $storage_data = Storage::disk('public')->put($image_img, file_get_contents($image));

        Gallery::create([
            'titre' => $request->titre,
            'category' => $request->category,
            'user_id' => $user,
            'image' => $image_img,

        ]);

        Alert::success('success!', 'SUCCESS');
        $galleries = Gallery::all();
        $blogs = Blog::paginate(4);
        //dd($galleries);
        return view('/admins/gallery', compact('galleries', 'blogs'));
    }

//===================================================================

    //la fonction pour la gallery chez le jury

    public function galleryJ()
    {
        $galleries = Gallery::all();
        $blogs = Blog::paginate(4);
        return view('/jurys/gallery', compact('galleries', 'blogs'));
    }
    public function createJ()
    {
        return view('/jurys/gallery-create');
    }
    #save the image file in daschebore jurys
    public function storeJ(Request $request)
    {
        $user = Auth::user()->id;
        $request->validate([
            'titre' => ['required'],
            'category' => ['required'],
        ]);


        $image = $request->file('image');
        $image_img = time() . '-' . $image->getClientOriginalName();
        //$image_img = Str::random(12).'.'.$image->clientExtension();//aprendre a formationle non de nos fichiers getClientO
        $storage_data = Storage::disk('public')->put($image_img, file_get_contents($image));

        Gallery::create([
            'titre' => $request->titre,
            'category' => $request->category,
            'user_id' => $user,
            'image' => $image_img,

        ]);

        Alert::success('success!', 'SUCCESS');
        $galleries = Gallery::all();
        $blogs = Blog::paginate(4);
        //dd($galleries);
        return view('/jurys/gallery', compact('galleries', 'blogs'));
    }
//=============================================================

    //la fonction pour la gallery chez le Candidat

    public function galleryC()
    {
        $galleries = Gallery::all();
        $blogs = Blog::paginate(4);
        //dd($galleries);
        return view('/candidats/gallery', compact('galleries', 'blogs'));
    }

    public function createC()
    {
        return view('/candidats/gallery-create');
    }
    #save the image file in daschebore candidats
    public function storeC(Request $request)
    {
        $user = Auth::user()->id;
        $request->validate([
            'titre' => ['required'],
            'category' => ['required'],
        ]);


        $image = $request->file('image');
        $image_img = time() . '-' . $image->getClientOriginalName();
        //$image_img = Str::random(12).'.'.$image->clientExtension();//aprendre a formationle non de nos fichiers getClientO
        $storage_data = Storage::disk('public')->put($image_img, file_get_contents($image));

        Gallery::create([
            'titre' => $request->titre,
            'category' => $request->category,
            'user_id' => $user,
            'image' => $image_img,

        ]);

        Alert::success('success!', 'SUCCESS');
        $galleries = Gallery::all();
        $blogs = Blog::paginate(4);
        //dd($galleries);
        return view('/candidats/gallery', compact('galleries','blogs'));
    }
    
}
