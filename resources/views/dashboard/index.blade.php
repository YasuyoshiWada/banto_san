@extends('layouts.app')
@section('title', 'Item View')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css')  }}" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div id="dashboard">
    <div class="container">
            <h1>Dashboard</h1>

            <div class="row dashboard-top">
                <div class="col date-range rounded me-1">
                    <p class="title">Auto date range</p>
                    <div class="form-group">
                        <input type="text" id="date-range-pick" name="daterange" value="" />
                    </div>
                </div>

                <div class="col service rounded mx-1">
                    <p class="title">Branch</p>
                    <div class="form-group">
                        <select class="form-control text-center fw-bold" id="FormSelect2">
                            <option value="" selected>All</option>
                        </select>
                    </div>
                </div>
                <div class="col-1 rounded ms-1">
                </div>
            </div>{{-- dashboard-top --}}

            <div class="row dashboard-middle">
                <div class="col rounded mx-1">
                    <p class="title">Total sales of specified range</p>
                    <p class="value mb-1" id="total-price">{{ $totalPrice }}</p>
                    {{-- <p class="vs">vs selected date range</p> --}}
                </div>

                <div class="col rounded mx-1">
                    <p class="title">Total number of orders</p>
                    <p class="value" id="total-orders">{{ $totalOrders }}</p>
                </div>

                <div class="col rounded mx-1">
                    <p class="title">Average unit price per order</p>
                    <p class="value" id="average-unit">{{ $averageUnit }}</p>
                </div>

                <div class="col rounded ms-1">
                    <p class="title">Growth Rate</p>
                    <p class="value">5.45%</p>
                    {{-- <p class="rate"><span class="arrow up">↑</span>2.0%</p>
                    <p class="vs">vs previous 30 days</p> --}}
                </div>
            </div>

            <div class="row dashboard-bottom gx-3">

                <div class="col rounded me-1">
                    <p class="">Sales Growth by Market Segment</p>



                    <canvas id="myLine2Chart" width="800" height="400"></canvas>


                </div>
                <div class="col rounded ms-1">
                    <p class="">Sales per  Rep</p>

                    <div class="container" style="width:100%">
                    <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
    </div>
</div>



@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="{{ asset('/js/dashboard.js') }}"></script>

<script>
    $(document).ready(function() {
        var date = new Date(), y = date.getFullYear(), m = date.getMonth();
        var firstDay = new Date(y, m, 1);
        var lastDay = new Date(y, m + 1, 0);
        $('input[name="daterange"]').daterangepicker({
            startDate: firstDay,
            endDate: lastDay,
            // timePicker: true,
            // timePicker24Hour: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        // カレンダーの範囲が変更されたときの処理
        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            var startDate = picker.startDate.format('YYYY-MM-DD');
            var endDate = picker.endDate.format('YYYY-MM-DD');
            var branch_id = $('#FormSelect2').find(":selected").val();

            // サーバーに日付の範囲を送信するためのAjaxリクエストを行うことができます
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/getTotalPrice', // サーバーのルートを指定
                method: 'POST',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                    branch_id: branch_id
                },
                success: function(response) {
                    // サーバーからの応答を処理し、合計価格を表示するためのコードを追加
                    $('#total-price').text(response.total_price);
                    $('#total-orders').text(response.total_orders);
                    $('#average-unit').text(response.average_unit);

                    // Call function to dashboard.js and send data
                }
            });
        });
    });
</script>
@endsection
