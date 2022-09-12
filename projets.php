<?php
    require_once 'assets/php/headerindex.php';

    require_once 'assets/php/auth.php';

    $projet=new Auth();
?>
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
           <h1 class="alert alert-primary alert-dismissible text-center mt-2 m-0">Détails des Projets Mariages</h1>
          <hr class="border-primary my-4">
        </div>
      </div>
      <div class="row mt-3">
          <?php
             $projet_mariage=$projet->fetchProjetMariages();
             $output='';
             $path='assets/php/';
             if($projet_mariage){
                foreach ($projet_mariage as $row){
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
                        <img src="'.$uphoto.'" alt="Projet Mariage" class="mb-0 float-left mt-1" width="200px" height="200px">&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="'.$uphotos.'" alt="Projet Mariage" class="mb-0 float-right mt-1"  width="200px" height="200px">
                      <div class="card-body">
                      <h3 class="card-title">Epoux:'.$row['nom_Epoux'].' & Epouse:'.$row['nom_Epouse'].'</h3>
                          <p class="card-text">
                            Nom père Epoux :'.$row['nom_pere_epoux'].'&nbsp;&nbsp;Et Nom Mère Epoux :'.$row['nom_mere_epoux'].'<br>
                            Nom père Epouse :'.$row['nom_pere_epouse'].'&nbsp;&nbsp;Et Nom Mère Epouse :'.$row['nom_mere_epouse'].'<br>
                            Date cérémonie :'.$row['date_celebration'].'
                          </p>
                          <p class="card-text">
                            Régime matrimoniaux :<b>'.ucfirst($row['regime_matrimoniaux']).'</b>
                          </p>
                          <p class="card-text">
                            Date création :'.$row['created_at'].'<br>
                            Date mise à jour :'.$row['update_date'].'
                          </p>
                          <p class="card-text">Commune :<b>'.$row['commune'].'</b>&nbsp;&nbsp;
                            Posté il y a '.$projet->timeInAgo($row['created_at']).'
                          </p>
                          <hr  class="border-success my-2">
                      </div>
                    </div>
                 </div>';
                }
                echo $output;
              }
              else{
                  echo 'Pas de projet mariage';
              }
          ?>
      </div>
    </div>
        
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    
</body>
</html>