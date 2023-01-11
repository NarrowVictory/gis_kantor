<div class="col-sm-7">
	<div class="panel panel-default">
		<div class="panel-heading">
			Lokasi
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div id="map" style="height: 400px;"></div>
		</div>
	</div>
</div>
<div class="col-sm-5">
	<div class="panel panel-default">
		<div class="panel-heading">
			Data
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			
			<?php 
			$errors = session()->getFlashdata('errors');
			if (!empty($errors)) { ?>
			<div class="alert alert-danger">
				!!! Ada pesan Kesalahan yaitu :
				<ul>
					<?php foreach ($errors as $key => $error) { ?>
					    <li> <?= esc($error) ?> </li>
					<?php } ?>
				</ul>
			</div>		
			<?php } ?>

			<?php echo form_open_multipart('kantor/update/'.$kantor['id_kantor']); ?>		
			<div class="form-group">
				<label>Nama Kantor</label>
				<input class="form-control" value="<?= $kantor['nama_kantor'] ?>" type="text" name="nama_kantor" placeholder="Nama Kantor">
			</div>
			<div class="form-group">
				<label>No Telpon</label>
				<input class="form-control" value="<?= $kantor['no_telp'] ?>" name="no_telp" placeholder="No. Telpon">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" placeholder="Alamat"> <?= $kantor['alamat'] ?> </textarea>
			</div>
			<div class="form-group">
				<label>Latitude</label>
				<input class="form-control" value="<?= $kantor['lat'] ?>" name="lat" id="lat" placeholder="Latitude">
			</div>
			<div class="form-group">
				<label>Longitude</label>
				<input class="form-control" name="long" value="<?= $kantor['long'] ?>" id="long" placeholder="Longitude">
			</div>
			<div class="form-group">
				<label>Deskripsi</label>
				<input class="form-control" value="<?= $kantor['deskripsi'] ?>" name="deskripsi" placeholder="Deskripsi">
			</div>
			<div class="form-group">
				<img src="<?= base_url('foto/'.$kantor['foto']) ?>" width="100px"><br>
				<label>Ganti Foto</label>
				<input required class="form-control" type="file" name="foto">
			</div>
			<div class="form-group">
				<button class="btn btn-success pull-right">Simpan</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	var curLocation=[0,0];
	if (curLocation[0]==0 && curLocation[1]==0) {
		curLocation=[5.114792,97.169631];
	}
	var map = L.map('map').setView([5.114792, 97.169631], 16);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
	}).addTo(map);
	map.attributionControl.setPrefix(false);
	var marker = new L.marker(curLocation,{
		draggable : 'true'
	}).addTo(map);
	marker.on('dragend', function(event){
		var position = marker.getLatLng();
		marker.setLatLng(position,{
			draggable : 'true'
		}).bindPopup(position).update();
		$("#lat").val(position.lat);
		$("#long").val(position.lng).keyup();
	});
	$("#lat, #long").change(function(){
		var position = [parseInt($("#lat").val()), parseInt($("#long").val())];
		marker.setLatLng(position,{
			draggable : 'true'
		}).bindPopup(position).update();
		map.panTo(position);
	});
	map.addLayer(marker);
</script>