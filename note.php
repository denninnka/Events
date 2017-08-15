<?php
$errors = array();
if (isLogged() && isUser()){
    if (isset($_POST['save'])) {
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
            $decsription = trim($_POST['description']);
            $note_date = $_POST['note_date'];
            $q = mysqli_query($con, 'INSERT INTO Notes (note_id, title, description, created_at, updated_at, user_id, note_date)
                                          VALUES (NULL, \''.mysqli_real_escape_string($con,$title).'\', \''.mysqli_real_escape_string($con, $decsription).'\', NOW(),NOW(),'.$_SESSION['ID_user'].', \''.$note_date.'\'  )');
            echo '<div class="alert alert-success" role="alert">
                Създадохте успешно бележка
                </div>';
        }
    }
    render('note');
}