<style>
    .as {
        border-collapse: collapse;
        border-radius: 10px 10px 0px 0px;
        overflow: hidden;
    }

    .sckk {
        overflow-y: scroll;
        overflow-x: scroll;
        height: 56vh;
        width: 70vw;
        border-radius: 0px 0px 10px 10px;
    }
</style>


<div class="container-xxl ml-5" style="width: 96%;">
    <div class=" row">
        <div class="col py-3" style="border-radius: 5px;">
            <form action="<?php echo base_url('SuperAdminControler/saveuserrole') ?>" method="post">
                <div class="row d-flex justify-content-between">
                    <div class="col-4">
                        <h1 style="margin-top: 30px; margin-left: 20px;">Manage Role Menu</h1>
                    </div>
                    <div class="col-5" style="margin-top: 4vh;"><button style="float: right;" class="btn btn-primary mt-2 ml px-5">Simpan</button></div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="row">
                            <div class="col" style="margin-top: 10px; margin-left: 30px">
                                <table class="table bays as m-0" style="z-index: 0;">
                                    <thead class="text-white" style="background-color: purple">
                                        <tr>
                                            <th style="width: 30%;" class="pl-4" scope="col">Menu</th>
                                            <th style="width: 14%;text-align:center" scope="col">Sales</th>
                                            <th style="width: 14%;text-align:center" scope="col">Counter</th>
                                            <th style="width: 14%;text-align:center" scope="col">Gudang Utama</th>
                                            <th style="width: 14%;text-align:center" scope="col">Purchasing</th>
                                            <th style="width: 14%;text-align:center" scope="col">Quality Control</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="bays sckk">
                                    <table class="table" style="z-index: 10;">
                                        <tbody class="bg-white p-2">
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Sales Order</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Order" name="sales[]" id="SalesOrdersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Order" name="counter[]" id="SalesOrdercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Order" name="warehouse[]" id="SalesOrderwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Order" name="purchasing[]" id="SalesOrderpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Order" name="qc[]" id="SalesOrderqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Pending List</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pending List" name="sales[]" id="PendingListsales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pending List" name="counter[]" id="PendingListcounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pending List" name="warehouse[]" id="PendingListwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pending List" name="purchasing[]" id="PendingListpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pending List" name="qc[]" id="PendingListqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Invoice</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Invoice" name="sales[]" id="Invoicesales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Invoice" name="counter[]" id="Invoicecounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Invoice" name="warehouse[]" id="Invoicewarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Invoice" name="purchasing[]" id="Invoicepurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Invoice" name="qc[]" id="Invoiceqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Buat Penawaran</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Buat Penawaran" name="sales[]" id="BuatPenawaransales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Buat Penawaran" name="counter[]" id="BuatPenawarancounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Buat Penawaran" name="warehouse[]" id="BuatPenawaranwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Buat Penawaran" name="purchasing[]" id="BuatPenawaranpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Buat Penawaran" name="qc[]" id="BuatPenawaranqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">List Quotation</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="List Quotation" name="sales[]" id="ListQuotationsales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="List Quotation" name="counter[]" id="ListQuotationcounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="List Quotation" name="warehouse[]" id="ListQuotationwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="List Quotation" name="purchasing[]" id="ListQuotationpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="List Quotation" name="qc[]" id="ListQuotationqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Sales Book</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Book" name="sales[]" id="SalesBooksales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Book" name="counter[]" id="SalesBookcounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Book" name="warehouse[]" id="SalesBookwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Book" name="purchasing[]" id="SalesBookpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Sales Book" name="qc[]" id="SalesBookqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Terbaru (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Gudang Utama)" name="sales[]" id="TerbaruGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Gudang Utama)" name="counter[]" id="TerbaruGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Gudang Utama)" name="warehouse[]" id="TerbaruGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Gudang Utama)" name="purchasing[]" id="TerbaruGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Gudang Utama)" name="qc[]" id="TerbaruGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Request (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Request (Gudang Utama)" name="sales[]" id="RequestGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Request (Gudang Utama)" name="counter[]" id="RequestGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Request (Gudang Utama)" name="warehouse[]" id="RequestGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Request (Gudang Utama)" name="purchasing[]" id="RequestGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Request (Gudang Utama)" name="qc[]" id="RequestGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Ingoing & Outgoing (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Gudang Utama)" name="sales[]" id="IngoingOutgoingGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Gudang Utama)" name="counter[]" id="IngoingOutgoingGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Gudang Utama)" name="warehouse[]" id="IngoingOutgoingGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Gudang Utama)" name="purchasing[]" id="IngoingOutgoingGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Gudang Utama)" name="qc[]" id="IngoingOutgoingGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Pindah Gudang (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pindah Gudang (Gudang Utama)" name="sales[]" id="PindahGudangGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pindah Gudang (Gudang Utama)" name="counter[]" id="PindahGudangGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pindah Gudang (Gudang Utama)" name="warehouse[]" id="PindahGudangGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pindah Gudang (Gudang Utama)" name="purchasing[]" id="PindahGudangGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pindah Gudang (Gudang Utama)" name="qc[]" id="PindahGudangGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Paket Bundle Item (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Paket Bundle Item (Gudang Utama)" name="sales[]" id="PaketBundleItemGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Paket Bundle Item (Gudang Utama)" name="counter[]" id="PaketBundleItemGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Paket Bundle Item (Gudang Utama)" name="warehouse[]" id="PaketBundleItemGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Paket Bundle Item (Gudang Utama)" name="purchasing[]" id="PaketBundleItemGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Paket Bundle Item (Gudang Utama)" name="qc[]" id="PaketBundleItemGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Report (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report (Gudang Utama)" name="sales[]" id="ReportGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report (Gudang Utama)" name="counter[]" id="ReportGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report (Gudang Utama)" name="warehouse[]" id="ReportGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report (Gudang Utama)" name="purchasing[]" id="ReportGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report (Gudang Utama)" name="qc[]" id="ReportGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">CekSN (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Gudang Utama)" name="sales[]" id="CekSNGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Gudang Utama)" name="counter[]" id="CekSNGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Gudang Utama)" name="warehouse[]" id="CekSNGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Gudang Utama)" name="purchasing[]" id="CekSNGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Gudang Utama)" name="qc[]" id="CekSNGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Product (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Product (Gudang Utama)" name="sales[]" id="ProductGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Product (Gudang Utama)" name="counter[]" id="ProductGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Product (Gudang Utama)" name="warehouse[]" id="ProductGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Product (Gudang Utama)" name="purchasing[]" id="ProductGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Product (Gudang Utama)" name="qc[]" id="ProductGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Balance (Gudang Utama)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Balance (Gudang Utama)" name="sales[]" id="BalanceGudangUtamasales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Balance (Gudang Utama)" name="counter[]" id="BalanceGudangUtamacounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Balance (Gudang Utama)" name="warehouse[]" id="BalanceGudangUtamawarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Balance (Gudang Utama)" name="purchasing[]" id="BalanceGudangUtamapurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Balance (Gudang Utama)" name="qc[]" id="BalanceGudangUtamaqc">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Terbaru (Counter)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Counter)" name="sales[]" id="TerbaruCountersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Counter)" name="counter[]" id="TerbaruCountercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Counter)" name="warehouse[]" id="TerbaruCounterwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Counter)" name="purchasing[]" id="TerbaruCounterpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Terbaru (Counter)" name="qc[]" id="TerbaruCounterqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Ingoing & Outgoing (Counter)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Counter)" name="sales[]" id="IngoingOutgoingCountersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Counter)" name="counter[]" id="IngoingOutgoingCountercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Counter)" name="warehouse[]" id="IngoingOutgoingCounterwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Counter)" name="purchasing[]" id="IngoingOutgoingCounterpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Counter)" name="qc[]" id="IngoingOutgoingCounterqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Reports (Counter)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Reports (Counter)" name="sales[]" id="ReportsCountersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Reports (Counter)" name="counter[]" id="ReportsCountercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Reports (Counter)" name="warehouse[]" id="ReportsCounterwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Reports (Counter)" name="purchasing[]" id="ReportsCounterpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Reports (Counter)" name="qc[]" id="ReportsCounterqc">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="pl-4" style="width: 30%;">CekSN (Counter)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Counter)" name="sales[]" id="CekSNCountersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Counter)" name="counter[]" id="CekSNCountercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Counter)" name="warehouse[]" id="CekSNCounterwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Counter)" name="purchasing[]" id="CekSNCounterpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="CekSN (Counter)" name="qc[]" id="CekSNCounterqc">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Stok Inventory (Counter)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Stok Inventory (Counter)" name="sales[]" id="StokInventoryCountersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Stok Inventory (Counter)" name="counter[]" id="StokInventoryCountercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Stok Inventory (Counter)" name="warehouse[]" id="StokInventoryCounterwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Stok Inventory (Counter)" name="purchasing[]" id="StokInventoryCounterpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Stok Inventory (Counter)" name="qc[]" id="StokInventoryCounterqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Delivery Order (Counter)</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Delivery Order (Counter)" name="sales[]" id="DeliveryOrderCountersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Delivery Order (Counter)" name="counter[]" id="DeliveryOrderCountercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Delivery Order (Counter)" name="warehouse[]" id="DeliveryOrderCounterwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Delivery Order (Counter)" name="purchasing[]" id="DeliveryOrderCounterpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Delivery Order (Counter)" name="qc[]" id="DeliveryOrderCounterqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Purchase Order</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order" name="sales[]" id="PurchaseOrdersales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order" name="counter[]" id="PurchaseOrdercounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order" name="warehouse[]" id="PurchaseOrderwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order" name="purchasing[]" id="PurchaseOrderpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order" name="qc[]" id="PurchaseOrderqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Report</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report" name="sales[]" id="Reportsales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report" name="counter[]" id="Reportcounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report" name="warehouse[]" id="Reportwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report" name="purchasing[]" id="Reportpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Report" name="qc[]" id="Reportqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4" style="width: 30%;">Purchase Order Book</td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order Book" name="sales[]" id="PurchaseOrderBooksales">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order Book" name="counter[]" id="PurchaseOrderBookcounter">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order Book" name="warehouse[]" id="PurchaseOrderBookwarehouse">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order Book" name="purchasing[]" id="PurchaseOrderBookpurchasing">
                                                    </div>
                                                </td>
                                                <td style="width: 14%;text-align:center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Purchase Order Book" name="qc[]" id="PurchaseOrderBookqc">
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                            <td class="pl-4" style="width: 30%;">Manage</td>
                                           <td style="width: 14%;text-align:center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" name="sales[]" id="flexCheckDefault">
                                                </div>
                                            </td>
                                            <td style="width: 14%;text-align:center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""   name="counter[]"id="flexCheckDefault">
                                                </div>
                                            </td>
                                            <td style="width: 14%;text-align:center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""  name="warehouse[]"id="flexCheckDefault">
                                                </div>
                                            </td>
                                            <td style="width: 14%;text-align:center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""   name="purchasing[]"id="flexCheckDefault">
                                                </div>
                                            </td>
                                            <td style="width: 14%;text-align:center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""  name="qc[]"id="flexCheckDefault">
                                                </div>
                                            </td>
                                        </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <img src="<?php echo base_url('assets/img/info_image.png') ?>" style="margin-left: 50px;margin-top: 20px">
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    start()

    function start() {

        var data = <?php echo json_encode($data); ?>;
        console.log(data)
        if (data != "Not Found") {
            for (var i = 0; i < data.length; i++) {

                if (data[i]["idrole"] == 2) {
                    if (data[i]["menu"] == "Sales Order") {
                        $('#SalesOrdersales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pending List") {
                        $('#PendingListsales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Invoice") {
                        $('#Invoicesales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Buat Penawaran") {
                        $('#BuatPenawaransales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "List Quotation") {
                        $('#ListQuotationsales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Sales Book") {
                        $('#SalesBooksales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Request (Gudang Utama)") {
                        $('#RequestGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Gudang Utama)") {
                        $('#IngoingOutgoingGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pindah Gudang (Gudang Utama)") {
                        $('#PindahGudangGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Paket Bundle Item (Gudang Utama)") {
                        $('#PaketBundleItemGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report (Gudang Utama)") {
                        $('#ReportGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Counter)") {
                        $('#TerbaruCountersales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Counter)") {
                        $('#IngoingOutgoingCountersales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Reports (Counter)") {
                        $('#ReportsCountersales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Stok Inventory (Counter)") {
                        $('#StokInventoryCountersales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Delivery Order (Counter)") {
                        $('#DeliveryOrderCountersales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order") {
                        $('#PurchaseOrdersales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report") {
                        $('#Reportsales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order Book") {
                        $('#PurchaseOrderBooksales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Gudang Utama)") {
                        $('#TerbaruGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Gudang Utama)") {
                        $('#CekSNGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Product (Gudang Utama)") {
                        $('#ProductGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Balance (Gudang Utama)") {
                        $('#BalanceGudangUtamasales').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Counter)") {
                        $('#CekSNCountersales').attr('checked', true);
                    }


                }
                if (data[i]["idrole"] == 3) {
                    if (data[i]["menu"] == "Sales Order") {
                        $('#SalesOrdercounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pending List") {
                        $('#PendingListcounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Invoice") {
                        $('#Invoicecounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Buat Penawaran") {
                        $('#BuatPenawarancounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "List Quotation") {
                        $('#ListQuotationcounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Sales Book") {
                        $('#SalesBookcounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Request (Gudang Utama)") {
                        $('#RequestGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Gudang Utama)") {
                        $('#IngoingOutgoingGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pindah Gudang (Gudang Utama)") {
                        $('#PindahGudangGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Paket Bundle Item (Gudang Utama)") {
                        $('#PaketBundleItemGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report (Gudang Utama)") {
                        $('#ReportGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Counter)") {
                        $('#TerbaruCountercounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Counter)") {
                        $('#IngoingOutgoingCountercounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Reports (Counter)") {
                        $('#ReportsCountercounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Stok Inventory (Counter)") {
                        $('#StokInventoryCountercounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Delivery Order (Counter)") {
                        $('#DeliveryOrderCountercounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order") {
                        $('#PurchaseOrdercounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report") {
                        $('#Reportcounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order Book") {
                        $('#PurchaseOrderBookcounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Gudang Utama)") {
                        $('#TerbaruGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Gudang Utama)") {
                        $('#CekSNGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Product (Gudang Utama)") {
                        $('#ProductGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Balance (Gudang Utama)") {
                        $('#BalanceGudangUtamacounter').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Counter)") {
                        $('#CekSNCountercounter').attr('checked', true);
                    }

                }
                if (data[i]["idrole"] == 4) {
                    if (data[i]["menu"] == "Sales Order") {
                        $('#SalesOrderwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pending List") {
                        $('#PendingListwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Invoice") {
                        $('#Invoicewarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Buat Penawaran") {
                        $('#BuatPenawaranwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "List Quotation") {
                        $('#ListQuotationwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Sales Book") {
                        $('#SalesBookwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Request (Gudang Utama)") {
                        $('#RequestGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Gudang Utama)") {
                        $('#IngoingOutgoingGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pindah Gudang (Gudang Utama)") {
                        $('#PindahGudangGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Paket Bundle Item (Gudang Utama)") {
                        $('#PaketBundleItemGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report (Gudang Utama)") {
                        $('#ReportGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Counter)") {
                        $('#TerbaruCounterwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Counter)") {
                        $('#IngoingOutgoingCounterwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Reports (Counter)") {
                        $('#ReportsCounterwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Stok Inventory (Counter)") {
                        $('#StokInventoryCounterwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Delivery Order (Counter)") {
                        $('#DeliveryOrderCounterwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order") {
                        $('#PurchaseOrderwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report") {
                        $('#Reportwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order Book") {
                        $('#PurchaseOrderBookwarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Gudang Utama)") {
                        $('#TerbaruGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Gudang Utama)") {
                        $('#CekSNGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Product (Gudang Utama)") {
                        $('#ProductGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Balance (Gudang Utama)") {
                        $('#BalanceGudangUtamawarehouse').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Counter)") {
                        $('#CekSNCounterwarehouse').attr('checked', true);
                    }

                }
                if (data[i]["idrole"] == 5) {
                    if (data[i]["menu"] == "Sales Order") {
                        $('#SalesOrderpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pending List") {
                        $('#PendingListpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Invoice") {
                        $('#Invoicepurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Buat Penawaran") {
                        $('#BuatPenawaranpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "List Quotation") {
                        $('#ListQuotationpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Sales Book") {
                        $('#SalesBookpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Request (Gudang Utama)") {
                        $('#RequestGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Gudang Utama)") {
                        $('#IngoingOutgoingGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pindah Gudang (Gudang Utama)") {
                        $('#PindahGudangGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Paket Bundle Item (Gudang Utama)") {
                        $('#PaketBundleItemGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report (Gudang Utama)") {
                        $('#ReportGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Counter)") {
                        $('#TerbaruCounterpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Counter)") {
                        $('#IngoingOutgoingCounterpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Reports (Counter)") {
                        $('#ReportsCounterpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Stok Inventory (Counter)") {
                        $('#StokInventoryCounterpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Delivery Order (Counter)") {
                        $('#DeliveryOrderCounterpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order") {
                        $('#PurchaseOrderpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report") {
                        $('#Reportpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order Book") {
                        $('#PurchaseOrderBookpurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Gudang Utama)") {
                        $('#TerbaruGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Gudang Utama)") {
                        $('#CekSNGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Product (Gudang Utama)") {
                        $('#ProductGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Balance (Gudang Utama)") {
                        $('#BalanceGudangUtamapurchasing').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Counter)") {
                        $('#CekSNCounterpurchasing').attr('checked', true);
                    }

                }

                if (data[i]["idrole"] == 6) {
                    if (data[i]["menu"] == "Sales Order") {
                        $('#SalesOrderqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pending List") {
                        $('#PendingListqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Invoice") {
                        $('#Invoiceqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Buat Penawaran") {
                        $('#BuatPenawaranqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "List Quotation") {
                        $('#ListQuotationqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Sales Book") {
                        $('#SalesBookqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Request (Gudang Utama)") {
                        $('#RequestGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Gudang Utama)") {
                        $('#IngoingOutgoingGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Pindah Gudang (Gudang Utama)") {
                        $('#PindahGudangGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Paket Bundle Item (Gudang Utama)") {
                        $('#PaketBundleItemGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report (Gudang Utama)") {
                        $('#ReportGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Counter)") {
                        $('#TerbaruCounterqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Ingoing & Outgoing (Counter)") {
                        $('#IngoingOutgoingCounterqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Reports (Counter)") {
                        $('#ReportsCounterqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Stok Inventory (Counter)") {
                        $('#StokInventoryCounterqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Delivery Order (Counter)") {
                        $('#DeliveryOrderCounterqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order") {
                        $('#PurchaseOrderqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Report") {
                        $('#Reportqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Purchase Order Book") {
                        $('#PurchaseOrderBookqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Terbaru (Gudang Utama)") {
                        $('#TerbaruGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Gudang Utama)") {
                        $('#CekSNGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Product (Gudang Utama)") {
                        $('#ProductGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "Balance (Gudang Utama)") {
                        $('#BalanceGudangUtamaqc').attr('checked', true);
                    }
                    if (data[i]["menu"] == "CekSN (Counter)") {
                        $('#CekSNCounterqc').attr('checked', true);
                    }

                }
            }
        }

    }
</script>