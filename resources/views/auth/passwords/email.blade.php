@extends('layouts.app')

@section('title', 'パスワード再設定')

@section('content')
  <div class="wrapper">

    @include('parts.header')
    <main class="main">
      <div class="container">
        <form class="form" action="{{ route('password.email') }}" method="post">
          <div class="title-wrapper">
            <h2 class="title">パスワード再設定用メール送信</h2>
          </div>
          @csrf

          <div class="input-holder">
            <label class="form-label" for="email">メールアドレス</label>
            <input class="form-input" type="text" name="email" required value="">
          </div>
          <div class="button-holder">
            <button class="form-button" type="submit">メール送信</button>
          </div>


        </form>
      </div>
    </main>
  </div>
@endsection
