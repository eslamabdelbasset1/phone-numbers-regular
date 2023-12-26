<?php

namespace App\Http\Controllers;
use App\Handlers\ValidNumber;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct(public ValidNumber $validNumber)
    {
    }

    public function index() {
        $rows = Customer::select('phone')->paginate(10);
        $numbers = $this->validNumber->validateNumbers($rows);
        return view('phones.all_numbers', ['numbers' => $numbers]);
    }

    public function filterPhones(Request $request) {

        $country = $request->country;
        $state = $request->state;
        $rows = DB::table('customer')->get();
        $filtered_numbers = $this->validNumber->validateNumbers($rows);
        $numbers = array_filter($filtered_numbers->toArray(), function ($row) use ($country, $state) {
            return ($row->country == $country && $row->state == $state);
        });
        return view('phones.table', compact('numbers'));
    }
}
