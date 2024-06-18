@extends('layouts.app')

@section('title', 'Item Category')

@section('styles')

<style> 
    body {
        margin: 0;
        padding: 0;
        background-color: #99ccff;
    }
    
    .btn-color-sort {
        background-color: #FFFFFF;
    }

    .btn-color-close {
        background-color: #6699CC;
    }
</style>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-1">
        <div class="col-12">
            <h1 class="h1 text-center fw-bold">ITEM CATEGORIES</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-10 text-end">
            <form method="GET" action="#">            {{-- Switch between ascending and descending order --}}
                <button type="submit" class="btn btn-primary me-3 btn-color-sort text-dark"
                    name="sort" value="#">SORT</button> 
            </form>
        </div>

        <div class="col-2 text-start">
            <a href="#"><button type="button" class="btn btn-primary btn-color-close">CLOSE</button></a>  {{--Return TOP VIEW--}}
        </div>
    </div>

    <div class="row mt-3">  {{--Display Categories--}}

        {{--@forelse($all_categories as $item)--}}
        <div class="col-md-3 mt-3 mb-2">                               {{--Data from categories table. click photo go to category detail page --}}
            <div class="card h-90 rounded" style=" height: 280px; width: 205px; ">
                <a href="#"><img src="#" alt="#"  
                        class="card-img-top rounded" style="height: 180px;  object-fit: cover;"></a>
                <div class="card-body d-flex flex-column">
                    <h5 class=" flex-grow-1 fw-bolder">CATEGORY:{{-- from data --}} </h5>              {{--Category name from categories table--}}
                    <div class="text-dark fw-bold">TTL:{{-- from data --}}</div>               {{--Category total amount from categories table--}}
                    <div class="text-dark fw-bold">QTY:{{-- from data --}}</div>               {{--Category total number from categories table--}}
                </div>
            </div>
             <div class="col text-end">
                    <a href="#"><i class="fa-solid fa-pen me-1 text-dark"></i></a>                     {{--Go to category edit page--}}
                    <a href="#"><i class="fa-solid fa-trash text-dark"></i></a>                        {{-- Hide categories--}}
                </div>
        </div>
       {{-- @empty --}}          {{--when a category is delimited--}}
        <div class="col">
            <p>No Item Categories</p>
        </div>
        {{--@endforelse--}}

    </div>

    <div class="d-flex justify-content-center mt-4">
        {{--{{ $all_categories->links() }}--}}                        {{--Page Nation Display(8 categories per page)--}}
    </div>
</div>
@endsection

