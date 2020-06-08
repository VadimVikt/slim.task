
    <h2><?=$title?></h2>
    <div class="row">
        <div class="col-2">ID пользователя</div>
        <div class="col-4">Имя пользователя</div>
        <div class="col-4">Емайл</div>
        <div class="col-2">Возраст</div>
    </div>  <hr>
    <div class="row">

    <?php
        foreach ($users['users'] as $user) :?>
            <div class="col-2"><a href="/users/<?=$user['id']?>/edit" title="Изменить или Удалить"><?=$user['id']?></a></div>
            <div class="col-4"><?=$user['name']?></div>
            <div class="col-4"><?=$user['email']?></div>
            <div class="col-2"><?=$user['age']?></div>
    <?php endforeach;?>
    </div>
</div>

</body>
</html>