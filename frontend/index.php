<?php
  session_start();
?>

<!doctype html>
<html ng-app="pinCode">
<head>
  <script src="../node_modules/angular/angular.min.js"></script>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="init.js"></script>
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  .selected {
    padding:1px;
    border:5px solid #0f1;
    background-color:#000;
  }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body class="container" ng-controller="Controller as pin">
  <?php

  if (isset($_SESSION['name'])) {
    echo $_SESSION['name'];
  ?>
  is logged in</h1>
  <button class="btn-primary" ng-click="pin.logout()">Logout</button>
  <?php
  } else {
  ?>

   <h2>There are two Users:</h2><br>
   <h3>User 1: Click the dog image and press the buttons - 1, 1, 1 </h3><br>
   <h3>User 2: Click the flower image and press the buttons - 1, 2, 3</h3><br>

   <hr>
     <h1> Click Your Image </2>
      <div ng-repeat="image in pin.images">
        <div class="row">

          <div class="col-xs-4 text-center">
            <img
              class="img-responsive"
              ng-class="pin.checkIfSelectedImage(image)"
              ng-src="{{image.imageurl}}"
              ng-click="pin.selectImage(image)">
            </img>
          </div>
        </div>
      </div>
      <hr>

  <div ng-if="pin.selectedImage != null">
    </hr>
    <h1> Enter Your Pincode </h1>
    <div>
      <div class="row">
        <div class="col-xs-4 text-center">
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(1)">1</button>
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(2)">2</button>
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(3)">3</button>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 text-center">
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(4)">4</button>
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(5)">5</button>
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(6)">6</button>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 text-center">
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(7)">7</button>
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(8)">8</button>
          <button type="button" class="btn btn-lg btn-primary" ng-click="pin.sendButton(9)">9</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
</body>
</html>
