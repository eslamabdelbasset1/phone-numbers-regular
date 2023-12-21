<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Services\PhoneNumbersService;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class CustomerController extends Controller
{
    protected $data;
    public function __construct(PhoneNumbersService $phoneNumbers)
    {
        $this->data = $phoneNumbers;
    }

    public function index(Request $request)
    {
        [
            $customers,
            $countries,
            $request,
        ] = $this->data->getData($request);
        return view('index', compact('customers', 'countries', 'request'));
    }
}
