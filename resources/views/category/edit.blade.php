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
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row mt-3">
                                <div class="card card-radius">
                                    <div class="card-footer card-image">
                                        <div class="upload-box">
                                            <input type="file" name="upload_file" id="input_files" >
                                            <span>+</span>
                                        </div>   
                                    </div>
                                    <div class="card-body mb-2">
                                        <p>Name :</p>
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
                                    <input type="text" class="mt-1 text-center py-2" name="name" placeholder="Change Category name">                                </div>
                            </div>

                        </form>
                    </div>

                    {{-- left side card means you can create new category --}}

                    <div class="col-6 px-5">
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="row mt-3">
                                    <div class="card">
                                        <div class="card-footer">
                                            <div class="upload-box-new">
                                                <input type="file" name="upload_file" id="input_files" >
                                                <span>+</span>
                                            </div>   
                                        </div>
                                        <div class="card-body mb-2">
                                            <p>Name :</p>
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
                                        <input type="text" class="mt-1 text-center py-2 mx-auto" name="name" placeholder="New Category name">
                                    </div>
                                </div>
                        </form>
                    </div>

                </div>

                
                <div class="row mt-3">
                    <div class="text-center">
                        <a href="#" class="cancel-button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection