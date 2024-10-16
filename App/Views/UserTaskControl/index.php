<?php
// dd($models);
?>

<div class="content-wrapper kanban">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Tasks</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content pb-3">
        <div class="container-fluid h-100">
            <div class="card card-row card-danger">
                <div class="card-header">
                    <h3 class="card-title">
                        Rejected
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($models['rejected'] as $reject) { ?>
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?= $reject->title ?></h5>
                                <div class="card-tools">
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <!-- <div class="card card-row card-secondary">
                <div class="card-header">
                    <h3 class="card-title">
                        Given Tasks
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($models['rejected'] as $reject) { ?>
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?= $reject->title ?></h5>
                                <div class="card-tools">
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div> -->
            <div class="card card-row card-secondary">
                <div class="card-header">
                    <h3 class="card-title">
                        Given Tasks
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($models['given'] as $given) { ?>
                        <div class="card card-secondary card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?= $given->title ?></h5>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $given->description ?>
                                </p>
                                <form action="/start" method="post">
                                    <input type="hidden" name="task_id" value="<?=$given->id?>">
                                    <input type="hidden" name="task_status" value="2">
                                    <button name="ok" type="submit" class="btn btn-info end">To progress</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="card card-row card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        In Progress
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($models['in_progress'] as $progress) { ?>
                        <div class="card card-light card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?= $progress->title ?></h5>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $progress->description ?>
                                </p>
                                <form action="/start" method="post">
                                    <input type="hidden" name="task_id" value="<?=$progress->id?>">
                                    <input type="hidden" name="task_status" value="3">
                                    <button type="submit" name="ok" class="btn btn-success">To done</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="card card-row card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        Done
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($models['done'] as $done) { ?>
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?= $done->title ?></h5>
                                <div class="card-tools">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>