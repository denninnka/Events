<?php
session_start();
require 'config.php';

$p= 'home';
if (isset($_GET['page'])){
    $p = $_GET['page'];
}

if(isset($_GET['note_id'])){
    $noteId = $_GET['note_id'];
}
if(isset($_GET['noteDate'])){
    $note_date=$_GET['noteDate'];
}

switch ($p){
    default:
        $page = 'home.php';
        break;
    case 'note':
        $page = 'note.php';
        break;
    case 'allnotes':
        $page = 'allnotes.php';
        break;
    case 'editnote':
        $page = 'editnote.php';
        break;
    case 'login':
        $page = 'login.php';
        break;
    case 'registration':
        $page = 'registration.php';
        break;
    case 'logout':
        session_destroy();
        $_SESSION = array();
        $page = 'logout.php';
        break;
    case 'users':
        $page = 'users.php';
        break;
}

require_once 'header.php';
require_once $page;
require_once 'footer.php';
?>