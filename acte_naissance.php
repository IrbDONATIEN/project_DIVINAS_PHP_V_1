<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connexion.php';
    //Création code Acte
    $mois = (int)(date("m"));
    $sec1 = date("s");
    $sec2 = (int)(date("s"));
    $code1 = $mois+$sec2 + $sec1+$sec2;
    $code2 = $code1 + $sec2 + $mois;  
    $codeAct = $code1.''.$code2 ;

    //Création Volume
    $moiss = (int)(date("m"));
    $secc1 = date("s");
    $secc2 = (int)(date("s"));
    $codee1 = $secc2 +$moiss+ $secc1;
    $codee2 = $moiss + $codee1 + $secc2+$secc1;  
    $volume = $codee2.''.$codee1;

    //Création folio
    $moisss = (int)(date("m"));
    $seccc1 = date("s");
    $seccc2 = (int)(date("s"));
    $codeee1 = $seccc2 + $seccc1 + $moisss;
    $codeee2 = $moisss + $codeee1 + $seccc1;  
    $folio = $codeee2.''.$codeee1;
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
                </div>
        <?php if($ctypePrepose=='Prepose naissance'):?>
                <h4 class="text-center text-black mt-2">Enregistrer vos actes des naissances pour les voir prochainement !</h4>
            </div>
        </div>
        <div class="card border-primary mt-2">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center">Tous les actes des naissances</span>
                    <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addActenaisModal"><i class="fas fa-baby"></i><i class="fas fa-baby"></i>&nbsp;Ajouter Acte naissance</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="afficherActeNais">
                    <p class="text-center lead mt-5">Veuillez patienter...</p>
                </div>
            </div>
        </div>
    </div>

       <!--Début d'Ajout acte naissance-->
        <div class="modal fade" id="addActenaisModal">
            <div class="modal-dialog modal-dialog-justify">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-light"><i class="fas fa-baby"></i><i class="fas fa-baby"></i>&nbsp;Ajouter Acte naissance</h4>
                        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  action="#" method="post" id="add-actenaissance-form" class="px-3">
                            <div class="form-group">
                                <input type="hidden" name="codeAct" id="codeAct" value="<?php echo $codeAct;?>">
                                <input type="hidden" name="volume" id="volume" value="<?php echo $volume;?>">
                                <input type="hidden" name="folio" id="folio" value="<?php echo $folio;?>">

                                <input type="text" name="profession" id="profession" class="form-control form-control-lg" placeholder="Entrer profession" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nationalite" id="nationalite" class="form-control form-control-lg" placeholder="Entrer nationalité" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="professionpere" id="professionpere" class="form-control form-control-lg" placeholder="Entrer profession du père" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="resident" id="resident" class="form-control form-control-lg" placeholder="Entrer lieu de résidence" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="langue" id="langue" class="form-control form-control-lg" placeholder="Entrer langue de traduction acte" required>
                            </div>
                            <div class="form-group">
                                    <label for="officier_id">Officier de l'Etat Civil:</label>
                                    <select name="officier_id" id="officier_id" class="form-control form-control-lg" required>
                                        <?php $req=$db->query("SELECT idOfficier,nomOfficier, prenom,login, motdepasse, typeOfficier, communeId,commune.commune, typeuser.typeUser FROM officier INNER JOIN commune ON commune.id=officier.communeId INNER JOIN typeuser ON typeuser.id=officier.typeOfficier WHERE communeId='".$data['idcommune']."'");
                                            while ($tab=$req->fetch()){?>
                                                <option value="<?php echo $tab['idOfficier'];?>"><?php echo $tab['nomOfficier'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="nouveaune_id">Sélectionner Nouveau-né :</label>
                                    <select name="nouveaune_id" id="nouveaune_id" class="form-control form-control-lg" required>
                                        <?php $req=$db->query("SELECT * FROM nouveau_ne WHERE ID_comm='".$data['idcommune']."'");
                                            while ($tab=$req->fetch()){?>
                                                <option value="<?php echo $tab['id_naissance'];?>"><?php echo $tab['nom_nv_ne'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addActenais" class="btn btn-primary btn-block btn-lg" id="addActenaisBtn" value="Ajouter Acte naissance" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin d'Ajout acte naissance-->

    <!--Début d'édition acte naissance-->
    <div class="modal fade" id="editActenaisModal">
            <div class="modal-dialog modal-dialog-justify">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h4 class="modal-title text-light"><i class="fas fa-baby"></i><i class="fas fa-baby"></i>&nbsp;Edition Acte naissance</h4>
                        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  action="#" method="post" id="edit-actenaissance-form" class="px-3">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <input type="text" name="profession" id="eprofession" class="form-control form-control-lg" placeholder="Entrer profession" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nationalite" id="enationalite" class="form-control form-control-lg" placeholder="Entrer nationalité" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="professionpere" id="eprofessionpere" class="form-control form-control-lg" placeholder="Entrer profession du père" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="resident" id="eresident" class="form-control form-control-lg" placeholder="Entrer lieu de résidence" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="langue" id="elangue" class="form-control form-control-lg" placeholder="Entrer langue de traduction acte" required>
                            </div>
                            <div class="form-group">
                                    <label for="eofficier_id">Officier de l'Etat Civil:</label>
                                    <select name="officier_id" id="eofficier_id" class="form-control form-control-lg" required>
                                        <?php $req=$db->query("SELECT idOfficier,nomOfficier, prenom,login, motdepasse, typeOfficier, communeId,commune.commune, typeuser.typeUser FROM officier INNER JOIN commune ON commune.id=officier.communeId INNER JOIN typeuser ON typeuser.id=officier.typeOfficier WHERE communeId='".$data['idcommune']."'");
                                            while ($tab=$req->fetch()){?>
                                                <option value="<?php echo $tab['idOfficier'];?>"><?php echo $tab['nomOfficier'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="enouveaune_id">Sélectionner Nouveau-né :</label>
                                    <select name="nouveaune_id" id="enouveaune_id" class="form-control form-control-lg" required>
                                        <?php $req=$db->query("SELECT * FROM nouveau_ne WHERE ID_comm='".$data['idcommune']."'");
                                            while ($tab=$req->fetch()){?>
                                                <option value="<?php echo $tab['id_naissance'];?>"><?php echo $tab['nom_nv_ne'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="editActenais" class="btn btn-secondary btn-block btn-lg" id="editActenaisBtn" value="Editer Acte naissance">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin d'édition acte naissance-->
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

            //Ajouter Nouveau Ajax Request
            $("#addActenaisBtn").click(function(e){
                if($("#add-actenaissance-form")[0].checkValidity()){
                    e.preventDefault();
                    $("#addActenaisBtn").val('Veuillez patienter...');
                    $.ajax({
                        url:'assets/php/process.php',
                        method:'post',
                        data:$("#add-actenaissance-form").serialize()+'&action=add_actenais',
                        success:function(response){
                            $("#addActenaisBtn").val('Ajouter Acte naissance');
                            $("#add-actenaissance-form")[0].reset();
                            $("#addActenaisModal").modal('hide');
                            Swal.fire({
                                title:'Acte naissance ajouté avec succès !',
                                type:'success'
                            });
                            displayAllActenais();
                        }
                    });
                }
            });

            //Editer acte naissance par commune en Ajax request
            $("body").on("click",".editBtn", function(e){
                e.preventDefault();

                edit_actenais_id=$(this).attr('id');
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:{edit_actenais_id:edit_actenais_id},
                    success:function(response){
                        data=JSON.parse(response);
                        $("#id").val(data.idActeNais);
                        $("#eprofession").val(data.profession);
                        $("#enationalite").val(data.nationalite);
                        $("#eprofessionpere").val(data.professionpere);
                        $("#eresident").val(data.resident);
                        $("#elangue").val(data.langue);
                        $("#eofficier_id").val(data.officier_id);
                        $("#enouveaune_id").val(data.nouveaune_id);
                    }
                });
            });

            //Afficher voir  Acte de naissance en Ajax Request
            $("body").on("click", ".voirNaissanceBtn", function(e){
                e.preventDefault();
                detail_nais_id=$(this).attr('id');
                $.ajax({
                    url: 'assets/php/process.php',
                    type:'post',
                    data:{detail_nais_id:detail_nais_id},
                    success:function(response){
                        window.location ='documentnaissanceprop.php?id='+detail_nais_id;
                    }
                });
           });

            //Modifier Acte naissance par commune en Ajax Request
            $("#editActenaisBtn").click(function(e){
                if($("#edit-actenaissance-form")[0].checkValidity()){
                    e.preventDefault();

                    $.ajax({
                        url:'assets/php/process.php',
                        method:'post',
                        data:$("#edit-actenaissance-form").serialize()+"&action=update_actenais",
                        success:function(response){
                            Swal.fire({
                                title:'Acte naissance mise à jour avec succès !',
                                type:'success'
                            });
                            $("#edit-actenaissance-form")[0].reset();
                            $("#editActenaisModal").modal('hide');
                            displayAllActenais();
                        }
                    });
                }
            });


            //Delete un acte de naissance par commune
            $("body").on("click", ".deleteBtn", function(e){
                e.preventDefault();

                del_actenais_id=$(this).attr('id');

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
                            data:{del_actenais_id:del_actenais_id},
                            success:function(response){
                                Swal.fire(
                                    'Supprimé Acte naissance!',
                                    'Acte naissance supprimé avec succès.',
                                    'success'
                                )
                                displayAllActenais();
                            }
                        });
                        
                    }
                })

            });

            displayAllActenais();
            //Afficher tous les actes des naissances pour la commune en Ajax Request
            function displayAllActenais(){
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:{action:'display_actenais'},
                    success:function(response){
                        $("#afficherActeNais").html(response);
                        $("table").DataTable({
                            order:[0,'desc']
                        });
                    }
                });
            }

        });
    </script>
</body>
</html>
