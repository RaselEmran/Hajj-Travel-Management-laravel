@extends('install.layout')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading text-center">Login Details</div>
	<div class="panel-body">
	   <div class="col-md-12">
	        @if ($errors->any())
				<div class="alert alert-danger alert-dismissible">
			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					@foreach ($errors->all() as $error)
					   <p>{{ $error }}</p>
					@endforeach
				</div>
			@endif
		    <form action="{{ url('install/store_user') }}" method="post" autocomplete="off">
			    {{ csrf_field() }}
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>				
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>	
				</div>
				
				<div class="form-group">
					<label>Phone</label>
					<input type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" required>
				</div>
			    <button type="submit" id="next-button" class="btn btn-install">Next</button>
		    </form>
	   </div>
	</div>
</div>
@endsection
