//Load the Facebook JS SDK
(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
 }(document));

// Init the SDK upon load
window.fbAsyncInit = function() {
  FB.init({
    appId      : '1941393869480555', // App ID
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });
};

 var permissions = [
          'email',
          'birthday',
          'education',
          'picture'
          ].join(',');


     var fields = 
          [
          'id',
          'name',
          'first_name',
          'middle_name',
          'last_name',
          'gender',
          'locale',
          'age_range',
          'birthday',
          'education',
          'email',
          'picture'
          ].join(',');

  function showDetails() {  
    FB.api('/me', {fields: fields}, function(details) {
     
     console.log("lqlq");
     console.log(details);
     
         if (details.gender == "male"){
              $("input.male").attr('checked', "checked");
        }else if (details.gender == "female"){
              $("input.female").attr('checked', "checked");
        }

           $("input[name='firstname']").attr('value', details.first_name);
           $("input[name='lastname']").attr('value', details.last_name);
           $("input[name='birthday']").attr('value', details.birthday);
           $("input[name='school']").attr('value', details.education);
           $("input[name='picture']").attr('value', details.picture.data.url);
     
     
 });
    
    
    FB.api('/me', {fields: 'name,email'}, (response) => {
        console.log(response.name + ' --- ' + response.email);
  });
    
  }