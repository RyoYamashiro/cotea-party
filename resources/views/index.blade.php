@extends('layouts.app')


@section('title', 'Hello world!')

@section('content')
<div class="wrapper">
  @include('parts.header')
  <main class="main">
    @include('parts.article')

  </main>
  @include('parts.footer')
</div>
@endsection
