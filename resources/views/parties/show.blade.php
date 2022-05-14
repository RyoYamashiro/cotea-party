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
          <h3 class="party-title">{{$party->title}}</h3>
          <a class="party-button" href="">参加申請する</a>

        </div>

        <div class="party-middle">
          <div class="party-middle-content">
            <div class="party-item">
              <p class="party-item-title">開催日時</p>
              <p class="party-item-content">{{$party->date->format('Y/m/d H:i')}}</p>
            </div>
            <div class="party-item">
              <p class="party-item-title">開催場所住所</p>
              <p class="party-item-content">{{$party->address}}</p>
            </div>
            <div class="party-item">
              <p class="party-item-title">開催場所店名</p>
              <p class="party-item-content">{{$party->shopname}}</p>
            </div>
          </div>

          <div class="party-middle-map">
          </div>
        </div>
        <div class="party-bottom">
          <div class="party-item">
            <p class="party-item-title">パーティー詳細説明</p>
            <p class="party-item-content">
              {{$party->content}}
            </p>
            <div class="host-holder">
              <div class="party-item">
                <p class="party-item-title">主催者</p>
                <p class="party-item-content">{{$party->user->name}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

  </main>
  @include('parts.footer')
</div>

@endsection
