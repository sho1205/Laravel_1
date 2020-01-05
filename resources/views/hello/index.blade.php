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
   <table>
   @foreach($data as $item)
   <tr><th>{{$item['name']}}</th><td>{{$item['mail']}}</td></tr>
   @endforeach
   </table>

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
