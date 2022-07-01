@extends('layouts.template')
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
                          <form method="POST" action="/reset-password">
                           @csrf
                           <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">E-Mail Address</label>
                          
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
    
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">Password</label>
                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            

                        </div>

                      <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">Confirm Password</label>
                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            
                        </div>

                     <div class="form-group mb-0">
                           <div class="offset-md-4">
                            <br/>
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
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
