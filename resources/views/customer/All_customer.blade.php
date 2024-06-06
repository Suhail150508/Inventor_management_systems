@extends('layouts.app')

@section('content')

<style>

body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 80px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }

  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{

    }
    li {
      display: block;
    }
    .col {

      flex-basis: 100%;

    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}


/* HTML: <div class="loader"></div> */
.loader {
  width: 50px;
  aspect-ratio: 1;
  display: grid;
  animation: l14 4s infinite;
}
.loader::before,
.loader::after {
  content: "";
  grid-area: 1/1;
  border: 8px solid;
  border-radius: 50%;
  border-color: red red #0000 #0000;
  mix-blend-mode: darken;
  animation: l14 1s infinite linear;
}
.loader::after {
  border-color: #0000 #0000 blue blue;
  animation-direction: reverse;
}
@keyframes l14{
  100%{transform: rotate(1turn)}
}
</style>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="/">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">customers</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Customers</h2>
            {{-- <div class="box-icon">
                <a href="/customer-create" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Create customer</a>
            </div> --}}
        </div>


        <div>
            <form action="/search-customer-info" class="row pt-5" style="width:50%;height:40%;display:flex;justify-content:center;padding:.2rem;margin:.9rem 5rem">
                @csrf
                <input class="col-md-9 form-control" style="font-size:1.2rem;padding:.8rem 2.3rem" type="text" name="search" placeholder="Search: Name, Email.." value="{{ isset($search) ? $search :'' }}">
                <button type="submit" class="col-md-3 btn btn-secondary" style="font-size:1.2rem;width:100px;height:46px">Search </button>
            </form>
        </div>


        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($customers as $key => $customer )
                    <tr>
                        <td class="center">{{ $key+1 }}</td>
                        <td class="center">
                            <img width="50" style="border-radius:25%" src="{{ URL::asset('/teacher/'.$customer->image) }}" alt="{{ $customer->image }}">
                        </td>
                        <td class="center">{{ $customer->name }}</td>
                        <td class="center">{{ $customer->email }}</td>
                        <td class="center">{{ $customer->mobile }}</td>
                        {{-- <td class="center">
                                @if($customer->status=='Active')
                                <span class="label label-important">Active</span>
                                @else
                                <span class="label label-secondary">Inactive</span>
                                @endif
                        </td> --}}
                        <td class="center">
                            {{-- <div class="span2">

                                @if($customer->status=='Active')

                                    <a class="btn btn-success" href="{{ url('/customer-status/'.$customer->id) }}" >
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>

                                @else

                                    <a class="btn btn-danger" href="{{ url('/customer-status/'.$customer->id)  }}" >
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                            </div> --}}

                            <div class="span2">

                                <a class="btn btn-info" href="{{url('/customer-edit/'.$customer->id)}}" style="margin-left:.1rem;border-radius:25%">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>

                            <div class="span2">
                                <form method="post" action="{{ url('/customer-delete/'.$customer->id ) }}" style="margin-left:.1">
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



{{-- <div class="container">
    <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Job Id</div>
        <div class="col col-2">Customer Name</div>
        <div class="col col-3">Amount Due</div>
        <div class="col col-4">Payment Status</div>
      </li>
      @foreach ( as )

      @endforeach
      <li class="table-row">
        <div class="col col-1" data-label="Job Id">42235</div>
        <div class="col col-2" data-label="Customer Name">John Doe</div>
        <div class="col col-3" data-label="Amount">$350</div>
        <div class="col col-4" data-label="Payment Status">Pending</div>
      </li>

    </ul>
</div> --}}



@endsection
