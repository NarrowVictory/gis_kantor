<div id="mapid" style="height: 500px;"></div>
<script>
	var mymap = L.map('mapid').setView([5.114792, 97.169631], 16);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
	}).addTo(mymap);

	var greenIcon = L.icon({
    iconUrl: '<?= base_url('ikon_kantor.png') ?>',
    iconSize: [30, 30]
	});

	<?php foreach ($kantor as $key => $value): ?>
		L.marker([ <?= $value['lat'] ?>, <?= $value['long'] ?> ], {icon:greenIcon}).addTo(mymap).bindPopup("<h1><b><?= $value['nama_kantor'] ?></b></h1><br />"+"<img width='200px' src='<?= base_url('foto/'.$value['foto']) ?>'>");
	<?php endforeach ?>
</script>