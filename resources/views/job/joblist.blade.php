@extends('layouts.template')
@section('title', 'Joblist')
@section('content')
<div class="container">
    <h4>Welcome: {{ auth()->guard('employer')->user()->firstname }} {{ auth()->guard('employer')->user()->lastname }}</h4>
    <div class="row">
        <div class="col-md-8 mx-auto" style="margin-top:100px;">
        <h3>My Job Listing Details</h3>
        <span style="float:right;"><a href="{{route('add.job')}}" class="btn btn-success">Add Jobs</a></span>
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session()->get('message')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
         <div class="content">
         <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Position Name</th>
      <th scope="col">Cmpany Name</th>
      <th scope="col">Email To</th>
      <th scope="col">Location</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @if(count($jobs))
 @foreach($jobs as $job)
    <tr>
      <th scope="row">{{ $jobs->firstItem()+$loop->index}}</th>
      <td>{{$job->job_name}}</td>
      <td>{{$job->company_name}}</td>
      <td>{{$job->email_to}}</td>
      <td>{{$job->location}}</td>
      <td><a href="{{route('view.job', encrypt($job->id))}}" class="btn btn-primary btn-sm">View</a>&nbsp;<a href="{{route('delete.job', encrypt($job->id))}}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');">Delete</a></td>
    </tr>
 @endforeach  
 @else
 <tr>
    <td colspan="6">
 No Records found!
</td>
 </tr>
 @endif 
  </tbody>
</table>
{{$jobs->links()}}
         </div>
        </div>
        
    </div>
</div>

@endsection
