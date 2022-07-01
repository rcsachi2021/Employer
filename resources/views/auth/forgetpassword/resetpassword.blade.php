@extends('layouts.template')
@section('title', 'password reset')
@section('content')

<div class="container">
     <div class="row justify-content-center" style="margin-top:100px;">
        <div class="col-md-8">
        @if (session('message'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <div class="card">
              <div class="card-header">Reset Password</div>
                
               <div class="card-body">
                   
                  
                   <form method="POST" action="/forget-password" id="pwd-reset">
                        @csrf
                          <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" required>

                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   <div class="form-group row mb-0">
                         <div class="col-md-6 offset-md-4">
                            <br/>
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
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
  
   $("#pwd-reset").validate({
    rules: {
    email: {
      required: true,
      email: true
    },
    
  }
   });  
    </script>
    @endsection