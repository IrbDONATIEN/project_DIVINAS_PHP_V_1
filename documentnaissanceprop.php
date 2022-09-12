<?php
    require_once 'assets/php/header.php';

    require_once 'assets/php/voirNaissance.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
           <a href="" class="nepaimprimer" onclick="window.print();">Imprimer</a>
        </div>
        <div class="section-headline text-justify">
                <p align="left">
                <h4><B>République Démocratique du Congo</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N°:<?=$vid;?><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/images/rdclogo.jpg" width="20%" height="3%" style="border-radius: 5%;"><br>
                    Province du HAUT-KATANGA<br>
                    Ville de LUBUMBASHI <br>
                    District de..................<br>
                    Territoire/Commune de :<?=$vcommune;?><br>
                    Chefferie/Secteur ou Cite de:................ <br>
                    Bureau Principal de l'Etat civil de la commune <?=$vcommune;?><br>
                    Bureau Secondaire de l'Etat civil:.............<br>
                    Acte n°:<?=$vcodeAct;?> &nbsp;Volume :<?=$vvolume;?>&nbsp;Folio n°:<?=$vfolio;?><br>
                </h4> 
                </p> 
        </div>
    </div>
    <div class="section-headline text-center mt-2">
        <h1 class="nepaimprimer"><center><B><U>ACTE DE NAISSANCE</B></U></center></h1><br>
    </div>
    <div class="section-headline text-justify mt-2">
        <p class="text-justify">
            L'an deux mille.....................le.....................jour du mois de............... à..............heures.
            Par devant nous <?=$vnomOfficier;?> Officier de l'Etat civil de la commune <?=$vcommune;?>. A comparu <?=$vnom_pere;?> en qualité de ........
            <br>Né (e) à ......................le....................... profession <?=$vprofessionpere;?> Résident <?=$vresident;?>.
            Lequel (laquelle) nous a déclaré ce qui suit......................Le ....................jour du mois de...................de l'année ..........
            est né à <?=$vlieu_naissance;?> un enfant de sexe <?=$vsexe;?> nommé(e) <?=$vnom_nv_ne;?>&nbsp;<?=$vpostnom_nv_ne;?>&nbsp;<?=$vprenom_nv_ne;?>
            fils (fille) de <?=$vnom_pere;?> né à .................... le ....................nationalité <?=$vnationalite;?> profession <?=$vprofessionpere;?> à résident à LUBUMBASHI et de <?=$vnom_mere;?> 
            né(e) à ........................le ..................nationalité.................profession............................
            résidants à LUBUMBASHI C/<?=$vcommune;?>conjoints.<br>
            Lecture de l'acte a été faite ou connaissance de l'acte a été donnée ou traduction de l'acte a été faite en <?=$vlangue;?> langue que nous connaissons ou par................interpréte ayant prêté serment.<br>
            En foi de quoi, avons dressé le présent acte.<br>
            
            <br>Le déclarant <?=$vnom_declarant;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L'Officier de l'Etat civil<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?=$vnomOfficier;?></b><br>
            <br>(*) Préciser le nom et qualité
            <br>(*)Offet les marations initaires
        </p>
    </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
</body>
</html>

