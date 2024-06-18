@extends('layouts.app')
@section('title', 'userlist')
​
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
            integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
            crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
    <script src="{{ asset('js/userlist.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
            crossorigin="anonymous"></script>
    <div class="container mx-auto">
        <div class="row">
            <div class="col-12">
                <h3 class="font-poppins-bold">Hello Administration
                    <i class="fa-solid fa-hands fa-sm"></i>,
                </h3>
            </div>
​
        <div class="row mx-auto">
            <div class="card" style="max-width: 360px; height: 160px">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('/images/transaction.png') }}" class="mt-3 img-fluid rounded-start"
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
            <div class="card" style="max-width: 360px; height: 160px">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('/images/user.png') }}" class="mt-3 img-fluid rounded-start"
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
            <div class="card" style="max-width: 500px; height: 160px">
                <div class="row">
                    <div class="col-lg-4">
                        <canvas id="pie-chart" height="200" width="400"></canvas>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Active workers at Branch</h5>
                            <canvas id="pie-chart"></canvas>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                // ここにJavaScriptコードを挿入
                                new Chart(document.getElementById("pie-chart"), {
                                    type: "pie",
                                    data: {
                                        labels: ["A", "B", "C", "D"],
                                        datasets: [
                                            {
                                                backgroundColor: [
                                                    "#003366",
                                                    "#336699",
                                                    "#99ccff",
                                                    "#ccccff",
                                                    "#f2f3f5",
                                                ],
                                                data: [9, 7, 2, 4],
                                            },
                                        ],
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: true,
                                                position: "right",
                                                labels: {
                                                    color: "rgb(0, 0, 0)",
                                                },
                                            },
                                        },
                                    },
                                });
                            </script>
                            <span></span>
                            <p class="card-text">A XXX</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
​
        <div class="container mt-5">
            <div class="row justify-content-between">
                <div class="col-3">
                    <h3>All Cashers,</h3>
                </div>
                <div class="col-3">
                    <form action="searched.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search Name"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button type="submit" class="input-group-text">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover" id="employee-table">
                <thead class="table-header">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Employee Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->employee_number }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->status == 'active')
                                <a href="{{route('userlist.set-status', $user->id)}}" class="btn btn-primary btn-sm" role="button">Active</a>
                            @else
                                <a href="{{route('userlist.set-status', $user->id)}}" class="btn btn-secondary btn-sm" role="button">Inactive</a>
                            @endif
                        </td>
                        <td>
                        <div class="d-flex">
                            <a href="{{route('EditProfile.index', ['id' => $user->id ])}}" class="btn btn-secondary-outline active " role="button" aria-pressed="true">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                                Edit Profile
                            </a>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}

        </div>
    </div>
@endsection
