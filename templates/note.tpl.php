<form method="POST">
    <h2>Създай бележка за деня <?=$_GET['noteDate'];?></h2>
    <div class="form-group">
        <label for="exampleFormControlInput1">Заглавие</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Описание</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>
    <div>
        <input type="date" id="myDate" name="note_date" value="<?=$_GET['noteDate'];?>">
    </div>
    <div><br/></div>
    <div>
        <button type="submit" class="btn btn-primary" name="save">Запиши</button>
    </div>
</form>