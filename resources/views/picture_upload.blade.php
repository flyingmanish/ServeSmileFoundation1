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
			<h1>Picture Upload</h1>
			<form method="POST" action="{{ url('/savePicture') }}" enctype="multipart/form-data">
				{{csrf_field()}}
				<label>Upload Picture</label>
				<input class="form-control" type="file" name="picture_upload">
				<br>
				<input type="submit" class="form-control btn btn-success" name="">
			</form>
		</div>
	</div>
</div>