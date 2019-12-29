@include('include.app')
<style type="text/css">
  .already_exists_error {
    display: none;
  }
</style>
@include('include.header')
<div class="container">
  <div class="row">

    <ul class="errors" style="list-style-type: none;">
    </ul>
    <div>
      <span class="alert alert-danger already_exists_error">
        This user already exists!
      </span>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <h3>Crate an account</h3>
            <form id="ngo_form">
                
              <div class="form-group">
                <label for="name">NGO Name:<span class="mandatory">*</span></label>
                <input type="text" class="form-control" name="ngo_name" id="name">
              </div>
              <div class="form-group">
                <label for="name">Full Name:<span class="mandatory">*</span></label>
                <input type="text" class="form-control" name="full_name" id="name">
              </div>
              <div class="form-group">
                <label for="email">Email:<span class="mandatory">*</span></label>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="form-group">
                <label for="email">Alternate Email:</label>
                <input type="email" class="form-control" name="alternate_email" id="email">
              </div>
              <div class="form-group">
                <label for="email">Mobile:<span class="mandatory">*</span></label>
                <input type="number" class="form-control" name="mobile" id="email">
              </div>
              <div class="form-group">
                <label for="email">Alternate Mobile:</label>
                <input type="number" class="form-control" name="alternate_mobile" id="email">
              </div>
              <div class="form-group">
                <label for="Address">Address:<span class="mandatory">*</span></label>
                <textarea class="form-control" rows="5" id="Address" name="address"></textarea>
              </div> 
              <label>disaster:<span class="mandatory">*</span></label>
              <div class="checkbox">
                <label><input type="checkbox" name="disaster[]"  value="Earthquake">Earthquake.</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="disaster[]" value="Floods">Floods</label>
              </div>
              <div class="checkbox disabled">
                <label><input type="checkbox" name="disaster[]" value="Acid_Attack_Victim">Acid_Attack_Victim</label>
              </div>
              <div class="checkbox disabled">
                <label><input type="checkbox" name="disaster[]" value="Tsunami">Tsunami</label>
              </div> 
              <div class="form-group">
                <label for="pwd">Password:<span class="mandatory">*</span></label>
                <input type="password" class="form-control" id="pwd" name="password">
              </div>
              <div class="form-group">
                <label for="pwd">Confirm Password:<span class="mandatory">*</span></label>
                <input type="password" class="form-control" id="pwd" name="confirm_password">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <a href="{{ url('/') }}">Login</a><br>
        </div>
    </div>
</div>




<script type="text/javascript">
  $(function() {
    $("#ngo_form").on("submit", function(e) {
      // alert('pok')
      e.preventDefault()
      $.ajax({
        url: '/ngo_store',
        method: 'POST',
        data: new FormData(this),
              headers:{
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },   
        processData: false,
        contentType: false,
        success: function(obj) {
          // alert("success")
          // console.log("response ala server varun")
          console.log(obj)
          console.log($.type(obj))

          if ($.type(obj)=="object") {
            ngo_id = obj["ngo_id"]
            console.log("ngo id")
            console.log(ngo_id)
            window.setTimeout(function() {
                window.location.href = '{{url('/ngo_dashboard')}}/'+ngo_id;
            }, 1000);

          }




          if (obj=='This User already exists!') {
              $(".already_exists_error").show()
            // $(".errrors").append("<li class='alert alert-danger'>"+obj+"</li>")
          }
          // $(".alert-danger").remove()

          $(".success_msg").html("<li class='alert alert-success'>Submitted successfully!</li>")
          // alert('Submitted Successfully.')
        },
        error: function(obj) {
          // alert("error")
          console.log(obj.responseJSON.errors)
          // $(".alert-danger").remove()
          $.each(obj.responseJSON.errors, function(key, val) {
            // alert(val)
            $(".errors").append("<li class='alert alert-danger'>"+val+"</li>")
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