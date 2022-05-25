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

          @csrf

          <div class="input-holder">
            <label class="form-label" for="name">ユーザー名</label>
            <input class="form-input" type="text" name="name" required value="{{ $user->name ?? old('name') }}">
          </div>
          @if ($errors->has('name'))
          <p class="error-msg">
              {{$errors->first('name')}}
          </p>
          @endif

          <div class="input-holder">
            <label class="form-label" for="email">email</label>
            <input class="form-input" type="text" name="email" required value="{{ $user->email ?? old('email') }}">
          </div>
          @if ($errors->has('email'))
          <p class="error-msg">
            {{$errors->first('email')}}
          </p>
          @endif
          <div class="radio-container">
            <p class="form-label">性別</p>
            <div class="radio">

              <input id="man" name="gender" type="radio" value="0" class="form-radio" {{ $user->gender == 0 ? 'checked' : '' }}>
              <label for="man" class="radio-label">男性</label>
            </div>

            <div class="radio">
              <input id="woman" name="gender" type="radio" value="1" class="form-radio" {{ $user->gender == 1 ? 'checked' : '' }}>
              <label  for="woman" class="radio-label">女性</label>
            </div>
          </div>

          @if ($errors->has('gender'))
          <p class="error-msg">
              {{$errors->first('gender')}}
          </p>
          @endif

          <div class="input-holder">
            <label class="form-label" for="birthday">生年月日</label>
            <input class="form-input" type="date" name="birthday" required value="{{ date('Y-m-d', strtotime($user->birthday)) ?? old('birthday') }}">
          </div>
          @if ($errors->has('birthday'))
          <p class="error-msg">
              {{$errors->first('birthday')}}
          </p>
          @endif

          <div class="input-holder">
            <label class="form-label" for="address">居住地</label>
            <input class="form-input" type="text" name="address" required value="{{ $user->address ?? old('address') }}">
          </div>
          @if ($errors->has('address'))
          <p class="error-msg">
              {{$errors->first('address')}}
          </p>
          @endif

          <div class="input-holder">
            <label class="form-label" for="self_introduction">自己紹介文</label>
            <textarea class="form-input" type="text" name="self_introduction" required rows="6">{{$user->self_introduction ?? old('self_introduction')}}</textarea>
          </div>
          @if ($errors->has('self_introduction'))
          <p class="error-msg">
              {{$errors->first('self_introduction')}}
          </p>
          @endif

          <a href="{{route('password.edit')}}">パスワードを変更する</a>


          <div class="button-holder">
            <button class="form-button" type="submit">更新</button>
          </div>

        </form>
      </div>
    </main>
  </div>
@endsection
