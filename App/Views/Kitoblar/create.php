<form action="/kcreate" method="post" enctype="multipart/form-data" style="margin-bottom: 50px;">
    <h2>Yangi Kitob</h2>
    <div class="mb-3">
        <label for="title" class="form-label">Sarlavahasi</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Sarlavahasi">
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Ta'rifi</label>
        <input type="text" name="desc" class="form-control" id="desc" placeholder="Qisqacha ta'rifi">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Matni</label>
        <textarea name="text" name="text" id="text" style="width: 100%;" placeholder="Matn"></textarea>
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Rasmi</label>
        <input type="file" name="img" class="form-control" id="img">
    </div><br>
    <select class="form-select"  name="janr" aria-label="Default select example">
        <?php
        foreach ($models['janr'] as $janr) { ?>
            <option value="<?=$janr->id?>"><?=$janr->name ?></option>
       <?php }
        ?>
    </select><br>
    <select class="form-select" name="muallif" aria-label="Default select example">
    <?php
        foreach ($models['muallif'] as $muallif) { ?>
            <option value="<?=$muallif->id?>"><?=$muallif->name ?></option>
       <?php }
        ?>
    </select><br>
    <button type="submit" name="ok" class="btn btn-success">Qo'shish</button>
</form>
