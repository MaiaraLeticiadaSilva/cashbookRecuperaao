<?= $this->extend('Templates/default/index') ?>

<?= $this->section('main') ?>

<main>
    <div id="form-moviment">
        <form action="<?php echo base_url() ?>/user/save" method="POST" style="margin-top: 3vw;">
            <input type="hidden" name="id_moviment" />
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" style="margin-right: 1vw;" class="form-label">Type</label>
                <select name="type">
                    <option></option>
                    <option value="counter">Counter</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="submit" name="save_user" value="Save" />
            </div>
        </form>
    </div>
</main>

<?= $this->endSection() ?>