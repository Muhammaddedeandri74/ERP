<?php


class Salesinvoice extends CI_Model
{

	function getsalesinvoice()
	{
		$query = "SELECT * FROM tb_salesinvoice ORDER BY codeinv ASC";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {

			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idinv"] = $key->idinv;
				$f["codeinv"] = $key->codeinv;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateinv"] = $key->dateinv;
				$f["typeinv"] = $key->typeinv;
				$f["period"] = $key->period;
				$f["totalinv"] = $key->totalinv;
				$f["vat"] = $key->vat;
				$f["vatrp"] = $key->vatrp;
				$f["disc"] = $key->disc;
				$f["discrp"] = $key->discrp;
				$f["cash"] = $key->cash;
				$f["card"] = $key->card;
				$f["balace"] = $key->balance;

				if ($key->balance == $key->totalinv) {
					$f["status"] = "Unpaid";
				} else if ($key->balance == 0) {
					$f["status"] = "Paid";
				} else {
					$f["status"] = "Paid Partial";
				}

				$data1 = array($key->idinv);
				$query1 = "SELECT * FROM tb_salesinvoicedo,tb_do,tb_salesorder WHERE tb_salesinvoicedo.idinv = ? AND tb_salesinvoicedo.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["codeso"] = $key->codeso;
						$f["idso"] = $key->idso;
						$f["typeso"] = $key->typeso;
					}
				}

				$data5 = array($f["codeso"]);
				$query5 = "SELECT * FROM tb_salesorder WHERE  codeso = ?";
				$eksekusi1 = $this->db->query($query5, $data5)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["nopesanan"] = $key->nopesanan;
						$f["delivfee"] = $key->delivfee;
						$f["subtotal"] = $key->subtotal;
						$f["discount"] = $key->disc;
					}
				}


				$data2 = array($key->idcust);
				$query2 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi2 = $this->db->query($query2, $data2)->result_object();
				if (count($eksekusi2) > 0) {
					foreach ($eksekusi2 as $key) {
						$f["namecust"] = $key->namecomm;
					}
				}

				$data3 = array($f["idcurrency"]);
				$query3 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					foreach ($eksekusi3 as $key) {
						$f["namecurrency"] = $key->namecomm;
					}
				}

				$data4 = array($f["idinv"], $f["idso"]);
				$query4 = "SELECT *, tb_salesorderdetail.pricebuyitem AS pricebuyitems FROM tb_salesinvoicedetail, tb_item, tb_salesorderdetail WHERE tb_salesinvoicedetail.idinv =? AND tb_salesorderdetail.idso = ? 
				AND tb_salesinvoicedetail.iditem = tb_item.iditem AND tb_salesinvoicedetail.iditem = tb_salesorderdetail.iditem ";
				$eksekusi4 = $this->db->query($query4, $data4)->result_object();
				if (count($eksekusi4)) {
					$f["data"] = array();
					foreach ($eksekusi4 as $keyx) {
						$g["idinvdet"] = $keyx->idinvdet;
						$g["nameitem"] = $keyx->nameitem;
						$g["iditem"] = $keyx->iditem;
						$g["pricebuyitem"] = $keyx->pricebuyitems;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["VAT"] = $keyx->priceitem * (float)$keyx->VAT / 100;
						$g["price"] = $keyx->price;
						$g["priceitem"] = $keyx->priceitem;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->subinv;

						array_push($f["data"], $g);
					}
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}


		return $respon;
	}

	function getsalesinvoicereturn()
	{
		$query = "SELECT * FROM tb_salesorder inner join invinret on tb_salesorder.idso = invinret.idso";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"]      =  $key->idso;
				$f["codeinret"] =  $key->codeinret;
				$f["dateinret"] =  $key->dateinret;
				$f["qtyinret"]  =  $key->qtyinret;
				$f["descinfo"]  =  $key->descinfo;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function salesinvoicepaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust =tb_salesorder.idcust  ORDER BY codeinv ASC";
		$data  = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t WHERE " . $filter . " LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t WHERE REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t WHERE status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t WHERE $filter LIKE ? AND REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t WHERE $filter LIKE ? AND status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t WHERE REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND status='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t WHERE $filter LIKE ? AND REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND status='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash, 
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,common_detail.namecomm,
             CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.codeinv) AS RowNumber FROM tb_salesinvoice 
            left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
            left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE tb_salesorder.statusorder='Finish')  AS t where t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {

			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idinv"] = $key->idinv;
				$f["codeinv"] = $key->codeinv;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateinv"] = $key->dateinv;
				$f["typeinv"] = $key->typeinv;
				$f["period"] = $key->period;
				$f["totalinv"] = $key->totalinv;
				$f["vat"] = $key->vat;
				$f["vatrp"] = $key->vatrp;
				$f["disc"] = $key->disc;
				$f["discrp"] = $key->discrp;
				$f["cash"] = $key->cash;
				$f["card"] = $key->card;
				$f["balace"] = $key->balance;
				$f["codeso"] = "";
				$f["idso"] = "";

				if ($key->balance == $key->totalinv) {
					$f["status"] = "Unpaid";
				} else if ($key->balance == 0) {
					$f["status"] = "Paid";
				} else {
					$f["status"] = "Paid Partial";
				}

				$data1 = array($key->idinv);
				$query1 = "SELECT * FROM tb_salesinvoicedo,tb_do,tb_salesorder WHERE tb_salesinvoicedo.idinv = ? AND tb_salesinvoicedo.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["codeso"] = $key->codeso;
						$f["idso"] = $key->idso;
						$f["typeso"] = $key->typeso;
					}
				}

				$data5 = array($f["codeso"]);
				$query5 = "SELECT * FROM tb_salesorder WHERE  codeso = ?";
				$eksekusi1 = $this->db->query($query5, $data5)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["nopesanan"] = $key->nopesanan;
						$f["delivfee"] = $key->delivfee;
						$f["subtotal"] = $key->subtotal;
						$f["discount"] = $key->disc;
					}
				}


				$data2 = array($key->idcust);
				$query2 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi2 = $this->db->query($query2, $data2)->result_object();
				if (count($eksekusi2) > 0) {
					foreach ($eksekusi2 as $key) {
						$f["namecust"] = $key->namecomm;
					}
				}

				$data3 = array($f["idcurrency"]);
				$query3 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					foreach ($eksekusi3 as $key) {
						$f["namecurrency"] = $key->namecomm;
					}
				}

				$data4 = array($f["idinv"], $f["idso"]);
				$query4 = "SELECT *, tb_salesorderdetail.pricebuyitem AS pricebuyitems FROM tb_salesinvoicedetail, tb_item, tb_salesorderdetail WHERE tb_salesinvoicedetail.idinv =? AND tb_salesorderdetail.idso = ? 
				AND tb_salesinvoicedetail.iditem = tb_item.iditem AND tb_salesinvoicedetail.iditem = tb_salesorderdetail.iditem ";
				$eksekusi4 = $this->db->query($query4, $data4)->result_object();
				// print_r($this->db->last_query());
				if (count($eksekusi4)) {
					$f["data"] = array();
					foreach ($eksekusi4 as $keyx) {
						$g["idinvdet"] = $keyx->idinvdet;
						$g["nameitem"] = $keyx->nameitem;
						$g["iditem"] = $keyx->iditem;
						$g["pricebuyitem"] = $keyx->pricebuyitems;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						// echo $keyx->priceitem . "*" . $keyx->VAT / 100;
						$g["VAT"] = $keyx->priceitem * (float)$keyx->VAT / 100;

						$g["price"] = $keyx->price;
						$g["priceitem"] = $keyx->priceitem;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->subinv;

						array_push($f["data"], $g);
					}
				}
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function countAllInvoice($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_salesinvoice');
		$this->db->join('tb_salesorder', 'tb_salesinvoice.idcust = tb_salesorder.idcust', 'left');
		$this->db->join('common_detail', 'tb_salesinvoice.idcust = common_detail.idcomm', 'left');
		$this->db->where('statusorder', 'Finish');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like('tb_salesinvoice.dateinv', $date1, $date2);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->like($filter, $search, 'tb_salesinvoice.dateinv', $date1, $date2);
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->like($filter, $search, $status);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('tb_salesinvoice.dateinv', $date1, $date2, $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $status, 'tb_salesinvoice.dateinv', $date1, $date2, $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function salesbookspaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust =tb_salesorder.idcust  ORDER BY codeinv ASC";
		$data = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
						,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
						 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
						 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
						ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
						left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE $filter LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
			 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
			left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
			 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
			left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
			 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
			left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE $filter LIKE ? AND REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
			 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
			left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE $filter LIKE ? AND status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
			 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
			left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
			,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
			 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
			 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
			ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
			left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE $filter LIKE ? AND REPLACE(dateinv, ' ', '') >= ? AND REPLACE(dateinv, ' ', '') <= ? AND status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT distinct codeinv,t.*  FROM (SELECT tb_salesinvoice.idinv,tb_salesinvoice.codeinv,tb_salesinvoice.idcust,tb_salesinvoice.idcurrency,tb_salesinvoice.typeinv,tb_salesinvoice.period
						,tb_salesinvoice.totalinv , tb_salesinvoice.vat , tb_salesinvoice.vatrp, tb_salesinvoice.disc,tb_salesinvoice.discrp,tb_salesinvoice.cash,common_detail.namecomm,
						 tb_salesinvoice.card,tb_salesinvoice.balance,tb_salesorder.codeso,tb_salesorder.idso,tb_salesorder.nopesanan,tb_salesinvoice.dateinv,
						 CASE WHEN tb_salesinvoice.balance = tb_salesinvoice.totalinv THEN 'Unpaid' WHEN tb_salesinvoice.balance ='0' THEN 'Paid' ELSE 'Paid Partial' END as status,
						ROW_NUMBER() OVER (Order by tb_salesinvoice.idinv) AS RowNumber FROM tb_salesinvoice left join tb_salesorder on tb_salesinvoice.idcust = tb_salesorder.idcust 
						left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder='Finish' AND statusorder='Finish')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {

			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idinv"] = $key->idinv;
				$f["codeinv"] = $key->codeinv;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateinv"] = $key->dateinv;
				$f["typeinv"] = $key->typeinv;
				$f["period"] = $key->period;
				$f["totalinv"] = $key->totalinv;
				$f["vat"] = $key->vat;
				$f["vatrp"] = $key->vatrp;
				$f["disc"] = $key->disc;
				$f["discrp"] = $key->discrp;
				$f["cash"] = $key->cash;
				$f["card"] = $key->card;
				$f["balace"] = $key->balance;
				$f["codeso"] = "";
				$f["idso"] = "";

				if ($key->balance == $key->totalinv) {
					$f["status"] = "Unpaid";
				} else if ($key->balance == 0) {
					$f["status"] = "Paid";
				} else {
					$f["status"] = "Paid Partial";
				}

				$data1 = array($key->idinv);
				$query1 = "SELECT * FROM tb_salesinvoicedo,tb_do,tb_salesorder WHERE tb_salesinvoicedo.idinv = ? AND tb_salesinvoicedo.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["codeso"] = $key->codeso;
						$f["idso"] = $key->idso;
						$f["typeso"] = $key->typeso;
					}
				}

				$data5 = array($f["codeso"]);
				$query5 = "SELECT * FROM tb_salesorder WHERE  codeso = ?";
				$eksekusi1 = $this->db->query($query5, $data5)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["nopesanan"] = $key->nopesanan;
						$f["delivfee"] = $key->delivfee;
						$f["subtotal"] = $key->subtotal;
						$f["discount"] = $key->disc;
						$f["jasapengirim"] = $key->jasapengirim;
					}
				}


				$data2 = array($key->idcust);
				$query2 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi2 = $this->db->query($query2, $data2)->result_object();
				if (count($eksekusi2) > 0) {
					foreach ($eksekusi2 as $key) {
						$f["namecust"] = $key->namecomm;
					}
				}

				$data3 = array($f["idcurrency"]);
				$query3 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					foreach ($eksekusi3 as $key) {
						$f["namecurrency"] = $key->namecomm;
					}
				}

				$data4 = array($f["idinv"], $f["idso"]);
				$query4 = "SELECT *, tb_salesorderdetail.pricebuyitem AS pricebuyitems FROM tb_salesinvoicedetail, tb_item, tb_salesorderdetail WHERE tb_salesinvoicedetail.idinv =? AND tb_salesorderdetail.idso = ? 
				AND tb_salesinvoicedetail.iditem = tb_item.iditem AND tb_salesinvoicedetail.iditem = tb_salesorderdetail.iditem ";
				$eksekusi4 = $this->db->query($query4, $data4)->result_object();
				if (count($eksekusi4)) {
					$f["data"] = array();
					foreach ($eksekusi4 as $keyx) {
						$g["idinvdet"] = $keyx->idinvdet;
						$g["nameitem"] = $keyx->nameitem;
						$g["iditem"] = $keyx->iditem;
						$g["pricebuyitem"] = $keyx->pricebuyitems;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["VAT"] = $keyx->priceitem * (float)$keyx->VAT / 100;
						$g["price"] = $keyx->price;
						$g["priceitem"] = $keyx->priceitem;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->subinv;

						array_push($f["data"], $g);
					}
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function countsalesbooks($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_salesinvoice');
		$this->db->join('tb_salesorder', 'tb_salesinvoice.idcust=tb_salesorder.idcust', 'left');
		$this->db->join('common_detail', 'tb_salesinvoice.idcust=common_detail.idcomm', 'left');
		$this->db->where('statusorder=', 'Finish');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_salesinvoice.dateinv', $date1, $date2);
		} else if ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where($filter, $status);
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'tb_salesinvoice.dateinv', $date1, $date2);
		} else if ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where($filter, $search, $status);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('tb_salesinvoice.dateinv', $date1, $date2, $status);
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $search, 'tb_salesinvoice.dateinv', $date1, $date2, $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}


	function getsalesinvoicebydate($start, $finish)
	{
		$data = array($start, $finish);
		$query = "SELECT * FROM tb_salesinvoice WHERE dateinv >= ? AND dateinv <= ? ORDER BY codeinv ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {

			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idinv"] = $key->idinv;
				$f["codeinv"] = $key->codeinv;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateinv"] = $key->dateinv;
				$f["typeinv"] = $key->typeinv;
				$f["period"] = $key->period;
				$f["totalinv"] = $key->totalinv;
				$f["vat"] = $key->vat;
				$f["vatrp"] = $key->vatrp;
				$f["disc"] = $key->disc;
				$f["discrp"] = $key->discrp;
				$f["cash"] = $key->cash;
				$f["card"] = $key->card;
				$f["balace"] = $key->balance;

				if ($key->balance == $key->totalinv) {
					$f["status"] = "Unpaid";
				} else if ($key->balance == 0) {
					$f["status"] = "Paid";
				} else {
					$f["status"] = "Paid Partial";
				}

				$data1 = array($key->idinv);
				$query1 = "SELECT * FROM tb_salesinvoicedo,tb_do,tb_salesorder WHERE tb_salesinvoicedo.idinv = ? AND tb_salesinvoicedo.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["codeso"] = $key->codeso;
						$f["typeso"] = $key->typeso;
					}
				}

				$data5 = array($f["codeso"]);
				$query5 = "SELECT * FROM tb_salesorder WHERE  codeso = ?";
				$eksekusi1 = $this->db->query($query5, $data5)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						$f["nopesanan"] = $key->nopesanan;
						$f["delivfee"] = $key->delivfee;
						$f["subtotal"] = $key->subtotal;
						$f["discount"] = $key->disc;
					}
				}


				$data2 = array($key->idcust);
				$query2 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi2 = $this->db->query($query2, $data2)->result_object();
				if (count($eksekusi2) > 0) {
					foreach ($eksekusi2 as $key) {
						$f["namecust"] = $key->namecomm;
					}
				}

				$data3 = array($f["idcurrency"]);
				$query3 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					foreach ($eksekusi3 as $key) {
						$f["namecurrency"] = $key->namecomm;
					}
				}

				$data4 = array($f["idinv"]);
				$query4 = "SELECT * FROM tb_salesinvoicedetail, tb_item WHERE tb_salesinvoicedetail.idinv =? AND tb_salesinvoicedetail.iditem = tb_item.iditem ";
				$eksekusi4 = $this->db->query($query4, $data4)->result_object();
				if (count($eksekusi4)) {
					$f["data"] = array();
					foreach ($eksekusi4 as $keyx) {
						$g["nameitem"] = $keyx->nameitem;
						$g["iditem"] = $keyx->iditem;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["VAT"] = $keyx->priceitem * (float)$keyx->VAT / 100;
						$g["price"] = $keyx->price;
						$g["priceitem"] = $keyx->priceitem;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->subinv;

						array_push($f["data"], $g);
					}
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}


		return $respon;
	}



	function getsalesinvoicebyid($idinv)
	{
		$data = array($idinv);
		$query = "SELECT * FROM tb_salesinvoice WHERE idinv = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {

			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idinv"] = $key->idinv;
				$f["codeinv"] = $key->codeinv;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateinv"] = $key->dateinv;
				$f["typeinv"] = $key->typeinv;
				$f["period"] = $key->period;
				$f["totalinv"] = $key->totalinv;
				$f["vat"] = $key->vat;
				$f["vatrp"] = $key->vatrp;
				$f["disc"] = $key->disc;
				$f["discrp"] = $key->discrp;
				$f["cash"] = $key->cash;
				$f["card"] = $key->card;
				$f["balance"] = $key->balance;

				if ($key->balance == $key->totalinv) {
					$f["status"] = "Unpaid";
				} else if ($key->balance == 0) {
					$f["status"] = "Paid";
				} else {
					$f["status"] = "Paid Partial";
				}

				$data1 = array($idinv);
				$query1 = "SELECT * FROM tb_salesinvoicedo,tb_do,tb_salesorder WHERE tb_salesinvoicedo.idinv = ? AND tb_salesinvoicedo.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $keyx) {
						$f["codeso"] = $keyx->codeso;
						$f["typeso"] = $keyx->typeso;
						$f["delivaddr"] = $keyx->delivaddr;
						$f["delivfee"] = $keyx->delivfee;
						$f["datedo"] = $keyx->datedo;
						$f["jasapengirim"] = $keyx->jasapengirim;
						$f["VAT"] = $keyx->VAT;
						$f["disc1"] = $keyx->disc;
						$f["totalprice"] = $keyx->totalprice;
						$f["typeso"] = $keyx->typeso;
						$f["typepayment"] = $keyx->typepayment;
					}
				}

				$data2 = array($key->idcust);
				$query2 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi2 = $this->db->query($query2, $data2)->result_object();
				if (count($eksekusi2) > 0) {
					foreach ($eksekusi2 as $keyx) {
						$f["namecust"] = $keyx->namecomm;
					}
				}

				$data3 = array($f["idcurrency"]);
				$query3 = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					foreach ($eksekusi3 as $keyx) {
						$f["namecurrency"] = $keyx->namecomm;
					}
				}

				$data4 = array($idinv);
				$query4 = "SELECT * FROM tb_salesinvoicedetail, tb_item WHERE tb_salesinvoicedetail.idinv =? AND tb_salesinvoicedetail.iditem = tb_item.iditem ";
				$eksekusi4 = $this->db->query($query4, $data4)->result_object();
				if (count($eksekusi4)) {
					$f["data"] = array();
					foreach ($eksekusi4 as $keyx) {
						$g["idinvdet"] = $keyx->idinvdet;
						$g["nameitem"] = $keyx->nameitem;
						$g["iditem"] = $keyx->iditem;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["VAT"] = $keyx->priceitem * (float)$keyx->VAT / 100;
						$g["price"] = $keyx->price;
						$g["priceitem"] = $keyx->priceitem;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->subinv;

						array_push($f["data"], $g);
					}
				}

				$data5     = array($key->idinv);
				$query5    = "select * from tb_salesinvoice,tb_salesorder,invinret where tb_salesinvoice.idcust = tb_salesorder.idcust AND tb_salesorder.idso = invinret.idso AND tb_salesinvoice.idinv = ?";
				$eks = $this->db->query($query5, $data5)->result_object();
				if (count($eks) > 0) {
					foreach ($eks as $keys) {
						$f["idinv"]     =  $keys->idinv;
						$f["codeinret"] =  $keys->codeinret;
						$f["dateinret"] =  $keys->dateinret;
						$f["qtyinret"]  =  $keys->qtyinret;
						$f["descinfo"]  =  $keys->descinfo;
					}
				} else {
					// $f["idinv"]     = 0;
					$f["codeinret"] = 0;
					$f["dateinret"] = 0;
					$f["qtyinret"]  = 0;
					$f["descinfo"]  = 0;
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}


		return $respon;
	}


	function updateinvoice($idinv, $paymentmethod, $jmlbayar, $balance, $idinvdet, $discdet, $totalprice, $disnom)
	{
		$query;
		$this->db->trans_start();
		$data = array($jmlbayar, $balance, $disnom, $idinv);
		if ($paymentmethod == "Cash") {
			$query = "UPDATE tb_salesinvoice SET cash = CAST(cash AS int) + ? , balance = ?, discrp = ? WHERE idinv = ?";
		} else {
			$query = "UPDATE tb_salesinvoice SET card = CAST(card AS int) + ? , balance = ?, discrp = ? WHERE idinv = ?";
		}
		$eksekusi = $this->db->query($query, $data);
		print_r($this->db->last_query());
		if ($eksekusi == true) {

			for ($i = 0; $i < count($idinvdet); $i++) {
				$data1 = array($discdet[$i], $totalprice[$i], $idinvdet[$i]);
				$query1 = "UPDATE tb_salesinvoicedetail SET disc = ? , subinv = ? WHERE idinvdet = ?";
				$eksekusi1 = $this->db->query($query1, $data1);
				if ($eksekusi1 == true) {
					$respon = "Success";
				} else {
					$respon = "Failed";
					break;
				}
			}
		} else {
			$respon = "Failed";
		}


		if ($respon == "Success") {
			$this->db->trans_complete();
		} else {
			$this->db->trans_rollback();
		}

		return $respon;
	}



	function updatebychek($idinv)
	{
		$this->db->trans_start();

		$fail = 0;

		foreach ($idinv as $key) {
			$data = array($key);
			$query = "UPDATE tb_salesinvoice SET cash = CAST(cash AS int) +  CAST(balance AS int) ,  balance = 0 WHERE idinv = ?";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi != true) {
				$fail++;
			}
		}

		if ($fail > 0) {
			$respon = "Failed Try Again";
			$this->db->trans_rollback();
		} else {
			$respon = "Success";
			$this->db->trans_complete();
		}

		return $respon;
	}
}
