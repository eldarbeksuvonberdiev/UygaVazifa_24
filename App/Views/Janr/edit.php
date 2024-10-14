<h2>Janr tahrirlash</h2>
<form action="/jupdate" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nomi</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="<?= $models->name ?>">
    </div>
    <input type="hidden" name="id" value="<?=$models->id?>">
    <button type="submit" name="ok" class="btn btn-success">Saqlash</button>
</form>