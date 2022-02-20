<?php
/**
 * Created by PhpStorm.
 * User: Monkey3@KoLABSoN
 * Date: 27/05/2019
 * Time: 14:28
 */
$indicesServer = array('PHP_SELF',
   /* 'argv',
    'argc',*/
    'GATEWAY_INTERFACE',
    'SERVER_ADDR',
    'SERVER_NAME',
    'SERVER_SOFTWARE',
    'SERVER_PROTOCOL',
    'REQUEST_METHOD',
    'REQUEST_TIME',
    'REQUEST_TIME_FLOAT',
    'QUERY_STRING',
    'DOCUMENT_ROOT',
    'HTTP_ACCEPT',
    /*'HTTP_ACCEPT_CHARSET',*/
    'HTTP_ACCEPT_ENCODING',
    'HTTP_ACCEPT_LANGUAGE',
    'HTTP_CONNECTION',
    'HTTP_HOST',
    /*'HTTP_REFERER',*/
    'HTTP_USER_AGENT',
    /*'HTTPS',*/
    'REMOTE_ADDR',
    /*'REMOTE_HOST',*/
    'REMOTE_PORT',
    /*'REMOTE_USER',
    'REDIRECT_REMOTE_USER',*/
    'SCRIPT_FILENAME',
    'SERVER_ADMIN',
    'SERVER_PORT',
    'SERVER_SIGNATURE',
    /*'PATH_TRANSLATED',*/
    'SCRIPT_NAME',
    'REQUEST_URI'
    /*'PHP_AUTH_DIGEST',
    'PHP_AUTH_USER',
    'PHP_AUTH_PW',
    'AUTH_TYPE',
    'PATH_INFO',
    'ORIG_PATH_INFO'*/) ;

echo '<table cellpadding="10">' ;
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
    }
    else {
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
    }
}
echo '</table>' ;



$file = "journal.txt"; //Creation du fichier texte contenant le tableau
$mode = "a+"; //Ouvre le fichier en mode lecture et écriture, place le pointeur au début du fichier. Si le fichier existe déjà, son contenu est écrasé, dans le cas contraire, il crée le fichier.


$ressource = fopen($file,$mode);
foreach($indicesServer as $arg ){
    fwrite($ressource,$arg . "=" . $_SERVER[$arg] . "\n");
}
fclose($ressource);



