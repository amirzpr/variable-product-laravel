@extends('layouts.panel')

@section('main')
  <div class="container">
    <div class="card mb-3">
      <h5 class="card-header">{{ $product->title }}</h5>
      <div class="card-body">
        <div class="row justify-content-between">
          <div class="col-6">
            <h6 class="card-title">دسته بندی اصلی: {{ $product->rootCategory->title }}</h6>
          </div>
          <div class="col-6">
            <h6 class="card-title">قیمت: {{ $product->price }} تومان</h6>
          </div>
        </div>

        <hr class="my-3">

        @foreach($attrValues as $attrKey => $attrVal)
          <p class="font-weight-bold">{{ $attrKey }}</p>
          <ul>
          @foreach($attrVal as $val)
            <li>{{ is_bool($val) ? ($val == true ? '✔' : '❌') : $val }}</li>
          @endforeach
          </ul>
        @endforeach
      </div>
    </div>
  </div>
@endsection