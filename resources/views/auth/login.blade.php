@extends('layouts.template')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto" style="margin-top:100px;">
        <div class="card">
        <div class="card-header">
        <h3>Employer Login</h3>
        </div>
        <div class="card-body">
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session()->get('message')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        @endif
        <form action="{{route('process.login')}}" method="post" id="employer-login">
            @csrf           
            
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" required>
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="firstname">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" required>
                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>
                </div> <span><a href="/forget-password">Forgot password?</a></span>
            
            
            <div class="form-group">
            <br/>  
                    <button type="submit" class="btn btn-primary">Login</button>
                    &nbsp;&nbsp;<span>Not a member ? <a href="{{route('signup')}}">Register</a></span>
                </div>
        
</form>
        </div>
        </div>
</div>
    </div>
</div>

@endsection
@section('script')
<script>
   $(document).ready(function(){
    
   })
   $("#employer-login").validate({
    rules: {
    email: {
      required: true,
      email: true
    },
    
  }
   });   
    </script>
    @endsection