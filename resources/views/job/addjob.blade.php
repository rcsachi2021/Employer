@extends('layouts.template')
@section('title', 'Add Job')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto" style="margin-top:100px;">
        <h3>Add Job</h3>
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session()->get('message')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        @endif
        <form action="{{route('save.job')}}" method="post" enctype="multipart/form-data" id="job-add">
            @csrf
        <div class="row">
        <div class="col-md-4">
                <div class="form-group">
                    <label for="jobimage">Job Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" id="image" class="form-control" required>
                    @error('image')<span class="text-danger">{{$message}}</span>@enderror
                </div>                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="jobname">Job Name <span class="text-danger">*</span></label>
                    <input type="text" name="job_name" id="job_name" value="{{old('job_name')}}" class="form-control" required>
                    @error('job_name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="mobile">Emirates <span class="text-danger">*</span></label>
                    <select name="emirates" id="emirates" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Abu Dhabi">Abu Dhabi</option>
                        <option value="Ajman">Ajman</option>
                        <option value="Dubai">Dubai</option>
                        <option value="Fujairah">Fujairah</option>
                        <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                        <option value="Sharjah">Sharjah</option>
                        <option value="Umm Al Quwain">Umm Al Quwain</option>
                    </select>
                    @error('emirates')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="companyname">Company Name <span class="text-danger">*</span></label>
                    <input type="text" name="company_name" id="company_name" value="{{old('company_name')}}" class="form-control" required>
                    @error('company_name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="fromdate">From Date<span class="text-danger">*</span></label>
                    <input type="text" name="from_date" id="from_date" value="{{old('from_date')}}" class="form-control" placeholder="yyyy-mm-dd" required>
                    @error('from_date')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="tilldate">Till Date<span class="text-danger">*</span></label>
                    <input type="text" name="till_date" id="till_date" value="{{old('till_date')}}" class="form-control" placeholder="yyyy-mm-dd" required>
                    @error('till_date')<span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email To <span class="text-danger">*</span></label>
                    <input type="text" name="email_to" id="email_to" value="{{old('email_to')}}" class="form-control" required>
                    @error('email_to')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="location">Location <span class="text-danger">*</span></label>
                    <input type="text" name="location" id="location" value="{{old('location')}}" class="form-control" required>
                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="jobtype">Job Type <span class="text-danger">*</span></label>
                    <select name="job_type" id="job_type" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Finance">Finance</option>
                        <option value="Technology">Technology</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operations">Operations</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Legal Careers">Legal Careers</option>
                    </select>
                    @error('job_type')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                
            </div>
            
            <div class="form-group">
            <br/>  
            <button type="reset" class="btn btn-primary">Cancel</button>&nbsp;
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                </div>
        </div>
</form>
        </div>
        
    </div>
</div>

@endsection
@section('script')
<script>
   $(document).ready(function(){
    
   })
   $("#job-add").validate();
   
    </script>
    @endsection