<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Helloコントローラを使用した処理
Route::get('hello/other', 'HelloController@other'); // otherの場合はこちらを処理

// p65 パラメータをテンプレートに渡す
// Route::get('hello/{id?}', 'HelloController@index'); // それ以外はこちらを処理

// p67 Bladeを使用
Route::get('hello', 'HelloController@index'); /* それ以外はこちらを処理 */
// p72 post用Route
Route::post('hello', 'HelloController@post'); /* それ以外はこちらを処理 */

Route::get('hello2', 'HelloController2@index');

/* view情報をrouteから直接返す */
/*
Route::get('hello', function() {
    return view('hello.index');
});
*/

/* view情報をcontrollerから返す */

/* ヒアドキュメントの利用 */
/*
$html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body {font-size:16pt;: color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px 0px -50px 0px; }
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>This is sample page.</p>
    <p>これはサンプルで作ったページです。</p>
</body>
</html>
EOF;

Route::get('hello', function () use($html) { 
    return $html;
});
*/

/* ルートパラメータの利用 */
/*
Route::get('hello/{msg?}', function ($msg='no message.') { 
    $html = <<<EOF
    <html>
    <head>
    <title>Hello</title>
    <style>
    body {font-size:16pt;: color:#999; }
    h1 { font-size:100pt; text-align:right; color:#eee;
        margin:-40px 0px -50px 0px; }
    </style>
    </head>
    <body>
        <h1>Hello</h1>
        <p>{$msg}</p>
        <p>これはサンプルで作ったページです。</p>
    </body>
    </html>
    EOF;
    
    return $html;
});
*/
