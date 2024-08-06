<?php

namespace App\Http\Controllers;

use App\Mail\UserLoginNotification;
use App\Events\UserLoggedIn;
use App\Events\UserLoggedOut;
use App\Mail\RegisterNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use App\Models\Country;
use App\Models\customshopkeeper;
use App\Models\customerproduct;
use App\Models\State;
use App\Models\City;
use App\Models\Customer;
use App\Models\Shopkeeper;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use PharIo\Manifest\Url;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use App\Events\customermrp;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{

    public function index(Request $request)
    {

        return view('customer');
    }

    /**
     * Get all category for listing
     *
     * @param Request $request
     */
    public function getData(Request $request)
    {
        $query = Customer::with('shopkeepers')->get();

        return Datatables::of($query)
            ->addIndexColumn()

            ->addColumn('country', function ($data) {
                return '<span class="fw-bold">' . $data->countryCustomer['country'] . '</span>';
            })
            ->addColumn('state', function ($data) {
                return '<span class="fw-bold">' . $data->stateCustomer['state'] . '</span>';
            })
            ->addColumn('city', function ($data) {
                return '<span class="fw-bold">' . $data->cityCustomer['city'] . '</span>';
            })

            ->rawColumns(['action', 'country', 'state', 'city'])

            ->make(true);
    }

    public function create()
    {
        $shopkeepers = Shopkeeper::pluck('id', 'name');
        $countrys = Country::pluck('id', 'country');
        $states = State::pluck('country', 'state');
        $citys = City::pluck('state', 'city');

        return view('create', compact('shopkeepers', 'countrys', 'states', 'citys'));
    }

    public function getStates($id)
    {
        $states = State::where('country', $id)->pluck('state', 'id');
        return response()->json($states);
    }

    public function getCities($id)
    {
        $citys = City::where('state', $id)->pluck('city', 'id');
        return response()->json($citys);
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->except('product');

        $fileNames = [];

        if ($request->hasFile('product')) {
            $files = $request->file('product');

            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/product', $fileName);
                $fileNames[] = $fileName;
            }
        }

        $customer = Customer::create($data);

        $customer->shopkeepers()->sync($request->shopkeeper);


        foreach ($fileNames as $fileName) {
            $customer->products()->create([
                'product' => $fileName,
            ]); 
        }

        event(new UserLoggedIn($customer));

        // Mail::to($customer->email)->send(new UserLoginNotification($customer));

        return response()->json(['message' => 'Customer added successfully']);
    }

    public function edit($id)
    {
        $customer = customer::findOrFail($id);
        $shopkeepers = Shopkeeper::all();
        $countrys = Country::all();
        $states = State::all();
        $citys = City::all();

        return view('update', ['customer' => $customer, 'shopkeepers' => $shopkeepers, 'countrys' => $countrys, 'states' => $states, 'citys' => $citys]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update($request->all());

        $customer->shopkeepers()->sync($request->input('shopkeeper', []));

        $customer->save();
        event(new UserLoggedIn($customer));
        return response()->json(['message' => 'Customer updated successfully']);
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Optionally return a response
        Session::flash('success', 'customer Deleted successfully');
        return redirect()->back();
    }
        
}
