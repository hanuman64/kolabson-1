<?PHP
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Connexion à la base de données
include 'connectBDD.php';
// Récupération des 10 derniers messages
        $resultaRequete = $bdd->query('SELECT pseudo, message, dateMessage FROM messages ORDER BY dateMessage DESC ');
        $allreponse = $resultaRequete->fetchAll(); //Renvoie un tableau
        $data = array();

        foreach ($allreponse as $reponse) {
            // var_dump($reponse);
            $reponseTab = array('pseudo' => $reponse['pseudo'], 'message' => $reponse['message'], 'dateMessage' => $reponse['dateMessage']);
            array_push($data, $reponseTab);
            /*echo '<h5>Pseudo:  ' .$reponseTab['pseudo'] . '</h5><p>  '.$reponseTab['message'].'</p>';*/
        }
        header('Content-Type: application/json');
        echo json_encode($data);


