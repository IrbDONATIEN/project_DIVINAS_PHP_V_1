<?php

    require_once 'config.php';
    class Auth extends Database{

        //Login Préposé 
        public function loginPrepose($login,$motdepasse,$typeUser){
            $sql="SELECT login, motdepasse, typeuser.typeUser, commune.commune FROM prepose INNER JOIN typeuser ON typeuser.id=prepose.typePrepose INNER JOIN commune ON commune.id=prepose.idcommune WHERE login=:login AND motdepasse=:motdepasse AND prepose.typePrepose=:typePrepose";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['login'=>$login,'motdepasse'=>$motdepasse,'typePrepose'=>$typeUser]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Afficher les détails de Préposé  connecté
        public function currentUser($login){
            $sql="SELECT prepose.id, login,typePrepose,typeuser.typeUser,idcommune,commune.commune FROM prepose INNER JOIN typeuser ON typeuser.id=prepose.typePrepose INNER JOIN commune ON commune.id=prepose.idcommune WHERE login=:login";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['login'=>$login]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

         //Login Administrateur
         public function loginAdministrateur($loginAdmin,$motdepasseAdmin){
            $sql="SELECT loginAdmin, motdepasse FROM administrateur WHERE loginAdmin=:loginAdmin AND motdepasse=:motdepasseAdmin";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['loginAdmin'=>$loginAdmin,'motdepasseAdmin'=>$motdepasseAdmin]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Afficher les détails d'administrateur connecté
        public function currentAdministrateur($loginAdmin){
            $sql="SELECT id_admin, matricule, nomAgent,service,type_Id,typeuser.typeUser as type,loginAdmin FROM administrateur INNER JOIN typeuser ON typeuser.id=administrateur.type_Id WHERE loginAdmin=:loginAdmin";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['loginAdmin'=>$loginAdmin]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Login Officier
        public function loginOfficier($loginOfficier,$motdepasseOfficier,$typeOfficier){
            $sql="SELECT login,motdepasse,typeOfficier FROM officier WHERE login=:loginOfficier AND motdepasse=:motdepasseOfficier AND typeOfficier=:typeOfficier";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['loginOfficier'=>$loginOfficier,'motdepasseOfficier'=>$motdepasseOfficier,'typeOfficier'=>$typeOfficier]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Afficher les détails officier connecté
        public function currentOfficier($loginOfficier){
            $sql="SELECT idOfficier,nomOfficier,prenom,login,motdepasse,typeOfficier,typeuser.typeUser,communeId,commune.commune FROM officier INNER JOIN typeuser ON typeuser.id=officier.typeOfficier INNER JOIN commune ON commune.id=officier.communeId WHERE login=:loginOfficier";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['loginOfficier'=>$loginOfficier]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Ajouter Frais documents dans la commune
        public function add_frais_doc($nomme,$typeFrais,$montant,$cidCommune,$cid){
            $sql="INSERT INTO frais_mariage (nomme,typeFrais,montant,communee_id,prepose_id) VALUES (:nomme,:typeFrais,:montant,:cidCommune,:cid)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['nomme'=>$nomme,'typeFrais'=>$typeFrais,'montant'=>$montant,'cidCommune'=>$cidCommune,'cid'=>$cid]);
            return true;
        }

        //Supprimé frais document dans la commune
         public function delete_frais_document($id){
            $sql="DELETE FROM frais_mariage WHERE id_Frais=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }

        //Fetch All Frais des documents par commune
        public function get_frais_documents($cidCommune,$cid){
            $sql="SELECT id_Frais,nomme,typeFrais,montant,communee_id,commune.commune,prepose_id,date_frais FROM frais_mariage INNER JOIN commune ON commune.id=frais_mariage.communee_id WHERE communee_id=:cidCommune AND prepose_id=:cid";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['cidCommune'=>$cidCommune,'cid'=>$cid]);

            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Ajouter Nouveau-né
        public function add_nouveau_ne($nom_nv,$postnom_nv,$prenom_nv,$sexe,$nom_pere,$nom_mere,$nom_declarant,$lieu_naiss,$date_naiss,$cidCommune,$typeFrais){
            $sql="INSERT INTO nouveau_ne (nom_nv_ne,postnom_nv_ne,prenom_nv_ne,sexe,nom_pere,nom_mere,nom_declarant,lieu_naissance, date_naissance,ID_comm,frais_doc_id) VALUES (:nom_nv,:postnom_nv,:prenom_nv,:sexe,:nom_pere,:nom_mere,:nom_declarant,:lieu_naiss,:date_naiss,:cidCommune,:typeFrais)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['nom_nv'=>$nom_nv,'postnom_nv'=>$postnom_nv,'prenom_nv'=>$prenom_nv,'sexe'=>$sexe,'nom_pere'=>$nom_pere,'nom_mere'=>$nom_mere,'nom_declarant'=>$nom_declarant,'lieu_naiss'=>$lieu_naiss,'date_naiss'=>$date_naiss,'cidCommune'=>$cidCommune,'typeFrais'=>$typeFrais]);
            return true;
        }

        //Fetch All Nouveau-né par utilisateur
        public function get_nouveau_ne($cidCommune){
            $sql="SELECT * FROM nouveau_ne WHERE ID_comm=:cidCommune";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['cidCommune'=>$cidCommune]);

            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Editer Nouveau-né pour la commune
        public function edit_nouveau_ne($id){
            $sql="SELECT * FROM nouveau_ne WHERE id_naissance=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            $result=$stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }


        //Mise à jour de données du nouveau-né par commune
        public function update_nouveau_ne($id,$nom_nv_ne,$postnom_nv_ne,$prenom_nv_ne,$sexe,$nom_pere,$nom_mere,$nom_declarant,$lieu_naissance,$date_naissance){
            $sql="UPDATE nouveau_ne SET nom_nv_ne=:nom_nv_ne,postnom_nv_ne=:postnom_nv_ne,prenom_nv_ne=:prenom_nv_ne,sexe=:sexe,nom_pere=:nom_pere,nom_mere=:nom_mere,nom_declarant=:nom_declarant,lieu_naissance=:lieu_naissance,date_naissance=:date_naissance,date_update=NOW() WHERE id_naissance=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id,'nom_nv_ne'=>$nom_nv_ne,'postnom_nv_ne'=>$postnom_nv_ne,'prenom_nv_ne'=>$prenom_nv_ne,'sexe'=>$sexe,'nom_pere'=>$nom_pere,'nom_mere'=>$nom_mere,'nom_declarant'=>$nom_declarant,'lieu_naissance'=>$lieu_naissance,'date_naissance'=>$date_naissance]);
            return true;
        }

        //Supprimé un nouveau-né dans la commune
        public function delete_nouveau_ne($id){
            $sql="DELETE FROM nouveau_ne WHERE id_naissance=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }

        //Ajouter Acte Naissance
        public function add_acte_naissance($codeAct,$volume,$folio,$profession,$nationalite,$professionpere,$resident,$langue,$officier_id,$cidCommune,$nouveaune_id){
            $sql="INSERT INTO acte_de_naissance(codeAct,volume,folio,profession,nationalite,professionpere,resident,langue,officier_id,commune_id,nouveaune_id) VALUES (:codeAct,:volume,:folio,:profession,:nationalite,:professionpere,:resident,:langue,:officier_id,:cidCommune,:nouveaune_id)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['codeAct'=>$codeAct,'volume'=>$volume,'folio'=>$folio,'profession'=>$profession,'nationalite'=>$nationalite,'professionpere'=>$professionpere,'resident'=>$resident,'langue'=>$langue,'officier_id'=>$officier_id,'cidCommune'=>$cidCommune,'nouveaune_id'=>$nouveaune_id]);
            return true;
        }

        //Fetch All Acte des naissances par commune
        public function get_acte_naissance($cidCommune){
            $sql="SELECT idActeNais,codeAct,volume,folio,profession,nationalite,professionpere,resident,langue,officier_id,officier.nomOfficier,commune_id, nouveaune_id,nouveau_ne.nom_nv_ne, nouveau_ne.postnom_nv_ne, nouveau_ne.prenom_nv_ne,nouveau_ne.sexe,nouveau_ne.nom_pere,nouveau_ne.nom_mere,create_date,update_date FROM acte_de_naissance INNER JOIN officier ON officier.idOfficier=acte_de_naissance.officier_id INNER JOIN nouveau_ne ON nouveau_ne.id_naissance=acte_de_naissance.nouveaune_id WHERE commune_id=:cidCommune";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['cidCommune'=>$cidCommune]);

            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

         //Editer acte de naissance pour la commune
         public function edit_acte_naissance($id){
            $sql="SELECT * FROM acte_de_naissance WHERE idActeNais=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            $result=$stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        //Mise à jour de données d'acte de naissance par commune
        public function update_acte_naissance($id,$profession,$nationalite,$professionpere,$resident,$langue,$officier_id,$nouveaune_id){
            $sql="UPDATE acte_de_naissance SET profession=:profession,nationalite=:nationalite,professionpere=:professionpere,resident=:resident,langue=:langue,officier_id=:officier_id,nouveaune_id=:nouveaune_id,update_date=NOW() WHERE idActeNais=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id,'profession'=>$profession,'nationalite'=>$nationalite,'professionpere'=>$professionpere,'resident'=>$resident,'langue'=>$langue,'officier_id'=>$officier_id,'nouveaune_id'=>$nouveaune_id]);
            return true;
        }

         //Supprimé un nouveau-né dans la commune
         public function delete_acte_naissance($id){
            $sql="DELETE FROM acte_de_naissance WHERE idActeNais=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }

        //Ajouter Projet Mariage
        public function add_projet_mariage($numero_projet,$nom_Epoux,$nom_Epouse,$lieu_naissance_epoux,$date_naissance_epoux,$lieu_naissance_epouse,$date_naissance_epouse,$nom_temoin,$regime_matrimoniaux,$photoEpoux,$photoEpouse,$cidCommune,$nom_pere_epoux,$nom_mere_epoux,$nom_pere_epouse,$nom_mere_epouse,$province_epoux,$territoire_epoux,$province_epouse,$territoire_epouse,$date_celebration,$frais_document_id){
            $sql="INSERT INTO projet_mariage(numero_projet,nom_Epoux,nom_Epouse,lieu_naissance_epoux,date_naissance_epoux,lieu_naissance_epouse,date_naissance_epouse,nom_temoin,regime_matrimoniaux,photoEpoux,photoEpouse,id_Communes,nom_pere_epoux,nom_mere_epoux,nom_pere_epouse,nom_mere_epouse,province_epoux,territoire_epoux,province_epouse,territoire_epouse,date_celebration,frais_document_id) VALUES (:numero_projet,:nom_Epoux,:nom_Epouse,:lieu_naissance_epoux,:date_naissance_epoux,:lieu_naissance_epouse,:date_naissance_epouse,:nom_temoin,:regime_matrimoniaux,:photoEpoux,:photoEpouse,:cidCommune,:nom_pere_epoux,:nom_mere_epoux,:nom_pere_epouse,:nom_mere_epouse,:province_epoux,:territoire_epoux,:province_epouse,:territoire_epouse,:date_celebration,:frais_document_id)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['numero_projet'=>$numero_projet,'nom_Epoux'=>$nom_Epoux,'nom_Epouse'=>$nom_Epouse,'lieu_naissance_epoux'=>$lieu_naissance_epoux,'date_naissance_epoux'=>$date_naissance_epoux,'lieu_naissance_epouse'=>$lieu_naissance_epouse,'date_naissance_epouse'=>$date_naissance_epouse,'nom_temoin'=>$nom_temoin,'regime_matrimoniaux'=>$regime_matrimoniaux,'photoEpoux'=>$photoEpoux,'photoEpouse'=>$photoEpouse,'cidCommune'=>$cidCommune,'nom_pere_epoux'=>$nom_pere_epoux,'nom_mere_epoux'=>$nom_mere_epoux,'nom_pere_epouse'=>$nom_pere_epouse,'nom_mere_epouse'=>$nom_mere_epouse,'province_epoux'=>$province_epoux,'territoire_epoux'=>$territoire_epoux,'province_epouse'=>$province_epouse,'territoire_epouse'=>$territoire_epouse,'date_celebration'=>$date_celebration,'frais_document_id'=>$frais_document_id]);
            return true;
        }

         //Fetch All Projet Mariages
         public function fetchAllProjetMariages($val){
            $sql="SELECT * FROM projet_mariage WHERE id_Communes=$val";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        //Afficher du projet mariage séléctionné par l'ID
        public function fetchProjetDetailsByID($id){
            $sql="SELECT * FROM projet_mariage WHERE id_projet_mariage=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
         }

         //Supprimé un projet mariage dans la commune
         public function delete_projet_mariage($id){
            $sql="DELETE FROM projet_mariage WHERE id_projet_mariage=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }

        //Fetch Afficher les projets des mariages sur la page d'acceuil projet du site
        public function fetchProjetMariages(){
            $sql="SELECT id_projet_mariage, numero_projet, nom_Epoux, nom_Epouse, lieu_naissance_epoux,date_naissance_epoux, lieu_naissance_epouse, date_naissance_epouse, nom_temoin, regime_matrimoniaux, created_at, update_date, photoEpoux, photoEpouse, id_Communes,nom_pere_epoux, nom_mere_epoux, nom_pere_epouse, nom_mere_epouse, province_epoux, territoire_epoux, province_epouse, territoire_epouse, date_celebration, commune.commune, visible FROM projet_mariage INNER JOIN commune ON commune.id=projet_mariage.id_Communes WHERE visible=1";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        //Ajouter Acte de Mariage
        public function add_acte_mariage($acte_num,$annee,$jour,$etat_civil_epoux,$residant_epoux,$profession_epoux,$etat_civil_epouse,$residant_epouse,$profession_epouse,$dote_composee,$date_celebree,$officierID,$cidCommune,$projet_mariage_id){
            $sql="INSERT INTO acte_mariage(acte_num,annee,jour,etat_civil_epoux,residant_epoux,profession_epoux,etat_civil_epouse, residant_epouse,profession_epouse,dote_composee,date_celebree,officierID,communesID,projet_mariage_id) VALUES (:acte_num,:annee,:jour,:etat_civil_epoux,:residant_epoux,:profession_epoux,:etat_civil_epouse, :residant_epouse,:profession_epouse,:dote_composee,:date_celebree,:officierID,:cidCommune,:projet_mariage_id)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['acte_num'=>$acte_num,'annee'=>$annee,'jour'=>$jour,'etat_civil_epoux'=>$etat_civil_epoux,'residant_epoux'=>$residant_epoux,'profession_epoux'=>$profession_epoux,'etat_civil_epouse'=>$etat_civil_epouse,'residant_epouse'=>$residant_epouse,'profession_epouse'=>$profession_epouse,'dote_composee'=>$dote_composee,'date_celebree'=>$date_celebree,'officierID'=>$officierID,'cidCommune'=>$cidCommune,'projet_mariage_id'=>$projet_mariage_id]);
            return true;
        }

         //Fetch All Acte des Mariages
         public function fetchAllActeMariages($val){
            $sql="SELECT id_acte_mariage,acte_num,annee,jour,etat_civil_epoux,residant_epoux,profession_epoux,etat_civil_epouse,residant_epouse,profession_epouse,dote_composee,date_celebree,date_publier,officierID,communesID,projet_mariage_id,projet_mariage.nom_Epoux,projet_mariage.nom_Epouse,projet_mariage.photoEpoux,projet_mariage.photoEpouse,publier FROM acte_mariage INNER JOIN projet_mariage ON projet_mariage.id_projet_mariage=acte_mariage.projet_mariage_id WHERE communesID=$val";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        //Fetch Afficher les actes des mariages sur la page d'acceuil mariages du site
        public function fetchAllActeMariage(){
            $sql="SELECT id_acte_mariage,acte_num,annee,jour,etat_civil_epoux,residant_epoux,profession_epoux,etat_civil_epouse,residant_epouse,profession_epouse,dote_composee,date_celebree,date_publier,officierID,communesID,commune.commune,projet_mariage_id,projet_mariage.nom_Epoux,projet_mariage.nom_Epouse,projet_mariage.photoEpoux,projet_mariage.photoEpouse,publier FROM acte_mariage INNER JOIN projet_mariage ON projet_mariage.id_projet_mariage=acte_mariage.projet_mariage_id INNER JOIN commune ON commune.id=acte_mariage.communesID WHERE publier=1";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        //Mise à jour de données de Projet des mariages par commune
        public function update_Projet_mariages($projet_mariage_id){
            $sql="UPDATE projet_mariage SET visible=0 WHERE id_projet_mariage=:projet_mariage_id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['projet_mariage_id'=>$projet_mariage_id]);
            return true;
        }

         //Supprimé un acte de mariage dans la commune
         public function delete_acte_mariage($id){
            $sql="DELETE FROM acte_mariage WHERE id_acte_mariage=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }

         //Afficher Acte de mariage séléctionné par l'ID
         public function fetchActeMariageDetailsByID($id){
            $sql="SELECT id_acte_mariage,acte_num,annee,jour,etat_civil_epoux,residant_epoux,profession_epoux,etat_civil_epouse,residant_epouse,profession_epouse,dote_composee,date_celebree,date_publier,officierID,communesID,projet_mariage_id,projet_mariage.nom_Epoux,projet_mariage.nom_Epouse,projet_mariage.photoEpoux,projet_mariage.photoEpouse,publier FROM acte_mariage INNER JOIN projet_mariage ON projet_mariage.id_projet_mariage=acte_mariage.projet_mariage_id WHERE id_acte_mariage=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
         }

        //Fetch All Défunt par commune
        public function get_defunt($cidCommune){
            $sql="SELECT id_defunt, nom_defunt, postnom_defunt, prenom_defunt, sexe_defunt, nom_pere, nom_mere, nom_comparant, date_deces, lieu_naissance, date_naissance, date_create, adresse_defunt, Id_commune, frais_ID FROM defunt WHERE Id_commune=:cidCommune";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['cidCommune'=>$cidCommune]);

            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Ajouter défunt
        public function add_defunt($nom_defunt,$postnom_defunt,$prenom_defunt,$sexe_defunt,$nom_pere,$nom_mere,$nom_comparant,$date_deces,$lieu_naissance,$date_naissance,$adresse_defunt,$cidCommune,$frais_ID){
            $sql="INSERT INTO defunt(nom_defunt,postnom_defunt,prenom_defunt,sexe_defunt,nom_pere,nom_mere,nom_comparant,date_deces,lieu_naissance,date_naissance,adresse_defunt,Id_commune,frais_ID) VALUES (:nom_defunt,:postnom_defunt,:prenom_defunt,:sexe_defunt,:nom_pere,:nom_mere,:nom_comparant,:date_deces,:lieu_naissance,:date_naissance,:adresse_defunt,:cidCommune,:frais_ID)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['nom_defunt'=>$nom_defunt,'postnom_defunt'=>$postnom_defunt,'prenom_defunt'=>$prenom_defunt,'sexe_defunt'=>$sexe_defunt,'nom_pere'=>$nom_pere,'nom_mere'=>$nom_mere,'nom_comparant'=>$nom_comparant,'date_deces'=>$date_deces,'lieu_naissance'=>$lieu_naissance,'date_naissance'=>$date_naissance,'adresse_defunt'=>$adresse_defunt,'cidCommune'=>$cidCommune,'frais_ID'=>$frais_ID]);
            return true;
        }

        //Supprimé un défunt dans la commune
        public function delete_defunt($id){
            $sql="DELETE FROM defunt WHERE 	id_defunt=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }
        
        //Fetch All Actes des décès par commune
        public function get_acte_deces($cidCommune){
            $sql="SELECT id_deces,acte_deces_num,volume_acte,folio_acte,annee_acte,jour_acte,profession_deces,est_decede,residant_deces, nationalite_deces,etat_civil_deces,comID,ID_Off, defunt_ID,defunt.nom_defunt,defunt.postnom_defunt,defunt.prenom_defunt,defunt.sexe_defunt, defunt.nom_comparant FROM acte_deces INNER JOIN defunt ON defunt.id_defunt=acte_deces.defunt_ID WHERE comID=:cidCommune";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['cidCommune'=>$cidCommune]);

            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Ajouter acte de décès par commune
        public function add_acte_deces($acte_deces_num,$volume_acte,$folio_acte,$annee_acte,$jour_acte,$profession_deces,$est_decede,$residant_deces,$nationalite_deces,$etat_civil_deces,$cidCommune,$ID_Off,$defunt_ID){
            $sql="INSERT INTO acte_deces (acte_deces_num,volume_acte,folio_acte,annee_acte,jour_acte,profession_deces,est_decede, residant_deces,nationalite_deces,etat_civil_deces,comID,ID_Off,defunt_ID) VALUES (:acte_deces_num,:volume_acte,:folio_acte,:annee_acte,:jour_acte,:profession_deces,:est_decede,:residant_deces,:nationalite_deces,:etat_civil_deces,:cidCommune,:ID_Off,:defunt_ID)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['acte_deces_num'=>$acte_deces_num,'volume_acte'=>$volume_acte,'folio_acte'=>$folio_acte,'annee_acte'=>$annee_acte,'jour_acte'=>$jour_acte,'profession_deces'=>$profession_deces,'est_decede'=>$est_decede,'residant_deces'=>$residant_deces,'nationalite_deces'=>$nationalite_deces,'etat_civil_deces'=>$etat_civil_deces,'cidCommune'=>$cidCommune,'ID_Off'=>$ID_Off,'defunt_ID'=>$defunt_ID]);
            return true;
        }
        
        //Supprimé un acte de décès dans la commune
        public function delete_acte_deces($id){
            $sql="DELETE FROM acte_deces WHERE id_deces=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }



        //Fetch All Acte des Mariages pour toutes les communes par l'administrateur
        public function fetchAllActeMariagesTous(){
            $sql="SELECT id_acte_mariage,acte_num,annee,jour,etat_civil_epoux,residant_epoux,profession_epoux,etat_civil_epouse,residant_epouse,profession_epouse,dote_composee,date_celebree,date_publier,officierID,communesID,commune.commune,projet_mariage_id,projet_mariage.nom_Epoux,projet_mariage.nom_Epouse,projet_mariage.photoEpoux,projet_mariage.photoEpouse,publier FROM acte_mariage INNER JOIN projet_mariage ON projet_mariage.id_projet_mariage=acte_mariage.projet_mariage_id INNER JOIN commune ON commune.id=acte_mariage.communesID";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        //Fetch All Acte des naissances pour toutes les communes par l'administrateur
        public function fetchAllActeNaissancesTous(){
            $sql="SELECT idActeNais,codeAct,volume,folio,profession,nationalite,professionpere,resident,langue,officier_id,officier.nomOfficier, commune_id,commune.commune,nouveaune_id, nouveau_ne.nom_nv_ne, nouveau_ne.postnom_nv_ne, nouveau_ne.prenom_nv_ne,nouveau_ne.sexe, nouveau_ne.nom_pere, nouveau_ne.nom_mere,nouveau_ne.nom_declarant, nouveau_ne.lieu_naissance,nouveau_ne.date_naissance,create_date,update_date FROM acte_de_naissance INNER JOIN officier ON officier.idOfficier=acte_de_naissance.officier_id INNER JOIN commune ON commune.id=acte_de_naissance.commune_id INNER JOIN nouveau_ne ON nouveau_ne.id_naissance=acte_de_naissance.nouveaune_id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

         //Fetch All Acte des décès pour toutes les communes par l'administrateur
         public function fetchAllActeDecesTous(){
            $sql="SELECT id_deces,acte_deces_num,volume_acte,folio_acte,annee_acte,jour_acte,profession_deces,est_decede,residant_deces, nationalite_deces,etat_civil_deces,comID,commune.commune,ID_Off,officier.nomOfficier,defunt_ID,defunt.nom_defunt, defunt.postnom_defunt,defunt.prenom_defunt,defunt.sexe_defunt,defunt.nom_pere,defunt.nom_mere,defunt.nom_comparant,defunt.date_deces,defunt.lieu_naissance,defunt.date_naissance,defunt.adresse_defunt FROM acte_deces INNER JOIN commune ON commune.id=acte_deces.comID INNER JOIN officier ON officier.idOfficier=acte_deces.ID_Off INNER JOIN defunt ON defunt.id_defunt=acte_deces.defunt_ID";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }


        //Fetch All Acte des Mariages pour cette commune par l'officier
        public function fetchAllActeMariageTous($communeId){
            $sql="SELECT id_acte_mariage,acte_num,annee,jour,etat_civil_epoux,residant_epoux,profession_epoux,etat_civil_epouse,residant_epouse,profession_epouse,dote_composee,date_celebree,date_publier,officierID,communesID,commune.commune,projet_mariage_id,projet_mariage.nom_Epoux,projet_mariage.nom_Epouse,projet_mariage.photoEpoux,projet_mariage.photoEpouse,publier FROM acte_mariage INNER JOIN projet_mariage ON projet_mariage.id_projet_mariage=acte_mariage.projet_mariage_id INNER JOIN commune ON commune.id=acte_mariage.communesID WHERE communesID=:communeId";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['communeId'=>$communeId]);
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        //Fetch All Acte des naissances pour cette commune par l'officier
        public function fetchAllActeNaissanceTous($communeId){
            $sql="SELECT idActeNais,codeAct,volume,folio,profession,nationalite,professionpere,resident,langue,officier_id,officier.nomOfficier, commune_id,commune.commune,nouveaune_id,nouveau_ne.nom_nv_ne, nouveau_ne.postnom_nv_ne, nouveau_ne.prenom_nv_ne,nouveau_ne.sexe, nouveau_ne.nom_pere, nouveau_ne.nom_mere,nouveau_ne.nom_declarant, nouveau_ne.lieu_naissance,nouveau_ne.date_naissance,create_date,update_date FROM acte_de_naissance INNER JOIN officier ON officier.idOfficier=acte_de_naissance.officier_id INNER JOIN commune ON commune.id=acte_de_naissance.commune_id INNER JOIN nouveau_ne ON nouveau_ne.id_naissance=acte_de_naissance.nouveaune_id WHERE commune_id=:communeId";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['communeId'=>$communeId]);
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

         //Fetch All Acte des décès pour cette commune par l'officier
         public function fetchAllActeDeceTous($communeId){
            $sql="SELECT id_deces,acte_deces_num,volume_acte,folio_acte,annee_acte,jour_acte,profession_deces,est_decede,residant_deces, nationalite_deces,etat_civil_deces,comID,commune.commune,ID_Off,officier.nomOfficier,defunt_ID,defunt.nom_defunt, defunt.postnom_defunt,defunt.prenom_defunt,defunt.sexe_defunt,defunt.nom_pere,defunt.nom_mere,defunt.nom_comparant,defunt.date_deces,defunt.lieu_naissance,defunt.date_naissance,defunt.adresse_defunt FROM acte_deces INNER JOIN commune ON commune.id=acte_deces.comID INNER JOIN officier ON officier.idOfficier=acte_deces.ID_Off INNER JOIN defunt ON defunt.id_defunt=acte_deces.defunt_ID WHERE comID=:communeId";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['communeId'=>$communeId]);
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

    }
?>