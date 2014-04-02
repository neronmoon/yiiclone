<div class="row-fluid">
    <h1>Объявления пользователя <?=$model->login?></h1>
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
    foreach( $posts as $post ){

        ?>
            <tr>
                <td><?=$post->id?></td>
                <td><?=$post->title?></td>
                <td><?=Lib::cutString($post->body,140)?></td>
                <td><?=R::load('user',$post->author_id)->login?></td>
                <td><? if( $post->status == 0 ){
                        ?>
                        <span class="label label-inverse">Ожидает подтверждения</span>
                        <?
                    }elseif($post->status == 1){
                        ?>
                        <span class="label label-success">Активно</span>
                        <?
                    }elseif($post->status == 2){
                        ?>
                        <span class="label label-danger">Отклонено</span>
                        <?
                    }?>
                </td>
                <td><a href="/postadmin/approve/id/<?=$post->id?>">Одобрить</a> | <a href="/postadmin/disapprove/id/<?=$post->id?>">Отклонить</a></td>
            </tr>

        <?


    }

?>
    </tbody>
</table>