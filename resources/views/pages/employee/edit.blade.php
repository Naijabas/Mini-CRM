@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="card">
                <div class="container">
                    <br>
                    @include('inc.message')
                    <h4>Edit Your Employee</h4>
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label>Employee First Name</label>
                        <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Employee Last Name</label>
                        <input type="text" name="last_name" value="{{$employee->last_name}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Employee Email</label>
                        <input type="email" name="email" class="form-control" value="{{$employee->email}}">
                      </div>
                      <div class="form-group">
                        <label>Employee Phone</label>
                        <input type="text" name="phone_number" class="form-control" value="{{$employee->phone_number}}">
                      </div>
                      <button type="submit" class="btn btn-primary right">Update Employee</button>
                    </form>
                  </div>
            <br>
        </div>
        
        {{-- {{var_dump($companies)}} --}}
    </div>
</div>
@endsection
