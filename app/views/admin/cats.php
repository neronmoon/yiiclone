<div class="row-fluid">
    <h1>Категории</h1>
    <div class="pull-right">
        <a href="/categoryadmin/create" class="btn btn-success">Добавить категорию</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
<?
    foreach( $cats as $cat ){

        ?>
            <tr>
                <td><?=$cat->id?></td>
                <td><?=$cat->title?></td>
                <td><? if( $cat->status == 0 ){
                        ?>
                        <span class="label label-inverse">Не активно</span>
                        <?
                    }else{
                        ?>
                        <span class="label label-success">Активно</span>
                        <?
                    }?>
                </td>
                <td><a href="/categoryadmin/activate/id/<?=$cat->id?>">Активировать</a> | <a href="/categoryadmin/disactivate/id/<?=$cat->id?>">Деактивировать</a> |
                    <a href="/categoryadmin/edit/id/<?=$cat->id?>">Изменить</a> | <a href="/categoryadmin/delete/id/<?=$cat->id?>">Удалить</a></td>
            </tr>

        <?


    }

?>
    </tbody>
</table>