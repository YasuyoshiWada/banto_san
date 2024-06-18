@extends('layouts.app')
@section('title', 'Category Edit')
<link rel="stylesheet" href="/css/category.css">
@section('content')
    <div class="body">
        <div class="container">
            <div class="justify-content-center">
                <div class="row">
                    <h1 class="text-center">Edit Category</h1>
                </div>
                <div class="row mt-5">
                    {{-- right side card means you can edit category name and image --}}
                    <div class="col-6 px-5">
                        <form action="{{route('category.update' , $category->id )}}" method="POST" enctype="multipart/form-data">                            
                            @csrf
                            @method('PATCH')              

                            <div class="row mt-3">
                                <div class="card card-radius">
                                    <img src="{{$category->image}}"
                                    alt="Category Image"
                                    class="card-img-top mb-1 rounded" style="height: 180px; object-fit: cover;">                                
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>                                
                                <label for="name">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">                            
                                <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    {{-- left side card means you can create a new category --}}
                    <div class="col-6 px-5">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <div class="card card-radius">
                                    <div class="card-footer card-image">
                                        <div class="upload-box">
                                            <input type="file" name="image" id="input_image" accept="image/*">
                                            <button type="submit" class="upload-button">Upload New Image</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 offset-9">
                                    <button type="submit" class="button float-end mt-2">Save</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                   <input type="text" name="name" id="name" class="mt-1 text-center py-2 mx-auto" placeholder="New Category name">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="text-center">
                        <a href="{{route('category.index')}}" class="cancel-button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection