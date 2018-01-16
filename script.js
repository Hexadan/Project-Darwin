$(document).ready(function() {
  console.log("Ready!");


  $('#submitButton').on("click", function() {




var dlInfo = $("#inputString").val();

var trackOne = dlInfo.substring(dlInfo.indexOf("%"), dlInfo.indexOf("?;"));
console.log("Track One: " + trackOne);

var trackTwo = dlInfo.substring(dlInfo.indexOf("?;"), dlInfo.indexOf("?#"));
console.log("Track Two: " + trackTwo);

var trackThree = dlInfo.substring(dlInfo.indexOf("?#"), dlInfo.length);
trackThree = trackThree.replace(/\s/g,'');
console.log("Track Three: " + trackThree);

//removes all white space - might be needed later
//dlInfo = dlInfo.replace(/\s/g,'');

//Track One
//variables needed for proper output
//name variables
var name;
var lname;
var fname;
var mname;

//location variables
var address;
var city;
var state;

//assigns state initials
state = trackOne.substring(1,3);

//depending on if the city is 13 characters or less, a ^ is placed to seperate between city and information
//if the city is exactly 13 characters or more then a ^ won't be placed
if((dlInfo.substring(dlInfo.indexOf('%'),dlInfo.indexOf('$'))).includes('^'))
{
  //simple output just to clarify for testing purposes
  console.log("City is less than 13 characters");
  //seperates and formats city
  city = dlInfo.substring(3, dlInfo.indexOf('^'));

  //grabs name information between start (^) and end ($^) of name info
  name = dlInfo.substring(dlInfo.indexOf('^') + 1, dlInfo.indexOf('$^'));
  nameArray = name.split('$');

  //assigns and formats name info
  lname = nameArray[0];
  fname = nameArray[1];
  mname = nameArray[2];
}
else
{
  console.log("City is 13 characters");
  city = dlInfo.substring(3, 16);

  name = dlInfo.substring(dlInfo.indexOf('$'), dlInfo.indexOf('$^'));
  nameArray = name.split('$');

  lname = dlInfo.substring(16, dlInfo.indexOf('$'));
  fname = nameArray[1];
  mname = nameArray[2];
}

address = dlInfo.substring(dlInfo.indexOf('$^') + 2, dlInfo.indexOf('^?'));

//Track Two
jurisdictionID = trackTwo.substring(2,8);

dlID = trackTwo.substring(8, trackTwo.indexOf("="));

dateInfo = trackTwo.substring(trackTwo.indexOf("="), trackTwo.length);
console.log(dateInfo);

expiration = dateInfo.substring(3,5) + "/" + dateInfo.substring(1,3);
birthdate = dateInfo.substring(9,11) + "/" + dateInfo.substring(11,13) + "/" + dateInfo.substring(5,9);

//Track Three
/* Still figuring out how to get gender, height, eye color, etc. */

$('#fname').val(fname);
$('#mname').val(mname);
$('#lname').val(lname);
$('#address').val(address);
$('#city').val(city);
$('#state').val(state);
$('#jurisdiction').val(jurisdictionID);
$('#dlid').val(dlID);
$('#exp').val(expiration);
$('#bdate').val(birthdate);

console.log(fname);
console.log(mname);
console.log(lname);
console.log(address);
console.log(city);
console.log(state);
console.log(jurisdictionID);
console.log(dlID);
console.log(expiration);
console.log(birthdate);

$.ajax({    //create an ajax request to display.php
type: "POST",
url: "display.php",
dataType: "html",   //expect html to be returned
data: {
  firstName: fname,
  middleName: mname,
  lastName: lname,
  address: address,
  city: city,
  state: state,
  jurisdictionID: jurisdictionID,
  driversLicenseID: dlID,
  expDate: expiration,
  birthDate: birthdate
},
success: function(response){
    //$("#inputString").css(response);
    alert(response);
}

});

$("#inputString").focus();
$("#inputString").val("");
  });
});
