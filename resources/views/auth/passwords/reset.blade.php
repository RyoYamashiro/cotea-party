@extends('layouts.app')

@section('title', 'パスワード再設定')

@section('content')
  <div class="wrapper">

    @include('parts.header')
    <main class="main">
      <div class="container">
        <form class="form" action="{{ route('password.update') }}" method="post">
          <div class="title-wrapper">
            <h2 class="title">パスワード再設定</h2>
          </div>
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">


          <div class="input-holder">
            <label class="form-label" for="email">メールアドレス</label>
            <input class="form-input" type="text" name="email" required value="{{$email ?? old('email')}}">
          </div>

          <div class="input-holder">
            <label class="form-label" for="password">新パスワード</label>
            <input class="form-input" type="password" name="password" required value="">
          </div>

          <div class="input-holder">
            <label class="form-label" for="password_confirmation">新パスワード（再入力）</label>
            <input class="form-input" type="password" name="password_confirmation" required value="">
          </div>
          <div class="button-holder">
            <button class="form-button" type="submit">メール送信</button>
          </div>


        </form>
      </div>
    </main>
  </div>
@endsection
