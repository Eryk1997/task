<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end">
        {{ $title }}
    </label>
    <div class="col-sm">
        <select name={{ strtolower($title) }} class="form-select bg-secondary rounded col-sm-8"
            aria-label="Default select example">
            @for ($i = 1; $i <= $numberOfchilds; $i++)
                @if ($category->position == $i)
                    <option value={{ $category->position }} selected>{{ $category->position }}</option>
                @else
                    <option value={{ $i }}>{{ $i }}</option>
                @endif
            @endfor
        </select>
    </div>
</div>
