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
                               <h1>SANCTION</h1>
                               <br>
                            </div>
                            <form method="POST" id="myForm" class="user" enctype="multipart/form-data">
                            @csrf
                              <div class="row mx-auto">
                                <div class="col-md-10">
                                    <h5 class="text-dark font-weight-bold">MILD</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <hr>
                                </div>
                               
                                <div class="col-md-10">
                                    <h5 class="text-dark font-weight-bold">MIDDLE</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <hr>
                                </div>
                                
                                <div class="col-md-10">
                                    <h5 class="text-dark font-weight-bold">MAJOR</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <hr>
                                </div>
                              </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="profile" class="btn btn-secondary btn-user btn-block">
                                            BACK
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" id="action_button" class="btn btn-dark btn-user btn-block">
                                            NEXT
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
        window.location.href = "complaint";
    });
</script>
@endsection