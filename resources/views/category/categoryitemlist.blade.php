@extends('layouts.app')
@section('title', 'CategoryItem index')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <h1 class="text-center fw-bolder">{{ $category->name }} <h2 class="text-dark fw-bold">TTL: $ {{ $category->item->sum('price') }} &nbsp;QTY: {{ $category->item->count() }} piece</h2></h1>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{route('category.index')}}"><button type="button" class="btn btn-danger">CLOSE</button></a> {{--Return TOP VIEW--}}
    </div>
    <div class="row mt-3">
        @forelse ($category->item as $item )
        <div class="col-md-3 mt-3">
            <div class="card h-100 rounded">
                <a href="{{ route('item.edit', $item->id) }}">
                    <img src="{{$item->image}}" alt="{{ $item->name }}" class="card-img-top rounded"style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="mt-1 flex-grow-1">Name: {{ $item->name }}</h5>
                    <div class="text-primary">Price: $ {{ $item->price }}</div>
                    <div class="text-primary">Inventory: {{ $item->inventory }}</div>
                    <div class="text-dark flex-grow-1">Detail: {{ $item->detail }}</div>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <h2 class="text-muted text-center">No category yet</h2>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $items->links() }}
    </div>
</div>
@endsection