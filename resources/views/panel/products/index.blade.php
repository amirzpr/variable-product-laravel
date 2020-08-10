@extends('layouts.panel')

@section('main')
  @include('partials._success_status')
  <div class="row justify-content-around">
    <div class="col-md-3">
      <h5>افزودن محصول جدید</h5>
    </div>
    <div class="col-md-8">
      <h5>فهرست محصولات</h5>
    </div>
  </div>
  <hr class="mt-1">
  <div class="row justify-content-around">
    <div class="col-md-3 p-3 rounded" style="background-color: #eee">
      <form action="{!! route('products.store') !!}" method="post">
        @csrf

        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="عنوان"
                 value="{{ old('title') }}">
          @include('partials._error_message', ['field' => 'title'])
        </div>

        <div class="form-group">
          <label for="slug">عنوان مناسب URL</label>
          <input type="text" class="form-control ltr" id="slug" name="slug" placeholder="عنوان مناسب URL"
                 value="{{ old('slug') }}">
          <small id="slugHelp" class="text-muted">
            باید فقط شامل حروف کوچک انگلیسی، اعداد و خط فاصله (-) باشد.
          </small>
          @include('partials._error_message', ['field' => 'slug'])
        </div>

        <div class="form-group">
          <label for="price">قیمت پایه</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="قیمت به تومان"
                 value="{{ old('price') }}">
          @include('partials._error_message', ['field' => 'price'])
        </div>

        <div class="form-group">
          <label for="categories">دسته بندی ها</label>
          <select class="custom-select" id="categories" name="categories[]" multiple>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
          </select>
          @include('partials._error_message', ['field' => 'categories'])
          @include('partials._error_message', ['field' => 'categories.*'])
        </div>

        <div class="form-group">
          <label for="root_category">دسته بندی اصلی</label>
          <select class="custom-select" id="root_category" name="root_category_id">
          </select>
          @include('partials._error_message', ['field' => 'root_category_id'])
        </div>

        <div class="form-group text-left">
          <button type="submit" class="btn btn-primary px-4 mt-2">افزودن</button>
        </div>

      </form>
    </div>
    <div class="col-md-8">
      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">عنوان</th>
          <th scope="col">عنوان مناسب URL</th>
          <th scope="col">قیمت پایه</th>
          <th scope="col">دسته بندی اصلی</th>
          <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
          <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->title }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->price }} تومان</td>
            <td>{{ $product->rootCategory->title }}</td>
            <td>
              <a href="{{ route('products.edit', $product) }}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
      $(document).ready( function () {
          $('#categories').change( function () {
              let html = '<option disabled selected>انتخاب کنید...</option>';

              $('#categories option:selected').each( function () {
                  html += $(this)[0].outerHTML
              });

              $('#root_category').html(html)
          }).trigger('change')
      })
  </script>
@endpush