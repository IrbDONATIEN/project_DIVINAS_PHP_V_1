<?php
    require_once 'assets/php/headerAdmin.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-secondary alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) à la <?=$service;?> &nbsp; - N° Matricule est: <?=$matricule;?>&nbsp; - Nom: <?=$nomAgent;?></strong>
                </div>
                <h4 class="text-center text-primary mt-2">Vous pouvez voir tous les rapports des décès pour toutes les communes!</h4>
            </div>
        </div>
        <div class="card border-secondary mt-2">
            <h5 class="card-header bg-secondary d-flex justify-content-between">
                <span class="text-light lead align-self-center">Tous les rapports des décès</span>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="afficherDeces">
                    <p class="text-center lead mt-5">Veuillez patienter...</p>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            displayAllActeDeces();
            //Afficher tous les actes des décès pour toutes les communes
            function displayAllActeDeces(){
                $.ajax({
                    url:'assets/php/admin-process.php',
                    method:'post',
                    data:{action:'displayAllActeDeces'},
                    success:function(response){
                        $("#afficherDeces").html(response);
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