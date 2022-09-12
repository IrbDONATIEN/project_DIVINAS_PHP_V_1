<?php
    require_once 'session.php';


    //Gérer la requête d'ajout de frais document pour la commune en cours avec Ajax
    if(isset($_POST['action']) && $_POST['action']=='add_fraisdoc'){
        $nomme=$cuser->test_input($_POST['nomme']);
        $montant=$cuser->test_input($_POST['montant']);
        $typeFrais=$cuser->test_input($_POST['typeFrais']);

        $cuser->add_frais_doc($nomme,$typeFrais,$montant,$cidCommune,$cid);
    }

    //Gérer la requête d'affichages des frais documents pour la commune en cours avec Ajax
    if(isset($_POST['action'])&& $_POST['action']=='display_frais_doc'){
        $output='';

        $fraisDoc=$cuser->get_frais_documents($cidCommune,$cid);

        if($fraisDoc){
            $output .='
                <table class="table table-striped table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nommé</th>
                            <th>Type Frais</th>
                            <th>Montant</th>
                            <th>Date Création</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($fraisDoc as $row){
                        $output .='
                        <tr>
                            <td>'.$row['id_Frais'].'</td>
                            <td>'.$row['nomme'].'</td>
                            <td>'.$row['typeFrais'].'</td>
                            <td class="text-right">'.$row['montant'].'</td>
                            <td>'.$row['date_frais'].'</td>
                            <td class="text-center">
                                <a href="#" id="'.$row['id_Frais'].'" title="Supprimer Frais Document" class="text-danger deleteFraisDocBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
                            </td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore des frais documents perçus pour cette commune !</h3>';
        }
    }

    //Gérer la suppression de frais des documents à la commune Ajax Request
    if(isset($_POST['del_frais_id'])){
        $id=$_POST['del_frais_id'];
        $cuser->delete_frais_document($id);
    }

    //Gérer la requête d'insertion des nouveau-nés avec Ajax
    if(isset($_POST['action'])&& $_POST['action']=='add_nouveaune'){

        $nom_nv=$cuser->test_input($_POST['nom_nv_ne']);
        $postnom_nv=$cuser->test_input($_POST['postnom_nv_ne']);
        $prenom_nv=$cuser->test_input($_POST['prenom_nv_ne']);
        $sexe=$cuser->test_input($_POST['sexe']);
        $nom_pere=$cuser->test_input($_POST['nom_pere']);
        $nom_mere=$cuser->test_input($_POST['nom_mere']);
        $nom_declarant=$cuser->test_input($_POST['nom_declarant']);
        $lieu_naiss=$cuser->test_input($_POST['lieu_naissance']);
        $typeFrais=$cuser->test_input($_POST['frais_doc_id']);
        $date_naiss=$cuser->test_input($_POST['date_naissance']);
        
        $cuser->add_nouveau_ne($nom_nv,$postnom_nv,$prenom_nv,$sexe,$nom_pere,$nom_mere,$nom_declarant,$lieu_naiss,$date_naiss,$cidCommune,$typeFrais);
    }

    //Gérer la requête d'affichages des nouveau-nés pour la commune en cours avec Ajax
    if(isset($_POST['action'])&& $_POST['action']=='display_nouveaunes'){
        $output='';

        $nouveaune=$cuser->get_nouveau_ne($cidCommune);

        if($nouveaune){
            $output .='
                <table class="table table-striped table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Posté il y a </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($nouveaune as $row){
                        $output .='
                        <tr>
                            <td>'.$row['id_naissance'].'</td>
                            <td>'.$row['nom_nv_ne'].'</td>
                            <td>'.$row['postnom_nv_ne'].'</td>
                            <td>'.$row['prenom_nv_ne'].'</td>
                            <td>'.$row['sexe'].'</td>
                            <td>'.$cuser->timeInAgo($row['date_create']).'</td>
                            <td>
                                <a href="#" id="'.$row['id_naissance'].'" title="Afficher Détails nouveau-né" class="text-success infoBtn"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;

                                <a href="#" id="'.$row['id_naissance'].'" title="Editer nouveau-né" class="text-primary editBtn" data-toggle="modal" data-target="#editNouveauneModal"><i class="fas fa-edit fa-lg"></i></a>&nbsp;

                                <a href="#" id="'.$row['id_naissance'].'" title="Supprimer Nouveau-né" class="text-danger deleteBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
                            </td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore des nouveau-nés créée pour cette commune !</h3>';
        }
    }


    //Gérer la requête d'affichages des nouveau-nés pour la commune en cours avec Ajax
    if(isset($_POST['action'])&& $_POST['action']=='display_nouveaune'){
        $output='';

        $nouveaune=$cuser->get_nouveau_ne($cidCommune);

        if($nouveaune){
            $output .='
                <table class="table table-striped table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Père</th>
                            <th>Mère</th>
                            <th>Lieu naissance</th>
                            <th>Date naissance</th>
                            <th>Posté il y a </th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($nouveaune as $row){
                        $output .='
                        <tr>
                            <td>'.$row['id_naissance'].'</td>
                            <td>'.$row['nom_nv_ne'].'</td>
                            <td>'.$row['postnom_nv_ne'].'</td>
                            <td>'.$row['prenom_nv_ne'].'</td>
                            <td>'.$row['sexe'].'</td>
                            <td>'.$row['nom_pere'].'</td>
                            <td>'.$row['nom_mere'].'</td>
                            <td>'.$row['lieu_naissance'].'</td>
                            <td>'.$row['date_naissance'].'</td>
                            <td>'.$cuser->timeInAgo($row['date_create']).'</td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore des nouveau-nés créée pour cette commune !</h3>';
        }
    }

    //Gérer la requête d'affichage pour l'édition des nouveau-nés pour la commune en cours avec Ajax
    if(isset($_POST['edit_id'])){
        $id=$_POST['edit_id'];
        $row=$cuser->edit_nouveau_ne($id);
        echo json_encode($row);
    }

    //Gérer la requête l'édition proprement dite des nouveau-nés pour la commune en cours avec Ajax
    if(isset($_POST['action']) && $_POST['action']=='update_nouveaune'){
        $id=$cuser->test_input($_POST['id']);
        $nom_nv_ne=$cuser->test_input($_POST['enom_nv_ne']);
        $postnom_nv_ne=$cuser->test_input($_POST['epostnom_nv_ne']);
        $prenom_nv_ne=$cuser->test_input($_POST['eprenom_nv_ne']);
        $sexe=$cuser->test_input($_POST['esexe']);
        $nom_pere=$cuser->test_input($_POST['enom_pere']);
        $nom_mere=$cuser->test_input($_POST['enom_mere']);
        $nom_declarant=$cuser->test_input($_POST['enom_declarant']);
        $lieu_naissance=$cuser->test_input($_POST['elieu_naissance']);
        $date_naissance=$cuser->test_input($_POST['edate_naissance']);

        $cuser->update_nouveau_ne($id,$nom_nv_ne,$postnom_nv_ne,$prenom_nv_ne,$sexe,$nom_pere,$nom_mere,$nom_declarant,$lieu_naissance,$date_naissance);
    }

    //Gérer la suppression d'un nouveau-né à la commune Ajax Request
    if(isset($_POST['del_id'])){
        $id=$_POST['del_id'];
        $cuser->delete_nouveau_ne($id);
    }

    //Gérer l'affichage d'un nouveau-né sélectionné par commune avec Ajax Request
    if(isset($_POST['info_id'])){
        $id=$_POST['info_id'];
        
        $row=$cuser->edit_nouveau_ne($id);
        echo json_encode($row);
    }

    //Gérer la requête l'ajout proprement dite d'actes des naissances pour la commune en cours avec Ajax
    if(isset($_POST['action']) && $_POST['action']=='add_actenais'){
        $codeAct=$cuser->test_input($_POST['codeAct']);
        $volume=$cuser->test_input($_POST['volume']);
        $folio=$cuser->test_input($_POST['folio']);
        $profession=$cuser->test_input($_POST['profession']);
        $nationalite=$cuser->test_input($_POST['nationalite']);
        $professionpere=$cuser->test_input($_POST['professionpere']);
        $resident=$cuser->test_input($_POST['resident']);
        $langue=$cuser->test_input($_POST['langue']);
        $officier_id=$cuser->test_input($_POST['officier_id']);
        $nouveaune_id=$cuser->test_input($_POST['nouveaune_id']);

        $cuser->add_acte_naissance($codeAct,$volume,$folio,$profession,$nationalite,$professionpere,$resident,$langue,$officier_id,$cidCommune,$nouveaune_id);
    }

     //Gérer la requête d'affichages des actes des naissances pour la commune en cours avec Ajax
     if(isset($_POST['action'])&& $_POST['action']=='display_actenais'){
        $output='';

        $actenaissance=$cuser->get_acte_naissance($cidCommune);

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
                            <th>Action</th>
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
                            <td class="text-center">
                                <a href="#" id="'.$row['idActeNais'].'" title="Editer Acte naissance" class="text-primary editBtn" data-toggle="modal" data-target="#editActenaisModal"><i class="fas fa-edit fa-lg"></i></a>&nbsp;

                                <a href="#" id="'.$row['idActeNais'].'" title="Supprimer Acte naissance" class="text-danger deleteBtn"><i class="fas fa-trash-alt fa-lg"></i></a>

                                <a href="#" id="'.$row['idActeNais'].'" title="Voir document naissance" class="text-success voirNaissanceBtn" data-toggle="modal" data-target="#showDocument"><i class="fas fa-info-circle fa-lg"></i></a>
                            </td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore d\'actes des naissances créée pour cette commune !</h3>';
        }

     }

    //Gérer la requête d'affichage pour l'édition d'actes des naissances pour la commune en cours avec Ajax
    if(isset($_POST['edit_actenais_id'])){
        $id=$_POST['edit_actenais_id'];
        $row=$cuser->edit_acte_naissance($id);
        echo json_encode($row);
    }

    //Gérer la requête l'édition proprement dite des nouveau-nés pour la commune en cours avec Ajax
    if(isset($_POST['action']) && $_POST['action']=='update_actenais'){
        $id=$cuser->test_input($_POST['id']);
        $profession=$cuser->test_input($_POST['profession']);
        $nationalite=$cuser->test_input($_POST['nationalite']);
        $professionpere=$cuser->test_input($_POST['professionpere']);
        $resident=$cuser->test_input($_POST['resident']);
        $langue=$cuser->test_input($_POST['langue']);
        $officier_id=$cuser->test_input($_POST['officier_id']);
        $nouveaune_id=$cuser->test_input($_POST['nouveaune_id']);

        $cuser->update_acte_naissance($id,$profession,$nationalite,$professionpere,$resident,$langue,$officier_id,$nouveaune_id);
    }

    //Gérer la suppression d'un acte naissance à la commune Ajax Request
    if(isset($_POST['del_actenais_id'])){
        $id=$_POST['del_actenais_id'];
        $cuser->delete_acte_naissance($id);
    }

     //Gérer la requête d'ajout projet mariage pour la commune en cours avec Ajax
     if(isset($_FILES['photoEpoux']) && $_FILES['photoEpouse']){
        $numero_projet=$cuser->test_input($_POST['numero_projet']);
        $nom_Epoux=$cuser->test_input($_POST['nom_Epoux']);
        $lieu_naissance_epoux=$cuser->test_input($_POST['lieu_naissance_epoux']);
        $date_naissance_epoux=$cuser->test_input($_POST['date_naissance_epoux']);
        $nom_pere_epoux=$cuser->test_input($_POST['nom_pere_epoux']);
        $nom_mere_epoux=$cuser->test_input($_POST['nom_mere_epoux']);
        $province_epoux=$cuser->test_input($_POST['province_epoux']);
        $territoire_epoux=$cuser->test_input($_POST['territoire_epoux']);
        $nom_Epouse=$cuser->test_input($_POST['nom_Epouse']);
        $lieu_naissance_epouse=$cuser->test_input($_POST['lieu_naissance_epouse']);
        $date_naissance_epouse=$cuser->test_input($_POST['date_naissance_epouse']);
        $nom_pere_epouse=$cuser->test_input($_POST['nom_pere_epouse']);
        $nom_mere_epouse=$cuser->test_input($_POST['nom_mere_epouse']);
        $province_epouse=$cuser->test_input($_POST['province_epouse']);
        $territoire_epouse=$cuser->test_input($_POST['territoire_epouse']);
        $regime_matrimoniaux=$cuser->test_input($_POST['regime_matrimoniaux']);
        $date_celebration=$cuser->test_input($_POST['date_celebration']);
        $nom_temoin=$cuser->test_input($_POST['nom_temoin']);
        $frais_document_id=$cuser->test_input($_POST['frais_document_id']);

        $fichier='uploads/';
        if(isset($_FILES['photoEpoux']['name']) && ($_FILES['photoEpoux']['name']!="")){
            $photoEpoux=$fichier.$_FILES['photoEpoux']['name'];
            move_uploaded_file($_FILES['photoEpoux']['tmp_name'], $photoEpoux);
        }

        if(isset($_FILES['photoEpouse']['name']) && ($_FILES['photoEpouse']['name']!="")){
            $photoEpouse=$fichier.$_FILES['photoEpouse']['name'];
            move_uploaded_file($_FILES['photoEpouse']['tmp_name'], $photoEpouse);
        }

        $cuser->add_projet_mariage($numero_projet,$nom_Epoux,$nom_Epouse,$lieu_naissance_epoux,$date_naissance_epoux,$lieu_naissance_epouse,$date_naissance_epouse,$nom_temoin,$regime_matrimoniaux,$photoEpoux,$photoEpouse,$cidCommune,$nom_pere_epoux,$nom_mere_epoux,$nom_pere_epouse,$nom_mere_epouse,$province_epoux,$territoire_epoux,$province_epouse,$territoire_epouse,$date_celebration,$frais_document_id);
        
     }

     //Gérer la requête d'affichages des projets des mariages pour la commune en cours avec Ajax
     if(isset($_POST['action'])&& $_POST['action']=='fetchAllProjetMariages'){
        $output='';
        $data=$cuser->fetchAllProjetMariages($cidCommune);
        $path='assets/php/';

        if($data){
            $output .='
                <table class="table table-striped table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>N° Projet</th>
                            <th>Nom Epoux</th>
                            <th>Nom Epouse</th>
                            <th>Régime mariage</th>
                            <th>Photo Epoux</th>
                            <th>Photo Epouse</th>
                            <th>Action</th>
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
                                        <td>'.$row['id_projet_mariage'].'</td>
                                        <td>'.$row['numero_projet'].'</td>
                                        <td>'.$row['nom_Epoux'].'</td>
                                        <td>'.$row['nom_Epouse'].'</td>
                                        <td>'.$row['regime_matrimoniaux'].'</td>
                                        <td> <img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
                                        <td> <img src="'.$uphotos.'" class="rounded-circle" width="40px"></td>
                                        <td class="text-center">
                                            <a href="#" id="'.$row['id_projet_mariage'].'" title="Voir Détail Projet Mariage" class="text-primary projetDetailsIcon" data-toggle="modal" data-target="#showProjetDetailsModal"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                                            <a href="#" id="'.$row['id_projet_mariage'].'" title="Supprimer Projet Mariage" class="text-danger deleteProjetIcon"><i class="fas fa-trash-alt fa-lg"></i></a>
                                        </td>
                                   </tr>';
                    }
                    $output .='
                    </tbody>
                    </table>';
                    echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore des projets mariages créée pour cette commune !</h3>';
        }
     }

    //Afficher détail projet mariage séléctionné en Ajax Request
    if(isset($_POST['detail_projet_id'])){
       
        $id=$_POST['detail_projet_id'];

        $data=$cuser->fetchProjetDetailsByID($id);

        echo json_encode($data);
    }

    //Gérer la suppression d'un projet de mariage à la commune Ajax Request
    if(isset($_POST['del_projet_id'])){
        $id=$_POST['del_projet_id'];
        $cuser->delete_projet_mariage($id);
    }

    //Gérer la requête l'ajout Acte Mariage pour la commune en cours avec Ajax
    if(isset($_POST['action']) && $_POST['action']=='add_actemariage'){
        $acte_num=$cuser->test_input($_POST['acte_num']);
        $annee=$cuser->test_input($_POST['annee']);
        $jour=$cuser->test_input($_POST['jour']);
        $etat_civil_epoux=$cuser->test_input($_POST['etat_civil_epoux']);
        $residant_epoux=$cuser->test_input($_POST['residant_epoux']);
        $profession_epoux=$cuser->test_input($_POST['profession_epoux']);
        $etat_civil_epouse=$cuser->test_input($_POST['etat_civil_epouse']);
        $residant_epouse=$cuser->test_input($_POST['residant_epouse']);
        $profession_epouse=$cuser->test_input($_POST['profession_epouse']);
        $dote_composee=$cuser->test_input($_POST['dote_composee']);
        $date_celebree=$cuser->test_input($_POST['date_celebree']);
        $officierID=$cuser->test_input($_POST['officierID']);
        $projet_mariage_id=$cuser->test_input($_POST['projet_mariage_id']);

        $cuser->add_acte_mariage($acte_num,$annee,$jour,$etat_civil_epoux,$residant_epoux,$profession_epoux,$etat_civil_epouse,$residant_epouse,$profession_epouse,$dote_composee,$date_celebree,$officierID,$cidCommune,$projet_mariage_id);
        $cuser->update_Projet_mariages($projet_mariage_id);
    }

    //Gérer la requête d'affichages des actes des mariages pour la commune en cours avec Ajax
    if(isset($_POST['action'])&& $_POST['action']=='fetchAllActeMariages'){
        $output='';
        $data=$cuser->fetchAllActeMariages($cidCommune);
        $path='assets/php/';

        if($data){
            $output .='
                <table class="table table-striped table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>N°</th>
                            <th>Nom Epoux</th>
                            <th>Nom Epouse</th>
                            <th>Photo Epoux</th>
                            <th>Photo Epouse</th>
                            <th>Action</th>
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
                                        <td> <img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
                                        <td> <img src="'.$uphotos.'" class="rounded-circle" width="40px"></td>
                                        <td class="text-center">
                                            <a href="#" id="'.$row['id_acte_mariage'].'" title="Voir Détail Acte Mariage" class="text-primary acteMariageDetailsIcon" data-toggle="modal" data-target="#showActeMariageDetailsModal"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                                            <a href="#" id="'.$row['id_acte_mariage'].'" title="Supprimer Acte Mariage" class="text-danger deleteActeMariageIcon"><i class="fas fa-trash-alt fa-lg"></i></a>
                                        </td>
                                   </tr>';
                    }
                    $output .='
                    </tbody>
                    </table>';
                    echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore d\'actes des mariages créée pour cette commune !</h3>';
        }
     }

    //Gérer la requête d'affichages des mariages pour la commune en cours avec Ajax
    if(isset($_POST['action'])&& $_POST['action']=='displayAllMariages'){
        $output='';
        $data=$cuser->fetchAllActeMariages($cidCommune);
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
                            <th>Action</th>
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
                                        <td class="text-center">
                                            <a href="#" id="'.$row['id_acte_mariage'].'" title="Voir Détail Acte Mariage" class="text-primary acteMariageDetailsIcon" data-toggle="modal" data-target="#showActeMariageDetailsModal"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                                            <a href="#" id="'.$row['id_acte_mariage'].'" title="Voir Document Mariage" class="text-success acteMariageDetailsDoc" data-toggle="modal" data-target="#showDocument"><i class="fas fa-info-circle fa-lg"></i></a>
                                        </td>
                                   </tr>';
                    }
                    $output .='
                    </tbody>
                    </table>';
                    echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore d\'actes des mariages créée pour cette commune !</h3>';
        }
    }

    //Gérer la suppression d'acte de mariage à la commune Ajax Request
    if(isset($_POST['del_actemariage_id'])){
        $id=$_POST['del_actemariage_id'];
        $cuser->delete_acte_mariage($id);
    }

    //Afficher détail acte mariage séléctionné en Ajax Request
    if(isset($_POST['detail_mariage_id'])){
       
        $id=$_POST['detail_mariage_id'];

        $data=$cuser->fetchActeMariageDetailsByID($id);

        echo json_encode($data);
    }

     //Gérer la requête d'affichages des défunts par le préposé de décès pour la commune en cours avec Ajax
     if(isset($_POST['action'])&& $_POST['action']=='fetchAllDefunts'){
        $output='';

        $defunt=$cuser->get_defunt($cidCommune);

        if($defunt){
            $output .='
                <table class="table table-striped table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Père</th>
                            <th>Mère</th>
                            <th>Comparant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($defunt as $row){
                        $output .='
                        <tr>
                            <td>'.$row['id_defunt'].'</td>
                            <td>'.$row['nom_defunt'].'</td>
                            <td>'.$row['postnom_defunt'].'</td>
                            <td>'.$row['prenom_defunt'].'</td>
                            <td>'.$row['sexe_defunt'].'</td>
                            <td>'.$row['nom_pere'].'</td>
                            <td>'.$row['nom_mere'].'</td>
                            <td>'.$row['nom_comparant'].'</td>
                            <td class="text-center">
                                <a href="#" id="'.$row['id_defunt'].'" title="Supprimer Défunt " class="text-danger deleteDefuntBtn"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;
                            </td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore de défunt créée pour cette commune !</h3>';
        }

     }

     //Gérer la requête d'affichages des défunts pour la commune en cours avec Ajax
     if(isset($_POST['action'])&& $_POST['action']=='fetchAllDefunt'){
        $output='';

        $defunt=$cuser->get_defunt($cidCommune);

        if($defunt){
            $output .='
                <table class="table table-striped table-sm text-justify">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Père</th>
                            <th>Mère</th>
                            <th>Comparant</th>
                            <th>Date Décès</th>
                            <th>Adresse</th>
                            <th>Date naissance</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($defunt as $row){
                        $output .='
                        <tr>
                            <td>'.$row['id_defunt'].'</td>
                            <td>'.$row['nom_defunt'].'</td>
                            <td>'.$row['postnom_defunt'].'</td>
                            <td>'.$row['prenom_defunt'].'</td>
                            <td>'.$row['sexe_defunt'].'</td>
                            <td>'.$row['nom_pere'].'</td>
                            <td>'.$row['nom_mere'].'</td>
                            <td>'.$row['nom_comparant'].'</td>
                            <td>'.$row['date_deces'].'</td>
                            <td>'.$row['adresse_defunt'].'</td>
                            <td>'.$row['date_naissance'].'</td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore de défunt créée pour cette commune !</h3>';
        }

     }

    //Gérer la requête l'ajout défunt pour la commune en cours avec Ajax
    if(isset($_POST['action']) && $_POST['action']=='add_defunt'){
        $nom_defunt=$cuser->test_input($_POST['nom_defunt']);
        $postnom_defunt=$cuser->test_input($_POST['postnom_defunt']);
        $prenom_defunt=$cuser->test_input($_POST['prenom_defunt']);
        $sexe_defunt=$cuser->test_input($_POST['sexe_defunt']);
        $nom_pere=$cuser->test_input($_POST['nom_pere']);
        $nom_mere=$cuser->test_input($_POST['nom_mere']);
        $nom_comparant=$cuser->test_input($_POST['nom_comparant']);
        $date_deces=$cuser->test_input($_POST['date_deces']);
        $lieu_naissance=$cuser->test_input($_POST['lieu_naissance']);
        $date_naissance=$cuser->test_input($_POST['date_naissance']);
        $adresse_defunt=$cuser->test_input($_POST['adresse_defunt']);
        $frais_ID=$cuser->test_input($_POST['frais_ID']);
        $cuser->add_defunt($nom_defunt,$postnom_defunt,$prenom_defunt,$sexe_defunt,$nom_pere,$nom_mere,$nom_comparant,$date_deces,$lieu_naissance,$date_naissance,$adresse_defunt,$cidCommune,$frais_ID);
    }

    //Gérer la suppression de défunt à la commune Ajax Request
    if(isset($_POST['del_defunt_id'])){
        $id=$_POST['del_defunt_id'];
        $cuser->delete_defunt($id);
    }

    //Gérer la requête d'affichages des actes des décès pour la commune en cours avec Ajax
    if(isset($_POST['action'])&& $_POST['action']=='fetchAllActeDeces'){
        $output='';

        $acteDeces=$cuser->get_acte_deces($cidCommune);

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
                            <th>Action</th>
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
                            <td class="text-center">
                                <a href="#" id="'.$row['id_deces'].'" title="Supprimer Acte décès" class="text-danger deleteActeDecesBtn"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;
                                <a href="#" id="'.$row['id_deces'].'" title="Voir document Défunt " class="text-succes voirActeDecesDocBtn"><i class="fas fa-info-circle fa-lg"></i></a>
                            </td>
                        </tr>';
                }
                $output .='</tbody></table>';
                echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( Pas encore d\'acte de décès créée pour cette commune !</h3>';
        }

     }

      //Gérer la requête l'ajout d'acte de décès pour la commune en cours avec Ajax
    if(isset($_POST['action']) && $_POST['action']=='add_actedeces'){
        $acte_deces_num=$cuser->test_input($_POST['acte_deces_num']);
        $volume_acte=$cuser->test_input($_POST['volume_acte']);
        $folio_acte=$cuser->test_input($_POST['folio_acte']);
        $annee_acte=$cuser->test_input($_POST['annee_acte']);
        $jour_acte=$cuser->test_input($_POST['jour_acte']);
        $profession_deces=$cuser->test_input($_POST['profession_deces']);
        $est_decede=$cuser->test_input($_POST['est_decede']);
        $residant_deces=$cuser->test_input($_POST['residant_deces']);
        $nationalite_deces=$cuser->test_input($_POST['nationalite_deces']);
        $etat_civil_deces=$cuser->test_input($_POST['etat_civil_deces']);
        $ID_Off=$cuser->test_input($_POST['ID_Off']);
        $defunt_ID=$cuser->test_input($_POST['defunt_ID']);
        $cuser->add_acte_deces($acte_deces_num,$volume_acte,$folio_acte,$annee_acte,$jour_acte,$profession_deces,$est_decede,$residant_deces,$nationalite_deces,$etat_civil_deces,$cidCommune,$ID_Off,$defunt_ID);
    }

    //Gérer la suppression d'acte de décès à la commune Ajax Request
    if(isset($_POST['del_actedeces_id'])){
        $id=$_POST['del_actedeces_id'];
        $cuser->delete_acte_deces($id);
    }

    

    
?>