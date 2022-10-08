@extends('../layouts.app')
@section('sub-title','REGISTER')

@section('content')
<style>
    body{
        height: 100vh;
    }

    h1 {
        font-size: 24px;
        font-weight: 700;
        color: #2c2f7c;
    }
</style>
<div class="row h-100 justify-content-center align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-9">
        <div class="o-hidden border-0 my-5">
            <div class="p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg-12">
                        <div>
                            <div class="text-center">
                               <h1>Create new Account</h1>
                            </div>
                            <br><br>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                        <label class="control-label h6" >Name: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Your Name" id="name" name="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label h6" >Email: <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email Address" id="email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="control-label h6" >Password: <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label h6" >Repeat Password: <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-user" placeholder="Repeat Password" id="password-confirm" name="password_confirmation">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark btn-user btn-block text-uppercase">
                                    Register Account
                                </button>
                                
                            </form>
                            <br><br>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<!-- Firebase files -->
<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>
<!-- firebase Conf -->
<script type="text/javascript" src="{{ url('public/assets/js/firebase/firebase-conf.js') }}"></script>
<!-- facebook provider -->
<script type="text/javascript" src="{{ url('public/assets/js/firebase/facebook.js') }}"></script>
<script type="text/javascript" src="{{ url('public/assets/js/firebase/google.js') }}"></script>

<script> 

</script>
@endsection