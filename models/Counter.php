<?php


class Counter extends CI_Model
{
	function getdatacounterorderwaitingpaginate()
	{
		// $query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.statusorder = 'Waiting' AND tb_salesorder.idcust = common_detail.idcomm ORDER BY tb_salesorder.codeso ASC";

		$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, tb_salesorder.idcust,tb_salesorder.idcurrency,tb_salesorder.delivfee,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
		tb_salesorder.VAT,tb_salesorder.notif,common_detail.namecomm,
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm 
		WHERE tb_salesorder.statusorder = 'Waiting')  AS t";

		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["nopesanan"] = $key->nopesanan;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateso"] = $key->dateso;
				$f["delivdate"] = $key->delivdate;
				$f["jasapengirim"] = $key->jasapengirim;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["typepayment"] = $key->typepayment;
				$f["subtotal"] = $key->subtotal;
				$f["disc"] = $key->disc;
				$f["VAT"] = $key->VAT;
				$f["totalprice"] = $key->totalprice;
				$f["typeso"] = $key->typeso;
				$f["totalso"] = $key->totalso;
				$f["statusorder"] = $key->statusorder;
				$f["namecust"] = $key->namecomm;
				$f["notif"] = $key->notif;
				$f["outtype"] = "OUT - Sales";

				$datax = array($key->typeso);
				$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["typeorder"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idso);
				$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					$f["data"] = array();
					foreach ($eksekusixx as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["sku"] = $keyx->sku;
						$g["nameitem"] = $keyx->nameitem;
						$g["qtyorder"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->totalprice;


						$dataxxx = array($keyx->iditem);
						$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
						$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
						if (count($eksekusixxx) > 0) {
							foreach ($eksekusixxx as $keyxx) {
								$g["qtyready"] = $keyxx->endqty;
							}
						}

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

	function countinout()
	{
		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust=common_detail.idcomm', 'left');
		$this->db->where('statusorder', 'Waiting');
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getdatacounterorderprocess()
	{
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.statusorder = 'Process' AND tb_salesorder.idcust = common_detail.idcomm ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["nopesanan"] = $key->nopesanan;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateso"] = $key->dateso;
				$f["delivdate"] = $key->delivdate;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["typepayment"] = $key->typepayment;
				$f["subtotal"] = $key->subtotal;
				$f["disc"] = $key->disc;
				$f["VAT"] = $key->VAT;
				$f["totalprice"] = $key->totalprice;
				$f["typeso"] = $key->typeso;
				$f["totalso"] = $key->totalso;
				$f["statusorder"] = $key->statusorder;
				$f["namecust"] = $key->namecomm;
				$f["notif"] = $key->notif;
				$f["outtype"] = "OUT - Sales";

				$datax = array($key->typeso);
				$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["typeorder"] = $keyx->namecomm;
					}
				}

				$datax = array($key->statusorder);
				$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["orderstatus"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idso);
				$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					$f["data"] = array();
					foreach ($eksekusixx as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["sku"] = $keyx->sku;
						$g["nameitem"] = $keyx->nameitem;
						$g["qtyorder"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->totalprice;


						$dataxxx = array($keyx->iditem);
						$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
						$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
						if (count($eksekusixxx) > 0) {
							foreach ($eksekusixxx as $keyxx) {
								$g["qtyready"] = $keyxx->endqty;
							}
						}

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

	function getdatacounterorderprocesspaginate($start, $limit, $filter, $search, $date1, $date2)
	{
		// $query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.statusorder = 'Process' AND tb_salesorder.idcust = common_detail.idcomm ORDER BY tb_salesorder.codeso ASC";
		$data = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.idcust,tb_salesorder.delivfee,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,common_detail.namecomm,tb_salesorder.idcurrency,
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm  
		WHERE tb_salesorder.statusorder = 'Process' AND  " . $filter . " like ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.idcust,tb_salesorder.delivfee,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,tb_salesorder.idcurrency, common_detail.namecomm,
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm
		WHERE tb_salesorder.statusorder = 'Process' AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.idcust,tb_salesorder.delivfee,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,tb_salesorder.idcurrency,common_detail.namecomm,
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm 
		WHERE tb_salesorder.statusorder = 'Process' AND $filter LIKE ? AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
			,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.idcust,tb_salesorder.idcurrency,tb_salesorder.delivfee,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,common_detail.namecomm,
			ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm 
			WHERE tb_salesorder.statusorder = 'Process')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["nopesanan"] = $key->nopesanan;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateso"] = $key->dateso;
				$f["delivdate"] = $key->delivdate;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["typepayment"] = $key->typepayment;
				$f["subtotal"] = $key->subtotal;
				$f["disc"] = $key->disc;
				$f["VAT"] = $key->VAT;
				$f["totalprice"] = $key->totalprice;
				$f["typeso"] = $key->typeso;
				$f["totalso"] = $key->totalso;
				$f["statusorder"] = $key->statusorder;
				$f["namecust"] = $key->namecomm;
				$f["notif"] = $key->notif;
				$f["outtype"] = "OUT - Sales";

				$datax = array($key->typeso);
				$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["typeorder"] = $keyx->namecomm;
					}
				}

				$datax = array($key->statusorder);
				$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["orderstatus"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idso);
				$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					$f["data"] = array();
					foreach ($eksekusixx as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["sku"] = $keyx->sku;
						$g["nameitem"] = $keyx->nameitem;
						$g["qtyorder"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->totalprice;


						$dataxxx = array($keyx->iditem);
						$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
						$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
						if (count($eksekusixxx) > 0) {
							foreach ($eksekusixxx as $keyxx) {
								$g["qtyready"] = $keyxx->endqty;
							}
						}

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

	function countcounterorderprocess($filter, $search, $date1, $date2)
	{
		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust = common_detail.idcomm', 'left');
		$this->db->where('statusorder', 'Process');
		if ($search != "" && $date1 == "" && $date2 == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "") {
			$this->db->where('dateso', $date1, $date2);
		} else if ($search != "" && $date1 != "" && $date2 != "") {
			$this->db->where($filter, $search, 'tb_salesorder.dateso', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}


	function getdatacounterorderfinish()
	{
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.statusorder = 'Finish' AND tb_salesorder.idcust = common_detail.idcomm  ORDER BY tb_salesorder.codeso ASC";
		// $this->db->select('*');
		// $this->db->from('tb_salesorder as a');
		// $this->db->join('common_detail as b', 'a.idcust = b.idcomm');
		// $this->db->where('a.statusorder', 'Finish');
		// $this->db->order_by('a.codeso', 'asc');
		// $this->db->limit($start, $limit);

		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["nopesanan"] = $key->nopesanan;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateso"] = $key->dateso;
				$f["delivdate"] = $key->delivdate;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["typepayment"] = $key->typepayment;
				$f["subtotal"] = $key->subtotal;
				$f["disc"] = $key->disc;
				$f["VAT"] = $key->VAT;
				$f["totalprice"] = $key->totalprice;
				$f["typeso"] = $key->typeso;
				$f["totalso"] = $key->totalso;
				$f["statusorder"] = $key->statusorder;
				$f["namecust"] = $key->namecomm;
				$f["notif"] = $key->notif;
				$f["outtype"] = "OUT - Sales";


				$datax = array($key->typeso);
				$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["typeorder"] = $keyx->namecomm;
					}
				}

				$datax = array($key->statusorder);
				$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["orderstatus"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idso);
				$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					$f["data"] = array();
					foreach ($eksekusixx as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["sku"] = $keyx->sku;
						$g["nameitem"] = $keyx->nameitem;
						$g["qtyorder"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->totalprice;


						$dataxxx = array($keyx->iditem);
						$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
						$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
						if (count($eksekusixxx) > 0) {
							foreach ($eksekusixxx as $keyxx) {
								$g["qtyready"] = $keyxx->endqty;
							}
						}

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



	function getdatacounterorderfinishpaginate($start, $limit, $filter, $search, $date1, $date2)
	{
		// $query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.statusorder = 'Finish' AND tb_salesorder.idcust = common_detail.idcomm  ORDER BY tb_salesorder.codeso ASC";
		$data = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.idcust,tb_salesorder.delivfee,tb_salesorder.jasapengirim,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,common_detail.namecomm,tb_salesorder.idcurrency,
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm  
		WHERE tb_salesorder.statusorder = 'Finish' AND  " . $filter . " like ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.idcust,tb_salesorder.delivfee,tb_salesorder.jasapengirim,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,tb_salesorder.idcurrency, common_detail.namecomm,
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm
		WHERE tb_salesorder.statusorder = 'Finish' AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.idcust,tb_salesorder.delivfee,tb_salesorder.jasapengirim,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,tb_salesorder.idcurrency,common_detail.namecomm,
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm 
		WHERE tb_salesorder.statusorder = 'Finish' AND $filter LIKE ? AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
			,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.idcust,tb_salesorder.jasapengirim,tb_salesorder.idcurrency,tb_salesorder.delivfee,tb_salesorder.typepayment,tb_salesorder.subtotal,tb_salesorder.disc,
			tb_salesorder.VAT,tb_salesorder.notif,common_detail.namecomm,
			ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm 
			WHERE tb_salesorder.statusorder = 'Finish')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				// $f["idcomp"] = $key->idcomp;
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["nopesanan"] = $key->nopesanan;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateso"] = $key->dateso;
				$f["delivdate"] = $key->delivdate;
				$f["jasapengirim"] = $key->jasapengirim;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["typepayment"] = $key->typepayment;
				$f["subtotal"] = $key->subtotal;
				$f["disc"] = $key->disc;
				$f["VAT"] = $key->VAT;
				$f["totalprice"] = $key->totalprice;
				$f["typeso"] = $key->typeso;
				$f["totalso"] = $key->totalso;
				$f["statusorder"] = $key->statusorder;
				$f["namecust"] = $key->namecomm;
				$f["notif"] = $key->notif;
				$f["outtype"] = "OUT - Sales";


				$datax = array($key->typeso);
				$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["typeorder"] = $keyx->namecomm;
					}
				}

				$datax = array($key->statusorder);
				$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["orderstatus"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idso);
				$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					$f["data"] = array();
					foreach ($eksekusixx as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["sku"] = $keyx->sku;
						$g["nameitem"] = $keyx->nameitem;
						$g["qtyorder"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->totalprice;


						$dataxxx = array($keyx->iditem);
						$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
						$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
						if (count($eksekusixxx) > 0) {
							foreach ($eksekusixxx as $keyxx) {
								$g["qtyready"] = $keyxx->endqty;
							}
						}

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

	function countcounterorderfinish($filter, $search, $date1, $date2)
	{
		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust = common_detail.idcomm', 'left');
		$this->db->where('statusorder', 'Finish');
		if ($search != "" && $date1 == "" && $date2 == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "") {
			$this->db->where('dateso', $date1, $date2);
		} else if ($search != "" && $date1 != "" && $date2 != "") {
			$this->db->where($filter, $search, 'dateso', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}


	function getdatacounterorderfinishbydate($start, $finish)
	{
		$data = array($start, $finish);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.dateso >= ? AND tb_salesorder.dateso <= ? AND tb_salesorder.statusorder = 'Finish' AND tb_salesorder.idcust = common_detail.idcomm  ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["nopesanan"] = $key->nopesanan;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateso"] = $key->dateso;
				$f["delivdate"] = $key->delivdate;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["typepayment"] = $key->typepayment;
				$f["subtotal"] = $key->subtotal;
				$f["disc"] = $key->disc;
				$f["VAT"] = $key->VAT;
				$f["totalprice"] = $key->totalprice;
				$f["typeso"] = $key->typeso;
				$f["totalso"] = $key->totalso;
				$f["statusorder"] = $key->statusorder;
				$f["namecust"] = $key->namecomm;
				$f["outtype"] = "OUT - Sales";

				$datax = array($key->typeso);
				$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["typeorder"] = $keyx->namecomm;
					}
				}

				$datax = array($key->statusorder);
				$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["orderstatus"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idso);
				$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					$f["data"] = array();
					foreach ($eksekusixx as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["sku"] = $keyx->sku;
						$g["nameitem"] = $keyx->nameitem;
						$g["qtyorder"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->totalprice;

						$dataxxx = array($keyx->iditem);
						$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
						$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
						if (count($eksekusixxx) > 0) {
							foreach ($eksekusixxx as $keyxx) {
								$g["qtyready"] = $keyxx->endqty;
							}
						}

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

	function getdatacounterorderoutgoing()
	{
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm  ORDER BY tb_salesorder.codeso ASC";

		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {

				if ($key->statusorder == 'Finish' || $key->statusorder == 'Process') {

					$f["idso"] = $key->idso;
					$f["codeso"] = $key->codeso;
					$f["nopesanan"] = $key->nopesanan;
					$f["idcust"] = $key->idcust;
					$f["idcurrency"] = $key->idcurrency;
					$f["dateso"] = $key->dateso;
					$f["delivdate"] = $key->delivdate;
					$f["delivaddr"] = $key->delivaddr;
					$f["delivfee"] = $key->delivfee;
					$f["typepayment"] = $key->typepayment;
					$f["subtotal"] = $key->subtotal;
					$f["disc"] = $key->disc;
					$f["VAT"] = $key->VAT;
					$f["totalprice"] = $key->totalprice;
					$f["typeso"] = $key->typeso;
					$f["totalso"] = $key->totalso;
					$f["statusorder"] = $key->statusorder;
					$f["namecust"] = $key->namecomm;
					$f["outtype"] = "OUT - Sales";

					$datax = array($key->typeso);
					$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $keyx) {
							$f["typeorder"] = $keyx->namecomm;
						}
					}

					$datax = array($key->statusorder);
					$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $keyx) {
							$f["orderstatus"] = $keyx->namecomm;
						}
					}

					$dataxx = array($key->idso);
					$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
					$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
					if (count($eksekusixx) > 0) {
						$f["data"] = array();
						foreach ($eksekusixx as $keyx) {
							$g["idsodet"] = $keyx->idsodet;
							$g["iditem"] = $keyx->iditem;
							$g["sku"] = $keyx->sku;
							$g["nameitem"] = $keyx->nameitem;
							$g["qtyorder"] = $keyx->qty;
							$g["price"] = $keyx->price;
							$g["disc"] = $keyx->disc;
							$g["totalprice"] = $keyx->totalprice;


							$dataxxx = array($keyx->iditem);
							$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
							$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
							if (count($eksekusixxx) > 0) {
								foreach ($eksekusixxx as $keyxx) {
									$g["qtyready"] = $keyxx->endqty;
								}
							}

							array_push($f["data"], $g);
						}
					}

					array_push($respon, $f);
				}
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getdataoutgoingreportpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		$data  = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idso,a.codeso,a.nopesanan,a.idcust,a.idcurrency, a.dateso,a.delivdate,a.delivaddr,a.delivfee,
			a.typepayment,a.subtotal,a.disc,a.VAT,a.totalprice,a.typeso,a.totalso,a.statusorder,b.namecomm,
			ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM tb_salesorder as a 
			left join common_detail as b on a.idcust = b.idcomm WHERE " . $filter . " LIKE ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idso,a.codeso,a.nopesanan,a.idcust,a.idcurrency, a.dateso,a.delivdate,a.delivaddr,a.delivfee,
			a.typepayment,a.subtotal,a.disc,a.VAT,a.totalprice,a.typeso,a.totalso,a.statusorder,b.namecomm,
			ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM tb_salesorder as a 
			left join common_detail as b on a.idcust = b.idcomm WHERE  REPLACE(dateso, ' ', '') >= ? AND REPLACE(dateso, ' ', '') <= ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($status, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idso,a.codeso,a.nopesanan,a.idcust,a.idcurrency, a.dateso,a.delivdate,a.delivaddr,a.delivfee,
			a.typepayment,a.subtotal,a.disc,a.VAT,a.totalprice,a.typeso,a.totalso,a.statusorder,b.namecomm,
			ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM tb_salesorder as a 
			left join common_detail as b on a.idcust = b.idcomm WHERE statusorder = ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idso,a.codeso,a.nopesanan,a.idcust,a.idcurrency, a.dateso,a.delivdate,a.delivaddr,a.delivfee,
			a.typepayment,a.subtotal,a.disc,a.VAT,a.totalprice,a.typeso,a.totalso,a.statusorder,b.namecomm,
			ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM tb_salesorder as a 
			left join common_detail as b on a.idcust = b.idcomm WHERE " . $filter . " LIKE ? AND REPLACE(dateso, ' ', '') >= ? AND REPLACE(dateso, ' ', '') <= ? )
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $status, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idso,a.codeso,a.nopesanan,a.idcust,a.idcurrency, a.dateso,a.delivdate,a.delivaddr,a.delivfee,
			a.typepayment,a.subtotal,a.disc,a.VAT,a.totalprice,a.typeso,a.totalso,a.statusorder,b.namecomm,
			ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM tb_salesorder as a 
			left join common_detail as b on a.idcust = b.idcomm WHERE " . $filter . " LIKE ? AND REPLACE(dateso, ' ', '') >= ? AND REPLACE(dateso, ' ', '') <= ? AND statusorder = ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idso,a.codeso,a.nopesanan,a.idcust,a.idcurrency, a.dateso,a.delivdate,a.delivaddr,a.delivfee,
			a.typepayment,a.subtotal,a.disc,a.VAT,a.totalprice,a.typeso,a.totalso,a.statusorder,b.namecomm,
			ROW_NUMBER() OVER (Order by a.codeso) AS RowNumber FROM tb_salesorder as a 
			left join common_detail as b on a.idcust = b.idcomm)
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {

				if ($key->statusorder == 'Finish' || $key->statusorder == 'Process') {

					$f["idso"] = $key->idso;
					$f["codeso"] = $key->codeso;
					$f["nopesanan"] = $key->nopesanan;
					$f["idcust"] = $key->idcust;
					$f["idcurrency"] = $key->idcurrency;
					$f["dateso"] = $key->dateso;
					$f["delivdate"] = $key->delivdate;
					$f["delivaddr"] = $key->delivaddr;
					$f["delivfee"] = $key->delivfee;
					$f["typepayment"] = $key->typepayment;
					$f["subtotal"] = $key->subtotal;
					$f["disc"] = $key->disc;
					$f["VAT"] = $key->VAT;
					$f["totalprice"] = $key->totalprice;
					$f["typeso"] = $key->typeso;
					$f["totalso"] = $key->totalso;
					$f["statusorder"] = $key->statusorder;
					$f["namecust"] = $key->namecomm;
					$f["outtype"] = "OUT - Sales";

					$datax = array($key->typeso);
					$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $keyx) {
							$f["typeorder"] = $keyx->namecomm;
						}
					}

					$datax = array($key->statusorder);
					$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $keyx) {
							$f["orderstatus"] = $keyx->namecomm;
						}
					}

					$dataxx = array($key->idso);
					$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
					$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
					if (count($eksekusixx) > 0) {
						$f["data"] = array();
						foreach ($eksekusixx as $keyx) {
							$g["idsodet"] = $keyx->idsodet;
							$g["iditem"] = $keyx->iditem;
							$g["sku"] = $keyx->sku;
							$g["nameitem"] = $keyx->nameitem;
							$g["qtyorder"] = $keyx->qty;
							$g["price"] = $keyx->price;
							$g["disc"] = $keyx->disc;
							$g["totalprice"] = $keyx->totalprice;


							$dataxxx = array($keyx->iditem);
							$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
							$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
							if (count($eksekusixxx) > 0) {
								foreach ($eksekusixxx as $keyxx) {
									$g["qtyready"] = $keyxx->endqty;
								}
							}

							array_push($f["data"], $g);
						}
					}

					array_push($respon, $f);
				}
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function countoutgoingreport($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust=common_detail.idcomm', 'left');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where($filter, $search, $date1, $date2);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $search, $date1, $date2, $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}



	function getdatacounterorderoutgoingpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{

		$data  = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.jasapengirim,tb_salesorder.dateso,tb_salesorder.idcust,tb_salesorder.typeso,
			tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice,tb_salesorder.idcurrency
		    ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.delivfee, common_detail.namecomm
			,tb_salesorder.typepayment , tb_salesorder.subtotal , tb_salesorder.disc, tb_salesorder.VAT,ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber 
			FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder in('Finish','Process') and " . $filter . " LIKE ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.jasapengirim,tb_salesorder.dateso,tb_salesorder.idcust,tb_salesorder.typeso,
			tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice,tb_salesorder.idcurrency
		    ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.delivfee, common_detail.namecomm
			,tb_salesorder.typepayment , tb_salesorder.subtotal , tb_salesorder.disc, tb_salesorder.VAT,ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber 
			FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder in('Finish','Process') AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.jasapengirim,tb_salesorder.dateso,tb_salesorder.idcust,tb_salesorder.typeso,
			tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice,tb_salesorder.idcurrency
		    ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.delivfee, common_detail.namecomm
			,tb_salesorder.typepayment , tb_salesorder.subtotal , tb_salesorder.disc, tb_salesorder.VAT,ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber 
			FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder in('Finish','Process') AND statusorder = '$status')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.jasapengirim,tb_salesorder.dateso,tb_salesorder.idcust,tb_salesorder.typeso,
			tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice,tb_salesorder.idcurrency
		    ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.delivfee, common_detail.namecomm
			,tb_salesorder.typepayment , tb_salesorder.subtotal , tb_salesorder.disc, tb_salesorder.VAT,ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber 
			FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder in('Finish','Process') AND " . $filter . " LIKE ?  AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.idcust,tb_salesorder.typeso,
			tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice,tb_salesorder.idcurrency
		    ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.delivfee, common_detail.namecomm
			,tb_salesorder.typepayment , tb_salesorder.subtotal , tb_salesorder.disc,tb_salesorder.jasapengirim, tb_salesorder.VAT,ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber 
			FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder in('Finish','Process') AND " . $filter . " LIKE ? AND statusorder ='$status'  AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.idcust,tb_salesorder.typeso,
			tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice,tb_salesorder.idcurrency
		    ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.delivfee, common_detail.namecomm
			,tb_salesorder.typepayment , tb_salesorder.subtotal , tb_salesorder.disc,tb_salesorder.jasapengirim, tb_salesorder.VAT,ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber 
			FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder in('Finish','Process') AND " . $filter . " LIKE ? AND statusorder ='$status'  )  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.jasapengirim,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.idcust,tb_salesorder.typeso,
			tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice,tb_salesorder.idcurrency
		    ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder, tb_salesorder.delivfee, common_detail.namecomm
			,tb_salesorder.typepayment , tb_salesorder.subtotal , tb_salesorder.disc, tb_salesorder.VAT,ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber 
			FROM tb_salesorder left join common_detail on tb_salesorder.idcust = common_detail.idcomm WHERE statusorder in('Finish','Process'))  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {

				if ($key->statusorder == 'Finish' || $key->statusorder == 'Process') {

					$f["idso"] = $key->idso;
					$f["codeso"] = $key->codeso;
					$f["nopesanan"] = $key->nopesanan;
					$f["idcust"] = $key->idcust;
					$f["idcurrency"] = $key->idcurrency;
					$f["dateso"] = $key->dateso;
					$f["delivdate"] = $key->delivdate;
					$f["jasapengirim"] = $key->jasapengirim;
					$f["delivaddr"] = $key->delivaddr;
					$f["delivfee"] = $key->delivfee;
					$f["typepayment"] = $key->typepayment;
					$f["subtotal"] = $key->subtotal;
					$f["disc"] = $key->disc;
					$f["VAT"] = $key->VAT;
					$f["totalprice"] = $key->totalprice;
					$f["typeso"] = $key->typeso;
					$f["totalso"] = $key->totalso;
					$f["statusorder"] = $key->statusorder;
					$f["namecust"] = $key->namecomm;
					$f["outtype"] = "OUT - Sales";

					$datax = array($key->typeso);
					$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $keyx) {
							$f["typeorder"] = $keyx->namecomm;
						}
					}

					$datax = array($key->statusorder);
					$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $keyx) {
							$f["orderstatus"] = $keyx->namecomm;
						}
					}

					$dataxx = array($key->idso);
					$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
					$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
					if (count($eksekusixx) > 0) {
						$f["data"] = array();
						foreach ($eksekusixx as $keyx) {
							$g["idsodet"] = $keyx->idsodet;
							$g["iditem"] = $keyx->iditem;
							$g["sku"] = $keyx->sku;
							$g["nameitem"] = $keyx->nameitem;
							$g["qtyorder"] = $keyx->qty;
							$g["price"] = $keyx->price;
							$g["disc"] = $keyx->disc;
							$g["totalprice"] = $keyx->totalprice;


							$dataxxx = array($keyx->iditem);
							$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
							$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
							if (count($eksekusixxx) > 0) {
								foreach ($eksekusixxx as $keyxx) {
									$g["qtyready"] = $keyxx->endqty;
								}
							}

							array_push($f["data"], $g);
						}
					}

					array_push($respon, $f);
				}
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function countoutgoing($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust = common_detail.idcomm', 'left');
		$this->db->where('statusorder', 'Process');
		$this->db->where('statusorder', 'Finish');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		} else if ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('tb_salesorder.statusorder =', ".$status.");
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where($search, 'tb_salesorder.dateso', $date1, $date2);
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($search, $date1, $date2, 'tb_salesorder.statusorder =', ".$status.");
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}




	function konfirmso($idso, $iduser)
	{
		$data1 = array($idso);
		$query1 = "SELECT * FROM tb_salesorder WHERE idso = ? AND statusorder = 'Process' AND notif = 1";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		if (count($eksekusi1) > 0) {
			$respon = "Sales Order Telah Diconfirm sebelumnya";
		} else {

			$data = array(date('Y-m-d H:i:s'), $iduser, $idso);
			$query = "UPDATE tb_salesorder SET statusorder = 'Process', notif = 1,  updlog = ? , upduser = ? WHERE idso = ?";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$respon = "Success";
			} else {
				$respon = "Failed";
			}
		}

		return $respon;
	}

	function konfirmsoall($idso, $iduser)
	{
		$fail = 0;
		$success = 0;
		$this->db->trans_begin();
		for ($i = 0; $i < count($idso); $i++) {

			$data = array(date('Y-m-d H:i:s'), $iduser, $idso[$i]);
			$query = "UPDATE tb_salesorder SET statusorder = 'Process',  updlog = ? , upduser = ? WHERE idso = ?";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$success++;
			} else {
				$fail++;
			}
		}

		if ($fail > 0) {
			$this->db->trans_rollback();
			$respon = "Failed, Try Again";
		} else {
			$this->db->trans_commit();
			$respon = "Success";
		}
		return $respon;
	}




	function getdatasalesorderbyid($idso)
	{
		$data = array($idso);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idso = ? AND tb_salesorder.idcust = common_detail.idcomm";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["nopesanan"] = $key->nopesanan;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["dateso"] = $key->dateso;
				$f["delivdate"] = $key->delivdate;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["typepayment"] = $key->typepayment;
				$f["subtotal"] = $key->subtotal;
				$f["noresi"] = $key->noresi;
				$f["disc"] = $key->disc;
				$f["VAT"] = $key->VAT;
				$f["totalprice"] = $key->totalprice;
				$f["typeso"] = $key->typeso;
				$f["totalso"] = $key->totalso;
				$f["nohp"] = $key->attrib2;
				$f["statusorder"] = $key->statusorder;
				$f["jasapengirim"] = $key->jasapengirim;
				$f["namecust"] = $key->namecomm;
				$f["outtype"] = "OUT - Sales";

				$datax = array($key->typeso);
				$queryx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["typeorder"] = $keyx->namecomm;
					}
				}

				$datax = array($key->statusorder);
				$queryx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["orderstatus"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idso);
				$queryxx = "SELECT * FROM tb_salesorderdetail,tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				$f["data"] = array();
				if (count($eksekusixx) > 0) {

					foreach ($eksekusixx as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["sku"] = $keyx->sku;
						$g["nameitem"] = $keyx->nameitem;
						$g["qtyorder"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["totalprice"] = $keyx->totalprice;
						$g["usesn"] = $keyx->usesn;


						$dataxxx = array($keyx->iditem);
						$queryxxx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
						$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
						if (count($eksekusixxx) > 0) {
							foreach ($eksekusixxx as $keyxx) {
								$g["qtyready"] = $keyxx->endqty;
								$g["idwh"] = $keyxx->idwh;
							}
						}

						if ($g["usesn"] == "N") {
							$data1 = array($g["iditem"], $g["idwh"]);
							$query1 = "SELECT * FROM tb_itemsn WHERE iditem = ? AND idwh = ?";
							$eksekusi1 = $this->db->query($query1, $data1)->result_object();
							if (count($eksekusi1) > 0) {
								foreach ($eksekusi1 as $key1) {
									$g["hargabeli"] = $key1->hargabeli;
									$g["idpo"] = $key1->idpo;
									$g["snid"] = $key1->snid;
								}
							}
						} else {
							$g["hargabeli"] = 0;
							$g["idpo"] = 0;
							$g["snid"] = 0;
						}

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


	function ceksnreturn($snno1, $snno2, $idso)
	{
		$respon;
		if ($snno1 == $snno2) {
			$data = array($snno1);
			$query = "SELECT *,tb_do.idso AS idsos FROM tb_dodetailsn,tb_do,tb_salesorder,tb_salesorderdetail WHERE convert(decimal(25,0),?) BETWEEN convert(decimal(25,0),tb_dodetailsn.idsn) AND convert(decimal(25,0),tb_dodetailsn.idsn2) AND tb_dodetailsn.status = 'Sales'AND tb_dodetailsn.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso ";
			$eksekusi  = $this->db->query($query, $data)->result_object();
			if (count($eksekusi) > 0) {
				$respon["data"] = array();
				foreach ($eksekusi as $key) {
					$f["idso"] = $key->idsos;
					$f["codeso"] = $key->codeso;
					$f["idsodet"] = $key->idsodet;

					$datax = array($snno1);
					$queryx = "SELECT * FROM tb_itemsn, tb_item WHERE convert(decimal(25,0),?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND tb_itemsn.iditem = tb_item.iditem";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {


						foreach ($eksekusix as $keyx) {
							$f["iditem"] = $keyx->iditem;
							$f["nameitem"] = $keyx->nameitem;
							$f["sku"] = $keyx->sku;
							$f["idsn"] = $key->idsn;
							$f["idsn2"] = $key->idsn2;
							$f["expdate"] = $keyx->expdate;

							$respon["data"] = $f;
							$respon["pesan"] = "Success";
						}
					} else {
						$respon["pesan"] = "Not Found1";
					}
				}
			} else {
				$data = array($snno1);
				$query = "SELECT *,tb_do.idso AS idsos FROM tb_dodetailsn,tb_do,tb_salesorder,tb_salesorderdetail WHERE convert(decimal(25,0),?) = convert(decimal(25,0),tb_dodetailsn.idsn)  AND tb_dodetailsn.status = 'Sales'AND tb_dodetailsn.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso ";
				$eksekusi  = $this->db->query($query, $data)->result_object();
				if (count($eksekusi) > 0) {
					$respon["data"] = array();
					foreach ($eksekusi as $key) {
						$f["idso"] = $key->idsos;
						$f["codeso"] = $key->codeso;
						$f["idsodet"] = $key->idsodet;

						$datax = array($snno1);
						$queryx = "SELECT * FROM tb_itemsn, tb_item WHERE convert(decimal(25,0),?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND tb_itemsn.iditem = tb_item.iditem";
						$eksekusix = $this->db->query($queryx, $datax)->result_object();
						if (count($eksekusix) > 0) {


							foreach ($eksekusix as $keyx) {
								$f["iditem"] = $keyx->iditem;
								$f["nameitem"] = $keyx->nameitem;
								$f["sku"] = $keyx->sku;
								$f["idsn"] = $key->idsn;
								$f["idsn2"] = $key->idsn2;
								$f["expdate"] = $keyx->expdate;

								$respon["data"] = $f;
								$respon["pesan"] = "Success";
							}
						} else {
							$respon["pesan"] = "Not Found1";
						}
					}
				} else {
					$respon["pesan"] = "Not Found";
				}
			}
		} else {
			$idso = "";
			$datax = array($snno1, $snno2);
			$queryx = "SELECT *,tb_do.idso AS idsos FROM tb_dodetailsn,tb_do,tb_salesorder,tb_salesorderdetail WHERE convert(decimal(25,0),?) BETWEEN convert(decimal(25,0),idsn)  AND convert(decimal(25,0),idsn2) AND  convert(decimal(25,0),?) BETWEEN convert(decimal(25,0),idsn)  AND convert(decimal(25,0),idsn2)  AND tb_dodetailsn.status = 'Sales'AND tb_dodetailsn.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso ";
			$eksekusix = $this->db->query($queryx, $datax)->result_object();
			if (count($eksekusix) > 0) {
				foreach ($eksekusix as $keyx) {
					$f["idso"] = $keyx->idsos;
					$f["codeso"] = $keyx->codeso;
					$f["idsodet"] = $keyx->idsodet;

					if ($idso == "") {
						$idso = $keyx->idsos;;
					}

					if ($idso == $keyx->idsos) {

						$data = array($snno1, $snno2);
						// $query = "SELECT * FROM tb_itemsn, tb_item WHERE convert(decimal(25,0), ?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND  convert(decimal(25,0), ?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND tb_itemsn.iditem = tb_item.iditem";
						$query = "SELECT * FROM tb_itemsn, tb_item WHERE ? BETWEEN idsn AND idsn2 AND tb_itemsn.iditem = tb_item.iditem";
						$eksekusi = $this->db->query($query, $data)->result_object();
						if (count($eksekusi) > 0) {


							foreach ($eksekusi as $key) {
								$f["iditem"] = $key->iditem;
								$f["nameitem"] = $key->nameitem;
								$f["sku"] = $key->sku;
								$f["idsn"] = $keyx->idsn;
								$f["idsn2"] = $keyx->idsn2;
								$f["expdate"] = $key->expdate;

								$respon["data"] = $f;
								$respon["pesan"] = "Success";
							}
						} else {
							$respon["pesan"] = "Not Found";
						}
					} else {
						$respon["pesan"] = "Code Sales Series Item Ini Tidak Sama";
					}
				}
			} else {
				$idso = "";
				$dataxx = array($snno1, $snno2);
				$queryxx = "SELECT *, tb_do.idso AS idsos FROM tb_dodetailsn,tb_do,tb_salesorder,tb_salesorderdetail WHERE convert(decimal(25,0),tb_dodetailsn.idsn2) BETWEEN convert(decimal(25,0),?) AND convert(decimal(25,0),?) AND tb_dodetailsn.status = 'Sales'AND tb_dodetailsn.iddo = tb_do.iddo AND tb_do.idso = tb_salesorder.idso ";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {

					foreach ($eksekusixx as $keyy) {
						$f["idso"] = $keyy->idso;
						$f["codeso"] = $keyy->codeso;
						$f["idsodet"] = $keyy->idsodet;

						if ($idso == "") {
							$idso = $keyy->idsos;
						}

						if ($idso == $keyy->idsos) {

							$data = array($snno1, $snno2);
							// $query = "SELECT * FROM tb_itemsn, tb_item WHERE convert(decimal(25,0), ?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND  convert(decimal(25,0), ?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND tb_itemsn.iditem = tb_item.iditem";
							$query = "SELECT * FROM tb_itemsn, tb_item WHERE ? BETWEEN idsn AND idsn2 AND  ? BETWEEN idsn AND idsn2 AND tb_itemsn.iditem = tb_item.iditem";
							$eksekusi = $this->db->query($query, $data)->result_object();
							if (count($eksekusi) > 0) {


								foreach ($eksekusi as $key) {
									$f["iditem"] = $key->iditem;
									$f["nameitem"] = $key->nameitem;
									$f["sku"] = $key->sku;
									$f["idsn"] = $keyy->idsn;
									$f["idsn2"] = $keyy->idsn2;
									$f["expdate"] = $key->expdate;

									$respon["data"] = $f;
									$respon["pesan"] = "Success";
								}
							} else {
								$respon["pesan"] = "Not Found";
							}
						} else {
							$respon["pesan"] = "Code Sales Series Item Ini Tidak Sama";
						}
					}
				} else {
					$respon["pesan"] = "Not Found";
				}
			}
		}
		return $respon;
	}


	function ceksn($snno1, $snno2, $idso)
	{
		$respon["data"] = array();
		if ($snno2 == "") {
			$datax = array($snno1);
			$queryx = "SELECT * FROM tb_dodetailsn WHERE convert(decimal(25,0),?) = convert(decimal(25,0),idsn) AND status = 'Sales'";
			$eksekusix = $this->db->query($queryx, $datax)->result_object();
			if (count($eksekusix) > 0) {
				$respon["pesan"] = "SN Pernah Keluar Sebelumnya";
			} else {

				$dataxxx = array($snno1);
				$queryxxx = "SELECT * FROM tb_dodetailsn WHERE convert(decimal(25,0),?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND status = 'Sales'";
				$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
				if (count($eksekusixxx) > 0) {
					$respon["pesan"] = "SN Pernah Keluar Sebelumnya";
				} else {

					$data = array($snno1);
					// $query = "SELECT * FROM tb_itemsn, tb_item WHERE convert(decimal(25,0),?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND tb_itemsn.iditem = tb_item.iditem";
					$query = "SELECT * FROM tb_itemsn, tb_item WHERE ? BETWEEN idsn AND idsn2 AND tb_itemsn.iditem = tb_item.iditem";

					$eksekusi = $this->db->query($query, $data)->result_object();
					if (count($eksekusi) > 0) {


						foreach ($eksekusi as $key) {
							$f["snid"] = $key->snid;
							$f["iditem"] = $key->iditem;
							$f["nameitem"] = $key->nameitem;
							$f["idsn"] = $key->idsn;
							$f["idsn2"] = $key->idsn2;
							$f["expdate"] = $key->expdate;
							$f["idwh"] = $key->idwh;
							$f["hargabeli"] = $key->hargabeli;
							$f["idpo"] = $key->idpo;
							$f["idsupp"] = $key->idsupp;

							if ($key->expdate < date('Y-m-d')) {
								$respon["pesan"] = "Item Sudah Expired";
							} else {

								$this->db->trans_begin();

								$datay = array($key->iditem, $idso, $snno1, $snno2, $key->idwh);
								$queryy = "INSERT INTO tb_itemsntemp(iditem,idso,idsn,idsn2,idwh)VALUES(?,?,?,?,?)";
								$eksekusiy = $this->db->query($queryy, $datay);
								if ($eksekusiy == true) {
									$respon["pesan"] = "Success";
								} else {
									$respon["pesan"] = "Gagal Saat Meletakan Temporari Scan, Silakan Coba Lagi";
								}
							}
							$datapo = array($f["idpo"]);
							$querypo = "SELECT * FROM po WHERE idpo = ?";
							$eksekusipo = $this->db->query($querypo, $datapo)->result_object();
							if (count($eksekusipo) > 0) {
								foreach ($eksekusipo as $keypo) {
									$f["codepo"] = $keypo->codepo;
								}
							}

							$datasupp = array($f["idsupp"]);
							$querysupp = "SELECT * FROM common_detail WHERE idcomm = ?";
							$eksekusisupp = $this->db->query($querysupp, $datasupp)->result_object();
							if (count($eksekusisupp) > 0) {
								foreach ($eksekusisupp as $keypo) {
									$f["namesupp"] = $keypo->namecomm;
								}
							}



							array_push($respon["data"], $f);
						}
					} else {
						$respon["pesan"] = "Not Found";
					}
				}
			}
		} else {
			$datax = array($snno1, $snno2);
			$queryx = "SELECT * FROM tb_dodetailsn WHERE convert(decimal(25,0),idsn) BETWEEN convert(decimal(25,0),?) AND convert(decimal(25,0),?) AND status = 'Sales'";
			$eksekusix = $this->db->query($queryx, $datax)->result_object();
			if (count($eksekusix) > 0) {
				$respon["pesan"] = "SN dengan Range ini pernah keluar sebelumnya";
			} else {
				$dataxx = array($snno1, $snno2);
				$queryxx = "SELECT * FROM tb_dodetailsn WHERE convert(decimal(25,0),idsn2) BETWEEN convert(decimal(25,0), ?) AND convert(decimal(25,0), ?) AND status = 'Sales'";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					$respon["pesan"] = "Range SN ini sudah ada yang keluar sebelumnya";
				} else {
					$dataxxx = array($snno1);
					$queryxxx = "SELECT * FROM tb_itemsntemp WHERE convert(decimal(25,0), ?) BETWEEN convert(decimal(25,0),idsn ) AND convert(decimal(25,0),idsn2) ";
					$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
					if (count($eksekusixxx) > 0) {
						$respon["pesan"] = "SN ini telah diinput";
					} else {

						$data = array($snno1, $snno2);
						// $query = "SELECT * FROM tb_itemsn, tb_item WHERE convert(decimal(25,0), ?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND  convert(decimal(25,0), ?) BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND tb_itemsn.iditem = tb_item.iditem";
						$query = "SELECT * FROM tb_itemsn, tb_item WHERE ? BETWEEN idsn AND idsn2 AND  ? BETWEEN idsn AND idsn2 AND tb_itemsn.iditem = tb_item.iditem";
						$eksekusi = $this->db->query($query, $data)->result_object();

						if (count($eksekusi) > 0) {


							foreach ($eksekusi as $key) {
								$f["iditem"] = $key->iditem;
								$f["nameitem"] = $key->nameitem;
								$f["idsn"] = $key->idsn;
								$f["idsn2"] = $key->idsn2;
								$f["expdate"] = $key->expdate;
								$f["hargabeli"] = $key->hargabeli;
								$f["idwh"] = $key->idwh;
								$f["idpo"] = $key->idpo;
								$f["idsupp"] = $key->idsupp;
								$f["snid"] = $key->snid;

								if ($key->expdate < date('Y-m-d')) {
									$respon["pesan"] = "Item Sudah Expired";
								} else {

									$this->db->trans_begin();

									$datay = array($key->iditem, $idso, $snno1, $snno2, $key->idwh);
									$queryy = "INSERT INTO tb_itemsntemp(iditem,idso,idsn,idsn2,idwh)VALUES(?,?,?,?,?)";
									$eksekusiy = $this->db->query($queryy, $datay);
									if ($eksekusiy == true) {
										$respon["pesan"] = "Success";
									} else {
										$respon["pesan"] = "Gagal Saat Meletakan Temporari Scan, Silakan Coba Lagi";
									}
								}

								$datapo = array($f["idpo"]);
								$querypo = "SELECT * FROM po WHERE idpo = ?";
								$eksekusipo = $this->db->query($querypo, $datapo)->result_object();
								if (count($eksekusipo) > 0) {
									foreach ($eksekusipo as $keypo) {
										$f["codepo"] = $keypo->codepo;
									}
								}

								$datasupp = array($f["idsupp"]);
								$querysupp = "SELECT * FROM common_detail WHERE idcomm = ?";
								$eksekusisupp = $this->db->query($querysupp, $datasupp)->result_object();
								if (count($eksekusisupp) > 0) {
									foreach ($eksekusisupp as $keypo) {
										$f["namesupp"] = $keypo->namecomm;
									}
								}



								array_push($respon["data"], $f);
							}
						} else {
							$respon["pesan"] = "Not Found";
						}
					}
				}
			}
		}



		return $respon;
	}


	function updatesalesorder($idso, $iduser, $idcust, $idwh, $delivaddr, $jasapengirim, $iditem, $nameitem, $snawal, $snakhir, $idsn2, $expdate, $qty, $noresi, $iditemx, $pricebuyitem, $snid)
	{

		$dataa = array($idso);
		$querya = "SELECT * FROM tb_salesorder WHERE idso = ? AND statusorder = 'Finish'";
		$eksekusia = $this->db->query($querya, $dataa)->result_object();
		if (count($eksekusia) > 0) {
			$respon = "Sales Order Ini Telah Diproses sebelunya";
		} else {

			$this->db->trans_begin();
			$codedo;
			$iddo;
			$iddodet;
			$query = "SELECT * FROM tb_do";
			$eksekusi = $this->db->query($query)->result_object();
			if (count($eksekusi) > 0) {

				foreach ($eksekusi as $key) {
					$codedo = $key->codedo;
					$codedo++;
				}
			} else {
				$codedo = "DO00001";
			}

			$datax = array($codedo, $idso, $idcust, $idwh, $delivaddr, date('Y-m-d'), date('Y-m-d H:i:s'), $iduser);
			$queryx = "INSERT INTO tb_do (codedo,idso,idcust,idwh,delivaddr,datedo,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?)";
			$eksekusix = $this->db->query($queryx, $datax);
			if ($eksekusix == true) {

				$dataxx = array($codedo);
				$queryxx = "SELECT * FROM tb_do WHERE codedo = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {

					foreach ($eksekusixx as $key) {
						$iddo = $key->iddo;
					}

					$dataxxx = array($idso);
					$queryxxx = "SELECT * FROM tb_salesorderdetail WHERE idso = ?";
					$eksekusixxx = $this->db->query($queryxxx, $dataxxx)->result_object();
					if (count($eksekusixxx) > 0) {
						$i = 0;
						foreach ($eksekusixxx as $keyx) {
							$dataxxxx = array($iddo, $idso, $keyx->idsodet, $keyx->iditem, $keyx->qty);
							$queryxxxx = "INSERT INTO tb_dodetail (iddo,idso,idsodet,iditem,qty)VALUES(?,?,?,?,?)";
							$eksekusixxxx = $this->db->query($queryxxxx, $dataxxxx);
						}
					} else {
						$respon = "Not Found2" . $idso;
					}
				} else {
					$respon = "Not Found1";
				}
			} else {
				$respon = "Failed";
			}




			$data5 = array($iddo);
			$query5 = "SELECT * FROM tb_dodetail WHERE iddo = ?";
			$eksekusi5 = $this->db->query($query5, $data5)->result_object();
			if (count($eksekusi5) > 0) {

				foreach ($eksekusi5 as $keyxx) {
					$iddodet;

					for ($i = 0; $i < count($iditem); $i++) {
						if ($keyxx->iditem == $iditem[$i]) {
							$data6 = array($iddo, $keyxx->iddodet, $iditem[$i], $snawal[$i], $snakhir[$i], $snid[$i]);
							$query6 = "INSERT INTO tb_dodetailsn (iddo,iddodet,iditem,idsn,idsn2,status,snid)VALUES(?,?,?,?,?,'Sales',?)";
							$eksekusi6 = $this->db->query($query6, $data6);
						}
					}
				}
			} else {
				$respon = "Not Found3" . $iddo;
			}


			for ($i = 0; $i < count($iditem); $i++) {

				$data7 = array($qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i]);
				$query7 = "UPDATE tb_itemqtyexp SET outqty = outqty + ? , endqty = endqty - ? WHERE iditem = ? AND idwh = ? AND expdate = ?";
				$eksekusi7 = $this->db->query($query7, $data7);

				if ($eksekusi7 == true) {

					$data8 = array($qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh);
					$query8 = "UPDATE tb_itemqty SET outqty = outqty + ? , endqty = endqty - ?, qtyso = qtyso - ? WHERE iditem = ? AND idwh = ? ";
					$eksekusi8 = $this->db->query($query8, $data8);

					if ($eksekusi8 == true) {

						$data9 = array(date('Y-m-d H:i:s'), $iduser, $idso);
						$query9 = "UPDATE tb_salesorder SET statusorder = 'Finish', notif = 2,  updlog = ? , upduser = ? WHERE idso = ?";
						$eksekusi9 = $this->db->query($query9, $data9);
						if ($eksekusi9 == true) {

							$respon = "Success";
						} else {
							$respon = "Failed";
						}
					} else {
						$respon = "Failed";
					}
				} else {
					$respon = "Failed";
				}
			}


			$idcurrency;
			$codeinv;
			$totalinv;
			$data10 = array($idso);
			$query10 = "SELECT * FROM tb_salesorder WHERE idso = ?";
			$eksekusi10 = $this->db->query($query10, $data10)->result_object();
			if (count($eksekusi10) > 0) {
				foreach ($eksekusi10 as $key) {
					$idcurrency = $key->idcurrency;
					$totalinv = $key->delivfee + $key->totalprice;
				}
			}


			$query11 = "SELECT * FROM tb_salesinvoice ORDER BY codeinv ASC";
			$eksekusi11 = $this->db->query($query11)->result_object();
			if (count($eksekusi11) > 0) {
				foreach ($eksekusi11 as $key) {
					$codeinv = $key->codeinv;
					$codeinv++;
				}
			} else {
				$codeinv = "SINV0001";
			}


			for ($i = 0; $i < count($iditemx); $i++) {
				$dataa = array($pricebuyitem[$i], $iditemx[$i], $idso);
				$queryi = "UPDATE tb_salesorderdetail SET pricebuyitem = ? WHERE iditem = ? AND idso = ?";
				$eksekusii = $this->db->query($queryi, $dataa);
				if ($eksekusii == true) {
					$respon = "Success";
				} else {
					$respon = "Fail on update price buy item";
				}
			}

			$data12 = array($codeinv, $idcust, $idcurrency, date('Y-m-d'), '03', '', $totalinv, $totalinv, date('Y-m-d H:i:s'), $iduser);
			$query12 = "INSERT INTO tb_salesinvoice (codeinv,idcust,idcurrency,dateinv,typeinv,period,totalinv,balance,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,?,?)";
			$eksekusi12 = $this->db->query($query12, $data12);
			if ($eksekusi12 == true) {
				$respon = "Success";
			} else {
				$respon = "Failed sales invoice header";
			}

			$idinv;

			$data13 = array($codeinv);
			$query13 = "SELECT * FROM tb_salesinvoice WHERE codeinv = ?";
			$eksekusi13 = $this->db->query($query13, $data13)->result_object();
			if (count($eksekusi13) > 0) {
				foreach ($eksekusi13 as $key) {
					$idinv = $key->idinv;
				}
			}

			$data14 = array($idso);
			$query14 = "SELECT *, tb_dodetail.qty AS qtydo FROM tb_salesorderdetail,tb_dodetail WHERE tb_dodetail.idsodet = tb_salesorderdetail.idsodet AND tb_dodetail.idso = ?";
			$eksekusi14 = $this->db->query($query14, $data14)->result_object();
			if (count($eksekusi14) > 0) {

				foreach ($eksekusi14 as $keyx) {
					$iddodet = $keyx->iddodet;
					$data15 = array($idinv, $keyx->iditem, $keyx->qtydo, ($keyx->price + $keyx->vat) * $keyx->qtydo,  $keyx->disc,  $keyx->totalprice, $iddo, $iddodet);
					$query15 = "INSERT INTO tb_salesinvoicedetail (idinv,iditem,qty,price,disc,subinv,iddo,iddodet) VALUES(?,?,?,?,?,?,?,?)";
					$eksekusi15 = $this->db->query($query15, $data15);
					if ($eksekusi12 == true) {
						$respon = "Success";
					} else {
						$respon = "Failed sales invoice detail";
					}
				}
			} else {
				$respon = "Not Found2" . $idso;
			}

			$data16 = array($iddo, $idinv);
			$query16 = "INSERT INTO tb_salesinvoicedo (iddo,idinv)VALUES(?,?)";
			$eksekusi16 = $this->db->query($query16, $data16);
			if ($eksekusi16 == true) {
				$respon = "Success";
			} else {
				$respon = "Failed sales invoice do";
			}





			if ($respon == "Success") {
				$dataz = array($noresi, $idso);
				$queryz = "UPDATE tb_salesorder SET noresi = ? WHERE idso = ?";
				$eksekusiz = $this->db->query($queryz, $dataz);
				$this->db->trans_commit();
			} else {
				$this->db->trans_rollback();
			}
		}



		return $respon;
	}


	function addstockopname($iditem, $nameitem, $sku, $qtysystem, $qtyactual, $dateawal, $dateakhir, $balancesystem)
	{
		$this->db->trans_start();
		for ($i = 0; $i < count($iditem); $i++) {
			$data     = array($iditem[$i], $nameitem[$i], $sku[$i], $qtysystem[$i], $qtyactual[$i], $dateawal, $dateakhir, $balancesystem[$i]);
			$query    = "INSERT INTO tb_opname(iditem,nameitem,sku,qtysystem,qtyactual,dateawal,dateakhir,balancesystem)VALUES(?,?,?,?,?,?,?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$respon = "Success";
			} else {
				$respon = "Failed";
				$this->db->trans_rollback();
				break;
			}
		}
		if ($respon == "Success") {
			$this->db->trans_commit();
		}
		return $respon;
	}

	function addrequestitem($iditem, $idwh, $qty, $nareq, $iduser)
	{
		$data1 = array($nareq, date('Y-m-d'), 'Waiting', count($iditem), $iduser, date('Y-m-d H:i:s'), date('YmdHis'));
		$query1 = "INSERT INTO tb_requestitemcounterheader(namerequest,daterequest,statusreq,totalreq,madeuser,madelog,norequest)VALUES(?,?,?,?,?,?,?)";
		$eksekusi1 = $this->db->query($query1, $data1);
		if ($eksekusi1 == true) {
			for ($i = 0; $i < count($iditem); $i++) {
				$data = array(date('YmdHis'), $iditem[$i], $idwh[$i], date('Y-m-d'), $iduser, $qty[$i]);
				$query = "INSERT INTO tb_requestitemcounterdetail(norequest,iditem,idwh,madelog,madeuser,qty)VALUES(?,?,?,?,?,?)";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi == true) {
					$respon = "Success";
				} else {
					$respon = "Failed";
				}
			}
		}


		return $respon;
	}

	function getrequest()
	{
		$query = "SELECT * FROM tb_requestitemcounterheader,tb_user WHERE tb_requestitemcounterheader.madeuser = tb_user.iduser";

		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idrequestheader"] = $key->idrequestheader;
				$f["namerequest"] = $key->namerequest;
				$f["norequest"] = $key->norequest;
				$f["daterequest"] = $key->daterequest;
				$f["totalreq"] = $key->totalreq;
				$f["fullname"] = $key->fullname;
				$f["statusreq"] = $key->statusreq;

				$data = array($key->norequest);
				$query1 = "SELECT * FROM tb_requestitemcounterdetail, tb_item WHERE tb_requestitemcounterdetail.norequest = ? AND tb_requestitemcounterdetail.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["idrequestdetail"] = $keyx->idrequestdetail;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["idwh"] = $keyx->idwh;

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


	function getrequestpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM tb_requestitemcounterheader,tb_user WHERE tb_requestitemcounterheader.madeuser = tb_user.iduser";
		$data  = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data  = array("%" . $search . "%", $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where $filter LIKE ? AND RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where statusreq ='$status' AND RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where $filter LIKE ? AND REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array("%" . $search . "%", $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where $filter LIKE ? AND statusreq ='$status' AND RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array("%" . $search . "%", $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND statusreq ='$status' AND RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where $filter LIKE ? AND REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND statusreq ='$status' AND RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data  = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idrequestheader,a.namerequest,a.norequest,a.daterequest,a.totalreq,b.fullname,a.statusreq,
			ROW_NUMBER() OVER (Order by a.idrequestheader) AS RowNumber FROM tb_requestitemcounterheader as a 
			left join tb_user as b on a.madeuser = b.iduser)
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		}
		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idrequestheader"] = $key->idrequestheader;
				$f["namerequest"] = $key->namerequest;
				$f["norequest"] = $key->norequest;
				$f["daterequest"] = $key->daterequest;
				$f["totalreq"] = $key->totalreq;
				$f["fullname"] = $key->fullname;
				$f["statusreq"] = $key->statusreq;

				$data = array($key->norequest);
				$query1 = "SELECT * FROM tb_requestitemcounterdetail, tb_item WHERE tb_requestitemcounterdetail.norequest = ? AND tb_requestitemcounterdetail.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["idrequestdetail"] = $keyx->idrequestdetail;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["idwh"] = $keyx->idwh;

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

	function countreport($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_requestitemcounterheader');
		$this->db->join('tb_user', 'tb_requestitemcounterheader.madeuser=tb_user.iduser', 'left');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('daterequest', $date1, $date1);
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('statusreq', $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'daterequest', $date1, $date1);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->like('daterequest', $date1, $date1, 'statusreq', $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->like($filter, $search, 'daterequest', $date1, $date1, 'statusreq', $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}


	function getrequestbyid($idrequest)
	{
		$data1 = array($idrequest);
		$query = "SELECT * FROM tb_requestitemcounterheader,tb_user WHERE tb_requestitemcounterheader.madeuser = tb_user.iduser AND tb_requestitemcounterheader.idrequestheader = ?";
		$eksekusi = $this->db->query($query, $data1)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idrequestheader"] = $key->idrequestheader;
				$f["namerequest"] = $key->namerequest;
				$f["norequest"] = $key->norequest;
				$f["daterequest"] = $key->daterequest;
				$f["totalreq"] = $key->totalreq;
				$f["fullname"] = $key->fullname;
				$f["statusreq"] = $key->statusreq;

				$data = array($key->norequest);
				$query1 = "SELECT * FROM tb_requestitemcounterdetail, tb_item WHERE tb_requestitemcounterdetail.norequest = ? AND tb_requestitemcounterdetail.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["idrequestdetail"] = $keyx->idrequestdetail;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["qtyin"] = $keyx->qtyin;
						$f["idwh"] = $keyx->idwh;
						$g["iditem"] = $keyx->iditem;

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



	function getdataingoingreportpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM movewh,common_detail WHERE movewh.typemove = '1' AND movewh.idwh = common_detail.idcomm";
		$data  = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,
			CASE WHEN a.norequest ='' THEN 'Move In' ELSE 'Request' END as typemove,a.qtymove, a.itemmove,a.descinfo,
		   a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
		   left join common_detail as b on a.idmove = b.idcomm)
		   AS t where $filter LIKE ? AND RowNumber >= ? AND t.RowNumber <= ?;
			";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.itemmove,a.descinfo,
			a.qtymove,a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,
			CASE WHEN a.norequest ='' THEN 'Move In' ELSE 'Request' END as typemove,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idmove = b.idcomm)
			AS t where REPLACE(datemove, ' ', '') >= ? AND REPLACE(datemove, ' ', '') <= ? AND RowNumber >= ? AND t.RowNumber <= ?;
			";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($status, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,CASE WHEN a.norequest ='' THEN 'Move In' ELSE 'Request' END as typemove,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idmove = b.idcomm  WHERE status = ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,CASE WHEN a.norequest ='' THEN 'Move In' ELSE 'Request' END as typemove,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idmove = b.idcomm  WHERE " . $filter . " LIKE ? AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,CASE WHEN a.norequest ='' THEN 'Move In' ELSE 'Request' END as typemove,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idmove = b.idcomm  WHERE REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ? AND status='$status')
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $status, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,CASE WHEN a.norequest ='' THEN 'Move In' ELSE 'Request' END as typemove,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idmove = b.idcomm  WHERE " . $filter . " LIKE ? AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ? AND status = ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		} else {
			$data = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.typemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idmove = b.idcomm)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idmove"] = $key->idmove;
				$f["codemove"] = $key->codemove;
				$f["datemove"] = $key->datemove;
				$f["typemove"] = $key->typemove;
				$f["qtymove"] = $key->qtymove;
				$f["itemmove"] = $key->itemmove;
				$f["descinfo"] = $key->descinfo;
				$f["idwh2"] = $key->idwh2;
				$f["idwh"] = $key->idwh;
				$f["norequest"] = $key->norequest;
				$f["namecomm"] = $key->namecomm;
				$f["status"] = $key->status;

				$data1 = array($key->idmove);
				$query1 = "SELECT * FROM movewhdet,tb_item WHERE movewhdet.idmove = ? AND movewhdet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["expdate"] = $keyx->expdate;

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

	function countingoingreport($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('movewh');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('datemove', $date1, $date1);
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('status', $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'datemove', $date1, $date1);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->like('datemove', $date1, $date1, 'status', $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->like($filter, $search, 'datemove', $date1, $date1, 'status', $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getdataingoingpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM movewh,common_detail WHERE movewh.typemove = '1' AND movewh.idwh = common_detail.idcomm";
		// $this->db->select('*');
		// $this->db->from('movewh as a');
		// $this->db->join('common_detail as b', 'a.idwh = b.idcomm', 'left');
		// $this->db->where('a.typemove=1');
		// $this->db->limit($start, $limit);
		$data  = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.typemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idwh = b.idcomm WHERE a.typemove =1 AND  " . $filter . " LIKE ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ? ";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.typemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idwh = b.idcomm WHERE a.typemove =1 AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ? ";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($status, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.typemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idwh) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idwh = b.idcomm  WHERE status = ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.typemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idwh) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idwh = b.idcomm  WHERE " . $filter . " LIKE ? AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $status, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.typemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idwh) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idwh = b.idcomm  WHERE " . $filter . " LIKE ? AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ? AND status = ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;
			";
		} else {
			$data = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.idmove,a.datemove,a.codemove,a.typemove,a.qtymove, a.itemmove,a.descinfo,
			a.idwh2,a.idwh,a.norequest,b.namecomm,a.status,ROW_NUMBER() OVER (Order by a.idwh) AS RowNumber FROM movewh as a 
			left join common_detail as b on a.idwh = b.idcomm WHERE a.typemove =1)
			AS t where RowNumber >= ? AND t.RowNumber <= ? ";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idmove"] = $key->idmove;
				$f["codemove"] = $key->codemove;
				$f["datemove"] = $key->datemove;
				$f["typemove"] = $key->typemove;
				$f["qtymove"] = $key->qtymove;
				$f["itemmove"] = $key->itemmove;
				$f["descinfo"] = $key->descinfo;
				$f["idwh2"] = $key->idwh2;
				$f["idwh"] = $key->idwh;
				$f["norequest"] = $key->norequest;
				$f["namecomm"] = $key->namecomm;
				$f["status"] = $key->status;

				$data1 = array($key->idmove);
				$query1 = "SELECT * FROM movewhdet,tb_item WHERE movewhdet.idmove = ? AND movewhdet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["expdate"] = $keyx->expdate;

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

	function countingoing($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('movewh');
		$this->db->where('typemove', 1);
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('datemove', $date1, $date1);
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('status', $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'datemove', $date1, $date1);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->like($filter, $search, 'datemove', $date1, $date1, 'status', $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}


	// function getdataingoingpaginate($start, $limit)
	// {
	// 	// $query = "SELECT * FROM movewh,common_detail WHERE movewh.typemove = '1' AND movewh.idwh = common_detail.idcomm";
	// 	$this->db->select('*');
	// 	$this->db->from('movewh as a');
	// 	$this->db->join('common_detail as b', 'a.idwh = b.idcomm', 'left');
	// 	$this->db->where('a.typemove=1');
	// 	$this->db->limit($start, $limit);

	// 	$eksekusi = $this->db->get()->result_object();
	// 	if (count($eksekusi) > 0) {
	// 		$respon = array();
	// 		foreach ($eksekusi as $key) {
	// 			$f["idmove"] = $key->idmove;
	// 			$f["codemove"] = $key->codemove;
	// 			$f["datemove"] = $key->datemove;
	// 			$f["typemove"] = $key->typemove;
	// 			$f["qtymove"] = $key->qtymove;
	// 			$f["itemmove"] = $key->itemmove;
	// 			$f["descinfo"] = $key->descinfo;
	// 			$f["idwh2"] = $key->idwh2;
	// 			$f["idwh"] = $key->idwh;
	// 			$f["norequest"] = $key->norequest;
	// 			$f["namecomm"] = $key->namecomm;
	// 			$f["status"] = $key->status;

	// 			$data1 = array($key->idmove);
	// 			$query1 = "SELECT * FROM movewhdet,tb_item WHERE movewhdet.idmove = ? AND movewhdet.iditem = tb_item.iditem";
	// 			$eksekusi1 = $this->db->query($query1, $data1)->result_object();
	// 			if (count($eksekusi1) > 0) {
	// 				$f["data"] = array();
	// 				foreach ($eksekusi1 as $keyx) {
	// 					$g["iditem"] = $keyx->iditem;
	// 					$g["nameitem"] = $keyx->nameitem;
	// 					$g["sku"] = $keyx->sku;
	// 					$g["qty"] = $keyx->qty;
	// 					$g["expdate"] = $keyx->expdate;

	// 					array_push($f["data"], $g);
	// 				}
	// 			}

	// 			array_push($respon, $f);
	// 		}
	// 	} else {
	// 		$respon = "Not Found";
	// 	}

	// 	return $respon;
	// }

	function getdataingoingwarehouse()
	{
		$query = "SELECT * FROM movewh,common_detail WHERE movewh.typemove = '2' AND movewh.idwh = common_detail.idcomm ORDER BY datemove ASC";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idmove"] = $key->idmove;
				$f["codemove"] = $key->codemove;
				$f["datemove"] = $key->datemove;
				$f["typemove"] = $key->typemove;
				$f["qtymove"] = $key->qtymove;
				$f["itemmove"] = $key->itemmove;
				$f["descinfo"] = $key->descinfo;
				$f["idwh2"] = $key->idwh2;
				$f["idwh"] = $key->idwh;
				$f["norequest"] = $key->norequest;
				$f["namecomm"] = $key->namecomm;
				$f["status"] = $key->status;

				$data1 = array($key->idmove);
				$query1 = "SELECT * FROM movewhdet,tb_item WHERE movewhdet.idmove = ? AND movewhdet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["expdate"] = $keyx->expdate;

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

	function getdatareturnpaginate($start, $limit)
	{
		// $query = "SELECT * FROM movewh,common_detail WHERE movewh.typemove = '2' AND movewh.idwh = common_detail.idcomm ORDER BY datemove ASC";
		$this->db->select('*');
		$this->db->from('movewh as a');
		$this->db->join('common_detail as b', 'a.idwh = b.idcomm', 'left');
		$this->db->where('a.typemove =2');
		$this->db->order_by('a.datemove', 'asc');
		$this->db->limit($start, $limit);

		$eksekusi = $this->db->get()->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idmove"] = $key->idmove;
				$f["codemove"] = $key->codemove;
				$f["datemove"] = $key->datemove;
				$f["typemove"] = $key->typemove;
				$f["qtymove"] = $key->qtymove;
				$f["itemmove"] = $key->itemmove;
				$f["descinfo"] = $key->descinfo;
				$f["idwh2"] = $key->idwh2;
				$f["idwh"] = $key->idwh;
				$f["norequest"] = $key->norequest;
				$f["namecomm"] = $key->namecomm;
				$f["status"] = $key->status;

				$data1 = array($key->idmove);
				$query1 = "SELECT * FROM movewhdet,tb_item WHERE movewhdet.idmove = ? AND movewhdet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["expdate"] = $keyx->expdate;

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

	function countreturn()
	{
		return $this->db->get('movewh')->num_rows();
	}

	function getdataingoingwarehousepaginate($start, $limit)
	{
		// $query = "SELECT * FROM movewh,common_detail WHERE movewh.typemove = '2' AND movewh.idwh = common_detail.idcomm ORDER BY datemove ASC";
		$this->db->select('*');
		$this->db->from('movewh as a');
		$this->db->join('common_detail as b', 'a.idwh = b.idcomm', 'left');
		$this->db->where('a.typemove =2');
		$this->db->order_by('a.datemove', 'asc');
		$this->db->limit($start, $limit);

		$eksekusi = $this->db->get()->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idmove"] = $key->idmove;
				$f["codemove"] = $key->codemove;
				$f["datemove"] = $key->datemove;
				$f["typemove"] = $key->typemove;
				$f["qtymove"] = $key->qtymove;
				$f["itemmove"] = $key->itemmove;
				$f["descinfo"] = $key->descinfo;
				$f["idwh2"] = $key->idwh2;
				$f["idwh"] = $key->idwh;
				$f["norequest"] = $key->norequest;
				$f["namecomm"] = $key->namecomm;
				$f["status"] = $key->status;

				$data1 = array($key->idmove);
				$query1 = "SELECT * FROM movewhdet,tb_item WHERE movewhdet.idmove = ? AND movewhdet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["expdate"] = $keyx->expdate;

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

	function countreportreturn()
	{
		return $this->db->get('movewh')->num_rows();
	}


	function confirmincounter($iduser, $datemove, $typemove, $descinfo, $qtymove, $itemmove, $iditem, $qty, $expdate, $idwh, $idwh2, $idmove, $codemove)
	{
		$this->db->trans_start();
		$lastid = 0;
		$oldidwh = 0;
		$oldidwh2 = 0;
		if ($idmove != '') {
			$data = array($idmove);
			$queryx = "SELECT idwh,idwh2, qtymove from movewh
				where idmove = ? ";

			$eksekusix = $this->db->query($queryx, $data)->result_object();
			$isexists = false;
			if (count($eksekusix) > 0) {
				$lastid = 0;
				foreach ($eksekusix as $key) {
					$lastid		= $key->qtymove;
					$oldidwh	= $key->idwh;
					$oldidwh2	= $key->idwh2;
					$isexists = true;
				}
				if (!$isexists) {
					$respon = "Data not exists";
					$this->db->trans_rollback();
					return $respon;
				}
			}
		}
		$respon = "Success";

		if ($respon == "Success") {

			if ($idmove == '') {
				$data = array(substr(date('YmdHisu'), 0, 15), $datemove, $typemove, $qtymove, $itemmove, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $idwh2);
				$query = "INSERT INTO movewh(codemove,datemove,typemove,qtymove,itemmove,descinfo,madelog,madeuser,idwh,idwh2,status)VALUES(?,?,?,?,?,?,?,?,?,?,'Waiting')";
			} else {
				$data = array($datemove, $typemove, $qtymove, $itemmove, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $idwh2, $idmove);
				$query = "UPDATE movewh SET datemove = ? ,typemove = ? ,qtymove = ? ,itemmove = ? ,descinfo = ? ,madelog = ? ,madeuser = ? ,idwh = ? ,idwh2 = ?,status ='Finish' WHERE idmove = ? ";
			}
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$lastid = 0;
				if ($idmove == '') {
					$queryx = "SELECT @@IDENTITY As lastid";
					$eksekusix = $this->db->query($queryx)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $key) {
							$lastid = $key->lastid;
						}
					}
				} else {
					$lastid = $idmove;
				}

				if ($lastid != 0) {
					if ($idmove != '') {
						$data = array($idmove, $idmove, $idmove, $idmove, $idmove);
						$queryx = "UPDATE tb_itemqtyexp  set tb_itemqtyexp.inqty=tb_itemqtyexp.inqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty-x.tqty
							from
							(
								select expdate,idwh2 as idwh,iditem,qty as tqty from movewhdet where idmove= ? 
							) as x
							where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

							UPDATE tb_itemqty set tb_itemqty.inqty=tb_itemqty.inqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty-x.tqty
							from
							(
								select idwh2 as idwh,iditem,qty as tqty from movewhdet where idmove= ? 
							) as x
							where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

							UPDATE tb_itemqtyexp  set tb_itemqtyexp.outqty=tb_itemqtyexp.outqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty+x.tqty
							from
							(
								select expdate,idwh,iditem,qty as tqty from movewhdet where idmove= ? 
							) as x
							where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

							UPDATE tb_itemqty set tb_itemqty.outqty=tb_itemqty.outqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty+x.tqty
							from
							(
								select idwh,iditem,qty as tqty from movewhdet where idmove= ? 
							) as x
							where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh


							DELETE FROM movewhdet where idmove = ? ";
						$eksekusix = $this->db->query($queryx, $data);
					}

					$respon = "Success";

					for ($i = 0; $i < count($iditem); $i++) {
						if (is_numeric($qty[$i]) && is_numeric($iditem[$i])) {
							$dataxx = array($lastid, ($i + 1), $iditem[$i], $qty[$i], $idwh, $idwh2, $expdate[$i]);
							$queryxx = "INSERT INTO movewhdet (idmove,idmovedet,iditem,qty,idwh,idwh2,expdate)VALUES(?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								if ($idmove != "") {
									$dataxx = array(
										$iditem[$i], $idwh2, $expdate[$i], $iditem[$i], $idwh2, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh2, $expdate[$i], $iditem[$i], $idwh2, $iditem[$i], $idwh2, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh2,
										$iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh
									);
									$queryxx = "";
									$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
									$queryxx = $queryxx . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0,?) ";
									$queryxx = $queryxx . "ELSE ";
									$queryxx = $queryxx . "UPDATE tb_itemqtyexp SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? and expdate = ? ";

									$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
									$queryxx = $queryxx . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0,?) ";
									$queryxx = $queryxx . "ELSE ";
									$queryxx = $queryxx . "UPDATE tb_itemqty SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? ";

									$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
									$queryxx = $queryxx . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,0,?,-1* ?) ";
									$queryxx = $queryxx . "ELSE ";
									$queryxx = $queryxx . "UPDATE tb_itemqtyexp SET outqty = outqty + ? , endqty = endqty - ? where iditem = ? and idwh = ? and expdate = ? ";

									$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
									$queryxx = $queryxx . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,0,?,-1* ?) ";
									$queryxx = $queryxx . "ELSE ";
									$queryxx = $queryxx . "UPDATE tb_itemqty SET outqty = outqty + ? , endqty = endqty - ? where iditem = ? and idwh = ? ";

									$eksekusixx = $this->db->query($queryxx, $dataxx);
									if ($eksekusixx == true) {
										$respon = "Success";
									} else {
										$respon = "Failed on Detail Stock";
										break;
									}
								} else {
									$respon = "Success";
								}
							} else {
								$respon = "Failed on Detail";
								break;
							}
						} else {
							$respon = "Failed on Detail";
							break;
						}
					}
					if ($respon == "Success") {
						$dataxx = array($lastid);
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqty as a
							inner join movewhdet as b on a.iditem=b.iditem and a.idwh=b.idwh
							inner join tb_item as i on a.iditem=i.iditem
							where a.endqty<0 and b.idmove= ?
							";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$respon = "Stock " . $qnameitem . " Minus";
								break;
							}
						}
					}
					if ($respon == "Success") {
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqtyexp as a
							inner join movewhdet as b on a.iditem=b.iditem and a.idwh=b.idwh and a.expdate=b.expdate
							inner join tb_item as i on a.iditem=i.iditem
							where a.endqty<0 and b.idmove= ?
							";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$respon = "Stock Expired " . $qnameitem . " Minus";
								break;
							}
						}
					}
				}
			} else {
				$respon = "Failed on Update Header";
			}
		}
		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}


	function updateinvinret($iduser, $datein, $typein, $idpo, $idsupp, $descinfo, $qtyin, $itemin, $iditem, $qty, $idpodet, $idsn, $idsn2, $expdate, $idwh, $idin, $codein, $idso, $idsodet)
	{
		$this->db->trans_start();
		$lastid = 0;
		$laststatus = 0;
		$oldidpo = 0;
		$postatus = '';
		$oldidinv = 0;
		$oldidwh = 0;
		if ($idin != '') {
			$data = array($idin);
			$queryx = "SELECT a.idwh, a.qtyinv,a.idinv,a.idpo,isnull(b.statuspo,'') as statuspo  from invinret  as a
				left join po as b on a.idpo=b.idpo where a.idinret = ? ";

			$eksekusix = $this->db->query($queryx, $data)->result_object();
			$laststatus = 0;
			$isexists = false;
			if (count($eksekusix) > 0) {
				$lastid = 0;
				foreach ($eksekusix as $key) {
					$lastid = $key->qtyinv;
					$oldidinv = $key->idinv;
					$postatus = $key->statuspo;
					$oldidpo = $key->idpo;
					$oldidwh = $key->idwh;
					$isexists = true;
				}
				if (!$isexists) {
					$respon = "Data not exists";
					$this->db->trans_rollback();
					return $respon;
				}
				if ($oldidinv != 0) {
					$respon = "Already Used";
					$this->db->trans_rollback();
					return $respon;
				}
			}
		}
		$respon = "Success";
		if ($respon == "Success") {

			if ($idin == '') {
				$data = array(substr(date('YmdHisu'), 0, 15), $idpo, $idsupp, $datein, $typein, $qtyin, $itemin, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $idso);
				$query = "INSERT INTO invinret(codeinret,idpo,idsupp,dateinret,typeinret,qtyinret,iteminret,descinfo,madelog,madeuser,idwh,idso)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
			} else {
				$data = array($idsupp, $idpo, $datein, $typein, $qtyin, $itemin, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $idin);
				$query = "UPDATE invinret SET idsupp = ? ,idpo = ? ,dateinret = ? ,typeinret = ? ,qtyinret = ? ,iteminret = ? ,descinfo = ? ,madelog = ? ,madeuser = ? ,idwh = ? WHERE idinret = ? ";
			}
			$eksekusi = $this->db->query($query, $data);

			if ($eksekusi == true) {
				$lastid = 0;
				if ($idin == '') {
					$queryx = "SELECT @@IDENTITY As lastid";
					$eksekusix = $this->db->query($queryx)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $key) {
							$lastid = $key->lastid;
						}
					}
				} else {
					$lastid = $idin;
				}

				if ($lastid != 0) {
					if ($idin != '') {
						$data = array($idin, $idin, $idin, $idin, $idin);
						$queryx = "UPDATE podet set podet.qtyret=podet.qtyret-x.tqty
							from
							(
								select idpo,idpodet,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invinretdet as a where idinret= ? 
							) as x
							where podet.idpo=x.idpo and podet.idpodet=x.idpodet 

							UPDATE po set po.qtyret=po.qtyret-y.tqty
							from
							(
								select idpo,sum((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invinretdet as a where idinret= ? 
								group by idpo
							) as y
							where po.idpo=y.idpo 



							UPDATE tb_itemqtyexp  set tb_itemqtyexp.outqty=tb_itemqtyexp.outqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty+x.tqty
							from
							(
								select expdate,idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invinretdet as a where idinret= ? 
							) as x
							where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

							UPDATE tb_itemqty  set tb_itemqty.outqty=tb_itemqty.outqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty+x.tqty
							from
							(
								select idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invinretdet as a where idinret= ? 
							) as x
							where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

							DELETE FROM invinretdet where idinret = ? 
							
							

							";
						$eksekusix = $this->db->query($queryx, $data);
					}

					$statuspo = 0;

					if ($oldidpo != $idpo) {
						if ($oldidpo != 0) {
							if ($postatus != '02') {
								$dataxx = array($oldidpo);
								$queryxx = "UPDATE po set statuspo='02' where idpo = ? ";
								$queryxx = $queryxx . "UPDATE transstatus set s" . $postatus . "=s" . $postatus . "-1,s02=s02+1 where codetrans='PO' ";
								$eksekusixx = $this->db->query($queryxx, $dataxx);
							}
						}
						if ($idpo != 0) {
							$data = array($idpo);
							$queryx = "SELECT statuspo from po where idpo = ? ";
							$eksekusix = $this->db->query($queryx, $data)->result_object();
							$laststatus = 0;
							$isexists = false;
							//if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$statuspo = $key->statuspo;
								$isexists = true;
							}
							if (!$isexists) {
								$respon = "Data Order not exists";
								$this->db->trans_rollback();
								return $respon;
							}
							if ($statuspo == '04') {
								$respon = "Data Order Already Canceled";
								$this->db->trans_rollback();
								return $respon;
							}
							//}
							if ($statuspo != '02') {
								$dataxx = array($idpo);
								$queryxx = "UPDATE po set statuspo='02' where idpo = ? ";
								$queryxx = $queryxx . "UPDATE transstatus set s" . $statuspo . "=s" . $statuspo . "-1,s02=s02+1 where codetrans='PO' ";
								$eksekusixx = $this->db->query($queryxx, $dataxx);
							}
						}
					} else {
						if ($oldidpo != 0) {
							if ($postatus != '02') {
								$dataxx = array($oldidpo);
								$queryxx = "UPDATE po set statuspo='02' where idpo = ? ";
								$queryxx = $queryxx . "UPDATE transstatus set s" . $postatus . "=s" . $postatus . "-1,s02=s02+1 where codetrans='PO' ";
								$eksekusixx = $this->db->query($queryxx, $dataxx);
							}
						}
					}

					$respon = "Success";

					for ($i = 0; $i < count($iditem); $i++) {
						if (is_numeric($qty[$i]) && is_numeric($iditem[$i])) {
							$dataxx = array($lastid, ($i + 1), $idpo, $idpodet[$i], $iditem[$i], 1, $qty[$i], $idsn[$i], $idsn2[$i], $idwh, $expdate[$i], $idsodet[$i], $idso);
							$queryxx = "INSERT INTO invinretdet (idinret,idinretdet,idpo,idpodet,iditem,unitvol,qty,idsn,idsn2,idwh,expdate,idsodet,idso)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								if ($idpo != '' && $statuspo != '04') {
									$dataxx = array($qty[$i], $idpo, $idpodet[$i], $qty[$i], $idpo);
									$queryxx = "UPDATE podet set qtyret=qtyret + ? where idpo = ? and idpodet = ? ";
									$queryxx = $queryxx . "UPDATE po set qtyret=qtyret + ? where idpo = ? ";
									$eksekusixx = $this->db->query($queryxx, $dataxx);

									if ($eksekusixx == true) {
										$respon = "Success";
									} else {
										$respon = "Failed on Detail Qty PO";
										break;
									}
								}

								$dataxx = array($iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh);
								$queryxx = "";
								//$queryxx = $queryxx . "INSERT INTO tb_itemsn(iditem,idsn,idsn2,idwh,expdate) values(?,?,?,?,?) ";
								$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
								$queryxx = $queryxx . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0,1* ?) ";
								$queryxx = $queryxx . "ELSE ";
								$queryxx = $queryxx . "UPDATE tb_itemqtyexp SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? and expdate = ? ";

								$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
								$queryxx = $queryxx . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0,1* ?) ";
								$queryxx = $queryxx . "ELSE ";
								$queryxx = $queryxx . "UPDATE tb_itemqty SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? ";
								$eksekusixx = $this->db->query($queryxx, $dataxx);
								if ($eksekusixx == true) {
									$respon = "Success";
								} else {
									$respon = "Failed on Detail Qty PO";
									break;
								}
							} else {
								$respon = "Failed on Detail";
								break;
							}
						} else {
							$respon = "Failed on Detail";
							break;
						}



						$snmax;
						$snmin;
						$iddo;
						$iddodet;
						$data1 = array($idsn[$i], $iditem[$i]);
						$query1 = "SELECT * FROM tb_dodetailsn where  ? BETWEEN convert(decimal(25,0),idsn) AND convert(decimal(25,0),idsn2) AND iditem = ? AND status ='Sales'";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $key1) {
								$snmax = $key1->idsn2;
								$snmin = $key1->idsn;
								$iddo = $key1->iddo;
								$iddodet = $key1->iddodet;
							}
							$data2 = array($snmin, $snmax, $iditem[$i]);
							$query2 = "DELETE FROM tb_dodetailsn WHERE idsn = ? AND idsn2 = ? AND iditem = ? ";
							$eksekui2 = $this->db->query($query2, $data2);
							if ($eksekui2 == true) {

								if ($idsn[$i] == $snmin && $idsn2[$i] < $snmax) {
									$snnew = $idsn2[$i] + 1;
									$data3 = array($iditem[$i], 'Return', $idsn[$i], $idsn2[$i], $iddo, $iddodet);
									$query3 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
									$eksekusi3 = $this->db->query($query3, $data3);
									if ($eksekusi3 == true) {
										$data4 =  array($iditem[$i], 'Sales', $snnew, $snmax, $iddo, $iddodet);
										$query4 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
										$eksekusi4 = $this->db->query($query4, $data4);
										if ($eksekusi4 == true) {
											$respon = "Success";
										} else {
											$respon = "Failed for make split data sn";
											break;
										}
									} else {
										$respon = "Failed for make new data sn";
										break;
									}
								} else if ($idsn[$i] > $snmin && $idsn2[$i] < $snmax) {

									$snnew = $idsn2[$i] + 1;
									$snnew1 = $idsn[$i] - 1;
									$data3 = array($iditem[$i], 'Return', $idsn[$i], $idsn2[$i], $iddo, $iddodet);
									$query3 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
									$eksekusi3 = $this->db->query($query3, $data3);
									if ($eksekusi3 == true) {
										$data4 =  array($iditem[$i], 'Sales', $snnew, $snmax, $iddo, $iddodet);
										$query4 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
										$eksekusi4 = $this->db->query($query4, $data4);
										if ($eksekusi4 == true) {
											$data5 =  array($iditem[$i], 'Sales', $snmin, $snnew1, $iddo, $iddodet);
											$query5 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
											$eksekusi5 = $this->db->query($query5, $data5);
											if ($eksekusi5 == true) {
												$respon = "Success";
											} else {
												$respon = "Failed for make split data sn";
												break;
											}
										} else {
											$respon = "Failed for make split data sn";
											break;
										}
									} else {
										$respon = "Failed for make new data sn";
										break;
									}
								} else if ($idsn[$i] > $snmin && $idsn2[$i] == $snmax) {

									$snnew = $idsn[$i] - 1;
									$data3 = array($iditem[$i], 'Return', $idsn[$i], $idsn2[$i], $iddo, $iddodet);
									$query3 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
									$eksekusi3 = $this->db->query($query3, $data3);
									if ($eksekusi3 == true) {
										$data4 =  array($iditem[$i], 'Sales', $snmin, $snnew, $iddo, $iddodet);
										$query4 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
										$eksekusi4 = $this->db->query($query4, $data4);
										if ($eksekusi4 == true) {
											$respon = "Success";
										} else {
											$respon = "Failed for make split data sn";
											break;
										}
									} else {
										$respon = "Failed for make new data sn";
										break;
									}
								} else if ($idsn[$i] == $snmin && $idsn2[$i] == $snmax) {

									$snnew = $idsn[$i] - 1;
									$data3 = array($iditem[$i], 'Return', $idsn[$i], $idsn2[$i], $iddo, $iddodet);
									$query3 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
									$eksekusi3 = $this->db->query($query3, $data3);
									if ($eksekusi3 == true) {
										$respon = "Success";
									} else {
										$respon = "Failed for make new data sn";
										break;
									}
								} else if ($idsn[$i] == $idsn2[$i]) {
									if ($idsn[$i] == $snmin) {


										$snnew = $idsn[$i] + 1;
										$data3 = array($iditem[$i], 'Return', $idsn[$i], $idsn[$i], $iddo, $iddodet);
										$query3 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
										$eksekusi3 = $this->db->query($query3, $data3);
										if ($eksekusi3 == true) {
											$data4 =  array($iditem[$i], 'Sales', $snnew, $snmax, $iddo, $iddodet);
											$query4 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
											$eksekusi4 = $this->db->query($query4, $data4);
											if ($eksekusi4 == true) {
												$respon = "Success";
											} else {
												$respon = "Failed for make split data sn";
												break;
											}
										} else {
											$respon = "Failed for make new data sn";
											break;
										}
									} else if ($idsn[$i] == $snmax) {
										$snnew = $idsn[$i] - 1;
										$data3 = array($iditem[$i], 'Return', $idsn[$i], $idsn[$i], $iddo, $iddodet);
										$query3 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
										$eksekusi3 = $this->db->query($query3, $data3);
										if ($eksekusi3 == true) {
											$data4 =  array($iditem[$i], 'Sales', $snmin, $snnew, $iddo, $iddodet);
											$query4 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
											$eksekusi4 = $this->db->query($query4, $data4);
											if ($eksekusi4 == true) {
												$respon = "Success";
											} else {
												$respon = "Failed for make split data sn";
												break;
											}
										} else {
											$respon = "Failed for make new data sn";
											break;
										}
									} else if ($idsn[$i] > $snmin && $idsn[$i] < $snmax) {
										$snnew = $idsn[$i] + 1;
										$snnew1 = $idsn[$i] - 1;
										$data3 = array($iditem[$i], 'Return', $idsn[$i], $idsn[$i], $iddo, $iddodet);
										$query3 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
										$eksekusi3 = $this->db->query($query3, $data3);
										if ($eksekusi3 == true) {
											$data4 =  array($iditem[$i], 'Sales', $snnew, $snmax, $iddo, $iddodet);
											$query4 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
											$eksekusi4 = $this->db->query($query4, $data4);
											if ($eksekusi4 == true) {
												$data5 =  array($iditem[$i], 'Sales', $snmin, $snnew1, $iddo, $iddodet);
												$query5 = "INSERT INTO tb_dodetailsn (iditem, status, idsn, idsn2 ,iddo,iddodet)VALUES(?,?,?,?,?,?)";
												$eksekusi5 = $this->db->query($query5, $data5);
												if ($eksekusi5 == true) {
													$respon = "Success";
												} else {
													$respon = "Failed for make split data sn";
													break;
												}
											} else {
												$respon = "Failed for make split data sn";
												break;
											}
										} else {
											$respon = "Failed for make new data sn";
											break;
										}
									}
								}
							} else {
								$respon = "Failed for delete old SN";
							}
						} else {

							$query2 = "UPDATE tb_dodetailsn SET status = 'Return' WHERE idsn = ? AND iditem = ?";
							$eksekusi2 = $this->db->query($query2, $data1);
							if ($eksekusi2 = true) {

								if ($idsn[$i] == $idsn2[$i]) {
									$respon = "Success";
								} else {
									$data2 =  array($idsn2[$i], $iditem[$i]);
									$query3 = "UPDATE tb_dodetailsn SET status = 'Return' WHERE idsn = ? AND iditem = ?";
									$eksekusi3 = $this->db->query($query3, $data2);
									if ($eksekusi3 == true) {
										$respon = "Success";
									} else {
										$respon = "Failed For Update Status";
										break;
									}
								}
							} else {
								$respon = "Failed For Update Status";
								break;
							}
						}
					}
					if ($respon == "Success") {
						if ($idpo != '' && $statuspo != '04') {
							$dataxx = array($idpo);
							$queryxx = "SELECT i.nameitem,b.qtyin-b.qtyret as endqty from
								(select iditem,sum(qtyret)as qtyret,sum(qtyin) as qtyin from podet where idpo= ? group by iditem)as b 
								inner join tb_item as i on b.iditem=i.iditem
								where b.qtyin-b.qtyret<0
								";
							$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

							if (count($eksekusix) > 0) {
								foreach ($eksekusix as $key) {
									$qnameitem = $key->nameitem;
									$respon = "Return In Purchase" . $qnameitem . " Over than Inventory In Purchase";
									break;
								}
							}
						}
					}

					if ($respon == "Success") {
						$dataxx = array($lastid);
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqty as a
							inner join invinretdet as b on a.iditem=b.iditem and a.idwh=b.idwh
							inner join tb_item as i on a.iditem=i.iditem
							where a.endqty<0 and b.idinret= ?
							";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$respon = "Stock " . $qnameitem . " Minus";
								break;
							}
						}
					}
					if ($respon == "Success") {
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqtyexp as a
							inner join invinretdet as b on a.iditem=b.iditem and a.idwh=b.idwh and a.expdate=b.expdate
							inner join tb_item as i on a.iditem=i.iditem
							where a.endqty<0 and b.idinret= ?
							";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$respon = "Stock Expired " . $qnameitem . " Minus";
								break;
							}
						}
					}
				}
			} else {
				$respon = "Failed on Update Header";
			}
		}




		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}
}
