<style>
    .fw {
        font-weight: bold;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }
</style>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-body  ml-4">
            <center>
                <div class="card bay p-4" width="80%">
                    <div class="card-body ">
                        <table class="table m-0 table-striped table-hover">
                            <thead style="background-color: orange;color: white">
                                <tr>
                                    <th style="text-align:center;width: 4% " scope="col">#</th>
                                    <th style="text-align:center;width: 20%" scope="col">Nama Product</th>
                                    <th style="text-align:center;width: 5% " scope="col">SKU</th>
                                    <th style="text-align:center;width: 5% " scope="col">Stock Minimum</th>
                                    <th style="text-align:center;width: 5% " scope="col">QTY System</th>
                                    <th style="text-align:center;width: 5% " scope="col">Balance System</th>
                                    <th style="text-align:center;width: 5% " scope="col">Qty Actual</th>
                                </tr>
                            </thead>
                        </table>
                        <div style="overflow-y: scroll;height: 44vh">
                        <table class="table table-striped table-hover ">
                            <tbody style="background-color: whtie" id="bodyx">
                            <?php  ?>
                                <?php if ($data != "Not Found") : $a = 1;
                               
                                    $getdata = array(); ?>
                                    <?php foreach ($data as $key) : ?>
                                        <?php if ($a % 2 == 0) { ?>
                                            <tr>
                                            <?php } else { ?>
                                            <tr style="background: #eeeeee">
                                            <?php } ?>
                                            <?php $ok = 0;
                                            $key["qtys"] = 0;
                                            if ($key["data"] != "Not Found") :  ?>
                                                <?php foreach ($key["data"] as $keyx) : ?>
                                                    <?php if ($keyx["endqty"] != "0") : ?>
                                                        <?php if ($keyx["expdate"] <= date('Y-m-d', strtotime("7 day", strtotime(date("Y-m-d"))))) :
                                                            $ok = $ok + 1;
                                                            $key["qtys"]  = $key["qtys"]  + $keyx["endqty"];
                                                        ?>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                            <th style="text-align:center;width: 4% " scope="row"><?php echo $a++ ?></th>
                                            <td style="text-align:center;width: 20%"><?php echo $key["nameitem"] ?></td>
                                            <td style="text-align:center;width: 5% "><?php echo $key["sku"] ?></td>
                                            <td style="text-align:center;width: 5% "><?php echo $key["minstock"] ?></td>
                                            <td style="text-align:center;width: 5% "><?php echo $key["qtyactual"] ?></td>
                                            <td style="text-align:center;width: 5% "><?php echo $key["qtyactual"]  ?></td>
                                            <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" class="form-control bg-transparent"></td>
                                            </tr>
                                        <?php array_push($getdata, $key);
                                    endforeach ?>
                                    <?php endif ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>
</div>
<div style="float: left; margin-left: 1%;margin-top:1px;">
  <h2 style="font-family:arial;">TOTAL <?php echo $a++;?></h2>
</div> 
<script type="text/javascript">
    function search(x) {

        var data = <?php echo json_encode($getdata) ?>;
        console.log(data);
        var baris = "";
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["nameitem"].toLowerCase().includes(x.toLowerCase())) {
                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                                   <th style="text-align:center;width: 4% " scope="row">` + (a++) + `</th>
                                            
                                            <td style="text-align:center;width: 20%">` + data[i]["nameitem"] + `</td>
                                             <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                                            <td style="text-align:center;width: 5% ">` + data[i]["minstock"] + `</td>
                                            <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                                           <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                                            <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" class="form-control"></td>
                                        </tr>
                             `
            } else if (data[i]["sku"].toLowerCase().includes(x.toLowerCase())) {
                if (i % 2 == 0) {
                    baris += '<tr>';
                } else {
                    baris += '<tr style = "background :#eeeeee">'
                }
                baris += `
                                 <th style="text-align:center;width: 4% " scope="row">` + (a++) + `</th>
                                            
                                            <td style="text-align:center;width: 20%">` + data[i]["nameitem"] + `</td>
                                             <td style="text-align:center;width: 5% ">` + data[i]["sku"] + `</td>
                                            <td style="text-align:center;width: 5% ">` + data[i]["minstock"] + `</td>
                                            <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                                           <td style="text-align:center;width: 5% ">` + data[i]["qtyactual"] + `</td>
                                            <td class="pl-5" style="text-align:center;width: 5% "><input type="number" min="0" name="qtyactual[]" class="form-control"></td>
                                        </tr>
                             `

            }



        }



        $('#bodyx').html(baris);
    }
</script>