<form method="POST">
    <h2>Редактирай бележка за деня</h2>
    <div class="form-group">
        <label for="exampleFormControlInput1">Заглавие</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?=$var['title'];?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Описание</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?=$var['description'];?></textarea>
    </div>
    <div>
        <input type="date" id="myDate" name="note_date" value="<?=$var['note_date'] ;?>">
    </div>
    <div><br/></div>
    <div>
        <button type="submit" class="btn btn-primary" name="saved">Запиши</button>
    </div>
</form>