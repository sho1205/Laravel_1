<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body {font-size:16pt;: color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px 0px -50px 0px; }
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
    // p71 Bladeを使用
    public function index(){
        $data  = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.index', ['data'=>$data]);
        
        // 
        // $data  = [
        //     ['name'=>'山田太郎', 'mail'=>'aaa@com'],
        //     ['name'=>'鈴木花子', 'mail'=>'bbb@com'],
        //     ['name'=>'田中幸子', 'mail'=>'ccc@com']
        // ];
        // return view('hello.index', ['data'=>$data]);
    }
    public function post(Request $request){
        return view('hello.index', ['msg'=>$request->msg]);
    }

    public function other(){
        global $head, $style, $body, $end;

        $html = $head . tag('title','Hello/Other') . $style . $body
            . tag('h1', 'Other') . tag('p', 'this is Other page')
            . $end;
        return $html;
    }
}
