<h1><?=($model->id!=0)?'Изменение':'Создание' ?> категории</h1>
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
            <input type="text" name="title" id="inputTitle" placeholder="Название" value="<?=$model->title?>">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <label class="checkbox">
                <input name="status" type="checkbox" <?=($model->status)?'checked':''?> > Активна
            </label>
            <button type="submit" name="submit" class="btn">Сохранить</button>
        </div>
    </div>
</form>