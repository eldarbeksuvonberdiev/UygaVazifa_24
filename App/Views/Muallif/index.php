<h1>Mualliflar</h1>
<form action="/mcreate" method="post">
    <button type="submit" class="btn btn-success" style="margin-top: 15px;margin-bottom:20px;">Yangi Muallif</button>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Shu Muallif kitoblari soni</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($models as $model) { ?>
            <tr>
                <th scope="row"><?= $model->id ?></th>
                <td><?= $model->name ?></td>
                <td><?=$model->muallif?></td>
                <td>
                    <form action="/medit" method="post">
                        <input type="hidden" name="id" value="<?=$model->id?>">
                        <button type="submit" name="ok" class="btn btn-danger"><i class="bi bi-pencil-fill"></i></button>
                    </form>
                </td>
                <td>
                    <form action="/mdelete" method="post">
                        <input type="hidden" name="id" value="<?=$model->id?>">
                        <button type="submit" name="ok" class="btn btn-warning"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>