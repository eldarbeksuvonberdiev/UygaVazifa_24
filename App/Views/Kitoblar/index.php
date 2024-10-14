<h1>Kitoblar</h1>
    <a href="/kcreate"><button type="submit" class="btn btn-success" style="margin-top: 15px;margin-bottom:20px;">Yangi Kitob</button></a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Sarlavha</th>
            <th scope="col">Muallifi</th>
            <th scope="col">Janri</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($models as $model) { ?>
            <tr>
                <th scope="row"><?= $model->id ?></th>
                <td><?= $model->title ?></td>
                <td><?= $model->description ?></td>
                <td><?= $model->jname ?></td>
                <td><?= $model->mname ?></td>
                <td>
                    <form action="/kedit">
                        <input type="hidden" name="id" value="<?= $model->id ?>">
                        <button type="submit" name="ok" class="btn btn-danger"><i class="bi bi-pencil-fill"></i></button>
                    </form>
                </td>
                <td>
                    <form action="/kdelete" method="post">
                        <input type="hidden" name="id" value="<?= $model->id ?>">
                        <button type="submit" name="ok" class="btn btn-warning"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>