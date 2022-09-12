<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connexion.php';


    //Création code Acte
    $mois = (int)(date("m"));
    $sec1 = date("s");
    $sec2 = (int)(date("s"));
    $code1 = +$sec2 +$mois+ $sec1;
    $code2 = $code1 + $sec2 + $mois;  
    $acte_num_dèces = $code1.''.$code2 ;

    //Création Volume
    $moiss = (int)(date("m"));
    $secc1 = date("s");
    $secc2 = (int)(date("s"));
    $codee1 = $secc2 +$moiss+ $secc1+$secc2;
    $codee2 = $moiss + $codee1 + $secc2+$secc1;  
    $acte_deces_volume = $codee2.''.$codee1;

    //Création folio
    $moisss = (int)(date("m"));
    $seccc1 = date("s");
    $seccc2 = (int)(date("s"));
    $codeee1 = $seccc2 + $seccc1 + $moisss+$seccc2;
    $codeee2 = $moisss + $codeee1 + $seccc1;  
    $acte_deces_folio = $codeee2.''.$codeee1;
?>
  
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-secondary alert-dismissible text-center mt-2 m-0">
                <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
            </div>
        <?php if($ctypePrepose=='Prepose deces'):?>
                <h4 class="text-center text-black mt-2">Enregistrer vos actes des décès pour les voir prochainement !</h4>
            </div>
        </div>
        <div class="card border-secondary mt-2">
            <h5 class="card-header bg-secondary d-flex justify-content-between">
            <span class="text-light lead align-self-center"><i class="fas fa-user-slash"></i><i class="fas fa-user-slash"></i>&nbsp;Tous les actes des décès</span>
            <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addActeDecesModal"><i class="fas fa-user-slash"></i><i class="fas fa-user-slash"></i>&nbsp;Ajouter Acte Décès</a>
            </h5>
        <div class="card-body">
        <div class="table-responsive" id="afficherActeDeces">
            <p class="text-center lead mt-5">Veuillez patienter...</p>
        </div>
        </div>
    </div>
</div>

<!--Début d'Ajout défunt -->
<div class="modal fade" id="addActeDecesModal">
    <div class="modal-dialog modal-dialog-justify">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title text-light"><i class="fas fa-user-slash"></i><i class="fas fa-user-slash"></i>&nbsp;Ajouter Acte Décès</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form  action="#" method="post" id="add-actedeces-form" class="px-3">
            <div class="form-group">
                <input type="hidden" name="acte_deces_num" id="acte_deces_num" value="<?php echo $acte_num_dèces;?>">
                <input type="hidden" name="volume_acte" id="volume_acte" value="<?php echo $acte_deces_volume;?>">
                <input type="hidden" name="folio_acte" id="folio_acte" value="<?php echo $acte_deces_folio;?>">
                
                <input type="text" name="annee_acte" id="annee_acte" class="form-control form-control-lg" placeholder="Entrer année acte de décès" required>
            </div>
            <div class="form-group">
                <input type="text" name="jour_acte" id="jour_acte" class="form-control form-control-lg" placeholder="Entrer jour acte décès" required>
            </div>
            <div class="form-group">
                <input type="text" name="profession_deces" id="profession_deces" class="form-control form-control-lg" placeholder="Entrer profession de décès" required>
            </div>
            <div class="form-group">
                <input type="text" name="est_decede" id="est_decede" class="form-control form-control-lg" placeholder="Entrer est décédé(e)" required>
            </div>
            <div class="form-group">
                <input type="text" name="residant_deces" id="residant_deces" class="form-control form-control-lg" placeholder="Entrer résidant décès" required>
            </div>
            <div class="form-group">
                <input type="text" name="nationalite_deces" id="nationalite_deces" class="form-control form-control-lg" placeholder="Entrer nationalité décès" required>
            </div>
            <div class="form-group">
                <label for="etat_civil_deces">Séléctionner Etat Civil décès :</label>
                <select name="etat_civil_deces" id="etat_civil_deces" class="form-control form-control-lg">
                    <option value="" disabled>Séléctionner Etat Civil décès</option>
                    <option value="Celibataire" required>Célibataire</option>
                    <option value="Marie(e)" required>Marié(e)</option>
                    <option value="Veuf(ve)" required>Veuf(ve)</option>
                    <option value="Divorcé(e)" required>Divorcé(e)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="defunt_ID">Sélectionner Comparant | Défunt correspondant :</label>
                <select name="defunt_ID" id="defunt_ID" class="form-control form-control-lg" required>
                    <?php $req=$db->query("SELECT * FROM defunt WHERE Id_commune='".$data['idcommune']."'");
                        while ($tab=$req->fetch()){?>
                             <option value="<?php echo $tab['id_defunt'];?>"><?php echo $tab['nom_comparant'];?>&nbsp;|&nbsp;<?php echo $tab['nom_defunt'];?></option>
                        <?php
                           }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ID_Off">Sélectionner Officier  :</label>
                <select name="ID_Off" id="ID_Off" class="form-control form-control-lg" required>
                    <?php $req=$db->query("SELECT * FROM officier WHERE communeId='".$data['idcommune']."'");
                        while ($tab=$req->fetch()){?>
                             <option value="<?php echo $tab['idOfficier'];?>"><?php echo $tab['nomOfficier'];?></option>
                        <?php
                           }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="addActeDeces" class="btn btn-secondary btn-block btn-lg" id="addActeDecesBtn" value="Ajouter Acte Décès" >
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Fin d'Ajout défunt-->
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
        
        //Ajouter Acte de décès Ajax Request
        $("#addActeDecesBtn").click(function(e){
            if($("#add-actedeces-form")[0].checkValidity()){
                e.preventDefault();
                $("#addActeDecesBtn").val('Veuillez patienter...');
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:$("#add-actedeces-form").serialize()+'&action=add_actedeces',
                    success:function(response){
                        $("#addActeDecesBtn").val('Ajouter Acte Décès');
                        $("#add-actedeces-form")[0].reset();
                        $("#addActeDecesModal").modal('hide');
                        Swal.fire({
                            title:'Acte Décès ajouté avec succès !',
                            type:'success'
                        });
                        fetchAllActeDeces();
                    }
                });
            }
        });

        //Afficher voir  Acte de décès en Ajax Request
        $("body").on("click", ".voirActeDecesDocBtn", function(e){
                e.preventDefault();
                detail_deces_id=$(this).attr('id');
                $.ajax({
                    url: 'assets/php/process.php',
                    type:'post',
                    data:{detail_deces_id:detail_deces_id},
                    success:function(response){
                        window.location ='documentDeces.php?id='+detail_deces_id;
                    }
                });
        });

        //Delete Acte de décès par commune
        $("body").on("click", ".deleteActeDecesBtn", function(e){
            e.preventDefault();

            del_actedeces_id=$(this).attr('id');

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
                            data:{del_actedeces_id:del_actedeces_id},
                            success:function(response){
                                Swal.fire(
                                    'Supprimé Acte de décès !',
                                    'Acte de décès supprimé avec succès.',
                                    'success'
                                )
                                fetchAllActeDeces();
                            }
                        });
                        
                    }
                })

        });

        //Fetch All Acte de décès Ajax Request
        fetchAllActeDeces();

        function fetchAllActeDeces(){
            $.ajax({
                url:'assets/php/process.php',
                method: 'post',
                data:{action: 'fetchAllActeDeces'},
                success:function(response){
                    $("#afficherActeDeces").html(response);
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