@extends('../layouts.app')
@section('sub-title','LOGIN')

@section('content')
<style>
    body{
        height: 100vh;
    }

    h1 {
        font-size: 24px;
        font-weight: 700;
        color: #111;
    }
</style>
<div class="row h-100 justify-content-center align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-9">
        <div class="o-hidden border-0 my-5">
            <div class="p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            
                            <div class="text-center">
                                <img  src="{{ trans('panel.logo') }}" alt="logo" class="z-depth-2" width="120" height="120">
                                <br>
                                <br>
                                <h1>Login</h1>
                                <h6>Sign in to continue</h6>
                                @if(!empty($message))
                                    <h6>{{ $message }}</h6>
                                @endif
                            </div>
                            <br>
                            <br>
                            <br>
                            <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                                <div class="form-group">
                                    <small>Email:</small>
                                    <input type="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" autofocus>
                                        @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <small>Password:</small>
                                    <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-dark btn-user btn-block">
                                    LOG IN
                                </button>
                            </form>
                            <br><br>
                            <div class="text-center">
                                <a class="small text-dark" href="{{ url('/register') }}">Create an Account!</a>
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