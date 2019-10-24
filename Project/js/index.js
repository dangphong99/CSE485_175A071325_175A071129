function clickMenu1() {
  var x = document.getElementById("nav1");
  if (x.className == "topnav") {
      x.className += "responsive";
  } 
  else {
      x.className = "topnav";
  }
}