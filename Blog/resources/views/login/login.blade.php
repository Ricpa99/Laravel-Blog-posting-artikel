@extends('navbar.navbar')

@section('container')
   <div class="login-form-bg h-100 mt-5">
       <div class="container h-100">
           <div class="row justify-content-center h-100">
               <div class="col-xl-6">
                   <div class="form-input-content">
                       <div class="card login-form mb-0">
                           @if (session()->has('sukses'))  
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                               {{ session('sukses') }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div> 
                           @endif
                              <div class="card login-form mb-0">
                           @if (session()->has('loginError'))  
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                               {{ session('loginError') }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div> 
                           @endif
                           <div class="card-body pt-5">
                               <a class="nav-link text-center" href="/login"> <h4>Login</h4></a>
       
                               <form class="mt-5 mb-5 login-input" action="\login" method="post">
                                @csrf   
                                <div class="form-floating">
                                       <input class="form-control rounded-top  @error('email') is-invalid @enderror " name="email" id="email" 
                                       type="email" class="form-control" value="{{ old('email') }}" placeholder="Email" autofocus required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-floating">
                                    <input class="form-control rounded-bottom" name="password" id="password" type="password" class="form-control" placeholder="Password" required>
                                </div>
                                   <button class="btn mt-3 login-form__btn submit w-100">Sign In</button>
                               </form>
                               <p class="mt-5 login-form__footer">Dont have account? <a href="/register" class="text-primary">Sign Up</a> now</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection    