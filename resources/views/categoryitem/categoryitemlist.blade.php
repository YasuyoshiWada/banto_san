@extends ('layouts.app')

@section ('title','Category Item List')

@section('styles')

<link rel="stylesheet" href="/css/category.css">
@section ('content')
    <body class="body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <h1 class="col-6 text-end fw-bolder mt-2">CATEGORY ITEM LIST</h1>
                    <div class="col-4 d-flex justify-content-end mt-2">

                        <a href="#">  {{--Sort in ascending descending order--}}
                        <div class="col-2 btn btn-primary btn-sort me-2 btn-important" style="width: 100px; height: 40px;">SORT</div>   
                        </a>

                        <a href="#">  {{--Back to Item Category page--}}
                        <div class="col-2 btn btn-primary btn-cancel me-2 text-center btn-important" style="width: 100px; height: 40px;">CLOSE</div>  
                        </a>

                    </div>
            </div>

            <div class="row mt-3">
            {{-- @forelse ( as ) --}}  {{-- Displaying items in each category (All items in category)--}}
                <div class="col-md-3 mt-3">
                    <div class="card h-100 rounded">
                        <a href="#"> {{--Click on the image to go to the EDIT ITEMS page--}}
                            <img src="#" alt="#" class="card-img-top rounded"
                                style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="mt-1 flex-grow-1">Name: </h5>            {{--Get Item Name (in category)--}}
                            <div class="text-primary">Price: </div>             {{--Get Item Price (in category)--}}
                            <div class="text-dark flex-grow-1">Inventry</div>   {{--Get inventry (in category)--}}
                        </div>
                    </div>
                </div>
                {{--@empty--}}
                <div class="col">
                    <h2 class="text-muted text-center">No stock yet</h2>        {{--Displayed when there are no items in the category--}}
                </div>
                {{--@endforelse--}}
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{--Insert pagination--}}
            </div>
        </div>
    </body>
@endsection