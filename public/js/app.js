window.addEventListener('load', function(){

});

window.addEventListener('load', function(){

    });
    var contador = 1;
    
    function menu(){
      
         if(contador == 1){
          document.getElementById('Ul-Cont-Father').animate({
            rigth:'0%'
          });
          document.getElementById('Ul-Cont-Father').style.right='0%';
          contador =  0;
          console.log("abierto");
         }else{
          document.getElementById('Ul-Cont-Father').animate({
            rigth:'100%'
          });
          contador =  1;
          document.getElementById('Ul-Cont-Father').style.right='100%';
          console.log("cerrado");
         }

      
    }

      var contador3 = 1;
      function btnServiciosMenu(){
            
        if(contador3 == 1){
          document.getElementById('Cont-ul-Head').style.display = "block";
        contador3 =  0;
        console.log("abierto");
        }else{
        contador3 =  1;
        document.getElementById('Cont-ul-Head').style.display = "none";
        console.log("cerrado");
        }
      }
