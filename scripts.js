function myFunction(){

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
			
	else if (pw != cpw){
		window.alert ("Password doesn't match");
		return false;
	}

	else{
		return true;
	}
}


function getUsername(){


}


function BookSearch(){

	var bookname = document.getElementById("booktitle");


}

function objectRequested(){

    var ajaxSender;
    try {
      ajaxSender = new XMLHttpRequest();
    }catch (e) {
      try {
         ajaxSender = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         try{
            ajaxSender = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
            alert("Your browser broke!");
         }
      }
    }
    return ajaxSender;
}


//This function is called when add to wishlist button is clicked
function addWishOnClick(bookname, addWish){
     
    if(document.getElementById(addWish).value == "False"){

        var httpReq = objectRequested();

        httpReq.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
                
                alert("Add to: " + this.responseText);
                
                if(this.responseText == true){
                    document.getElementById(buttonId).value = "True";
                    document.getElementById(buttonId).innerHTML = "Remove from Favorite";
                }

            }else{
                document.getElementById(buttonId).innerHTML = "Loading...";
            }
        }
        httpReq.open("GET", "cases.php?type=NewWish&bookname=" + bookname);
        httpReq.send(null);
        
}


	
				


