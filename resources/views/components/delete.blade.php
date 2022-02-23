<div class="row justify-content-between">
    @if (count($category->childs))
        @foreach ($arrayButtons as $button)
            <div class="col-5">
                <button type="submit" class="btn btn-danger col-12" name={{ $button['name'] ?? '' }}
                    value={{ $button['value'] ?? '' }}>{{ $button['title'] }}</button>
            </div>
        @endforeach
    @else
    <div class="col-5">
        <button type="submit" class="btn btn-danger col-12" name="button1"
            value="Button1">Delete category</button>
    </div>
    @endif
</div>
