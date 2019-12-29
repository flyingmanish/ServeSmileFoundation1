@include('include.app')
<style type="text/css">
  .already_exists_error {
    display: none;
  }
</style>
@include('include.header')
<div class="container">
  <div class="row">
    <ul class="errrors">
    </ul>
    <div class="success_msg">
      
    </div>
    <div>
      <span class="alert alert-danger already_exists_error">
        This user already exists!
      </span>
    </div>

      @if(isset($response))
      <div class="alert alert-danger">
        <span><b>Wait!</b>&nbsp;{{$response}}</span>
      </div>
      @endif


  </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <h3>Crate an account</h3>
            <form id="user_form">
              <div class="form-group">
                <label for="name">Name <span class="mandatory">*</span></label>
                <input type="text" class="form-control" name="name" id="email">
              </div>
              <div class="form-group">
                <label for="email">Email <span class="mandatory">*</span></label>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="form-group">
                <label for="email">Mobile <span class="mandatory">*</span></label>
                <input type="text" class="form-control" name="mobile" id="email">
              </div>

              <div class="form-group">
                <label for="pwd">Password <span class="mandatory">*</span></label>
                <input type="password" class="form-control" id="pwd" name="password">
              </div>
              <div class="form-group">
                <label for="pwd">Confirm Password <span class="mandatory">*</span></label>
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
    $("#user_form").on("submit", function(e) {
      e.preventDefault()
      // alert('pok')
      $.ajax({
        url: '/create_account_data',
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

          window.setTimeout(function() {
            window.location.href = '{{url('/dashboard')}}';
          }, 1000);
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