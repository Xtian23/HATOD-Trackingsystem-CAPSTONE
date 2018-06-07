<?php

namespace App\Http\Controllers;

use App\DriverRouteLog;
use App\Order;
use App\Personnel;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class APIController extends Controller
{
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'errors' => $validator->errors()->all(),
            ], 422);
        }

        $user = User::select('users.*')->withPersonnelId()->whereUsername($request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                'result' => true,
                'data' => $user,
            ]);
        }

        return response()->json([
            'result' => false,
            'errors' => ['Invalid username/password'],
        ], 422);
    }

    public function getAssignedOrders($userId)
    {
        $driverDetails = Personnel::whereUserId($userId)->first();

        $orders = Order::undelivered($driverDetails->id)->with(['details.product', 'customer'])->get();

        $data = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'customer' => $order->customer->fullname,
                'address' => $order->customer->address,
                'order_date' => date_create($order->created_by)->format('M d, Y h:i A'),
                'total_amount' => $order->total,
                'status' => $order->status,
                'details' => $order->details->map(function ($item) {
                    return [
                        'item' => $item->product->itemname,
                        'quantity' => $item->quantity,
                        'unit' => $item->product->unit,
                        'amount' => $item->quantity * $item->unit_price,
                    ];
                }),
            ];
        });

        return response()->json([
            'result' => true,
            'data' => $data,
        ]);
    }

    public function setOrderStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:processed,delivered,received',
            'id' => 'required|exists:orders',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'errors' => $validator->errors()->all(),
            ]);
        }

        $order = Order::find($request->id);
        $order->set($request->status);

        return response()->json([
            'result' => true,
        ]);
    }

    public function saveCoords(Request $request)
    {
        $rules = [
            'order_id' => 'required',
            'personnel_id' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'errors' => $validator->errors()->all(),
            ]);
        }

        DriverRouteLog::create($request->only(array_keys($rules)));

        return response()->json([
            'result' => true,
        ]);
    }
}
