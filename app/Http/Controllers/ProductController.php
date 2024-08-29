<?php

namespace App\Http\Controllers;

use App\Mail\UserLoginNotification;
use App\Events\UserLoggedIn;
use App\Models\customerproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use App\Models\Country;
use App\Models\customshopkeeper;
use App\Models\State;
use App\Models\City;
use App\Models\Customer;
use App\Models\Shopkeeper;
use App\Http\Requests\CustomerRequest;
use PharIo\Manifest\Url;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{

    public function index(Request $request, $id)
    {

        return view('customerproduct', ['id' => $id]);
    }

    /**
     * Get all category for listing
     *
     * @param Request $request
     */

    public function getproduct(Request $request, $id)
    {
        $query = CustomerProduct::where('customer_id', $id)->get();

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('customer_id', function ($data) {
                return '<span class="fw-bold">' . $data->productCustomer->name . '</span>';
            })
            ->rawColumns(['customer_id'])
            ->make(true);

    }
    // public function customerProduct(Request $request)
    // {

    //     return view('customerproduct');
    // }

    public function edit($id)
    {
        $product = CustomerProduct::findOrFail($id);
        $customers = Customer::get();

        return view('updateproduct', ['product' => $product, 'customers' => $customers]);
    }
    public function update(Request $request, $id)
    {
        $product = CustomerProduct::findOrFail($id);

        $product->update($request->all());

        if ($request->hasFile('product')) {
            $file = $request->file('product');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/product', $fileName);
            $product->product = $fileName;
        }

        $product->save();
        // event(new UserLoggedIn($product));
        // Mail::to($product->email)->send(new UserLoginNotification($product));


        return response()->json(['message' => 'Customer edited successfully']);
    }

    public function destroy($id)
    {
        $product = customerproduct::findOrFail($id);
        $product->delete();

        // Optionally return a response
        return redirect()->route('product.data', ['id' => $id])->with('success', 'customer deleted');
    }

}














