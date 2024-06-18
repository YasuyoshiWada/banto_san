@extends('layouts.app')
{{-- @section('title', 'userlist') --}}  
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
<script src="{{ asset('js/userlist.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
crossorigin="anonymous"></script>



<head>
    <style>
        .container
        {
        justify-content: center; 
        }
        .card{
            margin: auto;
            margin-bottom:10em
        }
        .card-header {
        background-color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="mt-5 row">

        {{--  --}}
        @if(session('status'))
            <h6 class="alert alert-success">{{ session('status')}}</h6>
        @endif
        {{--  --}}
        <div class="card border-primary text-primary w-75">
            <div class="card-header border-primary "><h2>Edit Casher Profile </h2></div>

            <div class="card-body">
                {{-- 試しに書く --}}
                
                
                {{--  --}}
                    <div>
                        <form action="{{ route('edit-profile.edit', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="EmployeeNumber">Employee Number</label>
                                <input type="text" class="form-control" name="EmployeeNumber" value="{{ $user->employee_number }}"autofocus>
                                @error('EmployeeNumber')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="FullName">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Last Name, First Name" value="{{ $user->name }}">
                                <span style="color: red">@error('name'){{$message}} @enderror</span>

                            </div>
        
                            <!-- <div class="form-group">
                                <label for="BranchName">Branch Name</label>
                                <select class="form-control" id="branch_name" name="BranchName" value="{{ old('BranchName')}}">
                                    <option value="Option1" disabled>Branch Name</option>
                                    <option value="Option2"></option>
                                    <option value="Option3"></option>
                                    <option value="Option4"></option>
                                </select>
                                <span style="color: red">@error('BranchName'){{$message}} @enderror</span>
                            </div> -->
                
                            <div class="form-group">
                                <label for="gender">Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="Birthday">Birth Date</label>
                                <div class="input-group date" id="birthdate" name="birthdate">
                                    <input type="text" class="form-control" id="date" value="{{ $user->birthdate }}" />
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                            </div>
                        </div>

                
                        <button type="submit" class="btn btn-lg btn-primary mt-2" disabledname="submit">Save and Redirect</button>
                            
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection