<div class="mt-3">
    <label class="form-label" for="Title">
      {{ $title }}
    </label>
    <input type="{{ $type ?? 'text'}}" class="form-control" id="{{ $name }}" name="{{$name}}" placeholder="{{ $placeholder ?? 0 }}" value="{{ $value ?? '' }}">
</div>