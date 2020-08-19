@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        
        <div class="col-md-10">
            <div class="card">
                <br>
                    @include('inc.message')
                <div class="card-header text-center">Employee Details</span></div>
                <div class="card-body">
                    <img src="" alt="{{$employee->name}}" srcset="">
                    
                    
                <p>Name: {{$employee->first_name}} {{$employee->last_name}}</p>
                <p>Email: {{$employee->email}}</p>
                <p>Phone: {{$employee->phone_number}}</p>
                <form action="{{route('employee.destroy', $employee->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-right text-white">Delete</button>
                    </form>
                    
                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-secondary ">Edit</a><br><br>
                    <div class="right">
                </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
