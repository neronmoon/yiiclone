<h1><?=($model->id!=0)?'Изменение':'Создание' ?> объявления</h1>
<?if(isset($errors)){?>
    <div class="alert alert-error">
        <strong>Исправте следующие ошибки:</strong>
        <ul>
            <?foreach($errors as $error){
                ?>
                <li><?=$error?></li>
            <?
            }
            ?>
        </ul>
    </div>
<?
}
?>
<form method="POST">
    <div class="control-group">
        <label class="control-label" for="inputTitle">Название</label>
        <div class="controls">
            <input type="text"  name="title" id="inputTitle" placeholder="Название" value="<?=$model->title?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputCategory">Категория</label>
        <div class="controls">
            <select name="category" id="inputCategory">
                <?
                    foreach($cats as $cat){
                        ?>
                        <option <?=($cat->id == $model->category_id)?"selected":""?>  value="<?=$cat->id?>"><?=$cat->title?></option>
                        <?
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputBody">Текст</label>
        <div class="controls">
            <textarea name="body" style="width: 630px;height: 240px;" id="inputBody" placeholder="Текст объявления"><?=$model->body?></textarea>
        </div>
    </div>


    <div class="control-group">
        <div class="controls">
            <button type="submit" name="submit" class="btn">Сохранить</button>
        </div>
    </div>
</form>