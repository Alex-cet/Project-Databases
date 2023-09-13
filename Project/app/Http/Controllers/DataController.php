<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function findSearchedItems(Request $request) {
        $searchName = $request->input('searchBar');
        $result = DB::table('products')
        ->where('Name', 'like', '%' . $searchName . '%')
        ->get();

        return view('searchResult', compact('result'));
    }

    public function displayCheckoutItems() {
        $cartProducts = DB::table('orderdetails')->get();
        $rowCount = $cartProducts->count();

        return view('checkout', compact('cartProducts', 'rowCount'));
    }

    public function clearCart(Request $request) {
        DB::table('orderdetails')
        ->delete();
        
        return view('clearCart');
    }

    public function handleCheckout(Request $request) {
        $username = session('username');
        $quantities = $request->input('quantity');

        foreach ($quantities as $productID => $quantity) {
            DB::table('OrderDetails')
            ->where('ProductID', $productID)
            ->update(['Quantity' => $quantity]);
        }
        
        $result = DB::table('users')
        ->select('CustomerID')
        ->where('username', $username)
        ->first();
        $userId = $result ? $result->CustomerID : null;

        $currentDate = now();
        $randomNumber = rand(1, 100);

        DB::table('orders')->insert([
            'Number' => $randomNumber,
            'Date' => $currentDate,
            'CustomerID' => $userId,
            'StatusID' => 1,
        ]);

        return view('checkoutRedirect', compact('randomNumber'));
    }

    public function showAccountDetails() {
        $username = session('username');
        $result = DB::table('users')
        ->where('username', $username)
        ->first();

        return view('userAccountDetails', compact('result', 'username'));
    }

    public function searchOrder(Request $request) {
        $orderNumber = $request->input('orderNumber');
        $result = DB::table('order_status')
        ->join('orders', 'order_status.StatusID', '=', 'orders.StatusID')
        ->where('orders.Number', $orderNumber)
        ->get();
        $rowCount = count($result);
        
        return view('searchOrder', compact('result', 'rowCount', 'orderNumber'));
    }

    public function confirmOrderStatus(Request $request, $orderNumber) {
        DB::table('orders')
        ->where('Number', $orderNumber)
        ->update(['StatusID' => 2]);
        
        return view('confirmOrderStatus');
    }

    public function showItemsCategory($category) {
        $decodedCategory = urldecode($category);
        $result = DB::table('products')
        ->where('Category', $decodedCategory)
        ->get();
        return view('showItemsCategory', compact('result'));
    }

    public function displayProductDetails($id) {
        $result = DB::table('products')
        ->where('ProductID', $id)
        ->get();
        
        return view('productDetails', compact('result', 'id'));
    }

    public function addItemToCart($id, $price) {
        $result = DB::table('orderdetails')
        ->where('ProductID', $id)
        ->get();
        $rowCount = count($result);

        return view('addItemToCart', compact('rowCount', 'id', 'price'));
    }
}
