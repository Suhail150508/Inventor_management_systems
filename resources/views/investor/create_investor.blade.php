@extends('layouts.app')

@section('content')
 {{-- toastr --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    {{-- New css --}}
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
            <h2><i class="halflings-icon user"></i><span class="break"></span>Investor</h2>
        </div>

        <div style="margin:0 auto;background-color:rgb(110, 136, 237);color:white;padding:4px;width:50%">
            <h1 style="text-align: center" >Create Investor</h1>
        </div>
        <div class="" style="background-color:lightgray;color:black;width:30%;margin:0 auto;padding-top:3rem;padding:6rem">
           <form class="" action="{{ url('/investor-creater') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3" style="width: 100%">
              <label for="Name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" style="width:70%;border:2px solid rgba(68, 59, 197, 0)" >
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" style="width:70%;border:2px solid black">
            </div>


            {{-- <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea  class="form-control cleditor" name="address" style="border:2px solid black" ></textarea>
            </div> --}}

            <div class="mb-3">
              <label for="" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="mobile" style="width:70%;border:2px 3px solid black" >
            </div>

            <div class="mb-3" >
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image"  style="width:70%;padding:1rem;border:2px solid black">
            </div>

            {{-- <div class="form-group ">
                <label for="image">image</label>
                <input type="file" class="form-control" name="file[]" multiple required>
              </div> --}}

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
    // , 'Success! New Student added'
    );

    // toastr.warnig("{{ Session::get('message') }}"
    // , 'Success! New Student added'
    // );

    @endif
</script>
@endsection
