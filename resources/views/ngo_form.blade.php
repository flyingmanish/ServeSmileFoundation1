@include('include.app')
@include('include.header')
<div class="container">
	<div class="row">
    <ul class="errrors">
    </ul>
    <div class="success_msg">
      
    </div>
	<div class="row">
		<div class="col-sm-offset-6 col-sm-3">
			<h3>Donation form</h3>
		<form id="donation">
				<div class="form-group">
					<label for="name">NGO NAME <span class="mandatory">*</span></label>
					<select class="form-control" name="ngo_name">
						@foreach($clients as $client)
							<option value="{{$client->id }}|{{$client->ngo_name}}">{{$client->ngo_name}}</option>
						@endforeach
					</select>

					<!-- <input type="text" name="ngo_name" id="name" class="form-control"> -->
				</div>
				<div class="form-group">
					<label for="name">Aadhaar card no <span class="mandatory">*</span></label>
					<input type="number" name="aadhaar_card_no" id="number" class="form-control">
				</div>
        <div class="form-group">
          <label for="email">Email<span class="mandatory">*</span></label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="number">Mobile number<span class="mandatory">*</span></label>
          <input type="number" name="mobile_number" id="number" class="form-control">
        </div>
        <div class="form-group">
          <label for="number">Amount<span class="mandatory">*</span></label>
          <input type="number" name="amount" id="number" class="form-control">
        </div>
        <button class="btn btn-success">Submit</button>
			</form>
			
		</div>
		
	</div>
</div>



<script type="text/javascript">
  $(function() {
    $("#donation").on("submit", function(e) {
      e.preventDefault()
      // alert('pok')
      $.ajax({
        url: '/donationForm',
        method: 'POST',
        data: new FormData(this),
              headers:{
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },   
        processData: false,
        contentType: false,
        success: function(obj) {
          alert("success")
          $(".alert-danger").remove()
          $(".success_msg").html("<li class='alert alert-success'>Submitted successfully!</li>")

          // window.setTimeout(function() {
          //   window.location.href = '{{url('/dashboard')}}';
          // }, 1000);
          // alert('Submitted Successfully.')
        },
        error: function(obj) {
          alert("error")
          console.log(obj)
          $(".alert-danger").remove()
          $.each(obj.responseJSON.errors, function(key, val) {
            // alert(val)
            $(".errrors").append("<li class='alert alert-danger'>"+val+"</li>")
            // console.log(val)
          })

          // alert("Server Error occured! PLease contact supprt team.")
        }
      })
    })
  })
</script>

</body>
</html>