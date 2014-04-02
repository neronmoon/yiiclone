<h1><?=($model->id!=0)?'Изменение':'Создание' ?> пользователя</h1>
<form method="POST">
    <div class="control-group">
        <label class="control-label" for="inputLogin">Логин</label>
        <div class="controls">
            <input type="text" <?=($model->id != F::app()->user->id)?'disabled':''?> name="login" id="inputLogin" placeholder="Логин" value="<?=$model->login?>">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <label class="checkbox">
                <input name="role" type="checkbox" <?=($model->role)?'checked':''?> > Администратор
            </label>
            <button type="submit" name="submit" class="btn">Сохранить</button>
        </div>
    </div>
</form>