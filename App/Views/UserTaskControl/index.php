<?php
// dd($models);
?>

<div class="content-wrapper kanban">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>User Task Control</h1>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Task Control</li>
                    </ol>
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
                    <div class="card card-info card-outline">
                        <?php
                        foreach ($models['rejected'] as $reject) { ?>
                            <div class="card-header">
                                <h5 class="card-title"><?=$reject->title?></h5>
                                <div class="card-tools">
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card card-row card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        To Do
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-primary card-outline">
                    <?php
                    foreach ($models['given'] as $given) { ?>
                        <div class="card-header">
                            <h5 class="card-title"><?=$given->title?></h5>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <?=$given->description?>
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card card-row card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        In Progress
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-light card-outline">
                    <?php
                    foreach ($models['in_progress'] as $progress) { ?>
                        <div class="card-header">
                            <h5 class="card-title"><?=$progress->title?></h5>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <?=$progress->description?>
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card card-row card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        Done
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-primary card-outline">
                    <?php
                    foreach ($models['done'] as $done) { ?>
                        <div class="card-header">
                            <h5 class="card-title"><?=$done->titile?></h5>
                            <div class="card-tools">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>