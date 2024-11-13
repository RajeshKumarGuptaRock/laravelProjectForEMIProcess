
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{URL('/loanprocess')}}"> Go Back</a>
            <div class="card">
                <div class="card-header">{{ __('EMI Details') }}</div>
                <div class="card-body">
                    <table style="width:100%" id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Client ID</th>
                                @foreach($months as $month)
                                    <th>{{ $month }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emiDetails as $emi)
                                <tr>
                                    <td>{{ $emi->clientid }}</td>
                                    @foreach($months as $month)
                                        <td>{{ $emi->{$month} ?? 0 }}</td>
                                    @endforeach
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



