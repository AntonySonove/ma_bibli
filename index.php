
<?php
//* acces depuis n'importe quel appareil
header("Access-Control-Allow-Origin: *");

//* format de données envoyées
header("Content-Type: text/html; charset=UTF-8");

//* méthode (GET, POST, PUT, DELETE)
header("Access-Control-Allow-Methods: GET");

//* durée de vie de la requête
header("Access-Control-Max-Age:3600");

//* entêtes autorisées
header("Access-Control-Allow-Headers: Content-type, Access-Control-Headers,Authorization, X-Requested-With");

//* controle de la methode http
if($_SERVER["REQUEST_METHOD"]!="GET"){

    //* envoie d'un message d'erreur
    http_response_code(405);
    echo json_encode(["message"=>"Methode non autorisée. POST requis.","code"=>405]);

    //* arrêt du script
    return;
}

function displayAll(){
    //* récupération des données
    // $json=file_get_contents("https://openlibrary.org/search.json?q=the+lord+of+the+rings"); //! open library

    //* déchiffre les données
    // $data=json_decode($json);

    // $results=$data->docs[0];

    // //* exploiter les données
    // return $results;

    $query= "harry potter";
    $json=file_get_contents("https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query)); //! google books

    $data=json_decode($json);
    $results= $data->items;

    return $results;
}

function display(){
    //! openlibrary
    // $json=file_get_contents("https://openlibrary.org/search.json?q=the+lord+of+the+rings");
    
    // $data=json_decode($json);
    
    // $results=array(
    //     $data->docs[0]->title,
    //     $data->docs[0]->author_name,
    //     $data->docs[0]->first_publish_year
    // );
    
    // return $results;

    //! google books
    $query= "l'art de la joie";
    $json=file_get_contents("https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query));

    $data=json_decode($json);

    foreach($data->items as $books){
        echo "Titre : " . $books->volumeInfo->title . "</br>";
        echo "Auteur : " . $books->volumeInfo->authors[0] . "</br>";
        echo "</br>";
    }
    

    // return $results;
}

$display= display();
$displayAll=displayAll();

echo "RESULTAT :</br>";
print_r($display);
echo " </br></br>TOUT :</br>";
print_r($displayAll);
 ?> 



