@include('include.app')
@include('include.app')
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  .carousel-caption{
    color: white;
       xright: 58%;
       text-align: center;
       max-width: 400px;
       left: 0;
       top: 1px;
     /*top: 50%; */
     xtransform: translateY(-50%);
     xbottom: initial;
     background: rgba(0,0,0,0.5);
     padding:10px;
     height:100%;


     
  }
  
</style>


@include('include.header')
<body>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 80%; margin-left: 10%;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://theintercept.imgix.net/wp-uploads/sites/1/2017/08/feature-hurricane-harvey-houses-flooding-1504201195.jpg?auto=compress%2Cformat&q=90&fit=crop&w=1440&h=720" style="height: 500px; margin-right: 100%; width: 100%; filter: blur(1px);" alt="Los Angeles">
        <div class="carousel-caption" style="color: #fff; top: 1%; text-align: justify;">
          <h3 style="text-align: center;"><b>Maharashtra Floods</b></h3>
          <br>
          <p><ul><li>Very heavy rains paralysed a major portion of Pune in just four hours.</li></ul></p>
          <p><ul><li>Ten numbers that sum up the damage caused by the Indian monsoon this year.</li></ul></p>
          <p><ul><li>As per official data, 4,74,226 people were rescued from 584 villagers and evacuated to temporary 596 shelters in Pune, Sangli, Kolhapur, Satara and Solapur districts.</li></ul></p>
          <p><ul><li>Around 765 people from 347 families in Kolhapur villages and towns were shifted on Sunday to safer places as a precautionary measure after increased rainfall in the area.</li></ul></p>
          <p><ul><li>Over 15,000 people from low-lying areas in Baramati were shifted to safer places after water was released from Nazare dam, built on the Karha river near Jejuri.</li></ul></p>
          <a href="{{ url('/donationForm') }}" class="btn btn-success" style="padding-right: 40%;">Donate Now</a>
          
        </div>
      </div>

      <div class="item">
        <img src="https://www.thestatesman.com/wp-content/uploads/2019/03/meer-foundation.png" style="height: 500px; margin-right: 100%; width: 100%;" alt="Chicago">
        <div class="carousel-caption" style="color: #fff; top: 1%; text-align: right;">
          <h3 style="text-align: center;"><b>Acid Victim</b></h3>
          
          
        </div>
      </div>

      <div class="item">
        <img src="https://mediaindia.eu/wp-content/uploads/2019/06/700213-watercrisis-070318.jpg" style="height: 500px; margin-right: 100%; width: 100%;" alt="New York">
        <div class="carousel-caption" style="color: #fff; top: 1%; text-align: right;">
          
        </div>
      </div>

      <div class="item">
        <img src="https://static01.nyt.com/images/2019/11/30/world/27Albania1/27Albania1-videoSixteenByNine3000.jpg" style="height: 500px; margin-right: 100%; width: 100%;" alt="New York">
        <div class="carousel-caption" style="color: #fff; top: 1%; text-align: right;">
          <h1>hi</h1>
          
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" style="filter: blur(15px);"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" style="filter: blur(15px);"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</body>

