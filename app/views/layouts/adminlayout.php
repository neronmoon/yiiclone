
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Axioma Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">Axioma Test</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="/user/logout" class="navbar-link">Выйти</a>
                </p>
                <ul class="nav">
                    <li class="active"><a href="/admin/index">Главная</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Меню</li>
                    <? if(F::app()->user->role == 1){ ?>
                        <li><a href="/admin/category">Категории</a></li>
                        <li><a href="/admin/users">Пользователи</a></li>
                    <?}?>
                    <li><a href="/admin/posts">Объявления</a></li>


                </ul>
            </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            <?=$content?>

        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>Тестовое задание</p>
    </footer>

</div>


</body>
</html>
