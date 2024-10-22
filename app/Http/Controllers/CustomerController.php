<?php

namespace App\Http\Controllers;

use App\Models\CustomerProduct;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        // return $products;
        return view('customers.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation Code
        $File_size = 2 * 1024;
        $request->validate([
            "first_name" => 'required|string|min:3|max:40',
            'last_name' => 'required|string|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[0-9]{11}$/',
            'image' => "image|mimes:jpeg,png,jpg,gif,svg|max:$File_size",
        ]);
        // Validation finished 
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        // image code 
        if ($request->file('image') != null) {
            $image_data = $request->file('image');
            $image_name = rand(0, 255) . rand(0, 255) . $image_data->getClientOriginalName();
            $loacation = public_path('/upload');
            $image_data->move($loacation, $image_name);
            $customer->image = $image_name;
        }
        else{
            $customer->image = 'fake.jpg';
        }
        // image code finished
        $customer->save();
        $customerProduct = new CustomerProduct();
        $customerProduct->customer_id = $customer->id;
        $customerProduct->product_id = $request->product_id;
        $customerProduct->save();

        return redirect()->back()->with('success', "Customer Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $File_size = 2 * 1024;
        $request->validate([
            "first_name" => 'required|string|min:3|max:40',
            'last_name' => 'required|string|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[0-9]{11}$/',
            'image' => "image|mimes:jpeg,png,jpg,gif,svg|max:$File_size",
        ]);
        $customer = Customer::find($id);
        // data code
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        // image code
        $image_data = $request->file('image');
        if ($image_data == null) {

        } else {
            $oldImage = $customer->image;
            $file_path = public_path('upload/') . $oldImage;
            if ($oldImage != 'fake.jpg') {
                unlink($file_path);
            }
            $image_name = rand(0, 255) . rand(0, 255) . $image_data->getClientOriginalName();
            $location = public_path('/upload');
            $image_data->move($location, $image_name);
            $customer->image = $image_name;
        }

        $customer->save();
        return redirect()->back()->with('success', "Customer Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $file_path = public_path('upload/') . $customer->image;
        if ($customer->image != 'fake.jpg') {
            unlink($file_path);
        }
        $customer->delete();
        return redirect()->back()->with('success', "Customer Deleted Successfully");
    }
}
