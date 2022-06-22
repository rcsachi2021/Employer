@extends('layouts.template')
@section('title', 'Forget Password')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto" style="margin-top:100px;">
        <h3>Password Reset</h3>
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session()->get('message')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        @endif
        <form action="{{route('send.verification')}}" method="post" id="email-verification">
            @csrf
        <div class="row">
            
            <div class="col-md-8">
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" required>
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>               
            
            <div class="form-group">
            <br/>  
                    <button type="submit" class="btn btn-primary">Verify Email</button>
                    &nbsp;&nbsp;<span>Not a member ? <a href="{{route('signup')}}">Register</a></span>
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
   $("#email-verification").validate({
    rules: {
    email: {
      required: true,
      email: true
    },
    
  }
   });   
    </script>
    @endsection