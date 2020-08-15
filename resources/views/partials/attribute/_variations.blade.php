@foreach( $productAttributes as $productAttr )
  @if( $productAttr->attribute->type->name == \App\Models\Product\Attribute\AttributeType::boolean )
    <div class="border p-3 my-3 js-variation-group">
      <form class="form-inline my-2">
        <div class="custom-control custom-checkbox ml-3">
          <input type="checkbox" class="custom-control-input" id="{{ $productAttr->id }}"
                 @if($productAttr->is_variable) checked @endif>
          <label class="custom-control-label" for="{{ $productAttr->id }}"></label>
        </div>
        <div class="form-group" style="min-width: 200px">
          <p class="form-control-plaintext">{{ $productAttr->attribute->title }}</p>
        </div>
        <div class="form-group mx-sm-3">
          <input type="number" class="form-control" placeholder="مبلغ به تومان"
                 value="{{ $productAttr->attributeBooleanValue->price }}"
                 data-product-attribute-id="{{ $productAttr->id }}">
        </div>
        <button type="submit" class="btn btn-primary mr-auto js-boolean-submit">ثبت</button>
      </form>
    </div>
  @elseif( $productAttr->attribute->type->name == \App\Models\Product\Attribute\AttributeType::select )
    <div class="border p-3 my-3 js-variation-group">
      <div class="form-inline">
        <div class="custom-control custom-checkbox ml-3">
          <input type="checkbox" class="custom-control-input" id="{{ $productAttr->id }}"
                 @if($productAttr->is_variable) checked @endif>
          <label class="custom-control-label" for="{{ $productAttr->id }}"></label>
        </div>
        <h6 class="mb-0">{{ $productAttr->attribute->title }}</h6>
      </div>
      @foreach( $productAttr->attributeOptionValues as $attrOption )
        <form class="form-inline my-2">
          <div class="form-group mr-5" style="min-width: 200px">
            <p class="form-control-plaintext">{{ $attrOption->value }}</p>
          </div>
          <div class="form-group mx-sm-3">
            <input type="number" class="form-control" placeholder="مبلغ به تومان"
                   value="{{ $attrOption->pivot->price }}"
                   data-option-id="{{ $attrOption->id }}">
          </div>
        </form>
      @endforeach
      <div class="text-left">
        <button type="submit" class="btn btn-primary js-options-submit" id="{{ $productAttr->id }}">ثبت</button>
      </div>
    </div>
  @endif
@endforeach