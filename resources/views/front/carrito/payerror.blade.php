<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<style>
    HTML {
    /*using system font-stack*/
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    font-size: 115%; /*~18px*/
    font-size: calc(12px + (25 - 12) * (100vw - 300px) / (1300 - 300) );
    line-height: 1.5;
    box-sizing: border-box;
  }
  
  BODY {
    margin: 0;
    color: #3a3d40;
    background: rgb(252, 252, 252);
  }
  
  *, *::before, *::after {
    box-sizing: inherit;
    color: inherit;
  }
  
  /*Actual Style*/
   
  /*=======================
         C-Container
  =========================*/
  .c-container {
    max-width: 27rem;
    margin: 1rem auto 0;
    padding: 1rem;
  }
  
  /*=======================
         O-Circle
  =========================*/
  
  .o-circle {
    display: flex;
    width: 10.555rem; height: 10.555rem;
    justify-content: center;
    align-items: flex-start;
    border-radius: 50%; 
    animation: circle-appearance .8s ease-in-out 1 forwards, set-overflow .1s 1.1s forwards;
  }
  
  .c-container__circle {
    margin: 0 auto 5.5rem;
  }
  
  /*=======================
      C-Circle Sign
  =========================*/
        
  .o-circle__sign {
    position: relative;
    opacity: 0;
    background: #fff;
    animation-duration: .8s;
    animation-delay: .2s;
    animation-timing-function: ease-in-out;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
  }
  
  .o-circle__sign::before, 
  .o-circle__sign::after {
    content: "";
    position: absolute;
    background: inherit;
  }
  
  .o-circle__sign::after {
    left: 100%; top: 0%;
    width: 500%; height: 95%; 
    transform: translateY(4%) rotate(0deg);
    border-radius: 0;
    opacity: 0;
    animation: set-shaddow 0s 1.13s ease-in-out forwards;
    z-index: -1;
  }
  
  
  /*=======================
        Sign Success
  =========================*/
   
  .o-circle__sign--success { 
    background: rgb(56, 176, 131);
  }
  
  .o-circle__sign--success .o-circle__sign {
    width: 1rem; height: 6rem;
    border-radius: 50% 50% 50% 0% / 10%;
    transform: translateX(130%) translateY(35%) rotate(45deg) scale(.11);  
    animation-name: success-sign-appearance;
  }
  
  .o-circle__sign--success .o-circle__sign::before {
     bottom: -17%;
     width: 100%; height: 50%; 
     transform: translateX(-130%) rotate(90deg);
     border-radius: 50% 50% 50% 50% / 20%;
  
  }
  
  /*--shadow--*/
  .o-circle__sign--success .o-circle__sign::after {
     background: rgb(40, 128, 96);
  }
   
  
  /*=======================
        Sign Failure
  =========================*/
  
  .o-circle__sign--failure {
    background: rgb(236, 78, 75);
  }
  
  .o-circle__sign--failure .o-circle__sign {
    width: 1rem; height: 7rem;
    transform: translateY(25%) rotate(45deg) scale(.1);
    border-radius: 50% 50% 50% 50% / 10%;
    animation-name: failure-sign-appearance;
  }
  
  .o-circle__sign--failure .o-circle__sign::before {
     top: 50%;
     width: 100%; height: 100%; 
     transform: translateY(-50%) rotate(90deg);
     border-radius: inherit;
  } 
  
  /*--shadow--*/
  .o-circle__sign--failure .o-circle__sign::after {
     background: rgba(175, 57, 55, .8);
  }
  
  
  /*-----------------------
        @Keyframes
  --------------------------*/
   
  /*CIRCLE*/
  @keyframes circle-appearance {
    0% { transform: scale(0); }
    
    50% { transform: scale(1.5); }
            
    60% { transform: scale(1); }
    
    100% { transform: scale(1); }
  }
  
  /*SIGN*/
  @keyframes failure-sign-appearance {         
    50% { opacity: 1;  transform: translateY(25%) rotate(45deg) scale(1.7); }
      
    100% { opacity: 1; transform: translateY(25%) rotate(45deg) scale(1); }
  }
  
  @keyframes success-sign-appearance {      
    50% { opacity: 1;  transform: translateX(130%) translateY(35%) rotate(45deg) scale(1.7); }
      
    100% { opacity: 1; transform: translateX(130%) translateY(35%) rotate(45deg) scale(1); }
  }
   
  
  @keyframes set-shaddow {
    to { opacity: 1; }
  }
  
  @keyframes set-overflow {
    to { overflow: hidden; }
  }
  
  
  
  /*+++++++++++++++++++
      @Media Queries
  +++++++++++++++++++++*/
  
  @media screen and (min-width: 1300px) {
    
    HTML { font-size: 1.1625em; } /* 25 / 16 = 1.5625 */
    
  }
  </style>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-8 mx-auto" style="border: 3px solid red; border-radius: 36px;">
            <div class="row">
                <div class="col-12 mt-5">
                    
    		    <div class="o-circle c-container__circle o-circle__sign--failure">
          			<div class="o-circle__sign"></div>  
        		</div>   
                </div>
                <div class="col-12 text-center display-5" style="color: red;">
                    El pago no pudo ser procesado
                </div>
				<div class="col-12 mt-5">
					<div class="alert alert-danger" role="alert">
						{{ $msg }}		
					</div>
				</div>
                <div class="col-12 py-3 text-center">
                    <small class="fs-5">Redirigiendo a la pagina principal</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('user.profile') }}"; // Cambia 'nombre_de_la_ruta' por el nombre real de la ruta a la que deseas redirigir
    }, 10000); // Cambia el tiempo (en milisegundos) según tus necesidades, por ejemplo, 5000 ms = 5 segundos
</script>





