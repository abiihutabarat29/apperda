<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('data-bagian') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= $title ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('data-fraksi/update/' . $fraksi['id']); ?>) ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $fraksi['id']; ?>">
                    <div class="card-body">
                        <div class="col-md-12 pr-0">
                            <div class="form-group <?= ($validation->hasError('fraksi')) ? 'has-error' : ''; ?>">
                                <label>Nama Fraksi<span class="text-danger">*</span></label>
                                <input name="fraksi" type="text" class="form-control" autocomplete="off" value="<?= (old('fraksi')) ? old('fraksi') : $fraksi['fraksi']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('fraksi'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-fraksi') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>