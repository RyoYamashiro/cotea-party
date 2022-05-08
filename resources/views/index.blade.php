@extends('app')


@section('title', 'Hello world!')

@section('content')
<header class="header">
  <h1 class="header-logo"><a href="{{route('index')}}">コーティー<br>パーティー</a></h1>

  <nav class="nav-menu">
    <ul class="menu">
      <li class="menu-item">
        <a class="menu-link" href="">新規登録</a>
      </li>
      <li class="menu-item">
        <a class="menu-link" href="">ログイン</a>
      </li>
      <li class="menu-item">
        <a class="menu-link" href="">マイページ</a>
      </li>
      <li class="menu-item">
        <a class="menu-link" href="">投稿</a>
      </li>
    </ul>
  </nav>
</header>


@endsection
