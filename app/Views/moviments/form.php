<?= $this->extend('Templates/default/index') ?>

<?= $this->section('main') ?>

<main>
    <div id="form-moviment">
        <form action="<?php echo base_url() ?>/moviments/save" method="POST">
            <input type="hidden" name="id_moviment" />
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Value</label>
                <span class="input-group-text" id="basic-addon1">R$</span>
                <input type="text" name="value" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Type</label>
                <select name="type">
                    <option></option>
                    <option value="input">In</option>
                    <option value="output">Out</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="submit" name="save_moviment" value="Save" />
            </div>
        </form>
    </div>
</main>

<?= $this->endSection() ?>