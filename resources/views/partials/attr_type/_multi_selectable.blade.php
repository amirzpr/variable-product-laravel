<div class="form-group">
  <select class="custom-select" name="{{$slug }}[]" multiple>
    @foreach($options as $option)
      <option value="{{ $option->id }}">{{ $option->value }}</option>
    @endforeach
  </select>
</div>