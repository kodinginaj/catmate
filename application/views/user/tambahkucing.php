
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
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="bungkus-img-detail">
                                    <img src="">
                                    </div>
                                </div>
                                <div class="col-lg-7" style="display: flex; flex-direction: column;">
                                    <div class="w-100 h-100">
                                       <div class="form-group">
                                            <label for="nama_kucings">Nama Kucing:</label>
                                            <input type="" id="nama_kucing" class="form-control" name="">
                                       </div>
                                       <div class="form-group">
                                            <label for="nama_kucings">Jenis / Ras Kucing:</label>
                                            <select class="form-control select2">
                                                <option>Pilih Ras</option>
                                                <option>Persia Bagong</option>
                                            </select>
                                       </div>
                                       <div class="form-group">
                                        <label>Jenis Kelamin:</label>
                                           <div class="">
                                              <input type="radio" id="jantan" name="customRadio" class="">
                                              <label class="" for="jantan" style="color: #333;">Jantan</label>
                                            </div>

                                            <div class="">
                                              <input type="radio" id="betina" name="customRadio" class="">
                                              <label class="" for="betina" style="color: #333;">Betina</label>
                                            </div>
                                       </div>
                                        <div class="form-group">
                                            <label for="nama_kucings">Tanggal Lahir:</label>
                                            <input type="date" name="" class="form-control">
                                       </div>

                                       <div class="form-group">
                                            <label for="nama_kucings">Bio:</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                       </div>

                                       <div class="form-group">
                                            <label for="nama_kucings">Social Media:</label>
                                            <input type="" id="nama_kucing" class="form-control" name="" placeholder="(cth: https://insagram.com/catcute)">
                                       </div>


                                      <div class="form-group">
                                        <label>Foto Kucing:</label>
                                        <div class="file-field">
                                          <div class="btn btn-catmate float-left m-0 btn-upload-poster">
                                            <span onclick="chooseFile();" style="cursor: pointer">Choose file</span>
                                            <input type="file" id="fileInput" name="photo" style="display: none;" class="btn-upload-profile"/>
                                          </div>
                                          <div class="file-path-wrapper">
                                            <span class="">&nbsp; No file uploaded</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="w-100">
                              
                        
                                    <a href="#" class="btn btn-primary btn-block mt-4" style="align-self: flex-end;">Submit</a>
                                    </div>
                                </div>
                            </div>
                            
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


   
