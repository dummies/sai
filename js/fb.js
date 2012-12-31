 var loaded =false;
 window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '102517019918875', // App ID from the App Dashboard
      channelUrl : 'http://word-addiction.azurewebsites.net/game.html', // Channel File for x-domain communication
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });
	 FB.Event.subscribe('auth.statusChange', handleStatusChange);
  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); 
	 js.id = id; 
	 js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));

    // Additional initialization code such as adding Event Listeners goes here
	FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // connected
  } else if (response.status === 'not_authorized') {
    // not_authorized
  } else {
    // not_logged_in
	login();
  }
 });

  };

function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + '.');
    });
}

function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
        } else {
            // cancelled
        }
    });
}
function loginUser() {    
     FB.login(function(response) { }, {scope:'email'});     
   }
function handleStatusChange(response) {
document.body.className = response.authResponse ? 'connected' : 'not_connected';
      if (response.authResponse) {
        console.log(response);
        updateUserInfo(response);
      }
    }
function logoutUser() {  
	FB.logout();
	document.getElementById('user-info').style.display = 'block';
	document.getElementById('user_photo').src="";
	document.getElementById('user_name').innerHTML = 'Hi Player!';
}
function updateUserInfo(response) 
{
	   console.log(response);
     FB.api('/me', function(response) {
       //document.getElementById('user-info').innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + 'hello ' + response.name;
       //document.getElementById('user_photo').innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">';
	   name = response.name;
	   document.getElementById('user_photo').src = "https://graph.facebook.com/"+response.id+"/picture";
       document.getElementById('user_name').innerHTML = 'Hi ,'+ response.first_name +'!';
	   document.getElementById('user-info').style.display = 'none'
	   console.log(response);
	   //document.getElementById('photo').src="https://graph.facebook.com/' + response.id + '/picture";
	   //store user details.
	 //window.localStorage.setItem("name",response.name);
	 //window.localStorage.setItem('fb_object',response);
	 //window.localStorage.setItem("user_img_fb",response.id);
     });
	 
}