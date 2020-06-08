
    <h3>Добавить нового пользователя</h3>
    <form method="post" action="/users/">
        <input type="hidden" name="id" value="0">
        <div class="form-group">
            <label for="InputName">Имя пользователя</label>
            <input type="text" name="name" class="form-control" id="InputName" aria-describedby="emailHelp" required>
         </div>
        <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="InputEmail" required>
        </div>
        <div class="form-group">
            <label for="InputAge">Возраст</label>
            <input type="text" name="age" class="form-control" id="InputAge" required>
        </div>
        <button type="submit" class="btn btn-primary">Записать</button>
</form>
</div>

</body>
</html>