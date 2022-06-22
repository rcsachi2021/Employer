@extends('layouts.template')
@section('title', 'Signup')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto" style="margin-top:100px;">
        <h3>Employer Signup</h3>
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session()->get('message')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        @endif
        <form action="{{route('save.employer')}}" method="post" id="employer-registration">
            @csrf
        <div class="row">
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">First Name <span class="text-danger">*</span></label>
                    <input type="text" name="firstname" id="firstname" value="{{old('firstname')}}" class="form-control" required>
                    @error('firstname')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" required>
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" id="mobile" value="{{old('mobile')}}" class="form-control" required>
                    @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                        <label for="lastname">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lastname" id="lastname" value="{{old('lastname')}}" class="form-control" required>
                        @error('lastname')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" required>
                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
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
                
            </div>
            
            <div class="form-group">
            <br/>  
                    <button type="submit" class="btn btn-primary">Register</button>
                    &nbsp;&nbsp;<span>Already a member? <a href="login">login</a></span>
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
   $("#employer-registration").validate({
    rules: {
    email: {
      required: true,
      email: true
    },
    mobile: {
      required: true,
      digits: true
    },
    password: {
      required: true,
      minlength: 6,
      maxlength: 10
    }
  }
   });
   $(".error").css('color','red');
    </script>
    @endsection