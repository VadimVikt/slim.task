
<?php
    if(isset($delete)) : ?>
    <div class="alert alert-dark" role="alert">
        Пользователь с ID = <?=$param['id']?>, <?=$param['name']?> удален
    </div>
<?php elseif(isset($saveFile) && $saveFile == true):?>
    <div class="alert alert-info" role="alert">
        Пользователь - <?=$param['name']?> успешно добавлен - ID = <?=$param['id']?>
    </div>
<?php elseif (isset($updateFile) && $updateFile == true) :?>
    <div class="alert alert-success" role="alert">
        Данные пользователя с ID = <?=$param['id']?> успешно обновлены
    </div>
<?php else :?>
    <div class="alert alert-warning" role="alert">
        Чтото пошло не так
    </div>
<?php endif;?>
</div>
</body>
</html>