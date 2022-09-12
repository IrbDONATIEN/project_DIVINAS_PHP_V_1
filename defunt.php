<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connexion.php';
?>
  
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-secondary alert-dismissible text-center mt-2 m-0">
                <strong>Bienvenu(e) dans la commune de <?=$cCommune;?></strong>
            </div>
        <?php if($ctypePrepose=='Prepose deces'):?>
                <h4 class="text-center text-black mt-2">Enregistrer vos défunts pour les voir prochainement !</h4>
            </div>
        </div>
        <div class="card border-secondary mt-2">
            <h5 class="card-header bg-secondary d-flex justify-content-between">
            <span class="text-light lead align-self-center"><i class="fas fa-user-slash"></i>&nbsp;Tous les défunts</span>
            <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addDefuntModal"><i class="fas fa-user-slash"></i>&nbsp;Ajouter Défunt</a>
            </h5>
        <div class="card-body">
        <div class="table-responsive" id="afficherDefunt">
            <p class="text-center lead mt-5">Veuillez patienter...</p>
        </div>
        </div>
    </div>
</div>

<!--Début d'Ajout défunt -->
<div class="modal fade" id="addDefuntModal">
    <div class="modal-dialog modal-dialog-justify">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title text-light"><i class="fas fa-user-slash"></i>&nbsp;Ajouter Défunt</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form  action="#" method="post" id="add-defunt-form" class="px-3">
            <div class="form-group">
                <input type="text" name="nom_defunt" id="nom_defunt" class="form-control form-control-lg" placeholder="Entrer nom du défunt " required>
            </div>
            <div class="form-group">
                <input type="text" name="postnom_defunt" id="postnom_defunt" class="form-control form-control-lg" placeholder="Entrer postnom défunt" required>
            </div>
            <div class="form-group">
                <input type="text" name="prenom_defunt" id="prenom_defunt" class="form-control form-control-lg" placeholder="Entrer prénom défunt" required>
            </div>
            <div class="form-group">
                <label for="sexe_defunt">Séléctionner sexe défunt:</label>
                <select name="sexe_defunt" id="sexe_defunt" class="form-control form-control-lg">
                    <option value="" disabled>Séléctionner sexe défunt</option>
                    <option value="Masculin" required>Masculin</option>
                    <option value="Feminin" required>Féminin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="nom_pere" id="nom_pere" class="form-control form-control-lg" placeholder="Entrer nom père défunt" required>
            </div>
            <div class="form-group">
                <input type="text" name="nom_mere" id="nom_mere" class="form-control form-control-lg" placeholder="Entrer nom mère défunt" required>
            </div>
            <div class="form-group">
                <input type="text" name="nom_comparant" id="nom_comparant" class="form-control form-control-lg" placeholder="Entrer nom comparant" required>
            </div>
            <div class="form-group">
                <label for="date_deces">Séléctionner date de décès:</label>
                <input type="date" name="date_deces" id="date_deces" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
                <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control form-control-lg" placeholder="Entrer lieu naissance défunt" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Séléctionner date de naissance défunt:</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
                <input type="text" name="adresse_defunt" id="adresse_defunt" class="form-control form-control-lg" placeholder="Entrer adresse domicile de défunt" required>
            </div>
            <div class="form-group">
                <label for="frais_ID">Sélectionner Type Frais Document et Nommé :</label>
                <select name="frais_ID" id="frais_ID" class="form-control form-control-lg" required>
                    <?php $req=$db->query("SELECT * FROM frais_mariage WHERE communee_id='".$data['idcommune']."'");
                        while ($tab=$req->fetch()){?>
                             <option value="<?php echo $tab['id_Frais'];?>"><?php echo $tab['typeFrais'];?>&nbsp;|&nbsp;<?php echo $tab['nomme'];?></option>
                        <?php
                           }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="addDefunt" class="btn btn-secondary btn-block btn-lg" id="addDefuntBtn" value="Ajouter Défunt" >
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
        
        //Ajouter Défunt Ajax Request
        $("#addDefuntBtn").click(function(e){
            if($("#add-defunt-form")[0].checkValidity()){
                e.preventDefault();
                $("#addDefuntBtn").val('Veuillez patienter...');
                $.ajax({
                    url:'assets/php/process.php',
                    method:'post',
                    data:$("#add-defunt-form").serialize()+'&action=add_defunt',
                    success:function(response){
                        $("#addDefuntBtn").val('Ajouter Défunt');
                        $("#add-defunt-form")[0].reset();
                        $("#addDefuntModal").modal('hide');
                        Swal.fire({
                            title:'Défunt ajouté avec succès !',
                            type:'success'
                        });
                        fetchAllDefunts();
                    }
                });
            }
        });

        //Delete Défunt par commune
        $("body").on("click", ".deleteDefuntBtn", function(e){
            e.preventDefault();

            del_defunt_id=$(this).attr('id');

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
                            data:{del_defunt_id:del_defunt_id},
                            success:function(response){
                                Swal.fire(
                                    'Supprimé Défunt Document !',
                                    'Défunt supprimé avec succès.',
                                    'success'
                                )
                                fetchAllDefunts();
                            }
                        });
                        
                    }
                })

        });

        //Fetch All défunts Ajax Request
        fetchAllDefunts();

        function fetchAllDefunts(){
            $.ajax({
                url:'assets/php/process.php',
                method: 'post',
                data:{action: 'fetchAllDefunts'},
                success:function(response){
                    $("#afficherDefunt").html(response);
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