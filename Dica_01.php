<?php
    $pdo = new PDO( 'mysql:host=localhost;dbname=megasena', 'root', '' );
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql = $pdo->prepare( "SELECT count(*) as'total' FROM megasena;" );
    $sql->execute();
    $info = $sql->fetchAll();

    /*
    $info = $sql->fetch();
    echo $info['total'];
    */

    $temp;
    foreach ( $info as $key => $value ) {
        echo "Total: " . $value[ 'total' ];
        $temp = $value[ 'total' ];
    }

    $sql2 = $pdo->prepare( "SELECT * FROM megasena WHERE concurso = $temp;" );
    $sql2->execute();
    $info2 = $sql2->fetch();

    echo "</br>";
    echo "<pre>";
    print_r( $info2 );
    echo "</pre>";
    echo "</br>";
    echo $info2[ '0' ];

    for ( $i = 1; $i < 9; $i++ ) {
        echo " " . $info2[ $i ];
    }
    /*
    $delete = $pdo->prepare( "DELETE FROM megasena;" );
    if ( $delete->execute() ) {
        echo "<h1>MegaSena deletada</h1>";
    } else {
        echo "<h1>erro ao deletar</h1>";
    }
    */
?>