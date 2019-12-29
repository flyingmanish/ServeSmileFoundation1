@include('include.app')
@include('include.header')

<div class="container">
	<div class="row">
		<h1>Forgot Password?</h1>
	</div>
	<div class="row">
		@if(isset($message))
			<ul>
				<li class="alert alert-danger">
					{{$message}}
				</li>
			</ul>
		@endif
		@if(isset($success))
			<ul>
				<li class="alert alert-success">
					{{$success}}
				</li>
			</ul>
		@endif
	</div>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6">
			<form action="/forgot_password_verify_email" method="POST">
				{{ csrf_field() }}
			  <div class="form-group">
			    <label for="email">Email:</label>
			    <input type="email" class="form-control" id="email" name="email">
			  </div>
			    <button type="submit" class="btn btn-primary">Verify Mail</button>
			</form>			
		</div>		
	</div>
</div>


</body>
</html>