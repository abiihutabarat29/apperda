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
                <a href=""><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-slideshow/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="col-md-12 pr-0">
                            <div class="form-group">
                                <label>keterangan<span class="text-danger">*</span></label>
                                <input name="keterangan" type="text" class="form-control" autocomplete="off" value="<?= old('keterangan'); ?>">
                                <div class="form-group">
                                    <label>Gambar<span class="text-danger">*</span></label>
                                    <input type="file" name="gambar" class="form-control" id="gambar" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
                                </div>
                                <div class="form-group col-md-6">
                                    <img id="blah" src="/template/assets/img/no_image.jpg" class="" width="280" height="180" />
                                </div>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('data-slideshow') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>