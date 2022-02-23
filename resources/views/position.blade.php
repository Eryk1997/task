@extends('layouts.app')

@section('content')
    <div class="row col-10 col-sm-6 col-md-4 col-lg-4 text-white m-auto">
        <div class="card bg-dark">
            <div class="card-header d-flex justify-content-between align-items-center">
                Select position
                <a href="{{ route('categories.edit',$category) }}">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Back') }}
                    </button></a>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.updatePosition', $category) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <x-selectPosition title="Index" :category="$category" :numberOfchilds="$numberOfchilds"></x-selectPosition>
                    <x-button title="Set"></x-button>
                </form>

            </div>

        </div>
    </div>
@endsection
