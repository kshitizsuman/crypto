function validator()
{
var n =document.forms["regform"]["name"].value;

var iChars = "\\\\~`!#$%^&*+=-[]';,/{}|\":<>?";

    for (var i = 0; i < n.length; i++) {
       if (iChars.indexOf(n.charAt(i)) != -1) {
           alert ("Wow! Seems that your name has special Characters!");
           return false;
       }
    }

if(n=="") 
{alert("Please fill in your name!");
return false;}



if ( ( regform.pool[0].checked == false ) && ( regform.pool[1].checked == false ) && ( regform.pool[2].checked == false )&& ( regform.pool[3].checked == false ) ) 
{
alert ( "Please choose your pool" ); 
return false;
}

var un =document.forms["regform"]["username"].value;

var iChars = "\\\\~`!#$%^&*+=-[]';,/{}|\":<>?";

    for (var i = 0; i < un.length; i++) {
       if (iChars.indexOf(un.charAt(i)) != -1) {
           alert ("Special Characters not allowed in username!");
           return false;
       }
    }

if(un=="") 
{alert("Please select a username!");
return false;}

var pw = document.forms["regform"]["passwd1"].value;

if(pw=="") 
{alert("Please select a Password!");
return false;}

var pw2 = document.forms["regform"]["passwd2"].value;

if(pw2=="") 
{alert("Please repeat the Password in Confirm Password Field!");
return false;}


var mail=document.forms["regform"]["emailid"].value;
var atpos=mail.indexOf("@");
var dotpos=mail.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=mail.length)
  {
  alert("Please enter your e-mail id. In case you forget your password, new password can be e-mailed to you.");
  return false;
  }
return true;

}