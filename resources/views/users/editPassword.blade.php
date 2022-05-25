@extends('layouts.app')

@section('title', 'パスワード変更')

@section('content')
  <div class="wrapper">

    @include('parts.header')
    <main class="main">
      <div class="container">
        <form class="form" action="{{route('password.change')}}" method="post">
          <div class="title-wrapper">
            <h2 class="title">パスワード変更</h2>
          </div>
          @method('PATCH')

          @csrf

          <div class="input-holder">
            <label class="form-label" for="current_password">以前のパスワード</label>
            <input class="form-input" type="password" name="current_password" required value="">
          </div>

          <div class="input-holder">
            <label class="form-label" for="new_password">新しいパスワード</label>
            <input class="form-input" type="password" name="new_password" required value="">
          </div>
          <div class="input-holder">
            <label class="form-label" for="new_password_confirmation">新しいパスワード（再入力）</label>
            <input class="form-input" type="password" name="new_password_confirmation" required value="">
          </div>


          <div class="button-holder">
            <button class="form-button" type="submit">更新</button>
          </div>


        </form>
      </div>
    </main>
  </div>
@endsection
