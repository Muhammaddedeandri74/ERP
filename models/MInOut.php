<?php


class MInOut extends CI_Model
{

	// pakets
	function deletepakets($idpakets)
	{
		$this->db->trans_start();
		$respon = "Success";
		$queryx = "SELECT c.iditem,i.nameitem,d.expdate,a.endqty,isnull(b.endqty,0)as expqty,isnull(d.qty,0) as inqty,isnull(c.qty,0) as inqtyexp
	from (select iditem,idwh,sum(qty) as qty from dbo.idpaketsdet where idpakets= ? group by iditem,idwh ) as c
	inner join (select iditem,idwh,expdate,sum(qty) as qty from dbo.idpaketsdet where idpakets= ? group by iditem,idwh,expdate ) as d
	on c.iditem=d.iditem and c.idwh=d.idwh
	inner join (select iditem,nameitem from dbo.tb_item ) as i
	on c.iditem=i.iditem
	left join (select iditem,idwh,endqty from dbo.tb_itemqty) as a
	on c.iditem=a.iditem and c.idwh=a.idwh
	left join (select iditem,idwh,endqty,expdate from dbo.tb_itemqtyexp ) as b
	on c.iditem=b.iditem and c.idwh=b.idwh and d.expdate=b.expdate
	";
		$data = array($idpakets, $idpakets);

		$eksekusix = $this->db->query($queryx, $data)->result_object();

		if (count($eksekusix) > 0) {
			foreach ($eksekusix as $key) {
				$qiditem = $key->iditem;
				$qnameitem = $key->nameitem;
				$qexpdate = $key->expdate;

				$qendqty = $key->endqty;
				$qinqty = $key->inqty;
				$qexpqty = $key->expqty;
				$qinqtyexp = $key->inqtyexp;
				if (($qendqty - $qinqty) < 0) {
					$respon = "Stock " . $qnameitem . " Minus";
					break;
				} else if (($qexpqty - $qinqtyexp) < 0) {
					$respon = "Stock Expired " . $qnameitem . " Minus";
					break;
				}
			}
		}
		if ($respon == "Success") {
			$data = array($idpakets, $idpakets, $idpakets, $idpakets, $idpakets, $idpakets, $idpakets);
			$queryx = "UPDATE tb_itemqtyexp set tb_itemqtyexp.outty=tb_itemqtyexp.outqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty+x.tqty
		from
		(
			select expdates as expdate,idwh,iditems as iditem,qtys as tqty from pakets as a where idpakets= ? 
		) as x
		where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

		UPDATE tb_itemqty  set tb_itemqty.outqty=tb_itemqty.outqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty+x.tqty
		from
		(
			select idwh,iditems as iditem,qtys as tqty from pakets as a where idpakets= ? 
		) as x
		where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh


		UPDATE tb_itemqtyexp  set tb_itemqtyexp.inqty=tb_itemqtyexp.inqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty-x.tqty
		from
		(
			select expdate,idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketsdet as a where idpakets= ? 
		) as x
		where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

		UPDATE tb_itemqty  set tb_itemqty.inqty=tb_itemqty.inqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty-x.tqty
		from
		(
			select idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketsdet as a where idpakets= ? 
		) as x
		where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

		DELETE FROM paketsdet where idpakets = ? 

		DELETE FROM pakets where idpakets = ?
		";
			$eksekusi2 = $this->db->query($queryx, $data);




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

	function readheaderpakets($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT a.*,s.sku,s.nameitem,w.codecomm as codewh from pakets as a
				left join (select iditem,sku,nameitem from tb_item) as s on a.iditems=s.iditem
				left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
				where a.idpakets = ?
			";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpakets"]	= $key->idpakets;
				$f["codepakets"]	= $key->codepakets;
				$f["codewh"]	= $key->codewh;
				$f["sku"]	= $key->sku;
				$f["iditems"]	= $key->iditems;
				$f["idsnp"]	= $key->idsnp;
				$f["idsnp2"]	= $key->idsnp2;

				$f["datepakets"]	= $key->datepakets;
				$f["qtys"]	= $key->qtys;
				$f["qtypakets"]	= $key->qtypakets;
				$f["itempakets"]	= $key->itempakets;

				$f["descinfo"]	= $key->descinfo;
				$f["idwh"]	= $key->idwh;
				$f["expdates"]	= $key->expdates;

				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailpakets($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem from paketsdet as b
	inner join tb_item as a on b.iditem=a.iditem  where b.idpakets = ? order by idpaketsdet
	";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["idpakets"]	= $key->idpakets;
				$f["idpaketsdet"]	= $key->idpaketsdet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	= $key->sku;
				$f["expdate"]	= $key->expdate;
				$f["nameitem"]	= $key->nameitem;
				$f["qty"]	= $key->qty;
				$f["snid"]	= $key->snid;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function updatepakets($iduser, $datepakets, $typepakets, $iditems, $expdates, $idsnp, $idsnp2, $descinfo, $qtys, $qtypakets, $itempakets, $iditem, $expdate, $qty, $idwh, $idpakets, $codepakets)
	{
		$this->db->trans_start();
		$lastid = 0;
		$oldidwh = 0;
		$respon = "Success";
		if ($respon == "Success") {

			if ($idpakets == '') {
				$data = array(substr(date('YmdHisu'), 0, 15), $iditems, $qtys, $datepakets, $qtypakets, $itempakets, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idsnp, $idsnp2, $expdates, $idwh);
				$query = "INSERT INTO pakets(codepakets,iditems,qtys,datepakets,qtypakets,itempakets,descinfo,madelog,madeuser,idsnp,idsnp2,expdates,idwh)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			} else {
				if ($idpakets != '') {
					$data = array($idpakets, $idpakets, $idpakets, $idpakets, $idpakets, $idpakets);
					$queryx = "UPDATE tb_itemqtyexp set tb_itemqtyexp.outqty=tb_itemqtyexp.outqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty+x.tqty
				from
				(
					select expdates as expdate,idwh,iditems as iditem,qtys as tqty from pakets as a where idpakets= ? 
				) as x
				where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

				UPDATE tb_itemqty  set tb_itemqty.outqty=tb_itemqty.outqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty+x.tqty
				from
				(
					select idwh,iditems as iditem,qtys as tqty from pakets as a where idpakets= ? 
				) as x
				where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh


				UPDATE tb_itemqtyexp  set tb_itemqtyexp.inqty=tb_itemqtyexp.inqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty-x.tqty
				from
				(
					select expdate,idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketsdet as a where idpakets= ? 
				) as x
				where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

				UPDATE tb_itemqty  set tb_itemqty.inqty=tb_itemqty.inqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty-x.tqty
				from
				(
					select idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketsdet as a where idpakets= ? 
				) as x
				where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

				DELETE FROM paketsdet where idpakets = ? 

				";
					$eksekusix = $this->db->query($queryx, $data);
				}


				$data = array($iditems, $qtys, $datepakets, $qtypakets, $itempakets, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idsnp, $idsnp2, $expdates, $idwh, $idpakets);
				$query = "UPDATE pakets SET iditems = ? ,qtys = ? ,datepakets = ? ,qtypakets = ? ,itempakets = ? ,descinfo = ? ,madelog = ? ,madeuser = ?,idsnp = ? ,idsnp2 = ? ,expdates = ? ,idwh = ? WHERE idpakets = ? ";
			}
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$lastid = 0;
				if ($idpakets == '') {
					$queryx = "SELECT @@IDENTITY As lastid";
					$eksekusix = $this->db->query($queryx)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $key) {
							$lastid = $key->lastid;
						}
					}
				} else {
					$lastid = $idpakets;
				}

				if ($lastid != 0) {
					$respon = "Success";

					for ($i = 0; $i < count($iditem); $i++) {
						if (is_numeric($qty[$i]) && is_numeric($iditem[$i])) {
							$dataxx = array($lastid, ($i + 1), $iditem[$i], 1, $qty[$i], $idwh, $expdate[$i]);
							$queryxx = "INSERT INTO paketsdet (idpakets,idpaketsdet,iditem,unitvol,qty,idwh,expdate)VALUES(?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								$dataxx = array($iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh);
								$queryxx = "";
								//$queryxx = $queryxx . "INSERT INTO tb_itemsn(iditem,idsn,idsn2,idwh,expdate) values(?,?,?,?,?) ";
								$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
								$queryxx = $queryxx . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0,?) ";
								$queryxx = $queryxx . "ELSE ";
								$queryxx = $queryxx . "UPDATE tb_itemqtyexp SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? and expdate = ? ";

								$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
								$queryxx = $queryxx . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0,?) ";
								$queryxx = $queryxx . "ELSE ";
								$queryxx = $queryxx . "UPDATE tb_itemqty SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? ";
								$eksekusixx = $this->db->query($queryxx, $dataxx);
								if ($eksekusixx == true) {
									$respon = "Success";
								} else {
									$respon = "Failed on Detail";
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
					}
					if ($respon == "Success") {
						$dataxx = array($iditems, $idwh, $expdates, $iditems, $idwh, $expdates, $qtys, $qtys, $qtys, $qtys, $iditems, $idwh, $expdates, $iditems, $idwh, $iditems, $idwh, $qtys, $qtys, $qtys, $qtys, $iditems, $idwh);
						$queryxx = "";
						//$queryxx = $queryxx . "INSERT INTO tb_itemsn(iditem,idsn,idsn2,idwh,expdate) values(?,?,?,?,?) ";
						$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
						$queryxx = $queryxx . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,0,?, -1*?) ";
						$queryxx = $queryxx . "ELSE ";
						$queryxx = $queryxx . "UPDATE tb_itemqtyexp SET outqty = outqty + ? , endqty = endqty - ? where iditem = ? and idwh = ? and expdate = ? ";

						$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
						$queryxx = $queryxx . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,0,?, -1* ?) ";
						$queryxx = $queryxx . "ELSE ";
						$queryxx = $queryxx . "UPDATE tb_itemqty SET outqty = outqty + ? , endqty = endqty - ? where iditem = ? and idwh = ? ";
						$eksekusixx = $this->db->query($queryxx, $dataxx);
						if ($eksekusixx != true) {
							$respon = "Failed on Stock Header";
						}
					}
					if ($respon == "Success") {
						$dataxx = array($lastid);
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqty as a
					inner join pakets as b on a.iditem=b.iditems and a.idwh=b.idwh
					inner join tb_item as i on a.iditem=i.iditem
					where a.endqty<0 and b.idpakets= ?
					";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$qend = $key->endqty;
								$respon = "Stock " . $qnameitem . " Minus " . $qend;
								break;
							}
						}
					}
					if ($respon == "Success") {
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqtyexp as a
					inner join pakets as b on a.iditem=b.iditems and a.idwh=b.idwh and a.expdate=b.expdates
					inner join tb_item as i on a.iditem=i.iditem
					where a.endqty<0 and b.idpakets= ?
					";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$qend = $key->endqty;
								$respon = "Stock Expired " . $qnameitem . " Minus " . $qend;
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

	function getlistpakets($cond)
	{
		$query = "SELECT a.idpakets,a.codepakets,a.datepakets,a.descinfo,w.namecomm as namewh,a.itempakets,a.qtypakets,u1.username as madeuser,u2.username as upduser
		,s.sku,s.nameitem,a.idsnp,a.idsnp2,a.expdates
		from pakets as a
		left join (select iditem,sku,nameitem from tb_item ) as s on a.iditems=s.iditem
		left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
		left join tb_user as u1 on a.madeuser=u1.iduser
		left join tb_user as u2 on a.upduser=u2.iduser
		";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepakets"]	= $key->codepakets;
				$f["sku"]		= $key->sku;
				$f["datepakets"]	= $key->datepakets;
				$f["nameitem"]	= $key->nameitem;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["idsnp"]	= $key->idsnp;
				$f["idsnp2"]	= $key->idsnp2;
				$f["expdates"]	= $key->expdates;
				$f["itempakets"]	= $key->itempakets;
				$f["qtypakets"]	= $key->qtypakets;
				$f["nameuser"]	= $key->madeuser;
				$f['idpakets']	= $key->idpakets;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}
	// paket
	function deletepaket($idpaket)
	{
		$this->db->trans_start();
		$respon = "Success";
		$queryx = "SELECT c.iditem,i.nameitem,c.expdate,a.endqty,isnull(b.endqty,0)as expqty,isnull(c.qty,0) as inqty,isnull(c.qty,0) as inqtyexp
		from (select iditemp as iditem,idwh,qtyp as qty,expdatep as expdate from paket where idpaket= ? ) as c
		inner join (select iditem,nameitem from dbo.tb_item ) as i
		on c.iditem=i.iditem
		left join (select iditem,idwh,endqty from dbo.tb_itemqty) as a
		on c.iditem=a.iditem and c.idwh=a.idwh
		left join (select iditem,idwh,endqty,expdate from dbo.tb_itemqtyexp ) as b
		on c.iditem=b.iditem and c.idwh=b.idwh and c.expdate=b.expdate
		";
		$data = array($idpaket);
		$eksekusix = $this->db->query($queryx, $data)->result_object();

		if (count($eksekusix) > 0) {
			foreach ($eksekusix as $key) {
				$qiditem = $key->iditem;
				$qnameitem = $key->nameitem;
				$qexpdate = $key->expdate;

				$qendqty = $key->endqty;
				$qinqty = $key->inqty;
				$qexpqty = $key->expqty;
				$qinqtyexp = $key->inqtyexp;
				if (($qendqty - $qinqty) < 0) {
					$respon = "Stock " . $qnameitem . " Minus";
					break;
				} else if (($qexpqty - $qinqtyexp) < 0) {
					$respon = "Stock Expired " . $qnameitem . " Minus";
					break;
				}
			}
		}
		if ($respon == "Success") {
			$data = array($idpaket, $idpaket, $idpaket, $idpaket, $idpaket, $idpaket, $idpaket);
			$queryx = "DELETE tb_itemsn
			FROM tb_itemsn 
			INNER JOIN paket as a
			ON tb_itemsn.expdate=a.expdatep and tb_itemsn.idsn=a.idsnp and tb_itemsn.idsn2=a.idsnp2
			WHERE a.idpaket= ? 

			UPDATE tb_itemqtyexp set tb_itemqtyexp.inqty=tb_itemqtyexp.inqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty-x.tqty
			from
			(
				select expdatep as expdate,idwh,iditemp as iditem,qtyp as tqty from paket as a where idpaket= ? 
			) as x
			where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

			UPDATE tb_itemqty  set tb_itemqty.inqty=tb_itemqty.inqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty-x.tqty
			from
			(
				select idwh,iditemp as iditem,qtyp as tqty from paket as a where idpaket= ? 
			) as x
			where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh


			UPDATE tb_itemqtyexp  set tb_itemqtyexp.outqty=tb_itemqtyexp.outqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty+x.tqty
			from
			(
				select expdate,idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketdet as a where idpaket= ? 
			) as x
			where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

			UPDATE tb_itemqty  set tb_itemqty.outqty=tb_itemqty.outqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty+x.tqty
			from
			(
				select idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketdet as a where idpaket= ? 
			) as x
			where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

			DELETE FROM paketdet where idpaket = ? 

			DELETE FROM paket where idpaket = ?
			";
			$eksekusi2 = $this->db->query($queryx, $data);




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

	function readheaderpaket($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT a.*,s.sku,s.nameitem,w.codecomm as codewh from paket as a
					left join (select iditem,sku,nameitem from tb_item) as s on a.iditemp=s.iditem
					left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
					where a.idpaket = ?
				";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idpaket"]	= $key->idpaket;
				$f["codepaket"]	= $key->codepaket;
				$f["codewh"]	= $key->codewh;
				$f["sku"]	= $key->sku;
				$f["iditemp"]	= $key->iditemp;
				$f["idsnp"]	= $key->idsnp;
				$f["idsnp2"]	= $key->idsnp2;

				$f["datepaket"]	= $key->datepaket;
				$f["qtyp"]	= $key->qtyp;
				$f["qtypaket"]	= $key->qtypaket;
				$f["itempaket"]	= $key->itempaket;

				$f["descinfo"]	= $key->descinfo;
				$f["idwh"]	= $key->idwh;
				$f["expdatep"]	= $key->expdatep;
				$f["hpp"] = 0;

				$data1 = array($f["idsnp"], $f["idsnp2"]);
				$query1 = "SELECT * FROM tb_itemsn where idsn = ? AND idsn2 = ?";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $keyx) {
						$f["hpp"] = $keyx->hargabeli;
					}
					# code...
				} else {
					$f["hpp"] = 0;
				}

				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailpaket($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem from paketdet as b
		inner join tb_item as a on b.iditem=a.iditem  where b.idpaket = ? order by idpaketdet
		";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["idpaket"]	= $key->idpaket;
				$f["idpaketdet"]	= $key->idpaketdet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	= $key->sku;
				$f["idsn"]	= $key->idsn;
				$f["idsn2"]	= $key->idsn2;
				$f["expdate"]	= $key->expdate;
				$f["nameitem"]	= $key->nameitem;
				$f["qty"]	= $key->qty;
				$f["snid"]	= $key->snid;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function updatepaket($iduser, $datepaket, $typepaket, $iditemp, $expdatep, $hargabeli, $idsnp, $idsnp2, $descinfo, $qtyp, $qtypaket, $itempaket, $iditem, $expdate, $qty, $idwh, $idpaket, $codepaket, $snawal, $snakhir, $snid)
	{
		$this->db->trans_start();
		$lastid = 0;
		$oldidwh = 0;
		$respon = "Success";
		if ($respon == "Success") {

			if ($idpaket == '') {
				$data = array(substr(date('YmdHisu'), 0, 15), $iditemp, $qtyp, $datepaket, $qtypaket, $itempaket, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idsnp, $idsnp2, $expdatep, $idwh);
				$query = "INSERT INTO paket(codepaket,iditemp,qtyp,datepaket,qtypaket,itempaket,descinfo,madelog,madeuser,idsnp,idsnp2,expdatep,idwh)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			} else {
				if ($idpaket != '') {
					$data = array($idpaket, $idpaket, $idpaket, $idpaket, $idpaket, $idpaket);
					$queryx = "DELETE tb_itemsn
					FROM tb_itemsn 
					INNER JOIN paket as a
					ON tb_itemsn.expdate=a.expdatep and tb_itemsn.idsn=a.idsnp and tb_itemsn.idsn2=a.idsnp2
					WHERE a.idpaket= ? 

					UPDATE tb_itemqtyexp set tb_itemqtyexp.inqty=tb_itemqtyexp.inqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty-x.tqty
					from
					(
						select expdatep as expdate,idwh,iditemp as iditem,qtyp as tqty from paket as a where idpaket= ? 
					) as x
					where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

					UPDATE tb_itemqty  set tb_itemqty.inqty=tb_itemqty.inqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty-x.tqty
					from
					(
						select idwh,iditemp as iditem,qtyp as tqty from paket as a where idpaket= ? 
					) as x
					where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh


					UPDATE tb_itemqtyexp  set tb_itemqtyexp.outqty=tb_itemqtyexp.outqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty+x.tqty
					from
					(
						select expdate,idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketdet as a where idpaket= ? 
					) as x
					where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

					UPDATE tb_itemqty  set tb_itemqty.outqty=tb_itemqty.outqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty+x.tqty
					from
					(
						select idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from paketdet as a where idpaket= ? 
					) as x
					where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

					DELETE FROM paketdet where idpaket = ? 

					";
					$eksekusix = $this->db->query($queryx, $data);
				}


				$data = array($iditemp, $qtyp, $datepaket, $qtypaket, $itempaket, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idsnp, $idsnp2, $expdatep, $idwh, $idpaket);
				$query = "UPDATE paket SET iditemp = ? ,qtyp = ? ,datepaket = ? ,qtypaket = ? ,itempaket = ? ,descinfo = ? ,madelog = ? ,madeuser = ?,idsnp = ? ,idsnp2 = ? ,expdatep = ? ,idwh = ? WHERE idpaket = ? ";
			}
			$eksekusi = $this->db->query($query, $data);
			if ($eksekusi == true) {
				$lastid = 0;
				if ($idpaket == '') {
					$queryx = "SELECT @@IDENTITY As lastid";
					$eksekusix = $this->db->query($queryx)->result_object();
					if (count($eksekusix) > 0) {
						foreach ($eksekusix as $key) {
							$lastid = $key->lastid;
						}
					}
				} else {
					$lastid = $idpaket;
				}

				if ($lastid != 0) {
					$respon = "Success";

					for ($i = 0; $i < count($iditem); $i++) {
						if (is_numeric($qty[$i]) && is_numeric($iditem[$i])) {
							$dataxx = array($lastid, ($i + 1), $iditem[$i], 1, $qty[$i], $idwh, $expdate[$i], $snawal, $snakhir, $snid[$i]);
							$queryxx = "INSERT INTO paketdet (idpaket,idpaketdet,iditem,unitvol,qty,idwh,expdate,idsn,idsn2,snid)VALUES(?,?,?,?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								$dataxx = array($iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh);
								$queryxx = "";
								//$queryxx = $queryxx . "INSERT INTO tb_itemsn(iditem,idsn,idsn2,idwh,expdate) values(?,?,?,?,?) ";
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
									$respon = "Failed on Detail";
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
					}
					if ($respon == "Success") {
						$dataxx = array($iditemp, $idsnp, $idsnp2, $idwh, $expdatep, $hargabeli, $iditemp, $idwh, $expdatep, $iditemp, $idwh, $expdatep, $qtyp, $qtyp, $qtyp, $qtyp, $iditemp, $idwh, $expdatep, $iditemp, $idwh, $iditemp, $idwh, $qtyp, $qtyp, $qtyp, $qtyp, $iditemp, $idwh);
						$queryxx = "";
						$queryxx = $queryxx . "INSERT INTO tb_itemsn(iditem,idsn,idsn2,idwh,expdate,hargabeli) values(?,?,?,?,?,?) ";
						$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
						$queryxx = $queryxx . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0, ?) ";
						$queryxx = $queryxx . "ELSE ";
						$queryxx = $queryxx . "UPDATE tb_itemqtyexp SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? and expdate = ? ";

						$queryxx = $queryxx . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
						$queryxx = $queryxx . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0, ?) ";
						$queryxx = $queryxx . "ELSE ";
						$queryxx = $queryxx . "UPDATE tb_itemqty SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? ";
						$eksekusixx = $this->db->query($queryxx, $dataxx);
						if ($eksekusixx != true) {
							$respon = "Failed on Stock Header";
						}
					}
					if ($respon == "Success") {
						$dataxx = array($lastid);
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqty as a
						inner join paketdet as b on a.iditem=b.iditem and a.idwh=b.idwh
						inner join tb_item as i on a.iditem=i.iditem
						where a.endqty<0 and b.idpaket= ?
						";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$qend = $key->endqty;
								$respon = "Stock " . $qnameitem . " Minus " . $qend;
								break;
							}
						}
					}
					if ($respon == "Success") {
						$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqtyexp as a
						inner join paketdet as b on a.iditem=b.iditem and a.idwh=b.idwh and a.expdate=b.expdate
						inner join tb_item as i on a.iditem=i.iditem
						where a.endqty<0 and b.idpaket= ?
						";
						$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

						if (count($eksekusix) > 0) {
							foreach ($eksekusix as $key) {
								$qnameitem = $key->nameitem;
								$qend = $key->endqty;
								$respon = "Stock Expired " . $qnameitem . " Minus " . $qend;
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

	function getlistpaketpaginate($start, $limit)
	{
		// $query = "SELECT a.idpaket,a.codepaket,a.datepaket,a.descinfo,w.namecomm as namewh,a.itempaket,a.qtypaket,u1.username as madeuser,u2.username as upduser
		// 	,s.sku,s.nameitem,a.idsnp,a.idsnp2,a.expdatep
		// 	from paket as a
		// 	left join (select iditem,sku,nameitem from tb_item ) as s on a.iditemp=s.iditem
		// 	left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
		// 	left join tb_user as u1 on a.madeuser=u1.iduser
		// 	left join tb_user as u2 on a.upduser=u2.iduser
		// 	ORDER BY a.datepaket ASC";
		$this->db->select('s.iditem,sku,s.nameitem,a.idpaket,a.codepaket,a.datepaket,
		a.descinfo,w.namecomm as namewh,a.itempaket,a.qtypaket,u1.username as madeuser,
		u2.username as upduser	,a.idsnp,a.idsnp2,a.expdatep');
		$this->db->from('paket as a');
		$this->db->join('tb_item as s', 'a.iditemp = s.iditem', 'left');
		$this->db->join('common_detail as w', 'a.idwh = w.idcomm', 'left');
		$this->db->join('tb_user as u1', 'a.madeuser = u1.iduser', 'left');
		$this->db->join('tb_user as u2', 'a.upduser = u2.iduser', 'left');
		$this->db->where('w.idgroup=4');
		$this->db->order_by('a.datepaket', 'asc');
		$this->db->limit($start, $limit);
		$eksekusi = $this->db->get()->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codepaket"]	= $key->codepaket;
				$f["sku"]		= $key->sku;
				$f["datepaket"]	= $key->datepaket;
				$f["nameitem"]	= $key->nameitem;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["idsnp"]	= $key->idsnp;
				$f["idsnp2"]	= $key->idsnp2;
				$f["expdatep"]	= $key->expdatep;
				$f["itempaket"]	= $key->itempaket;
				$f["qtypaket"]	= $key->qtypaket;
				$f["nameuser"]	= $key->madeuser;
				$f['idpaket']	= $key->idpaket;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function countgetlistpaket()
	{
		return $this->db->get('paket')->num_rows();
	}
	//move wh

	function readheadermovewh($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT a.*,s.codecomm as codewh2,w.codecomm as codewh from movewh as a
						left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as s on a.idwh2=s.idcomm
						left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
						where a.idmove = ?
					";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idmove"]	= $key->idmove;
				$f["codemove"]	= $key->codemove;
				$f["codewh"]	= $key->codewh;
				$f["codewh2"]	= $key->codewh2;

				$f["datemove"]	= $key->datemove;
				$f["typemove"]	= $key->typemove;
				$f["qtymove"]	= $key->qtymove;
				$f["itemmove"]	= $key->itemmove;
				$f["norequest"]	= $key->norequest;

				$f["descinfo"]	= $key->descinfo;
				$f["idwh"]	= $key->idwh;
				$f["idwh2"]	= $key->idwh2;
				$f["status"]	= $key->status;

				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailmovewh($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem from movewhdet as b
			inner join tb_item as a on b.iditem=a.iditem  where b.idmove = ? order by idmovedet
			";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["idmove"]	= $key->idmove;
				$f["idmovedet"]	= $key->idmovedet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	= $key->sku;
				$f["expdate"]	= $key->expdate;
				$f["snawal"]	= $key->snawal;
				$f["snakhir"]	= $key->snakhir;
				$f["nameitem"]	= $key->nameitem;
				$f["qty"]	= $key->qty;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistmovewh($cond)
	{
		$query = "SELECT a.typemove, a.status,a.norequest, a.idmove,a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm as codewh2,s.namecomm as namewh2,a.descinfo,w.namecomm as namewh,w.codecomm as codewh,u1.username as madeuser,u2.username as upduser, a.qtymove, a.itemmove
			from movewh as a
			left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as s on a.idwh2=s.idcomm
			left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
			left join tb_user as u1 on a.madeuser=u1.iduser
			left join tb_user as u2 on a.upduser=u2.iduser
			ORDER BY datemove ASC";
		// $query = $query ." where 1=1 " . $cond;
		// echo $query;
		// exit();
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["typemove"]	= $key->typemove;
				$f["codemove"]	= $key->codemove;
				$f["datemove"]	= $key->datemove;
				$f["idwh"]		= $key->idwh;
				$f["idwh2"]		= $key->idwh2;
				$f["namewh2"]	= $key->namewh2;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["itemmove"]	= $key->itemmove;
				$f["qtymove"]	= $key->qtymove;
				$f["nameuser"]	= $key->madeuser;
				$f['idmove']	= $key->idmove;
				$f['status']	= $key->status;
				$f['norequest']	= $key->norequest;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistmovewhpaginate($start, $limit, $filter, $search, $date1, $date2, $status)
	{
		$data = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm as codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm as namewh,w.codecomm as codewh,u1.username as madeuser,
			u2.username as upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh as a 
			left join common_detail as s on a.idwh = s.idcomm 
			left join common_detail as w on a.idwh = w.idcomm  
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.upduser = u2.iduser 
			WHERE s.idgroup = 4 AND w.idgroup =4)
			AS t where $filter LIKE ? AND RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm AS codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm AS namewh,w.codecomm AS codewh,u1.username AS madeuser,
			u2.username AS upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh AS a 
			LEFT JOIN common_detail AS s ON a.idwh = s.idcomm 
			LEFT JOIN common_detail AS w ON a.idwh = w.idcomm  
			LEFT JOIN tb_user AS u1 ON a.madeuser = u1.iduser 
			LEFT JOIN tb_user AS u2 ON a.upduser = u2.iduser 
			WHERE s.idgroup = 4 AND w.idgroup =4 AND REPLACE(datemove, ' ', '') >= ? AND REPLACE(datemove, ' ', '') <= ? )
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm AS codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm AS namewh,w.codecomm AS codewh,u1.username AS madeuser,
			u2.username AS upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh AS a 
			LEFT JOIN common_detail AS s ON a.idwh = s.idcomm 
			LEFT JOIN common_detail AS w ON a.idwh = w.idcomm  
			LEFT JOIN tb_user AS u1 ON a.madeuser = u1.iduser 
			LEFT JOIN tb_user AS u2 ON a.upduser = u2.iduser 
			WHERE s.idgroup = 4 AND w.idgroup =4 AND a.status = '$status' )
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$data  = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm AS codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm AS namewh,w.codecomm AS codewh,u1.username AS madeuser,
			u2.username AS upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh AS a 
			LEFT JOIN common_detail AS s ON a.idwh = s.idcomm 
			LEFT JOIN common_detail AS w ON a.idwh = w.idcomm  
			LEFT JOIN tb_user AS u1 ON a.madeuser = u1.iduser 
			LEFT JOIN tb_user AS u2 ON a.upduser = u2.iduser 
			WHERE s.idgroup = 4 AND w.idgroup =4 AND $filter LIKE '%$search%' AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ?)
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 == "" && $date2 == "" && $status != "") {
			$data  = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm AS codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm AS namewh,w.codecomm AS codewh,u1.username AS madeuser,
			u2.username AS upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh AS a 
			LEFT JOIN common_detail AS s ON a.idwh = s.idcomm 
			LEFT JOIN common_detail AS w ON a.idwh = w.idcomm  
			LEFT JOIN tb_user AS u1 ON a.madeuser = u1.iduser 
			LEFT JOIN tb_user AS u2 ON a.upduser = u2.iduser 
			WHERE s.idgroup = 4 AND w.idgroup =4 AND $filter LIKE '%$search%' AND a.status ='$status')
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm AS codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm AS namewh,w.codecomm AS codewh,u1.username AS madeuser,
			u2.username AS upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh AS a 
			LEFT JOIN common_detail AS s ON a.idwh = s.idcomm 
			LEFT JOIN common_detail AS w ON a.idwh = w.idcomm  
			LEFT JOIN tb_user AS u1 ON a.madeuser = u1.iduser 
			LEFT JOIN tb_user AS u2 ON a.upduser = u2.iduser 
			WHERE s.idgroup = 4 AND w.idgroup =4 AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ? AND a.status ='$status')
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$data  = array($date1, $date2, $start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm AS codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm AS namewh,w.codecomm AS codewh,u1.username AS madeuser,
			u2.username AS upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh AS a 
			LEFT JOIN common_detail AS s ON a.idwh = s.idcomm 
			LEFT JOIN common_detail AS w ON a.idwh = w.idcomm  
			LEFT JOIN tb_user AS u1 ON a.madeuser = u1.iduser 
			LEFT JOIN tb_user AS u2 ON a.upduser = u2.iduser 
			WHERE s.idgroup =4 AND w.idgroup =4 AND $filter LIKE '%$search%' AND REPLACE(a.datemove, ' ', '') >= ? AND REPLACE(a.datemove, ' ', '') <= ? AND a.status LIKE '%$status%')
			AS t where RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT  t. *  FROM (SELECT a.typemove, a.status,a.norequest, a.idmove,
			a.codemove,a.datemove,a.idwh2,a.idwh,s.codecomm AS codewh2,case when idwh='82' then 'Counter' end AS namewh2,
			a.descinfo,w.namecomm AS namewh,w.codecomm AS codewh,u1.username AS madeuser,
			u2.username AS upduser, a.qtymove, a.itemmove,
			ROW_NUMBER() OVER (Order by a.idmove) AS RowNumber FROM movewh AS a 
			LEFT JOIN common_detail AS s ON a.idwh = s.idcomm 
			LEFT JOIN common_detail AS w ON a.idwh = w.idcomm  
			LEFT JOIN tb_user AS u1 ON a.madeuser = u1.iduser 
			LEFT JOIN tb_user AS u2 ON a.upduser = u2.iduser 
			WHERE s.idgroup = 4 and w.idgroup =4) 
			AS t WHERE RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo ($str);
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["typemove"]	= $key->typemove;
				$f["codemove"]	= $key->codemove;
				$f["datemove"]	= $key->datemove;
				$f["idwh"]		= $key->idwh;
				$f["idwh2"]		= $key->idwh2;
				$f["namewh2"]	= $key->namewh2;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["itemmove"]	= $key->itemmove;
				$f["qtymove"]	= $key->qtymove;
				$f["nameuser"]	= $key->madeuser;
				$f['idmove']	= $key->idmove;
				$f['status']	= $key->status;
				$f['norequest']	= $key->norequest;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function countmovewh($filter, $search, $date1, $date2, $status)
	{
		$this->db->select('*');
		$this->db->from('movewh');
		if ($search != "" && $date1 == "" && $date2 == "" && $status == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where('movewh.datemove', $date1, $date2);
		} else if ($search == "" && $date1 == "" && $date2 == "" && $status != "") {
			$this->db->where('movewh.status =', ".$status.");
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status == "") {
			$this->db->where($filter, $search, 'movewh.datemove', $date1, $date2);
		} else if ($search == "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where('movewh.datemove', $date1, $date2, 'status', $status);
		} else if ($search != "" && $date1 != "" && $date2 != "" && $status != "") {
			$this->db->where($filter, $search, 'movewh.datemove', $date1, $date2, 'movewh.status =', ".$status.");
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function updatemovewh($iduser, $datemove, $typemove, $descinfo, $qtymove, $itemmove, $iditem, $qty, $snawal, $snakhir, $idwh, $idwh2, $idmove, $codemove, $idrequest, $expdate, $acc, $norequestz)
	{
		$this->db->trans_start();
		$lastid = 0;
		$oldidwh = 0;
		$oldidwh2 = 0;
		$norequest = 0;
		if ($idmove != '') {
			$data = array($idmove);
			$queryx = "SELECT idwh,idwh2, qtymove, norequest from movewh
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
					$norequest = $key->norequest;
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
				$data = array(substr(date('YmdHisu'), 0, 15), $datemove, $typemove, $qtymove, $itemmove, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $idwh2, $idrequest);
				$query = "INSERT INTO movewh(codemove,datemove,typemove,qtymove,itemmove,descinfo,madelog,madeuser,idwh,idwh2,status,norequest)VALUES(?,?,?,?,?,?,?,?,?,?,'Waiting',?)";
			} else {
				$data = array($datemove, $typemove, $qtymove, $itemmove, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $idwh2, $idmove);
				$query;
				if ($acc == "1") {
					$query = "UPDATE movewh SET datemove = ? ,typemove = ? ,qtymove = ? ,itemmove = ? ,descinfo = ? ,madelog = ? ,madeuser = ? ,idwh = ? ,idwh2 = ?, status ='Received' WHERE idmove = ? ";
				} else {
					$query = "UPDATE movewh SET datemove = ? ,typemove = ? ,qtymove = ? ,itemmove = ? ,descinfo = ? ,madelog = ? ,madeuser = ? ,idwh = ? ,idwh2 = ? WHERE idmove = ? ";
				}
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
					if ($idmove != '' && $norequest == 0) {

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
					} else {

						$data = array($idmove);
						$queryx = "DELETE FROM movewhdet where idmove = ? ";
						$eksekusix = $this->db->query($queryx, $data);
					}

					$respon = "Success";

					$querys = array();
					for ($i = 0; $i < count($iditem); $i++) {
						if (isset($qty[$i]) && isset($iditem[$i])) {
							$dataxx = array($lastid, ($i + 1), $iditem[$i], $qty[$i], $idwh, $idwh2, $snawal[$i], $snakhir[$i], $expdate[$i]);
							$queryxx = "INSERT INTO movewhdet (idmove,idmovedet,iditem,qty,idwh,idwh2,snawal,snakhir,expdate)VALUES(?,?,?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {

								// echo  count($iditem) . " " . $idmove . " " . $acc;
								if ($idmove != "" && $acc == "1") {




									$dataaxx1 = array(
										$iditem[$i], $idwh2, $expdate[$i], $iditem[$i], $idwh2, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh2, $expdate[$i], $iditem[$i], $idwh2, $iditem[$i], $idwh2, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh2,
										$iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh
									);
									$queryxx1 = "";
									$queryxx1 = $queryxx1 . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
									$queryxx1 = $queryxx1 . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0,?) ";
									$queryxx1 = $queryxx1 . "ELSE ";
									$queryxx1 = $queryxx1 . "UPDATE tb_itemqtyexp SET inqty = cast(inqty as int) + cast(? as int) , endqty = cast(endqty as int)+ cast(? as int) where iditem = ? and idwh = ? and expdate = ? ";

									$queryxx1 = $queryxx1 . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
									$queryxx1 = $queryxx1 . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0,?) ";
									$queryxx1 = $queryxx1 . "ELSE ";
									$queryxx1 = $queryxx1 . "UPDATE tb_itemqty SET inqty = cast(inqty as int) + cast(? as int), endqty = cast(endqty as int)+ cast(? as int) where iditem = ? and idwh = ? ";

									$queryxx1 = $queryxx1 . "IF not EXISTS (SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ? ) ";
									$queryxx1 = $queryxx1 . "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,0,?,-1* ?) ";
									$queryxx1 = $queryxx1 . "ELSE ";
									$queryxx1 = $queryxx1 . "UPDATE tb_itemqtyexp SET outqty = cast(outqty as int) + cast(? as int) , endqty = cast(endqty  as int) - cast(? as int) where iditem = ? and idwh = ? and expdate = ? ";

									$queryxx1 = $queryxx1 . "IF not EXISTS (SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ) ";
									$queryxx1 = $queryxx1 . "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,0,?,-1* ?) ";
									$queryxx1 = $queryxx1 . "ELSE ";
									$queryxx1 = $queryxx1 . "UPDATE tb_itemqty SET outqty = cast(outqty as int) + cast(? as int), endqty = cast(endqty  as int) - cast(? as int)where iditem = ? and idwh = ? ";


									$eksekusixx1 = $this->db->query($queryxx1, $dataaxx1);


									// $dataxx1 = array($iditem[$i], $idwh2, $expdate[$i]);
									// $queryxxx1 = "SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ?";
									// $eksekusixx1 = $this->db->query($queryxxx1, $dataxx1)->result_object();
									// if (count($eksekusixx1) > 0) {
									// 	$dataxx2 = array($qty[$i], $qty[$i], $iditem[$i], $idwh2, $expdate[$i]);
									// 	$queryxx2 = "UPDATE tb_itemqtyexp SET inqty = cast(inqty as int) + cast(? as int) , endqty = cast(endqty as int)+ cast(? as int) where iditem = ? and idwh = ? and expdate = ?";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// } else {
									// 	$dataxx2 = array($iditem[$i], $idwh2, $expdate[$i], $qty[$i], $qty[$i]);
									// 	$queryxx2 = "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0,?)";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// }

									// $dataxx1 = array($iditem[$i], $idwh2);
									// $queryxxx1 = "SELECT iditem from tb_itemqty where iditem = ? and idwh = ?";
									// $eksekusixx1 = $this->db->query($queryxxx1, $dataxx1)->result_object();
									// if (count($eksekusixx1) > 0) {
									// 	$dataxx2 = array($qty[$i], $qty[$i], $iditem[$i], $idwh2);
									// 	$queryxx2 = "UPDATE tb_itemqty SET inqty = cast(inqty as int) + cast(? as int), endqty = cast(endqty as int)+ cast(? as int) where iditem = ? and idwh = ?";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// } else {
									// 	$dataxx2 = array($iditem[$i], $idwh2, $qty[$i], $qty[$i]);
									// 	$queryxx2 = "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0,?) ";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// }

									// $dataxx1 = array($iditem[$i], $idwh, $expdate[$i]);
									// $queryxxx1 = "SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ?";
									// $eksekusixx1 = $this->db->query($queryxxx1, $dataxx1)->result_object();
									// if (count($eksekusixx1) > 0) {
									// 	$dataxx2 = array($qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i]);
									// 	$queryxx2 = "UPDATE tb_itemqtyexp SET outqty = cast(outqty as int) + cast(? as int) , endqty = cast(endqty  as int) - cast(? as int) where iditem = ? and idwh = ? and expdate = ? ";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// } else {
									// 	$dataxx2 = array($iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i]);
									// 	$queryxx2 = "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,0,?,-1* ?)";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// }

									// $dataxx1 = array($iditem[$i], $idwh);
									// $queryxxx1 = "SELECT iditem from tb_itemqty where iditem = ? and idwh = ?";
									// $eksekusixx1 = $this->db->query($queryxxx1, $dataxx1)->result_object();
									// if (count($eksekusixx1) > 0) {
									// 	$dataxx2 = array($qty[$i], $qty[$i], $iditem[$i], $idwh);
									// 	$queryxx2 = "UPDATE tb_itemqty SET outqty = cast(outqty as int) + cast(? as int), endqty = cast(endqty  as int) - cast(? as int)where iditem = ? and idwh = ? ";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// } else {
									// 	$dataxx2 = array($iditem[$i], $idwh, $qty[$i], $qty[$i]);
									// 	$queryxx2 = "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,0,?,-1* ?)";
									// 	$eksekusixx2 = $this->db->query($queryxx2, $dataxx2);
									// 	if ($eksekusixx2 == true) {
									// 		$respon = "Success";
									// 	} else {
									// 		$respon = "Failed";
									// 		break;
									// 	}
									// }




									if ($eksekusixx1 == true) {

										array_push($querys, $this->db->last_query());
										$respon = "Success";
										$snmax;
										$snmin;
										$idsupp;
										$hargabeli;
										$idpo;
										$data1 = array($snawal[$i], $iditem[$i], $idwh);
										$query1 = "SELECT * FROM tb_itemsn where  ? BETWEEN idsn AND idsn2 AND iditem = ? AND idwh = ?";
										$eksekusi1 = $this->db->query($query1, $data1)->result_object();
										if (count($eksekusi1) > 0) {
											foreach ($eksekusi1 as $key1) {
												$snmax = $key1->idsn2;
												$snmin = $key1->idsn;
												$idsupp = $key1->idsupp;
												$hargabeli = $key1->hargabeli;
												$idpo = $key1->idpo;
												$snid = $key1->snid;
											}
											if ($snawal[$i] != 0) {

												$data2 = array($snmin, $snmax, $iditem[$i]);
												$query2 = "DELETE FROM tb_itemsn WHERE idsn = ? AND idsn2 = ? AND iditem = ? ";
												$eksekui2 = $this->db->query($query2, $data2);
												if ($eksekui2 == true) {

													if ($snawal[$i] == $snmin && $snakhir[$i] < $snmax) {
														$snnew  = "";
														if (strlen($snakhir[$i]) > 10 &&  strlen($snakhir[$i]) < 15) {
															$snnew  = substr($snakhir[$i], 0, 10) . "" . (substr($snakhir[$i], 10, (int)strlen($snakhir[$i]) - 1) + 1);
														} else if (strlen($snakhir[$i]) > 15 &&  strlen($snakhir[$i]) < 20) {
															$snnew  = substr($snakhir[$i], 0, 15) . "" . (substr($snakhir[$i], 15, (int)strlen($snakhir[$i]) - 1) + 1);
														} else {
															$snnew = $snakhir[$i] + 1;
														}

														$data3 = array($iditem[$i], $expdate[$i], $snawal[$i], $snakhir[$i], $idwh2, $idsupp, $hargabeli, $idpo);
														$query3 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
														$eksekusi3 = $this->db->query($query3, $data3);
														if ($eksekusi3 == true) {
															$data4 =  array($iditem[$i], $expdate[$i], $snnew, $snmax, $idwh, $idsupp, $hargabeli, $idpo);
															$query4 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
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
													} else if ($snawal[$i] > $snmin && $snakhir[$i] < $snmax) {

														$snnew = $snakhir[$i] + 1;
														$snnew1 = $snawal[$i] - 1;
														if (strlen($snakhir[$i]) > 10 &&  strlen($snakhir[$i]) < 15) {
															$snnew  = substr($snakhir[$i], 0, 10) . "" . (substr($snakhir[$i], 10, (int)strlen($snakhir[$i]) - 1) + 1);
														} else if (strlen($snakhir[$i]) > 15 &&  strlen($snakhir[$i]) < 20) {
															$snnew  = substr($snakhir[$i], 0, 15) . "" . (substr($snakhir[$i], 15, (int)strlen($snakhir[$i]) - 1) + 1);
														} else {
															$snnew = $snakhir[$i] + 1;
														}

														if (strlen($snawal[$i]) > 10 &&  strlen($snawal[$i]) < 15) {
															$snnew1 = substr($snawal[$i], 0, 10) . "" . (substr($snawal[$i], 10, (int)strlen($snawal[$i]) - 1) - 1);
														} else if (strlen($snawal[$i]) > 15 &&  strlen($snawal[$i]) < 20) {
															$snnew1  = substr($snawal[$i], 0, 15) . "" . (substr($snawal[$i], 15, (int)strlen($snawal[$i]) - 1) - 1);
														} else {
															$snnew1 = $snawal[$i] - 1;
														}




														$data3 = array($iditem[$i], $expdate[$i], $snawal[$i], $snakhir[$i], $idwh2, $idsupp, $hargabeli, $idpo);
														$query3 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
														$eksekusi3 = $this->db->query($query3, $data3);
														if ($eksekusi3 == true) {
															$data4 =  array($iditem[$i], $expdate[$i], $snnew, $snmax, $idwh, $idsupp, $hargabeli, $idpo);
															$query4 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
															$eksekusi4 = $this->db->query($query4, $data4);
															if ($eksekusi4 == true) {
																$data5 =  array($iditem[$i], $expdate[$i], $snmin, $snnew1, $idwh, $idsupp, $hargabeli, $idpo);
																$query5 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
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
													} else if ($snawal[$i] > $snmin && $snakhir[$i] == $snmax) {

														$snnew = $snawal[$i] - 1;
														if (strlen($snawal[$i]) > 10 &&  strlen($snawal[$i]) < 15) {
															$snnew = substr($snawal[$i], 0, 10) . "" . (substr($snawal[$i], 10, (int)strlen($snawal[$i]) - 1) - 1);
														} else if (strlen($snawal[$i]) > 15 &&  strlen($snawal[$i]) < 20) {
															$snnew  = substr($snawal[$i], 0, 15) . "" . (substr($snawal[$i], 15, (int)strlen($snawal[$i]) - 1) - 1);
														} else {
															$snnew = $snawal[$i] - 1;
														}
														$data3 = array($iditem[$i], $expdate[$i], $snawal[$i], $snakhir[$i], $idwh2, $idsupp, $hargabeli, $idpo);
														$query3 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
														$eksekusi3 = $this->db->query($query3, $data3);
														if ($eksekusi3 == true) {
															$data4 =  array($iditem[$i], $expdate[$i], $snmin, $snnew, $idwh, $idsupp, $hargabeli, $idpo);
															$query4 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
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
													} else if ($snawal[$i] == $snmin && $snakhir[$i] == $snmax) {

														$snnew = $snawal[$i] - 1;
														if (strlen($snawal[$i]) > 10 &&  strlen($snawal[$i]) < 15) {
															$snnew = substr($snawal[$i], 0, 10) . "" . (substr($snawal[$i], 10, (int)strlen($snawal[$i]) - 1) - 1);
														} else if (strlen($snawal[$i]) > 15 &&  strlen($snawal[$i]) < 20) {
															$snnew  = substr($snawal[$i], 0, 15) . "" . (substr($snawal[$i], 15, (int)strlen($snawal[$i]) - 1) - 1);
														} else {
															$snnew = $snawal[$i] - 1;
														}
														$data3 = array($iditem[$i], $expdate[$i], $snawal[$i], $snakhir[$i], $idwh2, $idsupp, $hargabeli, $idpo);
														$query3 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
														$eksekusi3 = $this->db->query($query3, $data3);
														if ($eksekusi3 == true) {
															$respon = "Success";
														} else {
															$respon = "Failed for make new data sn";
															break;
														}
													} else if ($snawal[$i] == $snakhir[$i]) {
														if ($snawal[$i] == $snmin) {


															$snnew = $snawal[$i] + 1;
															if (strlen($snawal[$i]) > 10 &&  strlen($snawal[$i]) < 15) {
																$snnew = substr($snawal[$i], 0, 10) . "" . (substr($snawal[$i], 10, (int)strlen($snawal[$i]) - 1) + 1);
															} else if (strlen($snawal[$i]) > 15 &&  strlen($snawal[$i]) < 20) {
																$snnew  = substr($snawal[$i], 0, 15) . "" . (substr($snawal[$i], 15, (int)strlen($snawal[$i]) - 1) + 1);
															} else {
																$snnew = $snawal[$i] + 1;
															}
															$data3 = array($iditem[$i], $expdate[$i], $snawal[$i], $snawal[$i], $idwh2, $idsupp, $hargabeli, $idpo);
															$query3 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
															$eksekusi3 = $this->db->query($query3, $data3);
															if ($eksekusi3 == true) {
																$data4 =  array($iditem[$i], $expdate[$i], $snnew, $snmax, $idwh, $idsupp, $hargabeli, $idpo);
																$query4 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
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
														} else if ($snawal[$i] == $snmax) {
															$snnew = $snawal[$i] - 1;
															if (strlen($snawal[$i]) > 10 &&  strlen($snawal[$i]) < 15) {
																$snnew = substr($snawal[$i], 0, 10) . "" . (substr($snawal[$i], 10, (int)strlen($snawal[$i]) - 1) - 1);
															} else if (strlen($snawal[$i]) > 15 &&  strlen($snawal[$i]) < 20) {
																$snnew  = substr($snawal[$i], 0, 15) . "" . (substr($snawal[$i], 15, (int)strlen($snawal[$i]) - 1) - 1);
															} else {
																$snnew = $snawal[$i] - 1;
															}

															$data3 = array($iditem[$i], $expdate[$i], $snawal[$i], $snawal[$i], $idwh2, $idsupp, $hargabeli, $idpo);
															$query3 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
															$eksekusi3 = $this->db->query($query3, $data3);
															if ($eksekusi3 == true) {
																$data4 =  array($iditem[$i], $expdate[$i], $snmin, $snnew, $idwh, $idsupp, $hargabeli, $idpo);
																$query4 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
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
														} else if ($snawal[$i] > $snmin && $snawal[$i] < $snmax) {
															$snnew = $snawal[$i] + 1;
															$snnew1 = $snawal[$i] - 1;

															if (strlen($snawal[$i]) > 10 &&  strlen($snawal[$i]) < 15) {
																$snnew = substr($snawal[$i], 0, 10) . "" . (substr($snawal[$i], 10, (int)strlen($snawal[$i]) - 1) + 1);
															} else if (strlen($snawal[$i]) > 15 &&  strlen($snawal[$i]) < 20) {
																$snnew  = substr($snawal[$i], 0, 15) . "" . (substr($snawal[$i], 15, (int)strlen($snawal[$i]) - 1) + 1);
															} else {
																$snnew = $snawal[$i] + 1;
															}

															if (strlen($snawal[$i]) > 10 &&  strlen($snawal[$i]) < 15) {
																$snnew1 = substr($snawal[$i], 0, 10) . "" . (substr($snawal[$i], 10, (int)strlen($snawal[$i]) - 1) - 1);
															} else if (strlen($snawal[$i]) > 15 &&  strlen($snawal[$i]) < 20) {
																$snnew1  = substr($snawal[$i], 0, 15) . "" . (substr($snawal[$i], 15, (int)strlen($snawal[$i]) - 1) - 1);
															} else {
																$snnew1 = $snawal[$i] - 1;
															}

															$data3 = array($iditem[$i], $expdate[$i], $snawal[$i], $snawal[$i], $idwh2, $idsupp, $hargabeli, $idpo);
															$query3 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
															$eksekusi3 = $this->db->query($query3, $data3);
															if ($eksekusi3 == true) {
																$data4 =  array($iditem[$i], $expdate[$i], $snnew, $snmax, $idwh, $idsupp, $hargabeli, $idpo);
																$query4 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
																$eksekusi4 = $this->db->query($query4, $data4);
																if ($eksekusi4 == true) {
																	$data5 =  array($iditem[$i], $expdate[$i], $snmin, $snnew1, $idwh, $idsupp, $hargabeli, $idpo);
																	$query5 = "INSERT INTO tb_itemsn (iditem, expdate, idsn, idsn2 , idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
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
													break;
												}
											} else {
												$dataa = array($iditem[$i], $idwh, $expdate[$i], $iditem[$i], $expdate[$i], $snmin, $snmax, $idwh, $idsupp, $hargabeli, $idpo, $iditem[$i], $idwh2, $expdate[$i], $iditem[$i], $expdate[$i], $snmin, $snmax, $idwh2, $idsupp, $hargabeli, $idpo, $iditem[$i], $idwh2, $hargabeli, $idpo, $idsupp, $snmin, $snmax, $iditem[$i], $idwh2);
												$querry = "";
												$querry = $querry . " IF not EXISTS (SELECT * FROM tb_itemsn WHERE iditem = ? AND idwh = ? AND expdate = ?)";
												$querry = $querry . " INSERT INTO tb_itemsn (iditem,expdate,idsn,idsn2,idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
												$querry = $querry . " IF not EXISTS (SELECT * FROM tb_itemsn WHERE iditem = ? AND idwh = ? AND expdate = ?)";
												$querry = $querry . " INSERT INTO tb_itemsn (iditem,expdate,idsn,idsn2,idwh,idsupp,hargabeli,idpo)VALUES(?,?,?,?,?,?,?,?)";
												$querry = $querry . " IF not EXISTS (SELECT * FROM tb_itemqty WHERE iditem = ? AND idwh = ? AND CAST(endqty AS int) - (CAST(qtyso AS int) + 1 ) > 0)";
												$querry = $querry . " UPDATE tb_itemsn SET hargabeli = ? , idpo = ?, idsupp = ? WHERE idsn = ? AND idsn2 = ? AND iditem = ? AND idwh = ? ";
												$eksekusii = $this->db->query($querry, $dataa);
												if ($eksekusii == true) {

													$respon = "Success";
												} else {
													print_r($this->db->last_query());
													$respon = "Failed For initail Data";
													break;
												}
											}
										} else {
											print_r($this->db->last_query());
											$respon = "Failed For Get SN Before";
											break;
										}
									} else {
										print_r($this->db->last_query());
										$respon = "Failed on Detail Stock";
										break;
									}
								} else {

									$respon = "Success";
								}
							} else {
								print_r($this->db->last_query());
								$respon = "Failed on Detail";
								break;
							}
						} else {
							print_r($this->db->last_query());
							$respon = "Failed on Detail";
							break;
						}
					}


					if ($idmove == "" && $acc != "1") {

						if ($respon == "Success") {
							$dataxx = array($qty[$i - 1], $lastid);
							$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqty as a
								inner join movewhdet as b on a.iditem=b.iditem and a.idwh=b.idwh
								inner join tb_item as i on a.iditem=i.iditem
								where a.endqty - ? < 0 and b.idmove= ?
								";
							$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();


							if (count($eksekusix) > 0) {
								foreach ($eksekusix as $key) {
									$qnameitem = $key->nameitem;
									$respon = " Stock " . $qnameitem . " Minus";

									break;
								}
							}
						}
						if ($respon == "Success") {
							$queryxx = "SELECT i.nameitem,a.endqty from tb_itemqtyexp as a
								inner join movewhdet as b on a.iditem=b.iditem and a.idwh=b.idwh and a.expdate=b.expdate
								inner join tb_item as i on a.iditem=i.iditem
								where a.endqty - ? <0 and b.idmove= ?
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
					} else {



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
									$respon = " Stock " . $qnameitem . " Minus";

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
				}
			} else {
				print_r($this->db->last_query());
				$respon = "Failed on Update Header";
			}
		}
		if ($respon == "Success") {
			$notyet = 0;
			if ($idrequest != ""  && $norequestz != "xx") {


				for ($i = 0; $i < count($iditem); $i++) {
					$dataitem = array($qty[$i], $iditem[$i], $norequestz);
					$queryitem = "UPDATE tb_requestitemcounterdetail SET qtyin = qtyin + ? WHERE iditem = ? AND norequest = ?";
					$eksekusiitem = $this->db->query($queryitem, $dataitem);
					if ($eksekusiitem == true) {
						$respon = "Success";
					} else {
						$respon = "Failed";
						print_r($this->db->last_query());
						return;
					}
				}

				$data1 = array($norequestz);
				$query1 = "SELECT * FROM tb_requestitemcounterdetail WHERE  norequest = ?";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $key) {
						if ($key->qty  > $key->qtyin) {
							$notyet++;
						}
					}
				} else {
					$notyet++;
					// print_r($this->db->last_query());
					// return;
				}

				$status = "";
				if ($notyet == 0) {
					$status = "Accepted";
				} else {
					$status = "Process";
				}

				$data = array($status, $idrequest);
				$query = "UPDATE tb_requestitemcounterheader SET statusreq = ? WHERE idrequestheader = ?";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi == true) {
					$respon = "Success";
				} else {
					$respon = "Failed";
					return $respon;
					print_r($this->db->last_query());
				}
			} else {
				// echo "OK";

				$respon = "Success";
			}

			if ($acc == 1) {
				$datamove = array($idmove);
				$querymove = "SELECT * FROM movewh where idmove = ?";
				$eksekusimove = $this->db->query($querymove, $datamove)->result_object();
				if (count($eksekusimove) > 0) {

					foreach ($eksekusimove as $keymove) {
						if ($keymove->status == "Recived") {
							$respon = "Tidak dapat confirm karena sudah diconfirm oleh user lain";
							return $respon;
							print_r($this->db->last_query());
						} else {
							$respon = "Success";
						}
					}
				} else {
					$respon = "Failed Get data move";
					return $respon;
					print_r($this->db->last_query());
				}
			}
		}
		// else {
		// 	$respon = "FALSE";
		// 	print_r($this->db->last_query());
		// }

		if ($respon != "Success") {

			$this->db->trans_rollback();
		} else {
			// print_r($querys);
			$this->db->trans_commit();
		}
		return $respon;
	}

	function deletemovewh($idmove)
	{
		$this->db->trans_start();
		$respon = "Success";
		$queryx = "SELECT c.iditem,i.nameitem,d.expdate,a.endqty,isnull(b.endqty,0)as expqty,isnull(d.qty,0) as inqty,isnull(c.qty,0) as inqtyexp
			from (select iditem,idwh2 as idwh,sum(qty) as qty from dbo.movewhdet where idmove= ? group by iditem,idwh2 ) as c
			inner join (select iditem,idwh2 as idwh,expdate,sum(qty) as qty from dbo.movewhdet where idmove= ? group by iditem,idwh2,expdate ) as d
			on c.iditem=d.iditem and c.idwh=d.idwh
			inner join (select iditem,nameitem from dbo.tb_item ) as i
			on c.iditem=i.iditem
			left join (select iditem,idwh,endqty from dbo.tb_itemqty) as a
			on c.iditem=a.iditem and c.idwh=a.idwh
			left join (select iditem,idwh,endqty,expdate from dbo.tb_itemqtyexp ) as b
			on c.iditem=b.iditem and c.idwh=b.idwh and d.expdate=b.expdate
			";
		$data = array($idmove, $idmove);
		$eksekusix = $this->db->query($queryx, $data)->result_object();

		if (count($eksekusix) > 0) {
			foreach ($eksekusix as $key) {
				$qiditem = $key->iditem;
				$qnameitem = $key->nameitem;
				$qexpdate = $key->expdate;

				$qendqty = $key->endqty;
				$qinqty = $key->inqty;
				$qexpqty = $key->expqty;
				$qinqtyexp = $key->inqtyexp;
				if (($qendqty - $qinqty) < 0) {
					$respon = "Stock " . $qnameitem . " Minus";
					break;
				} else if (($qexpqty - $qinqtyexp) < 0) {
					$respon = "Stock Expired " . $qnameitem . " Minus";
					break;
				}
			}
		}
		if ($respon == "Success") {
			$data = array($idmove, $idmove, $idmove, $idmove, $idmove, $idmove);
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


				DELETE FROM movewhdet where idmove = ?
				DELETE FROM movewh where idmove = ?
				";

			$eksekusi2 = $this->db->query($queryx, $data);


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




	function readheaderinvin($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT a.*,p.codepo from invin as a
						left join po as p on a.idpo=p.idpo
						where a.idin = ?
					";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idin"]	= $key->idin;
				$f["idpo"]	= $key->idpo;
				$f["codein"]	= $key->codein;
				$f["codepo"]	= $key->codepo;
				$f["idsupp"]	= $key->idsupp;

				$f["datein"]	= $key->datein;
				$f["typein"]	= $key->typein;
				$f["qtyin"]	= $key->qtyin;
				$f["itemin"]	= $key->itemin;

				$f["descinfo"]	= $key->descinfo;
				$f["idwh"]	= $key->idwh;
				$f["nosuratjalan"]	= $key->nosuratjalan;
				$f["noinvoice"]	= $key->noinvoice;

				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailinvin($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem from invindet as b
			inner join tb_item as a on b.iditem=a.iditem  where b.idin = ? order by idindet";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["idin"]	= $key->idin;
				$f["idindet"]	= $key->idindet;
				$f["idpo"]	= $key->idpo;
				$f["idpodet"]	= $key->idpodet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	= $key->sku;
				$f["idsn"]	= $key->idsn;
				$f["idsn2"]	= $key->idsn2;
				$f["expdate"]	= $key->expdate;
				$f["nameitem"]	= $key->nameitem;
				$f["price"]	= $key->hargasatuan;
				$f["qty"]	= $key->qty;
				$f["unitvol"]	=  (($key->unitvol == 0) ? 1 : $key->unitvol);

				$datax = array($key->idpo, $key->iditem);
				$queryx = "SELECT * FROM podet WHERE  idpo = ? AND iditem = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["qtypo"] = $keyx->qty;
					}
				} else {
					$f["qtypo"] = 0;
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function getlistinvinret($cond)
	{
		$query = "SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser
			from invinret as a
			left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
			left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
			left join po as p on a.idpo=p.idpo
			left join tb_user as u1 on a.madeuser=u1.iduser
			left join tb_user as u2 on a.upduser=u2.iduser
			";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codeinret"]	= $key->codeinret;
				$f["codepo"]	= $key->codepo;
				$f["typeinret"]	= $key->typeinret;
				$f["dateinret"]	= $key->dateinret;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["iteminret"]	= $key->iteminret;
				$f["qtyinret"]	= $key->qtyinret;
				$f["nameuser"]	= $key->madeuser;
				$f['idinret']		= $key->idinret;


				$datax = array($key->idso);
				$queryx = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idso = ? AND tb_salesorder.idcust = common_detail.idcomm";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["codeso"] = $keyx->codeso;
						$f["nopesanan"] = $keyx->nopesanan;
						$f["namecust"] = $keyx->namecomm;
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getlistinvinretpaginate($start, $limit)
	{
		// $query = "SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser
		// 	from invinret as a
		// 	left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
		// 	left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
		// 	left join po as p on a.idpo=p.idpo
		// 	left join tb_user as u1 on a.madeuser=u1.iduser
		// 	left join tb_user as u2 on a.upduser=u2.iduser
		// 	";

		$this->db->select('a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser');
		$this->db->from('invinret as a');
		$this->db->join('common_detail as s', 'a.idsupp = s.idcomm', 'left');
		$this->db->join('common_detail as w', 'a.idwh = w.idcomm', 'left');
		$this->db->join('po as p', 'a.idpo = p.idpo', 'left');
		$this->db->join('tb_user as u1', 'a.madeuser = u1.iduser', 'left');
		$this->db->join('tb_user as u2', 'a.upduser = u2.iduser', 'left');
		$this->db->where('s.idgroup=1');
		$this->db->where('w.idgroup=4');
		$this->db->limit($start, $limit);

		$eksekusi = $this->db->get()->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codeinret"]	= $key->codeinret;
				$f["codepo"]	= $key->codepo;
				$f["typeinret"]	= $key->typeinret;
				$f["dateinret"]	= $key->dateinret;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["iteminret"]	= $key->iteminret;
				$f["qtyinret"]	= $key->qtyinret;
				$f["nameuser"]	= $key->madeuser;
				$f['idinret']		= $key->idinret;


				$datax = array($key->idso);
				$queryx = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idso = ? AND tb_salesorder.idcust = common_detail.idcomm";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["codeso"] = $keyx->codeso;
						$f["nopesanan"] = $keyx->nopesanan;
						$f["namecust"] = $keyx->namecomm;
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
		return $this->db->get('invinret')->num_rows();
	}

	function getdatareportoutpaginate($start, $limit, $filter, $search, $date1, $date2)
	{
		// $query = "SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser
		// 	from invinret as a
		// 	left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
		// 	left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
		// 	left join po as p on a.idpo=p.idpo
		// 	left join tb_user as u1 on a.madeuser=u1.iduser
		// 	left join tb_user as u2 on a.upduser=u2.iduser";
		$data  = "";
		$query = "";
		if ($search != "" && $date1 == "" && $date2 == "") {
			$data  = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,
			a.idsupp,s.namecomm as namesupp,s.namecomm, a.descinfo,w.namecomm as namewh,
			a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser,
		    ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM invinret as a
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as w on a.idsupp = w.idcomm 
			left join po as p on a.idpo = p.idpo 
			left join tb_user as u1 on a.madeuser = u1.iduser
			left join tb_user as u2 on a.madeuser = u2.iduser)  AS t
			WHERE $filter LIKE ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "") {
			$data  = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,
			a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,
			a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser,
		    ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM invinret as a
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as w on a.idsupp = w.idcomm 
			left join po as p on a.idpo = p.idpo 
			left join tb_user as u1 on a.madeuser = u1.iduser
			left join tb_user as u2 on a.madeuser = u2.iduser)  AS t
			WHERE REPLACE(dateinret, ' ', '') >= ? AND REPLACE(dateinret, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "") {
			$data  = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,
			a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,
			a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser,
		    ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM invinret as a
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as w on a.idsupp = w.idcomm 
			left join po as p on a.idpo = p.idpo 
			left join tb_user as u1 on a.madeuser = u1.iduser
			left join tb_user as u2 on a.madeuser = u2.iduser)  AS t
			WHERE $filter LIKE ? AND REPLACE(dateinret, ' ', '') >= ? AND REPLACE(dateinret, ' ', '') <= ? AND t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data  = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,
			a.idsupp,s.namecomm as namesupp,s.namecomm,a.descinfo,w.namecomm as namewh,
			a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser,
	    	ROW_NUMBER() OVER (Order by a.idso) AS RowNumber FROM invinret as a
			left join common_detail as s on a.idsupp = s.idcomm 
			left join common_detail as w on a.idsupp = w.idcomm 
			left join po as p on a.idpo = p.idpo 
			left join tb_user as u1 on a.madeuser = u1.iduser
			left join tb_user as u2 on a.madeuser = u2.iduser)  AS t
			WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}


		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codeinret"]	= $key->codeinret;
				$f["codepo"]	= $key->codepo;
				$f["typeinret"]	= $key->typeinret;
				$f["dateinret"]	= $key->dateinret;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["iteminret"]	= $key->iteminret;
				$f["qtyinret"]	= $key->qtyinret;
				$f["nameuser"]	= $key->madeuser;
				$f['idinret']		= $key->idinret;
				$f["data"] = array();


				$datax = array($key->idso);
				$queryx = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idso = ? AND tb_salesorder.idcust = common_detail.idcomm";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["codeso"] = $keyx->codeso;
						$f["nopesanan"] = $keyx->nopesanan;
						$f["namecust"] = $keyx->namecomm;
					}
				}

				$datax  = array($key->idinret);
				$queryx = "SELECT b.*,a.sku,a.nameitem from invinretdet as b inner join tb_item as a on b.iditem=a.iditem  where b.idinret = ? order by idinretdet";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$g["sku"]	    = $keyx->sku;
						$g["idsn"]	    = $keyx->idsn;
						$g["idsn2"]	    = $keyx->idsn2;
						$g["expdate"]	= $keyx->expdate;
						$g["nameitem"]	= $keyx->nameitem;
						$g["qty"]	    = $keyx->qty;

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

	function countreportoutgoing($filter, $search, $date1, $date2)
	{
		$this->db->select('*');
		$this->db->from('invinret');
		$this->db->join('common_detail', 'invinret.idsupp=common_detail.idcomm', 'left');
		if ($search != "" && $date1 == "" && $date2 == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "") {
			$this->db->where('dateinret', $date1, $date2);
		} else if ($search != "" && $date1 != "" && $date2 != "") {
			$this->db->where($filter, $search, 'dateinret', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getlistreportinpaginate($start, $limit)
	{
		// $query = "SELECT a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser
		// 	from invinret as a
		// 	left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
		// 	left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
		// 	left join po as p on a.idpo=p.idpo
		// 	left join tb_user as u1 on a.madeuser=u1.iduser
		// 	left join tb_user as u2 on a.upduser=u2.iduser
		// 	";

		$this->db->select('a.idso,a.typeinret, a.idinret,a.codeinret,p.codepo,a.dateinret,a.idsupp,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.iteminret,a.qtyinret,u1.username as madeuser,u2.username as upduser');
		$this->db->from('invinret as a');
		$this->db->join('common_detail as s', 'a.idsupp = s.idcomm', 'left');
		$this->db->join('common_detail as w', 'a.idsupp = w.idcomm', 'left');
		$this->db->join('po as p', 'a.idpo = p.idpo', 'left');
		$this->db->join('tb_user as u1', 'a.madeuser = u1.iduser', 'left');
		$this->db->join('tb_user as u2', 'a.upduser = u2.iduser', 'left');
		$this->db->where('s.idgroup=1');
		$this->db->limit($start, $limit);

		$eksekusi = $this->db->get()->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codeinret"]	= $key->codeinret;
				$f["codepo"]	= $key->codepo;
				$f["typeinret"]	= $key->typeinret;
				$f["dateinret"]	= $key->dateinret;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["iteminret"]	= $key->iteminret;
				$f["qtyinret"]	= $key->qtyinret;
				$f["nameuser"]	= $key->madeuser;
				$f['idinret']		= $key->idinret;


				$datax = array($key->idso);
				$queryx = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idso = ? AND tb_salesorder.idcust = common_detail.idcomm";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["codeso"] = $keyx->codeso;
						$f["nopesanan"] = $keyx->nopesanan;
						$f["namecust"] = $keyx->namecomm;
					}
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function countgetinvinret()
	{
		return $this->db->get('invinret')->num_rows();
	}

	function updateinvinret($iduser, $datein, $typein, $idpo, $idsupp, $descinfo, $qtyin, $itemin, $iditem, $qty, $idpodet, $idsn, $idsn2, $expdate, $idwh, $idin, $codein, $snid)
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
				$data = array(substr(date('YmdHisu'), 0, 15), $idpo, $idsupp, $datein, $typein, $qtyin, $itemin, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh);
				$query = "INSERT INTO invinret(codeinret,idpo,idsupp,dateinret,typeinret,qtyinret,iteminret,descinfo,madelog,madeuser,idwh)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
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
							$dataxx = array($lastid, ($i + 1), $idpo, $idpodet[$i], $iditem[$i], 1, $qty[$i], $idsn[$i], $idsn2[$i], $idwh, $expdate[$i], $snid[$i]);
							$queryxx = "INSERT INTO invinretdet (idinret,idinretdet,idpo,idpodet,iditem,unitvol,qty,idsn,idsn2,idwh,expdate,snid)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
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

	function deleteinvinret($idin)
	{
		$this->db->trans_start();
		$data = array($idin);
		$queryx = "SELECT a.qtyinv,a.idinv,a.idpo,isnull(b.statuspo,'') as statuspo  from invinret  as a
			left join po as b on a.idpo=b.idpo where a.idinret = ? ";

		$eksekusix = $this->db->query($queryx, $data)->result_object();
		$laststatus = 0;
		$isexists = false;
		$respon = "Success";
		if (count($eksekusix) > 0) {
			$lastid = 0;
			foreach ($eksekusix as $key) {
				$lastid = $key->qtyinv;
				$oldidinv = $key->idinv;
				$postatus = $key->statuspo;
				$oldidpo = $key->idpo;
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
		if ($respon == "Success") {
			$data = array($idin, $idin, $idin, $idin, $idin, $idin);
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
				DELETE FROM invinret where idinret = ? 
				
				";

			$eksekusi2 = $this->db->query($queryx, $data);


			if ($eksekusi2 == TRUE) {
				$respon = "Success";
			} else {
				$respon = "ERROR";
			}
		}
		if ($respon == "Success") {
			if ($oldidpo != '') {
				$dataxx = array($oldidpo);
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

		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}

	function readheaderinvinret($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT a.*,p.codepo from invinret as a
						left join po as p on a.idpo=p.idpo
						where a.idinret = ?
					";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idinret"]	= $key->idinret;
				$f["idpo"]	= $key->idpo;
				$f["idso"]	= $key->idso;
				$f["codeinret"]	= $key->codeinret;
				$f["codepo"]	= $key->codepo;
				$f["idsupp"]	= $key->idsupp;

				$f["dateinret"]	= $key->dateinret;
				$f["typeinret"]	= $key->typeinret;
				$f["qtyinret"]	= $key->qtyinret;
				$f["iteminret"]	= $key->iteminret;

				$f["descinfo"]	= $key->descinfo;
				$f["idwh"]	= $key->idwh;


				$datax = array($key->idso);
				$queryx = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idso = ? AND tb_salesorder.idcust = common_detail.idcomm";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$f["codeso"] = $keyx->codeso;
						$f["namecust"] = $keyx->namecomm;
					}
				}


				$respon = $f;
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function readdetailinvinret($idtrans)
	{
		$data = array($idtrans);
		$query = "SELECT b.*,a.sku,a.nameitem from invinretdet as b
			inner join tb_item as a on b.iditem=a.iditem  where b.idinret = ? order by idinretdet";

		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			$urut = 0;
			foreach ($eksekusi as $key) {
				$urut++;
				$f["nourut"]	= $urut;
				$f["idinret"]	= $key->idinret;
				$f["idinretdet"]	= $key->idinretdet;
				$f["idpo"]	= $key->idpo;
				$f["idpodet"]	= $key->idpodet;
				$f["iditem"]	= $key->iditem;
				$f["sku"]	= $key->sku;
				$f["idsn"]	= $key->idsn;
				$f["idsn2"]	= $key->idsn2;
				$f["expdate"]	= $key->expdate;
				$f["nameitem"]	= $key->nameitem;
				$f["qty"]	= $key->qty;
				$f["snid"]	= $key->snid;
				$f["unitvol"]	=  (($key->unitvol == 0) ? 1 : $key->unitvol);
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function getlistinvin($cond)
	{
		$query = "SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,a.noinvoice,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.itemin,a.qtyin,u1.username as madeuser,u2.username as upduser
			from invin as a
			left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
			left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
			left join po as p on a.idpo=p.idpo
			left join tb_user as u1 on a.madeuser=u1.iduser
			left join tb_user as u2 on a.upduser=u2.iduser
			ORDER BY a.datein ASC";
		// $query = $query ." where 1=1 " . $cond;
		// echo $query;
		// exit();
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codein"]	= $key->codein;
				$f["codepo"]	= $key->codepo;
				$f["datein"]	= $key->datein;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["itemin"]	= $key->itemin;
				$f["qtyin"]	= $key->qtyin;
				$f["nosuratjalan"]	= $key->nosuratjalan;
				$f["noinvoice"]	= $key->noinvoice;
				$f["nameuser"]	= $key->madeuser;
				$f['idin']		= $key->idin;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function reportingoingpaginate($start, $limit, $filter, $search, $date1, $date2)
	{

		$data = "";
		$query = "";
		if ($query != "Not Found") {
			if ($search != "" && $date1 == "" && $date2 == "") {
				$data = array($search, $start, $limit);
				$query = "SELECT  t. *  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,a.noinvoice,
		s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.itemin,a.qtyin,u1.username as madeuser,
		u2.username as upduser,
		ROW_NUMBER() OVER (Order by a.datein) AS RowNumber FROM invin as a 
		left join po as p on a.idpo = p.idpo 
		left join common_detail as s on a.idwh = s.idcomm 
		left join common_detail as w on a.idwh = w.idcomm  
		left join tb_user as u1 on a.madeuser = u1.iduser 
		left join tb_user as u2 on a.upduser = u2.iduser)
		AS t where $filter=? AND t.RowNumber >= ? AND t.RowNumber <= ?";
			} elseif ($search == "" && $date1 != "" && $date2 != "") {
				$data = array($date1, $date2, $start, $limit);
				$query = "SELECT  t. *  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,a.noinvoice,
		s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.itemin,a.qtyin,u1.username as madeuser,
		u2.username as upduser,
		ROW_NUMBER() OVER (Order by a.datein) AS RowNumber FROM invin as a 
		left join po as p on a.idpo = p.idpo 
		left join common_detail as s on a.idwh = s.idcomm 
		left join common_detail as w on a.idwh = w.idcomm  
		left join tb_user as u1 on a.madeuser = u1.iduser 
		left join tb_user as u2 on a.upduser = u2.iduser WHERE REPLACE(a.datein, ' ', '') >= ? AND REPLACE(a.datein, ' ', '') <= ?)
		AS t where RowNumber >= ? AND t.RowNumber <= ?";
			} elseif ($search != "" && $date1 != "" && $date2 != "") {
				$data = array($date1, $date2, $start, $limit);
				$query = "SELECT  t. *  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,a.noinvoice,
		s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.itemin,a.qtyin,u1.username as madeuser,
		u2.username as upduser,
		ROW_NUMBER() OVER (Order by a.datein) AS RowNumber FROM invin as a 
		left join po as p on a.idpo = p.idpo 
		left join common_detail as s on a.idwh = s.idcomm 
		left join common_detail as w on a.idwh = w.idcomm  
		left join tb_user as u1 on a.madeuser = u1.iduser 
		left join tb_user as u2 on a.upduser = u2.iduser WHERE $filter LIKE '%$search%' AND REPLACE(a.datein, ' ', '') >= ? AND REPLACE(a.datein, ' ', '') <= ?)
		AS t where RowNumber >= ? AND t.RowNumber <= ?";
			} else {
				$data = array($start, $limit);
				$query = "SELECT  t. *  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,a.noinvoice,
			s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.itemin,a.qtyin,u1.username as madeuser,
			u2.username as upduser,
			ROW_NUMBER() OVER (Order by a.datein) AS RowNumber FROM invin as a 
			left join po as p on a.idpo = p.idpo 
			left join common_detail as s on a.idwh = s.idcomm 
			left join common_detail as w on a.idwh = w.idcomm  
			left join tb_user as u1 on a.madeuser = u1.iduser 
			left join tb_user as u2 on a.upduser = u2.iduser)
			AS t where RowNumber >= ? AND t.RowNumber <= ?;";
			}
		}
		$eksekusi = $this->db->query($query, $data)->result_object();
		// $str = $this->db->last_query();
		// echo ($str);
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codein"]	= $key->codein;
				$f["codepo"]	= $key->codepo;
				$f["datein"]	= $key->datein;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["descinfo"]	= $key->descinfo;
				$f["namewh"]	= $key->namewh;
				$f["itemin"]	= $key->itemin;
				$f["qtyin"]	= $key->qtyin;
				$f["nosuratjalan"]	= $key->nosuratjalan;
				$f["noinvoice"]	= $key->noinvoice;
				$f["nameuser"]	= $key->madeuser;
				$f['idin']		= $key->idin;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function countreportingoing($filter, $search, $date1, $date2)
	{
		$this->db->select('*');
		$this->db->from('invin');
		if ($search != "" && $date1 == "" && $date2 == "") {
			$this->db->like($filter, $search);
		} else if ($search == "" && $date1 != "" && $date2 != "") {
			$this->db->where($filter, $search, $date1, $date2);
		} else if ($search != "" && $date1 != "" && $date2 != "") {
			$this->db->where($filter, $search, 'datein', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function getlistinvinpaginate($start, $limit, $filter, $search, $date1, $date2)
	{
		// $query = "SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,a.noinvoice,s.namecomm as namesupp,a.descinfo,w.namecomm as namewh,a.itemin,a.qtyin,u1.username as madeuser,u2.username as upduser
		// 	from invin as a
		// 	left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
		// 	left join (select idcomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
		// 	left join po as p on a.idpo=p.idpo
		// 	left join tb_user as u1 on a.madeuser=u1.iduser
		// 	left join tb_user as u2 on a.upduser=u2.iduser
		// 	ORDER BY a.datein ASC";

		$data = "";
		$query = "";

		if ($search != "" && $date1 == "" && $date2 == "") {
			$data = array("%" . $search . "%", $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,
						a.noinvoice,s.namecomm as namesupp,a.descinfo,
						a.itemin,a.qtyin,u1.username as madeuser,
					ROW_NUMBER() OVER (Order by a.idin) AS RowNumber FROM invin as a
					left join common_detail as s on a.idsupp = s.idcomm 
					left join po as p on a.idpo = p.idpo 
					left join tb_user as u1 on a.madeuser = u1.iduser)  AS t
					WHERE $filter LIKE ? AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search == "" && $date1 != "" && $date2 != "") {
			$data = array($date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,
						a.noinvoice,s.namecomm as namesupp,a.descinfo,
						a.itemin,a.qtyin,u1.username as madeuser,
					ROW_NUMBER() OVER (Order by a.idin) AS RowNumber FROM invin as a
					left join common_detail as s on a.idsupp = s.idcomm 
					left join po as p on a.idpo = p.idpo 
					left join tb_user as u1 on a.madeuser = u1.iduser)  AS t
					WHERE REPLACE(datein, ' ', '') >= ? AND REPLACE(datein, ' ', '') <= ? AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} elseif ($search != "" && $date1 != "" && $date2 != "") {
			$data = array("%" . $search . "%", $date1, $date2, $start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,
						a.noinvoice,s.namecomm as namesupp,a.descinfo,
						a.itemin,a.qtyin,u1.username as madeuser,
					ROW_NUMBER() OVER (Order by a.idin) AS RowNumber FROM invin as a
					left join common_detail as s on a.idsupp = s.idcomm 
					left join po as p on a.idpo = p.idpo 
					left join tb_user as u1 on a.madeuser = u1.iduser)  AS t
					WHERE $filter LIKE ? AND REPLACE(datein, ' ', '') >= ? AND REPLACE(datein, ' ', '') <= ? AND  t.RowNumber >= ? AND t.RowNumber <= ?";
		} else {
			$data = array($start, $limit);
			$query = "SELECT t.*  FROM (SELECT a.idin,a.codein,p.codepo,a.datein,a.idsupp, a.nosuratjalan,
						a.noinvoice,s.namecomm as namesupp,a.descinfo,
						a.itemin,a.qtyin,u1.username as madeuser,
					ROW_NUMBER() OVER (Order by a.idin) AS RowNumber FROM invin as a
					left join common_detail as s on a.idsupp = s.idcomm 
					left join po as p on a.idpo = p.idpo 
					left join tb_user as u1 on a.madeuser = u1.iduser)  AS t
					WHERE t.RowNumber >= ? AND t.RowNumber <= ?";
		}

		$eksekusi = $this->db->query($query, $data)->result_object();

		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["codein"]	= $key->codein;
				$f["codepo"]	= $key->codepo;
				$f["datein"]	= $key->datein;
				$f["idsupp"]	= $key->idsupp;
				$f["namesupp"]	= $key->namesupp;
				$f["descinfo"]	= $key->descinfo;
				$f["itemin"]	= $key->itemin;
				$f["qtyin"]	= $key->qtyin;
				$f["nosuratjalan"]	= $key->nosuratjalan;
				$f["noinvoice"]	= $key->noinvoice;
				$f["nameuser"]	= $key->madeuser;
				$f['idin']		= $key->idin;
				$f["data"] = array();

				$datax  = array($key->idin);
				$queryx = "SELECT b.*,a.sku,a.nameitem from invindet as b inner join tb_item as a on b.iditem=a.iditem  where b.idin = ? order by idindet";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $keyx) {
						$g["sku"]	    = $keyx->sku;
						$g["idsn"]	    = $keyx->idsn;
						$g["idsn2"]	    = $keyx->idsn2;
						$g["expdate"]	= $keyx->expdate;
						$g["nameitem"]	= $keyx->nameitem;
						$g["qty"]	    = $keyx->qty;

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

	function countgetinvin($filter, $search, $date1, $date2)
	{
		$this->db->select('*');
		$this->db->from('invin');
		$this->db->join('common_detail', 'invin.idsupp=common_detail.idcomm', 'left');
		$this->db->join('po', 'invin.idpo=po.idpo', 'left');
		if ($search != "" && $date1 == "" && $date2 == "") {
			$this->db->like($filter, $search);
		} elseif ($search == "" && $date1 != "" && $date2 != "") {
			$this->db->like('datein', $date1, $date2);
		} elseif ($search != "" && $date1 != "" && $date2 != "") {
			$this->db->like($filter, $search, 'datein', $date1, $date2);
		}
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function updateinvin($iduser, $datein, $typein, $idpo, $idsupp, $descinfo, $qtyin, $itemin, $iditem, $qty, $idpodet, $idsn, $idsn2, $expdate, $idwh, $idin, $codein, $nosj, $noinvo, $buyprice)
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
			$queryx = "SELECT a.idwh, a.qtyinv,a.idinv,a.idpo,isnull(b.statuspo,'') as statuspo  from invin  as a
				left join po as b on a.idpo=b.idpo where a.idin = ? ";

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
		if ($idin != '') {
			for ($i = 0; $i < count($iditem); $i++) {
				if (is_numeric($qty[$i]) && is_numeric($iditem[$i])) {
					$dataxx = array($lastid, ($i + 1), $idpo, $idpodet[$i], $iditem[$i], 1, $qty[$i], $idsn[$i], $idsn2[$i], $idwh, $expdate[$i]);
					if (!isset($xdet[$iditem[$i]])) {
						$xdet[$iditem[$i]][$expdate[$i]]['iditem'] = $iditem[$i];
						$xdet[$iditem[$i]][$expdate[$i]]['expdate'] = $expdate[$i];
						$xdet[$iditem[$i]][$expdate[$i]]['qty'] = 0;

						$xdet[$iditem[$i]]['iditem'] = $iditem[$i];
						$xdet[$iditem[$i]]['qty'] = 0;
					} else if (!isset($xdet[$iditem[$i]][$expdate[$i]])) {
						$xdet[$iditem[$i]][$expdate[$i]]['expdate'] = $expdate[$i];
						$xdet[$iditem[$i]][$expdate[$i]]['qty'] = 0;
					}
					$xdet[$iditem[$i]][$expdate[$i]]['qty'] += $qty[$i];
					$xdet[$iditem[$i]]['qty'] += $qty[$i];
				} else {
					$respon = "Failed on Detail";
					break;
				}
			}

			if ($respon == "Success") {
				$queryx = "SELECT c.iditem,i.nameitem,d.expdate,a.endqty,isnull(b.endqty,0)as expqty,isnull(d.qty,0) as inqty,isnull(c.qty,0) as inqtyexp
					from (select iditem,idwh,sum(qty*unitvol) as qty from dbo.invindet where idin= ? group by iditem,idwh ) as c
					inner join (select iditem,idwh,expdate,sum(qty*unitvol) as qty from dbo.invindet where idin= ? group by iditem,idwh,expdate ) as d
					on c.iditem=d.iditem and c.idwh=d.idwh
					inner join (select iditem,nameitem from dbo.tb_item ) as i
					on c.iditem=i.iditem
					left join (select iditem,idwh,endqty from dbo.tb_itemqty) as a
					on c.iditem=a.iditem and c.idwh=a.idwh
					left join (select iditem,idwh,endqty,expdate from dbo.tb_itemqtyexp ) as b
					on c.iditem=b.iditem and c.idwh=b.idwh and d.expdate=b.expdate
					";
				$data = array($idin, $idin);
				$eksekusix = $this->db->query($queryx, $data)->result_object();

				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						$qiditem = $key->iditem;
						$qnameitem = $key->nameitem;
						$qexpdate = $key->expdate;

						$qendqty = $key->endqty;
						$qinqty = $key->inqty;
						$qexpqty = $key->expqty;
						$qinqtyexp = $key->inqtyexp;
						if ($idwh == $oldidwh) {
							if (($qendqty - $qinqty + $xdet[$qiditem]['qty']) < 0) {
								$respon = "Stock " . $qnameitem . " Minus";
								break;
							} else if (($qexpqty - $qinqtyexp + $xdet[$qiditem][$qexpdate]['qty']) < 0) {
								$respon = "Stock Expired " . $qnameitem . " Minus";
								break;
							}
						} else {
							if (($qendqty - $qinqty) < 0) {
								$respon = "Stock " . $qnameitem . " Minus";
								break;
							} else if (($qexpqty - $qinqtyexp) < 0) {
								$respon = "Stock Expired " . $qnameitem . " Minus";
								break;
							}
						}
					}
				}
				// foreach ($xdet as $subkey ) {
				// 	$yitemid=$key -> iditem;
				// 	$yqty=$key -> qty;
				// 	foreach ($subkey as $key ) {
				// 		$zitemid=$key -> iditem;
				// 		$zexpdate=$key -> expdate;
				// 		$zqty=$key -> qty;
				// 	}
				// }
			}
		}

		if ($respon == "Success") {

			if ($idin == '') {
				$data = array(substr(date('YmdHisu'), 0, 15), $idpo, $idsupp, $datein, $typein, $qtyin, $itemin, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $nosj, $noinvo);
				$query = "INSERT INTO invin(codein,idpo,idsupp,datein,typein,qtyin,itemin,descinfo,madelog,madeuser,idwh,nosuratjalan,noinvoice)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			} else {
				$data = array($idsupp, $idpo, $datein, $typein, $qtyin, $itemin, $descinfo, date('Y-m-d H:i:s.u'), $iduser, $idwh, $nosj, $noinvo, $idin);
				$query = "UPDATE invin SET idsupp = ? ,idpo = ? ,datein = ? ,typein = ? ,qtyin = ? ,itemin = ? ,descinfo = ? ,madelog = ? ,madeuser = ? ,idwh = ?, nosuratjalan= ? , noinvoice = ? WHERE idin = ? ";
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
						$data = array($idin, $idin, $idin, $idin, $idin, $idin);
						$queryx = "UPDATE podet set podet.qtyin=podet.qtyin-x.tqty
							from
							(
								select idpo,idpodet,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
							) as x
							where podet.idpo=x.idpo and podet.idpodet=x.idpodet 

							UPDATE po set po.qtyin=po.qtyin-y.tqty
							from
							(
								select idpo,sum((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
								group by idpo
							) as y
							where po.idpo=y.idpo 


							DELETE tb_itemsn
							FROM tb_itemsn 
							INNER JOIN invindet as a
							ON tb_itemsn.expdate=a.expdate and tb_itemsn.idsn=a.idsn and tb_itemsn.idsn2=a.idsn2
							WHERE a.idin= ? 

							UPDATE tb_itemqtyexp  set tb_itemqtyexp.inqty=tb_itemqtyexp.inqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty-x.tqty
							from
							(
								select expdate,idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
							) as x
							where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

							UPDATE tb_itemqty  set tb_itemqty.inqty=tb_itemqty.inqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty-x.tqty
							from
							(
								select idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
							) as x
							where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

							DELETE FROM invindet where idin = ? ";
						$eksekusix = $this->db->query($queryx, $data);
					}

					// if ($idpo==''){
					// 	$query = "if exists( SELECT codetrans from transstatus where codetrans='IN') ";
					// 	$query = $query ."UPDATE transstatus set s". $statuspo ."=s". $statuspo ."+1 where codetrans='IN' ";
					// 	$query = $query ."else ";
					// 	$query = $query ."INSERT INTO transstatus(codetrans,s". $statuspo .")VALUES('PO',1)";
					// }else{
					// 	$query = "UPDATE transstatus set s". $laststatus ."=s". $laststatus ."-1 where codetrans='PO' ";
					// 	$query = $query . "UPDATE transstatus set s". $statuspo ."=s". $statuspo ."+1 where codetrans='PO' ";
					// }
					// $eksekusi2 = $this->db->query($query);


					$statuspo = 0;

					if ($oldidpo != $idpo) {
						if ($oldidpo != 0) {
							if ($postatus != '02') {
								$dataxx = array($oldidpo);
								$queryxx = "UPDATE po set statuspo='02' where idpo = ?; ";
								$queryxx = "UPDATE transstatus set s" . $postatus . "=s" . $postatus . "-1,s02=s02+1 where codetrans='PO' ";
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
								$queryxx = "UPDATE transstatus set s" . $statuspo . "=s" . $statuspo . "-1,s02=s02+1 where codetrans='PO' ";
								$eksekusixx = $this->db->query($queryxx, $dataxx);
							}
						}
					} else {
						if ($oldidpo != 0) {
							if ($postatus != '02') {
								$dataxx = array($oldidpo);
								$queryxx = "UPDATE po set statuspo='02' where idpo = ? ";
								$queryxx = "UPDATE transstatus set s" . $postatus . "=s" . $postatus . "-1,s02=s02+1 where codetrans='PO' ";
								$eksekusixx = $this->db->query($queryxx, $dataxx);
							}
						}
					}

					$respon = "Success";

					for ($i = 0; $i < count($iditem); $i++) {
						if (is_numeric($qty[$i]) && is_numeric($iditem[$i])) {
							$dataxx = array($lastid, ($i + 1), $idpo, $idpodet[$i], $iditem[$i], 1, $qty[$i], $idsn[$i], $idsn2[$i], $idwh, $expdate[$i], $buyprice[$i]);
							$queryxx = "INSERT INTO invindet (idin,idindet,idpo,idpodet,iditem,unitvol,qty,idsn,idsn2,idwh,expdate,hargasatuan)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
							$eksekusixx = $this->db->query($queryxx, $dataxx);
							if ($eksekusixx == true) {
								if ($idpo != '' && $statuspo != '04') {
									$dataxx = array($qty[$i], $idpo, $idpodet[$i], $qty[$i], $idpo);
									$queryxx = "UPDATE podet set qtyin=qtyin + ? where idpo = ? and idpodet = ? ;";
									// $queryxx = "UPDATE po set qtyin=qtyin + ? where idpo = ? ";
									$queryxx = "UPDATE po set qtyin=qtyin + 1";
									$eksekusixx = $this->db->query($queryxx, $dataxx);

									if ($eksekusixx == true) {
										$respon = "Success";
									} else {
										$respon = "Failed on Detail Qty PO";
										break;
									}
								}

								if ($idsn[$i] != "0") {

									$dataxx = array($iditem[$i], $idsn[$i], $idsn2[$i], $idwh, $expdate[$i], $idsupp, $buyprice[$i], $idpo, $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh);
									$queryxx = "INSERT INTO tb_itemsn(iditem,idsn,idsn2,idwh,expdate,idsupp,hargabeli,idpo) values(?,?,?,?,?,?,?,?);";
									$queryxx = "SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ?  ;";
									$queryxx = "INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0,?); ";
									$queryxx = "UPDATE tb_itemqtyexp SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? and expdate = ? ;";

									$queryxx = "SELECT iditem from tb_itemqty where iditem = ? and idwh = ?;";
									$queryxx = "INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0,?) ;";
									$queryxx = "UPDATE tb_itemqty SET inqty = inqty , endqty = endqty";
									$eksekusixx = $this->db->query($queryxx, $dataxx);

									if ($eksekusixx == true) {
										$respon = "Success";
									} else {
										$respon = "Failed on Detail Qty PO";
										break;
									}
								} else {
									$dataxx = array($idsn[$i], $idsn2[$i], $iditem[$i], $idwh, $iditem[$i], $idsn[$i], $idsn2[$i], $idwh, $expdate[$i], $idsupp, $buyprice[$i], $idpo, $iditem[$i], $idwh, $buyprice[$i], $idpo, $idsupp, $idsn[$i], $idsn2[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $expdate[$i], $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh, $expdate[$i], $iditem[$i], $idwh, $iditem[$i], $idwh, $qty[$i], $qty[$i], $qty[$i], $qty[$i], $iditem[$i], $idwh);
									$queryxx = " select * from tb_itemsn WHERE idsn = ? AND idsn2 = ? AND iditem = ? AND idwh = ? ;
												 INSERT INTO tb_itemsn(iditem,idsn,idsn2,idwh,expdate,idsupp,hargabeli,idpo) values(?,?,?,?,?,?,?,?) ;
												 select * from tb_itemqty WHERE iditem = ? AND idwh = ? AND endqty  > 0;
												 UPDATE tb_itemsn SET hargabeli = ? , idpo = ?, idsupp = ? WHERE idsn = ? AND idsn2 = ? AND iditem = ? AND idwh = ?;";
									$queryxx ="SELECT iditem from tb_itemqtyexp where iditem = ? and idwh = ? and expdate = ?  ;";
									$queryxx ="INSERT INTO tb_itemqtyexp(iditem,idwh,expdate,beginqty,inqty,outqty,endqty) values(?,?,?,0,?,0,?) ;";
									$queryxx ="UPDATE tb_itemqtyexp SET inqty = inqty + ? , endqty = endqty + ? where iditem = ? and idwh = ? and expdate = ?; ";

									$queryxx ="SELECT iditem from tb_itemqty where iditem = ? and idwh = ? ;";
									$queryxx ="INSERT INTO tb_itemqty(iditem,idwh,beginqty,inqty,outqty,endqty) values(?,?,0,?,0,?) ;";
									$queryxx ="UPDATE tb_itemqty SET inqty = inqty , endqty = endqty";
									$eksekusixx = $this->db->query($queryxx, $dataxx);
									if ($eksekusixx == true) {
										$respon = "Success";
									} else {
										$respon = "Failed on Detail Qty PO";
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
						$avgprice = 0;
						$data3 = array($iditem[$i]);
						$query3 = "SELECT AVG(CAST(hargasatuan AS INT)) AS total FROM invindet WHERE iditem = ?";
						$eksekusi3 = $this->db->query($query3, $data3)->result_object();
						if (count($eksekusi3) > 0) {
							foreach ($eksekusi3 as $key3) {
								$avgprice = $key3->total;
							}
						}

						$data1 = array($avgprice, $iditem[$i]);
						$query1 = "UPDATE tb_item  SET pricebuyitem = ? WHERE iditem = ?";
						$eksekusi1 = $this->db->query($query1, $data1);
						if ($eksekusi1 == true) {
							$respon = "Success";
						} else {
							$respon = "Failed for update price buy item";
							break;
						}
					}
					if ($respon == "Success") {
						if ($idpo != '' && $statuspo != '04') {
							$dataxx = array($idpo);
							$queryxx = "SELECT i.nameitem,b.qty-b.qtyin as endqty,b.qtyin-b.qtyret as xinqty from
								(select iditem,sum(qty)as qty,sum(qtyin) as qtyin,sum(qtyret) as qtyret from podet where idpo= ? group by iditem)as b 
								inner join tb_item as i on b.iditem=i.iditem
								where b.qty-b.qtyin<0 or b.qtyin-b.qtyret<0
								";
							$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

							if (count($eksekusix) > 0) {
								foreach ($eksekusix as $key) {
									$qnameitem = $key->nameitem;
									$qtyin = $key->endqty;
									$qtyret = $key->xinqty;
									if ($qtyin < 0) {
										$respon = "Inventory In " . $qnameitem . " Over than Order";
									} else if ($qtyin < 0) {
										$respon = "Inventory In Retur " . $qnameitem . " Over than Inventory In";
									}
									break;
								}
							}
						}
					}
					if ($respon == "Success") {
						if ($oldidpo != '') {
							$dataxx = array($oldidpo);
							$queryxx = "SELECT i.nameitem,b.qty-b.qtyin as endqty,b.qtyin-b.qtyret as xinqty from
								(select iditem,sum(qty)as qty,sum(qtyin) as qtyin,sum(qtyret) as qtyret from podet where idpo= ? group by iditem)as b 
								inner join tb_item as i on b.iditem=i.iditem
								where b.qty-b.qtyin<0 or b.qtyin-b.qtyret<0
								";
							$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

							if (count($eksekusix) > 0) {
								foreach ($eksekusix as $key) {
									$qnameitem = $key->nameitem;
									$qtyin = $key->endqty;
									$qtyret = $key->xinqty;
									if ($qtyin < 0) {
										$respon = "Inventory In " . $qnameitem . " Over than Order";
									} else if ($qtyret < 0) {
										$respon = "Inventory In Retur " . $qnameitem . " Over than Inventory In";
									}
									break;
								}
							}
						}
					}
				}
			} else {
				$respon = "Failed on Update Header";
			}
		}
		//if (respon=='Success' ){
		if (($this->db->trans_status() === FALSE) || $respon != "Success") {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_complete();
		}
		return $respon;
	}


	function deleteinvin($idin)
	{
		$this->db->trans_start();
		$data = array($idin);
		$queryx = "SELECT a.qtyinv,a.idinv,a.idpo,isnull(b.statuspo,'') as statuspo  from invin  as a
			left join po as b on a.idpo=b.idpo where a.idin = ? ";

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
		$respon = "Success";
		$queryx = "SELECT c.iditem,i.nameitem,d.expdate,a.endqty,isnull(b.endqty,0)as expqty,isnull(d.qty,0) as inqty,isnull(c.qty,0) as inqtyexp
			from (select iditem,idwh,sum(qty*unitvol) as qty from dbo.invindet where idin= ? group by iditem,idwh ) as c
			inner join (select iditem,idwh,expdate,sum(qty*unitvol) as qty from dbo.invindet where idin= ? group by iditem,idwh,expdate ) as d
			on c.iditem=d.iditem and c.idwh=d.idwh
			inner join (select iditem,nameitem from dbo.tb_item ) as i
			on c.iditem=i.iditem
			left join (select iditem,idwh,endqty from dbo.tb_itemqty) as a
			on c.iditem=a.iditem and c.idwh=a.idwh
			left join (select iditem,idwh,endqty,expdate from dbo.tb_itemqtyexp ) as b
			on c.iditem=b.iditem and c.idwh=b.idwh and d.expdate=b.expdate
			";
		$data = array($idin, $idin);
		$eksekusix = $this->db->query($queryx, $data)->result_object();

		if (count($eksekusix) > 0) {
			foreach ($eksekusix as $key) {
				$qiditem = $key->iditem;
				$qnameitem = $key->nameitem;
				$qexpdate = $key->expdate;

				$qendqty = $key->endqty;
				$qinqty = $key->inqty;
				$qexpqty = $key->expqty;
				$qinqtyexp = $key->inqtyexp;
				if (($qendqty - $qinqty) < 0) {
					$respon = "Stock " . $qnameitem . " Minus";
					break;
				} else if (($qexpqty - $qinqtyexp) < 0) {
					$respon = "Stock Expired " . $qnameitem . " Minus";
					break;
				}
			}
		}
		if ($respon == "Success") {
			$data = array($idin, $idin, $idin, $idin, $idin, $idin, $idin);
			$queryx = "UPDATE podet set podet.qtyin=podet.qtyin-x.tqty
				from
				(
					select idpo,idpodet,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
				) as x
				where podet.idpo=x.idpo and podet.idpodet=x.idpodet 

				UPDATE po set po.qtyin=po.qtyin-y.tqty
				from
				(
					select idpo,sum((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
					group by idpo
				) as y
				where po.idpo=y.idpo 


				DELETE tb_itemsn
				FROM tb_itemsn 
				INNER JOIN invindet as a
				ON tb_itemsn.expdate=a.expdate and tb_itemsn.idsn=a.idsn and tb_itemsn.idsn2=a.idsn2
				WHERE a.idin= ? 

				UPDATE tb_itemqtyexp  set tb_itemqtyexp.inqty=tb_itemqtyexp.inqty-x.tqty,tb_itemqtyexp.endqty=tb_itemqtyexp.endqty-x.tqty
				from
				(
					select expdate,idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
				) as x
				where tb_itemqtyexp.iditem=x.iditem and tb_itemqtyexp.idwh=x.idwh and tb_itemqtyexp.expdate=x.expdate

				UPDATE tb_itemqty  set tb_itemqty.inqty=tb_itemqty.inqty-x.tqty,tb_itemqty.endqty=tb_itemqty.endqty-x.tqty
				from
				(
					select idwh,iditem,((case when unitvol=0 then 1 else unitvol end)*qty) as tqty from invindet as a where idin= ? 
				) as x
				where tb_itemqty.iditem=x.iditem and tb_itemqty.idwh=x.idwh

				DELETE FROM invindet where idin = ?
				DELETE FROM invin where idin = ?
				";

			$eksekusi2 = $this->db->query($queryx, $data);


			if ($eksekusi2 == TRUE) {
				$respon = "Success";
			} else {
				$respon = "ERROR";
			}
		}
		if ($respon == "Success") {
			if ($oldidpo != '') {
				$dataxx = array($oldidpo);
				$queryxx = "SELECT i.nameitem,b.qty-b.qtyin as endqty,b.qtyin-b.qtyret as xinqty from
					(select iditem,sum(qty)as qty,sum(qtyin) as qtyin,sum(qtyret) as qtyret from podet where idpo= ? group by iditem)as b 
					inner join tb_item as i on b.iditem=i.iditem
					where b.qty-b.qtyin<0 or b.qtyin-b.qtyret<0
					";
				$eksekusix = $this->db->query($queryxx, $dataxx)->result_object();

				if (count($eksekusix) > 0) {
					foreach ($eksekusix as $key) {
						$qnameitem = $key->nameitem;
						$qtyin = $key->endqty;
						$qtyret = $key->xinqty;
						if ($qtyin < 0) {
							$respon = "Inventory In " . $qnameitem . " Over than Order";
						} else if ($qtyret < 0) {
							$respon = "Inventory In Retur " . $qnameitem . " Over than Inventory In";
						}
						$this->db->trans_rollback();
						return $respon;
					}
				}
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
}
