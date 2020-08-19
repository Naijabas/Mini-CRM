@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="card">
                <div class="container">
                    <br>
                    @include('inc.message')
                    <h4>Create Your Own Company</h4>
                    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="name" placeholder="Enter Your Company Name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Company Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Please Enter The Company Email">
                      </div>
                      <div class="form-group">
                        <label>Company Website</label>
                        <input type="text" name="website" class="form-control" placeholder="Please Enter The Company Website">
                      </div>
                      <form>
                        <div class="form-group">
                          <label>Company Logo</label>
                          <input type="file" name="logo" class="form-control-file" placeholder="Please Select Company Logo">
                        </div>
                        <button type="submit" class="btn btn-primary right">Register Company</button>
                      </form>
                    </form>
                  </div>
                </div>
            </div>
            <br>
        </div>
        
        {{-- {{var_dump($companies)}} --}}
    </div>
</div>
@endsection
