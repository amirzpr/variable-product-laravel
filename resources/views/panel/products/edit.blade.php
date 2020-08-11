@extends('layouts.panel')

@section('main')
  @include('partials._success_status')

  <div class="row justify-content-around">
    <div class="col-md-3">
      <h5>اطلاعات محصول</h5>
    </div>
    <div class="col-md-9">
      <h5>مشخصات محصول</h5>
    </div>
  </div>

  <hr class="mt-0">

  <div class="row justify-content-around">

    <div class="col-md-3">

      <ul class="list-group pr-0">
        <li class="list-group-item">
          <p class="text-muted mb-2">نام محصول</p>
          <h6>{{ $product->title }}</h6>
        </li>
        <li class="list-group-item">
          <p class="text-muted mb-2">عنوان مناسب URL</p>
          <h6>{{ $product->slug }}</h6>
        </li>
        <li class="list-group-item">
          <p class="text-muted mb-2">قیمت پایه</p>
          <h6>{{ $product->price }} تومان</h6>
        </li>
        <li class="list-group-item">
          <p class="text-muted mb-2">دسته بندی اصلی</p>
          <h6>{{ $product->rootCategory->title }}</h6>
        </li>
        <li class="list-group-item">
          <p class="text-muted mb-2">دسته بندی ها</p>
          <ul>
            @foreach($product->categories as $category)
              <li>{{ $category->title }}</li>
            @endforeach
          </ul>
        </li>
      </ul>
    </div>

    <div class="col-md-9">

      <div class="accordion" id="accordion">
        @foreach($attrGroups as $group)
          <div class="card">
            <div class="card-header p-2" id="heading{!! $group->id !!}">
              <h2 class="mb-0">
                <a class="btn btn-link btn-block text-right p-1" type="button" data-toggle="collapse"
                   data-target="#collapse{!! $group->id !!}" aria-expanded="true"
                   aria-controls="collapse{!! $group->id !!}">
                  {{ $group->title }}
                </a>
              </h2>
            </div>

            <div id="collapse{!! $group->id !!}" class="collapse" aria-labelledby="heading{!! $group->id !!}"
                 data-parent="#accordion" data-group-id="{!! $group->id !!}">
              <div class="card-body">
                @foreach($group->attributes as $attr)
                  <div class="row mx-0 mb-3">
                    <div class="col-3 attr-title-js-marker">
                      <div class="row">
                        <input type="checkbox" class="attribute-toggle">
                        <h6 class="mr-2">{{ $attr->title }}</h6>
                      </div>
                    </div>
                    <div class="col-9">
                      @include($attr->attributeType->partial_panel, ['slug' => $attr->slug, 'options' => $attr->attributeOptions])
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
      $(document).ready(function () {
          $('.attribute-toggle').change(function () {
              let value_input = $(this).closest('.attr-title-js-marker').next();

              if ($(this).prop('checked')) {
                  value_input.show()
              } else {
                  value_input.hide()
              }
          }).trigger('change')
      })
  </script>
@endpush