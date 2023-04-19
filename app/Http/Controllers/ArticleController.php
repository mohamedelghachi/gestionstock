<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addarticle()
    {
        return view('article.addarticle');
    }
    public function storearticle(Request $request)
    {
        $newArticle = new Article();
        $newArticle->designation = $request->designation;
        $newArticle->description = $request->description;
        $newArticle->quantity = $request->quantity;
        $newArticle->pu = $request->pu;
        $newArticle->pachat = $request->pachat;
        $newArticle->expiration = $request->expiration;
        $newArticle->save();

        return redirect("/showarticle");
    }

    public function updatearticle(Request $request)
    {
        $newArticle = Article::find($request->id);
        $newArticle->designation = $request->designation;
        $newArticle->description = $request->description;
        $newArticle->quantity = $request->quantity;
        $newArticle->save();

        return redirect("/showarticle");
    }
    public function deletearticle(Request $request)
    {
        $newArticle = Article::find($request->id);
        $newArticle->delete();

        $articles = Article::all();

        $return_arr[] = array("success" => $articles);

        // Encoding array in JSON format
        return json_encode($return_arr);
    }
    public function articledelete($id)
    {
        $newArticle = Article::find($id);
        $newArticle->delete();

        return redirect('/showarticle');
    }

    public function showarticle()
    {
        $maVar = "Hello";
        $groupe = "DDWFS";
        $articles = Article::all();
        //dd($users);
        return view('article.catalogue', ["maVar" => $maVar, "groupe" => $groupe, "articles" => $articles]);
    }
}
