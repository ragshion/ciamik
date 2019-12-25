<main id="js-page-content" role="main" class="page-content">
    <div class="modal fade" id="modal-tambah" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-plus-hexagon"></i> Tambah Data Perumahan
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="js-summernote"></div> -->
                    <form method="post" action="<?=base_url('perumahan/save')?>" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label class="form-label">Nama Perumahan</label>
                            <input type="text" name="nama_perumahan" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi/Alamat</label>
                            <textarea type="text" name="lokasi" class="form-control" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Pengembang</label>
                            <input type="text" name="nama_pengembang" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Luas</label>
                            <input type="number" name="luas" class="form-control" required="">
                            <div class="help-block">m<sup>2</sup></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tipe</label>
                            <select class="form-control" multiple="" name="tipe[]">
                                <?php $tip = $this->db->get('type_perumahan')->result_array();?>
                                <?php foreach ($tip as $k): ?>
                                    <option value="<?=$k['type']?>">Tipe <?=$k['type']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kecamatan</label>
                            <select class="form-control" id="kecamatan">
                                <?php $kec = $this->db->get('kecamatan')->result_array();?>
                                <?php foreach ($kec as $k): ?>
                                    <option value="<?=$k['id_kecamatan']?>"><?=$k['nama_kecamatan']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Desa</label>
                            <select class="form-control" name="id_desa" id="desa" required="">
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kisaran Harga (Rp.)</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="mulai_dari" class="form-control" required="">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="sampai_dengan" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Koordinat</label>
                            <div class="row">
                                <div class="col-sm-4">
                                <div class="form-group mt-0 pb-0">
                                    <label>Manual ?</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cb_manual">
                                        <label class="custom-control-label" for="cb_manual">Manual</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mt-0 pb-0">
                                    <div class="form-line">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="latitude" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mt-0 pb-0">
                                    <div class="form-line">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" id="longitude" readonly="">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                <input id="pac-input" class="form-control col-md-6 mt-2" type="text" placeholder="Cari Tempat. . ." style="background-color: white">
                            </div>
                                <div class="card px-3">
                                  <div id="map" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label class="form-label">Foto</label>
                            <input type="file" name="userFiles[]" class="form-control" required="" multiple="">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-plus-hexagon"></i> Edit Data Perumahan
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?=base_url('perumahan/update')?>" enctype='multipart/form-data'>
                        <input type="hidden" name="xid" id="xid">
                        <div class="form-group">
                            <label class="form-label">Nama Perumahan</label>
                            <input type="text" name="nama_perumahan" id="nama_perumahan" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <textarea type="text" name="lokasi" id="lokasi" class="form-control" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Pengembang</label>
                            <input type="text" name="nama_pengembang" id="nama_pengembang" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Luas</label>
                            <input type="number" name="luas" id="luas" class="form-control" required="">
                            <div class="help-block">m<sup>2</sup></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tipe</label>
                            <select class="form-control" multiple="" name="tipe[]" id="tipe">
                                <?php $tip = $this->db->get('type_perumahan')->result_array();?>
                                <?php foreach ($tip as $k): ?>
                                    <option value="<?=$k['type']?>">Tipe <?=$k['type']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kecamatan</label>
                            <select class="form-control" id="ekecamatan">
                                <?php $kec = $this->db->get('kecamatan')->result_array();?>
                                <?php foreach ($kec as $k): ?>
                                    <option value="<?=$k['id_kecamatan']?>"><?=$k['nama_kecamatan']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Desa</label>
                            <select class="form-control" name="id_desa" id="edesa" required="">
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kisaran Harga (Rp.)</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="mulai_dari" id="mulai_dari" class="form-control" required="">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="sampai_dengan" id="sampai_dengan" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Koordinat</label>
                            <div class="row">
                                <div class="col-sm-4">
                                <div class="form-group mt-0 pb-0">
                                    <label>Manual ?</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ecb_manual">
                                        <label class="custom-control-label" for="ecb_manual">Manual</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mt-0 pb-0">
                                    <div class="form-line">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="elatitude" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mt-0 pb-0">
                                    <div class="form-line">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" id="elongitude" readonly="">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                <input id="epac-input" class="form-control col-md-6 mt-2" type="text" placeholder="Cari Tempat. . ." style="background-color: white">
                            </div>
                                <div class="card px-3">
                                  <div id="emap" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label class="form-label">Foto</label>
                            <input type="file" name="userFiles[]" class="form-control" multiple="">
                        </div>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-window-close"></i> Tutup</button>
                        <button type="submit" class="btn btn-info"><i class="far fa-save"></i> Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="far fa-image"></i> Tabel <span class="fw-300"><i>Perumahan</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="panel-tag">
                            Data Perumahan yang ada di Kabupaten Batang
                        </div>
                        <?= $this->session->flashdata('alert'); ?>
                        <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-primary"><i class="far fa-plus-hexagon"></i> Tambah Data Perumahan</button>
                        <hr>
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perumahan</th>
                                    <th>Alamat</th>
                                    <th>Nama Pengembang</th>
                                    <th>Luas</th>
                                    <th>Tipe</th>
                                    <th>Kisaran Harga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Tahun</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($data as $d): ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$d['nama_perumahan']?></td>
                                        <td><?=$d['lokasi']?></td>
                                        <td><?=$d['nama_pengembang']?></td>
                                        <td><?=$d['luas']?> m<sup>2</sup></td>
                                        <td><?=$d['id_type']?></td>
                                        <td><?=$d['kisaran_harga']?></td>
                                        <td><a href="<?=base_url('uploads/').$d['foto']?>" target="_blank"><img height="100" src="<?=base_url('uploads/').$d['foto']?>"></a></td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-secondary btn-icon rounded-circle" onclick="edit_perumahan('<?=$d['id']?>')"><i class="far fa-edit"></i></a>
                                            <a href="javascript:;" class="btn btn-danger btn-icon rounded-circle del" rel="<?=base_url('perumahan/hapus/').$d['id']?>"><i class="far fa-trash"></i></a>
                                        </td>
                                        <td><?=$d['penanggung_jawab']?></td>
                                        <td><?=$d['tahun']?></td>
                                        <td><?=$d['jumlah']?></td>
                                        <td><a href="https://www.google.com/maps?daddr=<?=str_replace(";", ",", $d['latlng'])?>" target="_blank" class="btn btn-secondary btn-icon rounded-circle"><i class="far fa-map"></i></a></td>
                                        <td><?=tanggal_indo(date('Y-m-d', strtotime($d['tgl_input'])))?></td>
                                    </tr>
                                <?php $no++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perumahan</th>
                                    <th>Alamat</th>
                                    <th>Nama Pengembang</th>
                                    <th>Luas</th>
                                    <th>Tipe</th>
                                    <th>Kisaran Harga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Tahun</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Input</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>