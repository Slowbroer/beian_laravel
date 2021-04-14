<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function info($id){
        if ($id == 1){
            return view("article.position");
        }
        else if ($id == 2) {
            return view("article.php_auto_load");
        }
        else {
            return view("welcome");
        }
    }
}
