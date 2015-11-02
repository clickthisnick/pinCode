var root = 'PUT YOUR ROOT HERE';
var app = angular.module("pinCode", []);

app.factory('Api',function($http){
  return {
    getUUID: function(onSuccuess,onFailure){
      var url = root + '/ajax/getUUID.php';
      $http.get(url).
      success(onSuccuess).
      error(onFailure);
    },
    getImages: function(onSuccuess,onFailure){
     var url = root + '/ajax/getImages.php';
     $http.get(url).
     success(onSuccuess).
     error(onFailure);     
   },
   getButtons: function(onSuccuess,onFailure){
    var url = root + '/ajax/getButtons.php';
    $http.get(url).
    success(onSuccuess).
    error(onFailure);     
  },
  logout: function(onSuccuess,onFailure){
    var url = root + '/ajax/logout.php';
    $http.get(url).
    success(onSuccuess).
    error(onFailure);     
  },
  sendButton: function(onSuccuess,onFailure,login){
    var params = $.param(login);
    $http({
      url: root + '/ajax/sendButton.php',
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

  pin.getUUIDresponse = function(data){
   pin.uuid = data;
 };

 pin.getImagesResponse = function(data){
   pin.images = data;
 };

 pin.getButtonsRespnonse = function(data){
   pin.buttons = data;
 };

 pin.logoutResponse = function(){
  location.reload();
};

var init = function(){
 Api.getUUID(pin.getUUIDresponse,pin.failureFunction);
 Api.getImages(pin.getImagesResponse,pin.failureFunction);
 Api.getButtons(pin.getButtonsRespnonse,pin.failureFunction);
};

init();

pin.ngArrLoop = function(items,numberPerRow){
  return NgArrRepeat.ngArrLoop(items,numberPerRow);
};

pin.ngArrProp = function(images,index,columnTotal,column,property){
  return NgArrRepeat.ngArrProp(images,index,columnTotal,column,property);
};

pin.passCodeSuccess = function(data){
  if (data == "refresh"){
    location.reload();  
  }
};

pin.sendButton = function(button){
  var info = login(pin.uuid,pin.getJSONProperty(pin.selectedImage,'imageid'),button);
  Api.sendButton(pin.passCodeSuccess,pin.failureFunction,info);
};

pin.selectImage = function(image){
  pin.selectedImage = image;
};

pin.logout = function(){
  Api.logout(pin.logoutResponse,pin.failureFunction);
};

pin.getJSONProperty = function(json,property){
  if (!json[property]){
    return "";
  }
  return json[property];
};

});

function login(uuid,image,button){
  return {'uuid':uuid,
  'image':image,
  'button':button};
}

