<?php
	require_once 'connexions.php';

	//Preparation d'affichage de details des informations provenant de la base de données
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query="SELECT id_acte_mariage,acte_num,annee,jour,etat_civil_epoux,residant_epoux,profession_epoux,etat_civil_epouse,residant_epouse,profession_epouse,dote_composee,date_celebree,date_publier,officierID,officier.nomOfficier, communesID,commune.commune,projet_mariage_id,projet_mariage.nom_Epoux,projet_mariage.nom_Epouse,projet_mariage.lieu_naissance_epoux,projet_mariage.date_naissance_epoux,projet_mariage.lieu_naissance_epouse,projet_mariage.date_naissance_epouse,projet_mariage.nom_temoin,projet_mariage.regime_matrimoniaux,projet_mariage.photoEpoux,projet_mariage.photoEpouse,projet_mariage.nom_pere_epoux,projet_mariage.nom_mere_epoux,projet_mariage.nom_pere_epouse,projet_mariage.nom_mere_epouse,projet_mariage.province_epoux,projet_mariage.territoire_epoux,projet_mariage.province_epouse,projet_mariage.territoire_epouse,projet_mariage.date_celebration, publier FROM acte_mariage INNER JOIN officier ON officier.idOfficier=acte_mariage.officierID INNER JOIN commune ON commune.id=acte_mariage.communesID INNER JOIN projet_mariage ON projet_mariage.id_projet_mariage=acte_mariage.projet_mariage_id WHERE acte_mariage.id_acte_mariage=?";
		$stmt=$dbb->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		
		$vid=$row['id_acte_mariage'];
		$vnum=$row['acte_num'];
		$vannee=$row['annee'];
		$vjour=$row['jour'];
		$vetat_civil_epoux=$row['etat_civil_epoux'];
		$vresidant_epoux=$row['residant_epoux'];
		$vprofession_epoux=$row['profession_epoux'];

		$vetat_civil_epouse=$row['etat_civil_epouse'];
		$vresidant_epouse=$row['residant_epouse'];
		$vprofession_epouse=$row['profession_epouse'];
		$vdote_composee=$row['dote_composee'];
		$vdate_celebree=$row['date_celebree'];

		$vnom_Epoux=$row['nom_Epoux'];
		$vnom_Epouse=$row['nom_Epouse'];
		$vlieu_naissance_epoux=$row['lieu_naissance_epoux'];
		$vdate_naissance_epoux=$row['date_naissance_epoux'];
		$vlieu_naissance_epouse=$row['lieu_naissance_epouse'];
		$vdate_naissance_epouse=$row['date_naissance_epouse'];
		
		$vnom_temoin=$row['nom_temoin'];
		$vnom_pere_epoux=$row['nom_pere_epoux'];
		$vnom_mere_epoux=$row['nom_mere_epoux'];
		$vnom_pere_epouse=$row['nom_pere_epouse'];
		$vnom_mere_epouse=$row['nom_mere_epouse'];
		$vprovince_epoux=$row['province_epoux'];
		$vterritoire_epoux=$row['territoire_epoux'];
		$vprovince_epouse=$row['province_epouse'];
		$vterritoire_epouse=$row['territoire_epouse'];
		$vdate_celebration=$row['date_celebration'];
		
		$vcommune=$row['commune'];
		$vphotoEpoux=$row['photoEpoux'];
		$vphotoEpouse=$row['photoEpouse'];
		$vofficier=$row['nomOfficier'];
		$vRegime=$row['regime_matrimoniaux'];
	    
	}
?>