<?php
    require_once 'assets/php/header.php';

    require_once 'assets/php/voirActeDeces.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
           <a href="" class="nepaimprimer" onclick="window.print();">Imprimer</a>
        </div>
        <div class="section-headline text-justify">
                <p align="left">
                <h4><B>REPUBLIQUE DEMOCRATIQUE DU CONGO</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N°:<?=$vid;?><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/images/lubumbashilogo.jpg" width="20%" height="3%" style="border-radius: 5%;"><br>
                    VILLE DE LUBUMBASHI <br>
                    Commune de: <?=$vcommune;?> <br>
                    Bureau principal de l'Etat civil de la commune <?=$vcommune;?><br>
                    Bureau secondaire de l'Etat civil de..............................<br>
                    Acte n°:<?=$vacte_deces_num;?>/..... <br>
                    Volume :<?=$vvolume_acte;?> Folio <?=$vfolio_acte;?>
                </h4> 
                </p> 
        </div>
    </div>
    <div class="section-headline text-center">
        <h1 class="nepaimprimer"><center><B><U>ACTE DE DECES</B></U></center></h1><br>
    </div>
    <div class="section-headline text-justify">
        <p>
            L'an deux mille <?=$vannee_acte;?>  le <?=$vjour_acte;?> jour du mois de (d').........................
            Par devant nous <?=$vnomOfficier;?> Officier de l'état civil de la commune <?=$vcommune;?> à LUBUMBASHI a comparu 
            Le (la) nommé(e) <?=$vnom_defunt;?> &nbsp;<?=$vpostnom_defunt;?>&nbsp;<?=$vprenom_defunt;?> né(e) à <?=$vlieu_naissance;?> le ..................................
            profession <?=$vprofession_deces;?> Lequel (laquelle) nous a déclaré ce qui suit:<br>
            Le..................................jour du mois de..........................à ...............heure.Est décédé(e) à LUBUMBASHI.<br>
            Le(la) nommé(e) <?=$vnom_defunt;?>&nbsp;<?=$vpostnom_defunt;?>&nbsp;<?=$vprenom_defunt;?> &nbsp;Fils (fille) de <?=$vnom_pere;?> de nationalité <?=$vnationalite_deces;?> 
            de profession <?= $vprofession_deces;?> domicilié(résidant) à <?=$vresidant_deces;?>
            Et de <?= $vnom_mere;?> de nationalité <?=$vnationalite_deces;?> domiciliée à .........................................
            <br>Le (la) défunt(e) était <?=$vnom_defunt;?> à ...............................
            Etait né(e) à <?=$vdate_naissance;?> le ..........................jour du mois de (d')................................
            de l'an ........................adresse <?=$vadresse_defunt;?> profession <?=$vprofession_deces;?>.
            <br>Les pièces suivantes ont été présentées par le comparant <?=$vnom_comparant;?> .............................................
            ...................................................................................................en foi de quoi nous avons dressé le présent actes, et, après que connaissance en a été donnée au comparant, nous l'avons signé avec lui.
            Langue que nous connaissons ou intreprête.<br><br>
            Signature du comparant:<br>
            (S)....................<br>
            *Biffer la mention inutile.<br>

            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L'Officier de l'Etat civil<br>  
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?=$vnomOfficier;?></b>
        </p>
    </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
</body>
</html>