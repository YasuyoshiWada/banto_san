@extends('layouts.app')
@section('title', 'userlist')

@section('content')

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
        <script src={{asset('.js/userlist.js')}}></script>


    <div class="container mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="font-poppins-bold">Hello Administration
                      {{-- put name after Hello --}}
                      <i class="fa-solid fa-hands fa-sm"></i>,
                    </h3>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="card" style="max-width: 360px; height:160px">
                <div class="row">
                    <div class="col-md-4">
                        <img src={{ url('/storage/images/transaction.png') }} class="mt-3 img-fluid rounded-start"
                            alt="transaction">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total Transaction</h5>
                            <p class="card-text">5,423</p>
                            <p class="card-text"><small class="text-muted">↑16% this month</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="max-width: 360px; height:160px">
                <div class="row">
                    <div class="col-md-4">
                        <img src={{ url('/storage/images/user.png') }} class="mt-3 img-fluid rounded-start"
                            alt="user">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Active Workers Now</h5>
                            <p class="card-text">189</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="max-width: 500px; height:160px">
                <div class="row">
                    <div class="col-lg-4">
                        <canvas id="pie-chart" height="200" width="400"></canvas>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Active workers at Branch</h5>
                            <span></span>
                            <p class="card-text">A XXX</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-3">
                <h3>All Cashers,</h3>
            </div>
            {{-- search start --}}
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Employee Number</th> 
                                    <th>Branch</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","12_banto_stock");
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM users WHERE CONCAT(name,username) LIKE '%$filtervalues%'";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id'];?></td>
                                                    <td><?= $items['name'];?></td>
                                                    <td><?= $items['username'];?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!--search -->
            
            <div class="col-3">
                <form action="searched.php" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Name"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <span class="input-group-text">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </form>
            </div> 
        </div>
            <table class="table table-hover">
                <thead class="table-header">
                    <tr>
                        <th scope="col">Name<span><span><i class="fa-solid fa-pen-to-square p-1" data-toggle="modal"
                                        data-target="#myModal"></i></span></i></th>
                        <th scope="col">Employee Number</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreeach ($user as $item) --}}
                    <tr>
                        <th scope="row">Adam</th>
                        <td>123457666</td>
                        <td>Osaka</td>
                        <td><a href="#" class="btn btn-primary btn-sm disabled" tabindex="-1" role="button"
                                aria-disabled="true">Active</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Jacob</th>
                        <td>12344555</td>
                        <td>Osaka</td>
                        <td><a href="#" class="btn btn-primary btn-sm disabled" tabindex="-1" role="button"
                                aria-disabled="true">Active</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Jacob</th>
                        <td>12344555</td>
                        <td>Osaka</td>
                        <td><a href="#" class="btn btn-secondary btn-sm disabled" tabindex="1" role="button"
                                aria-disabled="false">InActive</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Adam</th>
                        <td>123457666</td>
                        <td>Osaka</td>
                        <td><a href="#" class="btn btn-primary btn-sm disabled" tabindex="-1" role="button"
                                aria-disabled="true">Active</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Jacob</th>
                        <td>12344555</td>
                        <td>Osaka</td>
                        <td><a href="#" class="btn btn-primary btn-sm disabled" tabindex="-1" role="button"
                                aria-disabled="true">Active</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Jacob</th>
                        <td>12344555</td>
                        <td>Osaka</td>
                        <td><a href="#" class="btn btn-secondary btn-sm disabled" tabindex="1"
                                role="button" aria-disabled="false">InActive</a></td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <p class="table-footer text-start">Showing data 1 to 10 of 100k entries</p>
                {{-- page nav start --}} 
                <nav aria-label="Page navigation" class="pagination-container float-right">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                </nav>
                {{-- <div class="container">
                    <div class="pagination">
                        <button class="btn1">prev</button>
                            <ul>
                                <li class="link" value="1">1</li>
                                <li class="link" value="2">2</li>
                                <li class="link" value="3">3</li>
                                <li class="link" value="4">4</li>
                                <li class="link" value="5">5</li>
                            </ul>
                        <button class="btn1">next</button>
                    </div>
                </div> --}}
                {{-- page end --}}
            </div>
        </div>
{{-- modal start --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Last Name, First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="formFileLg">Upload Photo</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="EmployeeNumber">Employee Number</label>
                                <input type="text" class="form-control" id="EmployeeNumber">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="BranchName">Branch Name</label>
                                <select class="form-control" id="BranchName">
                                    <option value="Option1" disabled>Branch Name</option>
                                    <option value="Option2">XXXXX</option>
                                    <option value="Option3">YYYYY</option>
                                    <option value="Option4">ZZZZZ</option>
                                </select>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Birthday">Birth Date</label>
                                <div class="input-group date" id="datepicker">
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
                        <button type="button" class="btn btn-lg" style="background-color: #F2F3F5;"
                            data-dismiss="modal">Reset all</button>
                        <button type="button" class="btn btn-lg" style="background-color: #336699;">
                            Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection