<?php
	require_once 'connexions.php';

	//Preparation d'affichage de details des informations provenant de la base de données
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query="SELECT idActeNais,codeAct,volume,folio,profession,nationalite,professionpere,resident,langue,officier_id,officier.nomOfficier,commune_id,commune.commune,nouveaune_id,nouveau_ne.nom_nv_ne,nouveau_ne.postnom_nv_ne,nouveau_ne.prenom_nv_ne,nouveau_ne.sexe,nouveau_ne.nom_pere,nouveau_ne.nom_mere,nouveau_ne.nom_declarant,nouveau_ne.lieu_naissance,nouveau_ne.date_naissance,create_date,update_date FROM acte_de_naissance INNER JOIN officier ON officier.idOfficier=acte_de_naissance.officier_id INNER JOIN commune ON commune.id=acte_de_naissance.commune_id INNER JOIN nouveau_ne ON nouveau_ne.id_naissance=acte_de_naissance.nouveaune_id WHERE acte_de_naissance.idActeNais=?";
		$stmt=$dbb->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['idActeNais'];
		$vcodeAct=$row['codeAct'];
		$vvolume=$row['volume'];
		$vfolio=$row['folio'];
		$vprofession=$row['profession'];
		$vnationalite=$row['nationalite'];
        $vprofessionpere=$row['professionpere'];
        
		$vresident=$row['resident'];
		$vlangue=$row['langue'];
        $vnomOfficier=$row['nomOfficier'];
		$vcommune=$row['commune'];
		$vnom_nv_ne=$row['nom_nv_ne'];
        $vpostnom_nv_ne=$row['postnom_nv_ne'];
        $vprenom_nv_ne=$row['prenom_nv_ne'];
        $vsexe=$row['sexe'];
        $vnom_pere=$row['nom_pere'];
        $vnom_mere=$row['nom_mere'];
        $vnom_declarant=$row['nom_declarant'];
        $vlieu_naissance=$row['lieu_naissance'];
        $vdate_naissance=$row['date_naissance'];
        $vcreate_date=$row['create_date'];
	}
?>