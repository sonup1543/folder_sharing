@extends('layouts.app')

@section('content')

<style>

.invalid-feedbacks {

    width: 100%;

    margin-top: 0.25rem;

    font-size: .875em;

    color: #dc3545;

}
.but-login{
   background: #c7c7c7;
    border: none;
    color: #000000;
    font-size: 15px;
    padding: 18px 35px;
    border-radius: 3px;
    float: right;
    font-weight: 600;
    width: 100%;
}

@media (min-width: 1200px)


{

.container, .container-lg, .container-md, .container-sm, .container-xl {

    max-width: 1140px;

}

}

</style>



<div class="login-bg-top">

<div class="">

<div class="row">

<div class="col-md-4"> 

<div class="logo">

<img src="{{asset('data/common/nyka_erp.png')}}" alt="">    

</div>

</div>

</div>

</div>

</div>



<div class="login-bg">

<div class="container">

<div class="row justify-content-center">

         <div class="col-md-4">

            <div class="login-box">

               

               <div class="box-bottom">

                  <form method="POST" action="{{ route('login') }}">

                     @csrf

                     <div class="row">

                        <div class="col-md-12">

                           <h3 style="color: #1d1d1d;font-weight: 600;font-size: 26px;padding-bottom: 0;padding-bottom: 15px;">Sign in</h3>

                           

                        </div>

                        <div class="col-md-12">

                           <div class="form-input">

                              <label for="email">{{ __('Email Id') }}</label>

                              <input id="email" placeholder="Your Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                              

                              @error('email')

                              <span class="invalid-feedback" role="alert">

                              <strong>{{ $message }}</strong> 

                              @enderror

                              

                              @if($errors->has('msg'))

                              <div class="invalid-feedbacks" role="alert">

                                <strong>{{ $errors->first('msg') }}</strong>

                              </div>

                              @endif

                           </div>

                        </div>

                        <div class="col-md-12">

                           <div class="form-input">

                              <label for="password">{{ __('Password') }}</label>

                              <input id="password" placeholder="Your Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              

                              @error('password')

                              <span class="invalid-feedback" role="alert">

                              <strong>{{ $message }}</strong>

                              @enderror

                           </div>

                        </div>

                        <div class="col-md-12">

                           <div class="form-check">

                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">

                              {{ __('Remember Me') }}

                              </label>

                           </div>

                        </div>

                        <div class="col-md-12">

                           <button type="submit" class="but-login">{{ __('LOG IN') }}</button>    

                        </div>

                     </div>

                  </form>

               </div>

            </div>

         </div>

      </div>

   </div>

</div>

@endsection