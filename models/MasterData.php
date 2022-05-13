<?php


class MasterData extends CI_Model
{

	function gethistory($start, $end)
	{
		$data = array($start, $end);
		$query = "SELECT tb_user.fullname, tb_user.iduser, tb_log.activity, tb_log.datelog,tb_role.idrole , tb_role.namerole FROM tb_user , tb_log , tb_role WHERE tb_user.iduser = tb_log.iduser AND tb_role.idrole = tb_user.role AND  DATEADD(dd,0,DATEDIFF(dd,0,tb_log.datelog)) between ? AND ?  ORDER BY tb_log.datelog DESC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["fullname"] = $key->fullname;
				$f["iduser"] = $key->iduser;
				$f["activity"] = $key->activity;
				$f["datelog"] = $key->datelog;
				$f["idrole"] = $key->idrole;
				$f["namerole"] = $key->namerole;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getuseractive()
	{
		date_default_timezone_set("Asia/Jakarta");
		$data = array(date('Y-m-d H:i:s'));
		$query = "SELECT tb_user.fullname, tb_user.iduser, mastersession.iduser,mastersession.expsession,tb_role.idrole , tb_role.namerole FROM tb_user , mastersession , tb_role WHERE tb_user.iduser = mastersession.iduser AND tb_role.idrole = tb_user.role AND mastersession.expsession > ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["fullname"] = $key->fullname;
				$f["iduser"] = $key->iduser;
				$f["idrole"] = $key->idrole;
				$f["namerole"] = $key->namerole;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function getrole()
	{
		$query = "SELECT * FROM tb_role";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idrole"] = $key->idrole;
				$f["namerole"] = $key->namerole;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getrolebyid($idrole)
	{
		$data = array($idrole);
		$query = "SELECT * FROM tb_role where idrole = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idrole"] = $key->idrole;
				$f["namerole"] = $key->namerole;
				$query1 = "SELECT * FROM tb_roledetail WHERE idrole = ?";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["menu"] = $keyx->menu;
						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getcurrency()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '3'";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["isactive"] =  $key->isactive;
				$f["attrib1"] =  $key->attrib1;
				$f["attrib7"] =  $key->attrib7;


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getpo()
	{
		$query = "SELECT * FROM po";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpo"]    =  $key->idpo;
				$f["codepo"]  =  $key->codepo;
				$f["datepo"]  =  $key->datepo;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getcustomer()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '2'";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["isactive"] =  $key->isactive;
				$f["attrib1"] =  $key->attrib1;
				$f["attrib2"] =  $key->attrib2;
				$f["attrib4"] =  $key->attrib4;
				$f["attrib5"] =  $key->attrib5;


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}




	function getdataexpired($iditem, $idwh)
	{
		$data = array($iditem, $idwh);
		$query = "SELECT * FROM  tb_itemsn WHERE iditem = ? AND idwh = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				if ($key->expdate <= date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))))) {
					$f["iditem"] = $key->iditem;
					$f["expdate"] = $key->expdate;
					$f["idsn"] = $key->idsn;
					$f["idsn2"] = $key->idsn2;


					array_push($respon, $f);
				}
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getbundling()
	{
		$query = "SELECT * FROM tb_bundling";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idbundling"] = $key->idbundling;
				$f["itemgroup"]  = $key->itemgroup;
				$f["nameitem"]   = $key->nameitem;
				$f["sku"]        = $key->sku;
				$f["harga"]      = $key->harga;
				$f["link"]       = $key->link;
				$f["spec"]       = $key->spec;
				$f["status"]     = $key->status;
				$f["madeuser"]   = $key->madeuser;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function getitem()
	{
		// $query = "SELECT * FROM tb_item left join common_detail on  tb_item.itemtype = common_detail.idcomm WHERE status=1";
		$query = "SELECT * FROM tb_item";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"]        =  $key->iditem;
				$f["nameitem"]      =  $key->nameitem;
				$f["price"]     =  $key->price;
				$f["status"]        =  $key->status;
				$f["sku"]           =  $key->sku;
				$f["itemgroup"]     =  $key->itemgroup;
				$f["deskripsi"]     =  $key->deskripsi;
				$f["jenisqty"]      =  $key->jenisqty;

				$data = array($key->iditem);
				$queryx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qty"]  = $keyx->endqty - $keyx->qtyso;
						$f["qtyactual"]  = $keyx->endqty;
						$f["qtyso"]  = $keyx->qtyso;
						$f["idwh"]  = $keyx->idwh;


						$data3 = array($keyx->iditem);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $key->iditem)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$f["avgbuyitem"] = $key3->total;
							}
						} else {
							$f["avgbuyitem"] = 0;
						}

						$data1 = array($keyx->iditem, $keyx->idwh);
						$query1 = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ?";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						$f["data"] = array();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["endqty"] = $keyxx->endqty;

								if ($g["expdate"] < date('Y-m-d')) {
									$f["qty"] = $f['qty'] - $g["endqty"];
								}

								array_push($f["data"], $g);
							}
						} else {
							$f["data"] = "Not Found";
						}

						$data2 = array($keyx->iditem, $keyx->idwh);
						$query2 = "SELECT * FROM  tb_itemsn WHERE iditem = ? AND idwh = ?";
						$eksekusi2 = $this->db->query($query2, $data2)->result_object();
						$f["data1"] = array();
						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyxx) {
								$g["snid"] = $keyxx->snid;
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["idsn"] = $keyxx->idsn;
								$g["idsn2"] = $keyxx->idsn2;
								$g["idwh"] = $keyxx->idwh;
								$g["idsupp"] = $keyxx->idsupp;
								$g["hargabeli"] = $keyxx->hargabeli;
								$g["idpo"] = $keyxx->idpo;



								array_push($f["data1"], $g);
							}
						}
					}
				} else {
					$queryxy = "SELECT * FROM common_detail WHERE attrib3 = 'counter'";
					$eksekusixy = $this->db->query($queryxy)->result_object();
					if (count($eksekusixy) > 0) {
						foreach ($eksekusixy as $key) {
							$f["idwh"] = $key->idcomm;
						}
					}

					$f["qty"]  = 0;

					$f["qtyactual"]  = 0;
					$f["qtyso"]  = 0;
					$f["data"] = "Not Found";
					$f["data1"] = "Not Found";
				}

				// 



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemmaterialso()
	{
		$query    = "SELECT * FROM tb_item";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"]        =  $key->iditem;
				$f["nameitem"]      =  $key->nameitem;
				$f["sku"]           =  $key->sku;
				$f["price"]         =  $key->price;
				$f["bom"]           =  $key->bom;
				$f["usebom"]        =  $key->usebom;
				$f["itemgroup"]     =  $key->itemgroup;
				$f["deskripsi"]     =  $key->deskripsi;
				$f["gambar"]        =  $key->gambar;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemmaterialpo()
	{
		$query = "SELECT * FROM tb_item WHERE itemgroup in('Produk','BahanMaterial')";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"]        =  $key->iditem;
				$f["nameitem"]      =  $key->nameitem;
				$f["sku"]           =  $key->sku;
				$f["price"]         =  $key->price;
				$f["bom"]           =  $key->bom;
				$f["usebom"]        =  $key->usebom;
				$f["itemgroup"]     =  $key->itemgroup;
				$f["deskripsi"]     =  $key->deskripsi;
				$f["gambar"]        =  $key->gambar;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemmaterialinvin()
	{
		$query = "SELECT * FROM tb_item WHERE itemgroup in('Produk','BahanMaterial')";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"]        =  $key->iditem;
				$f["nameitem"]      =  $key->nameitem;
				$f["sku"]           =  $key->sku;
				$f["price"]         =  $key->price;
				$f["bom"]           =  $key->bom;
				$f["usebom"]        =  $key->usebom;
				$f["itemgroup"]     =  $key->itemgroup;
				$f["deskripsi"]     =  $key->deskripsi;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
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

	function getitemexppaginatation($start, $limit, $filter, $search, $dateexpaired, $idwh)
	{
		// $query = "SELECT * FROM tb_item left join common_detail on  tb_item.itemtype = common_detail.idcomm ";

		$data  = "";
		$query = "";
		if ($search != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_item.iditem,tb_item.nameitem,tb_item.pricebuyitem,tb_item.priceitem,tb_item.VAT,tb_item.subprice,tb_item.status,tb_item.sku
			,tb_item.itemtype , common_detail.namecomm ,common_detail.attrib3 , tb_item.minstock, tb_item.maxstock,tb_item.usesn,tb_item.pph22, 
			ROW_NUMBER() OVER (Order by tb_item.iditem) AS RowNumber FROM tb_item
            left join common_detail on  tb_item.itemtype = common_detail.idcomm)  AS t WHERE " . $filter . " LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($dateexpaired, $idwh, $start, $limit);
			$query = "SELECT t.*  FROM ( select  a.iditem,a.nameitem,a.pricebuyitem,a.priceitem,a.VAT,a.subprice,a.status,a.sku
			,a.itemtype , c.namecomm ,c.attrib3,a.minstock, a.maxstock,a.usesn, a.pph22,b.expdate,b.endqty,
			ROW_NUMBER() OVER (Order by a.iditem) AS RowNumber   from tb_item as a
			left join tb_itemqtyexp as b on a.iditem = b.iditem
			left join common_detail as c on b.idwh = c.idcomm
			where b.expdate <=? and c.attrib3=?) AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str      = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["pricebuyitem"] =  $key->pricebuyitem;
				$f["priceitem"] =  $key->priceitem;
				$f["VAT"] =  $key->VAT;
				$f["subprice"] =  $key->subprice;
				$f["status"] =  $key->status;
				$f["sku"] =  $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["pph22"] =  $key->pph22;
				$f["usesn"] =  $key->usesn;
				$f["namecomm"] =  $key->namecomm;
				$f["minstock"] =  $key->minstock;
				$f["maxstock"] =  $key->maxstock;

				$data = array($key->iditem, $idwh);
				$queryx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = ?";
				$eksekusix = $this->db->query($queryx, $data)->result_object();

				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qty"]  = $keyx->endqty - $keyx->qtyso;
						$f["qtyactual"]  = $keyx->endqty;
						$f["qtyso"]  = $keyx->qtyso;

						$f["idwh"]  = $keyx->idwh;


						$data3 = array($keyx->iditem);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $key->iditem)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$f["avgbuyitem"] = $key3->total;
							}
						} else {
							$f["avgbuyitem"] = 0;
						}

						$data1 = array($keyx->iditem, $keyx->idwh);
						$query1 = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ?";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						$f["data"] = array();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["endqty"] = $keyxx->endqty;

								if ($g["expdate"] < date('Y-m-d')) {
									$f["qty"] = $f['qty'] - $g["endqty"];
								}

								array_push($f["data"], $g);
							}
						} else {
							$f["data"] = "Not Found";
						}

						$data2 = array($keyx->iditem, $keyx->idwh);
						$query2 = "SELECT * FROM  tb_itemsn WHERE iditem = ? AND idwh = ?";
						$eksekusi2 = $this->db->query($query2, $data2)->result_object();

						$f["data1"] = array();
						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyxx) {
								$g["snid"] = $keyxx->snid;
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["idsn"] = $keyxx->idsn;
								$g["idsn2"] = $keyxx->idsn2;
								$g["idwh"] = $keyxx->idwh;
								$g["idsupp"] = $keyxx->idsupp;
								$g["hargabeli"] = $keyxx->hargabeli;
								$g["idpo"] = $keyxx->idpo;



								array_push($f["data1"], $g);
							}
						}
					}
				} else {
					$queryxy = "SELECT * FROM common_detail WHERE attrib3 = 'counter'";
					$eksekusixy = $this->db->query($queryxy)->result_object();
					if (count($eksekusixy) > 0) {
						foreach ($eksekusixy as $key) {
							$f["idwh"] = $key->idcomm;
						}
					}

					$f["qty"]  = 0;

					$f["qtyactual"]  = 0;
					$f["qtyso"]  = 0;
					$f["data"] = "Not Found";
					$f["data1"] = "Not Found";
				}

				// 



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function Countgetitempagination()
	{
		$this->db->select('*');
		$this->db->from('tb_item');
		$this->db->where('status', 1);
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function Countgetitempaginationexpaired($filter, $search, $dateexpaired, $wh)
	{
		$data = array($dateexpaired, $wh);
		$query = "select count(*) as jumlah from tb_item as a
		left join tb_itemqtyexp as b on a.iditem = b.iditem
		left join common_detail as c on b.idwh = c.idcomm
		 where b.expdate <=? and c.attrib3=?";
		$query1 = $this->db->query($query, $data)->result_object();
		if (count($query1) > 0) {
			foreach ($query1 as $key) {
				$respon = $key->jumlah;
			}
			// return $query1;
		} else {
			$respon = 0;
		}
		return $respon;
	}

	function countitem()
	{
		$this->db->select('*');
		$this->db->from('tb_item');
		$query = $this->db->get()->num_rows();
		return $query;
	}

	// function lihat($sampai, $dari, $like = '')
	// {

	// 	if ($like)
	// 		$this->db->where($like);

	// 	$query = $this->db->get('tb_item', $sampai, $dari);
	// 	return $query->result_array();
	// }

	function jumlahitem($like = '')
	{
		if ($like)
			$this->db->where($like);

		$query = $this->db->get('tb_item');
		return $query->num_rows();
	}

	function importdatastockopname($item)
	{
		$jumlah = count($item);

		if ($jumlah > 0) {
			$this->db->replace('tb_item', $item);
		}
	}

	function getitemsn()
	{
		$query = "SELECT * FROM tb_item 
				left join tb_itemsn  on  tb_item.iditem = tb_itemsn.iditem 
				left join common_detail on  tb_item.itemtype = common_detail.idcomm ";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["pricebuyitem"] =  $key->pricebuyitem;
				$f["priceitem"] =  $key->priceitem;
				$f["VAT"] =  $key->VAT;
				$f["subprice"] =  $key->subprice;
				$f["status"] =  $key->status;
				$f["sku"] =  $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["namecomm"] =  $key->namecomm;
				$f["minstock"] =  $key->minstock;
				$f["expdate"] =  $key->expdate;
				$f["idsn"] =  $key->idsn;
				$f["idsn2"] =  $key->idsn2;

				$data = array($key->iditem);
				$queryx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qty"]  = $keyx->endqty - $keyx->qtyso;
						$f["qtyactual"]  = $keyx->endqty;
						$f["qtyso"]  = $keyx->qtyso;

						$f["idwh"]  = $keyx->idwh;


						$data3 = array($keyx->iditem);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $key->iditem)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$f["avgbuyitem"] = $key3->total;
							}
						} else {
							$f["avgbuyitem"] = 0;
						}

						$data1 = array($keyx->iditem, $keyx->idwh);
						$query1 = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ?";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						$f["data"] = array();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["endqty"] = $keyxx->endqty;

								if ($g["expdate"] < date('Y-m-d')) {
									$f["qty"] = $f['qty'] - $g["endqty"];
								}

								array_push($f["data"], $g);
							}
						} else {
							$f["data"] = "Not Found";
						}

						$data2 = array($keyx->iditem, $keyx->idwh);
						$query2 = "SELECT * FROM  tb_itemsn WHERE iditem = ? AND idwh = ?";
						$eksekusi2 = $this->db->query($query2, $data2)->result_object();
						$f["data1"] = array();
						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["idsn"] = $keyxx->idsn;
								$g["idsn2"] = $keyxx->idsn2;
								$g["idwh"] = $keyxx->idwh;
								$g["idsupp"] = $keyxx->idsupp;
								$g["hargabeli"] = $keyxx->hargabeli;



								array_push($f["data1"], $g);
							}
						} else {
							$f["data1"] = "Not Found";
						}
					}
				} else {
					$queryxy = "SELECT * FROM common_detail WHERE attrib3 = 'counter'";
					$eksekusixy = $this->db->query($queryxy)->result_object();
					if (count($eksekusixy) > 0) {
						foreach ($eksekusixy as $key) {
							$f["idwh"] = $key->idcomm;
						}
					}

					$f["qty"]  = 0;

					$f["qtyactual"]  = 0;
					$f["qtyso"]  = 0;
					$f["data"] = "Not Found";
				}

				// 



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function getitems()
	{
		$query = "SELECT  tb_item.iditem,tb_item.nameitem,tb_item.priceitem,tb_item.itemtype, tb_item.sku, tb_itemsn.*,common_detail.namecomm FROM tb_item, tb_itemsn, common_detail WHERE tb_item.iditem = tb_itemsn.iditem AND tb_itemsn.idsupp = common_detail.idcomm 
      				 ";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["priceitem"] =  $key->hargabeli;
				$f["sku"] =  $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["namesupp"] =  $key->namecomm;
				$f["idsn"] =  $key->idsn;
				$f["idsn2"] =  $key->idsn2;
				$f["expdate"] =  $key->expdate;

				$data = array($key->idwh);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["namewh"] = $keyx->namecomm;
					}
				}

				$data = array($key->itemtype);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["namecomm"] = $keyx->namecomm;
					}
				} else {
					$f["namecomm"] = "";
				}
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemstockhabis()
	{
		$query = "SELECT * FROM tb_item left join common_detail on  tb_item.itemtype = common_detail.idcomm ";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["pricebuyitem"] =  $key->pricebuyitem;
				$f["priceitem"] =  $key->priceitem;
				$f["VAT"]       =  $key->VAT;
				$f["subprice"]  =  $key->subprice;
				$f["status"]    =  $key->status;
				$f["sku"]       =  $key->sku;
				$f["itemtype"]  =  $key->itemtype;
				$f["namecomm"]  =  $key->namecomm;
				$f["minstock"]  =  $key->minstock;
				$f["maxstock"]  =  $key->maxstock;

				$data = array($key->iditem);
				$queryx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qty"]  = $keyx->endqty - $keyx->qtyso;
						$f["qtyactual"]  = $keyx->endqty;
						$f["qtyso"]  = $keyx->qtyso;

						$f["idwh"]  = $keyx->idwh;


						$data3 = array($keyx->iditem);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $key->iditem)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$f["avgbuyitem"] = $key3->total;
							}
						} else {
							$f["avgbuyitem"] = 0;
						}

						$data1 = array($keyx->iditem, $keyx->idwh);
						$query1 = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ?";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						$f["data"] = array();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["endqty"] = $keyxx->endqty;

								if ($g["expdate"] < date('Y-m-d')) {
									$f["qty"] = $f['qty'] - $g["endqty"];
								}

								array_push($f["data"], $g);
							}
						} else {
							$f["data"] = "Not Found";
						}

						$data2 = array($keyx->iditem, $keyx->idwh);
						$query2 = "SELECT * FROM  tb_itemsn WHERE iditem = ? AND idwh = ?";
						$eksekusi2 = $this->db->query($query2, $data2)->result_object();
						$f["data1"] = array();
						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["idsn"] = $keyxx->idsn;
								$g["idsn2"] = $keyxx->idsn2;
								$g["idwh"] = $keyxx->idwh;
								$g["idsupp"] = $keyxx->idsupp;



								array_push($f["data1"], $g);
							}
						} else {
							$f["data1"] = "Not Found";
						}
					}
				} else {
					$queryxy = "SELECT * FROM common_detail WHERE attrib3 = 'counter'";
					$eksekusixy = $this->db->query($queryxy)->result_object();
					if (count($eksekusixy) > 0) {
						foreach ($eksekusixy as $key) {
							$f["idwh"] = $key->idcomm;
						}
					}

					$f["qty"]  = 0;

					$f["qtyactual"]  = 0;
					$f["qtyso"]  = 0;
					$f["data"] = "Not Found";
				}

				// 



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function getitemsbydate($date1, $date2, $iditem)
	{
		$data1;
		$query;
		if ($iditem == "") {

			$data1 = array($date1, $date2);
			$query = "SELECT  tb_item.iditem,tb_item.nameitem,tb_item.priceitem,tb_item.itemtype, tb_item.sku, tb_itemsn.*,common_detail.namecomm FROM tb_item, tb_itemsn, common_detail WHERE tb_item.iditem = tb_itemsn.iditem AND tb_itemsn.idsupp = common_detail.idcomm AND tb_itemsn.expdate >= ? AND tb_itemsn.expdate <= ? 
      				 ";
		} else if ($date1 == "") {
			$data1 = array($iditem);
			$query = "SELECT  tb_item.iditem,tb_item.nameitem,tb_item.priceitem,tb_item.itemtype, tb_item.sku, tb_itemsn.*,common_detail.namecomm FROM tb_item, tb_itemsn, common_detail WHERE tb_item.iditem = tb_itemsn.iditem AND tb_itemsn.idsupp = common_detail.idcomm AND tb_item.iditem = ? 
      				 ";
		} else {
			$data1 = array($date1, $date2, $iditem);
			$query = "SELECT  tb_item.iditem,tb_item.nameitem,tb_item.priceitem,tb_item.itemtype, tb_item.sku, tb_itemsn.*,common_detail.namecomm FROM tb_item, tb_itemsn, common_detail WHERE tb_item.iditem = tb_itemsn.iditem AND tb_itemsn.idsupp = common_detail.idcomm AND tb_itemsn.expdate >= ? AND tb_itemsn.expdate <= ? AND tb_item.iditem = ?
      				 ";
		}

		$eksekusi = $this->db->query($query, $data1)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["priceitem"] =  $key->hargabeli;
				$f["sku"] =  $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["namesupp"] =  $key->namecomm;
				$f["idsn"] =  $key->idsn;
				$f["idsn2"] =  $key->idsn2;
				$f["expdate"] =  $key->expdate;

				$data = array($key->idwh);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["namewh"] = $keyx->namecomm;
					}
				}

				$data = array($key->itemtype);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["namecomm"] = $keyx->namecomm;
					}
				} else {
					$f["namecomm"] = "";
				}
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemwh()
	{
		$query = "SELECT * FROM tb_item left join common_detail on  tb_item.itemtype = common_detail.idcomm WHERE status=1";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["pricebuyitem"] =  $key->pricebuyitem;
				$f["priceitem"] =  $key->priceitem;
				$f["VAT"] =  $key->VAT;
				$f["subprice"] =  $key->subprice;
				$f["status"] =  $key->status;
				$f["sku"] =  $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["namecomm"] =  $key->namecomm;
				$f["minstock"] =  $key->minstock;
				$f["maxstock"] =  $key->maxstock;
				$f["usesn"] =  $key->usesn;
				$f["data1"] = array();

				$data = array($key->iditem);
				$queryx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'mainwarehouse'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qty"]  = $keyx->endqty - $keyx->qtyso;
						$f["qtyactual"]  = $keyx->endqty;
						$f["qtyso"]  = $keyx->qtyso;

						$f["idwh"]  = $keyx->idwh;

						$data3 = array($keyx->iditem);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $key->iditem)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$f["avgbuyitem"] = $key3->total;
							}
						} else {
							$f["avgbuyitem"] = 0;
						}

						$data1 = array($keyx->iditem, $keyx->idwh);
						$query1 = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ?";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						$f["data"] = array();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["endqty"] = $keyxx->endqty;

								if ($g["expdate"] < date('Y-m-d')) {
									$f["qty"] = $f['qty'] - $g["endqty"];
								}

								array_push($f["data"], $g);
							}
						} else {
							$f["data"] = "Not Found";
						}

						$data2 = array($keyx->iditem, $keyx->idwh);
						$query2 = "SELECT * FROM  tb_itemsn WHERE iditem = ? AND idwh = ?";
						$eksekusi2 = $this->db->query($query2, $data2)->result_object();

						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyxx) {
								$g["snid"] = $keyxx->snid;
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["idsn"] = $keyxx->idsn;
								$g["idsn2"] = $keyxx->idsn2;
								$g["idwh"] = $keyxx->idwh;
								$g["idsupp"] = $keyxx->idsupp;
								$g["hargabeli"] = $keyxx->hargabeli;
								$g["idpo"] = $keyxx->idpo;



								array_push($f["data1"], $g);
							}
						} else {
							$f["data1"] = "Not Found";
						}
					}
				} else {
					$f["qty"]  = 0;

					$f["qtyactual"]  = 0;
					$f["qtyso"]  = 0;
					$f["data"] = "Not Found";
					$f["avgbuyitem"] = 0;
				}
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemwhpaginate($filter, $search)
	{

		// $query = "SELECT * FROM tb_item left join common_detail on  tb_item.itemtype = common_detail.idcomm WHERE status=1";
		$data  = "";
		$query = "";
		if ($search != "") {
			$data = array($search);
			$query = "SELECT t.*  FROM (SELECT tb_item.iditem,tb_item.nameitem,tb_item.pricebuyitem,tb_item.priceitem,tb_item.VAT,tb_item.subprice,tb_item.status,tb_item.sku
			,tb_item.itemtype , common_detail.namecomm , tb_item.minstock, tb_item.maxstock,tb_item.usesn, 
			ROW_NUMBER() OVER (Order by tb_item.iditem) AS RowNumber FROM tb_item
            left join common_detail on  tb_item.itemtype = common_detail.idcomm AND tb_item.status=1)  AS t WHERE $filter ='$search'";
		} else {
			$data = array();
			$query = "SELECT t.*  FROM (SELECT tb_item.iditem,tb_item.nameitem,tb_item.pricebuyitem,tb_item.priceitem,tb_item.VAT,tb_item.subprice,tb_item.status,tb_item.sku
			,tb_item.itemtype , common_detail.namecomm , tb_item.minstock, tb_item.maxstock,tb_item.usesn, 
			ROW_NUMBER() OVER (Order by tb_item.iditem) AS RowNumber FROM tb_item
            left join common_detail on  tb_item.itemtype = common_detail.idcomm AND status=1)  AS t ";
		}


		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["pricebuyitem"] =  $key->pricebuyitem;
				$f["priceitem"] =  $key->priceitem;
				$f["VAT"] =  $key->VAT;
				$f["subprice"] =  $key->subprice;
				$f["status"] =  $key->status;
				$f["sku"] =  $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["namecomm"] =  $key->namecomm;
				$f["minstock"] =  $key->minstock;
				$f["maxstock"] =  $key->maxstock;
				$f["usesn"] =  $key->usesn;
				$f["data1"] = array();

				$data = array($key->iditem);
				$queryx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'mainwarehouse'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qty"]  = $keyx->endqty - $keyx->qtyso;
						$f["qtyactual"]  = $keyx->endqty;
						$f["qtyso"]  = $keyx->qtyso;

						$f["idwh"]  = $keyx->idwh;

						$data3 = array($keyx->iditem);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $key->iditem)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$f["avgbuyitem"] = $key3->total;
							}
						} else {
							$f["avgbuyitem"] = 0;
						}

						$data1 = array($keyx->iditem, $keyx->idwh);
						$query1 = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ?";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						$f["data"] = array();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["endqty"] = $keyxx->endqty;

								if ($g["expdate"] < date('Y-m-d')) {
									$f["qty"] = $f['qty'] - $g["endqty"];
								}

								array_push($f["data"], $g);
							}
						} else {
							$f["data"] = "Not Found";
						}

						$data2 = array($keyx->iditem, $keyx->idwh);
						$query2 = "SELECT * FROM  tb_itemsn WHERE iditem = ? AND idwh = ?";
						$eksekusi2 = $this->db->query($query2, $data2)->result_object();

						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyxx) {
								$g["snid"] = $keyxx->snid;
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["idsn"] = $keyxx->idsn;
								$g["idsn2"] = $keyxx->idsn2;
								$g["idwh"] = $keyxx->idwh;
								$g["idsupp"] = $keyxx->idsupp;
								$g["hargabeli"] = $keyxx->hargabeli;
								$g["idpo"] = $keyxx->idpo;



								array_push($f["data1"], $g);
							}
						} else {
							$f["data1"] = "Not Found";
						}
					}
				} else {
					$f["qty"]  = 0;

					$f["qtyactual"]  = 0;
					$f["qtyso"]  = 0;
					$f["data"] = "Not Found";
					$f["avgbuyitem"] = 0;
				}





				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function Countgetitemwh($filter, $search)
	{
		$this->db->select('*');
		$this->db->from('tb_item');
		$this->db->join('common_detail', 'tb_item.itemtype = common_detail.idcomm', 'left');
		if ($search != "") {
			$this->db->like($filter, $search);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getitemwhsn()
	{
		$query = "SELECT * FROM tb_item 
				left join common_detail on  tb_item.itemtype = common_detail.idcomm 
				left join tb_itemsn on  tb_item.iditem = tb_itemsn.iditem ";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["pricebuyitem"] =  $key->pricebuyitem;
				$f["priceitem"] =  $key->priceitem;
				$f["VAT"] =  $key->VAT;
				$f["subprice"] =  $key->subprice;
				$f["status"] =  $key->status;
				$f["sku"] =  $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["namecomm"] =  $key->namecomm;
				$f["minstock"] =  $key->minstock;
				$f["expdate"]  =  $key->expdate;
				$f["idsn"]     =  $key->idsn;
				$f["idsn2"]    =  $key->idsn2;

				$data = array($key->iditem);
				$queryx = "SELECT * FROM tb_item , tb_itemqty , common_detail WHERE tb_item.iditem = ? AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'mainwarehouse'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qty"]  = $keyx->endqty - $keyx->qtyso;
						$f["qtyactual"]  = $keyx->endqty;
						$f["qtyso"]  = $keyx->qtyso;

						$f["idwh"]  = $keyx->idwh;

						$data3 = array($keyx->iditem);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $key->iditem)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$f["avgbuyitem"] = $key3->total;
							}
						} else {
							$f["avgbuyitem"] = 0;
						}

						$data1 = array($keyx->iditem, $keyx->idwh);
						$query1 = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ?";
						$eksekusi1 = $this->db->query($query1, $data1)->result_object();
						$f["data"] = array();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["endqty"] = $keyxx->endqty;

								if ($g["expdate"] < date('Y-m-d')) {
									$f["qty"] = $f['qty'] - $g["endqty"];
								}

								array_push($f["data"], $g);
							}
						} else {
							$f["data"] = "Not Found";
						}

						$data2 = array($keyx->iditem, $keyx->idwh);
						$query2 = "SELECT * FROM tb_itemsn WHERE iditem = ? AND idwh = ?";
						$eksekusi2 = $this->db->query($query2, $data2)->result_object();
						$f["data1"] = array();
						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyxx) {
								$g["iditem"] = $keyxx->iditem;
								$g["expdate"] = $keyxx->expdate;
								$g["idsn"] = $keyxx->idsn;
								$g["idsn2"] = $keyxx->idsn2;
								$g["idwh"] = $keyxx->idwh;
								$g["idsupp"] = $keyxx->idsupp;
								$g["hargabeli"] = $keyxx->hargabeli;



								array_push($f["data1"], $g);
							}
						} else {
							$f["data1"] = "Not Found";
						}
					}
				} else {
					$f["qty"]  = 0;

					$f["qtyactual"]  = 0;
					$f["qtyso"]  = 0;
					$f["data"] = "Not Found";
					$f["avgbuyitem"] = 0;
				}

				// 



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsn($sn)
	{
		$data = array($sn, $sn);
		$query = "SELECT * FROM tb_itemsn,tb_item WHERE tb_itemsn.idsn <= ? AND tb_itemsn.idsn2 >= ? AND tb_itemsn.iditem = tb_item.iditem";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"]    = $key->iditem;
				$f["nameitem"]  = $key->nameitem;
				$f["priceitem"] = $key->hargabeli;
				$f["expdate"]   = $key->expdate;
				$f["sku"]       = $key->sku;
				$f["idsn"]      = $key->idsn;

				$datax = array($key->idwh);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["namewh"] = $keyx->namecomm;
					}
				}

				$datax = array($key->itemtype);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["namecomm"] = $keyx->namecomm;
					}
				} else {
					$f["namecomm"] = "";
				}

				$datax = array($key->idsupp);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["namesupp"] = $keyx->namecomm;
					}
				} else {
					$f["namesupp"] = "";
				}
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getoutsn()
	{
		$query     = "SELECT idsn , idsn2,iditem,snid FROM tb_dodetailsn WHERE status ='Sales'";
		$eksekusi  = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon1 = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] = $key->iditem;
				$f["snid"] = $key->snid;
				$f["idsn"] = $key->idsn;
				$f["idsn2"] = $key->idsn2;
				array_push($respon1, $f);
			}
		} else {
			$respon1 = "Not Found";
		}

		$query  = "SELECT idsn , idsn2, iditem,snid FROM paketdet";
		$eksekusi  = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon2 = array();
			foreach ($eksekusi as $key) {
				$f["snid"] = $key->snid;
				$f["iditem"] = $key->iditem;
				$f["idsn"] = $key->idsn;
				$f["idsn2"] = $key->idsn2;

				array_push($respon2, $f);
			}
		} else {
			$respon2 = "Not Found";
		}

		$query  = "SELECT idsn , idsn2,iditem,invinretdet.snid FROM invinretdet,invinret WHERE invinretdet.idinret = invinret.idinret AND invinret.typeinret = '1'";
		$eksekusi  = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon3 = array();
			foreach ($eksekusi as $key) {
				$f["snid"] = $key->snid;
				$f["iditem"] = $key->iditem;
				$f["idsn"] = $key->idsn;
				$f["idsn2"] = $key->idsn2;

				array_push($respon3, $f);
			}
		} else {
			$respon3 = "Not Found";
		}

		$respon = array();
		if ($respon1 != "Not Found") {
			foreach ($respon1 as $key) {
				$f["snid"] = $key["snid"];
				$f["iditem"] = $key["iditem"];
				$f["idsn"] = $key["idsn"];
				$f["idsn2"] = $key["idsn2"];
				$f["type"] = "Out Sales";

				array_push($respon, $f);
			}
		}
		if ($respon2 != "Not Found") {
			foreach ($respon2 as $key) {
				$f["snid"] = $key["snid"];
				$f["iditem"] = $key["iditem"];
				$f["idsn"] = $key["idsn"];
				$f["idsn2"] = $key["idsn2"];
				$f["type"] = "Out Paket";

				array_push($respon, $f);
			}
		}
		if ($respon3 != "Not Found") {
			foreach ($respon3 as $key) {
				$f["snid"] = $key["snid"];
				$f["iditem"] = $key["iditem"];
				$f["idsn"] = $key["idsn"];
				$f["idsn2"] = $key["idsn2"];
				$f["type"] = "Out Return Warehouse";

				array_push($respon, $f);
			}
		}
		if (count($respon) == 0) {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getsupplierpagination($sampai, $dari, $like = '')
	{
		// $query = "SELECT * FROM common_detail WHERE idgroup = '1'";
		if ($like)
			$this->db->where($like);

		$this->db->select('codecomm,namecomm,isactive,attrib1,attrib2')
			->from('common_detail')
			->where('idgroup', '1')
			->limit($sampai, $dari);
		$query = $this->db->get();
		return  $query->result_array();
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["isactive"] =  $key->isactive;
				$f["attrib1"] =  $key->attrib1;
				$f["attrib2"] =  $key->attrib2;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsupplier()
	{
		$query = "SELECT * FROM tb_supplier,tb_supplierdet WHERE tb_supplier.idsupp = tb_supplierdet.idsuppdet";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idsupp"] =  $key->idsupp;
				$f["codesupp"] =  $key->codesupp;
				$f["namesupp"] =  $key->namesupp;
				$f["namacontact"] =  $key->namacontact;
				$f["notelp"] =  $key->notelp;
				$f["norekening"] =  $key->norekening;
				$f["namabank"] =  $key->namabank;
				$f["beneficiary"] =  $key->beneficiary;
				$f["addressup"] =  $key->addressup;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function jumlahsupplier($like = '')
	{
		if ($like)
			$this->db->where($like);

		$query = $this->db->get('common_detail');
		return $query->num_rows();
	}

	function getunits()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '5'";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["isactive"] =  $key->isactive;


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getunitmaterial()
	{
		$query = "SELECT * FROM tb_unit";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idunit"]     =  $key->idunit;
				$f["nameunit"]   =  $key->nameunit;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function getcard()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '6'";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["attrib1"] =  $key->attrib1;
				$f["attrib2"] =  $key->attrib2;
				$f["isactive"] =  $key->isactive;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemtype()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '9'";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["attrib1"] =  $key->attrib1;
				$f["isactive"] =  $key->isactive;


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getunit()
	{
		$query = "SELECT * FROM tb_unit";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idunit"] =  $key->idunit;
				$f["nameunit"] =  $key->nameunit;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemnamelocation()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '12'";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemloc()
	{
		$query = "SELECT * FROM common_group a
		left join common_detail b on  a.idgroup = b.idgroup
		left join tb_item c on  b.idcomm = c.itemtype
		where b.idgroup = '12'";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"]   =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["attrib1"]  =  $key->attrib1;
				$f["attrib2"]  =  $key->attrib2;
				$f["attrib3"]  =  $key->attrib3;
				$f["attrib4"]  =  $key->attrib4;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitemlocupload()
	{
		$query = "SELECT * FROM common_group a
				  left join common_detail b on  a.idgroup = b.idgroup
		          where b.idgroup =12";

		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"]   =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["attrib1"]  =  $key->attrib1;
				$f["attrib2"]  =  $key->attrib2;
				$f["attrib3"]  =  $key->attrib3;
				$f["attrib4"]  =  $key->attrib4;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getuser()
	{
		$query = "SELECT * FROM tb_user, tb_role WHERE tb_user.role = tb_role.idrole";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iduser"] =  $key->iduser;
				$f["username"] =  $key->username;
				$f["email"] =  $key->email;
				$f["fullname"] =  $key->fullname;
				$f["address"] =  $key->address;
				$f["phone"] =  $key->phone;
				$f["isactive"] =  $key->isactive;
				$f["role"] =  $key->role;
				$f["namerole"] =  $key->namerole;



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getdatauser()
	{
		$query = "SELECT * FROM tb_user";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iduser"] =  $key->iduser;
				$f["username"] =  $key->username;
				$f["email"] =  $key->email;
				$f["fullname"] =  $key->fullname;
				$f["address"] =  $key->address;
				$f["phone"] =  $key->phone;
				$f["isactive"] =  $key->isactive;
				$f["role"] =  $key->role;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getdatausers()
	{
		$query    = "SELECT * FROM tb_user, tb_role,tb_warehouse WHERE tb_user.role = tb_role.idrole AND tb_user.idwarehouse = tb_warehouse.idwarehouse";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iduser"] =  $key->iduser;
				$f["username"] =  $key->username;
				$f["email"] =  $key->email;
				$f["fullname"] =  $key->fullname;
				$f["address"] =  $key->address;
				$f["phone"] =  $key->phone;
				$f["isactive"] =  $key->isactive;
				$f["role"] =  $key->role;
				$f["namerole"] =  $key->namerole;
				$f["namewarehouse"] =  $key->namewarehouse;



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function jumlahuser($like = '')
	{
		if ($like)
			$this->db->where($like);

		$query = $this->db->get('tb_user');
		return $query->num_rows();
	}

	function getwarehouse()
	{
		$query = "SELECT * FROM tb_warehouse";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idwarehouse"] =  $key->idwarehouse;
				$f["codewarehouse"] =  $key->codewarehouse;
				$f["namewarehouse"] =  $key->namewarehouse;
				$f["addresswarehouse"] =  $key->addresswarehouse;
				$f["phonewarehouse"] =  $key->phonewarehouse;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function gettypeorder()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '11' ORDER BY codecomm ASC";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] = $key->idcomm;
				$f["codecomm"] = $key->codecomm;
				$f["namecomm"] = $key->namecomm;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function getquotation()
	{
		$query    = "SELECT * FROM tb_quotation, common_detail WHERE  tb_quotation.idcust = common_detail.idcomm";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {

				$f["idquo"] = $key->idquo;
				$f["codequo"] = $key->codequo;
				$f["namequotation"] = $key->namequotation;
				$f["idcust"] = $key->idcust;
				$f["namecomm"] = $key->namecomm;
				$f["idcurrency"] = $key->idcurrency;
				$f["datequo"] = $key->datequo;
				$f["expquo"] = $key->expquo;
				$f["typequo"] = $key->typequo;
				$f["typepayment"] = $key->typepayment;
				$f["pricetotal"] = $key->pricetotal;
				$f["statusquo"] = $key->statusquo;
				$f["vat"] = $key->VAT;
				$f["totalquo"] = $key->totalquo;
				$f["norek"] = $key->norek;

				$f["delivdate"] = $key->delivdate;
				$f["discs"] = $key->disc;
				$f["delivaddr"] = $key->delivaddr;
				$f["moreinfo"] = $key->moreinfo;
				$f["address"] = $key->attrib1;

				$data = array($key->idquo);
				$queryx = "SELECT * FROM tb_quotationdetail,tb_item,common_detail,tb_itemqty WHERE tb_quotationdetail.idquo = ? AND tb_quotationdetail.iditem = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				$f["data"] = array();
				if (count($eksekusix) > 0) {

					foreach ($eksekusix as $keyx) {
						$g["idquodet"] = $keyx->idquodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["idwh"] = $keyx->idwh;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["qty"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->VAT;
						$g["totalprice"] = $keyx->totalprice;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				$datax = array($key->idcurrency);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["currency"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->statusquo);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusquo"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->typequo);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypequo"] = $keyx->namecomm;
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getquotationpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM tb_quotation, common_detail WHERE  tb_quotation.idcust = common_detail.idcomm";
		$data = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array($search, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_quotation.idquo,tb_quotation.codequo,tb_quotation.namequotation,tb_quotation.idcust,tb_quotation.idcurrency,tb_quotation.datequo,
		tb_quotation.expquo,tb_quotation.typequo,tb_quotation.typepayment,tb_quotation.pricetotal , common_detail.namecomm ,
		tb_quotation.statusquo, tb_quotation.VAT,tb_quotation.totalquo,tb_quotation.norek,tb_quotation.delivdate,tb_quotation.jasapengirim,
		tb_quotation.disc,tb_quotation.delivaddr,tb_quotation.moreinfo,common_detail.attrib1,
		ROW_NUMBER() OVER (Order by tb_quotation.idquo) AS RowNumber FROM tb_quotation left join common_detail on tb_quotation.idcust = common_detail.idcomm )  AS t WHERE  " . $filter . " = ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_quotation.idquo,tb_quotation.codequo,tb_quotation.namequotation,tb_quotation.idcust,tb_quotation.idcurrency,tb_quotation.datequo,
		tb_quotation.expquo,tb_quotation.typequo,tb_quotation.typepayment,tb_quotation.pricetotal , common_detail.namecomm ,
		tb_quotation.statusquo, tb_quotation.VAT,tb_quotation.totalquo,tb_quotation.norek,tb_quotation.delivdate,tb_quotation.jasapengirim,
		tb_quotation.disc,tb_quotation.delivaddr,tb_quotation.moreinfo,common_detail.attrib1,
		ROW_NUMBER() OVER (Order by tb_quotation.idquo) AS RowNumber FROM tb_quotation left join common_detail on tb_quotation.idcust = common_detail.idcomm where REPLACE(tb_quotation.datequo, ' ', '') >= ? AND REPLACE(tb_quotation.datequo, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_quotation.idquo,tb_quotation.codequo,tb_quotation.namequotation,tb_quotation.idcust,tb_quotation.idcurrency,tb_quotation.datequo,
		tb_quotation.expquo,tb_quotation.typequo,tb_quotation.typepayment,tb_quotation.pricetotal,tb_quotation.jasapengirim,common_detail.namecomm ,
		tb_quotation.statusquo, tb_quotation.VAT,tb_quotation.totalquo,tb_quotation.norek,tb_quotation.delivdate,
		tb_quotation.disc,tb_quotation.delivaddr,tb_quotation.moreinfo,common_detail.attrib1,
		ROW_NUMBER() OVER (Order by tb_quotation.idquo) AS RowNumber FROM tb_quotation left join common_detail on tb_quotation.idcust = common_detail.idcomm where statusquo = '$status')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_quotation.idquo,tb_quotation.codequo,tb_quotation.namequotation,tb_quotation.idcust,tb_quotation.idcurrency,tb_quotation.datequo,
		tb_quotation.expquo,tb_quotation.typequo,tb_quotation.typepayment,tb_quotation.pricetotal , common_detail.namecomm ,
		tb_quotation.statusquo, tb_quotation.VAT,tb_quotation.totalquo,tb_quotation.norek,tb_quotation.jasapengirim,tb_quotation.delivdate,
		tb_quotation.disc,tb_quotation.delivaddr,tb_quotation.moreinfo,common_detail.attrib1,
		ROW_NUMBER() OVER (Order by tb_quotation.idquo) AS RowNumber FROM tb_quotation left join common_detail on tb_quotation.idcust = common_detail.idcomm)  AS t WHERE $filter LIKE ? AND REPLACE(datequo, ' ', '') >= ? AND REPLACE(datequo, ' ', '') <= ? AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_quotation.idquo,tb_quotation.codequo,tb_quotation.namequotation,tb_quotation.idcust,tb_quotation.idcurrency,tb_quotation.datequo,
		tb_quotation.expquo,tb_quotation.typequo,tb_quotation.typepayment,tb_quotation.pricetotal , common_detail.namecomm ,
		tb_quotation.statusquo, tb_quotation.VAT,tb_quotation.totalquo,tb_quotation.norek,tb_quotation.delivdate,
		tb_quotation.disc,tb_quotation.delivaddr,tb_quotation.moreinfo,tb_quotation.jasapengirim,common_detail.attrib1,
		ROW_NUMBER() OVER (Order by tb_quotation.idquo) AS RowNumber FROM tb_quotation left join common_detail on tb_quotation.idcust = common_detail.idcomm)  AS t WHERE $filter LIKE ? AND statusquo='$search' AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_quotation.idquo,tb_quotation.codequo,tb_quotation.namequotation,tb_quotation.idcust,tb_quotation.idcurrency,tb_quotation.datequo,
		tb_quotation.expquo,tb_quotation.typequo,tb_quotation.typepayment,tb_quotation.pricetotal , common_detail.namecomm ,
		tb_quotation.statusquo, tb_quotation.VAT,tb_quotation.totalquo,tb_quotation.norek,tb_quotation.delivdate,
		tb_quotation.disc,tb_quotation.delivaddr,tb_quotation.moreinfo,tb_quotation.jasapengirim,common_detail.attrib1,
		ROW_NUMBER() OVER (Order by tb_quotation.idcust) AS RowNumber FROM tb_quotation left join common_detail on tb_quotation.idcust = common_detail.idcomm)  AS t WHERE $filter LIKE ? AND REPLACE(datequo, ' ', '') >= ? AND REPLACE(datequo, ' ', '') <= ? AND statusquo ='$status' AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_quotation.idquo,tb_quotation.codequo,tb_quotation.namequotation,tb_quotation.idcust,tb_quotation.idcurrency,tb_quotation.datequo,
			tb_quotation.expquo,tb_quotation.typequo,tb_quotation.typepayment,tb_quotation.pricetotal , common_detail.namecomm ,
			tb_quotation.statusquo, tb_quotation.VAT,tb_quotation.totalquo,tb_quotation.norek,tb_quotation.delivdate,
			tb_quotation.disc,tb_quotation.delivaddr,tb_quotation.moreinfo,tb_quotation.jasapengirim,common_detail.attrib1,
			ROW_NUMBER() OVER (Order by tb_quotation.idquo) AS RowNumber FROM tb_quotation,common_detail WHERE tb_quotation.idcust = common_detail.idcomm)  AS t 
			WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}
		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str      = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {

				$f["idquo"] = $key->idquo;
				$f["codequo"] = $key->codequo;
				$f["namequotation"] = $key->namequotation;
				$f["idcust"] = $key->idcust;
				$f["namecomm"] = $key->namecomm;
				$f["idcurrency"] = $key->idcurrency;
				$f["datequo"] = $key->datequo;
				$f["expquo"] = $key->expquo;
				$f["typequo"] = $key->typequo;
				$f["typepayment"] = $key->typepayment;
				$f["pricetotal"] = $key->pricetotal;
				$f["statusquo"] = $key->statusquo;
				$f["vat"] = $key->VAT;
				$f["totalquo"] = $key->totalquo;
				$f["norek"] = $key->norek;

				$f["delivdate"] = $key->delivdate;
				$f["jasapengirim"] = $key->jasapengirim;
				$f["discs"] = $key->disc;
				$f["delivaddr"] = $key->delivaddr;
				$f["moreinfo"] = $key->moreinfo;
				$f["address"] = $key->attrib1;

				$datay = array($f["idquo"]);
				$queryx = "SELECT * FROM tb_quotationdetail,tb_item,common_detail,tb_itemqty WHERE tb_quotationdetail.idquo = ? AND tb_quotationdetail.iditem = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
				$eksekusix = $this->db->query($queryx, $datay)->result_object();
				// $str      = $this->db->last_query();
				// echo "<pr>$str</pr>";
				$f["data"] = array();
				if (count($eksekusix) > 0) {

					foreach ($eksekusix as $keyx) {
						$g["idquodet"] = $keyx->idquodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["idwh"] = $keyx->idwh;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["qty"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->VAT;
						$g["totalprice"] = $keyx->totalprice;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				$datax = array($key->idcurrency);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["currency"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->statusquo);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusquo"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->typequo);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypequo"] = $keyx->namecomm;
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function countgetquotation($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_quotation');
		$this->db->join('common_detail', 'tb_quotation.idcust=common_detail.idcomm');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_quotation.datequo', $date1, $date2);
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('tb_quotation.statusquo', $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_quotation.datequo', $date1, $date2);
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('tb_quotation.statusquo', $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('tb_quotation.datequo', $date1, $date2, 'tb_quotation.statusquo', $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}
	function getquotationbydate($start, $finish)
	{
		$data = array($start, $finish);
		$query = "SELECT * FROM tb_quotation, common_detail WHERE tb_quotation.datequo >= ? AND tb_quotation.datequo <= ? AND tb_quotation.idcust = common_detail.idcomm";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {

				$f["idquo"] = $key->idquo;
				$f["codequo"] = $key->codequo;
				$f["namequotation"] = $key->namequotation;
				$f["idcust"] = $key->idcust;
				$f["namecomm"] = $key->namecomm;
				$f["idcurrency"] = $key->idcurrency;
				$f["datequo"] = $key->datequo;
				$f["expquo"] = $key->expquo;
				$f["typequo"] = $key->typequo;
				$f["typepayment"] = $key->typepayment;
				$f["pricetotal"] = $key->pricetotal;
				$f["statusquo"] = $key->statusquo;
				$f["vat"] = $key->VAT;
				$f["totalquo"] = $key->totalquo;
				$f["norek"] = $key->norek;

				$f["delivdate"] = $key->delivdate;
				$f["discs"] = $key->disc;
				$f["delivaddr"] = $key->delivaddr;
				$f["moreinfo"] = $key->moreinfo;
				$f["address"] = $key->attrib1;

				$data = array($key->idquo);
				$queryx = "SELECT * FROM tb_quotationdetail,tb_item,common_detail,tb_itemqty WHERE tb_quotationdetail.idquo = ? AND tb_quotationdetail.iditem = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
				$eksekusix = $this->db->query($queryx, $data)->result_object();
				$f["data"] = array();
				if (count($eksekusix) > 0) {

					foreach ($eksekusix as $keyx) {
						$g["idquodet"] = $keyx->idquodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["idwh"] = $keyx->idwh;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["qty"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->VAT;
						$g["totalprice"] = $keyx->totalprice;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				$datax = array($key->idcurrency);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["currency"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->statusquo);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusquo"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->typequo);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypequo"] = $keyx->namecomm;
					}
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}



	function getsalesorder()
	{
		$query = "SELECT * FROM tb_salesorder";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	// function getsalesorder()
	// {
	// 	$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm ORDER BY tb_salesorder.codeso ASC";
	// 	$eksekusi = $this->db->query($query)->result_object();
	// 	if (count($eksekusi) > 0) {
	// 		$respon = array();
	// 		foreach ($eksekusi as $key) {
	// 			$f["idso"] = $key->idso;
	// 			$f["codeso"] = $key->codeso;
	// 			$f["dateso"] = $key->dateso;
	// 			$f["namecomm"] = $key->namecomm;
	// 			$f["typeso"] = $key->typeso;
	// 			$f["delivaddr"] = $key->delivaddr;
	// 			$f["totalso"] = $key->totalso;
	// 			$f["totalprice"] = $key->totalprice;
	// 			$f["delivdate"] = $key->delivdate;
	// 			$f["nopesanan"] = $key->nopesanan;

	// 			$dataxx = array($key->statusorder);
	// 			$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
	// 			$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
	// 			if (count($eksekusixx) > 0) {
	// 				foreach ($eksekusixx as $keyx) {
	// 					$f["statusorder"] = $keyx->namecomm;
	// 				}
	// 			}


	// 			$dataxx = array($key->typeso);
	// 			$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
	// 			$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
	// 			if (count($eksekusixx) > 0) {
	// 				foreach ($eksekusixx as $keyx) {
	// 					$f["nametypeso"] = $keyx->namecomm;
	// 				}
	// 			}

	// 			$data3 = array($key->idso);
	// 			$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail,invinret WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem 
	// 			AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND tb_salesorderdetail.idso = invinret.idso AND common_detail.attrib3 ='counter' ";
	// 			$eksekusi3 = $this->db->query($query3, $data3)->result_object();
	// 			if (count($eksekusi3) > 0) {
	// 				$f["data"] = array();
	// 				foreach ($eksekusi3 as $keyx) {
	// 					$g["idsodet"] = $keyx->idsodet;
	// 					$g["iditem"] = $keyx->iditem;
	// 					$g["nameitem"] = $keyx->nameitem;
	// 					$g["qty"] = $keyx->qty;
	// 					$g["qtyactual"] = $keyx->endqty;
	// 					$g["price"] = $keyx->price;
	// 					$g["disc"] = $keyx->disc;
	// 					$g["vat"] = $keyx->vat;
	// 					$g["totalprice"] = $keyx->totalprice;
	// 					$g["pricebuyitem"] = $keyx->pricebuyitem;
	// 					$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
	// 					$g["sku"] = $keyx->sku;
	// 					$g["qtyinret"] = $keyx->qtyinret;

	// 					array_push($f["data"], $g);
	// 				}
	// 			} else {
	// 				$data3 = array($key->idso);
	// 				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem  ";
	// 				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
	// 				if (count($eksekusi3) > 0) {
	// 					$f["data"] = array();
	// 					foreach ($eksekusi3 as $keyx) {
	// 						$g["idsodet"] = $keyx->idsodet;
	// 						$g["iditem"] = $keyx->iditem;
	// 						$g["nameitem"] = $keyx->nameitem;
	// 						$g["qty"] = $keyx->qty;
	// 						$g["qtyactual"] = 0;
	// 						$g["price"] = $keyx->price;
	// 						$g["disc"] = $keyx->disc;
	// 						$g["vat"] = $keyx->vat;
	// 						$g["totalprice"] = $keyx->totalprice;
	// 						$g["pricebuyitem"] = $keyx->pricebuyitem;
	// 						$g["qtyready"] = 0;
	// 						$g["sku"] = $keyx->sku;

	// 						array_push($f["data"], $g);
	// 					}
	// 				} else {
	// 					$f["data"] = "Not Found";
	// 				}
	// 			}


	// 			array_push($respon, $f);
	// 		}
	// 	} else {
	// 		$respon = "Not Found";
	// 	}

	// 	return $respon;
	// }


	function getinvinret()
	{
		$query = "select * from tb_salesorder left join invinret on tb_salesorder.idso = invinret.idso";
		$eksekusi = $this->db->query($query)->result_object();
	}




	function countsalesbook($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust=common_detail.idcomm', 'left');
		$this->db->where('statusorder=', 'Finish');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		} else if ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('tb_salesorder.statusorder =', ".$status.");
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getsalesorderpending()
	{
		$query = "SELECT * FROM tb_salesorder,common_detail,tb_salesorderdetail,tb_item WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorderdetail.idso = tb_salesorder.idso AND tb_salesorderdetail.iditem = tb_item.iditem AND tb_salesorder.statusorder = 'Pending'";
		$eksekusi = $this->db->query($query)->result_object();
		// $str = $this->db->last_query();
		// echo ($str);
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				// $f["sku"] = $key->sku;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;
				$f["jasapengirim"] = $key->jasapengirim;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}

				$queryxxs = "SELECT * FROM tb_salesorder,common_detail,tb_salesorderdetail,tb_item WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorderdetail.idso = tb_salesorder.idso AND tb_salesorderdetail.iditem = tb_item.iditem AND tb_salesorder.statusorder = 'Pending' ";
				$eksekusixs = $this->db->query($queryxxs)->result_object();
				if (count($eksekusixs) > 0) {
					foreach ($eksekusixs as $keyx) {
						$f["sku"] = $keyx->sku;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail,invinret WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem 
				AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND tb_salesorderdetail.idso = invinret.idso AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;
						$g["qtyinret"] = $keyx->qtyinret;

						array_push($f["data"], $g);
					}
				} else {
					$data3 = array($key->idso);
					$query3 = "SELECT * FROM tb_salesorderdetail, tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem  ";
					$eksekusi3 = $this->db->query($query3, $data3)->result_object();
					if (count($eksekusi3) > 0) {
						$f["data"] = array();
						foreach ($eksekusi3 as $keyx) {
							$g["idsodet"] = $keyx->idsodet;
							$g["iditem"] = $keyx->iditem;
							$g["nameitem"] = $keyx->nameitem;
							$g["qty"] = $keyx->qty;
							$g["qtyactual"] = 0;
							$g["price"] = $keyx->price;
							$g["disc"] = $keyx->disc;
							$g["vat"] = $keyx->vat;
							$g["totalprice"] = $keyx->totalprice;
							$g["pricebuyitem"] = $keyx->pricebuyitem;
							$g["qtyready"] = 0;
							$g["sku"] = $keyx->sku;

							array_push($f["data"], $g);
						}
					} else {
						$f["data"] = "Not Found";
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderfinish()
	{
		$query = "SELECT * FROM tb_salesorder,common_detail,tb_salesorderdetail,tb_item WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorderdetail.idso = tb_salesorder.idso AND tb_salesorderdetail.iditem = tb_item.iditem AND tb_salesorder.statusorder = 'Finish'";
		$eksekusi = $this->db->query($query)->result_object();
		// $str = $this->db->last_query();
		// echo ($str);
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				// $f["sku"] = $key->sku;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;
				$f["jasapengirim"] = $key->jasapengirim;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}

				$queryxxs = "SELECT * FROM tb_salesorder,common_detail,tb_salesorderdetail,tb_item WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorderdetail.idso = tb_salesorder.idso AND tb_salesorderdetail.iditem = tb_item.iditem AND tb_salesorder.statusorder = 'Pending' ";
				$eksekusixs = $this->db->query($queryxxs)->result_object();
				if (count($eksekusixs) > 0) {
					foreach ($eksekusixs as $keyx) {
						$f["sku"] = $keyx->sku;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail,invinret WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem 
				AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND tb_salesorderdetail.idso = invinret.idso AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;
						$g["qtyinret"] = $keyx->qtyinret;

						array_push($f["data"], $g);
					}
				} else {
					$data3 = array($key->idso);
					$query3 = "SELECT * FROM tb_salesorderdetail, tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem  ";
					$eksekusi3 = $this->db->query($query3, $data3)->result_object();
					if (count($eksekusi3) > 0) {
						$f["data"] = array();
						foreach ($eksekusi3 as $keyx) {
							$g["idsodet"] = $keyx->idsodet;
							$g["iditem"] = $keyx->iditem;
							$g["nameitem"] = $keyx->nameitem;
							$g["qty"] = $keyx->qty;
							$g["qtyactual"] = 0;
							$g["price"] = $keyx->price;
							$g["disc"] = $keyx->disc;
							$g["vat"] = $keyx->vat;
							$g["totalprice"] = $keyx->totalprice;
							$g["pricebuyitem"] = $keyx->pricebuyitem;
							$g["qtyready"] = 0;
							$g["sku"] = $keyx->sku;

							array_push($f["data"], $g);
						}
					} else {
						$f["data"] = "Not Found";
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderpendingpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		$data = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
			,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm, 
			ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail 
			WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder = 'Pending' AND LOWER($filter) LIKE LOWER(?))  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm, 
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail 
		WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder = 'Pending' AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm, 
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail 
		WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder = 'Pending' AND statusorder = '$status')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm, 
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail 
		WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder = 'Pending' AND LOWER($filter) LIKE LOWER(?) AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm, 
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail 
		WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder = 'Pending' AND LOWER($filter) LIKE LOWER(?) AND statusorder = '$status')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $status, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm, 
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail 
		WHERE tb_salesorder.idcust = common_detail.idcomm AND  tb_salesorder.statusorder = 'Pending' AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ? AND statusorder =?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $status, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
		,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm, 
		ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail 
		WHERE tb_salesorder.idcust = common_detail.idcomm AND  tb_salesorder.statusorder = 'Pending' AND LOWER($filter) LIKE LOWER(?) AND REPLACE(tb_salesorder.dateso, ' ', '') >= ? AND REPLACE(tb_salesorder.dateso, ' ', '') <= ? AND statusorder =?)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.* FROM (SELECT tb_salesorder.idso,tb_salesorder.codeso,tb_salesorder.dateso,tb_salesorder.typeso,tb_salesorder.delivaddr,tb_salesorder.totalso,tb_salesorder.totalprice
			   ,tb_salesorder.delivdate , tb_salesorder.nopesanan , tb_salesorder.statusorder,tb_salesorder.jasapengirim, common_detail.namecomm,
			   ROW_NUMBER() OVER (Order by tb_salesorder.codeso) AS RowNumber FROM tb_salesorder,common_detail  
			   WHERE tb_salesorder.idcust = common_detail.idcomm AND  tb_salesorder.statusorder = 'Pending')  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo ($str);
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;
				$f["jasapengirim"] = $key->jasapengirim;
				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail,invinret WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem 
				AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND tb_salesorderdetail.idso = invinret.idso AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;
						$g["qtyinret"] = $keyx->qtyinret;

						array_push($f["data"], $g);
					}
				} else {
					$data3 = array($key->idso);
					$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem 
					AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm  AND common_detail.attrib3 ='counter' ";
					$eksekusi3 = $this->db->query($query3, $data3)->result_object();
					if (count($eksekusi3) > 0) {
						$f["data"] = array();
						foreach ($eksekusi3 as $keyx) {
							$g["idsodet"] = $keyx->idsodet;
							$g["iditem"] = $keyx->iditem;
							$g["nameitem"] = $keyx->nameitem;
							$g["qty"] = $keyx->qty;
							$g["qtyactual"] = 0;
							$g["price"] = $keyx->price;
							$g["disc"] = $keyx->disc;
							$g["vat"] = $keyx->vat;
							$g["totalprice"] = $keyx->totalprice;
							$g["pricebuyitem"] = $keyx->pricebuyitem;
							$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
							$g["sku"] = $keyx->sku;

							array_push($f["data"], $g);
						}
					} else {

						$f["data"] = "Not Found";
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function countAllSalesorderPending($filter, $search, $date1, $date2)
	{

		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust = common_detail.idcomm', 'left');
		$this->db->where('statusorder', 'Pending');
		$this->db->order_by('codeso', 'asc');
		if ($search != "" && $date1 == "" && $date2 == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		} elseif ($search != "" && $date1 != "" && $date2 != "") {
			$this->db->where('tb_salesorder.dateso', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getsalesorderinvoicepaginate($start, $limit)
	{
		$this->db->select('*');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust = common_detail.idcomm');
		$this->db->limit($start, $limit);

		$eksekusi = $this->db->get()->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail,invinret WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem 
				AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND tb_salesorderdetail.idso = invinret.idso AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;
						$g["qtyinret"] = $keyx->qtyinret;

						array_push($f["data"], $g);
					}
				} else {
					$data3 = array($key->idso);
					$query3 = "SELECT * FROM tb_salesorderdetail, tb_item WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem  ";
					$eksekusi3 = $this->db->query($query3, $data3)->result_object();
					if (count($eksekusi3) > 0) {
						$f["data"] = array();
						foreach ($eksekusi3 as $keyx) {
							$g["idsodet"] = $keyx->idsodet;
							$g["iditem"] = $keyx->iditem;
							$g["nameitem"] = $keyx->nameitem;
							$g["qty"] = $keyx->qty;
							$g["qtyactual"] = 0;
							$g["price"] = $keyx->price;
							$g["disc"] = $keyx->disc;
							$g["vat"] = $keyx->vat;
							$g["totalprice"] = $keyx->totalprice;
							$g["pricebuyitem"] = $keyx->pricebuyitem;
							$g["qtyready"] = 0;
							$g["sku"] = $keyx->sku;

							array_push($f["data"], $g);
						}
					} else {
						$f["data"] = "Not Found";
					}
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function getsalesorderbydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm AND REPLACE(tb_salesorder.dateso, ' ', '') = ? ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo $str;
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["subtotal"] = $key->subtotal;
				$f["discs"] = $key->disc;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;
				$f["jasapengirim"] = $key->jasapengirim;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderwaitingbydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder='Waiting' AND REPLACE(tb_salesorder.dateso, ' ', '') = ? ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["subtotal"] = $key->subtotal;
				$f["discs"] = $key->disc;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderpendingbydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder='Pending' AND REPLACE(tb_salesorder.dateso, ' ', '') = ? ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["subtotal"] = $key->subtotal;
				$f["discs"] = $key->disc;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderProcessbydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder='Process' AND REPLACE(tb_salesorder.dateso, ' ', '') = ? ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["subtotal"] = $key->subtotal;
				$f["discs"] = $key->disc;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesordercancelbydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder='Cancel' AND REPLACE(tb_salesorder.dateso, ' ', '') = ? ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["subtotal"] = $key->subtotal;
				$f["discs"] = $key->disc;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderfinishbydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.statusorder='Finish' AND REPLACE(tb_salesorder.dateso, ' ', '') = ? ORDER BY tb_salesorder.codeso ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["typeso"] = $key->typeso;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprice"] = $key->totalprice;
				$f["subtotal"] = $key->subtotal;
				$f["discs"] = $key->disc;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;

				$dataxx = array($key->statusorder);
				$queryxx = "SELECT * FROM common_detail WHERE namecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["statusorder"] = $keyx->namecomm;
					}
				}


				$dataxx = array($key->typeso);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypeso"] = $keyx->namecomm;
					}
				}


				$data3 = array($key->idso);
				$query3 = "SELECT * FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["qtyactual"] = $keyx->endqty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["vat"] = $keyx->vat;
						$g["totalprice"] = $keyx->totalprice;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getquotationbydates($finish)
	{
		// $data = date('Y-m-d');
		$datax = array($finish);
		$query = "SELECT * FROM tb_quotation,common_detail WHERE tb_quotation.statusquo = common_detail.namecomm AND common_detail.namecomm = 'Waiting' AND REPLACE(tb_quotation.datequo, ' ', '') = ?";
		$eksekusi = $this->db->query($query, $datax)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idquo"] = $key->idquo;
				$f["codequo"] = $key->codequo;
				$f["datequo"] = $key->datequo;
				$f["statusquo"] = $key->namecomm;
				$f["typequo"] = $key->typequo;
				$f["namequotation"] = $key->namequotation;
				$f["pricetotal"] = $key->pricetotal;
				$f["datequo"] = $key->datequo;
				$f["totalquo"] = $key->totalquo;
				$f["VAT"] = $key->VAT;
				$f["norek"] = $key->norek;
				$f["delivdate"] = $key->delivdate;
				$f["delivaddr"] = $key->delivaddr;
				$f["disc"] = $key->disc;
				$f["address"] = $key->attrib1;
				$datax = array($key->idcurrency);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["currency"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idcust);
				$queryxx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["namecomm"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->typequo);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypequo"] = $keyx->namecomm;
					}
				}
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getlistpobydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM po WHERE REPLACE(po.datepo, ' ', '') = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepo"]	= $key->codepo;
				$f["datepo"]	= $key->datepo;
				$f["totalpo"]	= $key->totalpo;
				$f["statuspo"]	= $key->statuspo;
				$f['idpo']		= $key->idpo;

				$data = array($f["idpo"]);
				$query1 = "SELECT *, podet.price AS prices FROM podet, tb_item  WHERE podet.idpo = ? AND podet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["sku"] = $keyx->sku;
						$g["qty"] = $keyx->qty;
						$g["qtyin"] = $keyx->qty;
						$g["pph"] = $keyx->pph;
						$g["price"] = $keyx->prices;
						$g["discrp"] = $keyx->discrp;
						$g["grand"] = $keyx->subpo;

						$data3 = array($f["idpo"], $g["iditem"]);
						$query2 = "SELECT SUM(qty) AS qty FROM invinretdet WHERE idpo = ? AND iditem = ?";
						$eksekusi2 = $this->db->query($query2, $data3)->result_object();
						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyy) {
								if ($keyy->qty != null) {
									$g["qtyret"] = $keyy->qty;
								} else {
									$g["qtyret"] = "0.0000";
								}
							}
						} else {
							$g["qtyret"] = "0.0000";
						}

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				$data2 = array($f["idpo"]);
				$query1 = "SELECT * FROM invinret WHERE idpo = ?";
				$eksekusi1 = $this->db->query($query1, $data2)->result_object();
				if (count($eksekusi1) > 0) {

					foreach ($eksekusi1 as $keyx) {
						$f["itemret"] = $keyx->iteminret;
					}
				} else {
					$f["itemret"] = 0;
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistpo()
	{
		$query = "SELECT * FROM po AS a 
		INNER JOIN podet AS b ON a.idpo = b.idpodet WHERE qtypo !=qtyin AND qtyin < qtypo";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpo"]	    = $key->idpo;
				$f["codepo"]	    = $key->codepo;
				$f["datepo"]	    = $key->datepo;
				$f["qty"]	        = $key->qty;
				$f["price"]	        = $key->price;
				$f["grandtotal"]	    = $key->grandtotal;
				$f["delivedate"]	    = $key->delivedate;
				$f["qtypo"]	    = $key->qtypo;
				$f["qtyin"]	    = $key->qtyin;
				$f["statuspo"]	    = $key->statuspo;
				$f["expiredate"]	= $key->expiredate;
				$data = array($f["idpo"]);
				$query1 = "SELECT * FROM podet, tb_item  WHERE podet.idpo = ? AND podet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"]  = $keyx->nameitem;
						$g["sku"]       = $keyx->sku;
						$g["price"]     = $keyx->price;
						$g["itemgroup"] = $keyx->itemgroup;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistpodetail($codepo, $namesupp, $filter, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM po AS a INNER JOIN podet AS b ON a.idpo = b.idpo INNER JOIN tb_item AS c ON b.iditem = c.iditem INNER JOIN tb_supplier AS d ON a.idsupp = d.idsupp INNER JOIN tb_user AS e ON a.madeuser = e.iduser";
		$data = "";
		$query = "";

		if ($codepo != "" && $namesupp == "" && $date1 == "" && $date2 == "" && $status == "") {
			$data  = array("%" . $codepo . "%");
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE codepo like ?";

			// 			
		} elseif ($codepo == "" && $namesupp != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data  = array($namesupp);
			$query = "SELECT * FROM po AS a 
			 INNER JOIN podet AS b ON a.idpo = b.idpodet
			 INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			 INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			 WHERE namesupp = ?";
		} elseif ($codepo == "" && $namesupp == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array($date1, $date2);
			$query = "SELECT * FROM po AS a 
				INNER JOIN podet AS b ON a.idpo = b.idpodet
				INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
				INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
				WHERE REPLACE(a.$filter, ' ', '') >= ? AND REPLACE(a.$filter, ' ', '') <= ?";
		} elseif ($codepo == "" && $namesupp == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array($date1, $date2);
			$query = "SELECT * FROM po AS a 
				INNER JOIN podet AS b ON a.idpo = b.idpodet
				INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
				INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
				WHERE REPLACE(a.$filter, ' ', '') >= ? AND REPLACE(a.$filter, ' ', '') <= ?";
		} elseif ($codepo == "" && $namesupp == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array($status);
			$query = "SELECT * FROM po AS a 
				INNER JOIN podet AS b ON a.idpo = b.idpodet
				INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
				INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
				WHERE statuspo = ? ";
		} else if ($codepo != "" && $namesupp != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data  = array("%" . $codepo . "%", $namesupp);
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE codepo like ? AND namesupp = ?";
		} else if ($codepo != "" && $namesupp == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array("%" . $codepo . "%", $date1, $date2);
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE codepo like ? AND REPLACE(a.$filter, ' ', '') >= ? AND REPLACE(a.$filter, ' ', '') <= ?";
		} else if ($codepo != "" && $namesupp == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array("%" . $codepo . "%", $status);
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE codepo like ? AND statuspo = ?";
		} else if ($codepo == "" && $namesupp != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array($namesupp, $date1, $date2);
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE namesupp = ? AND REPLACE(a.$filter, ' ', '') >= ? AND REPLACE(a.$filter, ' ', '') <= ?";
		} else if ($codepo == "" && $namesupp != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array($namesupp, $status);
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE namesupp = ? AND statuspo = ?";
		} else if ($codepo == "" && $namesupp == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array($date1, $date2, $status);
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE REPLACE(a.$filter, ' ', '') >= ? AND REPLACE(a.$filter, ' ', '') <= ? AND statuspo = ?";
		} else if ($codepo != "" && $namesupp != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array("%" . $codepo . "%", $namesupp, $date1, $date2, $status);
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm
			WHERE codepo like ? AND namesupp = ? AND REPLACE(a.$filter, ' ', '') >= ? AND REPLACE(a.$filter, ' ', '') <= ? AND statuspo = ?";
		} else {
			$data  = array();
			$query = "SELECT * FROM po AS a 
			INNER JOIN podet AS b ON a.idpo = b.idpodet 
			INNER JOIN tb_supplier AS c ON a.idsupp = c.idsupp 
			INNER JOIN common_detail AS d ON a.idcurr = d.idcomm";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// echo ($this->db->last_query());
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpo"]	    = $key->idpo;
				$f["codepo"]	    = $key->codepo;
				$f["datepo"]	    = $key->datepo;
				$f["namesupp"]	    = $key->namesupp;
				$f["datepo"]	    = $key->datepo;
				$f["delivedate"]	= $key->delivedate;
				$f["price"]      	= $key->price;
				$f["namecomm"]      = $key->namecomm;
				$f["vat"]      	    = $key->vat;
				$f["grandtotal"]    = $key->grandtotal;
				$f["statuspo"]      = $key->statuspo;
				$f["qtypo"]         = $key->qtypo;
				$f["qtyin"]         = $key->qtyin;

				if ($f["qtyin"] == 0) {
					$f["statuspo"] = "Waiting";
				} else if ($f["qtyin"] != 0 && $f["qtyin"] < $f["qtypo"]) {
					$f["statuspo"] = "Process";
				} else {
					$f["statuspo"] = "Finish";
				}

				$data = array($f["idpo"]);
				$query1 = "SELECT * FROM podet, tb_item  WHERE podet.idpo = ? AND podet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"]  = $keyx->nameitem;
						$g["sku"]       = $keyx->sku;
						$g["price"] = $keyx->price;
						$g["deskripsi"] = $keyx->deskripsi;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistpoheader()
	{
		$query = "SELECT * FROM po WHERE qtypo !=qtyin AND qtyin < qtypo";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpo"]	        = $key->idpo;
				$f["codepo"]	    = $key->codepo;
				$f["datepo"]	    = $key->datepo;
				$f["qtypo"]	        = $key->qtypo;

				$data = array($f["idpo"]);
				$query1 = "SELECT * FROM podet,tb_item  WHERE podet.idpodet = ? AND podet.iditem = tb_item.iditem";
				$eksekusi1 = $this->db->query($query1, $data)->result_object();
				if (count($eksekusi1) > 0) {
					$f["data"] = array();
					foreach ($eksekusi1 as $keyx) {
						$g["idpodet"]   = $keyx->idpodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"]  = $keyx->nameitem;
						$g["sku"]       = $keyx->sku;
						$g["price"] = $keyx->price;

						array_push($f["data"], $g);
					}
				} else {
					$f["data"] = "Not Found";
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readheaderpo($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT * from po WHERE idpo = ?";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpo"]   	= $key->idpo;
				$f["codepo"]	= $key->codepo;
				$f["idcurr"]	= $key->idcurr;
				$f["datepo"]	= $key->datepo;
				$f["qtypo"]   	= $key->qtypo;
				$f["qtyin"]   	= $key->qtyin;
				$f["statuspo"]	= $key->statuspo;
				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailposum($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem,a.idunit,qty,b.expiredate,b.iditem,a.deskripsi FROM  (SELECT idpo,iditem,MAX(idpodet) AS idpodet,SUM(qty) AS qty,qtyindet,expiredate FROM podet 
				  WHERE idpo = ?
				  GROUP BY idpo,iditem ) AS b
				  INNER JOIN tb_item AS a ON b.iditem=a.iditem
				  ORDER BY idpodet";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	    = $urut;
				$f["idpo"]	        = $key->idpo;
				$f["idpodet"]	    = $key->idpodet;
				$f["iditem"]	    = $key->iditem;
				$f["sku"]	        = $key->sku;
				$f["nameitem"]	    = $key->nameitem;
				$f["idunit"]	    = $key->idunit;
				$f["deskripsi"]	    = $key->deskripsi;
				$f["qty"]	        = $key->qty - $key->qtyindet;
				$f["expiredate"]	= $key->expiredate;
				$f["qtystd"]	    = $f["qty"];

				$datax = array($f["iditem"], $f["idpo"]);
				$queryx = "SELECT * FROM podet WHERE iditem = ? AND idpo = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["price"] = $keyx->price;
						$f["subpo"] = $keyx->subpo;
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistinvin()
	{
		$query = "SELECT * FROM invin";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idin"]	    = $key->idin;
				$f["idpo"]  	    = $key->idpo;
				$f["codein"]	    = $key->codein;
				$f["datein"]	    = $key->datein;
				$f["typein"]	    = $key->typein;
				$f["status"]	    = $key->status;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistinvindet($namewarehouse, $tipein, $namesupp, $date1, $date2, $nameitem)
	{
		$data = "";
		$query = "";

		if ($namewarehouse != "" && $tipein == "" && $namesupp == "" && $date1 == "" && $date2 == "" && $nameitem == "") {
			$data  = array($namewarehouse);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namewarehouse = ?";
		} else if ($namewarehouse == "" && $tipein != "" && $namesupp == "" && $date1 == "" && $date2 == "" && $nameitem == "") {
			$data  = array($tipein);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND typein = ?";
		} else if ($namewarehouse == "" && $tipein == "" && $namesupp != "" && $date1 == "" && $date2 == "" && $nameitem == "") {
			$data  = array($namesupp);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namesupp = ?";
		} else if ($namewarehouse == "" && $tipein == "" && $namesupp == "" && $date1 != "" && $date2 != "" && $nameitem == "") {
			$data  = array($date1, $date2);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND REPLACE(datein, ' ', '') >= ? 
			AND REPLACE(datein, ' ', '') <= ?";
		} else if ($namewarehouse == "" && $tipein == "" && $namesupp == "" && $date1 == "" && $date2 == "" && $nameitem != "") {
			$data  = array("%" . $nameitem . "%");
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND nameitem like ?";
		} else if ($namewarehouse != "" && $tipein != "" && $namesupp == "" && $date1 == "" && $date2 == "" && $nameitem == "") {
			$data  = array($namewarehouse, $tipein);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namewarehouse = ? AND typein = ? ";
		} else if ($namewarehouse != "" && $tipein == "" && $namesupp != "" && $date1 == "" && $date2 == "" && $nameitem == "") {
			$data  = array($namewarehouse, $namesupp);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namewarehouse = ? AND namesupp = ? ";
		} else if ($namewarehouse != "" && $tipein == "" && $namesupp == "" && $date1 != "" && $date2 != "" && $nameitem == "") {
			$data  = array($namewarehouse, $date1, $date2);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namewarehouse = ? AND REPLACE(datein, ' ', '') >= ? 
			AND REPLACE(datein, ' ', '') <= ? ";
		} else if ($namewarehouse != "" && $tipein == "" && $namesupp == "" && $date1 == "" && $date2 == "" && $nameitem != "") {
			$data  = array($namewarehouse, "%" . $nameitem . "%");
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namewarehouse = ? AND nameitem like ? ";
		} else if ($namewarehouse == "" && $tipein != "" && $namesupp != "" && $date1 == "" && $date2 == "" && $nameitem == "") {
			$data  = array($tipein, $namesupp);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND typein = ? AND namesupp = ?";
		} else if ($namewarehouse == "" && $tipein != "" && $namesupp == "" && $date1 != "" && $date2 != "" && $nameitem == "") {
			$data  = array($tipein, $date1, $date2);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND typein = ? AND REPLACE(datein, ' ', '') >= ? 
			AND REPLACE(datein, ' ', '') <= ?";
		} else if ($namewarehouse == "" && $tipein != "" && $namesupp == "" && $date1 == "" && $date2 == "" && $nameitem != "") {
			$data  = array($tipein, "%" . $nameitem . "%");
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND typein = ? AND nameitem like ?";
		} else if ($namewarehouse == "" && $tipein == "" && $namesupp != "" && $date1 != "" && $date2 != "" && $nameitem == "") {
			$data  = array($namesupp, $date1, $date2);
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namesupp = ? AND REPLACE(datein, ' ', '') >= ? 
			AND REPLACE(datein, ' ', '') <= ?";
		} else if ($namewarehouse == "" && $tipein == "" && $namesupp != "" && $date1 == "" && $date2 == "" && $nameitem != "") {
			$data  = array($namesupp, "%" . $nameitem . "%");
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namesupp = ? AND nameitem like ?";
		} else if ($namewarehouse == "" && $tipein == "" && $namesupp == "" && $date1 != "" && $date2 != "" && $nameitem != "") {
			$data  = array($date1, $date2, "%" . $nameitem . "%");
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND REPLACE(datein, ' ', '') >= ? 
			AND REPLACE(datein, ' ', '') <= ? AND nameitem like ?";
		} else if ($namewarehouse != "" && $tipein != "" && $namesupp != "" && $date1 != "" && $date2 != "" && $nameitem != "") {
			$data  = array($namewarehouse, $tipein, $namesupp, $date1, $date2, "%" . $nameitem . "%");
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp AND namewarehouse = ? AND typein = ? AND namesupp = ? AND REPLACE(datein, ' ', '') >= ? 
			AND REPLACE(datein, ' ', '') <= ? AND nameitem like ?";
		} else {
			$data  = array();
			$query = "SELECT * FROM invin,invindet,tb_item,po,tb_warehouse,tb_supplier 
			WHERE invin.idin = invindet.idin AND invindet.iditem = tb_item.iditem 
			AND invin.idpo = po.idpo AND invin.idwh = tb_warehouse.idwarehouse 
			AND invin.idsupp = tb_supplier.idsupp";
		}
		$eksekusi = $this->db->query($query, $data)->result_object();
		// echo ($this->db->last_query());
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idin"]	        = $key->idin;
				$f["idpo"]	        = $key->idpo;
				$f["codein"]	    = $key->codein;
				$f["codepo"]	    = $key->codepo;
				$f["datein"]	    = $key->datein;
				$f["typein"]	    = $key->typein;
				$f["price"]	        = $key->price;
				$f["nameitem"]	        = $key->nameitem;
				$f["deskripsi"]  	= $key->deskripsi;
				$f["itemgroup"]	    = $key->itemgroup;
				$f["sku"]	        = $key->sku;
				$f["qtypodet"]	        = $key->qtypodet;
				$f["qtyindet"]	        = $key->qtyindet;
				$f["balance"]	    = $key->balance;
				$f["expdate"]       = $key->expdate;
				$f["idunit"]       = $key->idunit;
				$f["namewarehouse"]       = $key->namewarehouse;
				$f["namesupp"]       = $key->namesupp;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getjasapengirimbydate($finish)
	{
		$data = array($finish, $finish, $finish, $finish, $finish, $finish);
		// $query = "SELECT jasapengirim,dateso, COUNT(jasapengirim) AS jumlah FROM tb_salesorder WHERE REPLACE(tb_salesorder.dateso, ' ', '') = ?  GROUP BY jasapengirim,dateso ORDER BY jumlah ASC";
		// $query = "SELECT distinct(jasapengirim) FROM tb_salesorder WHERE REPLACE(tb_salesorder.dateso, ' ', '') = ?";
		$query = "select a.jasapengirim,a1.qty as w,b.qty as p,c.qty as pr,d.qty as f,e.qty as c from 
		(select distinct jasapengirim from tb_salesorder where REPLACE(tb_salesorder.dateso, ' ', '') = ?) as a 
		left join(select jasapengirim,statusorder,count(statusorder) as qty from tb_salesorder where statusorder='Waiting' and REPLACE(tb_salesorder.dateso, ' ', '') = ?  group by jasapengirim,statusorder ) as a1 on a.jasapengirim = a1.jasapengirim
		left join(select jasapengirim,statusorder,count(statusorder) as qty from tb_salesorder where statusorder='Pending' and REPLACE(tb_salesorder.dateso, ' ', '') = ? group by jasapengirim,statusorder) as b on a.jasapengirim = b.jasapengirim
		left join(select jasapengirim,statusorder,count(statusorder) as qty  from tb_salesorder where statusorder='Process' and REPLACE(tb_salesorder.dateso, ' ', '') = ? group by jasapengirim,statusorder) as c on a.jasapengirim = c.jasapengirim
		left join(select jasapengirim,statusorder,count(statusorder) as qty from tb_salesorder where statusorder='Finish' and REPLACE(tb_salesorder.dateso, ' ', '') = ? group by jasapengirim,statusorder) as d on a.jasapengirim = d.jasapengirim
		left join(select jasapengirim,statusorder,count(statusorder) as qty from tb_salesorder where statusorder='Cancel'and REPLACE(tb_salesorder.dateso, ' ', '') = ? group by jasapengirim,statusorder) as e on a.jasapengirim = e.jasapengirim
		";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["jasapengirim"] = $key->jasapengirim;
				$f["waiting"] = $key->w;
				$f["pending"] = $key->p;
				$f["process"] = $key->pr;
				$f["finish"] = $key->f;
				$f["cancel"] = $key->c;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderpersentasebydate($finish)
	{
		$data = array($finish);
		$query = "SELECT statusorder,dateso, COUNT(statusorder) AS jumlah FROM tb_salesorder WHERE REPLACE(tb_salesorder.dateso, ' ', '') = ?  GROUP BY statusorder,dateso ORDER BY jumlah ASC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["dateso"] = $key->dateso;
				$f["statusorder"] = $key->statusorder;
				$f["jumlah"] = $key->jumlah;

				array_push($respon, $f);
			}
		} else {

			$respon = "Not Found";
		}

		return $respon;
	}

	function getsalesorderjumlahbydate($finish)
	{
		$data = array($finish);
		$query = "SELECT statusorder,dateso, COUNT(statusorder) AS jumlah FROM tb_salesorder WHERE REPLACE(tb_salesorder.dateso, ' ', '') = ?  GROUP BY statusorder,dateso ORDER BY jumlah DESC";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["dateso"] = $key->dateso;
				$f["statusorder"] = $key->statusorder;
				$f["jumlah"] = $key->jumlah;

				array_push($respon, $f);
			}
		} else {

			$respon = "Not Found";
		}

		return $respon;
	}

	function getlistinvoicebydate($finish)
	{
		$data = array($finish);
		$query = "SELECT * FROM tb_salesinvoice WHERE REPLACE(dateinv, ' ', '') = ? ORDER BY codeinv ASC";
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
						$g["VAT"] = $keyx->priceitem * (float) $keyx->VAT / 100;
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


	function getquotationbystatus()
	{
		$data = date('Y-m-d');
		$query = "SELECT * FROM tb_quotation,common_detail WHERE tb_quotation.statusquo = common_detail.namecomm AND common_detail.namecomm = 'Waiting' AND tb_quotation.expquo >= ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idquo"] = $key->idquo;
				$f["codequo"] = $key->codequo;
				$f["datequo"] = $key->datequo;
				$f["statusquo"] = $key->namecomm;
				$f["typequo"] = $key->typequo;
				$f["namequotation"] = $key->namequotation;
				$f["pricetotal"] = $key->pricetotal;
				$f["datequo"] = $key->datequo;
				$f["totalquo"] = $key->totalquo;
				$f["VAT"] = $key->VAT;
				$f["norek"] = $key->norek;
				$f["delivdate"] = $key->delivdate;
				$f["delivaddr"] = $key->delivaddr;
				$f["disc"] = $key->disc;
				$f["address"] = $key->attrib1;
				$datax = array($key->idcurrency);
				$queryx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["currency"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->idcust);
				$queryxx = "SELECT * FROM common_detail WHERE idcomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["namecomm"] = $keyx->namecomm;
					}
				}

				$dataxx = array($key->typequo);
				$queryxx = "SELECT * FROM common_detail WHERE codecomm = ?";
				$eksekusixx = $this->db->query($queryxx, $dataxx)->result_object();
				if (count($eksekusixx) > 0) {
					foreach ($eksekusixx as $keyx) {
						$f["nametypequo"] = $keyx->namecomm;
					}
				}
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getpaymentmethod()
	{
		$query = "SELECT * FROM common_detail WHERE idgroup = '7' ";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["isactive"] =  $key->isactive;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	// function addroleuser($namerole,$role, $iduser)
	// {
	// 	$data  = array($namerole);
	// 	$query = "INSERT INTO tb_role(namerole) VALUES(?)";
	// 	$eksekusi = $this->db->query($query, $data);
	// 		if ($eksekusi == true) {
	// 			$respon = "Success";
	// 		}else{
	// 		    $respon = "Failed";
	// 		}
	// 		return $respon;
	// }

	function addroleuser($namerole, $role, $iduser)
	{
		$data = array($namerole);
		$query = "SELECT * FROM tb_role WHERE namerole = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();

		if (count($eksekusi) > 0) {
			$respon = "Nama Role Telah Ada";
		} else {
			$this->db->trans_begin();
			$query1 = "INSERT INTO tb_role(namerole) VALUES(?)";
			$eksekusi1 = $this->db->query($query1, $data);
			if ($eksekusi1 == true) {

				$idrole;

				$query2 = "SELECT * FROM tb_role WHERE namerole = ?";
				$eksekusi2 = $this->db->query($query2, $data)->result_object();
				if (count($eksekusi2) > 0) {
					foreach ($eksekusi2 as $key) {
						$idrole = $key->idrole;
					}
				}

				date_default_timezone_set("Asia/Jakarta");

				// for ($i = 0; $i < count($role); $i++) {
				$data3  = array($idrole, $role[$i], $iduser, date('Y-m-d H:i:s'));
				$query3 = "INSERT INTO tb_roledetail (idrole,menu,upduser,upddate)VALUES(?,?,?,?)";
				$eksekusi3 = $this->db->query($query3, $data3);
				print_r($this->db->last_query($eksekusi3));
				if ($eksekusi3 == true) {
					$respon = "Success";
				} else {
					$respon = "Failed";
					// break;
				}
				// }
			} else {
				$respon = "Failed";
			}
		}

		if ($respon == "Success") {
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
		return $respon;
	}


	function editroleuser($role, $idrole, $iduser)
	{
		$data = array($idrole);
		$query = "DELETE FROM tb_roledetail WHERE idrole = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			date_default_timezone_set("Asia/Jakarta");
			$this->db->trans_begin();
			for ($i = 0; $i < count($role); $i++) {
				$data1 = array($idrole, $role[$i], $iduser, date('Y-m-d H:i:s'));
				$query1 = "INSERT INTO tb_roledetail (idrole,menu,upduser,upddate)VALUES(?,?,?,?)";
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
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}

		return $respon;
	}


	function addcurrency($codecurrency, $namecurrency, $symbolcurrency, $kurscurrency, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array('3', $codecurrency, $namecurrency, '1', $symbolcurrency, $kurscurrency, date('Y-m-d H:i:s'), $userid);
		$query = "INSERT INTO common_detail (idgroup,codecomm,namecomm,isactive,attrib1,attrib7,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function addunit($codecurrency, $namecurrency, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array('5', $codecurrency, $namecurrency, '1', date('Y-m-d H:i:s'), $userid);
		$query = "INSERT INTO common_detail (idgroup,codecomm,namecomm,isactive,madelog,madeuser)VALUES(?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function addcard($codecurrency, $namecurrency, $userid, $nocard, $beneficiary)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array('6', $codecurrency, $namecurrency, $nocard, '1', date('Y-m-d H:i:s'), $userid, $beneficiary);
		$query = "INSERT INTO common_detail (idgroup,codecomm,namecomm,attrib1,isactive,madelog,madeuser,attrib2)VALUES(?,?,?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function addcustomer($addresscustomer, $namecustomer, $contact, $phonecustomer, $type, $email, $codecustomer, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array('2', $addresscustomer, $namecustomer, $contact, $phonecustomer, $type, $email, $codecustomer, date('Y-m-d H:i:s'), $userid);
		$query = "INSERT INTO common_detail (idgroup,attrib1,namecomm,attrib5,attrib2,attrib4,attrib3,codecomm,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editcustomer($id, $codecustomer, $email, $type, $phonecustomer, $namecustomer, $contact, $addresscustomer, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data  = array($codecustomer, $email, $type, $phonecustomer, $contact, $namecustomer, $addresscustomer, $userid, date('Y-m-d H:i:s'), $id);
		$query = "UPDATE common_detail SET codecomm = ? , attrib3 = ? , attrib4 = ?, attrib2 = ?, attrib5 = ?,namecomm = ?,attrib1 = ?,upduser =?,madelog = ? WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function additem(
		$iditem,
		$itemgroup,
		$nameitem,
		$jenisqty,
		$jenisitem,
		$sku,
		$price,
		$deskripsi,
		$status,
		$transaksi_iditem,
		$transaksi_sku,
		$transaksi_nameitem,
		$transaksi_deskripsi,
		$transaksi_qty,
		$userid
	) {
		date_default_timezone_set('Asia/Jakarta');
		$fail   = 0;
		$data1  = array($sku);
		$query1 = "SELECT * FROM tb_item WHERE sku = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		if (count($eksekusi1) > 0) {
			$respon = "SKU telah terdaftar";
		} else {
			$data     = array($itemgroup, $nameitem, $jenisqty, $jenisitem, $sku, $price, $deskripsi, $status, date('Y-m-d H:i:s'), $userid);
			$query    = "INSERT INTO tb_item (itemgroup,nameitem,jenisqty,jenisitem,sku,price,deskripsi,status,bom,usebom,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,'n','y',?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$datax = array($sku);
				$queryx = "SELECT * FROM tb_item WHERE sku = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						for ($i = 0; $i < count($transaksi_sku); $i++) {
							$data1      = array($transaksi_iditem[$i], $transaksi_qty[$i], date('Y-m-d H:i:s'));
							$query1    = "INSERT INTO tb_itemdetail(iditem,qty,madelog)VALUES(?,?,?)";
							$eksekusi1 = $this->db->query($query1, $data1);
							if ($eksekusi1 == true) {
								$respon = "Success";
							} else {
								$respon = "Failed on Detail";
							}
						}
					}
				} else {
					$respon = "Failed on Detail";
				}
			} else {
				$respon = "Failed on Detail";
			}

			return $respon;
		}
	}

	function additemproduk(
		$itemgroup,
		$nameitem,
		$jenisqty,
		$jenisitem,
		$sku,
		$price,
		$deskripsi,
		$status,
		$userid
	) {
		date_default_timezone_set('Asia/Jakarta');
		$fail   = 0;
		$data1  = array($sku);
		$query1 = "SELECT * FROM tb_item WHERE sku = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		if (count($eksekusi1) > 0) {
			$respon = "SKU telah terdaftar";
		} else {
			$data     = array($itemgroup, $nameitem, $jenisqty, $jenisitem, $sku, $price, $deskripsi, $status, date('Y-m-d H:i:s'), $userid);
			$query    = "INSERT INTO tb_item (itemgroup,nameitem,jenisqty,jenisitem,sku,price,deskripsi,status,bom,usebom,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,'n','y',?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$respon = "Success";
			} else {
				$respon = "Failed";
			}
			return $respon;
		}
	}

	function additembom($itemgroup, $nameitem, $idunit, $sku, $hargaitem, $deskripsi, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$fail   = 0;
		$data1  = array($sku);
		$query1 = "SELECT * FROM tb_item WHERE sku = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		if (count($eksekusi1) > 0) {
			$respon = "SKU telah terdaftar";
		} else {
			$data     = array($itemgroup, $nameitem, $idunit, $sku, $hargaitem, $deskripsi, date('Y-m-d H:i:s'), $userid);
			$query    = "INSERT INTO tb_item (itemgroup,nameitem,idunit,sku,price,bom,usebom,deskripsi,status,madelog,madeuser)VALUES(?,?,?,?,?,'y','n',?,1,?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$respon = "Success";
			} else {
				$respon = "Failed";
			}
			return $respon;
		}
	}

	function addbundling($itemgroup, $nameitem, $link, $status, $sku, $harga, $spec)
	{
		$fail = 0;
		date_default_timezone_set('Asia/Jakarta');
		$data1 = array($sku);
		$query1 = "SELECT * FROM tb_bundling WHERE sku = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		$this->db->last_query($eksekusi1);
		if (count($eksekusi1) > 0) {
			$respon = "SKU telah terdaftar";
		} else {
			$data     = array($itemgroup, $nameitem, $link, $status, $sku, $harga, $spec, date('Y-m-d H:i:s'));
			$query    = "INSERT INTO tb_bundling (itemgroup,nameitem,link,status,sku,harga,spec,madeuser)VALUES(?,?,?,?,?,?,?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$respon = "Success";
			} else {
				$respon = "Failed";
			}
			return $respon;
		}
	}

	function addlocationitem($codecomm, $namecomm, $attrib1, $attrib2, $attrib3, $attrib4, $userid)
	{
		$data     = array($codecomm, $namecomm, $attrib1, $attrib2, $attrib3, $attrib4, $userid);
		$query    = "INSERT INTO common_detail (idgroup,codecomm,namecomm,isactive,attrib1,attrib2,attrib3,attrib4,madeuser)VALUES('12',?,?,'1',?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		print_r($eksekusi);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function additemtype($itemname, $codeitem, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array($userid, $codeitem, $itemname, date('Y-m-d H:i:s'));
		$query = "INSERT INTO common_detail (madeuser,idgroup,codecomm,namecomm,isactive,madelog)VALUES(?,'9',?,?,'1',?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}





	function addsupplier($codesupp, $namesupp, $namacontact, $notelp, $addressupp, $namabank, $norekening,  $beneficiary, $userid)
	{
		$fail   = 0;
		$data1  = array($codesupp);
		$query1 = "SELECT * FROM tb_supplier WHERE codesupp = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		if (count($eksekusi1) > 0) {
			$respon = "Codesupp telah terdaftar";
		} else {
			$data     = array($codesupp, $namesupp, $namacontact, $notelp, $addressupp, date('Y-m-d H:i:s'), $userid);
			$query    = "INSERT INTO tb_supplier(codesupp,namesupp,namacontact,notelp,addressup,madelog,madeuser)VALUES(?,?,?,?,?,?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$datax = array($codesupp);
				$queryx = "SELECT * FROM tb_supplier WHERE codesupp = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						$idsupp = $key->idsupp;
						for ($i = 0; $i < count($norekening); $i++) {
							$dataxx     = array($idsupp, $namabank[$i], $norekening[$i], $beneficiary[$i]);
							$queryxx    = "INSERT INTO tb_supplierdet (idsupp,namabank,norekening,beneficiary)VALUES(?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								$respon = "Success";
							} else {
								$respon = "Failed on Detail";
							}
						}
					}
				} else {
					$respon = "Failed on Detail";
				}
			} else {
				$respon = "Failed on Detail";
			}
			return $respon;
		}
	}


	function adduser($username, $email, $idwarehouse, $role, $password)
	{
		$data = array($username);
		$query = "SELECT * FROM tb_user WHERE username = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = "Username Has Used Please Use Another Username";
		} else {
			$datax  = array($username, $email, $idwarehouse, $role, $password);
			$queryx = "INSERT INTO tb_user (username,email,idwarehouse,role,password,isactive)VALUES(?,?,?,?,?,1)";
		}
		$eksekusix = $this->db->query($queryx, $datax);
		if ($eksekusix == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	// function addcustomer($addresscustomer,$namecustomer,$contact,$phonecustomer, $type,$email, $codecustomer, $userid)
	// {
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$data = array('2', $addresscustomer,$namecustomer,$contact,$phonecustomer, $type,$email, $codecustomer, date('Y-m-d H:i:s'), $userid);
	// 	$query = "INSERT INTO common_detail (idgroup,attrib1,namecomm,attrib5,attrib2,attrib4,attrib3,codecomm,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,?,?)";
	// 	$eksekusi = $this->db->query($query, $data);
	// 	if ($eksekusi == true) {
	// 		$respon = "Success";
	// 	} else {
	// 		$respon = "Failed";
	// 	}

	// 	return $respon;
	// }


	function addwarehouse($codewarehouse, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array($codewarehouse, $namewarehouse, $addresswarehouse, $phonewarehouse, date('Y-m-d H:i:s'), $userid);
		$query = "INSERT INTO tb_warehouse (codewarehouse,namewarehouse,addresswarehouse,phonewarehouse,madelog,madeuser)VALUES(?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}



	function editcurrency($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status)
	{
		$data;
		$status;
		$query;
		if ($status != "") {
			$status = 1;
		} else {
			$status = 0;
		}
		date_default_timezone_set('Asia/Jakarta');
		$data = array($namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status, date('Y-m-d H:i:s'), $id);
		$query = "UPDATE common_detail SET namecomm = ? , attrib1= ? , attrib7 = ?, upduser = ? , isactive = ?, updlog = ?  WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editunit($id, $namewarehouse, $userid, $status)
	{
		$data;
		$status;
		$query;
		if ($status != "") {
			$status = 1;
		} else {
			$status = 0;
		}
		date_default_timezone_set('Asia/Jakarta');
		$data = array($namewarehouse, $userid, $status, date('Y-m-d H:i:s'), $id);
		$query = "UPDATE common_detail SET namecomm = ? , upduser = ? , isactive = ?, updlog = ?  WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editcard($id, $namewarehouse, $userid, $status, $nocard, $beneficiary)
	{
		$data;
		$status;
		$query;
		if ($status != "") {
			$status = 1;
		} else {
			$status = 0;
		}
		date_default_timezone_set('Asia/Jakarta');
		$data = array($namewarehouse, $userid, $status, date('Y-m-d H:i:s'), $nocard, $beneficiary, $id);
		$query = "UPDATE common_detail SET namecomm = ? , upduser = ? , isactive = ?, updlog = ?, attrib1 = ?, attrib2 = ?  WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	// function editcustomer($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status)
	// {
	// 	$data;
	// 	$status;
	// 	$query;
	// 	if ($status != "") {
	// 		$status = 1;
	// 	} else {
	// 		$status = 0;
	// 	}
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$data = array($namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status, date('Y-m-d H:i:s'), $id);
	// 	$query = "UPDATE common_detail SET namecomm = ? , attrib1 = ? , attrib2 = ?, upduser = ? , isactive = ?, updlog = ?  WHERE idcomm = ?";
	// 	$eksekusi = $this->db->query($query, $data);
	// 	if ($eksekusi == true) {
	// 		$respon = "Success";
	// 	} else {
	// 		$respon = "Failed";
	// 	}

	// 	return $respon;
	// }

	function edititem($id, $itemname, $priceitem, $sku, $userid, $status, $itemtype, $min, $max, $pricebuyitem, $vat, $location, $pph, $sn)
	{

		if ($status != "") {
			$status = "1";
		} else {
			$status = '0';
		}
		date_default_timezone_set('Asia/Jakarta');
		$subprice = $priceitem + ($priceitem - $priceitem);
		$data = array($itemname, $priceitem, $sku, $userid, date('Y-m-d H:i:s'), $status, $itemtype, $min, $max, $vat, $location, $pricebuyitem, $subprice, $pph, $sn, $id);
		$query = "UPDATE tb_item SET nameitem = ? , priceitem = ? , sku = ?, upduser = ?,updlog =?, status = ? , itemtype = ?, minstock = ?, maxstock = ?, VAT = ?, idlocation = ?, pricebuyitem = ?, subprice = ?, pph22= ?, usesn = ?  WHERE iditem = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editlockitem($id, $codecomm, $namecomm, $attrib1, $attrib2, $attrib3, $attrib4, $userid)
	{

		$data  = array($codecomm, $namecomm, $attrib1, $attrib2, $attrib3, $attrib4, $id);
		$query = "UPDATE common_detail SET codecomm = ?, namecomm = ? , attrib1 = ? , attrib2 = ?,attrib3 = ?, attrib4 = ? WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editsupplier($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status)
	{
		$data;
		$status;
		$query;
		if ($status != "") {
			$status = 1;
		} else {
			$status = 0;
		}
		date_default_timezone_set('Asia/Jakarta');
		$data = array($namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status, date('Y-m-d H:i:s'), $id);
		$query = "UPDATE common_detail SET namecomm = ? , attrib1 = ? , attrib2 = ?, upduser = ? , isactive = ?, updlog = ?  WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function edititemtype($id, $namewarehouse, $userid, $status)
	{
		$data;
		$status;
		$query;
		if ($status != "") {
			$status = 1;
		} else {
			$status = 0;
		}
		date_default_timezone_set('Asia/Jakarta');
		$data = array($namewarehouse, $userid, $status, date('Y-m-d H:i:s'), $id);
		$query = "UPDATE common_detail SET namecomm = ? , upduser = ? , isactive = ?, updlog = ?  WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}



	function edituser($id, $username, $email, $warehouse, $role, $password, $userid)
	{
		$data = array($username, $email, $warehouse, $role, $password, $userid, $id);
		$query = "UPDATE tb_user SET username = ? , email = ?,idwarehouse = ? , role = ?, password = ?, upduser = ? WHERE iduser = ? ";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed, Try Again";
		}
		return $respon;
	}


	function editwarehouse($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array($namewarehouse, $addresswarehouse, $phonewarehouse, $userid, date('Y-m-d H:i:s'), $id);
		$query = "UPDATE tb_warehouse SET namewarehouse = ? , addresswarehouse = ? , phonewarehouse = ?, madeuser = ? , madelog = ?  WHERE idwarehouse = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}




	function getcurrencybyid($idcurrency)
	{
		$data = array(base64_decode($idcurrency));
		$query = "SELECT * FROM common_detail WHERE codecomm = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcomm"] = $key->idcomm;
				$f["codecomm"] = $key->codecomm;
				$f["namecomm"] = $key->namecomm;
				$f["isactive"] = $key->isactive;
				$f["attrib1"] = $key->attrib1;
				$f["attrib7"] = $key->attrib7;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdataunitbyid($idcurrency)
	{
		$data = array(base64_decode($idcurrency));
		$query = "SELECT * FROM common_detail WHERE codecomm = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcomm"] = $key->idcomm;
				$f["codecomm"] = $key->codecomm;
				$f["namecomm"] = $key->namecomm;
				$f["attrib1"] = $key->attrib1;
				$f["attrib2"] = $key->attrib2;
				$f["isactive"] = $key->isactive;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdatacustomerbyid($idcustomer)
	{
		$data = array(base64_decode($idcustomer));
		$query = "SELECT * FROM common_detail WHERE codecomm = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcomm"] = $key->idcomm;
				$f["codecomm"] = $key->codecomm;
				$f["namecomm"] = $key->namecomm;
				$f["isactive"] = $key->isactive;
				$f["attrib1"] = $key->attrib1;
				$f["attrib2"] = $key->attrib2;
				$f["attrib3"] = $key->attrib3;
				$f["attrib4"] = $key->attrib4;
				$f["attrib5"] = $key->attrib5;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdataitembyid($iditem)
	{
		$data = array(base64_decode($iditem));
		$query = "SELECT * FROM tb_item left join common_detail on  tb_item.itemtype = common_detail.idcomm WHERE iditem = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["iditem"] = $key->iditem;
				$f["itemname"] = $key->nameitem;
				$f["priceitem"] = $key->priceitem;
				$f["pricebuyitem"] = $key->pricebuyitem;
				$f["VAT"] = $key->VAT;
				$f["sku"] = $key->sku;
				$f["itemtype"] =  $key->itemtype;
				$f["status"] =  $key->status;
				$f["pph22"] =  $key->pph22;
				$f["usesn"] =  $key->usesn;
				$f["namecomm"] =  $key->namecomm;
				$f["minstock"] =  $key->minstock;
				$f["maxstock"] =  $key->maxstock;
				$f["idlocation"] =  $key->idlocation;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdatalockitembyid($idcomm)
	{
		$data  = array(base64_decode($idcomm));
		$query = "SELECT * FROM common_detail WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcomm"]   = $key->idcomm;
				$f["codecomm"] = $key->codecomm;
				$f["namecomm"] = $key->namecomm;
				$f["attrib1"]  = $key->attrib1;
				$f["attrib2"]  = $key->attrib2;
				$f["attrib3"]  = $key->attrib3;
				$f["attrib4"]  = $key->attrib4;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdatasupplierbyid($idsupp)
	{
		$data = array(base64_decode($idsupp));
		$query = "SELECT * FROM common_detail WHERE codecomm = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcomm"] = $key->idcomm;
				$f["codecomm"] = $key->codecomm;
				$f["namecomm"] = $key->namecomm;
				$f["isactive"] = $key->isactive;
				$f["attrib1"] = $key->attrib1;
				$f["attrib2"] = $key->attrib2;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdataitemtypebyid($idwarehouse)
	{
		$data = array(base64_decode($idwarehouse));
		$query = "SELECT * FROM common_detail WHERE codecomm = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcomm"] = $key->idcomm;
				$f["codecomm"] = $key->codecomm;
				$f["namecomm"] = $key->namecomm;
				$f["isactive"] = $key->isactive;
				$f["attrib1"] = $key->attrib1;
				$f["attrib2"] = $key->attrib2;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdatauserbyid($iduser)
	{
		$data = array(base64_decode($iduser));
		$query = "SELECT * FROM tb_user,tb_role WHERE tb_user.iduser = ? AND tb_user.role = tb_role.idrole";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["iduser"] = $key->iduser;
				$f["username"] = $key->username;
				$f["password"] = $key->password;
				$f["email"] = $key->email;
				$f["fullname"] = $key->fullname;
				$f["address"] = $key->address;
				$f["phone"] = $key->phone;
				$f["photo"] = $key->photo;
				$f["role"] = $key->role;
				$f["namerole"] = $key->namerole;
				$f["isactive"] = $key->isactive;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdatawarehousebyid($idwarehouse)
	{
		$data = array(base64_decode($idwarehouse));
		$query = "SELECT * FROM tb_warehouse";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idwarehouse"]      = $key->idwarehouse;
				$f["codewarehouse"]    = $key->codewarehouse;
				$f["namewarehouse"]    = $key->namewarehouse;
				$f["addresswarehouse"] = $key->addresswarehouse;
				$f["phonewarehouse"]   = $key->phonewarehouse;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function deleteitemtype($idcurrency)
	{
		$data = array($idcurrency);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}


	function deletecurrency($idcurrency)
	{
		$data = array($idcurrency);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deleteunit($idcurrency)
	{
		$data = array($idcurrency);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deletecard($idcurrency)
	{
		$data = array($idcurrency);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deletecustomer($idcust)
	{
		$data = array($idcust);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deleteitem($iditem)
	{
		$data = array($iditem);
		$query = "DELETE FROM tb_item WHERE iditem = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deletesupplier($idsupp)
	{
		$data = array($idsupp);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deleteuser($iduser)
	{
		$data = array($iduser);
		$query = "DELETE FROM tb_user WHERE iduser = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deletewarehouse($idwarehouse)
	{
		$data = array($idwarehouse);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}


	function getcompany()
	{
		$query = "SELECT * FROM tb_company";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$respon = array();
				foreach ($eksekusi as $key) {
					$f["idcomp"]      = $key->idcomp;
					$f["namecomp"]    = $key->namecomp;
					$f["email"]       = $key->email;
					$f["logo"]        = $key->logo;
					$f["bank"]        = $key->bank;
					$f["norekening"]  = $key->norekening;
					$f["beneficiary"] = $key->beneficiary;
					array_push($respon, $f);
				}
			}

			return $respon;
		}
	}

	function addcompany($logo, $namecomp, $email, $nokantor, $nohandphone, $alamat, $bank, $norekening, $beneficiary, $remarkinvoice, $remarkquotation, $userid)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data  = array($namecomp, $email, $nokantor, $nohandphone, $alamat, $bank, $norekening, $beneficiary, $remarkinvoice, $remarkquotation, date('Y-m-d H:i:s'), $userid);
		$query = "INSERT INTO tb_company (namecomp,email,nokantor,nohandphone,alamat,bank,norekening,beneficiary,remarkinvoice,remarkquotation,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);

		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	// function addcompany($logo,$namecomp,$email, $nokantor, $nohandphone, $alamat, $bank, $norekening,$beneficiary,$remarkinvoice,$remarkquotation)
	// {
	// 	if ($idcomp == "") {
	// 		$data;
	// 		$query;
	// 		if ($photo != "") {
	// 			$img = "./assets/img/comp/" . date('YmdHis') . ".jpg";
	// 			$data = array($namecomp, $phone, $fax, $addr, $email, $website, $titleremark, $bodyremark, $imgm, $dir);
	// 			$query = "INSERT INTO tb_company (namecomp,phone,fax,addr,email,website,titleremark,bodyremark,logo,director)VALUES(?,?,?,?,?,?,?,?,?,?)";
	// 		} else {
	// 			$data = array($namecomp, $phone, $fax, $addr, $email, $website, $titleremark, $bodyremark, $dir);
	// 			$query = "INSERT INTO tb_company (namecomp,phone,fax,addr,email,website,titleremark,bodyremark,director)VALUES(?,?,?,?,?,?,?,?,?)";
	// 		}

	// 		$eksekusi = $this->db->query($query, $data);
	// 		if ($eksekusi == true) {
	// 			if ($photo != "") {
	// 				if (move_uploaded_file($photo, $img)) {
	// 					$respon = "Success";
	// 				} else {
	// 					$respon = "Failed";
	// 				}
	// 			} else {
	// 				$respon = "Success";
	// 			}
	// 		} else {
	// 			$respon = "Failed";
	// 		}
	// 	} else {
	// 		$query;
	// 		$data;
	// 		if ($photo != "") {
	// 			$img = "./assets/img/user/" . date('YmdHis') . ".jpg";
	// 			$data = array($namecomp, $phone, $fax, $addr, $website, $email, $titleremark, $bodyremark, $img, $dir, $idcomp);
	// 			$query = "UPDATE tb_company SET namecomp = ? , phone = ? , fax =? , addr =?, website  = ? , email = ?, titleremark = ? , bodyremark = ?, logo= ?, director = ? WHERE idcomp = ?";
	// 			move_uploaded_file($photo, $img);
	// 		} else {
	// 			$data = array($namecomp, $phone, $fax, $addr, $website, $email, $titleremark, $bodyremark, $dir, $idcomp);
	// 			$query = "UPDATE tb_company SET namecomp = ? , phone = ? , fax =? , addr =?, website  = ? , email = ?, titleremark = ? , bodyremark = ? , director = ? WHERE idcomp = ?";
	// 		}


	// 		$eksekusi = $this->db->query($query, $data);
	// 		if ($eksekusi == true) {
	// 			$respon = "Success";
	// 		} else {
	// 			$respon = "Failed";
	// 		}
	// 	}

	// 	return $respon;
	// }



	function ceknameuser($name, $delivaddr, $nocust, $idnew)
	{
		$data = array($name, $delivaddr);
		$query = "SELECT * FROM common_detail WHERE namecomm = ? AND attrib1 =?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$respon = $key->idcomm;
			}
		} else {
			$datax = array($idnew, $name, $delivaddr, $nocust);
			$queryx = "INSERT INTO common_detail (idgroup,codecomm,namecomm,isactive,attrib1,attrib2)VALUES('2',?,?,'1',?,?)";
			$eksekusi1 = $this->db->query($queryx, $datax);
			if ($eksekusi1 == true) {
				$query2 = "SELECT * FROM common_detail WHERE namecomm = ? AND attrib1 = ?";
				$eksekusi2 = $this->db->query($query2, $data)->result_object();
				if (count($eksekusi2) > 0) {
					foreach ($eksekusi2 as $key) {
						$respon = $key->idcomm;
					}
				} else {
					$respon = "Not Found";
				}
			} else {
				$respon = "Not Found";
			}
		}

		return $respon;
	}


	function get_client_ipxy()
	{
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if (isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return ($ipaddress == '::1') ? 'localhost' : $ipaddress;
	}
	function get_client_browserxy()
	{
		$browser = '';
		$browser = substr(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'NO-AGENT', 0, 150);
		return $browser;
	}

	function userlog($iduser, $activity)
	{


		$sessioninfo = $this->get_client_ipxy() . " - " . $this->get_client_browserxy();
		date_default_timezone_set('Asia/Jakarta');
		$data  = array($iduser, date('Y-m-d H:i:s'), $activity, $sessioninfo);
		$query = "INSERT INTO tb_log (iduser,datelog,activity,ipaddress) VALUES(?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
	}



	function userrole($sales, $counter, $warehouse, $purchasing, $qc, $iduser)
	{
		date_default_timezone_set('Asia/Jakarta');
		$fail = 0;
		$query = "DELETE FROM tb_roledetail";
		$eksekusi = $this->db->query($query);
		if ($sales != "") {

			for ($i = 0; $i < count($sales); $i++) {
				$data = array('2', $sales[$i], $iduser, date('Y-m-d H:i:s'));
				$query = "INSERT INTO tb_roledetail (idrole,menu,upduser,upddate)VALUES(?,?,?,?)";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi != true) {
					$fail++;
				}
			}
		}

		if ($counter != "") {

			for ($i = 0; $i < count($counter); $i++) {
				$data = array('3', $counter[$i], $iduser, date('Y-m-d H:i:s'));
				$query = "INSERT INTO tb_roledetail (idrole,menu,upduser,upddate)VALUES(?,?,?,?)";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi != true) {
					$fail++;
				}
			}
		}

		if ($warehouse != "") {

			for ($i = 0; $i < count($warehouse); $i++) {
				$data = array('4', $warehouse[$i], $iduser, date('Y-m-d H:i:s'));
				$query = "INSERT INTO tb_roledetail (idrole,menu,upduser,upddate)VALUES(?,?,?,?)";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi != true) {
					$fail++;
				}
			}
		}


		if ($purchasing != "") {

			for ($i = 0; $i < count($purchasing); $i++) {
				$data = array('5', $purchasing[$i], $iduser, date('Y-m-d H:i:s'));
				$query = "INSERT INTO tb_roledetail (idrole,menu,upduser,upddate)VALUES(?,?,?,?)";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi != true) {
					$fail++;
				}
			}
		}

		if ($qc != "") {

			for ($i = 0; $i < count($qc); $i++) {
				$data = array('6', $qc[$i], $iduser, date('Y-m-d H:i:s'));
				$query = "INSERT INTO tb_roledetail (idrole,menu,upduser,upddate)VALUES(?,?,?,?)";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi != true) {
					$fail++;
				}
			}
		}


		if ($fail > 0) {
			$respon = "Failed";
		} else {
			$respon = "Success";
		}

		return $respon;
	}


	function getroleuser()
	{
		$query = "SELECT * FROM tb_roledetail";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idrole"] = $key->idrole;
				$f["menu"]   = $key->menu;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function cancelorder($idso)
	{
		$this->db->trans_begin();
		$succes = 0;
		$failed = 0;
		$data = array($idso);
		$query = "UPDATE tb_salesorder SET statusorder = 'Cancel' WHERE idso = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			// $respon = "Success";
			$queryx = "SELECT * FROM tb_salesorderdetail WHERE idso = ?";
			$eksekusix = $this->db->query($queryx, $data)->result_object();
			if (count($eksekusix) > 0) {
				foreach ($eksekusix as $key) {
					$datax = array($key->qty, $key->iditem);
					$query2 = "UPDATE tb_itemqty SET qtyso = qtyso - ? WHERE iditem = ?";
					$eksekusi2 = $this->db->query($query2, $datax);
					if ($eksekusi2 == true) {
						$succes++;
					} else {
						$failed++;
					}
				}
			} else {
				$failed++;
			}
		} else {
			$failed++;
		}

		if ($failed > 0) {
			$this->db->trans_rollback();
			$respon = "Failed";
		} else {
			$this->db->trans_commit();
			$respon = "Success";
		}

		return $respon;
	}

	function getdatacounterorderfinish()
	{
		$this->db->select('statusorder, count(*)');
		$this->db->from('tb_salesorder');
		$this->db->join('common_detail', 'tb_salesorder.idcust = common_detail.idcomm', 'left');
		$this->db->where('statusorder', 'Finish');
		$this->db->group_by('tb_salesorder.statusorder');
		$query = $this->db->get();
	}

	function addpo(
		$codepo,
		$supplier,
		$judulpurchase,
		$datepo,
		$delivedate,
		$matauang,
		$exchange,
		$vat,
		$norekening,
		$dpp,
		$subtotal,
		$grandtotal,
		$disglob,
		$transaksi_iditem,
		$transaksi_sku,
		$transaksi_nameitem,
		$transaksi_harga,
		$transaksi_qty,
		$transaksi_discnominal,
		$transaksi_discpersen,
		$transaksi_total,
		$iduser
	) {
		date_default_timezone_set('Asia/Jakarta');
		$fail   = 0;
		$data1  = array($codepo);
		$query1 = "SELECT * FROM po WHERE codepo = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		if (count($eksekusi1) > 0) {
			$respon = "Code Po telah terdaftar";
		} else {
			$data     = array($codepo, $supplier, $judulpurchase, $datepo, $delivedate, $matauang, $exchange, $norekening, date('Y-m-d H:i:s'), $iduser);
			$query    = "INSERT INTO po(codepo,idsupp,deskripsi,datepo,delivedate,idcurr,exchange,norekening,statuspo,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,'Waiting',?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$datax = array($codepo);
				$queryx = "SELECT * FROM po WHERE codepo = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						$idpo = $key->idpo;
						$totalqtypo = 0;

						for ($i = 0; $i < count($transaksi_iditem); $i++) {
							$dataxx     = array(
								$idpo, $transaksi_iditem[$i], $transaksi_harga[$i], $transaksi_qty[$i], $transaksi_discnominal[$i],
								$transaksi_discpersen[$i], $transaksi_total[$i], $dpp, $subtotal, $vat, $grandtotal, $disglob
							);
							$queryxx    = "INSERT INTO podet (idpo,iditem,price,qty,discnominal,discpersen,subpo,dpp,subtotal,vat,grandtotal,discglob)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								$respon = "Success";

								$totalqtypo += $transaksi_qty[$i];
							} else {
								$respon = "Failed on Detail";
							}
						}
						$querypo  = "UPDATE po set qtypo = " . $totalqtypo . " where codepo = '" . $codepo . "'";
						$eksekusipo = $this->db->query($querypo);
						if ($eksekusixx == true) {
							$respon = "Success";
						} else {
							$respon = "Failed on Qtypo";
						}
					}
				} else {
					$respon = "Failed on Detail";
				}
			} else {
				$respon = "Failed on Detail";
			}
			return $respon;
		}
	}

	function addso(
		$codeso,
		$idquo,
		$tipeorder,
		$idcust,
		$dateso,
		$delivdate,
		$nopesanan,
		$delivaddr,
		$paymentmethod,
		$norekening,
		$vat,
		$subtotal,
		$discount,
		$ppn,
		$ongkir,
		$grandtotal,
		$transaksi_iditem,
		$transaksi_sku,
		$transaksi_nameitem,
		$transaksi_harga,
		$transaksi_qty,
		$transaksi_discnominal,
		$transaksi_discpersen,
		$transaksi_total,
		$iduser
	) {
		date_default_timezone_set('Asia/Jakarta');
		$fail   = 0;
		$data1  = array($codeso);
		$query1 = "SELECT * FROM tb_salesorder WHERE codeso = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();
		if (count($eksekusi1) > 0) {
			$respon = "Code SO telah terdaftar";
		} else {
			$data      = array($codeso, $idquo, $tipeorder, $idcust, $dateso, $delivdate, $nopesanan, $delivaddr, $paymentmethod, $norekening, date('Y-m-d H:i:s'), $iduser);
			$query     = "INSERT INTO tb_salesorder (codeso,idquo,tipeorder,idcust,dateso,delivdate,nopesanan,delivaddr,typepayment,norekening,statusorder,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,?,?,'Waiting',?,?)";
			$eksekusi  = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$datax     = array($codeso);
				$queryx    = "SELECT * FROM tb_salesorder WHERE codeso = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						$idso = $key->idso;
						for ($i = 0; $i < count($transaksi_iditem); $i++) {
							$dataxx     = array(
								$idso, $transaksi_iditem[$i], $transaksi_harga[$i], $transaksi_qty[$i], $transaksi_discnominal[$i],
								$transaksi_discpersen[$i], $transaksi_total[$i], $subtotal, $ppn, $ongkir, $grandtotal
							);
							$queryxx    = "INSERT INTO tb_salesorderdetail (idso,iditem,price,qty,disnom,disper,subso,subtotal,pph22,ongkir,grandtotal)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								$respon = "Success";
							} else {
								$respon = "Failed on Detail";
							}
						}
					}
				} else {
					$respon = "Failed on Detail";
				}
			} else {
				$respon = "Failed on Detail";
			}
			return $respon;
		}
	}

	function getdatapobyid($idpo)
	{
		$data = array(base64_decode($idpo));
		$query = "SELECT * FROM po,podet WHERE po.idpo = ? AND po.idpo = podet.idpodet";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idpo"] = $key->idpo;
				$f["codepo"] = $key->codepo;
				$f["deskripsi"] = $key->deskripsi;
				$f["datepo"] = $key->datepo;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function newinvin(
		$codein,
		$tipeingoing,
		$idpo,
		$namesupp,
		$namewarehouse,
		$datein,
		$currency,
		$transaksi_iditem,
		$transaksi_sku,
		$transaksi_nameitem,
		$transaksi_deskripsi,
		$transaksi_harga,
		$transaksi_qtypo,
		$transaksi_qtyin,
		$transaksi_balance,
		$transaksi_expiredate,
		$userid
	) {
		date_default_timezone_set('Asia/Jakarta');
		$fail   = 0;
		$data1  = array($codein);
		$query1 = "SELECT * FROM invin WHERE codein = ?";
		$eksekusi1 = $this->db->query($query1, $data1)->result_object();

		if (count($eksekusi1) > 0) {
			$respon = "Code Invin telah terdaftar";
		} else {
			$this->db->trans_begin();
			$data     = array($codein, $tipeingoing, $idpo, $namesupp, $namewarehouse, $datein, $currency, date('Y-m-d H:i:s'), $userid);
			$query    = "INSERT INTO invin (codein,typein,idpo,idsupp,idwh,datein,idcurr,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,?)";
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$datax     = array($codein);
				$queryx    = "SELECT * FROM invin WHERE codein = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						$idin  = $key->idin;
						$qtyin = 0;
						$qtypo = 0;
						for ($i = 0; $i < count($transaksi_iditem); $i++) {
							$dataxx     = array(
								$idin, $idpo, $transaksi_iditem[$i], $transaksi_harga[$i], $transaksi_qtypo[$i],
								$transaksi_qtyin[$i], $transaksi_balance[$i], $transaksi_expiredate[$i]
							);
							$queryxx    = "INSERT INTO invindet (idin,idpo,iditem,harga,qtypodet,qtyindet,balance,expdate)VALUES(?,?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								$respon    = "Success";
								$qtyin    += $transaksi_qtyin[$i];
								$qtypo    += $transaksi_qtypo[$i];
								$listqtyin = $transaksi_qtyin[$i];
							} else {
								$respon = "Failed on Detail";
								break;
							}
							$dataxs   = array($transaksi_qtyin[$i], $idpo, $transaksi_iditem[$i]);
							$queryxs  = "UPDATE podet  set qtyindet = qtyindet + ? WHERE idpo = ? AND iditem = ?";
							$eksekusisxs   = $this->db->query($queryxs, $dataxs);
							if ($eksekusisxs == true) {
								$respon  = "Success";
							} else {
								$respon  = "Failed on Qtyin";
								break;
							}
						}

						$queryin    = "UPDATE invin set qtyin = " . $qtyin . ",qtypo = " . $qtypo . " WHERE idin = '" . $idin . "'";
						$eksekusiin = $this->db->query($queryin);
						if ($eksekusixx == true) {
							$respon = "Success";
						} else {
							$respon = "Failed on Qtyin";
							break;
						}

						$queryqtyin  = "UPDATE po  set qtyin = qtyin + " . $qtyin . " WHERE idpo = " . $idpo . "";
						$eksekusis   = $this->db->query($queryqtyin);
						if ($eksekusis == true) {
							$respon  = "Success";
						} else {
							$respon  = "Failed on Qtyin";
							break;
						}
					}
				} else {
					$respon = "Failed on Detail";
				}
			} else {
				$respon     = "Failed on Detail";
			}
			if ($respon == "Success") {
				for ($x = 0; $x < count($transaksi_iditem); $x++) {
					$data2  = array($transaksi_iditem[$x], $namewarehouse);
					$query2 = "SELECT * FROM tb_itemqty WHERE iditem = ? AND idwh = ?";
					$eksekusi2 = $this->db->query($query2, $data2)->result_object();
					if (count($eksekusi2) > 0) {
						$data3     = array($transaksi_qtyin[$x], $transaksi_qtyin[$x], $transaksi_iditem[$x], $namewarehouse,);
						$query3    = "UPDATE tb_itemqty SET inqty = inqty + ?,endqty = endqty + ? WHERE iditem = ? AND idwh = ? ";
						$eksekusi3 = $this->db->query($query3, $data3);
						if ($eksekusi3 == true) {
							$respon = "Success";
						} else {
							$respon = "Failed on Qtyin";
							break;
						}
					} else {
						$data4     = array($transaksi_iditem[$x], $namewarehouse, $transaksi_qtyin[$x], $transaksi_qtyin[$x]);
						$query4    = "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty,qtyso)VALUES(?,?,0,?,0,?,0)";
						$eksekusi4 = $this->db->query($query4, $data4);
						if ($eksekusi4 == true) {
							$respon = "Success";
						} else {
							$respon = "Failed on Qtyin";
							break;
						}
					}
					$data2     = array($transaksi_iditem[$x], $namewarehouse, $transaksi_expiredate[$x]);
					$query2    = "SELECT * FROM tb_itemqtyexp WHERE iditem = ? AND idwh = ? AND expdate = ? ";
					$eksekusi2 = $this->db->query($query2, $data2)->result_object();
					if (count($eksekusi2) > 0) {
						$data3     = array($transaksi_qtyin[$x], $transaksi_qtyin[$x], $transaksi_iditem[$x], $namewarehouse, $transaksi_expiredate[$x]);
						$query3    = "UPDATE tb_itemqtyexp SET inqty = inqty + ?,endqty = endqty + ? WHERE iditem = ? AND idwh = ? AND expdate = ? ";
						$eksekusi3 = $this->db->query($query3, $data3);
						if ($eksekusi3 == true) {
							$respon = "Success";
						} else {
							$respon = "Failed on Qtyin";
							break;
						}
					} else {
						$data4     = array($transaksi_iditem[$x], $namewarehouse, $transaksi_expiredate[$x], $transaksi_qtyin[$x], $transaksi_qtyin[$x], $transaksi_harga[$x]);
						$query4    = "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty,hpp)VALUES(?,?,?,0,?,0,?,?)";
						$eksekusi4 = $this->db->query($query4, $data4);
						if ($eksekusi4 == true) {
							$respon = "Success";
						} else {
							$respon = "Failed on Qtyin";
							break;
						}
					}
				}
			}
			if ($respon == "Success") {
				$this->db->trans_commit();
			} else {
				$this->db->trans_rollback();
			}
			return $respon;
		}
	}
}
