<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/surat_masuk') ?>">User</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('admin/surat_masuk/edit') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>NO SURAT MASUK <code>*</code></label>
                        <input type="hidden" class="form-control" name="id" value="<?= $surat->id; ?>" required />
                        <input type="text" class="form-control" name="no_surat" value="<?= $surat->no_surat; ?>" placeholder="NO SURAT MASUK" disabled required />
                    </div>
                    <div class="mb-3">
                        <label>PERIHAL SURAT <code>*</code></label>
                        <input type="text" class="form-control" name="perihal" value="<?= $surat->perihal; ?>" placeholder="PERIHAL SURAT" required />
                    </div>
                    <div class="mb-3">
                        <label>TANGGAL SURAT <code>*</code></label>
                        <input type="date" class="form-control" name="tgl_surat" value="<?= $surat->tgl_surat; ?>" placeholder="TANGGAL SURAT" disabled required />
                    </div>
                    <div class="mb-3">
                        <label>SURAT DARI <code>*</code></label>
                        <input type="text" class="form-control" name="surat_from" placeholder="SURAT DARI" value="<?= $surat->surat_from; ?>" disabled required />
                    </div>
                    <div class="mb-3">
                        <label>TUJUAN SURAT <code>*</code></label>
                        <input type="text" class="form-control" name="surat_to" value="<?= $surat->surat_to; ?>" placeholder="TUJUAN SURAT" required />
                    </div>
                    <div class="mb-3">
                        <label>TANGGAL TERIMA SURAT <code>*</code></label>
                        <input type="date" class="form-control" name="tgl_terima" value="<?= $surat->tgl_surat; ?>" placeholder="TANGGAL TERIMA SURAT" disabled required />
                    </div>
                    <div class="mb-3">
                        <label for="username">KETERANGAN <code>*</code></label>
                        <textarea class="form-control" name="keterangan" id="floatingTextarea2" style="height: 100px" placeholder="KETERANGAN"> <?= $surat->keterangan; ?> </textarea>
                    </div>
                    <div class="card text-dark bg-light mb-3" style="max-width: 40rem;">
                        <div class="card-header">
                            <h5 class="card-title">Gambar Lampiran : <?= $surat->image; ?></h5>
                        </div>
                        <div class="card-body">
                            <img src="<?php echo base_url(); ?>assets/photo/surat_masuk<?php echo $surat->image; ?>" class="card-img" width="500">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image">BERKAS SURAT (Photo)</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                        <input type="hidden" class="form-control" name="old_image" value="<?= $surat->image; ?>" required />
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save Data</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>