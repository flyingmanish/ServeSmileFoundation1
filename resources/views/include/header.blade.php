<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">S2F</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="{{url('/donationForm')}}">donation</a></li>
      <li><a href="{{ url('/picture_upload')}}">Picture Upload</a></li>
      <li><a href="{{url('/dashboard')}}">Admin_Donation_form</a></li>
      <li><a href="{{ url('/image_upload') }}">Image Upload</a></li>
      <li><a href="{{url('/ngo_register')}}">ngo_registration</a></li>
    </ul>
  </div>
</nav>