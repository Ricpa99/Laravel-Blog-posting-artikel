@extends('navbar.navbar')

@section('container')
   <div class="login-form-bg h-100 mt-5">
       <div class="container h-100">
           <div class="row justify-content-center h-100">
               <div class="col-md-5">
                   <div class="form-input-content">
                       <div class="card login-form mb-0">
                           <div class="card-body pt-5">
                               <a class="nav-link text-center" href="/register"> <h4>Registration form</h4></a>
                               <form class="mt-5 mb-5 login-input" action="/register" method="post">
                                @csrf
                                   <div class="form-floating">
                                       <input type="text" name="name" id="name" maxlength="255" class="form-control rounded-top @error('name') is-invalid @enderror"  value="{{old('name') }}"   placeholder="Name" required> 
                                       @error('name')   
                                       <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                        @enderror 
                                    </div>
                                   <div class="form-floating">
                                       <input type="text" name="username" id="username" maxlength="255" class="form-control  @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username" required>
                                       @error('username')   
                                       <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                        @enderror 
                                   </div>
                                  
                                   <div class="form-floating">
                                       <input name="email" id="email" type="email" maxlength="255" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email anda" required>
                                       @error('email')   
                                       <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                        @enderror 
                                    </div>
                                   <div class="form-floating">
                                       <input name="password" id="password" type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" placeholder="Password" required>
                                       @error('password')   
                                       <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                        @enderror 
                                    </div>
                                   <button  class="btn mt-3 login-form__btn submit w-100">Register</button>
                               </form>
                               <p class="mt-5 login-form__footer">Already Registered? <a href="/login" class="text-primary">Login</a> now</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection    