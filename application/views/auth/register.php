<!-- <script>
	var alamat = 'alamat';

	$(document).ready(function(){
		var autocomplete;
		autocomplete = new google.maps.places.Autocomplete((document.getElementById(alamat)),{
			types: ['geocode']
		});

		google.maps.event.addListener(autocomplete, 'place_changed',function(){
			var tempat_terdekat = autocomplete.getPlace();
			document.getElementById('latitude_input').value = tempat_terdekat.geometry.location.lat();
			document.getElementById('longitude_input').value = tempat_terdekat.geometry.location.lng();

			document.getElementById('longitude_view').innerHTML = tempat_terdekat.geometry.location.lng();
			document.getElementById('longitude_view').innerHTML = tempat_terdekat.geometry.location.lng();
		})

	});
	$(document).on('change','#'+alamat, function(){
		document.getElementById('latitude_input').value = '';
		document.getElementById('longitude_input').value = '';

		document.getElementById('longitude_view').innerHTML = '';
		document.getElementById('latitude_view').innerHTML = '';
	});


</script> -->
	
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
			<form class="login100-form validate-form">
				<span class="login100-form-title p-b-55">
					Register
				</span>

				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="text" name="text" placeholder="Nama">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-user"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="email" placeholder="Email" >

					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-envelope"></span>
					</span>
				</div>


				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="text" name="text" placeholder="No. HP">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-phone-handset"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="text" name="text" placeholder="Alamat" id="alamat">
					<input type="hidden" id="latitude_input">
					<input type="hidden" id="longitude_input">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-map-marker"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16">
					<!-- <input class="input100" type="text" name="text" placeholder="Alamat" > -->
					<select name="" id="" class="input100">
						<option value="" class="input100">Jakarta Pusat</option>
						<option value="" class="input100">Jakarta Timur</option>
						<option value="" class="input100">Jakarta Utara</option>
						<option value="" class="input100">Jakarta Selatan</option>
						<option value="" class="input100">Jakarta Barat</option>
					</select>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-apartment"></span>
					</span>
				</div>

		
	
				<!-- <div class="wrap-input100 validate-input m-b-16">
					<p><b>Latitude : </b> <span id="latitude_view"></span> </p>
					<p><b>Longitude : </b> <span id="longitude_view"></span> </p>
				</div>  -->

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
					<input class="input100" type="password" name="pass" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
					<input class="input100" type="password" name="pass" placeholder="Konfirmasi Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
					</span>
				</div>

				
				<div class="container-login100-form-btn p-t-25">
					<button class="login100-form-btn">
						Register
					</button>
				</div>

				<div class="text-center w-full mt-4">
					<span class="txt1">
						Sudah Punya Akun?
					</span>

					<a class="txt1 bo1 hov1" href="<?= base_url('auth'); ?>">
						Login					
					</a>
				</div>
				<hr />
				<div class="text-center w-full mt-4">
					<span class="txt1">
						<a href="<?= base_url('user'); ?>">Back to Home</a>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>

	

	
