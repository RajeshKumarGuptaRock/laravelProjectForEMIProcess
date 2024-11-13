
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{URL('/home')}}"> Go Back</a>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Loan Details') }}</div>
                <div class="card-body">
                <table style="width:100%" id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Number of Payments</th>
                            <th>First Payment Date</th>
                            <th>Last Payment Date</th>
                            <th>Loan Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loanDetails as $loan)
                            <tr>
                                <td>{{ $loan->clientid }}</td>
                                <td>{{ $loan->num_of_payment }}</td>
                                <td>{{ $loan->first_payment_date }}</td>
                                <td>{{ $loan->last_payment_date }}</td>
                                <td>{{ $loan->loan_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






