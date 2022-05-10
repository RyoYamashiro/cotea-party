@extends('layouts.app')


@section('title', 'Hello world!')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    <div class="container">
      <section class="section">
        <div class="title-wrapper">
          <h2 class="title">パーティー一覧</h2>
        </div>
        <div class="article-wrapper">
          @include('parts.article')
          @include('parts.article')
          @include('parts.article')          
        </div>
      </section>
    </div>
  </main>
  @include('parts.footer')
</div>
@endsection
