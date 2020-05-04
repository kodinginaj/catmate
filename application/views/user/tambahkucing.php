<?php if($this->session->flashdata('message')!=null): ?>
<script>
    window.alert('<?= $this->session->flashdata('message') ?>')
</script>
<?php endif; ?>
    <!-- // end .section -->
    <div class="section">

        <div class="container">
            <div class="section-title">
                <h3 class="txt-pink">Tambah Kucing</h3>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <form action="<?= base_url('user/tambahKucingProses'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-lg-5" style="display: flex;">
                                        <img src="<?= base_url('assets/images/cat1.svg'); ?>" class="w-100">
                                    </div>
                                    <div class="col-lg-7" style="display: flex; flex-direction: column;">
                                        <div class="w-100 h-100">
                                        <div class="form-group">
                                                <label for="nama_kucings">Nama Kucing:</label>
                                                <input type="text" id="nama_kucing" class="form-control" name="nama">
                                                <input type="hidden" id="nama_kucing" class="form-control" name="user_id" value="<?= $this->session->userdata('id') ?>">
                                        </div>
                                        <div class="form-group">
                                                <label for="nama_kucings">Jenis / Ras Kucing:</label>
                                                <select class="form-control select2 w-100" name="ras_id">
                                                    <option value="">Pilih Ras</option>
                                                    <?php foreach($ras as $row): ?>
                                                        <option value="<?= $row['id'] ?>" ><?= $row['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin:</label>
                                            <div class="">
                                                <input type="radio" id="jantan" name="jk" class="" value="Jantan">
                                                <label class="" for="jantan" style="color: #333;">Jantan</label>
                                                </div>

                                                <div class="">
                                                <input type="radio" id="betina" name="jk" class="" value="Betina"> 
                                                <label class="" for="betina" style="color: #333;">Betina</label>
                                                </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="nama_kucings">Tanggal Lahir:</label>
                                                <input type="date" name="tanggal_lahir" class="form-control">
                                        </div>

                                        <div class="form-group">
                                                <label for="nama_kucings">Bio:</label>
                                                <textarea class="form-control" rows="3" name="biodata"></textarea>
                                        </div>

                                        <div class="form-group">
                                                <label for="nama_kucings">Social Media:</label>
                                                <input type="text" id="nama_kucing" class="form-control" name="sosial_media" placeholder="(cth: https://insagram.com/catcute)">
                                        </div>


                                        <div class="form-group">
                                            <label>Foto Kucing:</label>
                                            <div class="file-field">
                                            <div class="btn btn-catmate float-left" onclick="chooseFile();" style="cursor: pointer"><span>Choose file</span></div>
                                                
                                                <input type="file" id="fileInput" name="foto" style="display: none;" class="btn-upload-profile"/>
                                            
                                            <div class="file-path-wrapper">
                                                <span class="">&nbsp; No file uploaded</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="w-100">
                                            <button type="submit" class="btn btn-primary btn-block mt-4" style="align-self: flex-end;">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->
<script>
   function chooseFile() {
      $("#fileInput").click();
   }
</script>


   
