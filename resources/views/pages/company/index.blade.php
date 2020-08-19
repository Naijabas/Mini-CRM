@extends('layouts.app')

@section('content')
<div class="container">
    
    <a href="{{ route('company.create') }}" class="btn btn-secondary float-right">Create Company</a><br><br>
        <div class="row justify-content-center">
        @foreach($companies as $company)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">{{$company->name}}</div>
                <div class="card-body">
                <img src="storage/app/public/{{$company->logo}}" alt="{{$company->name}}" srcset="">
                    <p>{{$company->id}}</p>
                    <p>{{$company->website}}</p>
                <a href="{{ route ('company.show', $company->id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
            <br>
        </div>
        @endforeach
        
        {{-- {{var_dump($companies)}} --}}
    </div>
</div>
@endsection
