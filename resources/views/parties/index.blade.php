@extends('layouts.app')


@section('title', 'パーティー一覧')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">

    @if(session('flash_message'))
      <div class="flash_message">
        {{session('flash_message')}}
      </div>
    @endif
    <div class="container">
      <div class="info">
        ・こちらのサービスは日常で生活は生み出せない交流を呼び寄せ、カフェなどでリラックスしながら団欒の時間を楽しんでいただくためのサービスです。<br>
        ・一つの集いのことをサービスではパーティーと呼びます。パーティーの投稿・参加は最低限の常識を踏まえて上でお願いします。

      </div>
      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">パーティー一覧</h2>
        </div>
        <div class="article-wrapper" id="article_list" data-party-page-number="{{$partyPageNumber}}">

        </div>
      </section>
    </div>
  </main>
  @include('parts.footer')
</div>
@endsection
