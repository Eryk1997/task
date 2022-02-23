@extends('layouts.app')

@section('content')
    <div class="row col-12 col-lg-6 text-white m-auto">
        <div class="card bg-dark">
            <div class="card-header d-flex justify-content-between align-items-center">
                Update category
                <a href="{{ asset('/') }}">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Back') }}
                    </button></a>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-input title="Name" :value="$category->name"></x-input>
                    <x-select title="Category" name="parent_id" :categories="$allCategories"></x-select>
                    
                    <x-button title="Update"></x-button>
                </form>
                @if ($numberOfchilds > 1)
                <div class="mt-3">
                    <a href="{{ route('categories.position', $category) }}">
                        <x-button title="Set position"></x-button>
                    </a>
                </div>
                @endif

                <div class="mt-5 row">
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-delete
                            :category="$category"
                            :arrayButtons="
                                    [['title'=>'Delete category','name'=>'button1','value'=>'Button1'],
                                    ['title'=>'Delete with childs','name'=>'button2','value'=>'Button2']],">
                        </x-delete>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
