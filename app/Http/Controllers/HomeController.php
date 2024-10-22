<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = DB::table('customers')
            ->join('customer_product', 'customers.id', '=', 'customer_product.customer_id')
            ->join('products', 'customer_product.product_id', '=', 'products.id')
            ->select('customers.id', 'customers.first_name', 'customers.last_name', 'customers.email', DB::raw('COUNT(products.id) as product_count')) // Include the columns explicitly
            ->groupBy('customers.id', 'customers.first_name', 'customers.last_name', 'customers.email') // Group by all selected customer columns
            ->orderBy('product_count', 'desc')
            ->get();

        $LoyalCustomer = DB::table('customers')
            ->join('customer_product', 'customers.id', '=', 'customer_product.customer_id')
            ->join('products', 'customer_product.product_id', '=', 'products.id')
            ->select('customers.id', 'customers.first_name', 'customers.last_name', 'customers.email', DB::raw('COUNT(products.id) as product_count')) // Include the columns explicitly
            ->groupBy('customers.id', 'customers.first_name', 'customers.last_name', 'customers.email') // Group by all selected customer columns
            ->orderBy('product_count', 'desc')
            ->first();
        // return $LoyalCustomer;
        return view('home', compact('results', 'LoyalCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
