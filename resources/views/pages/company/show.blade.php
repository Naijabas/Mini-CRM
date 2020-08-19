@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><span class="float-left">Name: </span>{{$company->name}}<span class="float-right">{{$company->id}}</span></div>
                <div class="card-body">
                    <img src="" alt="{{$company->name}}" srcset="">
                    
                    
                <p>Website: {{$company->website}}</p>
                <form action="{{route('company.destroy', $company->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-right text-white">Delete</button>
                    </form>
                    
                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-secondary ">Edit</a><br><br>
                <a href="{{ route('employee.create') }}" class="btn btn-primary ">Create Employee</a>
                    <div class="right">
                    <br>
                </div>
                </div>
            </div>
            <br>
        </div>
        
        
        {{-- {{var_dump($companies)}} --}}
    </div>
</div>
@endsection
