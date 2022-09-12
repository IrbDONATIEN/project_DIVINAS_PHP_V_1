<?php
	require_once 'connexions.php';

	//Preparation d'affichage de details des informations provenant de la base de données
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query="SELECT id_deces,acte_deces_num,volume_acte,folio_acte,annee_acte,jour_acte,profession_deces,est_decede,residant_deces,nationalite_deces,etat_civil_deces,comID,commune.commune,ID_Off,officier.nomOfficier,defunt_ID,defunt.nom_defunt,defunt.postnom_defunt,defunt.prenom_defunt,defunt.sexe_defunt,defunt.nom_pere,defunt.nom_mere,defunt.nom_comparant,defunt.date_deces,defunt.lieu_naissance,defunt.date_naissance, defunt.adresse_defunt FROM acte_deces INNER JOIN commune ON commune.id=acte_deces.comID INNER JOIN officier ON officier.idOfficier=acte_deces.ID_Off INNER JOIN defunt ON defunt.id_defunt=acte_deces.defunt_ID WHERE acte_deces.id_deces=?";
		$stmt=$dbb->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id_deces'];
		$vacte_deces_num=$row['acte_deces_num'];
		$vvolume_acte=$row['volume_acte'];
        $vfolio_acte=$row['folio_acte'];
		$vannee_acte=$row['annee_acte'];
		$vjour_acte=$row['jour_acte'];
        $vprofession_deces=$row['profession_deces'];
        $vest_decede=$row['est_decede'];
        
		$vresidant_deces=$row['residant_deces'];
        $vnationalite_deces=$row['nationalite_deces'];
		$vcommune=$row['commune'];
        $vetat_civil_deces=$row['etat_civil_deces'];
        $vnomOfficier=$row['nomOfficier'];

        $vnom_defunt=$row['nom_defunt'];
        $vpostnom_defunt=$row['postnom_defunt'];
        $vprenom_defunt=$row['prenom_defunt'];
        $vsexe_defunt=$row['sexe_defunt'];

        $vnom_pere=$row['nom_pere'];
        $vnom_mere=$row['nom_mere'];
        $vnom_comparant=$row['nom_comparant'];
        $vdate_deces=$row['date_deces'];
        $vlieu_naissance=$row['lieu_naissance'];
        $vdate_naissance=$row['date_naissance'];
        $vadresse_defunt=$row['adresse_defunt'];
        
	}
?>