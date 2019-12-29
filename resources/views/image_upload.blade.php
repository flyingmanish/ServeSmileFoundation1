@include('include.app')
@include('include.header')

<div class="container">
	<div class="row">
		@if(isset($uploaded_successfully))
		<div class="alert alert-success">
			<span>IMage uploaded successfully.</span>
		</div>
		@endif

	</div>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h1>Image Upload</h1>
			<form method="POST" action="{{ url('/saveImage') }}" enctype="multipart/form-data">
				{{csrf_field()}}
				<label>Upload Image</label>
				<input class="form-control" type="file" name="image_upload">
				<br>
				<!-- <input type="submit" class="form-control btn btn-success" name=""> -->
				<button type="submit" class="btn btn-success">submit</button>
			</form>
		</div>
	</div>
</div>