<? if(isset($errors)){
    ?>
    <div class="alert alert-error">
        <strong>Исправте следующие ошибки:</strong><br />
        <? foreach($errors as $error){
            echo $error.'<br />';
        }?>
    </div>

    <?
} ?>

<form action="/user/register" method="post">
    <table>
        <tr>
            <td>Логин:</td>
            <td><input type="text" name="login" /></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name='submit' class="btn" value="Загеристрироваться" /></td>
        </tr>
    </table>
</form>