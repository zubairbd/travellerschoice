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
              <th>Insurance Name</th>
              <th>Passport</th>
              <th>DOB</th>
              <th>Effective</th>
              <th>Destination</th>
              <th>Issued</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($Insurances)
              @php($n = 1)
              @foreach ($Insurances as $key => $Insurance)
                <tr>
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td>{{$Insurance->policy_number}}</td>
                  <td>{{$Insurance->name}}</td>
                  <td>{{$Insurance->pp_number}}</td>
                  <td>{{date('d/m/Y', strtotime($Insurance->dob))}}</td>
                  <td>{{date('d/m/Y', strtotime($Insurance->effective_date))}}</td>
                  <td>{{$Insurance->destination}}</td>
                  <td>{{$Insurance->created_at->format('F d, Y')}}</td>
                  <td>
                    <!-- Edit Button -->
                    <a href="{{route('admin.insurances.edit',$Insurance->id)}}" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
                    <!-- Delete Button -->
                    <a href="{{route('admin.insurances.show',$Insurance->id)}}" class="btn btn-xs btn-danger" ><i class="fa fa-download"></i> Download</a>
                    <!-- create Button -->
                    <a href="{{url('admin/insurance',$Insurance->id)}}" target="_blank" class="btn btn-xs btn-warning" ><i class="fa fa-download"></i> Create</a>
                    
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
