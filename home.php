<?php
if(isLogged() && isUser()){

    $date = new DateTime((isset($_GET['date'])? $_GET['date'] : ''));


    $prev = clone $date;
    $next = clone $date;

    $prev->modify('-1 month');
    $next->modify('+1 month');

    $q = mysqli_query($con, 'SELECT * FROM Notes WHERE user_id=\''.$_SESSION['ID_user'].'\'');
    $notes = [];
    while ($note = mysqli_fetch_assoc($q)){
        if(!isset($notes[$note['note_date']])){
            $notes[$note['note_date']] =0;
        }
        $notes[$note['note_date']]+=1;
    }
    render('home', array(
        'test' => 'ok',
        'notes' => $notes,
        'date'=>$date,
        'prev_date'=>$prev,
        'next_date'=> $next
    ));
}

render('home', array(
    'test' => 'ok',
));