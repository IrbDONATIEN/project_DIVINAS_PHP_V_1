<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connexion.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
                </div>
         <?php if($ctypePrepose=='Prepose naissance'):?>
                <h4 class="text-center text-primary mt-2">Enregistrer vos nouveaux-nés pour les voir prochainement !</h4>
            </div>
        </div>
        <div class="card border-primary mt-2">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center">Tous les nouveau-nés</span>
                    <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addNouveauneModal"><i class="fas fa-baby"></i>&nbsp; Ajouter Nouveau-né</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="afficherNouveaune">
                    <p class="text-center lead mt-5">Veuillez patienter...</p>
                </div>
            </div>
        </div>
    </div>

    <!--Début d'Ajout nouveau-né-->
        <div class="modal fade" id="addNouveauneModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light"><i class="fas fa-baby"></i>&nbsp;Ajouter Nouveau-né</h4>
                        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  action="#" method="post" id="add-nouveaune-form" class="px-3">
                            <div class="form-group">
                                <input type="text" name="nom_nv_ne" id="nom_nv_ne" class="form-control form-control-lg" placeholder="Entrer nom nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="postnom_nv_ne" id="postnom_nv_ne" class="form-control form-control-lg" placeholder="Entrer postnom nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="prenom_nv_ne" id="prenom_nv_ne" class="form-control form-control-lg" placeholder="Entrer prénom nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <select name="sexe" id="sexe" class="form-control form-control-lg">
                                    <option value="" disabled>Sélectionner Genre Nouveau-né</option>
                                    <option value="Masculin" required>Masculin</option>
                                    <option value="Feminin" required>Feminin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_pere" id="nom_pere" class="form-control form-control-lg" placeholder="Entrer nom du père nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_mere" id="nom_mere" class="form-control form-control-lg" placeholder="Entrer nom de la mère nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_declarant" id="nom_declarant" class="form-control form-control-lg" placeholder="Entrer nom de déclarant nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control form-control-lg" placeholder="Entrer lieu de naissance nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="date" name="date_naissance" id="date_naissance" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <label for="frais_doc_id">Sélectionner Type Frais Document et Nommé :</label>
                                <select name="frais_doc_id" id="frais_doc_id" class="form-control form-control-lg" required>
                                    <?php $req=$db->query("SELECT * FROM frais_mariage WHERE communee_id='".$data['idcommune']."'");
                                        while ($tab=$req->fetch()){?>
                                        <option value="<?php echo $tab['id_Frais'];?>"><?php echo $tab['typeFrais'];?>&nbsp;|&nbsp;<?php echo $tab['nomme'];?></option>
                                        <?php
                                            }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addNouveaune" class="btn btn-success btn-block btn-lg" id="addNouveauneBtn" value="Ajouter Nouveau-né" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin d'Ajout nouveau-né-->

    <!--Début Edition nouveau-né-->
    <div class="modal fade" id="editNouveauneModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-light"><i class="fas fa-edit fa-lg"></i>&nbsp;Editer Nouveau-né</h4>
                        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  action="#" method="post" id="edit-nouveaune-form" class="px-3">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <input type="text" name="enom_nv_ne" id="ednom_nv_ne" class="form-control form-control-lg" placeholder="Entrer nom nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="epostnom_nv_ne" id="edpostnom_nv_ne" class="form-control form-control-lg" placeholder="Entrer postnom nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="eprenom_nv_ne" id="edprenom_nv_ne" class="form-control form-control-lg" placeholder="Entrer prénom nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <select name="esexe" id="edsexe" class="form-control form-control-lg">
                                    <option value="" disabled>Sélectionner Genre Nouveau-né</option>
                                    <option value="Masculin" required>Masculin</option>
                                    <option value="Feminin" required>Feminin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_pere" id="ednom_pere" class="form-control form-control-lg" placeholder="Entrer nom du père nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_mere" id="ednom_mere" class="form-control form-control-lg" placeholder="Entrer nom de la mère nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_declarant" id="ednom_declarant" class="form-control form-control-lg" placeholder="Entrer nom de déclarant nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="elieu_naissance" id="edlieu_naissance" class="form-control form-control-lg" placeholder="Entrer lieu de naissance nouveau-né" required>
                            </div>
                            <div class="form-group">
                                <input type="date" name="edate_naissance" id="eddate_naissance" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="editNouveaune" class="btn btn-info btn-block btn-lg" id="editNouveauneBtn" value="Editer Nouveau-né" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin Edition nouveau-né-->
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
            $("#addNouveauneBtn").click(function(e){
                if($("#add-nouveaune-form")[0].checkValidity()){
                    e.preventDefault();
                    $("#addNouveauneBtn").val('Veuillez patienter...');
                    $.ajax({
                        url:'assets/php/process.php',
                        method:'post',
                        data:$("#add-nouveaune-form").serialize()+'&action=add_nouveaune',
                        success:function(response){
                            $("#addNouveauneBtn").val('Ajouter Nouveau-né');
                            $("#add-nouveaune-form")[0].reset();
                            $("#addNouveauneModal").modal('hide');
                            Swal.fire({
                                title:'Nouveau-né ajouté avec succès !',
                                type:'success'
                            });
                            displayAllNouveaune();
                        }
                    });
                }
            });

            //Editer Nouveau-né par commune en Ajax request
            $("body").on("click",".editBtn", function(e){
                e.preventDefault();

                edit_id=$(this).attr('id');
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:{edit_id:edit_id},
                    success:function(response){
                        data=JSON.parse(response);
                        $("#id").val(data.id_naissance);
                        $("#ednom_nv_ne").val(data.nom_nv_ne);
                        $("#edpostnom_nv_ne").val(data.postnom_nv_ne);
                        $("#edprenom_nv_ne").val(data.prenom_nv_ne);
                        $("#edsexe").val(data.sexe);
                        $("#ednom_pere").val(data.nom_pere);
                        $("#ednom_mere").val(data.nom_mere);
                        $("#ednom_declarant").val(data.nom_declarant);
                        $("#edlieu_naissance").val(data.lieu_naissance);
                        $("#eddate_naissance").val(data.date_naissance);
                        $("#efrais_doc_id").val(data.frais_doc_id);
                    }
                });
            });

            //Modifier Nouveau-né par commune en Ajax Request
            $("#editNouveauneBtn").click(function(e){
                if($("#edit-nouveaune-form")[0].checkValidity()){
                    e.preventDefault();

                    $.ajax({
                        url:'assets/php/process.php',
                        method:'post',
                        data:$("#edit-nouveaune-form").serialize()+"&action=update_nouveaune",
                        success:function(response){
                            Swal.fire({
                                title:'Nouveau-né mise à jour avec succès !',
                                type:'success'
                            });
                            $("#edit-nouveaune-form")[0].reset();
                            $("#editNouveauneModal").modal('hide');
                            displayAllNouveaune();
                        }
                    });
                }
            });

            //Delete un nouveau-né par commune
            $("body").on("click", ".deleteBtn", function(e){
                e.preventDefault();

                del_id=$(this).attr('id');

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
                            data:{del_id:del_id},
                            success:function(response){
                                Swal.fire(
                                    'Supprimé Nouveau-né !',
                                    'Nouveau-né supprimé avec succès.',
                                    'success'
                                )
                                displayAllNouveaune();
                            }
                        });
                        
                    }
                })

            });

            //Afficher détail nouveau-né sélectionné en Ajax Request
            $("body").on("click", ".infoBtn", function(e){
                e.preventDefault();

                info_id=$(this).attr('id');

                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data: {info_id:info_id},
                    success:function(response){
                        data=JSON.parse(response);
                        Swal.fire({
                            title:'<strong>Nouveau-né : ID('+data.id_naissance+')</strong>',
                            type:'info',
                            html:'<b>Nom :</b>'+data.nom_nv_ne+'<br><br><b>Postnom :</b>'+data.postnom_nv_ne+'<br><br><b>Prénom :</b>'+data.prenom_nv_ne+'<br><br><b>Sexe :</b>'+data.sexe+'<br><br><b>Nom du Père :</b>'+data.nom_pere+'<br><br><b>Nom de la mère :</b>'+data.nom_mere+'<br><br><b>Nom déclarant :</b>'+data.nom_declarant+'<br><br><b>Lieu Naissance :</b>'+data.lieu_naissance+'<br><br><b>Date Naissance :</b>'+data.date_naissance+'<br><br><b>Date création :</b>'+data.date_create+'<br><br><b>Date mise à jour :</b>'+data.date_update,
                            showCloseButton:true,
                        });
                    }
                });

            });

            displayAllNouveaune();
            //Afficher tous les nouveau-nés pour la commune
            function displayAllNouveaune(){
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:{action:'display_nouveaunes'},
                    success:function(response){
                        $("#afficherNouveaune").html(response);
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
