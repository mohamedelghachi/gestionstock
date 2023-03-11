<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addarticle(){
        return view('article.addarticle');
    }
    public function storearticle(Request $request){
        $newArticle = new Article();
        $newArticle->designation = $request->designation;
        $newArticle->description = $request->description;
        $newArticle->quantity = $request->quantity;
        $newArticle->pu = $request->pu;
        $newArticle->pachat = $request->pachat;
        $newArticle->expiration = $request->expiration;
        $newArticle->save();

        return redirect("/home");
    }

    public function showarticle(){
        return view('article.catalogue');
    }
}
