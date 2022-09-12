<?php
    require_once 'assets/php/headerindex.php';

    require_once 'assets/php/auth.php';

    $mariage=new Auth();

?>
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
           <h1 class="alert alert-success alert-dismissible text-center mt-2 m-0">Liste des Mariages Célébrés</h1>
          <hr class="border-primary my-4">
        </div>
      </div>
      <div class="row mt-3">
          <?php
             $mariages=$mariage->fetchAllActeMariage();
             $output='';
             $path='assets/php/';
             if($mariages){
                foreach ($mariages as $row){
                  if($row['photoEpoux'] !=''){
                    $uphoto=$path.$row['photoEpoux'];
                  }
                  else{
                      $uphoto='assets/images/avatar.png';
                  }
                  if($row['photoEpouse'] !=''){
                      $uphotos=$path.$row['photoEpouse'];
                  }
                  else{
                      $uphotos='assets/images/avatar.png';
                  }
                  $output .='
                  <div class="col-md-6">
                      <div class="card-deck">  
                        <img src="'.$uphoto.'" alt="Projet Mariage" class="mb-0 float-left mt-1" width="200px" height="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="'.$uphotos.'" alt="Projet Mariage" class="mb-0 float-right mt-1"  width="200px" height="200px">
                      <div class="card-body">
                      <h3 class="card-title">Epoux:'.$row['nom_Epoux'].' & Epouse:'.$row['nom_Epouse'].'</h3>
                          <p class="card-text">
                            Date célébration :'.$row['date_celebree'].'
                          </p>
                          <p class="card-text">Commune :<b>'.$row['commune'].'</b>&nbsp;&nbsp;
                            Posté il y a '.$mariage->timeInAgo($row['date_publier']).'
                          </p>
                          <hr  class="border-danger my-2">
                      </div>
                    </div>
                 </div>';
                }
                echo $output;
              }
              else{
                  echo 'Pas des mariages célébrés';
              }
          ?>
      </div>
    </div>
        
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    
</body>
</html>