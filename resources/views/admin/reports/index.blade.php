@extends('layouts.admin', [
  'page_header' => 'Reports',
  'dash' => '',
  'users' => '',
  'product' => '',
  'disc' => '',
  'comorder' => '',
  'pandorder' => '',
  'pay' => '',
  'acc' => '',
  'wallet' => ''
])
@section('reports') active @endsection
@section('content')
<!---->
  <div class="dashboard-block">
    <div class="row">
      <form action="{{ route('admin.report.filter') }}" method="GET" style="margin-top: 20px;">
      
        <div class="col-md-6">
          <div class="form-group">
            <select class="form-select" name="id" id="input">
              <option value="">Select User</option>
              @foreach ($users as $user)
                <option value="{{$user->id}}" {{ $user->id == $selected_id['id'] ? 'selected' : '' }}>{{$user->name}}</option>
              @endforeach
              
            </select>
          </div> 
          <div class="form-group">
            <select class="form-select" name="slug" id="input">
              <option value="">Select Product</option>
              @php
                $products = \App\Models\Product::orderBy('id', 'DESC')->get();
              @endphp
              @foreach ($products as $product)
                <option value="{{$product->slug}}" {{ $product->slug == $selected_id['id'] ? 'selected' : '' }}>{{$product->name}}</option>
              @endforeach
              
            </select>
          </div>
          <div class="form-group">
            <input type="date" name="effective_date" id="" class="form-control">
          </div>
        </div> 
        <input type="submit" class="btn btn-danger btn-sm" value="Filter">
    </form>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$insurance}}</h3>
            <p>Total Insurance Appiled</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{url('/admin/orders-completed')}}" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$paymentCount}}</h3>
            <p>Total Payment Received</p>
          </div>
          <div class="icon">
            <i class="fa fa-question-circle-o"></i>
          </div>
          <a href="{{url('/admin/payments')}}" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$insuranceCompleted}}</h3>
            <p>Total Insurance Completed</p>
          </div>
          <div class="icon">
            <i class="fa fa-question-circle-o"></i>
          </div>
          <a href="{{url('/admin/orders-completed')}}" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
        
      </div>
    </div>
  </div>
@endsection
