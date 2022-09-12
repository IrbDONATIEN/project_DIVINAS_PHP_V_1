<?php
  require_once 'sessionAd.php';

  //Gérer la requête d'affichages des mariages pour la commune en cours avec Ajax
  if(isset($_POST['action'])&& $_POST['action']=='displayAllMariages'){
        $output='';
        $data=$cAdmin->fetchAllActeMariagesTous();
        $path='assets/php/';

        if($data){
            $output .='
                <table class="table table-striped table-bordered table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>N°</th>
                            <th>Nom Epoux</th>
                            <th>Nom Epouse</th>
                            <th>Résidant Epoux</th>
                            <th>Date célébrée</th>
                            <th>Photo Epoux</th>
                            <th>Photo Epouse</th>
                            <th>Commune</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($data as $row){
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
                        $output .='<tr>
                                        <td>'.$row['id_acte_mariage'].'</td>
                                        <td>'.$row['acte_num'].'</td>
                                        <td>'.$row['nom_Epoux'].'</td>
                                        <td>'.$row['nom_Epouse'].'</td>
                                        <td>'.$row['residant_epoux'].'</td>
                                        <td>'.$row['date_celebree'].'</td>
                                        <td class="text-center"> <img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
                                        <td class="text-center"> <img src="'.$uphotos.'" class="rounded-circle" width="40px"></td>
                                        <td>'.$row['commune'].'</td>
                                        <td class="text-center">
                                            <a href="#" id="'.$row['id_acte_mariage'].'" title="Voir Détail Acte Mariage" class="text-primary acteMariageDetailsIcon" data-toggle="modal" data-target="#showActeMariageDetailsModal"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                                            <a href="#" id="'.$row['id_acte_mariage'].'" title="Voir Document" class="text-success acteMariageDetailsDoc" data-toggle="modal" data-target="#showDocument"><i class="fas fa-info-circle fa-lg"></i></a>
                                        </td>
                                </tr>';
                    }
                    $output .='
                    </tbody>
                    </table>';
                    echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore d\'actes des mariages créée pour toutes les communes !</h3>';
        }
  }

//Afficher détail acte mariage séléctionné en Ajax Request
if(isset($_POST['detail_mariage_id'])){
        
    $id=$_POST['detail_mariage_id'];

    $data=$cAdmin->fetchActeMariageDetailsByID($id);

    echo json_encode($data);
}


//Gérer la requête d'affichages des actes des naissances pour toutes les communes en cours avec Ajax
if(isset($_POST['action'])&& $_POST['action']=='displayAllNaissances'){
        $output='';

        $actenaissance=$cAdmin->fetchAllActeNaissancesTous();

        if($actenaissance){
            $output .='
                <table class="table table-striped table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Code</th>
                            <th>Père</th>
                            <th>Mère</th>
                            <th>Commune</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($actenaissance as $row){
                        $output .='
                        <tr>
                            <td>'.$row['idActeNais'].'</td>
                            <td>'.$row['nom_nv_ne'].'</td>
                            <td>'.$row['postnom_nv_ne'].'</td>
                            <td>'.$row['prenom_nv_ne'].'</td>
                            <td>'.$row['sexe'].'</td>
                            <td>'.$row['codeAct'].'</td>
                            <td>'.$row['nom_pere'].'</td>
                            <td>'.$row['nom_mere'].'</td>
                            <td>'.$row['commune'].'</td>
                            <td class="text-center">
                                <a href="#" id="'.$row['idActeNais'].'" title="Voir document" class="text-primary editBtn" data-toggle="modal" data-target="#editActenaisModal"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
                            </td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore d\'actes des naissances créée pour toutes les communes !</h3>';
        }
}


//Gérer la requête d'affichages des actes des décès pour toutes les communes en cours avec Ajax
if(isset($_POST['action'])&& $_POST['action']=='displayAllActeDeces'){
        $output='';

        $acteDeces=$cAdmin->fetchAllActeDecesTous();

        if($acteDeces){
            $output .='
                <table class="table table-striped table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Comparant</th>
                            <th>Date décès</th>
                            <th>Commune</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($acteDeces as $row){
                        $output .='
                        <tr>
                            <td>'.$row['id_deces'].'</td>
                            <td>'.$row['acte_deces_num'].'</td>
                            <td>'.$row['nom_defunt'].'</td>
                            <td>'.$row['postnom_defunt'].'</td>
                            <td>'.$row['prenom_defunt'].'</td>
                            <td>'.$row['sexe_defunt'].'</td>
                            <td>'.$row['nom_comparant'].'</td>
                            <td>'.$row['date_deces'].'</td>
                            <td>'.$row['commune'].'</td>
                            <td class="text-center">
                                <a href="#" id="'.$row['id_deces'].'" title="Supprimer Acte décès" class="text-danger deleteActeDecesBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
                            </td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore d\'acte de décès créée pour toutes les communes !</h3>';
        }
}



?>