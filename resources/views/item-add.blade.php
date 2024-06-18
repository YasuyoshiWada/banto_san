@extends('layouts.app')
@section('title','ADD Items')
@section('content')
<link rel="stylesheet" href="{{ asset('/css/item-add.css')  }}" >


    <div class="container">
        <div class="row justify-content-center">

            {{-- to edit item details --}}
            <form action="#" method="post" enctype="multipart/form-data" id="form1">
                @csrf
                @method('PATCH')

            </form>

            <form action="#" method="post" id="form2">
                @csrf
                @method('DELETE')
            </form>

                <h1 class="text-center">ADD ITEMS</h1>


                <div class="row">
                    {{-- Item card --}}
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10 align-items-center">
                                <div class="card card-potision">
                                    <div class="card-body">
                                        <div class="upload-box">
                                            <input type="file" name="upload_file" id="input_files" >
                                            <span>+</span>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="background-color: rgb(216,230,233)">
                                        <div class="border border-rounded" style="background-color: rgb(153,204,255)">
                                            <p class="h2 text-center">ITEM NAME</p>
                                            <p class="h4 text-center">Chicken</p>
                                            <p class="h5 px-1">PRICE :</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
                                <p class="text-margin">DRAG-AND-DROP TO CHANGE IMAGES</p>
                            </div>
                        </div>
                    </div>
                    {{-- Those inputs edit item information --}}
                    <div class="col-4">
                        <label for="item-name" class="form-label"></label>
                        <input type="name" id="item_name" name="item-name" class="form-control text-center input" placeholder="Change Item Name" form="form1">

                        <label for="price" class="form-label"></label>
                        <input type="price" step="0.01" name="price" id="price" class="form-control text-center input" placeholder="Change Price" form="form1">

                        <label for="category" class="form-label"></label>
                        <select name="category" id="category" class="form-select" form="form1">
                            <option value="choose Category">Choose Category</option>
                            <option value="cheese">cheese</option>
                            <option value="milk">milk</option>
                            <option value="eggs">eggs</option>
                            <option value="bread">bread</option>
                            <option value="cakes">cakes</option>
                            <option value="white sandwith">white sandwith</option>
                            <option value="chocolate cake">chocolate cake</option>
                            <option value="cookies">cookies</option>
                            <option value="Chips">Chips</option>
                            <option value="coffee">coffee</option>
                            <option value="tea">tea</option>
                            <option value="beer">beer</option>
                            <option value="flavored beer">flavored beer</option>
                            <option value="beef">beef</option>
                            <option value="fish">fish</option>
                            <option value="frozen meals">frozen meals</option>
                        </select>
                    </div>
                    {{-- some buttons  close, save ,delete --}}
                    <div class="col-4">
                        <div class="row mt-5">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="row mt-1 close-button">
                                    <a href="#" class="close-button text-decoration-none text-center">Close</a>
                                </div>
    
                                <div class="row mt-5 save-button">
                                    <button data-bs-toggle="modal" data-bs-target="#save-item" class="save-button btn btn-lg" form="form1">Save</button>
                                </div>


        
                                <div class="row mt-5 delete-button">
                                    <button data-bs-toggle="modal" data-bs-target="#delete-item" class="delete-button btn btn-lg" form="form2">Delete</button>
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>

                    
                </div>


            {{-- inventory information --}}

            <div class="row align-items-center inventory">
                <div class="col-2">
                    <button class="sort mx-2">Stock All</button>
                </div>
                <div class="col-2">
                    <button class="sort mx-1">Sell Through All</button>
                </div>
                <div class="col-5">
                    <h1 class="inventory-text">INVENTORY</h1>
                </div>
                <div class="col-2">
                    <button class="sort py-auto mx-1">Check All Categories</button>
                </div>
            </div>

            {{-- table --}}

            <div class="row mt-2">
                <table>
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>IN</th>
                            <th>OUT</th>
                            <th>ITEM</th>
                            <th>PRICE</th>
                            <th>CATEGORY</th>
                            <th>QTY</th>
                            <th>TRANSACTION ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>xx/xx/2023</td>
                            <td>xx/xx/2021</td>
                            <td>xx/xx/2022</td>
                            <td>xxxxx</td>
                            <td>$xxxx</td>
                            <td>xxxxxxxx</td>
                            <td>xxx</td>
                            <td>No.xxxxxxxxx</td>
                        </tr>
                        <tr>
                            <td colspan="12" class="text-center py-3">Display 10 results in the same way below.<br>Next page after 10 in pagination</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example" class="nav">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button data-bs-toggle="modal" data-bs-target="#delete-item" class="delete-button btn btn-lg">Delete</button>
        </div>
        <div class="col-6">
            <button data-bs-toggle="modal" data-bs-target="#save-item" class="delete-button btn btn-lg">save</button>
        </div>
    </div>

@endsection





































