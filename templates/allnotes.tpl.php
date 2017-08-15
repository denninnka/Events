<form method="POST">
    <h2>Бележки на <?=$_SESSION['username'];?> от <?php if(isset($_GET['noteDate'])) {echo $_GET['noteDate'];}?></h2>
    <table class="table table-striped table-inverse">
        <thead>
        <tr>
            <th>#</th>
            <th>Заглавие</th>
            <th>Описание</th>
            <th>Дата на бележка</th>
            <th>Създадена на:</th>
            <th>Редактирана на:</th>
            <th><button type="submit" class="btn btn-danger" name="delete9">Изтрий</button></th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($notes as $kay){

            echo '<tr>
                <th scope="row">'.$kay['note_id'].'</th>
                <td>'.$kay['title'].'</td>
                <td>'.$kay['description'].'</td>
                <td>'.$kay['note_date'].'</td>
                <td>'.$kay['created_at'].'</td>
                <td>'.$kay['updated_at'].'</td>
                <td><input type="checkbox" class="form-check-input" name="delete[]" value="'.$kay['note_id'].'"></td>
                <td><a href="index.php?page=editnote&note_id='.$kay['note_id'].'" class="btn btn-warning">Редактирай</a></td>
            </tr>' ;

    }
    ?>
        </tbody>
    </table>
</form>