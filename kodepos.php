<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		td{
		padding: 10px;
		border: 1px solid #f1f1f1
	}
	</style>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		$("#s").click(function(){
			var q = $("#q").val(),
				n = 1,
				k = 'df03e440e5c91359c0c597c5e0aeeeea'; // api key ini hanya bisa d gunakan oleh situs http://codepen.io jika menggunakan ajx. Untuk mendapatkan api key untuk situs sobat bisa mendapatkan.y di http://ibacor.com/api 100% free
			$('.kode-pos').html('Proses..');
			kode_pos(q,n,k);
		});
	});

	function kode_pos(q,n,k) {
		$.ajax({
			url: 'http://ibacor.com/api/kode-pos-indonesia?query=' + q + '&next=' + n + '&k=' + k,
			crossDomain: true,
			dataType: 'json'
		}).done(function (data) {
			var html = '';
			if(data.status == 'success'){
				html += '<table>';
				html += '<tr><td>Alamat</td><td>Kota</td><td>Kode Pos</td></tr>';
				$.each(data.data, function(i, item) {
					html += '<tr><td>' + data.data[i].alamat + '</td><td>' + data.data[i].kota + '</td><td>' + data.data[i].kode_pos + '</td></tr>';
				});
				html += '</table>';
			}else{
				html += data.status+' >_<"';
			}
			$('.kode-pos').html(html);
		});
	}
	</script>
</head>
<body>
	<input type="text" id="q" value="dago bandung"/>
<input type="submit" id="s" value="Go"/>
<div class="kode-pos"></div>
</body>
</html>