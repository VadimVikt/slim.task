
    <h2>Изменить данные или удалить пользователя</h2>
    <form method="post" action="/users/<?=$oldUser['id']?>">
        <input type="hidden" name="id" value="<?=$oldUser['id']?>">
        <div class="form-group">
            <label for="InputName">Имя пользователя</label>
            <input type="text" name="name" value="<?=$oldUser['name']?>" class="form-control" id="InputName" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" name="email" value="<?=$oldUser['email']?>" class="form-control" id="InputEmail" required>
        </div>
        <div class="form-group">
            <label for="InputAge">Возраст</label>
            <input type="text" name="age" value="<?=$oldUser['age']?>" class="form-control" id="InputAge" required>
        </div>
        <button type="submit" class="btn btn-primary">Изменить данные</button>
    </form>
    <br>
    <form method="post" action="/users/<?=$oldUser['id']?>/del">
        <input type="hidden" name="id" value="<?=$oldUser['id']?>">
        <input type="hidden" name="name" value="<?=$oldUser['name']?>">
        <button type="submit" class="btn btn-danger">Удалить пользователя</button>
    </form>
</div>

</body>
</html>