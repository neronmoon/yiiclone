<div class="row-fluid">
    <h1>Объявления</h1>
    <div class="pull-right">
        <a href="/postadmin/create" class="btn btn-success">Добавить объявление</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Краткий текст</th>
        <th>Автор</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
<?
    foreach( $models as $model ){

        ?>
            <tr>
                <td><?=$model->id?></td>
                <td><?=$model->title?></td>
                <td><?=Lib::cutString($model->body,140)?></td>
                <td><?=R::load('user',$model->author_id)->login?></td>
                <td><? if( $model->status == 0 ){
                        ?>
                        <span class="label label-inverse">Ожидает подтверждения</span>
                        <?
                    }elseif($model->status == 1){
                        ?>
                        <span class="label label-success">Активно</span>
                        <?
                    }elseif($model->status == 2){
                        ?>
                        <span class="label label-danger">Отклонено</span>
                        <?
                    }?>
                </td>
                <td><a href="/postadmin/edit/id/<?=$model->id?>">Изменить</a> | <a href="/postadmin/delete/id/<?=$model->id?>">Удалить</a></td>
            </tr>

        <?


    }

?>
    </tbody>
</table>