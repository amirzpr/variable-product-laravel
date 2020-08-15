@extends('layouts.panel')

@section('main')
  @include('partials._success_status')

  <div class="row justify-content-around mb-2">
    <div class="col-md-3">
      <h5>اطلاعات محصول</h5>
    </div>
    <div class="col-md-9">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="attributes-tab" data-toggle="tab" href="#attributes" role="tab"
             aria-controls="attributes" aria-selected="true">
            مشخصات
          </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="variations-tab" data-toggle="tab" href="#variations" role="tab"
             aria-controls="variations" aria-selected="false">
            متغیرها
          </a>
        </li>
      </ul>
    </div>
  </div>

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

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
          <div class="accordion" id="accordion">
            @foreach($attrGroups as $group)
              <div class="card">
                <div class="card-header p-2" id="heading{!! $group->id !!}">
                  <h2 class="mb-0">
                    <a class="btn btn-link btn-block text-right p-1" type="button" data-toggle="collapse"
                       data-target="#collapse{!! $group->id !!}" aria-expanded="true"
                       aria-controls="collapse{!! $group->id !!}">
                      {{ $group->title }}<span class="small"> ({{ $group->category->title }})</span>
                    </a>
                  </h2>
                </div>

                <div id="collapse{!! $group->id !!}" class="collapse" aria-labelledby="heading{!! $group->id !!}"
                     data-parent="#accordion" data-group-id="{!! $group->id !!}">
                  <div class="card-body">
                    @foreach($group->attributes as $attr)
                      <div class="row mx-0 mb-3 js-attr-container">
                        <div class="col-3 js-attr-title">
                          <div class="row">
                            @if( $attr->type->name == \App\Models\Product\Attribute\AttributeType::boolean )
                              <label class="pointer user-select-none">
                                <input type="checkbox" class="js-attribute-toggle">
                                <span class="h6 mr-2">{{ $attr->title }}</span>
                              </label>
                            @else
                              <h6 class="pointer js-attribute-toggle user-select-none">
                                <span class="font-weight-bolder ml-2">+</span>
                                {{ $attr->title }}
                              </h6>
                            @endif
                          </div>
                        </div>
                        <div class="col-9 js-attr-input">
                          @include( $attr->type->partial, ['attrId' => $attr->id, 'options' => $attr->attributeOptionValues])
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="tab-pane fade" id="variations" role="tabpanel" aria-labelledby="variations-tab">
          <div class="d-flex align-items-center">
            <div class="spinner-border ml-3" role="status" aria-hidden="true"></div>
            <strong>در حال بارگذاری...</strong>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{!! asset('js/attributes.js') !!}"></script>
@endpush