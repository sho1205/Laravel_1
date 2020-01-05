<!-- 作りとして、文字はこのファイルで、色や枠線はhelloappやmessageのbladeで設定している。 -->

<!-- 基本はmainを踏襲する -->
@extends('layouts.main')

<!-- mainのyieldをsectionで置き換える -->
@section('title','Index')

<!-- mainにyieldがなければ、section〜showを置き換える
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



@endsection

@section('footer')
copyright 2020 xxx
@endsection
<html>
<frameset rows="100,*,100">
<frame src="head.htm" scrolling=no> 
<frameset cols="450,*">
<frame src="menu.htm" scrolling=no> 
<frame src="main.htm" name=Mainframe>
<body>

    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">※メニューa</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
    @yield('content')
    </div>
    <div class="footer">
    @yield('footer')
    </div>
</body>
</frameset> 
<frame src="foot.htm" scrolling=no>
</frameset>
</html>
