@extends('layouts.panel')

@section('main')
  <div class="container">
    @foreach($products as $product)
      <div class="card mb-3">
        <h5 class="card-header">{{ $product->title }}</h5>
        <div class="card-body">
          <h6 class="card-title">قیمت: {{ $product->price }} تومان</h6>
          <a href="{!! route('products.show', $product) !!}" class="btn btn-primary">برو به صفحه محصول</a>
        </div>
      </div>
    @endforeach
  </div>
@endsection