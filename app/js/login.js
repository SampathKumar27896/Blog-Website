
        var id,name,image_url,email;
        function onSignIn(googleUser) {
             var profile = googleUser.getBasicProfile();
             id =  profile.getId(); // Do not send to your backend! Use an ID token instead.
             name = profile.getName()
             image_url = profile.getImageUrl()
             email = profile.getEmail() // This is null if the 'email' scope is not present.



            if(id && name && image_url && email){
                
                $.ajax
                ({ 
                    url: $('#base_url').val()+"api/login_api.php",
                    data:"&name="+name+"&image_url="+image_url+"&email="+email,
                    type: 'post',
                    success: function(result)
                    {
                        
                    }
                });
    
                // console.log($('#base_url').val());
    
                
            }
            else{
                alert("no");
            }
            
        }

          

        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(
                function () {
                    console.log('User signed out.');
                }
             );
        }


        

       


                




            
