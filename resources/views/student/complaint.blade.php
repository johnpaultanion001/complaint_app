@extends('../layouts.app')
@section('sub-title','COMPLAINT')

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
                               <h1>COMPLAINT FORM</h1>
                               <br>
                            </div>
                            <form method="POST" id="myForm" class="user" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <small>Name Of Complainant:</small>
                                    <input type="text" class="form-control form-control-user" value="{{Auth()->user()->name ?? ''}}" autofocus>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <small>Grade/Year:</small>
                                            <input type="text" class="form-control form-control-user" value="{{Auth()->user()->grade ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <small>Section: </small>
                                            <input type="text" class="form-control form-control-user"  value="{{Auth()->user()->section ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <small>Name Of Complained: <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control form-control-user" id="complained_name" name="complained_name" value="">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-complained_name"></strong>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="isStudent" name="isStudent" >
                                                <label class="form-check-label" for="isStudent">
                                                    STUDENT
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="isTeacher" name="isTeacher" >
                                                <label class="form-check-label" for="isTeacher">
                                                    TEACHER
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <small>Grade/Year:</small>
                                            <input type="text" class="form-control form-control-user" id="grade" name="grade">
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-grade"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <small>Section:</small>
                                            <input type="text" class="form-control form-control-user" id="section" name="section">
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-section"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <small>Your Complaint: <span class="text-danger">*</span></small>
                                    <textarea name="complaint" id="complaint" class="form-control-user form-control"></textarea>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-complaint"></strong>
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <a href="sanction" class="btn btn-secondary btn-user btn-block">
                                            BACK
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" id="action_button" class="btn btn-dark btn-user btn-block">
                                            SEND
                                        </button>
                                    </div>
                                </div>
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
 $('#myForm').on('submit', function(event){
            event.preventDefault();
            $('.form-control').removeClass('is-invalid')
            var action_url = "{{ route('admin.store_complaint') }}";
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
                    $("#action_button").text("SENT");
                    
                    if(data.errors){
                        $.each(data.errors, function(key,value){
                            if(key == $('#'+key).attr('id')){
                                $('#'+key).addClass('is-invalid')
                                $('#error-'+key).text(value)
                            }
                        })
                    }
                    if(data.success){
                        $('.form-control').removeClass('is-invalid')
                        $.confirm({
                            title: 'Confirmation',
                            content: data.success,
                            type: 'green',
                            buttons: {
                                    confirm: {
                                        text: 'confirm',
                                        btnClass: 'btn-blue',
                                        keys: ['enter', 'shift'],
                                        action: function(){
                                            window.location.href = "profile";
                                        }
                                    },
                                    
                                }
                            });
                    }
                    
                }
            });
        });
</script>
@endsection