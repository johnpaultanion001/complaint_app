@extends('../layouts.app')
@section('sub-title','Verification')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="o-hidden border-0 my-5">
            <div class="p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Verification Code</h1>
                                @if(session()->has('message'))
                                    <p class="alert alert-info">
                                        {{ session()->get('message') }}
                                    </p>
                                @endif
                                <p class="text-muted">
                                    This {{Auth()->user()->email}} email addresss have received an email which contains one time pin login code.
                                    If you haven't received it, press <a href="{{ route('verify.resend') }}">here</a>.
                                </p>
                                <br><br><br><br><br>
                            </div>
                            <form method="POST" action="{{ route('verify.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="two_factor_code" type="text" class="form-control form-control-user {{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Two Factor Code">
                                    @if($errors->has('two_factor_code'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('two_factor_code') }}
                                        </div>
                                    @endif
                                </div>
                              
                               <div class="row mx-auto">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-dark btn-user btn-block text-uppercase">
                                            Verify
                                        </button>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-10 text-center">
                                        <a class="small text-dark text-center" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">LOGOUT</a>
                                    </div>
                                </div>
                            </form>
                            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script> 

</script>
@endsection
