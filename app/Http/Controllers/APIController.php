<?php

namespace App\Http\Controllers;

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

        $user = User::whereUsername($request->username)->first();

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
                'total_amount' => $order->total,
                'status' => $order->status,
                'details' => $order->details->map(function ($item) {
                    return [
                        'item' => $item->product->itemname,
                        'quantity' => $item->quantity,
                        'unit' => $item->product->unit,
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

        Order::whereId($input['id'])->set($input['status']);

        return response()->json([
            'result' => true,
        ]);
    }
}
