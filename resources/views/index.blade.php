@extends('layouts.app')
@section('content')
    <div class="lg:w-4/5 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-10">Phone Numbers</h1>
        <form id="formFilter" method="GET" action="{{ route('customer.index') }}" class="grid grid-cols-3">
            @csrf
            @method('GET')
            <div class="form-group">
                <div class="select">
                    <label for="standard-select"  class="py-3 px-4 rounded-xl">Filter by Country: </label>
                    <select name="country" id="country" class="py-3 px-8 bg-gray-100 rounded-xl">
                        <option value="">All country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country[0] }}" {{ !empty($request->country) && $request->country == $country[0] ? 'selected' : '' }}>{{ $country[0] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="select">
                    <label for="standard-select" class="py-3 px-10 rounded-xl">Filter by State: </label>
                    <select name="valid" id="valid" class="py-3 px-4 bg-gray-100 rounded-xl">
                        <option value="OK"  {{ !empty($request->valid) && $request->valid == "OK" ? 'selected' : '' }}>Valid</option>
                        <option value="NOK" {{ !empty($request->valid) && $request->valid == "NOK" ? 'selected' : '' }}>Invalid</option>
                    </select>
                </div>
            </div>
{{--            <button type="submit" class="w-40 py-4 px-5 bg-green-500 text-white rounded-xl">Apply Filters </button>--}}
        </form>

        @php $num = 1; @endphp
        <table class="w-full styled-table">
            <thead class="place-items-center">
            <tr>
                <th>Country</th>
                <th>State</th>
                <th>Country Code</th>
                <th>Phone Number</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->country }}</td>
                    <td><span class="text-green-800">{{ $customer->state ? 'OK' : 'NOK' }}</span></td>
                    <td>{{ '+'.$customer->code }}</td>
                    <td>{{ $customer->number }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span>{{ $customers->links() }}</span>
    </div>

    <script>
        $(document).ready(function() {
            $('#country').on('change', function(){
                $('#formFilter').submit()
                return false
            })
            $('#valid').on('change', function(){
                $('#formFilter').submit()
                return false
            })
        })
    </script>
@endsection
