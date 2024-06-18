<?php

namespace App\Http\Controllers;
use DateTime;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
        {
            $ordersFromDate= Transaction::whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')]);

            $totalPrice = $ordersFromDate->sum('paid_amount');
            $totalOrders = $ordersFromDate->get()->count();
            $averageUnit = $ordersFromDate->count() > 0 ? $totalPrice / $ordersFromDate->count() : 0;
            $branches = Transaction::where('status', 'active')->pluck('branch_id');
            return view('dashboard.index', [
                'totalPrice' => $totalPrice,
                'totalOrders' => $totalOrders,
                'averageUnit' => $averageUnit,
                'branches'    => $branches
            ]);
        }

        public function getTotalPrice(Request $request)
        {
            $startDate =  date('Y-m-d 00:00:00', strtotime($request->input('start_date')));
            $endDate = date('Y-m-d 23:59:59', strtotime($request->input('end_date') . ' + 1 day - 1 second'));
            $branchId = $request->input('branch_id');


            $ordersFromDate = Transaction::whereBetween('created_at', [$startDate, $endDate])
            ->where('branch_id' , $branchId);

            $totalPrice = $ordersFromDate->sum('paid_amount');
            $totalOrders = $ordersFromDate->get()->count();
            $averageUnit = $ordersFromDate->count() > 0 ? $totalPrice / $ordersFromDate->count() : 0;

            return response()->json([
                'total_price' => $totalPrice,
                'total_orders' => $totalOrders,
                'average_unit' => $averageUnit,
            ]);
        }
    }
