@include('include.app')
@include('include.header')
 <div class="container">
 	<div class="row">
 	</div>
 	<div class="row">
 		<div class="col-sm-offset-3 col-sm-6">
 		<h1>Reset Password</h1>
 		@if(isset($response))
 			<ul>
 				<li class="alert alert-success">
 					<span>Success! Password reset successful.</span>
 				</li>
 			</ul>
 		@endif
	 		<form action="/passwordReset" method="POST">
				{{csrf_field()}}
			  <div class="form-group">
			    <label for="pwd">Email:</label>
			    <input type="email" class="form-control" id="pwd" name="email" value="{{$email}}" readonly="readonly">
			  </div>
			  <div class="form-group">
			    <label for="pwd">New Password:</label>
			    <input type="password" class="form-control" id="pwd" name="new_password">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Confirm New Password:</label>
			    <input type="password" class="form-control" id="pwd" name="confirm_new_password">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
 		</div>
	</div>
 </div>
</body>
</html>