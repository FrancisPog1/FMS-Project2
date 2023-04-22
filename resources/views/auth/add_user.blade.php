{{-- CREATE FORM --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<form class="row g-3" action="{{route('register_user')}}" method = "post">
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @csrf 
<div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <div class="col-sm-5">
  <input type="email" class="form-control" name="email" placeholder="name@example.com">
  <span class="text-danger">@error('email') {{$message}} @enderror </span>
  </div>
</div>

<div class="mb-3">
    <label for="Password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="Password">
      <span class="text-danger">@error('Password') {{$message}} @enderror </span>
    </div>
  </div>

  <div class="mb-3">
    <label for="ConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="ConfirmPassword">
      <span class="text-danger">@error('ConfirmPassword') {{$message}} @enderror </span>
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
{{-- END OF CREATE FORM --}}

