 <!DOCTYPE html>

  <html>

    <head>

      <meta charset="utf-8">

      <meta httpequiv="XUACompatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Bagus Abdul Karim</title>

      <link href="/assets/css/bootstrap.css" rel="stylesheet" />

      <link href="/assets/css/material-design/bootstrap-material-design.css" rel="stylesheet" />

      <link href="/assets/css/material-design/ripples.css" rel="stylesheet" />

      <link href="/assets/css/custom/layout.css" rel="stylesheet" />
      <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body style="padding-top:60px;">

      <!--bagian navigation-->

     <div class="navbar navbar-fixed-top navbar-default" role="navigation">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"/>

        <span class="icon-bar"/>

        <span class="icon-bar"/>

      </button>

      <a href="#" class = "navbar-brand">Bagus Abdul Karim</a>

    </div>

    <div class="collapse navbar-collapse">

    <ul class="nav navbar-nav navbar-right">

     <li>{!! link_to(route('home'), "Home") !!}</li>

      <li>{!! link_to(route('importExport'), "Import&Export") !!}</li>

      <li>{!! link_to(route('articles.index'), "Article") !!}</li>
    </ul>

    </div>

  </div>

</div>
<div id="carousel-keyfeatures" class="carousel slide" data-interval="false">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-keyfeatures" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-keyfeatures" data-slide-to="1"></li>
    <li data-target="#carousel-keyfeatures" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="image/b1.jpg" alt=""  align="center" width="1200" height="350">
    </div>

    <div class="item">
      <img src="image/b2.jpg" alt="" width="100%" align="center">
    </div>
    <div class="item">
      <img src="image/b3.jpg" alt="" width="100%" align="center">
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-keyfeatures" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-keyfeatures" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script type="text/javascript">
// Put your custom javascript options here, for instance...
$(document).ready(function() {
    $('.carousel').carousel(interval: 100;);
    });
</script>  




      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>

      <script src="/assets/js/bootstrap/bootstrap.js"></script>

      <script src="/assets/js/material-design/material.js"></script>

      <script src="/assets/js/material-design/ripples.js"></script>

      <script src="/assets/js/custom/layout.js"></script>      

    </body>

  </html>