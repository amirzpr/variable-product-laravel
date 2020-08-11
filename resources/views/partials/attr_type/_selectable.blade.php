<div class="form-group">
  <select class="custom-select" name="{{$slug }}">
    <option selected>انتخاب کنید...</option>
    @foreach($options as $option)
      <option value="{{ $option->id }}">{{ $option->value }}</option>
    @endforeach
  </select>
</div>