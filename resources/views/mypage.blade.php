@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    <div class="container">
      <div class="title-wrapper">
        <h2 class="title">プロフィール</h2>
      </div>
      <section class="section">
        <table class="profile-table">
          <thead class="thead">
            <tr>
              <td class="thead-first-table-data">
                <p class="table-data-title">ユーザー名</p>
                <p class="table-data">bbbbbb</p>
              </td>

              <td>
                <p class="table-data-title">生年月日</p>
                <p class="table-data">2022/05/13</p>
              </td>
              <td>
                <p class="table-data-title">性別</p>
                <p class="table-data">男</p>
              </td>

                <td class="thead-last-table-data">
                  <p class="table-data-title">居住地</p>
                  <p class="table-data">沖縄県</p>
                </td>
            </tr>
          </thead>

          <tbody class="tbody">
            <tr>
              <td colspan="4">
                <p class="table-data-title">メールアドレス</p>
                <p class="table-data">xxxxxxxxx@xxxx.co.jp</p>
              </td>
            </tr>
          </tbody>
          <tbody class="tbody tbody-bottom">
            <tr>
              <td colspan="4">
                <p class="table-data-title">自己紹介文</p>
                <p class="table-data bio-text">こんにちは。普段は近所で散歩しながら、時々公園で読書をしています。<br>ご飯はあまり食べるほうではありません。</p>
              </td>
            </tr>
          </tbody>
        </table>
        <a class="profile-button" href="{{route('logout')}}">ログアウト</a>
        <a class="profile-button" href="/profileEdit">プロフィール編集</a>
      </section>

      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">投稿済パーティー</h2>
        </div>
        <div class="article-wrapper">
          @include('parts.article')
        </div>
      </section>

      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">参加予定パーティー</h2>
        </div>
        <div class="article-wrapper">
          @include('parts.article')
        </div>
      </section>

      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">申請中パーティー</h2>
        </div>
        <div class="article-wrapper">
          @include('parts.article')
        </div>
      </section>

    </div>
  </main>
  @include('parts.footer')
</div>

@endsection
