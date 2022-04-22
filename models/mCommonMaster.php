<?php


class mCommonMaster extends CI_Model
{
	//-- item
	function listitem($search)
	{
		$data = array($search, $search);
		$query = "SELECT iditem,VAT,nameitem,sku,minstock,maxstock,priceitem,pricebuyitem,pph22,usesn FROM tb_item where status='1' order by nameitem";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["minstock"] =  $key->minstock;
				$f["maxstock"] =  $key->maxstock;
				$f["priceitem"] =  $key->priceitem;
				$f["sku"] =  $key->sku;
				$f["pricebuyitem"] =  $key->pricebuyitem;
				$f["pph22"] =  $key->pph22;
				$f["vat"] =  $key->VAT;
				$f["usesn"] =  $key->usesn;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}
	function getitembyskuname($search)
	{
		$data = array($search, $search);
		$query = "SELECT top 1  iditem,nameitem,sku,minstock,maxstock,priceitem FROM tb_item where (sku= ? or nameitem = ? ) and ([status]='Aktif' or [status]='Y' or [status]='1') order by nameitem";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["minstock"] =  $key->minstock;
				$f["maxstock"] =  $key->maxstock;
				$f["priceitem"] =  $key->priceitem;
				$f["sku"] =  $key->sku;
				$respon = $f;
				//array_push($respon,$f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	//-- comm group
	function getcommgroup()
	{
		$query = "SELECT * FROM common_group";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idgroup"] =  $key->idgroup;
				$f["codegroup"] =  $key->codegroup;
				$f["namegroup"] =  $key->namegroup;
				$f["isactive"] =  $key->isactive;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function addcommongroup($codegroup, $namegroup, $isactive, $userid)
	{
		$data = array($codegroup, $namegroup, $isactive, $userid);
		$query = "INSERT INTO common_group ([codegroup],[namegroup],[isactive],madelog,madeuser)VALUES(?,?,?,replace(convert(varchar(15),CURRENT_TIMESTAMP,102),'.','-') +' '+ convert(varchar(15),CURRENT_TIMESTAMP,114),?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editcommongroup($idgroup, $codegroup, $namegroup, $isactive, $userid)
	{
		$data = array($codegroup, $namegroup, $isactive, $userid, $idgroup);
		$query = "UPDATE common_group SET codegroup = ? , namegroup = ? , isactive = ?, upduser = ?,updlog=replace(convert(varchar(15),CURRENT_TIMESTAMP,102),'.','-') +' '+ convert(varchar(15),CURRENT_TIMESTAMP,114) WHERE idgroup = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function getcommongroupbyid($idgroup)
	{
		$data = array($idgroup);
		$query = "SELECT * FROM common_group WHERE idgroup = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idgroup"] =  $key->idgroup;
				$f["codegroup"] =  $key->codegroup;
				$f["namegroup"] =  $key->namegroup;
				$f["isactive"] =  $key->isactive;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function deletecommongroup($idgroup)
	{
		$data = array($idgroup);
		$query = "DELETE FROM common_group WHERE idgroup = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	//-- comm detail
	function getcommonnamebygroup($idgroup)
	{
		$data = array($idgroup);
		if ($idgroup == 8) {
			$query = "SELECT * from (SELECT * FROM common_detail where idgroup=? and (isactive='Y' or isactive='1') order by idcomm) as x order by namecomm";
		} else {
			$query = "SELECT * FROM common_detail where idgroup=? and (isactive='Y' or isactive='1') order by namecomm";
		}
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["idgroup"] =  $key->idgroup;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["attrib7"] =  $key->attrib7;
				$f["attrib3"] =  $key->attrib3;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getcommonnamebygroup2($idgroup, $idgroup2)
	{
		if (empty($idgroup2)) {
			$idgroup2 = $idgroup;
		}
		$data = array($idgroup, $idgroup2);
		if ($idgroup == 8) {
			$query = "SELECT * from (SELECT  * FROM common_detail where idgroup=? and (isactive='Y' or isactive='1') order by idcomm) as x order by namecomm";
		} else {
			$query = "SELECT * FROM common_detail where idgroup between ? and ? and (isactive='Y' or isactive='1') order by idgroup,namecomm";
		}
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["idgroup"] =  $key->idgroup;
				$f["codecomm"] =  $key->codecomm;
				if ($key->idgroup == 1) {
					$f["namecomm"] =  'Supp : ' . $key->namecomm;
				} else {
					$f["namecomm"] =  'Cust : ' . $key->namecomm;
				}
				$f["attrib7"] =  $key->attrib7;
				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}


	function getcommdetailbygroup($idgroup)
	{
		$data = array($idgroup);
		$query = "SELECT top 1 * from dbo.common_detail where idgroup=?	order by attrib7 ";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iddetail"] =  $key->iddetail;
				$f["codedetail"] =  $key->codedetail;
				$f["namedetail"] =  $key->namedetail;
				$f["isactive"] =  $key->isactive;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getcommondetail($iddetail)
	{
		$data = array($iddetail);
		$query = "SELECT * FROM common_detail where iddetail=?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["idgroup"] =  $key->idgroup;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["isactive"] =  $key->isactive;
				$f["attrib1"] =  $key->attrib1;
				$f["attrib2"] =  $key->attrib2;
				$f["attrib3"] =  $key->attrib3;
				$f["attrib4"] =  $key->attrib4;
				$f["attrib5"] =  $key->attrib5;
				$f["attrib6"] =  $key->attrib6;
				$f["attrib7"] =  $key->attrib7;
				$f["attrib8"] =  $key->attrib8;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function addcommondetail($idgroup, $codecomm, $namecomm, $isactive, $attrib1, $attrib2, $attrib3, $attrib4, $attrib5, $attrib6, $attrib7, $attrib8, $userid)
	{
		$data = array($idgroup, $codecomm, $namecomm, $isactive, $attrib1, $attrib2, $attrib3, $attrib4, $attrib5, $attrib6, $attrib7, $attrib8, $userid);
		$query = "INSERT INTO common_detail ([codecomm],[namecomm],[isactive],attrib1,attrib2,attrib3,attrib4,attrib5,attrib6,attrib7,attrib8,madelog,madeuser)VALUES(?,?,?,?,?,?,?,?,?,?,?,replace(convert(varchar(15),CURRENT_TIMESTAMP,102),'.','-') +' '+ convert(varchar(15),CURRENT_TIMESTAMP,114),?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editcommondetail($idcomm, $idgroup, $codecomm, $namecomm, $isactive, $attrib1, $attrib2, $attrib3, $attrib4, $attrib5, $attrib6, $attrib7, $attrib8, $userid)
	{
		$data = array($idgroup, $codecomm, $namecomm, $isactive, $attrib1, $attrib2, $attrib3, $attrib4, $attrib5, $attrib6, $attrib7, $attrib8, $userid, $idcomm);
		$query = "UPDATE common_detail SET codecomm = ? , namecomm = ? , isactive = ?, attrib1= ?, attrib2= ?, attrib3= ?, attrib4= ?, attrib5= ?, attrib6= ?, attrib7= ?, attrib8= ?, upduser = ?,updlog=replace(convert(varchar(15),CURRENT_TIMESTAMP,102),'.','-') +' '+ convert(varchar(15),CURRENT_TIMESTAMP,114) WHERE idcomm = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function getcommondetailbyid($idcomm, $idgroup)
	{
		$data = array($idcomm, $idgroup);
		$query = "SELECT * FROM common_detail WHERE idcomm = ? and idgroup= ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcomm"] =  $key->idcomm;
				$f["idgroup"] =  $key->idgroup;
				$f["codecomm"] =  $key->codecomm;
				$f["namecomm"] =  $key->namecomm;
				$f["isactive"] =  $key->isactive;
				$f["attrib1"] =  $key->attrib1;
				$f["attrib2"] =  $key->attrib2;
				$f["attrib3"] =  $key->attrib3;
				$f["attrib4"] =  $key->attrib4;
				$f["attrib5"] =  $key->attrib5;
				$f["attrib6"] =  $key->attrib6;
				$f["attrib7"] =  $key->attrib7;
				$f["attrib8"] =  $key->attrib8;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function deletecommondetail($idcomm)
	{
		$data = array($idcomm);
		$query = "DELETE FROM common_detail WHERE idcomm = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}


	//-----------
	function getcurrency()
	{
		$query = "SELECT * FROM tb_currency";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcurrency"] =  $key->idcurrency;
				$f["namecurrency"] =  $key->namecurrency;
				$f["useyn"] =  $key->useyn;
				$f["kurscurrency"] =  $key->kurscurency;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getcustomer()
	{
		$query = "SELECT * FROM tb_customer";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idcust"] =  $key->idcust;
				$f["namecust"] =  $key->namecust;
				$f["phonecust"] =  $key->phonecust;
				$f["addresscust"] =  $key->addresscust;
				$f["email"] =  $key->email;

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getitem()
	{
		$query = "SELECT * FROM tb_item";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["iditem"] =  $key->iditem;
				$f["nameitem"] =  $key->nameitem;
				$f["priceitem"] =  $key->priceitem;
				$f["sku"] =  $key->sku;


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getsupplier()
	{
		$query = "SELECT * FROM tb_supplier";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idsupp"] =  $key->idsupp;
				$f["namesupp"] =  $key->namesupp;
				$f["addresssup"] =  $key->addresssup;
				$f["phonesupp"] =  $key->phonesupp;


				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function getuser()
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



				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}



	function getwarehouse()
	{
		$query = "SELECT * FROM tb_warehouse";
		$eksekusi = $this->db->query($query)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["idwarehouse"] =  $key->idwarehouse;
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



	function addcurrency($currencyname, $kurs, $useyn, $userid)
	{
		$data = array($currencyname, $kurs, $useyn, $userid);
		$query = "INSERT INTO tb_currency (namecurrency,kurscurency,useyn,useradd)VALUES(?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function addcustomer($custname, $phonecust, $addresscust, $email, $userid)
	{
		$data = array($custname, $phonecust, $addresscust, $email, $userid);
		$query = "INSERT INTO tb_customer (namecust,phonecust,addresscust,email,useradd)VALUES(?,?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function additem($itemname, $pricename, $sku, $userid)
	{
		$data = array($itemname, $pricename, $sku, $userid);
		$query = "INSERT INTO tb_item (nameitem,priceitem,sku,useradd)VALUES(?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}





	function addsupp($namesupp, $addresssupp, $phonesupp, $userid)
	{
		$data = array($namesupp, $addresssupp, $phonesupp, $userid);
		$query = "INSERT INTO tb_supplier (namesupp,addresssup,phonesupp,useradd)VALUES(?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}


	function adduser($username, $password, $email, $fullname, $address, $phone, $status, $userid)
	{
		$data = array($username);
		$query = "SELECT * FROM tb_user WHERE username = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = "Username Has Used Please Use Another Username";
		} else {
			$data1 = array($username, $password, $email, $fullname, $address, $phone, $status, $userid);
			$query1 = "INSERT INTO tb_user (username,password,email,fullname,address,phone,isactive,adduser,role)VALUES(?,?,?,?,?,?,?,?,'0')";
			$eksekusi1 = $this->db->query($query1, $data1);
			if ($eksekusi1 == true) {
				$respon = "Success";
			} else {
				$respon = "Failed";
			}
		}
		return $respon;
	}


	function addwarehouse($namewarehouse, $addresswarehouse, $phonewarehouse, $userid)
	{
		$data = array($namewarehouse, $addresswarehouse, $phonewarehouse, $userid);
		$query = "INSERT INTO tb_warehouse (namewarehouse,addresswarehouse,phonewarehouse,useradd)VALUES(?,?,?,?)";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}



	function editcurrency($id, $currencyname, $kurs, $useyn, $userid)
	{
		$data = array($currencyname, $kurs, $useyn, $userid, $id);
		$query = "UPDATE tb_currency SET namecurrency = ? , kurscurency = ? , useyn = ?, userupd = ? WHERE idcurrency = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editcustomer($id, $custname, $phonecust, $addresscust, $email, $userid)
	{
		$data = array($custname, $phonecust, $addresscust, $email, $userid, $id);
		$query = "UPDATE tb_customer SET namecust = ? , phonecust = ? , addresscust = ?, email = ?, userupd = ?  WHERE idcust = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function edititem($id, $itemname, $priceitem, $sku, $userid)
	{
		$data = array($itemname, $priceitem, $sku, $userid, $id);
		$query = "UPDATE tb_item SET nameitem = ? , priceitem = ? , sku = ?, userupd = ?  WHERE iditem = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}

	function editsupp($id, $namesupp, $addresssupp, $phonesupp, $userid)
	{
		$data = array($namesupp, $addresssupp, $phonesupp, $userid, $id);
		$query = "UPDATE tb_supplier SET namesupp = ? , addresssup = ? , phonesupp = ?, userupd = ?  WHERE idsupp = ?";
		$eksekusi = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}

		return $respon;
	}


	function edituser($username, $password, $email, $fullname, $address, $phone, $status, $userid, $id)
	{
		$data = array($email, $fullname, $address, $phone, $status, $userid, $id);
		$query = "UPDATE tb_user SET email = ? , fullname = ? , address = ? , phone = ? , isactive = ? , upduser = ? WHERE iduser = ? ";
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
		$data = array($namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $id);
		$query = "UPDATE tb_warehouse SET namewarehouse = ? , addresswarehouse = ? , phonewarehouse = ?, userupd = ?  WHERE idwarehouse = ?";
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
		$data = array($idcurrency);
		$query = "SELECT * FROM tb_currency WHERE idcurrency = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcurrency"] = $key->idcurrency;
				$f["currencyname"] = $key->namecurrency;
				$f["kurs"] = $key->kurscurency;
				$f["useyn"] = $key->useyn;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdatacustomerbyid($idcustomer)
	{
		$data = array($idcustomer);
		$query = "SELECT * FROM tb_customer WHERE idcust = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idcust"] = $key->idcust;
				$f["custname"] = $key->namecust;
				$f["addresscust"] = $key->addresscust;
				$f["phonecust"] = $key->phonecust;
				$f["email"] = $key->email;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}

	function getdataitembyid($iditem)
	{
		$data = array($iditem);
		$query = "SELECT * FROM tb_item WHERE iditem = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["iditem"] = $key->iditem;
				$f["itemname"] = $key->nameitem;
				$f["priceitem"] = $key->priceitem;
				$f["sku"] = $key->sku;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function getdatasupplierbyid($iditem)
	{
		$data = array($iditem);
		$query = "SELECT * FROM tb_supplier WHERE idsupp = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idsupp"] = $key->idsupp;
				$f["namesupp"] = $key->namesupp;
				$f["addresssupp"] = $key->addresssup;
				$f["phonesupp"] = $key->phonesupp;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}


	function getdatauserbyid($iduser)
	{
		$data = array($iduser);
		$query = "SELECT * FROM tb_user WHERE iduser = ?";
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
		$data = array($idwarehouse);
		$query = "SELECT * FROM tb_warehouse WHERE idwarehouse = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["idwarehouse"] = $key->idwarehouse;
				$f["namewarehouse"] = $key->namewarehouse;
				$f["addresswarehouse"] = $key->addresswarehouse;
				$f["phonewarehouse"] = $key->phonewarehouse;
			}
			$respon = $f;
		} else {
			$respon = "Not Found";
		}
		return $respon;
	}



	function deletecurrency($idcurrency)
	{
		$data = array($idcurrency);
		$query = "DELETE FROM tb_currency WHERE idcurrency = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}

	function deletecustomer($idcurrency)
	{
		$data = array($idcurrency);
		$query = "DELETE FROM tb_customer WHERE idcust = ?";
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

	function deletesupp($idsupp)
	{
		$data = array($idsupp);
		$query = "DELETE FROM tb_supplier WHERE idsupp = ?";
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
		$query = "DELETE FROM tb_warehouse WHERE idwarehouse = ?";
		$eksekusi  = $this->db->query($query, $data);
		if ($eksekusi == true) {
			$respon = "Success";
		} else {
			$respon = "Failed";
		}
		return $respon;
	}
}
