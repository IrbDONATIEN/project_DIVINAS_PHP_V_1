<?php
    require_once 'assets/php/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
            </div>
            <h4 class="text-center text-black mt-2">Enregistrer vos frais des documents pour les voir prochainement !</h4>
            </div>
        </div>
        <div class="card border-secondary mt-2">
            <h5 class="card-header bg-secondary d-flex justify-content-between">
                <span class="text-light lead align-self-center"><i class="fas fa-comment"></i>&nbsp;Tous les frais documents</span>
                <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addFraisDocumentModal"><i class="fas fa-comment"></i>&nbsp;Ajouter Frais Documents</a>
            </h5>
        <div class="card-body">
            <div class="table-responsive" id="afficherFraisDoc">
                <p class="text-center lead mt-5">Veuillez patienter...</p>
            </div>
        </div>
    </div>
</div>

<!--Début d'Ajout Frais document-->
<div class="modal fade" id="addFraisDocumentModal">
    <div class="modal-dialog modal-dialog-justify">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title text-light"><i class="fas fa-comment"></i>&nbsp;Ajouter Frais Document</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form  action="#" method="post" id="add-fraisdocument-form" class="px-3">
                    <div class="form-group">
                        <input type="text" name="nomme" id="nomme" class="form-control form-control-lg" placeholder="Entrer nom demandeur" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="montant" id="montant" class="form-control form-control-lg" placeholder="Entrer montant document" required>
                    </div>
                    <div class="form-group">
                        <select name="typeFrais" id="typeFrais" class="form-control form-control-lg">
                            <option value="" disabled>Sélectionner Type Frais</option>
                            <option value="Frais Naissance" required>Frais Naissance</option>
                            <option value="Frais Mariage" required>Frais Mariage</option>
                            <option value="Frais Deces" required>Frais Dèces</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="addFraisDoc" class="btn btn-secondary btn-block btn-lg" id="addFraisDocumentBtn" value="Ajouter Frais document" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Fin d'Ajout Frais document-->
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

        //Ajouter Frais Documents Ajax Request
        $("#addFraisDocumentBtn").click(function(e){
            if($("#add-fraisdocument-form")[0].checkValidity()){
                e.preventDefault();
                $("#addNouveauneBtn").val('Veuillez patienter...');
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:$("#add-fraisdocument-form").serialize()+'&action=add_fraisdoc',
                    success:function(response){
                        $("#addFraisDocumentBtn").val('Ajouter Frais document');
                        $("#add-fraisdocument-form")[0].reset();
                        $("#addFraisDocumentModal").modal('hide');
                        Swal.fire({
                            title:'Frais Document ajouté avec succès !',
                            type:'success'
                        });
                        displayAllFraisDoc();
                    }
                });
            }
        });

        //Delete Frais document par commune
        $("body").on("click", ".deleteFraisDocBtn", function(e){
            e.preventDefault();

            del_frais_id=$(this).attr('id');

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
                            data:{del_frais_id:del_frais_id},
                            success:function(response){
                                Swal.fire(
                                    'Supprimé Frais Document !',
                                    'Frais Document supprimé avec succès.',
                                    'success'
                                )
                                displayAllFraisDoc();
                            }
                        });
                        
                    }
                })

        });

        displayAllFraisDoc();
        //Afficher tous les frais des documents pour la commune
        function displayAllFraisDoc(){
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{action:'display_frais_doc'},
                success:function(response){
                    $("#afficherFraisDoc").html(response);
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