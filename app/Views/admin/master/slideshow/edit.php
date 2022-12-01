<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('admin/home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/slideshow') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <?= $title ?>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('admin/slideshow/update/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group <?= ($validation->hasError('keterangan')) ? 'has-error' : ''; ?>">
                                    <label>Keterangan<span class="text-danger">*</span></label>
                                    <input name="keterangan" type="text" class="form-control" autocomplete="off" value="<?= (old('keterangan')) ? old('keterangan') : $data['keterangan']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('keterangan'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?= ($validation->hasError('gambar')) ? 'has-error' : ''; ?>">
                                    <label>Gambar<span class="text-danger">*</span></label>
                                    <input type="file" name="gambar" class="form-control-file" id="gambar" onchange="readURL(this);" accept=".png, .jpg, .jpeg">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('gambar'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img id="show" src="<?= base_url('media/slideshow/' . $data['gambar']) ?>" class="" width="280" height="180" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                        <a href="<?= base_url('admin/slideshow') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>