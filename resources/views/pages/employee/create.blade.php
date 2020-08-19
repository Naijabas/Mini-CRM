@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="card">
                <div class="container">
                    <br>
                    @include('inc.message')
                    <h4>Create an Employee</h4>
                    <form method="POST" action="{{ route('employee.store')}}">
                      @csrf
                      <div class="form-group">
                        <label>Employee's First Name</label>
                        <input type="text" name="first_name" placeholder="Please the Employee's First Name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Employee's Last Name</label>
                        <input type="text" name="last_name" placeholder="Please the Employee's Last Name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Employee's Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Please the Employee's Email">
                      </div>
                      <div class="form-group">
                        <label>Employee's Phone</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Please the Employee's Phone Number">
                      </div>
                      <button type="submit" class="btn btn-primary right">Create Employee</button>
                    </form>
                  </div>
            <br>
        </div>
        
        {{-- {{var_dump($companies)}} --}}
    </div>
</div>
@endsection
