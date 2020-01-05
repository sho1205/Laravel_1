<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GakushuController extends Controller
{
    public function index(Request $request){ // DIの記述必須！

        return view('Gakushu.index');
    }

    public function confirm(Request $request){ // DIの記述必須！

        $name = $request['name'];   // 「名前」の入力値を取り出す
        $email = $request['email']; // 「email」の入力値を取り出す

        return $name."-".$email;
    }

}
