<?php
$errors = array();
if (isLogged() && isUser()){
    if (isset($_POST['saved'])) {
        if (empty($_POST['title'])){
            $_POST['title']='';
            $errors[]='Бележката трябва да има заглавие';
        }
        if (empty($_POST['description'])){
            $_POST['description']='';
            $errors[]='Моля въведете описание';
        }
        if(count($errors) > 0){
            echo '<div class="alert alert-danger">';
            foreach ($errors as $value) {
                echo '<p>'.$value.'</p>';
            }
            echo '</div>';
        }else{
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $query = mysqli_query($con, 'UPDATE Notes
                                              SET title = \' '.mysqli_real_escape_string($con, $title).' \', description = \' '.mysqli_real_escape_string($con, $description).' \', updated_at = NOW(), note_date = \''.$_POST['note_date'].'\' 
                                              WHERE Notes . note_id = \''.(int)$_GET['note_id'].'\' ');
            echo '<div class="alert alert-success" role="alert">
                Редактирахте успешно бележката
                </div>';
        }
    }
    $q = mysqli_query($con, 'SELECT * FROM Notes 
                                  WHERE user_id=\''.$_SESSION['ID_user'].'\' 
                                  AND note_id= \''.(int)$_GET['note_id'].'\'');

    $result = mysqli_fetch_assoc($q);

    render('editnote', ['var' => $result] );
}

