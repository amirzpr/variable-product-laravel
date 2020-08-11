<div class="form-group js-attr">
  <select class="custom-select" data-attr_id="{!! $attrId !!}">
    <option selected disabled>انتخاب کنید...</option>
    @foreach($options as $option)
      <option value="{{ $option->id }}">{{ $option->value }}</option>
    @endforeach
  </select>
</div>