@extends('layouts.app')


@section('title', 'Hello world!')

@section('content')
  @include('parts.header')
  @include('parts.article')
  @include('parts.footer')

@endsection
