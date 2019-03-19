var guzik = document.getElementById("add");
var pole = document.getElementById("wejscie");
var lista = document.getElementById("lista");
var wyczysc = document.getElementById("clear");
var delEl = document.getElementsByClassName("delbtn");
var list = document.getElementsByTagName("li");
var body = document.querySelector(body);
var arrowUp = document.getElementsByClassName("countup");
var arrowDown = document.getElementsByClassName("countdown");
var field = document.getElementsByClassName("ilosc");

var container = document.getElementById('container');


pole.focus();

guzik.addEventListener("click", dodaj, false);
wyczysc.addEventListener("click", clean, false);

function dodaj() {
  var element = document.createElement("li");
      element.className = "listPoz";
      element.id = "pozList";

  var usun = document.createElement("button");
      usun.innerHTML = "<i class='fa fa-trash-o'  ></i>";
      usun.className = "delbtn";

  var liczenie = document.createElement("div");
      liczenie.className = "count";






  var btnUp = document.createElement("output");
      btnUp.className = "countup countbtn";
      btnUp.value = "+";
     

      

  var liczenieOkno = document.createElement("input");
      liczenieOkno.className = "ilosc";
      liczenieOkno.value = "1";
      liczenieOkno.name = "countWindow" + (list.length);
      liczenieOkno.style.background= "rgb(137, 137, 137)";
      liczenieOkno.style.color=" rgb(65, 64, 64)";
      liczenieOkno.style.border= "3px solid rgb(70, 70, 70)";
      

      
      
  var btnDown = document.createElement("output");
      btnDown.className = "countdown countbtn";
      btnDown.value = "-";

  var toGet = document.createElement("input");
 

  
  

  toGet.value = pole.value;

  
  lista.appendChild(element);
  pole.value = "";
 
list[list.length - 1].appendChild(usun);

  toGet.name = 'toGet'+(list.length-1);
  toGet.className = 'toGet';
  element.appendChild(toGet);
  

  

  list[list.length - 1].appendChild(liczenie);
  
  liczenie.appendChild(btnUp);
  liczenie.appendChild(liczenieOkno);
  liczenie.appendChild(btnDown);
  
  


  delEl[list.length - 1].addEventListener(
    "click",
    function() {
      usunojca(this);
    },
    false
  );

  arrowUp[list.length - 1].addEventListener(
    "click",
    function() {
      fieldUp(this);
    },
    false
  );

  arrowDown[list.length - 1].addEventListener(
    "click",
    function() {
      fieldDown(this);
    },
    false
  );
}


function usunojca(e) {
  e.parentNode.parentNode.removeChild(e.parentNode);
}

function fieldUp(e) {
  var wartosc = parseInt(e.nextSibling.value);
  e.nextSibling.value = wartosc + 1;
  e.nextSibling.style.background = " #898989";
  e.nextSibling.style.color = " #414040";
  e.nextSibling.style.border="3px solid #464646";
}

function fieldDown(e) {
  var wartosc = parseInt(e.previousSibling.value);
  if (wartosc <= 1) {
    e.previousSibling.value = 1;
    e.previousSibling.style.background = " #ff2221";
    e.previousSibling.style.color = "white";
  } else {
    e.previousSibling.value = wartosc - 1;
    
  }
}

function clean() {
  lista.innerHTML = "";
  pole.value = "";
  
}




document.onkeydown = function(e) {
  e = e || window.event;
  if (e.keyCode == "13") {
    dodaj();
  }
};
var wyslij = document.getElementById("wyslij");

console.log(wyslij);
  wyslij.addEventListener("click",podajilosc,false);


function podajilosc()
{
  var polezliczba = document.createElement('input');

  polezliczba.name = "loop";  
  polezliczba.value=(list.length);
  document.getElementById('form').appendChild(polezliczba);
  polezliczba.style.background = "trnsparent";
  polezliczba.style.color = "trnsparent";
  
  
}





