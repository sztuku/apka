
window.onload=function(){

    var logbtn = document.getElementById("unloglink");
var logwindow = document.getElementById("logwindow");
var cien = document.getElementById("cien");

cien.addEventListener("click", close, false);
document.getElementById("closelogwindow").addEventListener('click', close, false);


logbtn.addEventListener("click", showlogwindow ,  false);

function close()
{
  cien.style.display = "none";
  logwindow.style.display = "none";
}
function showlogwindow()
{
  cien.style.display = "block";
  logwindow.style.display = "block";
}}