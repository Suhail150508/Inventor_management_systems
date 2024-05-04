@extends('layouts.app')

@section('content')
 {{-- toastr --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    {{-- New css --}}
<style>
   /* .button {
            height: 55px;
            width: 150px;
            color: white;
            font-size: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0d06d6;
            cursor: pointer;
            transition: all 0.5s;
            border-radius: 6px;
        }
        .button:hover,
        .button:focus {
            background-color: rgb(62, 247, 87);
            outline: 2px solid #d61a06;
            outline-offset: 8px;
        }
 */


 /* @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap'); */
/* *{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} */
body{
  align-items: center;
  /* justify-content: center; */
  min-height: 100vh;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  /* background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%); */
}
.container{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container .text{
  text-align: center;
  font-size: 41px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  /* margin-left:6rem; */
  background: -webkit-linear-gradient(right, #768182, #bacec9, #8da5a7, #b4aeb7);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 10px 0 0 0;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
    text-align: center !important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}



</style>

{{-- <ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="/">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Posts</a></li>
</ul> --}}

<div class="">
    <div class="box ">
        <div class="box-header">
            <h2  style="font-weight: bold;font-size:1.2rem"><i class="halflings-icon user"></i><span class="break"></span>Invest Amount</h2>
        </div>

        {{-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" style="margin-right:1rem;font-size:1.2rem;float: left;padding:15px;border-radius:20px;margin:.4rem 6rem">
            <i class="icon-plus"></i> <i class="icon-user"></i> <br/> New Investor
        </button> --}}

        <div class="container">
            <div class="text">
              <h2></h2>
            </div>
            <form action="/amount-add" method="POST">
                @csrf
               <div class="form-row">
                  <div class="input-data">

                        @php
                            // $customers = App\Models\Investor::dsc();
                            $customers = App\Models\Investor::orderBy('created_at', 'desc')->get();

                        @endphp
                        <label for="">  </label>
                        <select type="text" name="investor_id" id="date">

                            <option style="font-size:1.1rem" value="">Investor</option>
                            @foreach ($customers as $customer )
                            <option style="font-size:1.1rem" value="{{ $customer->id }}">{{ $customer->name  }}</option>
                            @endforeach
                        </select>

                  </div>
                  <div class="input-data">
                     <input type="text" required name="amount">
                     <div class="underline"></div>
                     <label for="">Amount</label>
                  </div>
               </div>
               <div class="form-row">
                  <div class="input-data">
                     <input type="text" required name="category">
                     <div class="underline"></div>
                     <label for="">Description</label>
                  </div>
                  <div class="input-data">
                     {{-- <input type="text" required name="date">
                     <div class="underline"></div>
                     <label for="">Date</label> --}}

                     <div class="data" style="margin-top:1rem">
                        <input type="date" name="date" id="date" placeholder="2018-07-03">

                        <div class="underline"></div>
                    </div>
                  </div>
               </div>
               <div class="form-row">
               <div class="input-data textarea">
                  <div class="form-row submit-btn">
                     <div class="input-data">
                        <div class="inner"></div>
                        <input class="btn btn-secondary" type="submit" value="submit">
                     </div>
                  </div>
            </form>
            </div>

        </div>



    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <div class="text">
                <h3 style="font-size:1.4rem"><i class="icon-plus"></i> Add Investor</h3>
            </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        {{-- ... --}}

        <div class="container_modal" style="width:100%;">

            <form class="" action="{{ url('/investor-creater') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row" style="display: flex;justify-content:space-between">

                    <div class="input-data " style="margin-bottom: 1rem">
                        <input type="text" name="name" required>
                        <div class="underline"></div>
                        <label for="">Investor Name</label>
                    </div>
                    <div class="input-data " style="margin-bottom: 1rem">
                        <input type="email" name="email" >
                        <div class="underline"></div>
                        <label for="">Email</label>
                    </div>
                </div>
                <div class="form-row" style="display: flex;justify-content:space-between">
                    <div class="input-data">
                        <input type="text" name="mobile" >
                        <div class="underline"></div>
                        <label for="">Phone</label>
                    </div>
                    <div class="data" style="margin-top:1rem">
                        <input type="file" name="image" id="date" placeholder="image">

                        <div class="underline"></div>
                        {{-- <label for="">Date</label> --}}
                    </div>
                </div>

                {{-- <div class="form-row">
                <div class="input-data textarea"> --}}
                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner">

                            </div>
                            <input type="submit" value="submit">
                        </div>
                    </div>
            </form>

        </div>


        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
<!-- Modal end -->

@endsection

