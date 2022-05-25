@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
  <div class="wrapper">

    @include('parts.header')
    <main class="main">
      <div class="container">
        <form class="form" action="{{route('users.update', $user->id)}}" method="post">
          <div class="title-wrapper">
            <h2 class="title">プロフィール編集</h2>
          </div>
          @method('PATCH')

          {{$errors}}
          @csrf

          <div class="input-holder">
            <label class="form-label" for="name">ユーザー名</label>
            <input class="form-input" type="text" name="name" required value="{{ $user->name ?? old('name') }}">
          </div>

          <div class="input-holder">
            <label class="form-label" for="email">email</label>
            <input class="form-input" type="text" name="email" required value="{{ $user->email ?? old('email') }}">
          </div>

          <div class="input-holder">
            <label class="form-label" for="gender">性別</label>
            <input type="radio" name="gender" value="0" class="form-input-radio"><span>男性</span>
            <input type="radio" name="gender" value="1" class="form-input-radio"><span>女性</span>
          </div>

          <div class="input-holder">
            <label class="form-label" for="birthday">生年月日</label>
            <input class="form-input" type="date" name="birthday" required value="{{ date('Y-m-d', strtotime($user->birthday)) ?? old('birthday') }}">
          </div>
          <div class="input-holder">
            <label class="form-label" for="address">居住地</label>
            <input class="form-input" type="text" name="address" required value="{{ $user->address ?? old('address') }}">
          </div>

          <div class="input-holder">
            <label class="form-label" for="self_introduction">自己紹介文</label>
            <textarea class="form-input" type="text" name="self_introduction" required rows="6">{{$user->self_introduction ?? old('self_introduction')}}</textarea>
          </div>

          <a href="{{route('password.edit')}}">パスワードを変更する</a>


          <div class="button-holder">
            <button class="form-button" type="submit">更新</button>
          </div>

        </form>
      </div>
    </main>
  </div>
@endsection
