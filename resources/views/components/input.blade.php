<div class="row mb-3 mt-3">
    <label for={{ $name ?? strtolower($title)}} class="col-md-4 col-form-label text-md-end">{{ $title }}</label>
    <div class="col-sm">
        <input class="bg-secondary rounded col-sm-8" type={{ $type ?? 'text'}}
            class="form-control 
            @error($name ?? strtolower($title)) is-invalid @enderror" name={{$name ?? strtolower($title) }}
            {{'' ?? $required}} autocomplete={{ $name ?? strtolower($title)}} autofocus value={{ $value ?? '' }}>
        @error($name ?? strtolower($title))
            <div class="alert alert-danger col-sm-8">{{ $message }}</div>
        @enderror
    </div>
</div>