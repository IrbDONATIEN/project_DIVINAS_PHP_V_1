<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connexion.php';
    //Création code Acte
    $mois = (int)(date("m"));
    $sec1 = date("s");
    $sec2 = (int)(date("s"));
    $code1 = $mois+$sec2 + $sec1+$sec2;
    $code2 = $code1 +$sec1+$sec2 + $mois;  
    $numero_projet= $code1.''.$code2 ;
?>

<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
                </div>
        <?php if($ctypePrepose=='Prepose mariage'):?>
                <h4 class="text-center text-black mt-2">Enregistrer vos projets des mariages pour les voir prochainement !</h4>
            </div>
        </div>
        <div class="card border-success mt-2">
            <h5 class="card-header bg-success d-flex justify-content-between">
                <span class="text-light lead align-self-center"><i class="fa fa-calendar"></i>&nbsp;Tous les projets des mariages</span>
                    <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addProjetMariageModal"><i class="fa fa-calendar"></i>&nbsp;Ajouter Projet Mariage</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="afficherProjetMariage">
                    <p class="text-center lead mt-5">Veuillez patienter...</p>
                </div>
            </div>
        </div>
</div>

    <!--Début d'Ajout projet mariage-->
    <div class="modal fade" id="addProjetMariageModal">
            <div class="modal-dialog modal-dialog-justify">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light"><i class="fa fa-calendar"></i>&nbsp;Ajouter Projet Mariage</h4>
                        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  action="#" method="post" id="add-projetmariage-form" class="px-3" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="numero_projet" id="numero_projet" value="<?php echo $numero_projet;?>">
                                <input type="text" name="nom_Epoux" id="nom_Epoux" class="form-control form-control-lg" placeholder="Entrer nom de l'époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lieu_naissance_epoux" id="lieu_naissance_epoux" class="form-control form-control-lg" placeholder="Entrer lieu naissance époux" required>
                            </div>
                            <div class="form-group">
                                <label for="date_naissance_epoux">Séléctionner date naissance époux :</label>
                                <input type="date" name="date_naissance_epoux" id="date_naissance_epoux" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_pere_epoux" id="nom_pere_epoux" class="form-control form-control-lg" placeholder="Entrer nom père époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_mere_epoux" id="nom_mere_epoux" class="form-control form-control-lg" placeholder="Entrer nom mère époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="province_epoux" id="province_epoux" class="form-control form-control-lg" placeholder="Entrer province époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="territoire_epoux" id="territoire_epoux" class="form-control form-control-lg" placeholder="Entrer territoire époux" required>
                            </div>
                            <div class="form-group">
                                <label for="photoEpoux"> Séléctionner photo époux</label>
                                <input type="file" name="photoEpoux" id="photoEpoux" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_Epouse" id="nom_Epouse" class="form-control form-control-lg" placeholder="Entrer nom de l'épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lieu_naissance_epouse" id="lieu_naissance_epouse" class="form-control form-control-lg" placeholder="Entrer lieu naissance épouse" required>
                            </div>
                            <div class="form-group">
                                <label for="date_naissance_epouse">Séléctionner date naissance épouse :</label>
                                <input type="date" name="date_naissance_epouse" id="date_naissance_epouse" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_pere_epouse" id="nom_pere_epouse" class="form-control form-control-lg" placeholder="Entrer nom père épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_mere_epouse" id="nom_mere_epouse" class="form-control form-control-lg" placeholder="Entrer nom mère épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="province_epouse" id="province_epouse" class="form-control form-control-lg" placeholder="Entrer province épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="territoire_epouse" id="territoire_epouse" class="form-control form-control-lg" placeholder="Entrer territoire épouse" required>
                            </div>
                            <div class="form-group">
                                <label for="photoEpouse"> Séléctionner photo épouse</label>
                                <input type="file" name="photoEpouse" id="photoEpouse" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <label for="regime_matrimoniaux">Séléctionner les régimes matrimoniaux :</label>
                                <select name="regime_matrimoniaux" id="regime_matrimoniaux" class="form-control form-control-lg">
                                    <option value="" disabled>Séléctionner régime matrimoniaux</option>
                                    <option value="seperation des biens" required>Séparation des biens</option>
                                    <option value="communaute reduite aux acquets" required>Communauté réduite aux acquêts</option>
                                    <option value="communaute universelle des biens" required>Communauté universelle des biens</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_celebration">Séléctionner date célébration mariage :</label>
                                <input type="date" name="date_celebration" id="date_celebration" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_temoin" id="nom_temoin" class="form-control form-control-lg" placeholder="Entrer nom témoin" required>
                            </div>
                            <div class="form-group">
                                <label for="frais_document_id">Sélectionner Type Frais Document et Nommé :</label>
                                <select name="frais_document_id" id="frais_document_id" class="form-control form-control-lg" required>
                                    <?php $req=$db->query("SELECT * FROM frais_mariage WHERE communee_id='".$data['idcommune']."'");
                                        while ($tab=$req->fetch()){?>
                                        <option value="<?php echo $tab['id_Frais'];?>"><?php echo $tab['typeFrais'];?>&nbsp;|&nbsp;<?php echo $tab['nomme'];?></option>
                                        <?php
                                            }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addProjetMariage" class="btn btn-success btn-block btn-lg" id="addProjetMariageBtn" value="Ajouter Projet Mariage" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin d'Ajout projet mariage-->

    <!--Début d'édition projet mariage-->
    <div class="modal fade" id="editProjetMariageModal">
            <div class="modal-dialog modal-dialog-justify">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h4 class="modal-title text-light"><i class="fas fa-edit fa-lg"></i></a>&nbsp;Editer Projet Mariage</h4>
                        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  action="#" method="post" id="edit-projetmariage-form" class="px-3" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_projet" id="id_projet">
                                <input type="hidden" name="enumero_projet" id="enumero_projet">
                                <input type="text" name="enom_Epoux" id="enom_Epoux" class="form-control form-control-lg" placeholder="Entrer nom de l'époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="elieu_naissance_epoux" id="elieu_naissance_epoux" class="form-control form-control-lg" placeholder="Entrer lieu naissance époux" required>
                            </div>
                            <div class="form-group">
                                <label for="edate_naissance_epoux">Séléctionner date naissance époux :</label>
                                <input type="date" name="edate_naissance_epoux" id="edate_naissance_epoux" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_pere_epoux" id="enom_pere_epoux" class="form-control form-control-lg" placeholder="Entrer nom père époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_mere_epoux" id="enom_mere_epoux" class="form-control form-control-lg" placeholder="Entrer nom mère époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="eprovince_epoux" id="eprovince_epoux" class="form-control form-control-lg" placeholder="Entrer province époux" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="eterritoire_epoux" id="eterritoire_epoux" class="form-control form-control-lg" placeholder="Entrer territoire époux" required>
                            </div>
                            <div class="form-group">
                                <label for="ephotoEpoux"> Séléctionner photo époux</label>
                                <input type="file" name="ephotoEpoux" id="ephotoEpoux" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_Epouse" id="enom_Epouse" class="form-control form-control-lg" placeholder="Entrer nom de l'épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="elieu_naissance_epouse" id="elieu_naissance_epouse" class="form-control form-control-lg" placeholder="Entrer lieu naissance épouse" required>
                            </div>
                            <div class="form-group">
                                <label for="edate_naissance_epouse">Séléctionner date naissance épouse :</label>
                                <input type="date" name="edate_naissance_epouse" id="edate_naissance_epouse" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_pere_epouse" id="enom_pere_epouse" class="form-control form-control-lg" placeholder="Entrer nom père épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_mere_epouse" id="enom_mere_epouse" class="form-control form-control-lg" placeholder="Entrer nom mère épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="eprovince_epouse" id="eprovince_epouse" class="form-control form-control-lg" placeholder="Entrer province épouse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="eterritoire_epouse" id="eterritoire_epouse" class="form-control form-control-lg" placeholder="Entrer territoire épouse" required>
                            </div>
                            <div class="form-group">
                                <label for="ephotoEpouse"> Séléctionner photo épouse</label>
                                <input type="file" name="ephotoEpouse" id="ephotoEpouse" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <label for="eregime_matrimoniaux">Séléctionner les régimes matrimoniaux :</label>
                                <select name="eregime_matrimoniaux" id="eregime_matrimoniaux" class="form-control form-control-lg">
                                    <option value="" disabled>Séléctionner régime matrimoniaux</option>
                                    <option value="seperation des biens" required>Séparation des biens</option>
                                    <option value="communaute reduite aux acquets" required>Communauté réduite aux acquêts</option>
                                    <option value="communaute universelle des biens" required>Communauté universelle des biens</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edate_celebration">Séléctionner date célébration mariage :</label>
                                <input type="date" name="edate_celebration" id="edate_celebration" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enom_temoin" id="enom_temoin" class="form-control form-control-lg" placeholder="Entrer nom témoin" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="editProjetMariage" class="btn btn-secondary btn-block btn-lg" id="editProjetMariageBtn" value="Editer Projet Mariage" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin d'édition projet mariage-->


    <!-- Début Affichage de détail des projets mariages avec formulaire Modal-->
    <div class="modal fade" id="showProjetDetailsModal">
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
                                <p id="getPereEpoux"></p>
                                <p id="getMereEpoux"></p>
                                <p id="getPereEpouse"></p>
                                <p id="getMereEpouse"></p>
                                <p id="getRegime"></p>
                                <p id="getCelebration"></p>
                                <p id="getTemoin"></p>
                                <p id="getDateCreate"></p>
                                <p id="getDateUpdate"></p>
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
    <!--Fin Affichage de détail des projets mariages avec formulaire Modal-->
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

        //Ajouter Projet mariage Ajax Request
        $("#add-projetmariage-form").submit(function(e){
             e.preventDefault();

             $.ajax({
                url:'assets/php/process.php',
                method:'post',
                processData:false,
                contentType:false,
                cache:false,
                data:new FormData(this),
                success:function(response){
                    //location.reload();
                    $("#add-projetmariage-form")[0].reset();
                    $("#addProjetMariageModal").modal('hide');
                    Swal.fire({
                        title:'Projet mariage ajouté avec succès !',
                        type:'success'
                    });
                    fetchAllProjetMariages();
                }
            });
        });
        
        //Afficher détail du projet mariage en Ajax Request
        $("body").on("click", ".projetDetailsIcon", function(e){
            e.preventDefault();
            detail_projet_id=$(this).attr('id');
            $.ajax({
                url: 'assets/php/process.php',
                type:'post',
                data:{detail_projet_id:detail_projet_id},
                success:function(response){
                    data=JSON.parse(response);
                    $("#getEpoux").text('Epoux:'+data.nom_Epoux+' & Epouse: '+data.nom_Epouse+'  '+'(ID:'+data.id_projet_mariage+')');
                    $("#getNum").text('N°:'+data.numero_projet);
                    $("#getPereEpoux").text('Père Epoux:'+data.nom_pere_epoux);
                    $("#getMereEpoux").text('Mère Epoux:'+data.nom_mere_epoux);
                    $("#getPereEpouse").text('Père Epouse:'+data.nom_pere_epouse);
                    $("#getMereEpouse").text('Mère Epouse:'+data.nom_mere_epouse);
                    $("#getRegime").text('Régime matrimoniaux:'+data.regime_matrimoniaux);
                    $("#getCelebration").text('Date Célébration:'+data.date_celebration);
                    $("#getTemoin").text('Témoin:'+data.nom_temoin);
                    $("#getDateCreate").text('Date publication:'+data.created_at);
                    $("#getDateUpdate").text('Date mise à jour:'+data.update_date);
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

     //Delete projet mariage par commune Ajax Request
     $("body").on("click", ".deleteProjetIcon", function(e){
                e.preventDefault();
                del_projet_id=$(this).attr('id');

                Swal.fire({
                    title:'Etes-vous sûr de supprimer ?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimez-le!'
                }).then((result)=>{
                    if(result.value){
                        $.ajax({
                            url:'assets/php/process.php',
                            method: 'post',
                            data:{del_projet_id:del_projet_id},
                            success:function(response){
                                Swal.fire(
                                    'Supprimé Projet Mariage!',
                                    'Projet Mariage supprimé avec succès.',
                                    'success'
                                )
                                fetchAllProjetMariages();
                            }
                        });
                    }
                })
            });

        //Fetch All projet_mariage Ajax Request
        fetchAllProjetMariages();

        function fetchAllProjetMariages(){
            $.ajax({
                url:'assets/php/process.php',
                method: 'post',
                data:{action: 'fetchAllProjetMariages'},
                success:function(response){
                    $("#afficherProjetMariage").html(response);
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