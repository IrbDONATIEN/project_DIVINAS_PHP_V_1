<?php
    require_once 'assets/php/headerOfficier.php';
?>
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-primary alert-dismissible text-center mt-2 m-0">
                    <strong>Bienvenu(e) dans la commune de <?=$commune;?>&nbsp;Officier:<?=$nomOfficier;?></strong>
                </div>
                <h4 class="text-center text-primary mt-2">Vous pouvez voir les rapports des nouveau-nés pour cette commune!</h4>
            </div>
        </div>
        <div class="card border-success mt-2">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center">Tous les rapports des nouveau-nés</span>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="showAllNaissances">
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
        displayAllNaissances();
            //Afficher tous les actes naissances pour toutes les communes
            function displayAllNaissances(){
                $.ajax({
                    url:'assets/php/officier-process.php',
                    method:'post',
                    data:{action:'displayAllNaissances'},
                    success:function(response){
                        $("#showAllNaissances").html(response);
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
