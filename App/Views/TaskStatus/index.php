<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Task Control</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tasks</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Change Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($models as $model) { ?>
                                        <?php
                                        if ($model->role == 'admin') {
                                            continue;
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $model->id ?></td>
                                            <td><?= $model->name ?></td>
                                            <td><?= $model->email ?></td>
                                            <td><?= $model->status ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($model->status == "0") { ?>
                                                    <form action="/activate" method="post">
                                                        <input type="hidden" name="id" value="<?= $model->id ?>">
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" name="ok" class="btn btn-success">Activate</button>
                                                    </form>
                                                <?php } else { ?>
                                                    <form action="/disactivate" method="post">
                                                        <input type="hidden" name="id" value="<?= $model->id ?>">
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit" name="ok" class="btn btn-danger">Disactiveate</button>
                                                    </form>
                                                <?php }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>