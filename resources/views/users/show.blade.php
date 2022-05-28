@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    <div class="container">
      <div class="title-wrapper">
        <h2 class="title">プロフィール</h2>
      </div>
      <section class="section">

        @if($user->id === auth()->id())
        <table class="profile-table">

          <thead class="thead">
            <tr>
              <td class="thead-first-table-data">
                <p class="table-data-title">ユーザー名</p>
                <p class="table-data">{{$user->name}}</p>
              </td>
              <td>
                <p class="table-data-title">生年月日</p>
                <p class="table-data">{{$user->birthday ?? '--'}}</p>
              </td>
              <td>
                <p class="table-data-title">性別</p>
                <p class="table-data">{{$user->getGender() ?? '--'}}</p>
              </td>

              <td class="thead-last-table-data">
                <p class="table-data-title">居住地</p>
                <p class="table-data">{{$user->address ?? '--'}}</p>
              </td>
            </tr>
          </thead>

          <tbody class="tbody">
            <tr>
              <td colspan="4">
                <p class="table-data-title">メールアドレス</p>
                <p class="table-data">{{$user->email}}</p>
              </td>
            </tr>
          </tbody>
          <tbody class="tbody tbody-bottom">
            <tr>
              <td colspan="4">
                <p class="table-data-title">自己紹介文</p>
                <p class="table-data bio-text">{!! nl2br(e($user->self_introduction ?? '--')) !!}</p>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="profile-button-wrapper">
          <a class="profile-button" href="{{route('users.edit', $user->name)}}">プロフィール編集</a>
        </div>
        @else
        <table class="profile-table">
          <thead class="thead">
            <tr>
              <td class="thead-first-table-data">
                <p class="table-data-title">ユーザー名</p>
                <p class="table-data">{{$user->name}}</p>
              </td>
              <td>
                <p class="table-data-title">年齢</p>
                <p class="table-data">{{$age ?? '--'}}歳</p>
              </td>
              <td>
                <p class="table-data-title">性別</p>
                <p class="table-data">{{$user->getGender() ?? '--'}}</p>
              </td>

              <td class="thead-last-table-data">
                <p class="table-data-title">居住地</p>
                <p class="table-data">{{$user->locate ?? '--'}}</p>
              </td>
            </tr>
          </thead>
          <tbody class="tbody tbody-bottom">
            <tr>
              <td colspan="4">
                <p class="table-data-title">自己紹介文</p>
                <p class="table-data bio-text">{!! nl2br(e($user->self_introduction ?? '--')) !!}</p>
              </td>
            </tr>
          </tbody>
        </table>
        @endif
      </section>

      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">投稿済パーティー</h2>
        </div>
        <div class="article-wrapper">
        </div>
      </section>

      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">参加予定パーティー</h2>
        </div>
        <div class="article-wrapper">
        </div>
      </section>

      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">申請中パーティー</h2>
        </div>
        <div class="article-wrapper">
        </div>
      </section>

    </div>
  </main>
  @include('parts.footer')
</div>

@endsection
