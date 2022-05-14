@extends('layouts.app')

@section('title', 'パーティー投稿')

@section('content')

<div class="wrapper">
  @include('parts.header')

  <main class="main">
      <div class="container">
        <form class="form" action="{{ route('parties.store') }}" method="post">
          @if ($errors->any())
  <div class="card-text text-left alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
          @include('parties.form')
          <div class="button-holder">
            <button class="form-button" type="submit">登録</button>
          </div>

        </form>
      </div>

  </main>
  @include('parts.footer')
</div>

@endsection
