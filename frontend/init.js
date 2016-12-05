var root = 'http://localhost/api/';
var app = angular.module("pinCode", []);

app.factory('Api',function($http){
  return {
    getUUID: function(onSuccuess,onFailure){
      var url = root + '/getUUID.php';
      $http.get(url).
      success(onSuccuess).
      error(onFailure);
    },
    getImages: function(onSuccuess,onFailure){
     var url = root + '/getImages.php';
     $http.get(url).
     success(onSuccuess).
     error(onFailure);
   },
  logout: function(onSuccuess,onFailure){
    var url = root + '/logout.php';
    $http.get(url).
    success(onSuccuess).
    error(onFailure);
  },
  sendButton: function(onSuccuess,onFailure, data){
    var params = $.param(data);
    $http({
      url: root + '/sendButton.php',
      method: "POST",
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      data: params
    }).success(onSuccuess).
    error(onFailure);
  }
};
});

app.controller('Controller', function(Api) {

  var pin = this;
  pin.selectedImage = null;

  pin.failureFunction = function(){
    //alert('Error' + data);
  };

  pin.getUuidResponse = function(data){
   pin.uuid = data;
 };

 pin.getImagesResponse = function(data){
   pin.images = data;
 };

 pin.logoutResponse = function(){
  location.reload();
};

var init = function(){
 Api.getUUID(pin.getUuidResponse, pin.failureFunction);
 Api.getImages(pin.getImagesResponse, pin.failureFunction);
};

init();

pin.passCodeSuccess = function(data){
  if (data == "refresh"){
    location.reload();
  }
};

pin.sendButton = function(button){
  var data = {
    uuid: pin.uuid,
    image: pin.selectedImage.imageid,
    button: button
  };

  Api.sendButton(pin.passCodeSuccess, pin.failureFunction, data);
};

pin.selectImage = function(image){
  pin.selectedImage = image;
};

pin.logout = function(){
  Api.logout(pin.logoutResponse,pin.failureFunction);
};

pin.checkIfSelectedImage = function(image) {
  if (image === null || image === undefined || pin.selectedImage === null) {
    return;
  }

  if (pin.selectedImage.imageurl === image.imageurl) {
    return 'selected';
  }
}

});
