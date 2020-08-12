<div class="input-group flex-row-reverse js-attr-multi">
  <div class="input-group-prepend">
    <span class="input-group-text text-success font-weight-bolder btn btn-success">✔</span>
  </div>
  <select class="custom-select" multiple data-attr_id="{!! $attrId !!}">
    @foreach($options as $option)
      <option value="{{ $option->id }}">{{ $option->value }}</option>
    @endforeach
  </select>
</div>