<div class="row-fluid">
    <h1>Пользователи</h1>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Логин</th>
        <th>Администратор</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
<?
    foreach( $models as $model ){

        ?>
            <tr>
                <td><?=$model->id?></td>
                <td><?=$model->login?></td>
                <td><? if( $model->role == 0 ){
                        ?>
                        <span class="label label-inverse">Нет</span>
                        <?
                    }else{
                        ?>
                        <span class="label label-success">Да</span>
                        <?
                    }?>
                </td>
                <td><a href="/useradmin/posts/id/<?=$model->id?>">Объявления</a> | <a href="/useradmin/edit/id/<?=$model->id?>">Изменить</a> |
                    <a href="/useradmin/delete/id/<?=$model->id?>">Удалить</a></td>
            </tr>

        <?


    }

?>
    </tbody>
</table>