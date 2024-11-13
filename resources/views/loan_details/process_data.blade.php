

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{URL('/home')}}"> Go Back</a>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Loan Details') }}</div>
                <div class="card-body">
                    <form action="{{url('/loanprocess')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Process Data</button>
                        <a href="{{ url('/emidetails') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                        View EMI Details
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









