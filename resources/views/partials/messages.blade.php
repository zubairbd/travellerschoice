
<!----------Success---------->

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
</div>
@endif

<!----------Error---------->
@if(session()->has('error'))
<div class="alert alert-danger" role="alert">
    {{ session()->get('error') }}
</div>
@endif

<!----------Validation---------->
@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{$error}}</div>
    @endforeach
@endif