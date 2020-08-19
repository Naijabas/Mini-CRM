@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        
        <div class="col-md-10">
            <div class="card">
                <br>
                    @include('inc.message')
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

        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h3>Employees</h3></div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        {{-- {{dd($company)}} --}}
                        <tbody>
                            @foreach($company->employees as $index => $employee)
                          <tr>
                          <th scope="row">{{ $index + 1 }}</th>
                            <td>{{$employee->first_name}}</td>
                            <td>{{$employee->last_name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone_number}}</td>
                            <td>
                                <a class="btn btn-sm btn-info text-white" href="{{ route ('employee.show', $employee->id) }}"><i class="far fa-edit"></i>View</a>
                                <a class="btn btn-sm btn-primary" href="{{ route ('employee.show', $employee->id) }}"><i class="far fa-edit"></i>Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{ route ('employee.show', $employee->id) }}"><i class="fas fa-trash-alt"></i>Delete</a>    
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                </div>
            </div>
            <br>
        </div>
        
        
        {{-- {{var_dump($companies)}} --}}
    </div>
</div>
@endsection
