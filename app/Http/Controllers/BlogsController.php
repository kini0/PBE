<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\User;

class BlogsController extends Controller
{
    //

    //la fonction pour la gallery chez l'employé

    public function blogA()
    {
        $blogs = Blog::all();
        return view('/admins/blog', compact('blogs'));
    }

    public function createA()
    {
        return view('/admins/blog-create');
    }
    #save blog
    public function storeA(Request $request)
    {
        $user = Auth::user()->id;

        $request->validate([
            'title' => ['required'],
            'soustitle'=> ['required'],
            'contenu' => ['required'],
        ]);

        #save images blog
        $image = $request->file('images');
        //$image_img = $image->getClientOriginalName();
        $image_img = time() . '-' . $image->getClientOriginalName();
        //$image_img = Str::random(12).'.'.$image->clientExtension();//aprendre a formationle non de nos fichiers getClientO
        $storage_data = Storage::disk('public')->put($image_img, file_get_contents($image));

        Blog::create([
            'title' => $request->title,
            'soustitle' => $request->soustitle,
            'contenu' => $request->contenu,
            'user_id' => $user,
            'images' => $image_img,

        ]);

        
        $blogs = Blog::all();
        Alert::success('success!', 'SUCCESS');
        return view('/admins/blog', compact('blogs'));
    }

    public function showA($id, $title)
    {
        $articles = Blog::all();
        #on recupere l'auteur à qui appartient le blog
        $blogs = User::join('blogs', 'blogs.user_id', '=', 'users.id')
             ->where('blogs.id', $id)->where('blogs.title', $title)
              ->first();
        return view('/admins/blog-show', compact('blogs','articles'));
    }

    #update blog
    public function updateA($id)
    {
        return view('/admins/blog-edit');

    }

//=================================================================================
    //la fonction pour la gallery chez le jury

    public function blogJ()
    {
        $blogs = Blog::all();
        return view('/jurys/blog', compact('blogs'));
    }
    
    public function createJ()
    {
        return view('/jurys/blog-create');
    }

    #save blog
    public function storeJ(Request $request)
    {
        $user = Auth::user()->id;

        $request->validate([
            'title' => ['required'],
            'soustitle'=> ['required'],
            'contenu' => ['required'],
        ]);

        #save images blog
        $image = $request->file('images');
        $image_img = time() . '-' . $image->getClientOriginalName();
        //$image_img = $image->getClientOriginalName();
        //$image_img = Str::random(12).'.'.$image->clientExtension();//aprendre a formationle non de nos fichiers getClientO
        $storage_data = Storage::disk('public')->put($image_img, file_get_contents($image));

        Blog::create([
            'title' => $request->title,
            'soustitle' => $request->soustitle,
            'contenu' => $request->contenu,
            'user_id' => $user,
            'images' => $image_img,

        ]);

       
        $blogs = Blog::all();
        Alert::success('success!', 'SUCCESS');
        return view('/jurys/blog', compact('blogs'));
    }

    public function show($id, $title)
    {
        
        $articles = Blog::all();
        #on recupere l'auteur à qui appartient le blog
        $blogs = User::join('blogs', 'blogs.user_id', '=', 'users.id')
             ->where('blogs.id', $id)->where('blogs.title', $title)
              ->first();
        
        //dd($blogs);
        return view('/jurys/blog-show', compact('blogs','articles'));
    }
//==========================================================================
    //la fonction pour la gallery chez le Candidat

    public function blogC()
    {
        $blogs = Blog::all();
        return view('/candidats/blog', compact('blogs'));
    }
    public function createC()
    {
        return view('/candidats/blog-create');
    }
    #save blog
    public function storeC(Request $request, $id)
    {
        $user = Auth::user()->id;

        $request->validate([
            'title' => ['required'],
            'soustitle'=> ['required'],
            'contenu' => ['required'],
        ]);

        #save images blog
        $image = $request->file('images');
        //$image_img = $image->getClientOriginalName();
        $image_img = time() . '-' . $image->getClientOriginalName();
        //$image_img = Str::random(12).'.'.$image->clientExtension();//aprendre a formationle non de nos fichiers getClientO
        $storage_data = Storage::disk('public')->put($image_img, file_get_contents($image));

        Blog::create([
            'title' => $request->title,
            'soustitle' => $request->soustitle,
            'contenu' => $request->contenu,
            'user_id' => $user,
            'images' => $image_img,

        ]);

        
        $blogs = Blog::all();
        Alert::success('success!', 'SUCCESS');
        return view('/candidats/blog', compact('blogs'));
    }

    public function showC($id, $title)
    {
        $articles = Blog::all();
        #on recupere l'auteur à qui appartient le blog
        $blogs = User::join('blogs', 'blogs.user_id', '=', 'users.id')
             ->where('blogs.id', $id)->where('blogs.title', $title)
              ->first();

        return view('/candidats/blog-show', compact('blogs','articles'));
    }
}
