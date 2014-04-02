
<?
    for($i = 0; $i < count($cats); $i++){
        if( $latest[$i] == null ) continue;

        ?>
        <div class="row-fluid">
        <div class="span12">
            <h2><?=$cats[$i]->title?></h2>
            <p>Последние объявления</p>
            <ul>
            <?
            $c = 0;
            foreach($latest[$i] as $post){
                if( $c >= 5) break;
                ?>
                <li><a href="/post/view/id/<?=$post->id?>"><?=$post->title?></a></li>
                <?
                $c++;
            }?>
            </ul>
            <a href='/post/category/id/<?=$cats[$i]->id?>'>Перейти в категорию</a>
        </div>
        </div>
        <?

        

    }



?>

