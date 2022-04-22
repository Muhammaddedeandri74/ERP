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
    </div>
    <div class="card-body  ml-4">
        <div class="card bay p-4" width="80%">
            <div class="card-body ">
                <table class="overflow-y: scroll;height: 52vh">
                    <thead style="background-color: orange;color: white">
                        <tr>

                            <th style="text-align:center;width:1%" scope="col">No</th>
                            <th style="text-align:center;width: 15%" scope="col">Nama Product</th>
                            <th style="text-align:center;width: 5%" scope="col">SKU</th>
                            <th style="text-align:center;width: 5%" scope="col">Stock Minimum</th>
                            <th style="text-align:center;width: 5%" scope="col">QTY</th>
                        </tr>
                    <tbody style="background-color:white;color: black">
                        <?php if ($data != "Not Found") : $a = 1;
                            $getdata = array(); ?>
                            <?php foreach ($data as $key) : ?>
                                <?php if ($key["minstock"] > $key["qty"]) : ?>

                                    <?php if ($a % 2 == 0) { ?>
                                        <tr id=" <?php echo $key['iditem'] ?>">
                                        <?php } else { ?>
                                        <tr id="<?php echo $key['iditem'] ?>">
                                        <?php } ?>
                                        <tr>
                                            <td style="text-align:center;width: 1%"><?php echo $a++ ?></td>
                                            <td style="text-align:center;width: 15%"><?php echo $key["nameitem"] ?></td>
                                            <td style="text-align:center;width: 5%"><?php echo $key["sku"] ?></td>
                                            <td style="text-align:center;width: 5%"><?php echo $key["minstock"] ?></td>
                                            <td style="text-align:center;width: 5%"><?php echo $key["qty"] ?></td>
                                        </tr>
                                    <?php array_push($getdata, $key);
                                endif ?>

                                <?php endforeach ?>
                            <?php endif ?>
                    </tbody>
                    </thead>

                </table>

            </div>
        </div>
    </div>
</div>