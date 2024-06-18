@extends('layouts.app')
@section('title', 'Item Categories')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-1">
        <div class="col-12">
            <h1 class="h1 text-center fw-bold">ITEM CATEGORIES</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 text-end">
            <a href="{{ route('home')}}"><button type="button" class="btn btn-danger">CLOSE</button></a> {{--Return TOP VIEW--}}
        </div>
    </div>
    <div class="row mt-3">
        {{-- Display Categories --}}
        @forelse($all_categories as $category)
        <div class="col-md-3 mt-3 mb-2">
            {{-- Data from categories table. click photo go to category detail page --}}            
            <div class="card h-100 rounded mx-1" style="width: 100%;">
                <a href="{{ route('category.categoryitemlist', $category->id) }}">                    
                    <h3 class="flex-grow-1 fw-bolder ms-2 mt-1">{{ $category->name }}</h3>
                </a>
                <img src="{{$category->image}}"
                        alt="Category Image"
                        class="card-img-top mb-1 rounded" style="height: 180px; object-fit: cover;">                
                        <div class="card-body d-flex flex-column">
                    {{-- Category name from categories table --}}
                    <div class="text-dark fw-bold">Total Amount: $ {{ $category->item->sum('price') }}</div>
                    {{-- Category total amount from categories table --}}
                    <div class="text-dark fw-bold">Total Quantity: {{ $category->item->count() }} piece</div>
                    {{-- Category total number from categories table --}}
                    <div class="text-end mt-auto">
                        <a href="{{route('category.edit' , $category->id)}}"><i class="fa-solid fa-pen me-1"></i></a>
                        {{-- Go to category edit page --}}
                    </div>
                </div>
            </div>
        </div>
        @empty {{-- when no categories exist --}}
        <div class="col">
            <p>No Item Categories</p>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $all_categories->links() }}
        {{-- Page Nation Display(8 categories per page) --}}
    </div>
</div>
@endsection