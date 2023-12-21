<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class PhoneNumbersService
{

    public function getData(Request $request): array
    {
        $valid = false;
        $countries = Customer::getCountry();
        $codes = Customer::getCodes();
        $data = Customer::query()->select('id', 'phone');

//        if (!empty($request->country)) {
//            $data->whereRaw("substr(phone, 2, 3) = '{$codes[$request->country]}'");
//        }
        $customers = $this->attributes($data->get(), $countries);
        if (!empty($request->valid)) {
            $customers = $this->validFilter($customers, $request->valid);
        }
        $customers = $this->paginate($customers, 10);
        return [
            $customers,
            $countries,
            $request,
        ];
    }

    private function attributes($customers, $country)
    {
        foreach ($customers as $k => $customer) {
            $customer->code = substr($customer->phone, 1, 3);
            $customer->number = substr($customer->phone, 6);
            $customer->country = $country[$customer->code][0];
            $customer->state = $this->validNumber($country, $customer);
        }
        return $customers;
    }

    private function validNumber($country, $customer)
    {
        if (preg_match($country[$customer->code][1], $customer->phone)) {
            return true;
        }
        return false;
    }

    private function validFilter($customers, $value)
    {
        $value = $value == 'OK' ? true : false;
        foreach ($customers as $k => $customer) {
            if ($customer->state != $value) {
                $customers->forget($k);
            }
        }
        return $customers;
    }

    private function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
