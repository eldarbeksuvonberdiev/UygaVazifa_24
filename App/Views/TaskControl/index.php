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
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>Rejected Tasks</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>Given Tasks</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>In Progress </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Soni</h3>

                            <p>Done</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <a href="/add"><button type="submit" class="btn btn-primary mb-3">Vazifa qo'shish</button></a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barcha vazifalar ro'yxati</h3>
                        </div>
                        <!-- /.card-header -->
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