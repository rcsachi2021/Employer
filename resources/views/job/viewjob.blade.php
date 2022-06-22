@extends('layouts.template')
@section('title', 'View Job')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto" style="margin-top:100px;">
        <h3>View Job</h3>
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session()->get('message')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        @endif
        
        <div class="row">
        <div class="col-md-4">
                <div class="form-group">
                <img src="{{ asset( $job->image) }}" height="100" width="100" class="rounded float-start" alt="...">
                </div>                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="jobname">Job Name : </label>
                    {{$job->job_name}}
                </div>
                <div class="form-group">
                    <label for="Emirates">Emirates: </label>
                    {{$job->emirates}}
                </div>
                <div class="form-group">
                    <label for="companyname">Company Name: </label>
                    {{$job->company_name}}
                </div>
                <div class="form-group">
                    <label for="fromdate">From Date: </label>
                    {{$job->from_date}}
                </div>
                <div class="form-group">
                    <label for="tilldate">Till Date: </label>
                    {{$job->till_date}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email To: </label>
                    {{$job->email_to}}
                </div>
                <div class="form-group">
                    <label for="location">Location: </label>
                    {{$job->location}}
                </div>
                <div class="form-group">
                    <label for="jobtype">Job Type: </label>
                    {{$job->job_type}}
                </div>
                
            </div>
            
           
        </div>

        </div>
        
    </div>
</div>

@endsection
