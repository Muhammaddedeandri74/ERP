<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>


<style type="text/css">
    
    
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.close {
  color: #ffff;
  float: right;
  font-size: 18px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;

</style>


<?php 

    $codequo;
    if ($data4 != "Not Found") {
        foreach ($data4 as $key ) {
            $codequo = $key["codequo"];
            $codequo++;
        }
    }
    else
    {
        $codequo = "QT0001";
    }


 ?>


<div class="header" style="height: 15vh ; background: #3C2E8F; padding-left: 30px; margin-left: 60px; width: 100vw;">
    <div class="row">
        <div class="col">
                <p style="font-size: 15px; margin: 0; padding: 20px;color: white">QUOTATION / New Quotation</p>
                <h1 style="color: white; padding-left: 20px"> FORM QUOTATION</h1>
        </div>
        <?php echo $this->session->flashdata('message'); ?> 
                        <?php $this->session->set_flashdata('message',''); ?>
    </div>
</div>

<div style="padding-left: 90px ; padding-top : 10px; padding-bottom: 20px; padding-right: 30px; width: 100vw; height: 100vh ;">
        <div style="box-shadow: 2px 0px 32px 1px rgba(0,0,0,0.56);
                    -webkit-box-shadow: 2px 0px 32px 1px rgba(0,0,0,0.56);
                    -moz-box-shadow: 2px 0px 32px 1px rgba(0,0,0,0.56); width: 100%; height: 140vh ; padding : 30px; ">
                        

            <div class="d-flex" style="justify-content: space-between; padding-right: 8%" >
                <p><b>PENAWARAN BARU</b></p>
                <!-- <button class="btn btn-primary">Cetak</button> -->
            </div>
            <hr style="height: 0.5vh; background: #eeeeee; margin-top: 2%">

            <form action="<?php echo base_url('Employe/insertquotation') ?>" method = "POST" id="form">
                <div class="d-flex" >
                    <div style="margin-top: 20px" style="width: 80%">
                        <div class="d-flex" >
                            <div>
                                <p><b>Informasi Dasar</b></p>
                            </div>
                            <div style="margin-left: 20%;">
                                <p style="margin-bottom: 0">No. Pemesanan</p>
                                <input type="text" name="noquo" class="form-control" readonly value="<?php echo $codequo ?>">
                                <p style="margin-bottom: 0;margin-top: 20px">Jenis Pemesanan</p>
                                <select class="form-control" name="typequo" style="width: 20vw"> 
                                    <option value="" disabled selected>Pilih Jenis Pemesanan</option>
                                    <option value="001" >WEB</option>
                                    <option value="002" >E-Commerce</option>
                                    <option value="003" >B2B</option>
                                </select>
                                <p style="margin-bottom: 0; margin-top: 20px">Judul Penawaran</p>
                                <input type="text" name="judul" class="form-control">
                                <p style="margin-bottom: 0; margin-top: 20px">Customer</p>
                                <select class="form-control" name="cust">
                                    <option value="" disabled selected>Pilih Customer</option>
                                    <?php if ($data != "Not Found"): ?>
                                        <?php foreach ($data as $key ): ?>
                                            <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>

                                    <?php endif ?>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex" style="margin-top: 10%" >
                            <div>
                                <p><b>Mata Uang & Pajak</b></p>
                            </div>
                            <div style="margin-left: 50px;">
                                <p style="margin-bottom: 0">Pilih Mata Uang</p>
                                <select class="form-control" style="width: 20vw" name="cur"> 
                                    <option value="" disabled selected>Pilih Mata Uang</option>
                                    <?php if ($data1 != "Not Found"): ?>
                                        <?php foreach ($data1 as $key ): ?>
                                            <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>

                                    <?php endif ?>
                                </select>
                                <p style="margin-bottom: 0; margin-top: 20px">VAT</p>
                                <div class="d-flex " style="margin-top: 5px">
                                    <div>
                                        <label class="switch">
                                          <input type="checkbox" value = "10" onclick="vat()" name="vats" id="vats" checked>
                                          <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div style="margin-left: 20px">
                                        <p>Klik untuk on / off</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex" style="margin-top: 10%">
                            <div style="margin-right: : 20%; float: left;">
                                <p ><b>Akun Perbankan</b></p>
                            </div>
                            <div style="margin-left : 20%">
                                <p style="margin-bottom: 0">Nomor Buku Bank</p>
                                <input type="text"  class="form-control" style="width: 20vw" name="norek">
                                <p style="margin-bottom: 0; margin-top: 20px">Metode Pembayaran</p>
                                <select class="form-control" name="paymentmethod">
                                    <option value="" selected disabled>Pilih Metode Pembayaran</option>
                                    <?php if ($data3 != "Not Found"): ?>
                                        <?php foreach ($data3 as $key ): ?>
                                            <option value="<?php echo $key["idcomm"] ?>"><?php echo $key["namecomm"] ?></option>
                                        <?php endforeach ?>

                                    <?php endif ?>
                                </select>
                            </div>
                        </div>


                        <div class="d-flex" style="margin-top: 10%">
                                <div>
                                    <p><b>Pengiriman</b></p>
                                </div>
                                <div style="margin-left: 20%;">
                                    <p style="margin-bottom: 0">Tanggal Pengiriman</p>
                                    <input type="date" name="delivdate" class="form-control" style="width: 20vw" >
                                    <p style="margin-bottom: 0; margin-top: 20px">Alamat</p>
                                    <input type="text" name="delivaddr" class="form-control">
                                </div>
                        </div>


                        <div class="d-flex" style="margin-top: 10%; margin-bottom: 10%">
                                <div>
                                    <p><b>Masa Berlaku Penawaran</b></p>
                                </div>
                                <div style="margin-left: 20%;">
                                    <p style="margin-bottom: 0">Tanggal Berlaku</p>
                                    <input type="date" name="expquo" class="form-control" style="width: 20vw">
                                
                                </div>
                        </div>  

                        <div class="d-flex" >
                            <div>
                                <p><b>Global Discount</b></p>
                            </div>
                            <div style="margin-left: 15%;">
                                <div class="d-flex" >
                                    <div style="margin-right: 10%">
                                        <p style="margin-bottom: 0">Presentasi</p>
                                        <input type="number" id="dispers" name="dispers" min="0" max="100" onclick="disper1()" oninput="discx(this.value)"  class="form-control">
                                    </div>
                                    <div>
                                        <p style="margin-bottom: 0">Nominal</p>
                                        <input type="number" id="disnoms" name="disnoms" min="0" value="0" onclick="disnom1()" oninput="disc1(this.value)" class="form-control">
                                    </div>

                                </div>
                            
                            </div>
                        </div>

                    </div>

                    <div style="margin-top: 20px;margin-left: 10%; width: 50%; " >
                        
                        <div class="d-flex" style="justify-content: space-between;">
                            <p><b>Product / Item</b></p>
                            <a href="#" id="getitem">Tambah Product</a>
                        </div>
                        <div style="box-shadow: 2px -2px 48px 1px rgba(0,0,0,0.52);
                                    -webkit-box-shadow: 2px -2px 48px 1px rgba(0,0,0,0.52);
                                    -moz-box-shadow: 2px -2px 48px 1px rgba(0,0,0,0.52); width: 100%; height: 50%">

                            <table class="table">
                                <thead style="background: #3C2E8F;color: white">
                                    <tr>
                                        <th>Nama</th>
                                        <th>SKU</th>
                                        <th>Qty.</th>
                                        <th>Harga/Satuan</th>
                                        <th>Disc</th>
                                        <th>VAT</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="row" >
                            <div class="col-12" >
                                <div class="d-flex" style="float: right;">
                                    <p style="margin-bottom: 0">Jumlah Item</p>
                                    <input type="text" name="jmlitem" id="jmlitem" value="0" style="margin-left: 20px;" readonly>
                                </div>
                            </div>  
                            <div class="col-12" style="margin-top: 20px">
                                <div class="d-flex" style="float: right;" >
                                    <p style="margin-bottom: 0">Price Item Total</p>
                                    <input type="text" name="grandtotals" id="grandtotals" value="0" style="margin-left: 20px;" readonly>
                                
                                </div>

                            </div>
                            <div class="col-12" style="margin-top: 20px">
                                <div class="d-flex" style="float: right;" >
                                    <p style="margin-bottom: 0">Grand Total</p>
                                
                                    <input type="text" name="grandtotalx" id="grandtotalx" value="0" style="margin-left: 20px;" readonly>
                                </div>

                            </div>
                        </div>

                        <p style="margin-top: 20px"><b>Additional Info</b></p>
                        <textarea name="moreinfo" style="width: 100%; height: 20%;"></textarea>
                        <button type="button" class="btn btn-outline-primary" style="float: right;margin-top: 20px" onclick="makeorder()">Buat Penawaran</button>
                        

                    


                    </div>


                        
                </div>
            </form>


        </div>
        
        
    </div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div >
        <div class="d-flex align-items-center" style="justify-content: space-between; background: #0085ff;color: white;height: 10vh">
            <p><center><b style="font-size: 30px">TAMBAH PRODUCT</b></center></p>
        </div>
        <div class="d-flex" style="padding: 2%">
            <div style="width: 100%">
                <p><b>Pilih Product</b></p>
                <div class="d-flex">
                    <!-- <select class="form-control" style="width: 50%; margin-right: 10px">
                        <option selected disabled>Pilih Type Item</option>
                    </select> -->
                    <select class=" selectpicker form-control" data-live-search="true" 
                    onchange="chose(this.value)" id="selitem">
                        <option value="" disabled selected>Cari Product atau Item</option>
                        <?php if ($data2 != "Not Found"): ?>
                            <?php foreach ($data2 as $key ): ?>
                                <option value="<?php echo json_encode($key['iditem']) ?>"><?php echo $key["nameitem"] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>

                <div class="d-flex align-items-center" style="margin-top: 20px">
                    <p style="width: 30%; margin-bottom: 0">Nama Product</p>
                    <input type="text" name="nameiem" id="nameitem" readonly class="form-control">
                    <input type="hidden" name="iditem" id="iditem" readonly class="form-control">
                    <input type="hidden" name="grandtotal" id="grandtotal" readonly value="0" class="form-control">
                </div>

                <div class="d-flex align-items-center" style="margin-top: 20px">
                    <p style="width: 30%; margin-bottom: 0;float: right;">SKU</p>
                    <input type="text" name="sku" id="sku" readonly class="form-control">
                </div>
                <div class="d-flex align-items-center" style="margin-top: 20px">
                    <div class="d-flex">
                        <p style="width: 45%; margin-bottom: 0;float: right;">Qty. Order</p>
                        <input type="number" name="qty" id="qty" readonly class="form-control" oninput="qty(this.value)" style="width: 30%">
                    </div>
                    <div class="d-flex" style="margin-left: 20px">
                        <p style="width: 35%; margin-bottom: 0;float: right;">Harga </p>
                        <input type="text" name="price" id="price" min = "0" readonly class="form-control">
                    </div>
                    
                </div>
                <div class="d-flex align-items-center" style="margin-top: 20px; justify-content: space-between;">
                    <div class="d-flex" style="justify-content: space-between; width: 35%">
                        <p style="width: 100%; margin-bottom: 0;float: right;">Discount</p>
                        <input type="number" name="disper" id="disper"  min = "0" max="100" readonly class="form-control" style="width: 50%" placeholder="%" onclick="disper()" oninput="discount(this.value)">
                    </div>
                    <div class="d-flex" style="margin-left: 20px">
                    
                        <input type="number" name="disnom" id="disnom" min = "0" readonly class="form-control" placeholder="Nominal" onclick="disnom()">
                    </div>
                    
                </div>

                <div class="d-flex align-items-center" style="margin-top: 20px">
                    <p style="width: 30%; margin-bottom: 0">VAT</p>
                    <div class="d-flex " style="margin-top: 5px">
                    
                        <div>
                            <label class="switch">
                                <input type="checkbox" value = "10" onclick="vat()" id="vat" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div style="margin-left: 20px">
                            <p>Klik untuk on / off</p>
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-outline-primary" style="float: right" type="button" onclick="additem()">+ Tambah Item</button>


            </div>
            <input type="hidden" id="jmlcol" value="0">
            <div style="width: 120%; margin-left: 2%">
                <table class="table" id="tablex">
                    <thead style="background: grey">
                        <tr>
                            <th>Nama Product</th>
                            <th>SKU</th>
                            <th>Qty.</th>
                            <th>Harga / Satuan</th>
                            <th>Disc.</th>
                            <th>VAT</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="bodyx">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="align-items-center" style="justify-content: space-between; background: #bcbcbc;color: white;height: 10vh">
            <div class="d-flex align-items-center" style="padding: 2%; float: right;">
                <a href="#" style="margin-bottom: 0; margin-right: 20px" class="close">Batal</a>
                <button type="button" class="btn btn-primary" onclick="submit()">Submit</button>
            </div>
        </div>
        
    </div>
   
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("getitem");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  $('#bodyx').html("");
  
  
 
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    alert("Klik Batal Atau Submit untuk menyelesaikan pemilihan barang");
  }
}

function chose(x)
{
    
     const jArray = <?php echo json_encode($data2); ?>;
    if (jArray.length > 0)
    {
        for(var i=0; i<jArray.length; i++){
           if (x == jArray[i]['iditem'])
           {
                $('#iditem').val(jArray[i]['iditem']);
                $('#nameitem').val(jArray[i]['nameitem']);
                $('#sku').val(jArray[i]['sku']);
                $('#price').val(jArray[i]['priceitem']);
                document.getElementById('qty').readOnly= false;
                document.getElementById('dispers').readOnly= false;
                document.getElementById('disnoms').readOnly= false;

           }
        }
    }
    else
    {
        document.getElementById('qty').readOnly= true;
        document.getElementById('dispers').readOnly= true;
        document.getElementById('disnoms').readOnly= true;
    }
    
}

function additem()
{
    var jmlcol = $('#jmlcol').val();
    var vat = 0;
    var vats = 0;
    if ($('#vat').val() == 10)
    {
        vat = 10;
    }

    vats = vat / 100;



    var disc = 0;
    if ($('#disnom').val() != "")
    {
        disc = $('#disnom').val();
    }

    if ($('#nameitem').val() == "")
    {
        alert("Tolong Pilih Item Terlebih Dahulu");
    }
    else if ($('#qty').val() == "" || $('#qty').val() == "0")
    {
        alert("Tolong masukan qty order Terlebih Dahulu");  
    }
    else
    {
        var total = Number($('#price').val() * $('#qty').val() - $('#disnom').val()) + Number(($('#price').val() * $('#qty').val() - disc)*vats);
        $('#grandtotal').val( Number($('#grandtotal').val()) + Number(total));
        var baris = '';
        if (jmlcol % 2 == 0 )
        {
            baris += `  <tr id=item`+jmlcol+` style='background:white'>
                            
                            <td ><input type ="hidden" id="nameitem[]" name="nameitem[]" value =" `+$('#nameitem').val()+`" style="width:50%;" />`+$('#nameitem').val()+`<input type ="hidden" id="iditem[]" name = "iditem[]" value ="`+$('#iditem').val()+`" style="width:50%;" /></td>
                            <td ><input type ="hidden" id= "sku[]" name="sku[]" value ="`+$('#sku').val()+`" style="width:50%;"/>`+$('#sku').val()+`</td>
                            <td ><input type ="hidden" id= "qty[]" name="qty[]" value ="`+$('#qty').val()+`" style="width:50%;"/>`+$('#qty').val()+`</td>
                            <td ><input type ="hidden" id= "harga[]" name="harga[]" value ="`+$('#price').val()+ `"style="width:50%;" />`+$('#price').val()+ `</td>
                            <td ><input type ="hidden" id= "disc[]" name="discx[]" value ="`+disc+ `"style="width:50%;" />`+disc+`</td>
                            <td ><input type ="hidden" id= "vat[]" name = "vat[]" value ="`+vat+ `"style="width:50%;" />`+vat+ `</td>
                            <td ><input type ="hidden" id= "total[]" name = "total[]" value ="`+total+ `"style="width:50%;" />`+total+ `</td>
                            <td id= del[`+jmlcol+`]><a href = "#" onclick="del(`+jmlcol+`,`+total+`)">Delete</a></td>

                        </tr>

                    `;
        }
        else
        {
            baris += `  <tr id=item`+jmlcol+` style='background:#eeeeee'>
                            
                            <td ><input type ="hidden" id="nameitem[]" name="nameitem[]" value =" `+$('#nameitem').val()+`" style="width:50%;" />`+$('#nameitem').val()+`<input type ="hidden" id="iditem[]" name = "iditem[]" value ="`+$('#iditem').val()+`" style="width:50%;" /></td>
                            <td ><input type ="hidden" id= "sku[]" name="sku[]" value ="`+$('#sku').val()+`" style="width:50%;"/>`+$('#sku').val()+`</td>
                            <td ><input type ="hidden" id= "qty[]" name="qty[]" value ="`+$('#qty').val()+`" style="width:50%;"/>`+$('#qty').val()+`</td>
                            <td ><input type ="hidden" id= "harga[]" name="harga[]" value ="`+$('#price').val()+ `"style="width:50%;" />`+$('#price').val()+ `</td>
                            <td ><input type ="hidden" id= "disc[]" name="discx[]" value ="`+disc+ `"style="width:50%;" />`+disc+`</td>
                            <td ><input type ="hidden" id= "vat[]" name = "vat[]" value ="`+vat+ `"style="width:50%;" />`+vat+ `</td>
                            <td ><input type ="hidden" id= "total[]" name = "total[]" value ="`+total+ `"style="width:50%;" />`+total+ `</td>
                            <td id= del[`+jmlcol+`]><a href = "#" onclick="del(`+jmlcol+`,`+total+`)">Delete</a></td>

                        </tr>

                    `;
        }   
                        
        console.log($('#price').val() * $('#qty').val() - $('#disnom').val() * 0.1);            
        $('#bodyx').append(baris);
        $('#jmlcol').val(Number(jmlcol) + Number(1));   
        $('#iditem').val("");
                $('#nameitem').val("");
                $('#sku').val("");
                $('#qty').val("");
                $('#price').val("");    
                $('#disper').val("");   
                $('#disnom').val("");   
                $('#selitem').val("");  
    }
}


function disper()
{
    document.getElementById('disnom').readOnly= true;
    document.getElementById('disper').readOnly= false;
}

function disnom()
{
    document.getElementById('disnom').readOnly= false;
    document.getElementById('disper').readOnly= true;
    $('#disper').val(0);
}

function discount()
{
    $('#disnom').val(($('#price').val()*$('#qty').val()) * ($('#disper').val() / 100));
    if ($('#disper').val() < 0)
        {
            $('#disper').val(0)
        }

        if ($('#disper').val() > 100)
        {
            $('#disper').val(100)
        }
    
}

function disper1()
{
    document.getElementById('disnoms').readOnly= true;
    document.getElementById('dispers').readOnly= false;
}

function disnom1()
{
    document.getElementById('disnoms').readOnly= false;
    document.getElementById('dispers').readOnly= true;
    $('#disper').val(0);
}

function discx()
{   
    if ($('#grandtotals').val() == "0")
    {
        alert('Please Insert Item Please');
        $('#dispers').val("");
    }
    else
    {
        if ($('#dispers').val() < 0)
        {
            $('#dispers').val(0)
        }

        if ($('#dispers').val() > 100)
        {
            $('#dispers').val(100)
        }
        if ($('#dispers').val() == "" || $('#dispers').val() == "0" )
        {
            $('#disnoms').val(0);
        }
        else{
            $('#disnoms').val(Number(($('#grandtotals').val()) * ($('#dispers').val() / 100)) + Number($('#grandtotals').val() * ($('#vats').val() / 100)));    
        }
        
        $('#grandtotalx').val(Number($('#grandtotals').val() - $('#disnoms').val()) + Number($('#grandtotals').val() * ($('#vats').val() / 100)));
    }
    
    
}

function disc1()
{
    if ($('#grandtotals').val() == "0")
    {
        alert('Please Insert Item Please');
        $('#disnoms').val("0");
    }
    else
    {
        $('#dispers').val("");
        $('#grandtotalx').val(Number($('#grandtotals').val() - $('#disnoms').val()) + Number($('#grandtotals').val() * ($('#vats').val() / 100)));
    }
}

function vat()
{
    if ($('#vats').val() == 10)
    {
        $('#vats').val(0);
    }
    else
    {
        $('#vats').val(10);
    }

     if ($('#disnoms').val() == "")
         {
            $('#grandtotalx').val(Number($('#grandtotals').val()) + Number(($('#grandtotals').val() * ($('#vats').val() / 100) ))); 
         }
         else
         {
            $('#grandtotalx').val( Number($('#grandtotals').val() - $('#disnoms').val()) + Number(($('#grandtotals').val() * ($('#vats').val() / 100) )));
         }

}


function del(x,y)
{
    if (confirm('Hapus Item Ini?')) {
                $('#item' + x + '').remove(); 
            }  
    $('#jmlcol').val($('#jmlcol').val() - 1);   
     $('#grandtotal').val($('#grandtotal').val() - y); 
    if ($('#jmlitem').val() > 0)
    {
        console.log($('#grandtotals').val()+" "+y)
         $('#jmlitem').val($('#jmlitem').val() - 1); 
         $('#grandtotals').val($('#grandtotals').val() - y); 

        if ($('#disnoms').val() == "")
         {
            $('#grandtotalx').val(Number($('#grandtotals').val()) + Number(($('#grandtotals').val() * ($('#vats').val() / 100) ))); 
         }
         else
         {
            $('#grandtotalx').val( Number($('#grandtotals').val() - $('#disnoms').val()) + Number(($('#grandtotals').val() * ($('#vats').val() / 100) )));
         }

    }
}

function submit()
{
    var tbl = document.getElementById('tablex');
    if (tbl.rows.length > 0) {
       $('#body').append(document.getElementById("bodyx").innerHTML)
    }
    
     modal.style.display = "none";
     $('#grandtotals').val($('#grandtotal').val());
     $('#jmlitem').val($('#jmlcol').val());
       $('#bodyx').html("");
        
        if ($('#disnoms').val() == "")
         {
            $('#grandtotalx').val(Number($('#grandtotals').val()) + Number(($('#grandtotals').val() * ($('#vats').val() / 100) ))); 
         }
         else
         {
            $('#grandtotalx').val( Number($('#grandtotals').val() - $('#disnoms').val()) + Number(($('#grandtotals').val() * ($('#vats').val() / 100) )));
         }

         console.log($('#grandtotalx').val());
}

function qty(x)
{
    if (x < 0)
    {
        $('#qty').val(0);
    }
}

function makeorder()
{
    if ($('#jmlitem').val() == "0")
    {
        alert("Tolong Pilih Item Terlebih Dahulu");

    }
    else
    {
        $('#form').submit();
    }
}


</script>