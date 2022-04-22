<?php


class Quotation extends CI_Model
{
	function addquotation($noquo, $typequo, $judul, $cust, $cur, $vats, $norek, $paymentmethod, $delivdate, $jasapengirim, $delivaddr, $moreinfo, $expquo, $disper, $disnom, $grandtotals, $jmlitem, $iditem, $nameitem, $qty, $harga, $disc, $vat, $total, $iduser)
	{
		$vatx = 0;
		for ($i = 0; $i < count($iditem); $i++) {
			$vatx = $vatx + ($vat[$i] * $qty[$i]);
		}
		$data = array($noquo, $judul, $cust, '14', date('Y-m-d'), $expquo, $typequo, $paymentmethod, $norek, 'Waiting', date('Y-m-d H:i:s'), $iduser, $grandtotals, $vatx, $delivdate, $jasapengirim, $delivaddr, $disnom, $moreinfo, $jmlitem);
		$query = "INSERT INTO tb_quotation(codequo,namequotation,idcust,idcurrency,datequo,expquo,typequo,typepayment,norek,statusquo,madelog,madeuser,pricetotal,VAT,delivdate,jasapengirim,delivaddr,disc,moreinfo,totalquo)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$datax = array($noquo);
			$queryx = "SELECT * FROM tb_quotation WHERE codequo = ?";
			$eksekusix = $this->db->query($queryx, $datax)->result_object();
			if (count($eksekusix) > 0) {
				foreach ($eksekusix as $key) {
					for ($i = 0; $i < count($iditem); $i++) {
						$dataxx = array($key->idquo, $iditem[$i], $qty[$i], $harga[$i], $disc[$i], $vat[$i], $total[$i]);
						$queryxx = "INSERT INTO tb_quotationdetail (idquo,iditem,qty,price,disc,VAT,totalprice)VALUES(?,?,?,?,?,?,?)";
						$eksekusixx = $this->db->query($queryxx, $dataxx);
						if ($eksekusixx == true) {
							$respon = "Success";
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

		return $respon;
	}


	function getdataquotationbyid($id)
	{
		$data = array(base64_decode($id));
		$query = "SELECT * FROM tb_quotation, common_detail WHERE tb_quotation.idquo = ? AND tb_quotation.idcust = common_detail.idcomm";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {

				$f["idquo"] = $key->idquo;
				$f["codequo"] = $key->codequo;
				$f["namequotation"] = $key->namequotation;
				$f["idcust"] = $key->idcust;
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
				$f["jasapengirim"] = $key->jasapengirim;

				$f["delivdate"] = $key->delivdate;
				$f["discs"] = $key->disc;
				$f["delivaddr"] = $key->delivaddr;
				$f["moreinfo"] = $key->moreinfo;
				$f["address"] = $key->attrib1;
				$f["address"] = $key->attrib1;
				$f["attrib2"] = $key->attrib2;

				$queryx = "SELECT *,tb_quotationdetail.VAT as vatx FROM tb_quotationdetail,tb_item,common_detail,tb_itemqty WHERE tb_quotationdetail.idquo = ? AND tb_quotationdetail.iditem = tb_item.iditem AND tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 = 'counter'";
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
						$g["vat"] = $keyx->vatx;
						$g["totalprice"] = $keyx->totalprice;

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


	function editquotation($idquo, $noquo, $typequo, $judul, $cust, $cur, $vats, $norek, $paymentmethod, $delivdate, $jasapengirim, $delivaddr, $moreinfo, $expquo, $disper, $disnom, $grandtotals, $jmlitem, $iditem, $nameitem, $qty, $harga, $disc, $vat, $total, $iduser)
	{
		$vatx = 0;
		for ($i = 0; $i < count($iditem); $i++) {
			$vatx = $vatx + ($vat[$i] * $qty[$i]);
		}
		$data  = array($judul, $cust, '14', $vatx, $norek, $paymentmethod, $delivdate, $jasapengirim, $delivaddr, $moreinfo, $expquo, $disnom, $grandtotals, date('Y-m-d H:i:s'), $iduser, count($iditem), $idquo);
		$query = "UPDATE tb_quotation SET namequotation = ? , idcust = ? , idcurrency = ? , VAT = ? , norek = ? , typepayment = ?, delivdate = ? ,jasapengirim = ? ,delivaddr = ?, moreinfo = ?, expquo = ? , disc = ?, pricetotal = ?, updlog = ? , upduser = ?, totalquo = ? WHERE idquo = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$datax = array($idquo);
			$queryx = "DELETE FROM tb_quotationdetail WHERE idquo = ?";
			$eksekusix = $this->db->query($queryx, $datax);
			if ($eksekusix == true) {
				for ($i = 0; $i < count($iditem); $i++) {
					$dataxx = array($idquo, $iditem[$i], $qty[$i], $harga[$i], $disc[$i], $vat[$i], $total[$i]);
					$queryxx = "INSERT INTO tb_quotationdetail (idquo,iditem,qty,price,disc,VAT,totalprice)VALUES(?,?,?,?,?,?,?)";
					$eksekusixx = $this->db->query($queryxx, $dataxx);
					if ($eksekusixx == true) {
						$respon = "Success";
					} else {
						$respon = "Failed on Detail";
					}
				}
			} else {
				$respon = "Failed on Delete Detail";
			}
		} else {
			$respon = "Failed on Update Header";
		}

		return $respon;
	}


	function deletequotation($id)
	{
		$data = array(base64_decode($id));
		$query = "DELETE FROM tb_quotation WHERE idquo = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$queryx = "DELETE FROM tb_quotationdetail WHERE idquo = ?";
			$eksekusix = $this->db->query($queryx, $data);
			if ($eksekusix == true) {
				$respon = "Success";
			} else {
				$respon = "Failed on Detail";
			}
		} else {
			$respon = "Failed on Header";
		}

		return $respon;
	}


	function insertsalesorderfromexcel($datatransaksi)
	{

		$this->db->trans_begin();
		$fail = 0;
		$success = 0;
		$successso = 0;
		$pending = 0;
		$pendingso = 0;
		$text = '';
		foreach ($datatransaksi as $key) {

			$dataso = array((string)$key["nopes"]);
			$queryso = "SELECT * FROM tb_salesorder WHERE nopesanan = ?";
			$eksekusiso = $this->db->query($queryso, $dataso)->result_object();
			if (count($eksekusiso) == 0) {


				$data = array($key["noso"], $key["nopes"], $key["idcust"], '14', $key["datetrans"], $key["delivdate"], $key["jasapengirim"], $key["address"], $key["delivfee"], '29', $key["subtotal"], '0', '0', $key["subtotal"], $key["typeso"], $key["qty"], 'Waiting', date('Y-m-d H:i:s'), $key["iduser"], $key["noresi"], "");
				$query = "INSERT INTO tb_salesorder(codeso,nopesanan,idcust,idcurrency,dateso,delivdate,jasapengirim,delivaddr,delivfee,typepayment,subtotal,disc,VAT,totalprice,typeso,totalso,statusorder,madelog,madeuser,noresi,returnso,froms)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Excel')";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi == true) {
					$datax = array($key["noso"]);
					$queryx = "SELECT * FROM tb_salesorder WHERE codeso = ?";
					$eksekusix = $this->db->query($queryx, $datax)->result_object();
					if (count($eksekusix) > 0) {
						$status = "";
						$succes = 0;
						$pending = 0;
						foreach ($eksekusix as $key1) {
							foreach ($key["data"] as $key2) {


								$dataxxxx = array($key2["iditemx"], $key2["idwh"]);
								$queryxxxx  = "SELECT * FROM tb_item , tb_itemqty WHERE tb_item.iditem = ? AND tb_itemqty.idwh = ? AND tb_item.iditem = tb_itemqty.iditem";
								$eksekusixxxx = $this->db->query($queryxxxx, $dataxxxx)->result_object();
								if (count($eksekusixxxx) > 0) {
									foreach ($eksekusixxxx as $keyxx) {
										if (0 <=  $key2["qtyready"]) {
											if (0 <= ($keyxx->endqty - $keyxx->qtyso - $key2["qtyready"])) {
												if ($status == "") {

													$dataxx = array($key1->idso, $key2["iditemx"], $key2["qtyorder"], $key2["hargaitem"], $key2["discx"], $key2["subtotalxx"], str_replace("Rp ", "", str_replace(".", "", $key2["hargabeli"])), $key2["vat"], $key2["dpp"]);
													$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
													$eksekusixx = $this->db->query($queryxx, $dataxx);
													if ($eksekusixx == true) {
														$dataxxx = array($key2["qtyorder"], $key2["iditemx"], $key2["idwh"]);
														$queryxxx = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
														$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
														if ($eksekusixxx == true) {
															$success++;
															$respon = "Success";
														} else {
															$fail++;
															$text = '1';
															$respon = "Failed on Update QTY";
														}
													} else {
														$fail++;
														$text = '2';
														$respon = "Failed on Detail";
													}
												} else {

													$dataxx = array($key1->idso, $key2["iditemx"], $key2["qtyorder"], $key2["hargaitem"], $key2["discx"], $key2["subtotalxx"], $key2["hargabeli"], $key2["vat"], $key2["dpp"]);
													$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
													$eksekusixx = $this->db->query($queryxx, $dataxx);
													if ($eksekusixx == true) {
														$dataxxx = array($key1->idso);
														$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
														$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
														if ($eksekusixxx == true) {


															$dataa = array($key2["qtyorder"], $key2["iditemx"], $key2["idwh"]);
															$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
															$eksekusii = $this->db->query($queryy, $dataa);
															if ($eksekusii == true) {
																$pending++;
																$respon = "Success";
															} else {
																$fail++;
																$text = '1';
																$respon = "Failed on Update QTY";
															}
														} else {
															$fail++;
															$text = '3';
															$respon = "Failed on Update QTY";
														}
													} else {
														$fail++;
														$text = '4';
														$respon = "Failed on Detail";
													}
												}
											} else {
												$dataxx = array($key1->idso, $key2["iditemx"], $key2["qtyorder"], $key2["hargaitem"], $key2["discx"], $key2["subtotalxx"], $key2["hargabeli"], $key2["vat"], $key2["dpp"]);
												$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
												$eksekusixx = $this->db->query($queryxx, $dataxx);
												if ($eksekusixx == true) {
													$dataxxx = array($key1->idso);
													$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
													$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
													if ($eksekusixxx == true) {

														$dataa = array($key2["qtyorder"], $key2["iditemx"], $key2["idwh"]);
														$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
														$eksekusii = $this->db->query($queryy, $dataa);
														if ($eksekusii == true) {
															$pending++;
															$respon = "Success";
														} else {
															$fail++;
															$text = '1';
															$respon = "Failed on Update QTY";
														}
													} else {
														$fail++;
														$text = '5';
														$respon = "Failed on Update QTY";
													}
												} else {
													$fail++;
													$text = '6';
													$respon = "Failed on Detail";
												}
											}
										} else {
											$dataxx = array($key1->idso, $key2["iditemx"], $key2["qtyorder"], $key2["hargaitem"], $key2["discx"], $key2["subtotalxx"], $key2["hargabeli"], $key2["vat"], $key2["dpp"]);
											$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
											$eksekusixx = $this->db->query($queryxx, $dataxx);
											if ($eksekusixx == true) {
												$dataxxx = array($key1->idso);
												$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
												$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
												if ($eksekusixxx == true) {

													$dataa = array($key2["qtyorder"], $key2["iditemx"], $key2["idwh"]);
													$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
													$eksekusii = $this->db->query($queryy, $dataa);
													if ($eksekusii == true) {
														$pending++;
														$respon = "Success";
													} else {
														$fail++;
														$text = '1';
														$respon = "Failed on Update QTY";
													}
												} else {
													$fail++;
													$text = '7';
													$respon = "Failed on Update QTY";
												}
											} else {
												$fail++;
												$text = '8';
												$respon = "Failed on Detail";
											}
										}
									}
								} else {
									$dataxx = array($key1->idso, $key2["iditemx"], $key2["qtyorder"], $key2["hargaitem"], $key2["discx"], $key2["subtotalxx"], $key2["hargabeli"], $key2["vat"], $key2["dpp"]);
									$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
									$eksekusixx = $this->db->query($queryxx, $dataxx);
									if ($eksekusixx == true) {
										$dataxxx = array($key1->idso);
										$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
										$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
										if ($eksekusixxx == true) {

											$dataa = array($key2["qtyorder"], $key2["iditemx"], $key2["idwh"]);
											$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
											$eksekusii = $this->db->query($queryy, $dataa);
											if ($eksekusii == true) {
												$pending++;
												$respon = "Success";
											} else {
												$fail++;
												$text = '1';
												$respon = "Failed on Update QTY";
											}
										} else {
											$fail++;
											$text = '7';
											$respon = "Failed on Update QTY";
										}
									} else {
										$fail++;
										$text = '8';
										$respon = "Failed on Detail";
									}
								}
							}
						}
					} else {
						$fail++;
						$text = '10';
						$respon = "Failed Get Data Sales Order";
					}
				} else {
					$fail++;
					$text = '11';
					$respon = "Failed Insert Sales Order";
				}
			}
			if ($pending == 0) {
				$successso++;
			} else {
				$pendingso++;
			}
		}

		if ($fail == 0) {
			$respon = "Data Berhasil Disimpan Dengan Hasil " . $successso . " Menjadi Sales Order dan " . $pendingso . " Menjadi Pending List";
			$this->db->trans_commit();
		} else {
			$respon = "Gagal Menyimpan Data" . $fail . " " . $text;
			$this->db->trans_rollback();
		}

		return $respon;
	}


	function insertsalesorder($iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $jasapengirim, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $qtyready, $price, $disc, $subtotal, $noresi, $hargabeli, $hargaitem, $vat, $return, $datetrans, $dpp)
	{
		$this->db->trans_begin();
		$fail     = 0;
		$success  = 0;
		$status   = "";
		$data     = array($noso, $nopes, $idcust, '14', $datetrans, $delivdate, $jasapengirim, $delivaddr, $delivfee, $paymentmethod, $subtotals, $disnoms, $vatnom, $grandtotals, $typeso, $qty, 'Waiting', date('Y-m-d H:i:s'), $iduser, $noresi, $return);
		$query    = "INSERT INTO tb_salesorder(codeso,nopesanan,idcust,idcurrency,dateso,delivdate,jasapengirim,delivaddr,delivfee,typepayment,subtotal,disc,VAT,totalprice,typeso,totalso,statusorder,madelog,madeuser,noresi,returnso,notif,froms)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'0','Manual')";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$datax = array($noso);
			$queryx = "SELECT * FROM tb_salesorder WHERE codeso = ?";
			$eksekusix = $this->db->query($queryx, $datax)->result_object();
			if (count($eksekusix) > 0) {
				$status = "";
				foreach ($eksekusix as $key) {
					for ($i = 0; $i < count($iditem); $i++) {

						$dataxxxx = array($iditem[$i], $idwh[$i]);
						$queryxxxx  = "SELECT * FROM tb_item , tb_itemqty WHERE tb_item.iditem = ? AND tb_itemqty.idwh = ? AND tb_item.iditem = tb_itemqty.iditem";
						$eksekusixxxx = $this->db->query($queryxxxx, $dataxxxx)->result_object();
						if (count($eksekusixxxx) > 0) {
							foreach ($eksekusixxxx as $keyxx) {
								if (0 <=  $qtyready[$i]) {
									if (0 <= ($keyxx->endqty - $keyxx->qtyso - $qtyorder[$i])) {
										if ($status == "") {

											$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i], $dpp[$i]);
											$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
											$eksekusixx = $this->db->query($queryxx, $dataxx);
											if ($eksekusixx == true) {
												$dataxxx = array($qtyorder[$i], $iditem[$i], $idwh[$i]);
												$queryxxx = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
												$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
												if ($eksekusixxx == true) {

													$respon = "Success";
												} else {
													$this->db->trans_rollback();
													$respon = "Failed on Update QTY";
												}
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Detail";
											}
										} else {

											$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i], $dpp[$i]);
											$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
											$eksekusixx = $this->db->query($queryxx, $dataxx);
											if ($eksekusixx == true) {
												$dataxxx = array($key->idso);
												$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
												$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
												if ($eksekusixxx == true) {

													$dataa = array($qtyorder[$i], $iditem[$i], '83');
													$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
													$eksekusii = $this->db->query($queryy, $dataa);
													if ($eksekusii == true) {
														$respon = "Success";
														$status = "Pending";
													} else {
														$this->db->trans_rollback();
														$respon = "Failed on Detail";
													}
												} else {
													$this->db->trans_rollback();
													$respon = "Failed on Update QTY";
												}
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Detail";
											}
										}
									} else {
										$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i], $dpp[$i]);
										$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
										$eksekusixx = $this->db->query($queryxx, $dataxx);
										if ($eksekusixx == true) {
											$dataxxx = array($key->idso);
											$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
											$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
											if ($eksekusixxx == true) {

												$dataa = array($qtyorder[$i], $iditem[$i], '83');
												$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
												$eksekusii = $this->db->query($queryy, $dataa);
												if ($eksekusii == true) {
													$respon = "Success";
													$status = "Pending";
												} else {
													$this->db->trans_rollback();
													$respon = "Failed on Detail";
												}
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Update QTY";
											}
										} else {
											$this->db->trans_rollback();
											$respon = "Failed on Detail";
										}
									}
								} else {
									$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i], $dpp[$i]);
									$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
									$eksekusixx = $this->db->query($queryxx, $dataxx);
									if ($eksekusixx == true) {
										$dataxxx = array($key->idso);
										$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
										$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
										if ($eksekusixxx == true) {

											$dataa = array($qtyorder[$i], $iditem[$i], '83');
											$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
											$eksekusii = $this->db->query($queryy, $dataa);
											if ($eksekusii == true) {
												$respon = "Success";
												$status = "Pending";
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Detail";
											}
										} else {
											$this->db->trans_rollback();
											$respon = "Failed on Update QTY";
										}
									} else {
										$this->db->trans_rollback();
										$respon = "Failed on Detail";
									}
								}
							}
						} else {
							$this->db->trans_rollback();
							$respon = "failed on qty";
						}
					}

					//

				}
			} else {
				$this->db->trans_rollback();
				$respon = "Failed On Header";
			}
		} else {
			$this->db->trans_rollback();
			$respon = "Failed on First";
		}

		if ($respon == "Success") {
			if ($status != "") {
				$respon = "Item Kurang Sales Masuk Ke Pending list";
			}
			$this->db->trans_commit();
		}

		return $respon;
	}


	function insertsalesorderpending($iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $qtyready, $price, $disc, $subtotal, $noresi, $hargabeli, $hargaitem, $vat, $return, $datetrans, $dpp)
	{
		$this->db->trans_begin();
		$fail = 0;
		$success = 0;
		$data = array($noso, $nopes, $idcust, '14', $datetrans, $delivdate, $delivaddr, $delivfee, $paymentmethod, $subtotals, $disnoms, $vatnom, $grandtotals, $typeso, $qty, 'Pending', date('Y-m-d H:i:s'), $iduser, $noresi, $return);
		$query = "INSERT INTO tb_salesorder(codeso,nopesanan,idcust,idcurrency,dateso,delivdate,delivaddr,delivfee,typepayment,subtotal,disc,VAT,totalprice,typeso,totalso,statusorder,madelog,madeuser,noresi,returnso,froms)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Excel')";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$datax = array($noso);
			$queryx = "SELECT * FROM tb_salesorder WHERE codeso = ?";
			$eksekusix = $this->db->query($queryx, $datax)->result_object();
			if (count($eksekusix) > 0) {

				foreach ($eksekusix as $key) {
					for ($i = 0; $i < count($iditem); $i++) {

						$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i], $dpp[$i]);
						$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";
						$eksekusixx = $this->db->query($queryxx, $dataxx);
						if ($eksekusixx == true) {
							$dataa = array($qtyorder[$i], $iditem[$i], '83');
							$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
							$eksekusii = $this->db->query($queryy, $dataa);
							if ($eksekusii == true) {
								$respon = "Success";
							} else {
								$this->db->trans_rollback();
								$respon = "Failed on Detail";
							}
						} else {
							$this->db->trans_rollback();
							$respon = "Failed on Detail";
						}
					}
				}
			} else {
				$this->db->trans_rollback();
				$respon = "Failed On Header";
			}
		} else {
			$this->db->trans_rollback();
			$respon = "Failed on First";
		}

		if ($respon == "Success") {
			$this->db->trans_commit();
		}

		return $respon;
	}


	function insertsalesorderfromquotation($idquo, $iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $qtyready, $price, $disc, $subtotal, $noresi, $hargabeli, $hargaitem, $vat)
	{
		$this->db->trans_begin();
		$data1 = array($idquo);
		$query1 = "UPDATE tb_quotation SET statusquo = 'Finish' WHERE idquo = ?";
		$eksekusi1 = $this->db->query($query1, $data1);
		$fail = 0;
		$success = 0;
		$status = "";
		$data = array($noso, $nopes, $idcust, '14', date('Y-m-d'), $delivdate, $delivaddr, $delivfee, $paymentmethod, $subtotals, $disnoms, $vatnom, $grandtotals, $typeso, $qty, 'Waiting', date('Y-m-d H:i:s'), $iduser, $noresi);
		$query = "INSERT INTO tb_salesorder(codeso,nopesanan,idcust,idcurrency,dateso,delivdate,delivaddr,delivfee,typepayment,subtotal,disc,VAT,totalprice,typeso,totalso,statusorder,madelog,madeuser,noresi)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$datax = array($noso);
			$queryx = "SELECT * FROM tb_salesorder WHERE codeso = ?";
			$eksekusix = $this->db->query($queryx, $datax)->result_object();
			if (count($eksekusix) > 0) {

				foreach ($eksekusix as $key) {
					$status = "";
					for ($i = 0; $i < count($iditem); $i++) {

						$dataxxxx = array($iditem[$i], $idwh[$i]);
						$queryxxxx  = "SELECT * FROM tb_item , tb_itemqty WHERE tb_item.iditem = ? AND tb_itemqty.idwh = ? AND tb_item.iditem = tb_itemqty.iditem";
						$eksekusixxxx = $this->db->query($queryxxxx, $dataxxxx)->result_object();
						if (count($eksekusixxxx) > 0) {
							foreach ($eksekusixxxx as $keyxx) {
								if (0 <=  $qtyready[$i]) {
									if (0 <= ($keyxx->endqty - $keyxx->qtyso - $qtyorder[$i])) {
										if ($status == "") {

											$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i]);
											$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat)VALUES(?,?,?,?,?,?,?,?)";
											$eksekusixx = $this->db->query($queryxx, $dataxx);
											if ($eksekusixx == true) {
												$dataxxx = array($qtyorder[$i], $iditem[$i], $idwh[$i]);
												$queryxxx = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
												$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
												if ($eksekusixxx == true) {

													$respon = "Success";
												} else {
													$this->db->trans_rollback();
													$respon = "Failed on Update QTY";
												}
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Detail";
											}
										} else {

											$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i]);
											$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat)VALUES(?,?,?,?,?,?,?,?)";
											$eksekusixx = $this->db->query($queryxx, $dataxx);
											if ($eksekusixx == true) {
												$dataxxx = array($key->idso);
												$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
												$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
												if ($eksekusixxx == true) {

													$dataa = array($qtyorder[$i], $iditem[$i], '83');
													$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
													$eksekusii = $this->db->query($queryy, $dataa);
													if ($eksekusii == true) {
														$respon = "Success";
														$status = "Pending";
													} else {
														$this->db->trans_rollback();
														$respon = "Failed on Detail";
													}
												} else {
													$this->db->trans_rollback();
													$respon = "Failed on Update QTY";
												}
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Detail";
											}
										}
									} else {
										$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i]);
										$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat)VALUES(?,?,?,?,?,?,?,?)";
										$eksekusixx = $this->db->query($queryxx, $dataxx);
										if ($eksekusixx == true) {
											$dataxxx = array($key->idso);
											$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
											$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
											if ($eksekusixxx == true) {

												$dataa = array($qtyorder[$i], $iditem[$i], '83');
												$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
												$eksekusii = $this->db->query($queryy, $dataa);
												if ($eksekusii == true) {
													$respon = "Success";
													$status = "Pending";
												} else {
													$this->db->trans_rollback();
													$respon = "Failed on Detail";
												}
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Update QTY";
											}
										} else {
											$this->db->trans_rollback();
											$respon = "Failed on Detail";
										}
									}
								} else {
									$dataxx = array($key->idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i]);
									$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat)VALUES(?,?,?,?,?,?,?,?)";
									$eksekusixx = $this->db->query($queryxx, $dataxx);
									if ($eksekusixx == true) {
										$dataxxx = array($key->idso);
										$queryxxx = "UPDATE tb_salesorder SET statusorder = 'Pending' WHERE idso = ? ";
										$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
										if ($eksekusixxx == true) {

											$dataa = array($qtyorder[$i], $iditem[$i], '83');
											$queryy = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
											$eksekusii = $this->db->query($queryy, $dataa);
											if ($eksekusii == true) {
												$respon = "Success";
												$status = "Pending";
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Detail";
											}
										} else {
											$this->db->trans_rollback();
											$respon = "Failed on Update QTY";
										}
									} else {
										$this->db->trans_rollback();
										$respon = "Failed on Detail";
									}
								}
							}
						} else {
							$this->db->trans_rollback();
							$respon = "failed on qty";
						}
					}
				}
			} else {
				$this->db->trans_rollback();
				$respon = "Failed On Header";
			}
		} else {
			$this->db->trans_rollback();
			$respon = "Failed on First";
		}

		if ($respon == "Success") {
			if ($status != "") {
				$respon = "Item Kurang Sales Masuk Ke Pending list";
			}
			$this->db->trans_commit();
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

	function getsalesorderbyidso($idso)
	{
		$data = array($idso);
		$query = "SELECT * FROM tb_salesorder,common_detail WHERE tb_salesorder.idcust = common_detail.idcomm AND tb_salesorder.idso = ? ";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idso"] = $key->idso;
				$f["codeso"] = $key->codeso;
				$f["dateso"] = $key->dateso;
				$f["namecomm"] = $key->namecomm;
				$f["idcust"] = $key->idcust;
				$f["delivdate"] = $key->delivdate;
				$f["jasapengirim"] = $key->jasapengirim;
				$f["delivaddr"] = $key->delivaddr;
				$f["delivfee"] = $key->delivfee;
				$f["idcust"] = $key->idcust;
				$f["idcurrency"] = $key->idcurrency;
				$f["typeso"] = $key->typeso;
				$f["typepayment"] = $key->typepayment;
				$f["delivaddr"] = $key->delivaddr;
				$f["totalso"] = $key->totalso;
				$f["totalprices"] = $key->totalprice;
				$f["subtotal"] = $key->subtotal;
				$f["delivdate"] = $key->delivdate;
				$f["nopesanan"] = $key->nopesanan;
				$f["noresi"] = $key->noresi;
				$f["discs"] = $key->disc;
				$f["VATs"] = $key->VAT;

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
				$query3 = "SELECT *, tb_salesorderdetail.vat as VATx FROM tb_salesorderdetail, tb_item,tb_itemqty,common_detail WHERE tb_salesorderdetail.idso = ? AND tb_salesorderdetail.iditem = tb_item.iditem AND  tb_item.iditem = tb_itemqty.iditem AND tb_itemqty.idwh = common_detail.idcomm AND common_detail.attrib3 ='counter' ";
				$eksekusi3 = $this->db->query($query3, $data3)->result_object();
				if (count($eksekusi3) > 0) {
					$f["data"] = array();
					foreach ($eksekusi3 as $keyx) {
						$g["idsodet"] = $keyx->idsodet;
						$g["iditem"] = $keyx->iditem;
						$g["nameitem"] = $keyx->nameitem;
						$g["qty"] = $keyx->qty;
						$g["price"] = $keyx->price;
						$g["disc"] = $keyx->disc;
						$g["idwh"] = $keyx->idwh;
						$g["pricebuyitem"] = $keyx->pricebuyitem;
						$g["VATx"] = $keyx->VATx;
						$g["totalprice"] = $keyx->totalprice;
						$g["qtyready"] = $keyx->endqty - $keyx->qtyso;
						$g["sku"] = $keyx->sku;
						$g["dpp"] = $keyx->dpp;

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
							$g["idwh"] = 0;
							$g["VATx"] = 0;
							$g["price"] = 0;
							$g["disc"] = $keyx->disc;
							$g["vat"] = $keyx->vat;
							$g["totalprice"] = 0;
							$g["pricebuyitem"] = 0;
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

	function updatesalesorder($idso, $iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $jasapengirim, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $price, $disc, $subtotal, $noresi, $hargaitem, $hargabeli, $vat, $dpp)
	{
		$datax = array($idso);
		$queryx = "SELECT * FROM tb_salesorder WHERE idso = ? AND statusorder = 'Waiting' or statusorder = 'Pending'";
		$eksekusix = $this->db->query($queryx, $datax)->result_object();
		if (count($eksekusix) > 0) {
			$statusorder = "";
			foreach ($eksekusix as $key) {
				$statusorder = $key->statusorder;
			}

			if ($statusorder == "Waiting" || $statusorder == "Pending") {

				$this->db->trans_begin();
				$data = array($noso, $nopes, $idcust, $delivdate, $jasapengirim, $delivaddr, $delivfee, $paymentmethod, $subtotals, $disnoms, $vatnom, $grandtotals, $typeso, $qty, 'Waiting', date('Y-m-d H:i:s'), $iduser, $noresi, $idso);
				$query = "UPDATE tb_salesorder SET codeso = ? , nopesanan = ?, idcust = ? , idcurrency= '14' ,delivdate = ?,jasapengirim = ?, delivaddr = ?, delivfee = ?, typepayment = ?, subtotal = ?, disc = ?, VAT = ?, totalprice = ?, typeso = ?, totalso = ?, statusorder = ? , updlog = ? , upduser = ? , noresi = ? WHERE idso = ? ";
				$eksekusi = $this->db->query($query, $data);
				if ($eksekusi == true) {
					$data1 = array($idso);
					$query1 = "DELETE FROM tb_salesorderdetail WHERE idso = ?";
					$eksekusi1 = $this->db->query($query1, $data1);
					if ($eksekusi1 == true) {

						for ($i = 0; $i < count($iditem); $i++) {

							$dataxxxx = array($iditem[$i], $idwh[$i]);
							$queryxxxx  = "SELECT * FROM tb_item , tb_itemqty WHERE tb_item.iditem = ? AND tb_itemqty.idwh = ? AND tb_item.iditem = tb_itemqty.iditem";
							$eksekusixxxx = $this->db->query($queryxxxx, $dataxxxx)->result_object();
							if (count($eksekusixxxx) > 0) {
								foreach ($eksekusixxxx as $keyxx) {
									if (0 <= ($keyxx->endqty - ($keyxx->qtyso + $qtyorder[$i]))) {

										$dataxx = array($idso, $iditem[$i], $qtyorder[$i], $hargaitem[$i], $disc[$i], $subtotal[$i], str_replace("Rp ", "", str_replace(".", "", $hargabeli[$i])), $vat[$i], $dpp[$i]);
										$queryxx = "INSERT INTO tb_salesorderdetail (idso,iditem,qty,price,disc,totalprice,pricebuyitem,vat,dpp)VALUES(?,?,?,?,?,?,?,?,?)";

										$eksekusixx = $this->db->query($queryxx, $dataxx);
										if ($eksekusixx == true) {
											$dataxxx = array($qtyorder[$i], $iditem[$i], $idwh[$i]);
											$queryxxx = "UPDATE tb_itemqty SET qtyso = qtyso + ? WHERE iditem = ? AND idwh = ? ";
											$eksekusixxx = $this->db->query($queryxxx, $dataxxx);
											if ($eksekusixxx == true) {

												$respon = "Success";
											} else {
												$this->db->trans_rollback();
												$respon = "Failed on Update QTY";
											}
										} else {
											$this->db->trans_rollback();
											$respon = "Failed on Detail";
										}
									} else {
										$this->db->trans_rollback();
										$respon = "Failed karena item qty kurang dari stock minimum";
										break;
									}
								}
							} else {
								$this->db->trans_rollback();
								$respon = "failed on qty";
							}
						}
					} else {
						$this->db->trans_rollback();
						$respon = "Failed on Delete Detail";
					}
				} else {
					$this->db->trans_rollback();
					$respon = "Failed on Update Header";
				}
			} else {
				$respon = "Sales Order tidak dapat diupdate karena sudah di process";
			}
		} else {
			$respon = "Sales Order tidak terdaftar";
		}


		if ($respon == "Success") {
			$this->db->trans_commit();
		}

		return $respon;
	}
}
