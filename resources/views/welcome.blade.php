@extends('layouts.app')

@section('content')
    <div class="row col-12 col-lg-6  text-white m-auto">
        <div class="card bg-dark">
            <div class="card-header">
                Create category
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <x-input title="Name"></x-input>
                    <x-select title="Category" name="parent_id" :categories="$allCategories"></x-select>
                    <x-button title="Create"></x-button>
                </form>

            </div>
        </div>
    </div>

    <div class="row col-8 col-md-4 col-lg-4  text-white">
        <div class="card bg-dark">
            <div class="card-header">
                Select structure
            </div>
            <div class="card-body">
                <form action="{{ asset('/') }}" method="POST">
                    @csrf
                    @method('GET')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="structure[]" value="NULL" id="flexCheckDefault"
                            @if (in_array('NULL', $structures) && count($allCategories)) @checked(true) @endif>

                        <label class="form-check-label" for="flexCheckDefault">
                            All
                        </label>
                    </div>
                    @foreach ($allCategories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="structure[]" value={{ $category->id }}
                                id="flexCheckDefault"
                                @if (isset($structures)) @foreach ($structures as $structure) @if ($structure == $category->id)
                                    @checked(true) @endif
                                @endforeach
                    @endif

                    >
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $category->name }}
                    </label>
            </div>
            @endforeach
            <x-button title="Select"></x-button>

        </div>
    </div>
    </div>


    <ul id="tree1">
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('categories.edit', $category) }}" class="text-white" style="text-decoration: none;">
                    {{ $category->name }}
                </a>
                @if (count($category->childs))
                    @include('child',['childs'=>$category->childs()->orderBy('position','asc')->get()])
                @endif
            </li>
        @endforeach
    </ul>
    @include('sweetalert::alert')

@endsection
