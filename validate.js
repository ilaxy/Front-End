function myFunction()			
		{
			var fname = document.getElementById("firstname").value;
			var lname = document.getElementById("lastname").value;
			var email = document.getElementById("email").pattern;
			var pw = document.getElementById("password").value;
			var cpw = document.getElementById("confirmpassword").value; 
			var username = document.getElementById("username").value;
			var letter = document.getElementById("letter");
			var capital = document.getElementById("capital");
			var number = document.getElementById("number");
			var length = document.getElementById("length");


			
			if (fname == ""){
				window.alert("Please enter First name");
       				return false;
       
			}

			else if (lname == ""){
				window.alert("Please enter Last name");
        			return false;
	
			}
		
			else if (username == pw){
				window.alert("Username and password cannot be same"); 
        			return false;
			}
			
			else if (pw != cpw)
			{
				window.alert ("Password doesn't match");
        
				return false;
			}

			else
			{
				return true;
			}
		}
	
				


