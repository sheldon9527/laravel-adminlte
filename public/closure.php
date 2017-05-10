<?php

function printStr() {
    $func = function( $str ) {
        echo $str;
    };
    $func( 'some string' );
}

printStr();



function getMoney() {
    $rmb = 1;
    $ii= function() use ( $rmb ) {
        echo $rmb;
    };
    $ii();	
}

getMoney();



function getPrintStrFunc() {
    $func = function( $str ) {
        echo $str;
    };
    return $func;
}

$printStrFunc = getPrintStrFunc();
$printStrFunc( 'some 2222 string' );

function callFunc( $func ) {
    $func( 'some about js string' );
}
callFunc( function( $str ) {
    echo $str;
} );



?>
