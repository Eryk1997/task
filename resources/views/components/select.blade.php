<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end">
        {{ $title }}
    </label>
    <div class="col-sm">
        <select name={{ $name }} class="form-select bg-secondary rounded col-sm-8"
            aria-label="Default select example">
            <option value="null">Without category</option>
            @foreach ($categories as $category)
                <option value={{ $category->id }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>
