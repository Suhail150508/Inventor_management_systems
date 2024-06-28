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
  width: 70%;
  height: 20px;
  margin: 10px 15px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 90%;
  height: 100%;
  /* border: none; */
  font-size: 17px;
  /* border-bottom: 2px solid rgba(0,0,0, 0.12); */
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  /* transform: translateY(-20px); */
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
  bottom: 20px;
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
    padding: 20px 0 0 30;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin-top: 50px !important;
    width: 40%!important;
  }
  .submit-btn .input-data{
    width: 60%!important;
  }
}



</style>


<div class="">
    <div class="box ">
        <div class="box-header">
            <h2 style="font-weight: bold;font-size:1.2rem"><i class="halflings-icon user"></i><span class="break"></span>Purchase Product</h2>
        </div>

        <div class="container">
            <form action="{{ url('/purchase-product-update', $edit_product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-row">
                  <div class="input-data">
                   <label for="">Name</label>
                    <input type="text" name="name" required value="{{ $edit_product->name }}">
                    {{-- <div class="underline"></div> --}}
                  </div>
                  <div class="input-data">
                      <label for="">Code</label>
                      <input type="text" name="code" required value="{{ $edit_product->code }}">
                  </div>
                  <div class="input-data">
                      <label for="">Origin</label>
                      <input type="text" name="origin"  value="{{ $edit_product->origin }}">
                  </div>

               </div>

               <div class="form-row">
                    <div class="input-data">
                        <label for="">Year</label>
                        <input type="text" name="year" value="{{ $edit_product->year }}">
                    </div>
                    <div class="input-data">
                        <label for=""> Unit Amount </label>
                        <input type="text" name="unit_amount" class="form control" value="{{ $edit_product->unit_amount }}">
                    </div>
                    <div class="input-data">
                        <label for=""> Sales Amount </label>
                        <input type="text" name="sales_amount" class="form control" value="{{ $edit_product->sales_amount }}">
                    </div>
                </div>

               <div class="form-row">
                    <div class="input-data">
                        <label for=""> Quantity</label>
                        <input type="text" name="quantity" value="{{ $edit_product->quantity }}">
                    </div>
                    <div class="input-data">
                        <label for=""> Status </label>
                        <input type="text" name="status" class="form control" value="{{ $edit_product->status }}">
                    </div>
                    {{-- <div class="input-data">
                        <label for=""> Expire Date </label>
                        <input type="text" name="expire_date" class="form control">
                    </div> --}}
                    <div class="input-data">
                        <label for=""> Image </label>
                        <input  class="form control" type="file" accept="image/jpg, image/jpeg, image/png" name="image" >
                        <img width="50" src={{URL::asset('/teacher/'.$edit_product->image )}} alt="{{ $edit_product->image }}">
                    </div>
                </div>

               <div class="form-row">
                    <div class="input-data">
                        <p></p>
                    </div>
                </div>
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input type="submit" value="submit">
                    </div>
                </div>
            </form>


            {{-- <form  action="{{ url('/company-info-create') }}" method="POST" enctype="multipart/form-data" style="text-align:center">
                @csrf

                <div class="form-row" style="display: flex;justify-content:space-between">
                    <div class="input-data">
                        <label for="">Name</label>
                        <input type="text" name="name" required>
                        <div class="underline"></div>
                    </div>

                    <div class="input-data">
                        <label for="">Address</label>
                        <input type="text" name="addrss" required>
                    </div>
                </div>
                <div class="form-row" style="display: flex;justify-content:space-between">

                    <div class="data">
                        <label for="">Email</label>
                        <input type="email" name="email" >
                    </div>
                    <div class="form-row">
                        <label for=""> Contact </label>
                        <input type="text" name="contact" class="form control">
                    </div>
                </div>
                <div class="form-row" style="display: flex;justify-content:space-between">

                    <div class="form-row">
                        <label for=""> Logo </label>
                        <input type="file" accept="image/jpg, image/jpeg, image/png" name="logo"  class="form control">
                    </div>
                </div>


                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner">

                            </div>
                            <input class="btn btn-primary" type="submit" value="submit">
                        </div>
                    </div>
            </form> --}}


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

