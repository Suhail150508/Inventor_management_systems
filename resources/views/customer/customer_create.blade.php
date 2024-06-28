{{-- @extends('layouts.app')

@section('content')
<style>
   .button {
            height: 55px;
            width: 150px;
            color: white;
            font-size: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #105b40;
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

</style>

<div class="">
    <div class="box">
        <div class="box-header">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Investor</h2>
        </div>

        <div style="margin:0 auto;background-color:rgb(21, 105, 88);color:white;padding:4px;width:50%;border-radius: 5px">
            <h1 style="text-align: center" >Create Investor</h1>
        </div>
        <div class="" style="background-color:lightgray;color:black;width:30%;margin:0 auto;padding-top:3rem;padding:6rem">
           <form class="" action="{{ url('/customer-store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3" style="width: 100%">
              <label for="Name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" style="width:70%;border:2px solid rgba(68, 59, 197, 0)" >
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" style="width:70%;border:2px solid black">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="mobile" style="width:70%;border:2px 3px solid black" >
            </div>

            <div class="mb-3" >
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image"  style="width:70%;padding:1rem;border:2px solid black">
            </div>

            <button type="submit" class="button mb-3" style="margin-top: 2rem;width:75%">Submit</button>
          </form>
        </div>
    </div>
</div>


<script>
    @if (Session::has('message'))

    toastr.options={
          'clossButton':true,
          'progressBar':true
    }

    toastr.success("{{ Session::get('message') }}"
    );

    @endif
</script>
@endsection --}}






@extends('layouts.app')

@section('content')
<style>

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
  height: 30px;
  margin: 10px 30px;
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
  /* border: none; */
  font-size: 17px;
  /* border-bottom: 2px solid rgba(0,0,0, 0.12); */
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
  background: -webkit-linear-gradient(right, #cdcfcf, #898c8d, #636565, #5d6162);
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
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}



</style>


<div class="">
    <div class="box ">
        <div class="box-header">
            <h2  style="font-weight: bold;font-size:1.2rem;text-align:center"><i class="halflings-icon user"></i><span class="break"></span>Customer Create</h2>
        </div>

        <div class="container">
            <form class="" action="{{ url('/customer-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-row">
                  <div class="input-data">
                  <input type="text" class="form-control" name="name"  required>
                     {{-- <div class="underline"></div> --}}
                     <label for="">Name</label>
                  </div>
                  <div class="input-data">
                    <input type="email" class="form-control" name="email">
                     {{-- <div class="underline"></div> --}}
                     <label for="">Email</label>
                  </div>
               </div>
               <div class="form-row">
                   <div class="input-data">
                       <input type="text" class="form-control" name="mobile" required>
                       {{-- <div class="underline"></div> --}}
                       <label for="">Mobile</label>
                    </div>
                    <div class="input-data">
                        <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image"  style="width:70%;padding:1rem;border:2px solid black">
                        {{-- <div class="underline"></div> --}}
                        {{-- <label for="">Vendor_Origin</label> --}}
                    </div>
                </div>
               <div class="form-row">
               <div class="input-data textarea">
                  <div class="form-row submit-btn">
                     <div class="input-data">
                        <div class="inner"></div>
                        <input type="submit" value="submit">
                     </div>
                  </div>
            </form>
        </div>

        </div>



    </div>
</div>



<script>
    @if (Session::has('message'))

    toastr.options={
          'clossButton':true,
          'progressBar':true
    }

    toastr.success("{{ Session::get('message') }}"
    // , 'Success! New Student added'
    );

    // toastr.warnig("{{ Session::get('message') }}"
    // , 'Success! New Student added'
    // );

    @endif
</script>
@endsection


