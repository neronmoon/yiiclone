<h1><?=$model->title?></h1>
<p><?=$model->body?></p>
<p>Дата создания: <?=$model->dt_create?></p>
<p>Категория: <a href="/post/category/id/<?=$category->id?>"><?=$category->title?></a></p>
<p>Автор: <a href="/post/author/id/<?=$author->id?>"><?=$author->login?></a></p>