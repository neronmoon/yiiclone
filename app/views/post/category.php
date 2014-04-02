<h1>Объявления в категории <?=$model->title?></h1>
<? foreach($posts as $post){ ?>


    <div class="row-fluid">
        <div class="span12">
            <h2><?=$post->title?></h2>
            <p><?=Lib::cutString($post->body,300)?></p>
            <a href="/post/view/id/<?=$post->id?>">Читать полностью</a>
        </div>
    </div>
<? } ?>


<?if($countPages > 1){?>
<div class="row-fluid">
    <div class="pagination">
        <ul>
            <?for($i = 0; $i<$countPages; $i++){?>

                <li><a href="/post/category/id/<?=$model->id?>?page=<?=$i+1?>"><?=$i+1?></a></li>

            <?}?>
        </ul>
    </div>
</div>
<?}?>