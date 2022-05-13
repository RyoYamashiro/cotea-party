@extends('layouts.app')


@section('title', 'ログイン')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    <div class="container">




      <form class="form" action="{{ route('login') }}" method="post">
        <div class="title-wrapper">
          <h2 class="title">ログイン</h2>
        </div>
        @csrf


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

        <input type="hidden" name="remember" id="remember" value="on">


        <div class="button-holder">
          <button class="form-button" type="submit">ログイン</button>
        </div>


      </form>


    </div>
  </main>
  @include('parts.footer')
</div>
@endsection
