<script>
	function Left(str, n) {
		if (n <= 0) {
			return "";
		} else if (n > String(str).length) {
			return str;
		} else {
			return String(str).substring(0, n);
		}
	}

	function Right(str, n) {
		if (n <= 0) {
			return "";
		} else if (n > String(str).length) {
			return str;
		} else {
			var iLen = String(str).length;
			return String(str).substring(iLen, iLen - n);
		}
	}

	function Mid(str, s, n) {
		if (n <= 0) {
			return "";
		} else if (s > String(str).length) {
			return "";
		} else if (Number(n) + Number(s) > String(str).length) {
			var iLen = String(str).length;
			return String(str).substring(Number(s) - 1, Number(iLen));
		} else {
			var iLen = String(str).length;
			return String(str).substring(Number(s) - 1, Number(s) - 1 + Number(n));
		}
	}

	function formatnum(total) {
		return total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

		var neg = false;
		if (total < 0) {
			neg = true;
			total = Math.abs(total);
		}
		return parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "1,").toString();
	}
</script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dashboard/') ?>vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dashboard/') ?>vendor/bootstrap/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js ') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>


</body>