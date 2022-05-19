<header class="header">
  <h1 class="header-logo"><a href="{{route('parties.index')}}">コーティー<br>パーティー</a></h1>

  <nav class="nav-menu">
    <ul class="menu">
      @guest
      <li class="menu-item">
        <a class="menu-link" href="{{route('register')}}">新規登録</a>
      </li>
      @endguest

      @guest
      <li class="menu-item">
        <a class="menu-link" href="{{route('login')}}">ログイン</a>
      </li>
      @endguest

      @auth
      <li class="menu-item">
        <a class="menu-link" href="/mypage">マイページ</a>
      </li>
      @endauth

      @auth
      <li class="menu-item">
        <a class="menu-link" href="{{route('parties.create')}}">投稿</a>
      </li>
      @endauth

      @auth
      <li class="menu-item">
        <form class="" action="{{route('logout')}}" method="post">
          @csrf
          <input class="menu-link logout-button" type="submit" value="ログアウト">
        </form>
      </li>
      @endauth
    </ul>
  </nav>
</header>
