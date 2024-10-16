<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Task Control</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Task Control</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <a href="/"><button type="button" class="btn btn-primary mb-3">Qaytish</button>
            </a>
            <form action="/add" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Task Title">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Task Description</label>
                    <input type="text" name="desc" class="form-control" id="desc" placeholder="Task Description">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Task Image</label>
                    <input type="file" name="img" class="form-control" id="img">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Task for User</label>
                    <select class="form-select" name="user" aria-label="Default select example">
                        <?php
                            foreach ($models as $model) { ?>
                                <option value="<?=$model->id?>"><?=$model->name?></option>
                           <?php }
                        ?>
                    </select>
                </div>
                <button type="submit" name="ok" class="btn btn-success">Qo'shish</button>
            </form>
        </div>
    </section>
</div>