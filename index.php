<?php
    require_once 'assets/php/headerindex.php';
?>
        <div class="container mt-3">

            <div class="alert alert-success alert-dismissible text-center mt-1 m-0">
              <h2><strong>Bienvenu(e) dans notre application DIVINAS !</strong></h2>
            </div>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
                <li data-target="#myCarousel" data-slide-to="6"></li>
                <li data-target="#myCarousel" data-slide-to="7"></li>
                <li data-target="#myCarousel" data-slide-to="8"></li>
                <li data-target="#myCarousel" data-slide-to="9"></li>
                <li data-target="#myCarousel" data-slide-to="10"></li>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                   <img src="assets/images/mariage2.jpg" alt="Mariage 2" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage1.jpg" alt="Mariage 1" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage3.jpg" alt="Mariage 3" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage4.jpg" alt="Mariage 4" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage5.jpg" alt="Mariage 5" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage6.jpg" alt="Mariage 6" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage7.jpg" alt="Mariage 7" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage8.jpg" alt="Mariage 8" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mariage9.jpg" alt="Mariage 9" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/images.jpg" alt="Mariage 10" width="1100" height="500">
                </div>
                <div class="carousel-item">
                   <img src="assets/images/mairie1.jpg" alt="Mariage 11" width="1100" height="500">
                </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
            </div>
        </div>
        <div class="footer mt-2">
            <div class="footer-botton mt-20">
                &copy; 2020 Bnd Mobetisoft| DIVINAS
            </div>
        </div>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $("#LoginBtn").click(function(e){
          if($("#login-form")[0].checkValidity()){
              e.preventDefault();
              
              $(this).val('Veuillez patientier...');
              $.ajax({
                  url : 'assets/php/action.php',
                  method : 'post',
                  data : $("#login-form").serialize()+'&action=login',
                  success:function(response){
                      if(response ==='login_log'){
                          window.location = 'accueil.php';
                      }
                      else{
                          $("#LoginAlert").html(response);
                      }
                      window.location = 'accueil.php';
                      $("#LoginBtn").val('Se connecter');
                  }
              });
          }  
        });
     });
 </script>
</body>
</html>