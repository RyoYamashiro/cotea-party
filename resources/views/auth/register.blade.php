@extends('layouts.app')


@section('title', '新規登録')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    <div class="container">




      <form class="form" action="" method="post">
        <div class="title-wrapper">
          <h2 class="title">ユーザー登録</h2>
        </div>
        @csrf
        <div class="input-holder">
          <label class="form-label" for="name">ユーザー名</label>
          <input class="form-input" type="text" name="name" value="">
        </div>


        <div class="input-holder">
          <label class="form-label" for="email">メールアドレス</label>
          <input class="form-input" type="text" name="email" value="">
        </div>

        <div class="input-holder">
          <label class="form-label" for="password">パスワード</label>
          <input class="form-input" type="password" name="password" value="">
        </div>


        <div class="input-holder">
          <label class="form-label" for="password_confirmation">パスワード（再入力）</label>
          <input class="form-input" type="password" name="password_confirmation" value="">
        </div>

        <div class="button-holder">
          <button class="form-button" type="submit" name="button">登録</button>
        </div>

      </form>


    </div>
  </main>
  @include('parts.footer')
</div>
@endsection
