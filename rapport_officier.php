<?php
    require_once 'assets/php/headerOfficier.php';
?>
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) dans la commune de <?=$commune;?>&nbsp;Officier:<?=$nomOfficier;?></strong>
                </div>
                <h4 class="text-center text-primary mt-2">Vous pouvez voir les rapports des mariages pour cette commune!</h4>
            </div>
        </div>
        <div class="card border-success mt-2">
            <h5 class="card-header bg-success d-flex justify-content-between">
                <span class="text-light lead align-self-center">Tous les rapports des mariages</span>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="showAllMariages">
                    <p class="text-center lead mt-5">Veuillez patienter...</p>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        //Afficher détail Acte de mariage en Ajax Request
        $("body").on("click", ".acteMariageDetailsIcon", function(e){
                e.preventDefault();
                detail_mariage_id=$(this).attr('id');
                $.ajax({
                    url: 'assets/php/officier-process.php',
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
                    url: 'assets/php/officier-process.php',
                    type:'post',
                    data:{detail_mariage_id:detail_mariage_id},
                    success:function(response){
                        data=JSON.parse(response);
                        console.log(data);
                        window.location = 'documentOff.php?id='+detail_mariage_id;
                    }
                });
        });

        displayAllMariages();
        //Afficher tous les mariages pour la commune
        function displayAllMariages(){
                $.ajax({
                    url:'assets/php/officier-process.php',
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
    });
</script>
</body>
</html>
