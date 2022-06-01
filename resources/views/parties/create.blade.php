@extends('layouts.app')

@section('title', 'パーティー投稿')

@section('content')

<div class="wrapper">
  @include('parts.header')

  <main class="main">
      <div class="container">
        <form class="form" action="{{ route('parties.store') }}" method="post">
          <div class="title-wrapper">
            <h2 class="title">パーティー投稿作成</h2>
          </div>
          @include('parties.form')

          <div class="button-holder">
            <button class="form-button" type="submit">登録</button>
          </div>

        </form>
      </div>

  </main>
  @include('parts.footer')
</div>

@endsection
