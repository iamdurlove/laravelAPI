<div class="mb-3">
    <label for="" class="form-label">{{$label}}</label>
    <input type="{{$type}}"
        class="form-control form-control-sm" name="{{$name}}" value='{{$value}}' required>
    <span class="form-text text-danger">
        @error($name)
            {{$message}}
        @enderror
    </span>
  </div>
