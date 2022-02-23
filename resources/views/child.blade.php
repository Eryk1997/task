<ul>
    @foreach ($childs as $child)
        <li class="col-6">
            <a href="{{ route('categories.edit', $child) }}" class="text-white" style="text-decoration: none;">
                {{ $child->name }}
            </a>
            
            @if (count($child->childs))
                @include('child',['childs' => $child->childs()->orderBy('position','asc')->get()])
            @endif
        </li>
    @endforeach
</ul>
