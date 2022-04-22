<script languange="javascript">
	function Left(str, n){
		if (n <= 0){
			return "";
		}else if (n > String(str).length){
			return str;
		}else{
			return String(str).substring(0,n);
		}
	}
	function Right(str, n){
		if (n <= 0){
			return "";
		}else if (n > String(str).length){
			return str;
		}else {
			var iLen = String(str).length;
			return String(str).substring(iLen, iLen - n);
		}
	}

	function Mid(str,s, n){
		if (n <= 0){
			return "";
		}else if (s > String(str).length){
			return "";
		}else if (Number(n)+Number(s) > String(str).length){
			var iLen = String(str).length;
			return String(str).substring(Number(s)-1, Number(iLen)	);
		}else {
			var iLen = String(str).length;
			return String(str).substring(Number(s)-1, Number(s)-1+Number(n));
		}
	}
    function formatnum(total) {
		return total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

		var neg = false;
		if(total < 0) {
			neg = true;
			total = Math.abs(total);
		}
		return parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "1,").toString();
	}

</script>