@extends('layouts.app')

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

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="/">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Posts</a></li>
</ul>

<div class="">
    <div class="box ">
        <div class="box-header">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Customer</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="icon-plus"></i> Add</a>
            </div>
        </div>

        <div style="margin:0 auto;background-color:rgb(110, 136, 237);color:white;padding:4px;width:50%">
            <h1 style="text-align: center" >Update Customer</h1>
        </div>
        <div class="" style="background-color:lightgray;color:black;width:50%;margin:0 auto;padding-top:3rem;">

            <form action="{{ route('customer.update', $editinvestor->id) }}" method="post" enctype="multipart/form-data" style="text-align: center">
                @csrf
                @method('PUT')

                <div class="mb-3" style="width: 100%">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" style="width:50%;border:2px solid rgba(68, 59, 197, 0)" value="{{ $editinvestor->name }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" style="width:50%;border:2px solid black" value="{{ $editinvestor->email }}">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="mobile" style="width:50%;border:2px 3px solid black" value="{{ $editinvestor->mobile }}">
                </div>

                <div class="mb-3" >
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image"  style="width:50%;border:2px solid black">

                    <div>
                        <img width="80" src="{{ URL::asset('/teacher/'.$editinvestor->image) }}" alt="{{ $editinvestor->image }}">
                    </div>
                </div>

                <button type="submit" class="button mb-3" style="margin-top: 2rem;text-align:center">Update</button>
          </form>
        </div>
    </div>
</div>
@endsection




