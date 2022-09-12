<?php
    require_once 'assets/php/headerOfficier.php';

    require_once 'assets/php/voirmariage.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
           <a href="" class="nepaimprimer" onclick="window.print();">Imprimer</a>
        </div>
        <div class="ml-auto">
            <img src="assets/php/<?=$vphotoEpoux; ?>" alt="Photo Epoux" class="mb-0 float-left mt-1" width="190px" height="190px" id="getPhoto">&nbsp;&nbsp;
            <img src="assets/php/<?=$vphotoEpouse; ?>" alt="Photo Epouse" class="mb-0 float-right mt-1"  width="190px" height="190px" id="getPhotoF">
        </div>
        <div class="section-headline text-justify">
                <p align="left">
                <h4><B>REPUBLIQUE DEMOCRATIQUE DU CONGO</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N°:<?=$vid;?><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/images/lubumbashilogo.jpg" width="20%" height="3%" style="border-radius: 5%;"><br>
                    VILLE DE LUBUMBASHI <br>
                    Commune de: <?=$vcommune;?> <br>
                    Acte n°:<?=$vnum;?> <br>
                    Volume :.......
                </h4> 
                </p> 
        </div>
    </div>
    <div class="section-headline text-center">
        <h1 class="nepaimprimer"><center><B><U>ACTE DE MARIAGE</B></U></center></h1><br>
    </div>
    <div class="section-headline text-justify">
    <p align="left">
        L'an deux mille <?=$vannee;?> &nbsp;&nbsp;le &nbsp;<?=$vjour;?>&nbsp;&nbsp;&nbsp;jour du mois de (d')..................à..............heures.....................
        Par devant nous, <?=$vofficier;?> Officier de l'état civil de la commune <?=$vcommune;?> ont comparu en séance publique:<br>
        Le nommé <?=$vnom_Epoux;?> né à <?=$vlieu_naissance_epoux;?> le <?=$vdate_naissance_epoux;?> état civil <?=$vetat_civil_epoux;?> 
        profession <?=$vprofession_epoux;?> résidant à <?=$vresidant_epoux;?> fils de <?=$vnom_pere_epoux;?>profession..................
        .......résidant à...............et de <?=$vnom_mere_epoux;?> profession.....................résidant à......................<br>
        Et La nommée <?=$vnom_Epouse;?> née à <?=$vlieu_naissance_epouse;?> le <?=$vdate_naissance_epouse;?>
        état civil <?=$vetat_civil_epouse;?> profession <?=$vprofession_epouse;?> résidant à <?=$vresidant_epouse;?>
        fille de <?=$vnom_pere_epouse;?> profession.....................résidant
        à.......................................... et de <?=$vnom_mere_epoux;?> profession......................résidant à................................................
        Lesquels nous ont requis de procéder à la célébration du mariage projeté entre eux et dont nous avons publié
        le projet conformément aux prescriptions de l'article 384 de la loi n°087/010 du 1er août 1987, par voie de
        proclammation ou d'affichage faite en date du <?=$vdate_celebration;?>et nous ont produit à cet effet:..........................<br>
        La dot composée de <?=$vdote_composee;?>...............................................................
        a été versée et reçue par........................................âgé(e) de.........................résidant à .................................
        Les époux ont choisi le régime matrimonial de <?=$vRegime;?>......................................................
        Faisant droit à leur réquisition, après avoir donné le lecture au futur et à la future des pièces relatives à leur
        état et les avoir instruits des droits et des devoirs respectifs des époux, leur avons demandé s'ils veulent se 
        prendre pour mari et pour femme, chacun d'eux ayant répondu séparément et affirmativement, prononçons
        qu'ils sont unis légalement par le mariage.<br>
        En foi de qui précède, nous avons dressé le présent acte en présence de
        ............................âgé(e) de...................ans, résidant à 
        ........................................................................
        profession......................et de...................................
        âgé(e) de.......................ans, résidant à.........................
        .................................profession.............................
        et après que connaissance en a été donné aux parties et aux témoins, nous l'avons signé avec eux.<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>L'Officier de l'état civil</u><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?=$vofficier;?></b><br>
    </p>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
</body>
</html>