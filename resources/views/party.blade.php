@extends('layouts.app')

@section('title', 'パーティー詳細')

@section('content')

<div class="wrapper">
  @include('parts.header')

  <main class="main">
      <div class="container container-bg-white">
        <div class="title-wrapper">
          <h2 class="title">パーティー詳細</h2>
        </div>

        <div class="party-top">
          <h3 class="party-title">素敵なカフェ探そう</h3>
          <a class="party-button" href="">参加申請する</a>

        </div>

        <div class="party-middle">
          <div class="party-middle-content">
            <div class="party-item">
              <p class="party-item-title">開催日時</p>
              <p class="party-item-content">2022/05/14 15:00</p>
            </div>
            <div class="party-item">
              <p class="party-item-title">開催場所住所</p>
              <p class="party-item-content">沖縄県那覇市○丁目○○ パークビル2F</p>
            </div>
            <div class="party-item">
              <p class="party-item-title">開催場所店名</p>
              <p class="party-item-content">ララベルカフェ</p>
            </div>
          </div>

          <div class="party-middle-map">
          </div>
        </div>
        <div class="party-bottom">
          <div class="party-item">
            <p class="party-item-title">パーティー詳細説明</p>
            <p class="party-item-content">
              3度の飯よりカフェ巡りが好きな方！ぜひこちらのパーティーにご参加ください！<br>
              沖縄県内でおすすめのカフェを参加者同志で紹介し合いましょう。
            </p>
          </div>
        </div>
      </div>

  </main>
  @include('parts.footer')
</div>

@endsection
