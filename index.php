

<!doctype html>
<html ng-app="pinCode">
<head>
  <link rel="stylesheet" type="text/css" href="lib/css/ceruleanBootswatch.min.css">

  <script src="lib/js/jquery-1.11.3.min.js"></script>
  <script src="lib/js/bootstrap.min.js"></script>
  <script src="lib/js/angular.min.js"></script>
  <script src="lib/angular-repeat/AngularRepeatArray.js"></script>
  <script src="code.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body class="container" ng-controller="Controller as pin">


  <?php
  session_start();

  if (isset($_SESSION['name'])) {
   ?>
   <h1> <?php echo $_SESSION['name']; ?> is logged in</h1>

   <button class="default" ng-click="pin.logout()">Logout</button>

   <?php
 } else {
   ?>


   <h1>To Login, enter your image and code:</h1>
   There are two Users:


   <hr>

   <h1> Choose Image </2>

    <div ng-repeat="image in pin.ngArrLoop(pin.images,3) track by $index">
      <div class="row">

        <div class="col-xs-4 text-center">
          <img 
          class="img-responsive" 
          ng-src="{{pin.ngArrProp(pin.images,$index,3,1,'imageurl')}}" 
          ng-click="pin.selectImage(pin.ngArrProp(pin.images,$index,3,1,null))">
        </img>
      </div>

      <div class="col-xs-4 text-center">
        <img 
        class="img-responsive" 
        ng-src="{{pin.ngArrProp(pin.images,$index,3,2,'imageurl')}}"
        ng-click="pin.selectImage(pin.ngArrProp(pin.images,$index,3,2,null))">
      </img>
    </div>

    <div class="col-xs-4 text-center">
      <img 
      class="img-responsive" 
      ng-src="{{pin.ngArrProp(pin.images,$index,3,3,'imageurl')}}"
      ng-click="pin.selectImage(pin.ngArrProp(pin.images,$index,3,3,null))">
    </img>
  </div>
</div>
</div>

<hr>

<div ng-if="pin.selectedImage != null">
  <h3> Image Selected: </h3>
  <div class="row">
    <div class="col-xs-12" "text-center">
      <img class="img-responsive" src="{{pin.getJSONProperty(pin.selectedImage,'imageurl')}}"></img>
    </div>
  </div>
</hr>
</div>


<h1> Enter Your Pincode </h1>

<div ng-repeat="button in pin.ngArrLoop(pin.buttons,3) track by $index">

  <div class="row">

    <div class="col-xs-4" "text-center">

      <button value="{{pin.ngArrProp(pin.buttons,$index,3,1,'value')}}"
      class = "btn btn-lg"
      ng-click="pin.sendButton(pin.ngArrProp(pin.buttons,$index,3,1,'value'))">
      {{pin.ngArrProp(pin.buttons,$index,3,1,'value')}}
    </button>
  </div>

  <div class="col-xs-4" "text-center">
    <button value="{{pin.ngArrProp(pin.buttons,$index,3,2,'value')}}"
    class = "btn btn-lg"
    ng-click="pin.sendButton(pin.ngArrProp(pin.buttons,$index,3,2,'value'))">
    {{pin.ngArrProp(pin.buttons,$index,3,2,'value')}}
  </button>
</div>

<div class="col-xs-4" "text-center">
  <button value="{{pin.ngArrProp(pin.buttons,$index,3,3,'value')}}"
  class = "btn btn-lg"
  ng-click="pin.sendButton(pin.ngArrProp(pin.buttons,$index,3,3,'value'))">
  {{pin.ngArrProp(pin.buttons,$index,3,3,'value')}}
</button>
</div>  

</div>           
</div>


<?php
}
?>


</body>
</html>
