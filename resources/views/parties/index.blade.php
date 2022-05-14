@extends('layouts.app')


@section('title', 'パーティー一覧')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    <div class="container">
      <div class="info">
        ・こちらのサービスはあんなかんな、こんなどんなであります。<br>
        ・パーティーは、最低限の常識を踏まえて上で参加お願いします。

      </div>
      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">パーティー一覧</h2>
        </div>
        <div class="article-wrapper">
          @foreach($parties as $party)
            @include('parts.article')
          @endforeach
        </div>
      </section>
    </div>
  </main>
  @include('parts.footer')
</div>
@endsection
