@extends('layouts.panel')

@section('main')
  @include('partials._success_status')
  <div class="row justify-content-around">
    <div class="col-md-3">
      <h5>افزودن مشخصات</h5>
    </div>
    <div class="col-md-8">
      <h5>فهرست مشخصات</h5>
    </div>
  </div>
  <hr class="mt-1">
  <div class="row justify-content-around">
    <div class="col-md-3 p-3 rounded" style="background-color: #eee">
      <form action="{!! route('attrs.store') !!}" method="post">
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
          <label for="group">گروه مشخصات</label>
          <select class="custom-select" id="group" name="attribute_group_id">
            <option selected disabled>انتخاب کنید...</option>
            @foreach($categories as $category)
              @if($category->attributeGroups->count() > 0)
                <optgroup label="{{ $category->title }}">
                  @foreach($category->attributeGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                  @endforeach
                </optgroup>
              @endif
            @endforeach
          </select>
          @include('partials._error_message', ['field' => 'attribute_group_id'])
        </div>

        <div class="form-group">
          <label for="type">نوع</label>
          <select class="custom-select" id="type" name="attribute_type_id">
            <option selected disabled>انتخاب کنید...</option>
            @foreach($attrTypes as $type)
              <option value="{{ $type->id }}">{{ $type->title }}</option>
            @endforeach
          </select>
          @include('partials._error_message', ['field' => 'attribute_type_id'])
        </div>

        <div class="form-group" id="options-div" style="display: none;">
          <label for="options">آیتم ها</label>
          <textarea type="text" class="form-control" id="options" name="options" placeholder="آیتم ها"
                    rows="3">{{ old('options') }}</textarea>
          <small class="text-muted">
            آیتم‌های مورد نظر خود را نوشته و با کاراکتر پایپ «|» از هم جدا کنید.
          </small>
          @include('partials._error_message', ['field' => 'options'])
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
          <th scope="col">نوع</th>
          <th scope="col">گروه مشخصات</th>
          <th scope="col">دسته بندی</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attrs as $attr)
          <tr>
            <th scope="row">{{ $attr->id }}</th>
            <td>{{ $attr->title }}</td>
            <td>{{ $attr->slug }}</td>
            <td>{{ $attr->attributeType->title }}</td>
            <td>{{ $attr->attributeGroup->title }}</td>
            <td>{{ $attr->attributeGroup->category->title }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
      $(document).ready(function () {
          $('#type').change(function (e) {
              if ( e.target.value === '3' || e.target.value === '4' ) {
                  $('#options-div').show()
              } else {
                  $('#options-div').hide()
              }
          })
      })
  </script>
@endpush