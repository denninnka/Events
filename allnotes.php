<?php
if (isLogged() && isUser()){

    if(isset($_POST['delete'])){
        $del = mysqli_query($con, "DELETE FROM Notes
                                         WHERE note_id
                                         in (".implode(",", $_POST['delete']).") ");
    }

    $str = 'SELECT * FROM Notes WHERE user_id=\'' . $_SESSION['ID_user'] . '\'';
    if(isset($_GET['noteDate'])){
        $str .= ' AND note_date = \''.mysqli_real_escape_string($con,$_GET['noteDate']).'\'';
    }
    $q = mysqli_query($con, $str);
    $data = [];
    while ($result = mysqli_fetch_assoc($q)){
        $data[] = $result;
    }
    render('allnotes', ['notes' => $data]);
}
?>