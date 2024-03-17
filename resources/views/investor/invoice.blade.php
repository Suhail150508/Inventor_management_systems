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
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="icon-plus"></i> Add</a>
            </div>
        </div>

        <div class="" style="background-color:lightgray;color:black;width:50%;margin:0 auto;padding-top:3rem;padding:6rem">

            <form action="{{ route('posts.update', $editPost->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3" style="width: 100%">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" style="width:50%;border:2px solid rgba(68, 59, 197, 0)" value="{{ $editPost->name }}">
                </div>

                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" style="width:50%;border:2px solid black" value="{{ $editPost->email }}">
                </div>

                <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea rows="4" class="form-control" name="address" style="width:50%; border:2px solid black">{{ $editPost->address }}</textarea>
                </div>

                <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="mobile" style="width:50%;border:2px 3px solid black" value="{{ $editPost->mobile }}">
                </div>

                <div class="mb-3" >
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image"  style="width:50%;border:2px solid black">

                    <div>
                        <img width="80" src="{{ URL::asset('/teacher/'.$editPost->image) }}" alt="{{ $editPost->image }}">
                    </div>
                </div>

                <button type="submit" class="button mb-3" style="margin-top: 2rem">Update</button>
          </form>
        </div>
    </div>
</div>
@endsection




