@extends('layouts.app')
@section('title', 'Item List')
@section('content')

<link rel="stylesheet" href="{{ asset('/css/items.css')  }}" >
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<div id="item-list">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-sm">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></span>
          <input type="text" class="form-control" placeholder="search items" aria-label="search" aria-describedby="basic-addon1">
        </div>
      </div>
      {{--<div class="col-sm">
        <a href="{{ route('category.edit')}}" class="btn btn-ml fw-bold" style="width: 100%; background-color: #99CCFF; color: #fff;">Add Category</a>
      </div>--}}
      <div class="col-sm">
        <a href="{{ route('item.create') }}" class="btn btn-ml fw-bold" style="width: 100%; background-color: #99CCFF; color: #fff;">Add Item</a>
      </div>
      <div class="col-sm">
          <a href="{{route('category.index')}}" class="btn btn-ml fw-bold" style="width: 100%; background-color: #99CCFF; color: #fff;">Category</a>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <select class="form-control text-center fw-bold" id="exampleFormSelect1" style="background-color: #99CCFF; color: #fff;">
            <option selected>Sort By</option>
            <option value="priceHtL">Price High to Low</option>
            <option value="name">Name</option>
            <option value="stock">Stock Few</option>
          </select>
        </div>
      </div>
    </div>

    <div class="container mt-5 item-container">
      <div class="row row-cols-5">
          @foreach($all_items as $item)
              <div class="col">
                  <div class="card mb-3">
                    <a href="{{ route('item.edit', $item->id) }}">
                      <img src="{{$item->image}}" alt="{{ $item->image }}" class="card-img-top rounded"
                          style="height: 200px; object-fit: cover;">
                    </a>
                      {{-- <div class="card-img-top" style="background-image: url('{{ asset("/storage/images/{$item->image}") }}')"></div> --}}
                      <div class="card-body">
                          <p class="card-text text-center fs-4 fw-bold title">{{ $item->name }}</p>
                          <div class="row">
                            <div class="col-6 pe-0 fw-bold">Stock : <span class="fw-normal">{{ $item->inventory }}</span></div>
                            <div class="col-6 text-end ps-0 fs-5">￥{{ $item->price }}</div>
                            <div class="col-12 fw-bold category">Category : <span class="fw-normal">{{ $item->category_id}}</span></div>
                            <div class="text-dark flex-grow-1">Detail: {{ $item->detail }}</div>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach

      </div>
    </div>
  </div>

  <div class="row mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{ $all_items->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($page = 1; $page <= $all_items->lastPage(); $page++)
                <li class="page-item {{ $page == $all_items->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $all_items->url($page) }}">{{ $page }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{ $all_items->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
  </div>
</div>
@endsection
