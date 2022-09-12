<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connexion.php';
    //Création code Acte
    $mois = (int)(date("m"));
    $sec1 = date("s");
    $sec2 = (int)(date("s"));
    $code1 = $mois+$sec2 + $sec1+$sec1;
    $code2 = $code1 +$sec1+$sec2 + $mois;  
    $acte_num_mariage= $code1.''.$code2 ;
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
                </div>
        <?php if($ctypePrepose=='Prepose mariage'):?>
                <h4 class="text-center text-black mt-2">Enregistrer vos actes des mariages pour les voir prochainement !</h4>
            </div>
        </div>
        <div class="card border-primary mt-2">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;Tous les actes des mariages</span>
                    <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addActeMariageModal"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;Ajouter Acte Mariage</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="afficherActeMariage">
                    <p class="text-center lead mt-5">Veuillez patienter...</p>
                </div>
            </div>
    </div>
</div>

<!--Début d'Ajout acte mariage-->
<div class="modal fade" id="addActeMariageModal">
    <div class="modal-dialog modal-dialog-justify">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-light"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;Ajouter Acte Mariage</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form  action="#" method="post" id="add-actemariage-form" class="px-3">
            <div class="form-group">
                <input type="hidden" name="acte_num" id="acte_num" value="<?php echo $acte_num_mariage;?>">
                <input type="text" name="annee" id="annee" class="form-control form-control-lg" placeholder="Entrer année d'établissement" required>
            </div>
            <div class="form-group">
                <input type="text" name="jour" id="jour" class="form-control form-control-lg" placeholder="Entrer jour d'établissement" required>
            </div>
            <div class="form-group">
                <label for="etat_civil_epoux">Séléctionner état civil Epoux :</label>
                <select name="etat_civil_epoux" id="etat_civil_epoux" class="form-control form-control-lg">
                    <option value="" disabled>Séléctionner état civil Epoux</option>
                    <option value="Celibataire" required>Célibataire</option>
                    <option value="Marie" required>Marié</option>
                    <option value="Veuf" required>Veuf</option>
                    <option value="Divorce" required>Divorcé</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="residant_epoux" id="residant_epoux" class="form-control form-control-lg" placeholder="Entrer adresse résidence époux" required>
            </div>
            <div class="form-group">
                <input type="text" name="profession_epoux" id="profession_epoux" class="form-control form-control-lg" placeholder="Entrer profession époux" required>
            </div>
            <div class="form-group">
                <label for="etat_civil_epouse">Séléctionner état civil Epouse :</label>
                <select name="etat_civil_epouse" id="etat_civil_epouse" class="form-control form-control-lg">
                    <option value="" disabled>Séléctionner état civil Epouse</option>
                    <option value="Celibataire" required>Célibataire</option>
                    <option value="Mariee" required>Mariée</option>
                    <option value="Veuve" required>Veuve</option>
                    <option value="Divorcee" required>Divorcée</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="residant_epouse" id="residant_epouse" class="form-control form-control-lg" placeholder="Entrer adresse résidence épouse" required>
            </div>
            <div class="form-group">
                <input type="text" name="profession_epouse" id="profession_epouse" class="form-control form-control-lg" placeholder="Entrer profession épouse" required>
            </div>
            <div class="form-group">
                <input type="text" name="dote_composee" id="dote_composee" class="form-control form-control-lg" placeholder="Entrer dote composée" required>
            </div>
            <div class="form-group">
                <label for="date_celebree">Séléctionner la date célebration :</label>
                <input type="date" name="date_celebree" id="date_celebree" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
                <label for="officierID">Officier de l'Etat Civil:</label>
                <select name="officierID" id="officierID" class="form-control form-control-lg" required>
                    <?php $req=$db->query("SELECT idOfficier,nomOfficier, prenom,login, motdepasse, typeOfficier, communeId,commune.commune, typeuser.typeUser FROM officier INNER JOIN commune ON commune.id=officier.communeId INNER JOIN typeuser ON typeuser.id=officier.typeOfficier WHERE communeId='".$data['idcommune']."'");
                        while ($tab=$req->fetch()){?>
                            <option value="<?php echo $tab['idOfficier'];?>"><?php echo $tab['nomOfficier'];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="projet_mariage_id">Séléctionner Projet Mariage :</label>
                <select name="projet_mariage_id" id="projet_mariage_id" class="form-control form-control-lg" required>
                    <?php $req=$db->query("SELECT * FROM projet_mariage WHERE visible=1 AND id_Communes='".$data['idcommune']."'");
                        while ($tab=$req->fetch()){?>
                            <option value="<?php echo $tab['id_projet_mariage'];?>"><?php echo $tab['nom_Epoux'];?>&nbsp;|&nbsp;<?php echo $tab['nom_Epouse'];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="addActeMariage" class="btn btn-primary btn-block btn-lg" id="addActeMariageBtn" value="Ajouter Acte Mariage" >
            </div>
            </form>
        </div>
    </div>
    </div>
</div>
<!--Fin d'Ajout acte mariage-->

 <!-- Début Affichage de détail d'actes des mariages avec formulaire Modal-->
 <div class="modal fade" id="showActeMariageDetailsModal">
        <div class="modal-dialog modal-dialog-centered mw-100 w-50">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="getEpoux"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card align-self-center" id="getPhoto"></div>
                        <div class="card border-primary align-self-center">
                            <div class="card-body">
                                <p id="getNum"></p>
                                <p id="getAnnee"></p>
                                <p id="getJour"></p>
                                <p id="getEtatcivilEpoux"></p>
                                <p id="getResidantEpoux"></p>
                                <p id="getProfessionEpoux"></p>
                                <p id="getCelebration"></p>
                                <p id="getDatePublier"></p>
                            </div>
                        </div>
                        <div class="card align-self-center" id="getPhotoF"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Affichage de détail d'actes des mariages avec formulaire Modal-->
    <?php else:?>
        <h1 class="text-center text-secondary mt-5">Vous n'êtes autorisé à accéder à cette page !</h1>
    <?php endif;?>
    <div class="footer mt-2">
        <div class="footer-botton mt-2">
            &copy; 2020 Bnd Mobetisoft| DIVINAS
        </div>
    </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       
         //Ajouter Acte Mariage Ajax Request
         $("#addActeMariageBtn").click(function(e){
                if($("#add-actemariage-form")[0].checkValidity()){
                    e.preventDefault();
                    $("#addActeMariageBtn").val('Veuillez patienter...');
                    $.ajax({
                        url:'assets/php/process.php',
                        method:'post',
                        data:$("#add-actemariage-form").serialize()+'&action=add_actemariage',
                        success:function(response){
                            $("#addActeMariageBtn").val('Ajouter Acte Mariage');
                            $("#add-actemariage-form")[0].reset();
                            $("#addActeMariageModal").modal('hide');
                            Swal.fire({
                                title:'Acte Mariage ajouté avec succès !',
                                type:'success'
                            });
                            fetchAllActeMariages();
                        }
                    });
                }
        });

         //Afficher détail Acte de mariage en Ajax Request
         $("body").on("click", ".acteMariageDetailsIcon", function(e){
            e.preventDefault();
            detail_mariage_id=$(this).attr('id');
            $.ajax({
                url: 'assets/php/process.php',
                type:'post',
                data:{detail_mariage_id:detail_mariage_id},
                success:function(response){
                    data=JSON.parse(response);
                    $("#getEpoux").text('Epoux:'+data.nom_Epoux+' & Epouse: '+data.nom_Epouse+'  '+'(ID:'+data.id_acte_mariage+')');
                    $("#getNum").text('N°:'+data.acte_num);
                    $("#getAnnee").text('L\'an deux mille:'+data.annee);
                    $("#getJour").text('le :'+data.jour);
                    $("#getEtatcivilEpoux").text('Etat civil Epoux:'+data.etat_civil_epoux);
                    $("#getResidantEpoux").text('Adresse:'+data.residant_epoux);
                    $("#getProfessionEpoux").text('Prefession Epoux:'+data.profession_epoux);
                    $("#getCelebration").text('Date Célébration:'+data.date_celebree);
                    $("#getDatePublier").text('Date publication:'+data.date_publier);
                    if(data.photoEpoux !=''){
                        $("#getPhoto").html('<img src="assets/php/'+data.photoEpoux+'" class="img-thumbnail img-fluid align-self-center" width="300px">');
                    }
                    else{
                        $("#getPhoto").html('<img src="assets/images/avatar.png" class="img-thumbnail img-fluid align-self-center" width="300px">');
                    }

                    if(data.photoEpouse !=''){
                        $("#getPhotoF").html('<img src="assets/php/'+data.photoEpouse+'" class="img-thumbnail img-fluid align-self-center" width="300px">');
                    }
                    else{
                        $("#getPhotoF").html('<img src="assets/images/avatarr.png" class="img-thumbnail img-fluid align-self-center" width="300px">');
                    }
                //console.log(data);
            }
        });
    });

        //Delete un acte de mariage par commune
        $("body").on("click", ".deleteActeMariageIcon", function(e){
                e.preventDefault();

                del_actemariage_id=$(this).attr('id');

                Swal.fire({
                    title: 'Etes-vous sûr de supprimer ?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimez-le!'
                    }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:'assets/php/process.php',
                            method:'post',
                            data:{del_actemariage_id:del_actemariage_id},
                            success:function(response){
                                Swal.fire(
                                    'Supprimé Acte mariage!',
                                    'Acte mariage supprimé avec succès.',
                                    'success'
                                )
                                fetchAllActeMariages();
                            }
                        });
                        
                    }
                })

        });

        //Fetch All projet_mariage Ajax Request
        fetchAllActeMariages();

        function fetchAllActeMariages(){
            $.ajax({
                url:'assets/php/process.php',
                method: 'post',
                data:{action: 'fetchAllActeMariages'},
                success:function(response){
                     $("#afficherActeMariage").html(response);
                    $("table").DataTable({
                    order:[0, 'desc']
                });
        }
    });
}
        
    });
</script>
</body>
</html>