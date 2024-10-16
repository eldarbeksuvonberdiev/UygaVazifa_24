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
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>All Tasks</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-list-task"></i>
                        </div>
                        <a href="/" class="small-box-footer">All... <i class="bi bi-arrow-down-circle"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <form action="/given" method="post">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>Soni</h3>
                                <p>Given Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-person-workspace"></i>
                            </div>
                            <a href="/given" class="small-box-footer">All...<i class="bi bi-arrow-down-circle"></i></a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>In Progress </p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-git"></i>
                        </div>
                        <a href="#" class="small-box-footer">All... <i class="bi bi-arrow-down-circle"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>Done</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">All... <i class="bi bi-arrow-down-circle"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>Rejected Tasks</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </div>
                        <a href="#" class="small-box-footer">All... <i class="bi bi-arrow-down-circle"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>Ready Tasks</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-check2-all"></i>
                        </div>
                        <a href="#" class="small-box-footer">All... <i class="bi bi-arrow-down-circle"></i></a>
                    </div>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <a href="/add"><button type="submit" class="btn btn-secondary mb-3">Give Task</button></a>
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>User</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($models as $model) { ?>
                                        <tr>
                                            <td><?= $model->id ?></td>
                                            <td><?= $model->title ?></td>
                                            <td><?= $model->description ?></td>
                                            <td><?php
                                                if (!$model->img) {
                                                    echo "";
                                                } else {
                                                    echo "<img src='$model->img'' alt='' width='100px'>";
                                                } ?>
                                            </td>
                                            <td><?= $model->name ?></td>
                                            <td>
                                                <?php
                                                if ($model->status == '0') { ?>
                                                    <button type="button" class="btn btn-danger" disabled>Rejected</button>
                                                <?php } elseif ($model->status == '1') { ?>
                                                    <button type="button" class="btn btn-secondary" disabled>Given</button>
                                                <?php } elseif ($model->status == '2') { ?>
                                                    <button type="button" class="btn btn-info" disabled>In Progress</button>
                                                <?php } elseif ($model->status == '3') { ?>

                                                    <button type="button" class="btn btn-success" disabled>Done</button>

                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $model->id ?>">Accept or Reject</button>

                                                    <div class="modal fade" id="exampleModal<?= $model->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel" align="center">Reject the task</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/reject" method="post">
                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="id" value="<?= $model->id ?>">
                                                                            <input type="hidden" name="status" value="0">
                                                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                                            <input type="text" class="form-control" id="recipient-name" value="<?= $model->name ?>" readonly>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="message-text" class="col-form-label">Message:</label>
                                                                            <textarea class="form-control" id="message-text" name="comment"></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="ok" class="btn btn-danger">Reject the task</button>
                                                                        </div>
                                                                    </form>
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Accept the task</h1>
                                                                    <form action="/accept" method="post">
                                                                        <input type="hidden" name="id" value="<?= $model->id ?>">
                                                                        <input type="hidden" name="status" value="4">
                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="ok" class="btn btn-success">Accept</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } elseif ($model->status == '4') { ?>
                                                    <button type="button" class="btn btn-dark" disabled>Ready</button>
                                                <?php } ?>
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