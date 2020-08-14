@extends('layouts.panel')

@section('main')
  @include('partials._success_status')
  <div class="row justify-content-around">
    <div class="col-md-3">
      <h5>افزودن دسته بندی جدید</h5>
    </div>
    <div class="col-md-8">
      <h5>فهرست دسته بندی ها</h5>
    </div>
  </div>
  <hr class="mt-1">
  <div class="row justify-content-around">
    <div class="col-md-3 p-3 rounded" style="background-color: #eee">
      <form action="{!! route('categories.store') !!}" method="post">
        @csrf

        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="عنوان"
                 value="{{ old('title') }}">
          @include('partials._error_message', ['field' => 'title'])
        </div>

        <div class="form-group">
          <label for="slug">عنوان مناسب url</label>
          <input type="text" class="form-control ltr" id="slug" name="slug" placeholder="عنوان مناسب url"
                 value="{{ old('slug') }}">
          <small id="slugHelp" class="text-muted">
            باید فقط شامل حروف کوچک انگلیسی، اعداد و خط فاصله (-) باشد.
          </small>
          @include('partials._error_message', ['field' => 'slug'])
        </div>

        <div class="form-group">
          <label for="parent">دسته بندی مادر</label>
          <select class="custom-select" id="parent" name="parent_id">
            <option value="0">بدون دسته بندی مادر</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
          </select>
          @include('partials._error_message', ['field' => 'parent_id'])
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
          <th scope="col">عنوان مناسب url</th>
          <th scope="col">دسته بندی مادر</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->title }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->parent->title ?? '-' }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection