<!-- 作りとして、文字はこのファイルで、色や枠線はhelloappやmessageのbladeで設定している。 -->

<!-- 基本はhelloappを踏襲する -->
@extends('layouts.helloapp')

<!-- helloappのyieldをsectionで置き換える -->
@section('title','Index2')

<!-- helloappにyieldがなければ、section〜showを置き換える
　　　@parentがあるところhelloappの処理を残す -->
@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

<!-- message.blade.phpの内容をcomponentと置き換える -->
<!-- message.blade.phpの msg_title にslotの内容を代入する（slot） -->
    @component('components.message')
        @slot('msg_title')
        COUTION!<br>
        COUTION!
        @endslot

        @slot('msg_content')
        これはメッセージの表示です。
        @endslot
    @endcomponent

<!-- message.blade.phpの内容をサブビューとしてincludeと置き換える -->
    @include('components.message', 
    ['msg_title'=>'OK<br>OK','msg_content'=>'サブビューです。'])

<!-- 連続表示 -->
{{--
    <ul>
    @each('components.item', $data, 'item')
    </ul>
--}}

@endsection

@section('footer')
copyright 2020 xxx
@endsection

<!-- p88変更前
<html>
<head>
<title>Hello/Index</title>
<style>
body {font-size:16pt;: color:#999; }
h1 { font-size:50pt; text-align:right; color:#f6f6f6;
    margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
</style>
</head>
<body>
    <h1>Blade/Index</h1>
    @isset ($msg)
        <p>こんにちは、{{$msg}}さん。</p>
    @else
        <p>なにか書いてください。</p>
    @endisset
    <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
    <p>&#064foreachディレクティブの例</p>
    @foreach($data as $item)
    @if ($loop->first)
    <p>※データ一覧</p><ul>
    @endif
    <li>No,{{$loop->iteration}}. {{$item}}</li>
    @if ($loop->last)
    </ul>    <p>--ここまで</p>
    @endif
    @endforeach
    
    <p>&#064forディレクティブの例</p>
    <ol>
    @for($i = 1; $i < 20; $i++)
        @if ($i % 2 == 1)
            @continue
        @elseif ($i <= 10)
            <li>No,{{$i}}
        @else
            @break
        @endif
    @endfor
    </ol>

    <p>&#064whileディレクティブの例</p>
    <ol>
    @php
    $counter = 0;
    @endphp
    @while ($counter < count($data))
    <li>{{$data[$counter]}}</li>
    @php
    $counter++;
    @endphp
    @endwhile
    </ol>
</body>
</html>
-->