@extends('layouts.app')


@section('title', '新規登録')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    <div class="container">




      <form class="form" action="{{ route('register') }}" method="post">
        <div class="title-wrapper">
          <h2 class="title">ユーザー登録</h2>
        </div>
        @csrf
        <div class="input-holder">
          <label class="form-label" for="name">ユーザー名</label>
          <input class="form-input" type="text" name="name" required value="{{ old('name') }}">
        </div>

        @if ($errors->has('name'))
        <p class="error-msg">
            {{$errors->first('name')}}
        </p>
        @endif


        <div class="input-holder">
          <label class="form-label" for="email">メールアドレス</label>
          <input class="form-input" type="text" name="email" required value="{{ old('email') }}">
        </div>
        @if ($errors->has('email'))
        <p class="error-msg">
            {{$errors->first('email')}}
        </p>
        @endif

        <div class="input-holder">
          <label class="form-label" for="password">パスワード</label>
          <input class="form-input" type="password" name="password" required value="">
        </div>

        @if ($errors->has('password'))
        <p class="error-msg">
            {{$errors->first('password')}}
        </p>
        @endif


        <div class="input-holder">
          <label class="form-label" for="password_confirmation">パスワード（再入力）</label>
          <input class="form-input" type="password" name="password_confirmation" required value="">
        </div>

        <div class="button-holder">
          <button class="form-button" type="submit">登録</button>
        </div>

      </form>


    </div>
  </main>
  @include('parts.footer')
</div>
@endsection
