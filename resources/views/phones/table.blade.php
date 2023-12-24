@extends('layouts.master')
@section('content')
    <div class="lg:w-4/5 mx-auto py-8 px-6 bg-white rounded-xl">
            @include('phones.form')
            <table class="w-full styled-table">
                <thead>
                <tr>
                    <th>Country</th>
                    <th>State</th>
                    <th>Country Code</th>
                    <th>Phone Num</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($numbers as $num)
                    <tr>
                        <td>{{ $num->country ?? '' }}</td>
                        <td>{{ $num->state }}</td>
                        <td>+{{ $num->code }}</td>
                        <td>{{ $num->phone_num }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
@endsection
