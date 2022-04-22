<?php


class MPrQuo extends CI_Model
{

	function addpr($iduser, $datepr, $idsupp, $attn, $idcurr, $typepr, $period, $typereq, $statuspr, $qtypr, $itempr, $subtotal, $ppn, $ppntotal, $total, $iditem, $price, $qty, $subpr)
	{
		$this->db->trans_start();
		$data = array(substr(date('YmdHisu'), 0, 15), $idsupp, $idcurr, $datepr, $typepr, $period, $qtypr, $itempr, $total, $attn, $statuspr, date('Y-m-d H:i:s.u'), $iduser, $subtotal, $ppn, $ppntotal, $typereq);
		$query = "INSERT INTO pr(codepr,idsupp,idcurr,datepr,typepr,period,qtypr,itempr,totalpr,attn,statuspr,madelog,madeuser,subtotal,ppn,ppntotal,typereq)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$queryx = "SELECT @@IDENTITY As lastid";
			$eksekusix = $this->db->query($queryx)->result_object();
			if (count($eksekusix) > 0) {
				$lastid = 0;
				foreach ($eksekusix as $key) {
					$lastid = $key->lastid;
				}

				if ($lastid != 0) {
					$query = "SELECT codetrans from transstatus where codetrans='PR'";
					$query = $query . "UPDATE transstatus set s" . $statuspr . "=s" . $statuspr . "+1 where codetrans='PR' ";
					$query = $query . " else ";
					$query = $query . "INSERT INTO transstatus(codetrans,s" . $statuspr . ")VALUES('PR',1)";
					$eksekusi2 = $this->db->query($query);

					for ($i = 0; $i < count($iditem); $i++) {
						if (is_numeric($qty[$i]) && is_numeric($price[$i]) && is_numeric($iditem[$i])) {
							$dataxx = array($lastid, ($i + 1), $iditem[$i], 1, $qty[$i], $price[$i], ($qty[$i] * $price[$i]));
							$queryxx = "INSERT INTO prdet (idpr,idprdet,iditem,unitvol,qty,price,subpr)VALUES(?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								$respon = "Success";
							} else {
								$respon = "Failed on Detail";
							}
						} else {
							$respon = "Failed on Detail";
						}
					}
				}
			} else {
				$respon = "Failed on Search Header";
			}
		} else {
			$respon = "Failed on Input Header";
		}

		//if (respon=='Success' ){
		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}

	function updatepr($iduser, $datepr, $idsupp, $attn, $idcurr, $typepr, $period, $typereq, $statuspr, $qtypr, $itempr, $subtotal, $ppn, $ppntotal, $total, $iditem, $price, $qty, $subpr, $idpr, $codepr)
	{
		$this->db->trans_start();
		$data = array($idpr);
		$queryx = "SELECT qtypo,statuspr from pr where idpr = ? ";
		$eksekusix = $this->db->query($queryx, $data)->result_object();
		$laststatus = 0;
		$isexists = false;
		if (count($eksekusix) > 0) {
			$lastid = 0;
			foreach ($eksekusix as $key) {
				$lastid = $key->qtypo;
				$laststatus = $key->statuspr;
				$isexists = true;
			}
			if (!$isexists) {
				$respon = "Data not exists";
				$this->db->trans_rollback();
				return $respon;
			}
			if ($lastid != 0) {
				$respon = "Already Used";
				$this->db->trans_rollback();
				return $respon;
			}
			if ($laststatus == '04') {
				$respon = "Already Canceled";
				$this->db->trans_rollback();
				return $respon;
			}
		}
		$data = array($idsupp, $idcurr, $datepr, $typepr, $period, $qtypr, $itempr, $total, $attn, $statuspr, date('Y-m-d H:i:s.u'), $iduser, $subtotal, $ppn, $ppntotal, $typereq, $idpr);
		$query = "UPDATE pr SET idsupp = ? ,idcurr = ? ,datepr = ? ,typepr = ? ,period = ? ,qtypr = ? ,itempr = ? ,totalpr = ? ,attn = ? ,statuspr = ? ,madelog = ? ,madeuser = ? ,subtotal = ? ,ppn = ? ,ppntotal = ? ,typereq = ? WHERE idpr = ? ";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$data = array($idpr);
			$queryx = "DELETE FROM prdet where idpr = ? ";
			$eksekusix = $this->db->query($queryx, $data);

			$query = "UPDATE transstatus set s" . $laststatus . "=s" . $laststatus . "-1 where codetrans='PR' ";
			$query = $query . "UPDATE transstatus set s" . $statuspr . "=s" . $statuspr . "+1 where codetrans='PR' ";
			$eksekusi2 = $this->db->query($query);

			for ($i = 0; $i < count($iditem); $i++) {
				if (is_numeric($qty[$i]) && is_numeric($price[$i]) && is_numeric($iditem[$i])) {
					$dataxx = array($idpr, ($i + 1), $iditem[$i], 1, $qty[$i], $price[$i], ($qty[$i] * $price[$i]));
					$queryxx = "INSERT INTO prdet (idpr,idprdet,iditem,unitvol,qty,price,subpr)VALUES(?,?,?,?,?,?,?)";
					$eksekusixx = $this->db->query($queryxx, $dataxx);
					if ($eksekusixx == true) {
						$respon = "Success";
					} else {
						$respon = "Failed on Detail";
					}
				} else {
					$respon = "Failed on Detail";
				}
			}
		} else {
			$respon = "Failed on Update Header";
		}
		//if (respon=='Success' ){
		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}

	function deletepr($idpr)
	{
		$this->db->trans_start();
		$data = array($idpr);
		$queryx = "SELECT qtypo,statuspr from pr where idpr = ? ";
		$eksekusix = $this->db->query($queryx, $data)->result_object();
		$laststatus = 0;
		$isexists = false;
		if (count($eksekusix) > 0) {
			$lastid = 0;
			foreach ($eksekusix as $key) {
				$lastid = $key->qtypo;
				$laststatus = $key->statuspr;
				$isexists = true;
			}
			if (!$isexists) {
				$respon = "Data not exists";
				$this->db->trans_rollback();
				return $respon;
			}
			if ($lastid != 0) {
				$respon = "Already Used";
				$this->db->trans_rollback();
				return $respon;
			}
		}
		// $query = "DELETE FROM pr where idpr = ? ";
		// $query = $query . "DELETE FROM prdet where idpr = ? ";
		$query = "update pr set statuspr='04' where idpr = ? ";
		//$query = $query . "UPDATE transstatus set s". $laststatus ."=s". $laststatus ."-1 where codetrans='PR' ";
		$query = $query . "UPDATE transstatus set s" . $laststatus . "=s" . $laststatus . "-1,s04=s04+ 1 where codetrans='PR' ";

		$data = array($idpr);
		$eksekusi2 = $this->db->query($query, $data);
		if ($eksekusi2 == TRUE) {
			$respon = "Success";
		} else {
			$respon = "ERROR";
		}
		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}

	function updatepo($iduser, $datepo, $idpr, $idsupp, $attn, $idcurr, $kurs, $typepo, $period, $statuspo, $qtypo, $itempo, $subtotal, $ppn, $ppntotal, $disc, $disctotal, $total, $iditem, $price, $qty, $discsub, $subpo, $idprdet, $idpo, $codepo, $remark, $pph, $pph22, $vat)
	{
		$this->db->trans_start();
		$lastid = 0;
		$laststatus = 0;
		$prstatus = '';
		$oldidpr = 0;
		if ($idpo != '') {
			$data = array($idpo);
			$queryx = "SELECT a.qtyin,a.statuspo,a.idpr,isnull(b.statuspr) as statuspr  from po  as a
						   left join pr as b on a.idpr=b.idpr where a.idpo = ? ";
			$eksekusix = $this->db->query($queryx, $data)->result_object();
			$laststatus = 0;
			$isexists = false;
			if (count($eksekusix) > 0) {
				$lastid = 0;
				foreach ($eksekusix as $key) {
					$lastid = $key->qtyin;
					$laststatus = $key->statuspo;
					$prstatus = $key->statuspr;
					$oldidpr = $key->idpr;
					$isexists = true;
				}
				if (!$isexists) {
					$respon = "Data not exists";
					$this->db->trans_rollback();
					return $respon;
				}
				if ($lastid != 0) {
					$respon = "Already Used";
					$this->db->trans_rollback();
					return $respon;
				}
				if ($laststatus == '04') {
					$respon = "Already Canceled";
					$this->db->trans_rollback();
					return $respon;
				}
			}
		}
		if ($idpo == '') {
			$data = array(substr(date('YmdHisu'), 0, 15), $idpr, $idsupp, $idcurr, $kurs, $datepo, $typepo, $period, $qtypo, $itempo, $total, $attn, $statuspo, date('Y-m-d H:i:s.u'), $iduser, $subtotal, $ppn, $ppntotal, $disc, $disctotal, $remark, $pph22);
			$query = "INSERT INTO po(codepo,idpr,idsupp,idcurr,kurs,datepo,typepo,period,qtypo,itempo,totalpo,attn,statuspo,madelog,madeuser,subtotal,ppn,ppntotal,disc,disctotal,remark,pph22)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
		} else {
			$data = array($idsupp, $idpr, $idcurr, $kurs, $datepo, $typepo, $period, $qtypo, $itempo, $total, $attn, $statuspo, date('Y-m-d H:i:s.u'), $iduser, $subtotal, $ppn, $ppntotal, $disc, $disctotal, $remark, $pph22, $idpo);
			$query = "UPDATE po SET idsupp = ? ,idpr = ? ,idcurr = ? ,kurs = ? ,datepo = ? ,typepo = ? ,period = ? ,qtypo = ? ,itempo = ? ,totalpo = ? ,attn = ? ,statuspo = ? ,madelog = ? ,madeuser = ? ,subtotal = ? ,ppn = ? ,ppntotal = ? ,disc = ? ,disctotal = ? , remark = ? , pph22 = ? WHERE idpo = ? ";
		}

		$eksekusi = $this->db->query($query, $data);

		if ($eksekusi == true) {
			$lastid = 0;
			if ($idpo == '') {
				$queryx = "SELECT @@IDENTITY As lastid";
				$eksekusix = $this->db->query($queryx)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						$lastid = $key->lastid;
					}
				}
			} else {
				$lastid = $idpo;
			}
			if ($lastid != 0) {
				if ($idpo != '' && $laststatus != '04') {
					$data = array($idpo, $idpo, $idpo);
					$queryx = "UPDATE prdet set prdet.qtypo=prdet.qtypo-x.tqty
					from
					(
						select idpr,idprdet,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from podet as a where idpo= ? 
						and exists(select idpo from po as b where a.idpo=b.idpo)
					) as x
					where prdet.idpr=x.idpr and prdet.idprdet=x.idprdet 

					UPDATE pr set pr.qtypo=pr.qtypo-y.tqty
					from
					(
						select idpr,sum((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from podet as a where idpo= ? 
						and exists(select idpo from po as b where a.idpo=b.idpo)
						group by idpr
					) as y
					where pr.idpr=y.idpr 

					DELETE FROM podet where idpo = ? ";
					$eksekusix = $this->db->query($queryx, $data);
				}
				if ($idpo == '') {
					// $query = "SELECT codetrans from transstatus where codetrans='PO';";
					$query = "UPDATE transstatus set s" . $statuspo . "=s" . $statuspo . "+1 where codetrans='PO'; ";
					// $query = $query . "else ";
					$query = "INSERT INTO transstatus(codetrans,s" . $statuspo . ")VALUES('PO',1)";
				} else {
					$query = "UPDATE transstatus set s" . $laststatus . "=s" . $laststatus . "-1 where codetrans='PO'";
					$query = "UPDATE transstatus set s" . $statuspo . "=s" . $statuspo . "+1 where codetrans='PO' ";
				}
				$eksekusi2 = $this->db->query($query);
				$respon = "Success";
				$statuspr = 0;
				if ($oldidpr != $idpr) {

					if ($oldidpr != 0) {
						if ($prstatus != '02') {
							$dataxx = array($oldidpr);
							$queryxx = "UPDATE pr set statuspr='03' where idpr = ? ";
							$queryxx = $queryxx . "UPDATE transstatus set s" . $prstatus . "=s" . $prstatus . "-1,s02=s02+1 where codetrans='PR' ";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
						}
					}
					if ($idpr != 0) {
						$data = array($idpr);
						$queryx = "SELECT statuspr from pr where idpr = ? ";
						$eksekusix = $this->db->query($queryx, $data)->result_object();
						$laststatus = 0;
						$isexists = false;
						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$statuspr = $key->statuspr;
								$isexists = true;
							}
							if (!$isexists) {
								$respon = "Data Request not exists";
								$this->db->trans_rollback();
								return $respon;
							}
							if ($statuspr == '04') {
								$respon = "Data Request Already Canceled";
								$this->db->trans_rollback();
								return $respon;
							}
							if ($statuspr == '03') {
								$respon = "Data Request Already Finish";
								$this->db->trans_rollback();
								return $respon;
							}
						}
						if ($statuspr != '02') {
							$dataxx = array($idpr);
							$queryxx = "UPDATE pr set statuspr='03' where idpr = ? ";
							$queryxx = $queryxx . "UPDATE transstatus set s" . $statuspr . "=s" . $statuspr . "-1,s02=s02+1 where codetrans='PR' ";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
						}
					}
				} else {
					if ($oldidpr != 0) {
						if ($prstatus != '02') {
							$dataxx = array($oldidpr);
							$queryxx = "UPDATE pr set statuspr='02' where idpr = ? ";
							$queryxx = $queryxx . "UPDATE transstatus set s" . $prstatus . "=s" . $prstatus . "-1,s02=s02+1 where codetrans='PR' ";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
						}
					}
				}


				$nopo = '';
				$datapo = array($lastid);
				$querypo = "SELECT * FROM po WHERE idpo = ?";
				$eksekusipo = $this->db->query($querypo, $datapo)->result_object();
				if (count($eksekusipo) > 0) {
					foreach ($eksekusipo as $keypo) {
						$nopo = $keypo->codepo;
					}
				}

				for ($i = 0; $i < count($iditem); $i++) {
					if (is_numeric($qty[$i]) && is_numeric($price[$i]) && is_numeric($iditem[$i]) && is_numeric($discsub[$i]) && is_numeric($pph[$i])) {
						$dataxx = array($lastid, ($i + 1), $idpr, $idprdet[$i], $iditem[$i], 1, $qty[$i], $price[$i], $discsub[$i], $subpo[$i], $pph[$i], $vat[$i]);
						$queryxx = "INSERT INTO podet (idpo,idpodet,idpr,idprdet,iditem,unitvol,qty,price,discper,subpo,pph,vat)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
						$eksekusixx = $this->db->query($queryxx, $dataxx);
						if ($eksekusixx == true) {
							if ($idpr != '' && $statuspo != '04') {

								$dataxx = array($qty[$i], $idpr, $idprdet[$i], $qty[$i], $idpr);
								$queryxx = "UPDATE prdet set qtypo=qtypo + ? where idpr = ? and idprdet = ?;";
								$queryxx = "UPDATE pr set qtypo=qtypo";
								$eksekusixx = $this->db->query($queryxx, $dataxx);

								if ($eksekusixx == true) {
									$respon = "Success dengan Nomor PO " . $nopo;
								} else {
									$respon = "Failed on Detail Qty Pr";
									break;
								}
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
			}
		} else {
			$respon = "Failed on Update Header";
		}
		//if (respon=='Success' ){
		if (($this->db->trans_status() === FALSE) || strpos($respon, "Success") === false) {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}


	function deletepo($idpo)
	{
		$this->db->trans_start();
		$data = array($idpo);
		$prstatus = '';
		//$queryx = "SELECT qtyin,statuspo,idpr from po where idpo = ? ";
		$queryx = "SELECT po.qtyin,po.statuspo,po.idpr,isnull(pr.statuspr,'') as statuspr  from po,pr 
			where po.idpr = pr.idpr and po.idpo = ? ";
		$eksekusix = $this->db->query($queryx, $data)->result_object();
		// print_r($this->db->last_query())
		// echo $queryx;
		$laststatus = 0;
		$isexists = false;
		if (count($eksekusix) > 0) {
			$lastid = 0;
			foreach ($eksekusix as $key) {
				$lastid = $key->qtyin;
				$laststatus = $key->statuspo;
				$prstatus = $key->statuspr;
				$oldidpr = $key->idpr;
				$isexists = true;
			}
			if (!$isexists) {
				$respon = "Data not exists";
				$this->db->trans_rollback();
				return $respon;
			}
			if ($lastid != 0) {
				$respon = "Already Used";
				$this->db->trans_rollback();
				return $respon;
			}
			if ($laststatus == '04') {
				$respon = "Already Canceled";
				$this->db->trans_rollback();
				return $respon;
			}
		}
		// $query = "DELETE FROM pr where idpr = ? ";
		// $query = $query . "DELETE FROM prdet where idpr = ? ";

		if ($laststatus != '04') {
			$data = array($idpo, $idpo, $idpo);
			$queryx = "UPDATE prdet set prdet.qtypo=prdet.qtypo-x.tqty
				from
				(
					select idpr,idprdet,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from podet as a where idpo= ? 
					--and exists(select idpo from po as b where a.idpo=b.idpo)
				) as x
				where prdet.idpr=x.idpr and prdet.idprdet=x.idprdet 

				UPDATE pr set pr.qtypo=pr.qtypo-y.tqty
				from
				(
					select idpr,sum((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from podet as a where idpo= ? 
					--and exists(select idpo from po as b where a.idpo=b.idpo)
					group by idpr
				) as y
				where pr.idpr=y.idpr  ";
			if ($prstatus != '02') {
				$queryx = $queryx . "UPDATE transstatus set s01" . $prstatus . "=s" . $prstatus . "01,s02=s02+1 where codetrans='PR' ";
			}
			$queryx = $queryx . "UPDATE po set statuspo='04' where idpo = ? ";
			$queryx = $queryx . "UPDATE transstatus set s01=s" . $laststatus . "1,s04=s04+1 where codetrans='PO' ";
			$eksekusi2 = $this->db->query($queryx, $data);
			// $data = array($idpr);
			// $eksekusi2 = $this->db->query($query,$data);
			if ($eksekusi2 == TRUE) {
				$respon = "Success";
			} else {
				$respon = "ERROR";
			}
		}
		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}


	function getcurrstatus($codetrans)
	{
		// $date = date("Y-m-d");
		// $data = array($date);
		$data = array($codetrans, $codetrans);
		$query = "SELECT * from (SELECT * FROM transstatus WHERE codetrans = ? union all
		SELECT 0,'0',?,0,0,0,0 ) as x
		order by idtrans desc ";
		$eksekusi = $this->db->query($query, $data)->result_object();
		$respon = array();
		foreach ($eksekusi as $key) {
			$f["codetrans"] =  $key->codetrans;
			$f["s01"] =  $key->s01;
			$f["s02"] =  $key->s02;
			$f["s03"] =  $key->s03;
			$f["s04"] =  $key->s04;
			//array_push($respon,$f);
		}
		return $f;
	}

	function readheaderpr($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT * from pr where idpr = ?";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpr"]	= $key->idpr;
				$f["codepr"]	= $key->codepr;
				$f["idsupp"]	= $key->idsupp;
				$f["idcurr"]	= $key->idcurr;
				$f["datepr"]	= $key->datepr;
				$f["typepr"]	= $key->typepr;
				$f["period"]	= $key->period;
				$f["qtypr"]	    = $key->qtypr;
				$f["itempr"]	= $key->itempr;
				$f["totalpr"]	= $key->totalpr;
				$f["statuspr"]	= $key->statuspr;
				$f["attn"]	    = $key->attn;
				$f["subtotal"]	= $key->subtotal;
				$f["ppn"]	    = $key->ppn;
				$f["ppntotal"]	= $key->ppntotal;
				$f["typereq"]	= $key->typereq;

				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailpr($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem,a.pph22,a.VAT from prdet as b
				inner join tb_item as a on b.iditem=a.iditem  where b.idpr = ? order by idprdet
				";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["idpr"]	= $key->idpr;
				$f["idprdet"]	= $key->idprdet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	= $key->sku;
				$f["nameitem"]	= $key->nameitem;
				$f["price"]	= $key->price;
				$f["pph22"]	= $key->pph22;
				$f["qty"]	= $key->qty;
				$f["unitvol"]	=  (($key->unitvol == 0) ? 1 : $key->unitvol);
				$f["qtypo"]	= $key->qtypo;
				$f["qtystd"]	= ($f["qty"] * $f["unitvol"]) - $f["qtypo"];
				$f["subpr"]	= $key->subpr;
				$f["vat"]	= $key->VAT;
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
		$query = "SELECT a.*,b.codepr,b.datepr from po as a
						  left join pr as b on a.idpr=b.idpr  where a.idpo = ?";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpo"]	= $key->idpo;
				$f["idpr"]	= $key->idpr;
				$f["codepr"]	= $key->codepr;
				$f["datepr"]	= $key->datepr;
				$f["codepo"]	= $key->codepo;
				$f["idsupp"]	= $key->idsupp;
				$f["idcurr"]	= $key->idcurr;
				$f["kurs"]	= $key->kurs;

				$f["datepo"]	= $key->datepo;
				$f["typepo"]	= $key->typepo;
				$f["period"]	= $key->period;
				$f["qtypo"]	= $key->qtypo;
				$f["itempo"]	= $key->itempo;
				$f["totalpo"]	= $key->totalpo;
				$f["statuspo"]	= $key->statuspo;

				$f["attn"]	= $key->attn;

				$f["subtotal"]	= $key->subtotal;
				$f["ppn"]	= $key->ppn;
				$f["ppntotal"]	= $key->ppntotal;
				$f["disc"]	= $key->disc;
				$f["disctotal"]	= $key->disctotal;
				$f["remark"]	= $key->remark;


				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailpo($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,b.vat as vatx,a.sku,a.nameitem,a.pph22, a.VAT  from podet as b
				inner join tb_item as a on b.iditem=a.iditem  where b.idpo = ? order by idpodet";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["idpo"]	= $key->idpo;
				$f["idpodet"]	= $key->idpodet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	= $key->sku;
				$f["nameitem"]	= $key->nameitem;
				$f["price"]	= $key->price;
				$f["qty"]	= $key->qty;
				$f["unitvol"]	=  (($key->unitvol == 0) ? 1 : $key->unitvol);
				$f["qtyin"]	= $key->qtyin;
				$f["pph22"]	= $key->pph;
				$f["vat"]	= $key->vatx;
				$f["vats"]	= $key->VAT;
				$f["disc"]	= $key->discper;
				$f["qtystd"]	= ($f["qty"] * $f["unitvol"]) - $f["qtyin"];
				$f["subpo"]	= $key->subpo;
				$f["idprdet"]	= $key->idprdet;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailposum($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem,a.usesn from 
					(select pph,idpo,iditem,max(idpodet) as idpodet,sum(qty*unitvol) as qty,sum(qtyin) as qtyin  from podet 
					where idpo = ? 
					group by idpo,iditem,pph ) as b
					inner join tb_item as a on b.iditem=a.iditem 
					order by idpodet
				";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["pph"]	    = $key->pph;
				$f["idpo"]	    = $key->idpo;
				$f["idpodet"]	= $key->idpodet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	    = $key->sku;
				$f["nameitem"]	= $key->nameitem;
				$f["qty"]	= $key->qty;
				$f["qtyin"]	= $key->qtyin;
				$f["usesn"]	= $key->usesn;
				$f["qtystd"]	= $f["qty"] - $f["qtyin"];

				$datax = array($f["iditem"], $f["idpo"]);
				$queryx = "SELECT * FROM podet WHERE iditem = ? AND idpo = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["price"] = $keyx->price;
						$f["subpo"] = $keyx->subpo;
						$f["discper"] = $keyx->discper;
					}
				}

				$data2 = array($f["idpo"]);
				$query1 = "SELECT * FROM invinret WHERE idpo = ?";
				$eksekusi1 = $this->db->query($query1, $data2)->result_object();
				if (count($eksekusi1) > 0) {

					foreach ($eksekusi1 as $keyx) {
						$f["itemret"] = $keyx->iteminret;

						$data3 = array($f["idpo"], $f["iditem"]);
						$query2 = "SELECT SUM(qty) AS qty FROM invinretdet WHERE idpo = ? AND iditem = ?";
						$eksekusi2 = $this->db->query($query2, $data3)->result_object();
						if (count($eksekusi2) > 0) {
							foreach ($eksekusi2 as $keyy) {
								if ($keyy->qty != null) {
									$f["qtyret"] = $keyy->qty;
								} else {
									$f["qtyret"] = "0.0000";
								}
							}
						} else {
							$f["qtyret"] = "0.0000";
						}
					}
				} else {
					$f["itemret"] = 0;
					$f["qtyret"] = "0.0000";
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}



	function getlistpr($cond)
	{
		// $date = date("Y-m-d");
		//$data = array($status);
		$query = "SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,u1.username as madeuser,u2.username as upduser
				from pr as a
				left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
				left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
				left join tb_user as u1 on a.madeuser=u1.iduser
				left join tb_user as u2 on a.upduser=u2.iduser
				left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspr=st.codecomm  ";

		$query = $query . " where 1=1 " . $cond;
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepr"]	= $key->codepr;
				$f["datepr"]	= $key->datepr;
				$f["idsupp"]	= $key->idsupp;
				$f["idcurr"]	= $key->idcurr;
				$f["namesupp"]	= $key->namesupp;
				$f["itemcount"]	= $key->itemcount;
				$f["totalpr"]	= $key->totalpr;
				$f["statuspr"]	= $key->statuspr;
				$f["nameuser"]	= $key->madeuser;
				$f['idpr']		= $key->idpr;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistreportprpagination($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $date = date("Y-m-d");
		// $data = array($status);
		// $query = "SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,u1.username as madeuser,u2.username as upduser
		// 		from pr as a
		// 		left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
		// 		left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
		// 		left join tb_user as u1 on a.madeuser=u1.iduser
		// 		left join tb_user as u2 on a.upduser=u2.iduser
		// 		left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspr=st.codecomm  ";

		$data  = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8)  AS t WHERE " . $filter . " LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = " SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8)  AS t WHERE REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8) AS t WHERE statuspr = '$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8)  AS t WHERE " . $filter . " LIKE ? AND REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8)  AS t WHERE " . $filter . " LIKE ? AND statuspr = '$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8)  AS t WHERE REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ?  AND statuspr = '$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8)  AS t WHERE " . $filter . " LIKE ? AND REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ?  AND statuspr = '$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT  a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,
            s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,
	         u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
            left join common_detail as s on a.idsupp = s.idcomm
            left join common_detail as c on a.idcurr = c.idcomm
            left join tb_user as u1 on a.madeuser = u1.iduser
            left join tb_user as u2 on a.upduser=u2.iduser
            left join common_detail as st on a.statuspr = st.codecomm
			AND st.idgroup=8)  AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}
		$eksekusi = $this->db->query($query, $data)->result_object();

		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepr"]	= $key->codepr;
				$f["datepr"]	= $key->datepr;
				$f["idsupp"]	= $key->idsupp;
				$f["idcurr"]	= $key->idcurr;
				$f["namesupp"]	= $key->namesupp;
				$f["itemcount"]	= $key->itemcount;
				$f["totalpr"]	= $key->totalpr;
				$f["statuspr"]	= $key->statuspr;
				$f["nameuser"]	= $key->madeuser;
				$f['idpr']		= $key->idpr;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function countreportpr($filter, $search, $date1, $date2, $status)
	{

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->join('common_detail', 'pr.idsupp = common_detail.idcomm', 'left');
		$this->db->join('tb_user', 'pr.madeuser = tb_user.iduser', 'left');
		$this->db->where('idgroup', 8);
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('datepr', $date1, $date2);
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('common_detail.namecomm', $status, $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'datepr', $date1, $date2);
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->like($filter, $search, $status);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('datepr', $date1, $date2, $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $search, 'datepr', $date1, $date2, $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getlistprpagination($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $date = date("Y-m-d");
		// $data = array($status);
		// $query = "SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,u1.username as madeuser,u2.username as upduser
		// 		from pr as a
		// 		left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
		// 		left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
		// 		left join tb_user as u1 on a.madeuser=u1.iduser
		// 		left join tb_user as u2 on a.upduser=u2.iduser
		// 		left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspr=st.codecomm  ";

		$data  = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
			s.namecomm as namesupp,s.namecomm ,a.itempr as itemcount,
			a.totalpr,a.statuspr,u1.username as madeuser,u2.username,
					ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
					 inner join common_detail as s on a.idsupp = s.idcomm 
					 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
					 inner join tb_user as u1 on a.madeuser = u1.iduser
					 inner join tb_user as u2 on a.madeuser = u2.iduser)  AS t
					WHERE " . $filter . " LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
			s.namecomm as namesupp,s.namecomm ,a.itempr as itemcount,
			a.totalpr,a.statuspr,u1.username as madeuser,u2.username,
					ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
					 inner join common_detail as s on a.idsupp = s.idcomm 
					 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
					 inner join tb_user as u1 on a.madeuser = u1.iduser
					 inner join tb_user as u2 on a.madeuser = u2.iduser)  AS t
					WHERE REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
			s.namecomm as namesupp,s.namecomm ,a.itempr as itemcount,
			a.totalpr,a.statuspr,u1.username as madeuser,u2.username,
					ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
					 inner join common_detail as s on a.idsupp = s.idcomm 
					 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
					 inner join tb_user as u1 on a.madeuser = u1.iduser
					 inner join tb_user as u2 on a.madeuser = u2.iduser)  AS t
					WHERE status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
			s.namecomm as namesupp,s.namecomm ,a.itempr as itemcount,
			a.totalpr,a.statuspr,u1.username as madeuser,u2.username,
					ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
					 inner join common_detail as s on a.idsupp = s.idcomm 
					 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
					 inner join tb_user as u1 on a.madeuser = u1.iduser
					 inner join tb_user as u2 on a.madeuser = u2.iduser)  AS t
					WHERE $filter LIKE ? AND REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
			s.namecomm as namesupp,s.namecomm ,a.itempr as itemcount,
			a.totalpr,a.statuspr,u1.username as madeuser,u2.username,
					ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
					 inner join common_detail as s on a.idsupp = s.idcomm 
					 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
					 inner join tb_user as u1 on a.madeuser = u1.iduser
					 inner join tb_user as u2 on a.madeuser = u2.iduser)  AS t
					WHERE $filter LIKE ? AND status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
			s.namecomm as namesupp,s.namecomm ,a.itempr as itemcount,
			a.totalpr,a.statuspr,u1.username as madeuser,u2.username,
					ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
					 inner join common_detail as s on a.idsupp = s.idcomm 
					 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
					 inner join tb_user as u1 on a.madeuser = u1.iduser
					 inner join tb_user as u2 on a.madeuser = u2.iduser)  AS t
					WHERE REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ? AND status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
			s.namecomm as namesupp,s.namecomm ,a.itempr as itemcount,
			a.totalpr,a.statuspr,u1.username as madeuser,u2.username,
					ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
					 inner join common_detail as s on a.idsupp = s.idcomm 
					 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
					 inner join tb_user as u1 on a.madeuser = u1.iduser
					 inner join tb_user as u2 on a.madeuser = u2.iduser)  AS t
					WHERE $filter LIKE ? AND REPLACE(datepr, ' ', '') >= ? AND REPLACE(datepr, ' ', '') <= ? AND status ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,d.namecomm as status,
						s.namecomm as namesupp,s.namecomm as namecurr,a.itempr as itemcount,
						a.totalpr,a.statuspr,u1.username as madeuser,
						ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM pr as a
						 inner join common_detail as s on a.idsupp = s.idcomm 
						 inner join common_detail as c on a.idcurr = c.idcomm 
						 inner join common_detail as d on a.statuspr = d.codecomm AND d.idgroup = '8'
						 inner join tb_user as u1 on a.madeuser = u1.iduser )  AS t
						WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo "$str";
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepr"]	= $key->codepr;
				$f["datepr"]	= $key->datepr;
				$f["idsupp"]	= $key->idsupp;
				$f["idcurr"]	= $key->idcurr;
				$f["namesupp"]	= $key->namesupp;
				$f["itemcount"]	= $key->itemcount;
				$f["totalpr"]	= $key->totalpr;
				$f["statuspr"]	= $key->statuspr;
				$f["namecomm"]	= $key->status;
				$f["nameuser"]	= $key->madeuser;
				$f['idpr']		= $key->idpr;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function countpr($filter, $search, $date1, $date2, $status)
	{
		// return $this->db->get('pr')->num_rows();
		$this->db->select('*');
		$this->db->from('pr');
		$this->db->join('common_detail', 'pr.idsupp = common_detail.idcomm', 'left');
		$this->db->join('tb_user', 'pr.madeuser = tb_user.iduser', 'left');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('datepr', $date1, $date2);
		} else if ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('namecomm', $status);
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where($filter, $search, 'datepr', $date1, $date2);
		} else if ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where($filter, $search, 'namecomm', $status);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('datepr', $date1, $date2, 'namecomm', $status);
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $search, 'datepr', $date1, $date2, 'namecomm', $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getlistpo($cond)
	{
		$query = "SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st. namecomm as statuspo,u1.username as madeuser,u2.username as upduser
				from (select idpr,pph22,idpo,codepo,datepo,idsupp,idcurr,itempo,qtypo,qtyin,totalpo,madeuser,upduser,case when qtypo<=qtyin then '03' else case when qtyin>0 and statuspo!='03' then '02' else statuspo end end as statuspo from po) as a
				left join (select idpr,codepr from pr ) as p on a.idpr=p.idpr
				left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
				left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
				left join tb_user as u1 on a.madeuser=u1.iduser
				left join tb_user as u2 on a.upduser=u2.iduser
				left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspo=st.codecomm";


		$query = $query . " where 1=1 " . $cond;
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepo"]	= $key->codepo;
				$f["codepr"]	= $key->codepr;
				$f["datepo"]	= $key->datepo;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["itemcount"]	= $key->itemcount;
				$f["totalpo"]	= $key->totalpo;
				$f["statuspo"]	= $key->statuspo;
				$f["codestatus"]	= $key->codestatus;
				$f["nameuser"]	= $key->madeuser;
				$f['idpo']		= $key->idpo;
				$f['pph22']		= $key->pph22;

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

	function getlistreportpopagination($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $this->db->select('a.statuspo as codestatus, a.pph22, a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,u2.username as upduser');
		// $this->db->from('po as a');
		// $this->db->join('pr as p', 'a.idpr = p.idpr', 'left');
		// $this->db->join('common_detail as s', 'a.idsupp = s.idcomm', 'left');
		// $this->db->join('common_detail as c', 'a.idcurr = c.idcomm', 'left');
		// $this->db->join('tb_user as u1', 'a.madeuser = u1.iduser', 'left');
		// $this->db->join('tb_user as u2', 'a.upduser = u2.iduser', 'left');
		// $this->db->join('common_detail as st', 'a.statuspo = st.codecomm', 'left');
		// $this->db->where('s.idgroup=1');
		// $this->db->where('c.idgroup=3');
		// $this->db->where('st.idgroup=8');
		// $this->db->limit($start, $limit);

		$data = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo,
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a
            inner join pr as p on a.idpr = p.idpr
            inner join common_detail as s on a.idsupp = s.idcomm
            inner join common_detail as c on a.idcurr = c.idcomm
            inner join tb_user as u1 on a.madeuser = u1.iduser
            inner join common_detail as st on a.statuspo = st.codecomm
			AND st.idgroup='8')  AS t WHERE " . $filter . " LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo,
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a
            inner join pr as p on a.idpr = p.idpr
            inner join common_detail as s on a.idsupp = s.idcomm
            inner join common_detail as c on a.idcurr = c.idcomm
            inner join tb_user as u1 on a.madeuser = u1.iduser
            inner join common_detail as st on a.statuspo = st.codecomm
			AND st.idgroup='8')  AS t WHERE REPLACE(datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo,
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a
            inner join pr as p on a.idpr = p.idpr
            inner join common_detail as s on a.idsupp = s.idcomm
            inner join common_detail as c on a.idcurr = c.idcomm
            inner join tb_user as u1 on a.madeuser = u1.iduser
            inner join common_detail as st on a.statuspo = st.codecomm
			AND st.idgroup='8')  AS t WHERE statuspo ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo,
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a
            inner join pr as p on a.idpr = p.idpr
            inner join common_detail as s on a.idsupp = s.idcomm
            inner join common_detail as c on a.idcurr = c.idcomm
            inner join tb_user as u1 on a.madeuser = u1.iduser
            inner join common_detail as st on a.statuspo = st.codecomm
			AND st.idgroup='8')  AS t WHERE " . $filter . " LIKE ? AND REPLACE(datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo, 
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr, 
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,c.idgroup, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a inner join pr as p
			 on a.idpr = p.idpr inner join common_detail as s on a.idsupp = s.idcomm inner join common_detail as c 
			 on a.idcurr = c.idcomm inner join tb_user as u1 on a.madeuser = u1.iduser inner join common_detail as st
			 on a.statuspo = st.codecomm AND st.idgroup='8') AS t WHERE t.$filter LIKE '%$search%' AND t.statuspo = '$status' and t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array($date1, $date2, $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo, 
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr, 
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,c.idgroup, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a inner join pr as p
			 on a.idpr = p.idpr inner join common_detail as s on a.idsupp = s.idcomm inner join common_detail as c 
			 on a.idcurr = c.idcomm inner join tb_user as u1 on a.madeuser = u1.iduser inner join common_detail as st
			 on a.statuspo = st.codecomm AND st.idgroup='8') AS t WHERE REPLACE(t.datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND statuspo = '$status' and t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo, 
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr, 
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,c.idgroup, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a inner join pr as p
			 on a.idpr = p.idpr inner join common_detail as s on a.idsupp = s.idcomm inner join common_detail as c 
			 on a.idcurr = c.idcomm inner join tb_user as u1 on a.madeuser = u1.iduser inner join common_detail as st
			 on a.statuspo = st.codecomm AND st.idgroup='8') AS t WHERE " . $filter . " LIKE ? AND REPLACE(t.datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND statuspo = '$status' and t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo, 
			a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr, 
			a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,u1.username as madeuser,c.idgroup, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM po as a inner join pr as p
			 on a.idpr = p.idpr inner join common_detail as s on a.idsupp = s.idcomm inner join common_detail as c 
			 on a.idcurr = c.idcomm inner join tb_user as u1 on a.madeuser = u1.iduser inner join common_detail as st
			 on a.statuspo = st.codecomm AND st.idgroup='8') AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo ($str);
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepo"]	= $key->codepo;
				$f["codepr"]	= $key->codepr;
				$f["datepo"]	= $key->datepo;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["itemcount"]	= $key->itemcount;
				$f["totalpo"]	= $key->totalpo;
				$f["statuspo"]	= $key->statuspo;
				$f["codestatus"]	= $key->codestatus;
				$f["nameuser"]	= $key->madeuser;
				$f['idpo']		= $key->idpo;
				$f['pph22']		= $key->pph22;

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


	function countreportpo($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('po');
		$this->db->join('pr', 'po.idpr = pr.idpr', 'left');
		$this->db->join('common_detail', 'po.idsupp = common_detail.idcomm', 'left');
		$this->db->join('tb_user', 'pr.madeuser = tb_user.iduser', 'left');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('po.datepo', $date1, $date2);
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('common_detail.namecomm', $status, $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'po.datepo', $date1, $date2);
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->like($filter, $search, $status);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('po.datepo', $date1, $date2, $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $search, 'po.datepo', $date1, $date2, $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getlistpopagination($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT a.statuspo as codestatus, a.pph22, a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st. namecomm as statuspo,u1.username as madeuser,u2.username as upduser
		// 		from (select idpr,pph22,idpo,codepo,datepo,idsupp,idcurr,itempo,qtypo,qtyin,totalpo,madeuser,upduser,case when qtypo<=qtyin then '03' else case when qtyin>0 and statuspo!='03' then '02' else statuspo end end as statuspo from po) as a
		// 		left join (select idpr,codepr from pr ) as p on a.idpr=p.idpr
		// 		left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
		// 		left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
		// 		left join tb_user as u1 on a.madeuser=u1.iduser
		// 		left join tb_user as u2 on a.upduser=u2.iduser
		// 		left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspo=st.codecomm";
		$data  = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE " . $filter . " LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE REPLACE(datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE statuspo ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE " . $filter . " LIKE ? AND REPLACE(datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE " . $filter . " LIKE ? AND statuspo ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE REPLACE(datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND statuspo ='$status' AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $status, $start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE " . $filter . " LIKE ? AND REPLACE(datepo, ' ', '') >= ? AND REPLACE(datepo, ' ', '') <= ? AND statuspo ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.* FROM (SELECT a.statuspo as codestatus, a.pph22,
			 a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,
			s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st.namecomm as statuspo,
			u1.username as madeuser,u2.username as upduser, 
			ROW_NUMBER() OVER (Order by a.idpr) AS RowNumber FROM 
			po as a 
			left join pr as p on a.idpr = p.idpr 
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as c  on a.idcurr = c.idcomm 
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.madeuser = u2.iduser 
			left join common_detail as st on a.statuspo = st.codecomm AND st.idgroup='8' ) 
			AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepo"]	= $key->codepo;
				$f["codepr"]	= $key->codepr;
				$f["datepo"]	= $key->datepo;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["itemcount"]	= $key->itemcount;
				$f["totalpo"]	= $key->totalpo;
				$f["statuspo"]	= $key->statuspo;
				$f["codestatus"]	= $key->codestatus;
				$f["nameuser"]	= $key->madeuser;
				$f['idpo']		= $key->idpo;
				$f['pph22']		= $key->pph22;

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


	function countpo($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('po');
		$this->db->join('pr', 'po.idpr = pr.idpr', 'left');
		$this->db->join('common_detail', 'po.idsupp = common_detail.idcomm', 'left');
		$this->db->join('tb_user', 'pr.madeuser = tb_user.iduser', 'left');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('po.datepo', $date1, $date2);
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('common_detail.namecomm', $status, $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'po.datepo', $date1, $date2);
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->like($filter, $search, $status);
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('po.datepo', $date1, $date2, $status);
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $search, 'po.datepo', $date1, $date2, $status);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getlastrequestseq()
	{
		$date = date("Y-m-d");
		$data = array($date);
		$query = "SELECT * FROM tb_requestheader WHERE transdate = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$transeq = $key->transeq;
				$respon = $transeq + 1;
			}
		} else {
			$respon = 1;
		}

		return $respon;
	}

	function insertquotation($transdate, $transeq, $idcust, $item, $qty, $adduser)
	{
		$norequest = date('YmdHis');
		$data = array($transdate, $transeq, $norequest, $idcust, $adduser);
		$query = "INSERT INTO tb_requestheader (transdate,transeq,norequest,idcust,adduser,idmedia,status)VALUES(?,?,?,?,?,'1','wait')";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			for ($i = 0; $i < count($item); $i++) {
				$data1 = array($norequest, $item[$i], $qty[$i]);
				$query1 = "INSERT INTO tb_requestdetail (norequest,iditem,qty)VALUES(?,?,?)";
				$eksekusi1 = $this->db->query($query1, $data1);
				if ($eksekusi1 == true) {
					$respon = "Success";
				} else {
					$respon = "Failed";
				}
			}
		} else {
			$respon = "Failed";
		}

		return $respon;
	}



	// function getlisrequestcounter()
	// {
	// 	$query = "SELECT * FROM tb_requestitemcounterheader,tb_user WHERE tb_requestitemcounterheader.madeuser = tb_user.iduser ORDER BY tb_requestitemcounterheader.daterequest ASC";
	// 	$eksekusi = $this->db->query($query)->result_object();
	// 	if (count($eksekusi) > 0) {
	// 		$respon = array();
	// 		foreach ($eksekusi as $key) {
	// 			$f["idrequestheader"] = $key->idrequestheader;
	// 			$f["namerequest"] = $key->namerequest;
	// 			$f["norequest"] = $key->norequest;
	// 			$f["daterequest"] = $key->daterequest;
	// 			$f["totalreq"] = $key->totalreq;
	// 			$f["fullname"] = $key->fullname;
	// 			$f["statusreq"] = $key->statusreq;

	// 			$data = array($key->norequest);
	// 			$query1 = "SELECT * FROM tb_requestitemcounterdetail, tb_item WHERE tb_requestitemcounterdetail.norequest = ? AND tb_requestitemcounterdetail.iditem = tb_item.iditem";
	// 			$eksekusi1 = $this->db->query($query1, $data)->result_object();
	// 			if (count($eksekusi1) > 0) {
	// 				$f["data"] = array();
	// 				foreach ($eksekusi1 as $keyx) {
	// 					$g["idrequestdetail"] = $keyx->idrequestdetail;
	// 					$g["nameitem"] = $keyx->nameitem;
	// 					$g["sku"] = $keyx->sku;
	// 					$g["qty"] = $keyx->qty;
	// 					$g["qtyin"] = $keyx->qtyin;

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

	function getlisrequestcounterpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		// $query = "SELECT * FROM tb_requestitemcounterheader,tb_user WHERE tb_requestitemcounterheader.madeuser = tb_user.iduser ORDER BY tb_requestitemcounterheader.daterequest ASC";

		$data = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE $filter LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE statusreq ='$status'  AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE $filter LIKE ? AND REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE $filter LIKE ? AND statusreq ='$status'  AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND statusreq ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE $filter LIKE ? AND REPLACE(daterequest, ' ', '') >= ? AND REPLACE(daterequest, ' ', '') <= ? AND statusreq ='$status' AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT tb_requestitemcounterheader.idrequestheader ,tb_requestitemcounterheader.namerequest,tb_requestitemcounterheader.norequest
			        ,tb_requestitemcounterheader.daterequest,tb_requestitemcounterheader.totalreq,tb_user.fullname,tb_requestitemcounterheader.statusreq,
					ROW_NUMBER() OVER (Order by tb_requestitemcounterheader.daterequest) AS RowNumber 
					FROM tb_requestitemcounterheader left join tb_user on tb_requestitemcounterheader.madeuser = tb_user.iduser)  
					AS t WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}
		$eksekusi = $this->db->query($query, $data)->result_object();
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

	function countcr($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('tb_requestitemcounterheader');
		$this->db->join('tb_user', 'tb_requestitemcounterheader.madeuser = tb_user.iduser');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		}
		if ($search = "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('tb_requestitemcounterheader.daterequest', $date1, $date2);
		}
		if ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->like('tb_requestitemcounterheader.statusreq', $status);
		}
		if ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->like($filter, $search, 'tb_requestitemcounterheader.daterequest', $date1, $date2);
		}
		if ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->like($filter, $search, 'statusreq', $status);
		}
		if ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->like('statusreq', $status, 'tb_requestitemcounterheader.daterequest', $date1, $date2);
		}
		if ($search != "" && $date1 != "" && $date2 == "" && $status != "") {
			$this->db->like($filter, $search, 'statusreq', $status, 'tb_requestitemcounterheader.daterequest', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}
}
