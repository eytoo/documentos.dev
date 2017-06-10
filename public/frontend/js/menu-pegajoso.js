  var navegador= document.getElementById('navegador');
  var altura= navegador.offsetTop;
  window.addEventListener('sroll', function(){
    'use strict';
    if(window.pageYOffset > altura){
      navegador.classList.add('fixed');
    }
    else{
      navegador.classList.remove('fixed');
    }
  });