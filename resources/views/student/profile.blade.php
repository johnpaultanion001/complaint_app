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
    .picture-container {
  position: relative;
  cursor: pointer;
}
.picture {
  width: 120px;
  height: 106px;
  background-color: #d8d1c9;
  border: 4px solid transparent;
  color: #FFFFFF;
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  object-fit: cover;
  
}
.picture:hover {
  border-color: #2ca8ff;
}
.picture-src {
  width: 100%;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
</style>
<div class="row h-100 justify-content-center align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-9">
        <div class="o-hidden border-0 my-5">
            <div class="p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <br>
                            <div class="text-center">
                               <h1>PROFILE</h1>
                               <br>
                              
                            </div>
                            <form method="POST" id="myForm" class="user" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <div class="picture-container">
                                        <div class="form-group">
                                            
                                            <div class="picture">
                                                <img src="@if(Auth()->user()->profile != '') {{ asset('public/assets/student')}}/{{Auth()->user()->profile}} @else {{ asset('public/assets/student/user.png') }}  @endif " class="picture-src" id="wizardProfilePreview" title="" />
                                                <input type="file" id="wizard-profile" name="profile" accept="image/*" >
                                            </div>
                                            <span>
                                                <strong style="font-size: .875em; color: #dc3545;" id="error-wizard-profile"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <h6 id="alert_account" class="text-success text-center mt-2"></h6>

                                </div>
                                <div class="form-group">
                                    <small>Name: <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control form-control-user" id="name" name="name" value="{{Auth()->user()->name ?? ''}}" autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-name"></strong>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <small>Grade/Year: <span class="text-danger">*</span></small>
                                            <input type="text" class="form-control form-control-user" id="grade" name="grade" value="{{Auth()->user()->grade ?? ''}}">
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-grade"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <small>Section: <span class="text-danger">*</span></small>
                                            <input type="text" class="form-control form-control-user" id="section" name="section" value="{{Auth()->user()->section ?? ''}}">
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-section"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <small>LRN: <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control form-control-user" id="lrn" name="lrn" value="{{Auth()->user()->lrn ?? ''}}">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-lrn"></strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <small>Contact Number: <span class="text-danger">*</span></small>
                                    <input type="number" class="form-control form-control-user" id="contact_number" name="contact_number" value="{{Auth()->user()->contact_number ?? ''}}">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-contact_number"></strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <small>Guardian Name: <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control form-control-user" id="guardian_name" name="guardian_name" value="{{Auth()->user()->guardian_name ?? ''}}">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-guardian_name"></strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <small>Guardian Contact Number: <span class="text-danger">*</span></small>
                                    <input type="number" class="form-control form-control-user" id="guardian_contact_number" name="guardian_contact_number" value="{{Auth()->user()->guardian_contact_number ?? ''}}">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-guardian_contact_number"></strong>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="btn btn-secondary btn-user btn-block">
                                            LOGOUT
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" id="action_button" class="btn btn-dark btn-user btn-block">
                                            NEXT
                                        </button>
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

    $(document).ready(function(){
        $("#wizard-profile").change(function(){
            readURL(this);
        });

        function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#wizardProfilePreview').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
        }

        $('#myForm').on('submit', function(event){
            event.preventDefault();
            $('.form-control').removeClass('is-invalid')
            var action_url = "{{ route('admin.update_profile') }}";
            var type = "POST"

            $.ajax({
                url: action_url,
                method:type,
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                beforeSend:function(){
                    $("#action_button").attr("disabled", true);
                    $("#action_button").text("LOADING..");
                },
                success:function(data){
                    $("#action_button").attr("disabled", false);
                    $("#action_button").text("NEXT");
                    
                    if(data.errors){
                        $.each(data.errors, function(key,value){
                            if(key == $('#'+key).attr('id')){
                                $('#'+key).addClass('is-invalid')
                                $('#error-'+key).text(value)
                            }
                            if(key == 'profile'){
                                $('#wizard-profile').addClass('is-invalid')
                                $('#error-wizard-profile').text(value)
                            }
                        })
                    }else{
                        $('.form-control').removeClass('is-invalid')
                        if(data.success == 0){
                            $('#alert_account').text('Wait for the administration response to approved your account');
                        }else{
                            window.location.href = "sanction";
                        }
                    }
                   
                    
                }
            });
        });
    });   


</script>
@endsection