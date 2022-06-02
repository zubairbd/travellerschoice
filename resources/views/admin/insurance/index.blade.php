@extends('layouts.admin', [
  'page_header' => 'Students',
  'dash' => '',
  'users' => '',
  'pass' => '',
  'ins' => 'active',
  'pay' => '',
  'sett' => ''
])

@section('content')
@include('message')
  @if ($auth->role == 'A')
    
    <div class="content-block box">
      <div class="box-body table-responsive">
        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Policy No</th>
              <th>Passenger Name</th>
              <th>Passport</th>
              <th>DOB</th>
              <th>Effective</th>
              <th>Destination</th>
              <th>Issued</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($passengers)
              @php($n = 1)
              @foreach ($passengers as $key => $passenger)
                <tr>
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td>{{$passenger->policy_number}}</td>
                  <td>{{$passenger->name}}</td>
                  <td>{{$passenger->pp_number}}</td>
                  <td>{{date('d/m/Y', strtotime($passenger->dob))}}</td>
                  <td>{{date('d/m/Y', strtotime($passenger->effective_date))}}</td>
                  <td>{{$passenger->destination}}</td>
                  <td>{{$passenger->created_at->format('F d, Y')}}</td>
                  <td>
                    <!-- Edit Button -->
                    <a href="{{route('admin.insurances.edit',$passenger->id)}}" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
                    <!-- Delete Button -->
                    <a href="{{route('admin.insurances.show',$passenger->id)}}" class="btn btn-xs btn-danger" ><i class="fa fa-download"></i> Download</a>
                    <!-- create Button -->
                    <a href="{{url('admin/insurance',$passenger->id)}}" target="_blank" class="btn btn-xs btn-warning" ><i class="fa fa-download"></i> Create</a>
                    
                  </td>
                </tr>
                
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  @endif
@endsection
@section('scripts')


<script>
  $('#ch1').click(function(){
    $('#pass').show();
  });

  $('#ch2').click(function(){
    $('#pass').hide();
  });
</script>

@endsection
