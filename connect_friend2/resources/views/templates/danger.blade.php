@if ($errors->has($fieldName))
    <div class="text-danger">
        {{ $errors->first($fieldName) }}
    </div>
@endif
