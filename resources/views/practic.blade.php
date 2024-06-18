<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:50px">
            <h1>Edit Profile</h1>
            <form action="profileData.php" method="post">
                <label for="EmployeeNumber">Employee Number</label>
                <input type="text" name="EmployeeNumber"><br><br>
                
                <label for="name">Full Name</label>
                <input type="text" id="name" placeholder="Last Name, First Name"><br><br>
                
                <label for="BranchName">Branch Name</label>
                <select id="branch_name" name="BranchName">
                    <option value="Option1" disabled>Branch Name</option>
                    <option value="Option2">XXXXX</option>
                    <option value="Option3">YYYYY</option>
                    <option value="Option4">ZZZZZ</option>
                </select><br><br>
                
                <label for="formFileLg">Upload Photo</label>
                <input type="file" id="formFileLg"><br><br>
                
                <label for="gender">Gender</label><br>
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female</label>
                <input type="radio" name="gender" id="other" value="other">
                <label for="other">Other</label><br><br>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email"><br><br>
                
                <label for="Birthday">Birth Date</label>
                <input type="text" id="birthdate" name="birthdate"><br><br>
                
                <label for="address">Address</label>
                <input type="text" id="address"><br><br>
                
                <input type="submit" name="update_emp_data" value="Save">
            </form>
        </div>
    </div>
</body>
</html>

    <div class="container">
            <div class="row" style="margin-top:50px">
                <div class=""card>
                    <div class="card-header">
                        <div class="card-body">
                            <div class="col-md-6">
                            <form action="add" method="post">
                                <div class="form-group">
                                    <label for="EmployeeNumber">Employee Number</label>
                                    <input type="text" class="form-control" name="EmployeeNumber" value="{{ old('EmployeeNumber')}}">
                                    <span style="color: red">@error('EmployeeNumber'){{$message}} @enderror</span>
                                </div>
            
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Last Name, First Name" value="{{ old('name')}}">
                                    <span style="color: red">@error('name'){{$message}} @enderror</span>

                                </div>
            
                                <div class="form-group">
                                    <label for="BranchName">Branch Name</label>
                                    <select class="form-control" id="branch_name" name="BranchName">
                                        <option value="Option1" disabled>Branch Name</option>
                                        <option value="Option2"></option>
                                        <option value="Option3"></option>
                                        <option value="Option4"></option>
                                    </select>
                                </div>



            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">SAVE</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
    </div>
</body>
</html>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form action="profileData.php" method="post">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="background-color: #99ccff;">
                    <div class="modal-header">
                        <h4 class="modal-title mr-3" id="myModalLabel">Edit Profile</h4>
                        <button type="button" class="close p-3" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-auto">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="EmployeeNumber">Employee Number</label>
                                    <input type="text" class="form-control" name="EmployeeNumber">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Last Name, First Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="BranchName">Branch Name</label>
                                    <select class="form-control" id="branch_name" name="BranchName">
                                        <option value="Option1" disabled>Branch Name</option>
                                        <option value="Option2">XXXXX</option>
                                        <option value="Option3">YYYYY</option>
                                        <option value="Option4">ZZZZZ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="formFileLg">Upload Photo</label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" />
                                </div>
                            </div>
                        </div>
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
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Birthday">Birth Date</label>
                                    <div class="input-group date" id="birthdate" name="birthdate">
                                        <input type="text" class="form-control" id="date" />
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-light d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <div class="d-flex p-3">
                            <button type="submit" class="btn btn-lg" style="background-color: #F2F3F5;"
                                data-dismiss="modal">Reset all</button>
                            <button type="submit" name="update_emp_data" class="btn btn-lg" style="background-color: #336699;">
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
