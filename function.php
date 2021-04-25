<?php

function get_time_ago( $time ){
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'min',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return  $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

function format($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>