@extends('layouts.app')

@section('content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="/">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Posts</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="/post-create" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px"><i class="icon-plus"></i> Add</a>
            </div>
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($posts as $key => $post )
                    <tr>
                        <td class="center">{{ $key+1 }}</td>
                        <td class="center">
                            <img width="80" src="{{ URL::asset('/teacher/'.$post->image) }}" alt="{{ $post->image }}">
                        </td>
                        <td class="center">{{ $post->name }}</td>
                        <td class="center">{{ $post->email }}</td>
                        <td class="center">{{ $post->address }}</td>
                        <td class="center">{{ $post->mobile }}</td>
                        <td class="center">
                                @if($post->status=='Active')
                                <span class="label label-important">Active</span>
                                @else
                                <span class="label label-secondary">Inactive</span>
                                @endif
                        </td>
                        <td class="center">
                            {{-- <a class="btn btn-success" href="/user-create">
                                <i class="halflings-icon white zoom-in"></i>
                            </a> --}}
                            <div class="span2">

                                @if($post->status=='Active')

                                    <a class="btn btn-success" href="{{ url('/posts'.$post->id) }}" >
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>

                                @else

                                    <a class="btn btn-danger" href="{{ url('/posts'.$post->id)  }}" >
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                            </div>

                            <div class="span2">

                                <a class="btn btn-info" href="{{url('/post-edit/'.$post->id)}}" style="margin-left: 1rem">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>

                                <div class="span2">
                                    <form method="post" action="{{ url('/post-delete/'.$post->id ) }}" style="margin-left: 2rem">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> <i class="halflings-icon white trash"></i></button>

                                    </form>
                                </div>

                        </td>
                    </tr>


                @endforeach
                </tr>
              </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
