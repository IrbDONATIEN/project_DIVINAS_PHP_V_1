<?php
    require_once 'assets/php/header.php';
?>
    <div class="container">
        <div class="alert alert-success alert-dismissible text-center mt-2 m-0">
            <div class="col-lg-16">
                <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-16">
                <div class="card rounded-0 mt-3 border-secondary">
                    <div class="card-header border-secondary">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#ListeNouveaune" class="nav-link active font-weight-bold" data-toggle="tab"><i class="fas fa-baby"></i>&nbsp;Liste des Nouveau-nés</a>
                            </li>
                            <li class="nav-item">
                                <a href="#ListeMariage" class="nav-link  font-weight-bold" data-toggle="tab"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;Liste des Mariages</a>
                            </li>
                            <li class="nav-item">
                                <a href="#ListeDeces" class="nav-link  font-weight-bold" data-toggle="tab"><i class="fas fa-user-slash"></i>&nbsp;Liste des Dèces</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!--Début de premier corps d'onglet-->
                            <div class="tab-pane container active " id="ListeNouveaune">
                               <?php if($ctypePrepose=='Prepose naissance'):?>
                                <div class="card-deck">
                                    <div class="table-responsive" id="showAllNouveaune">
                                        <p class="text-center align-self-center lead"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>&nbsp;&nbsp;Veuillez patienter...</p>
                                    </div>
                                </div>
                                <?php else:?>
                                    <h1 class="text-center text-secondary mt-5">Vous n'êtes autorisé à accéder à cette page !</h1>
                                <?php endif;?>
                            </div>
                            <!--Fin de premier corps d'onglet-->
                            <!--Début de deuxieme corps d'onglet-->
                            <div class="tab-pane container fade " id="ListeMariage">
                                <?php if($ctypePrepose=='Prepose mariage'):?>
                                <div class="card-deck">
                                    <div class="table-responsive" id="showAllMariages">
                                        <p class="text-center align-self-center lead"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>&nbsp;&nbsp;Veuillez patienter...</p>
                                    </div>
                                </div>
                                <?php else:?>
                                    <h1 class="text-center text-secondary mt-5">Vous n'êtes autorisé à accéder à cette page !</h1>
                                <?php endif;?>
                            </div>
                            <!--Fin de deuxieme corps d'onglet-->
                            <!--Début de troisième corps d'onglet-->
                            <div class="tab-pane container fade " id="ListeDeces">
                               <?php if($ctypePrepose=='Prepose deces'):?>
                                <div class="card-deck">
                                    <div class="table-responsive" id="showAllDeces">
                                        <p class="text-center align-self-center lead"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>&nbsp;&nbsp;Veuillez patienter...</p>
                                    </div>
                                </div>
                                <?php else:?>
                                    <h1 class="text-center text-secondary mt-5">Vous n'êtes autorisé à accéder à cette page !</h1>
                                <?php endif;?>
                            </div>
                            <!--Fin de troisième corps d'onglet-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

            displayAllNouveaune();
            //Afficher tous les nouveau-nés pour la commune
            function displayAllNouveaune(){
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:{action:'display_nouveaune'},
                    success:function(response){
                        $("#showAllNouveaune").html(response);
                        $("table").DataTable({
                            order:[0,'desc']
                        });
                    }
                });
            }

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

        //Afficher voir  Acte de mariage en Ajax Request
        $("body").on("click", ".acteMariageDetailsDoc", function(e){
            e.preventDefault();
                detail_mariage_id=$(this).attr('id');
                $.ajax({
                    url: 'assets/php/process.php',
                    type:'post',
                    data:{detail_mariage_id:detail_mariage_id},
                    success:function(response){
                        data=JSON.parse(response);
                        console.log(data);
                        window.location = 'documentPropose.php?id='+detail_mariage_id;
                    }
                });
        });

            displayAllMariages();
            //Afficher tous les mariages pour la commune
            function displayAllMariages(){
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:{action:'displayAllMariages'},
                    success:function(response){
                        $("#showAllMariages").html(response);
                        $("table").DataTable({
                            order:[0,'desc']
                        });
                    }
                });
            }


        //Fetch All défunts Ajax Request
        fetchAllDefunt();

        function fetchAllDefunt(){
            $.ajax({
                url:'assets/php/process.php',
                method: 'post',
                data:{action: 'fetchAllDefunt'},
                success:function(response){
                    $("#showAllDeces").html(response);
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