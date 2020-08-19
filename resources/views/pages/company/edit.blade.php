@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="card">
                <div class="container">
                    <br>
                    @include('inc.message')
                    <h4>Edit Your Company</h4>
                    <form method="POST" action="{{ route('company.update', $company->id) }}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="name" value="{{$company->name}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Company Email</label>
                        <input type="email" name="email" class="form-control" value="{{$company->email}}">
                      </div>
                      <div class="form-group">
                        <label>Company Website</label>
                        <input type="text" name="website" class="form-control" value="{{$company->website}}">
                      </div>
                      <button type="submit" class="btn btn-primary right">Update Company</button>
                    </form>
                  </div>
            <br>
        </div>
        
        {{-- {{var_dump($companies)}} --}}
    </div>
</div>
@endsection
