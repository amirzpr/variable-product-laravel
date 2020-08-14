@extends('layouts.panel')

@section('main')
  @include('partials._success_status')
  <div class="row justify-content-around">
    <div class="col-md-3">
      <h5>افزودن گروه مشخصات</h5>
    </div>
    <div class="col-md-8">
      <h5>فهرست گروه مشخصات</h5>
    </div>
  </div>
  <hr class="mt-1">
  <div class="row justify-content-around">
    <div class="col-md-3 p-3 rounded" style="background-color: #eee">
      <form action="{!! route('attribute-groups.store') !!}" method="post">
        @csrf

        <div class="form-group">
          <label for="title">عنوان</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="عنوان"
                 value="{{ old('title') }}">
          @include('partials._error_message', ['field' => 'title'])
        </div>

        <div class="form-group">
          <label for="category">دسته بندی</label>
          <select class="custom-select" id="category" name="category_id">
            <option selected disabled>انتخاب کنید...</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
          </select>
          @include('partials._error_message', ['field' => 'category_id'])
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
          <th scope="col">دسته بندی</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attrGroups as $group)
          <tr>
            <th scope="row">{{ $group->id }}</th>
            <td>{{ $group->title }}</td>
            <td>{{ $group->category->title }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection