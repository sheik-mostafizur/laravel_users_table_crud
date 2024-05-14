@extends('layout.app')

@section('main')
    @include('product.form', ['product' => $product])
@endsection
