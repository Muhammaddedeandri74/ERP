</body>
<script>
    var menus = document.getElementsByClassName('main-menu')
    for (let i = 0; i < menus.length; i++) {
        menus[i].addEventListener('click', function() {
            let current = document.getElementsByClassName('active')
            current[0].className = current[0].className.replace(' active', '')
            this.className += ' active'
        })
    }

    function dashboard() {
        window.location.href = "<?php echo base_url("AuthControler/employe") ?>";
    }


    $(document).ready(function() {

        var data = <?php echo json_encode($this->session->userdata("data")) ?>;
        // console.log(data)
        if (data["role"] != 1) {


            $('a').click(function() {
                if ($(this).hasClass('disabled')) {
                    alert("Maaf Anda Tidak diberikan Hak Akses Untuk Menu Ini")
                    return false;
                }
            });

            $("#logout").attr('class', '');
            $("#manage").attr('class', '');

            for (var i = 0; i < data["data"].length; i++) {

                if (data["data"][i]["menu"] == "Sales Order") {
                    $("#salesorder").attr('class', '');
                    $("#terbaru").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Pending List") {

                    $("#pendinglist").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Invoice") {

                    $("#invoice").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Buat Penawaran") {

                    $("#buatpenawaran").attr('class', '');
                }
                if (data["data"][i]["menu"] == "List Quotation") {

                    $("#listquotation").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Sales Book") {

                    $("#salesbook").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Request (Gudang Utama)") {

                    $("#requestgudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Ingoing & Outgoing (Gudang Utama)") {

                    $("#ingoingoutgoinggudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Pindah Gudang (Gudang Utama)") {

                    $("#pindahgudanggudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Paket Bundle Item (Gudang Utama)") {

                    $("#paketbundleitemgudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Report (Gudang Utama)") {

                    $("#reportgudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Stock Inventory (Gudang Utama)") {

                    $("#stockinventorygudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "I/O Status (Gudang Utama)") {

                    $("#iostatusgudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "I/O Status (Counter)") {

                    $("#iostatuscounter").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Terbaru (Counter)") {

                    $("#terbarucounter").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Ingoing & Outgoing (Counter)") {

                    $("#ingoingoutgoingcounter").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Reports (Counter)") {

                    $("#reportscounter").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Stok Inventory (Counter)") {

                    $("#stockinventorycounter").attr('class', '');
                    $("#iostatuscounter").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Delivery Order (Counter)") {

                    $("#deliveryordercounter").attr('class', '');
                }

                if (data["data"][i]["menu"] == "Purchase Order") {

                    $("#purchaseorder").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Report") {

                    $("#reportpurchase").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Purchase Order Book") {

                    $("#purchaseorderbook").attr('class', '');
                    $("#terbaru").attr('class', '');

                }
                if (data["data"][i]["menu"] == "Terbaru (Gudang Utama)") {

                    $("#terbarugudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "CekSN (Gudang Utama)") {

                    $("#ceksngudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Product (Gudang Utama)") {

                    $("#productstock").attr('class', '');
                    $("#stockinventorygudang").attr('class', '');
                    $("#iostatusgudang").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Balance (Gudang Utama)") {

                    $("#balancestock").attr('class', '');
                }
                if (data["data"][i]["menu"] == "CekSN (Counter)") {

                    $("#ceksncounter").attr('class', '');
                }

                if (data["data"][i]["menu"] == "Overview") {

                    $("#Overview").attr('class', '');
                }

                if (data["data"][i]["menu"] == "User") {

                    $("#User").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Items") {

                    $("#Items").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Location Item") {

                    $("#LocationItem").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Warehouse") {

                    $("#Warehouse").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Customer") {

                    $("#Customer").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Supplier") {

                    $("#Supplier").attr('class', '');
                }
                if (data["data"][i]["menu"] == "Currancy") {

                    $("#Currancy").attr('class', '');
                }
                // if (data["data"][i]["menu"] == "Unit") {

                //     $("#Unit").attr('class', '');
                // }
                // if (data["data"][i]["menu"] == "Bank") {

                //     $("#Bank").attr('class', '');
                // }
                // if (data["data"][i]["menu"] == "Company Profile") {

                //     $("#CompanyProfile").attr('class', '');
                // }

            }
        }
    });
</script>
<script languange="javascript">
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
        return total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        var neg = false;
        if (total < 0) {
            neg = true;
            total = Math.abs(total);
        }
        return parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "1,").toString();
    }
</script>

</html>