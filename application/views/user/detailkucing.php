<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        // var lat = document.getElementById('map').getAttribute('lat');


    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?= $kucing['user']['latitude'] ?>, lng: <?= $kucing['user']['longitude'] ?>},
            zoom: 15
        });

        var request = {
            placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4',
            fields: ['name', 'formatted_address', 'place_id', 'geometry']
        };

        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails(request, function(place, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                'Place ID: ' + place.place_id + '<br>' +
                place.formatted_address + '</div>');
                infowindow.open(map, this);
            });
            }
        });
    }
</script>




    <!-- // end .section -->
    <div class="section">
        <input type="hidden" id="lat" value="">
        <div class="container">
            <div class="section-title">
                <h3 class="txt-pink">Detail Kucing</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="bungkus-img-detail">
                                    <img src="<?= base_url(''.$kucing['foto']); ?>" class="img-detail-kucing">
                                    </div>
                                </div>
                                <div class="col-lg-7" style="display: flex; flex-direction: column;">
                                    <div class="w-100 h-100">
                                        <table class="tb-kucing">
                                            <tr>
                                                <td>Nama Kucing</td>
                                                <td>:</td>
                                                <td><?= $kucing['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kucing</td>
                                                <td>:</td>
                                                <td><?= $kucing['ras']['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?= $kucing['jk'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Usia</td>
                                                <td>:</td>
                                                <?php 
                                                    // $tahun = date_diff(date_create($kucing['tanggal_lahir']), date_create('today'))->y;
                                                    $birthday = new DateTime($kucing['tanggal_lahir']);
                                                    $diff = $birthday->diff(new DateTime());
                                                    $totalmonths = $diff->format('%m') + 12 * $diff->format('%y');
                                                    // $bulan = 9;
                                                    // $tahun = $totalmonths / 12;
                                                    // echo $tahun;

                                                ?>
                                                <td> <?= $totalmonths ?> bulan</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td><?= $kucing['biodata'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sosial Media</td>
                                                <td>:</td>
                                                <td><a href="<?= $kucing['sosial_media'] ?>">Instagram</a></td>
                                            </tr>
                                            <tr>
                                                <td>Pemilik</td>
                                                <td>:</td>
                                                <td><?= $kucing['user']['nama'] ?></td>
                                            </tr>
                                        </table>
                                    
                        
                                    
                                    </div>
                                    <?php
                                        $nomor = $kucing['user']['telepon'];
                                        $split = str_split($nomor);
                                        if ($split[0] == "0") {
                                            $split[0] = "62";
                                        }
                                        $gabung = implode($split);
                                        
                                    ?>
                                    <div class="w-100">
                                        <a href="https://api.whatsapp.com/send?phone=<?= $gabung ?>" class="btn btn-catmate-secondary btn-block mt-4" style="align-self: flex-end;">
                                            <i class="fab fa-whatsapp"></i> &nbsp;Hubungi Pemilik
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <p>Lokasi Kucing :</p>
                                    <div id="map" data-lat="<?= $kucing['user']['latitude'] ?>" data-lng="<?= $kucing['user']['longitude'] ?>" style="width: 100%; height: 450px;">
                                    
                                    </div>
                                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.379500492765!2d106.87684175000001!3d-6.18493695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4fa9bb853ff%3A0x66639f72c903e762!2sPT%20ASDP%20Indonesia%20Ferry%20(Persero)!5e0!3m2!1sen!2sid!4v1588563908623!5m2!1sen!2sid" class="w-100" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="recent-post shadow">
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <th class="bar-kucinglain txt-pink">Kucing Lainnya</th>
                                </tr>
                                
                                <?php foreach($kucinglainnya as $row): ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('user/detailKucing/'.$row['id']);  ?>">
                                            <img src="<?= base_url(''.$row['foto']); ?>">

                                            <h1><?= $row['nama'] ?></h1>
                                            <p>
                                                <?= $row['biodata'] ?>
                                            </p>
                                        
                                        
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>                
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->


   
