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
            <h6 class="card-title">قیمت: <span id="price">{{ $product->price }}</span> تومان</h6>
          </div>
        </div>

        <hr class="my-3">

        <h6 class="mb-3">آپشن‌های محصول</h6>

        <div class="row">
        @foreach( $variations as $title => $values )
          <div class="border p-3 m-1 col-3">
          @if($values[0]->pivot)
            <h6>{{ $title }}</h6>
            <div>
              <select class="custom-select" id="{{ $values[0]->pivot->product_attribute_id }}">
                <option disabled selected>انتخاب کنید...</option>
                @foreach($values as $option)
                  <option value="{{ $option->id }}">{{ $option->value }}</option>
                @endforeach
              </select>
            </div>
          @else
            <div class="form-inline">
              <div class="custom-control custom-checkbox ml-3">
                <input type="checkbox" class="custom-control-input" id="{{ $values[0]->product_attribute_id }}">
                <label class="custom-control-label" for="{{ $values[0]->product_attribute_id }}"></label>
              </div>
              <h6 class="mb-0 user-select-none">{{ $title }}</h6>
            </div>
          @endif
          </div>
        @endforeach
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