@extends('layouts.app')

@section('title', 'パーティー詳細')

@section('content')

<div class="wrapper">
  @include('parts.header')

  <main class="main">
    @if(session('flash_message'))
      <div class="flash_message">
        {{session('flash_message')}}
      </div>
    @endif
    <div class="container container-bg-white">
      <div class="title-wrapper">
        <h2 class="title">パーティー詳細</h2>
      </div>

      <div class="party-top">
          <h3 class="party-title">{{$party->title}}</h3>
        <div class="party-button-holder">
          @if(Auth::id() === $party->user_id)
            <a class="party-button edit" href="{{route('parties.edit', compact('party'))}}">編集する</a>
            <form class="party-delete-button-holder" action="{{route('parties.destroy', compact('party'))}}" method="post">
              @method('DELETE')
              @csrf
              <button class="party-button delete" type="submit" name="button">削除する</button>
            </form>
          @else
            @isset($subscribe->status)
            <span class="party-status-badge">{{$subscribe->getStatus()}}</span>
            @endisset
          @endif
        </div>

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

        <div class="party-middle-map" id="show_map" data-lat="{{$party->lat}}" data-lng="{{$party->lng}}">
        </div>
      </div>
      <div class="party-bottom">
        <div class="party-item">
          <p class="party-item-title">パーティー詳細説明</p>
          <p class="party-item-content">
            {!! nl2br(e($party->content)) !!}
          </p>
          <div class="host-holder">
            <div class="party-item">
              <p class="party-item-title">主催者</p>
              <p class="party-item-content"><a class="party-username" href="{{route('users.show', $party->user->name)}}">{{$party->user->name}}</a></p>
            </div>
          </div>
          <div id="subscribe_status_button" data-user="{{auth()->user()->id}}" data-party="{{$party->id}}">
          </div>
        </div>
      </div>
    </div>

  </main>
  @include('parts.footer')
</div>

@endsection
