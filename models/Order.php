<?php 


		class Order extends CI_Model
		{
			function getrequest()
			{
				$query = "SELECT * FROM tb_requestheader, tb_media WHERE tb_requestheader.status ='wait' AND tb_requestheader.idmedia = tb_media.idmedia";
				$eksekusi = $this->db->query($query)->result_object();
				if (count($eksekusi) > 0) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						$f["namemedia"] = $key -> namemedia;
						$f["norequest"] = $key -> norequest;

						array_push($respon, $f);
					}
				}
				else
				{
					$respon = "Not Found";
				}

				return $respon;
			}


			function getlastorderseq()
			{
				$date = date("Y-m-d");
				$data = array($date);
				$query = "SELECT * FROM tb_orderheader WHERE transdate = ?";
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0) {
					foreach ($eksekusi as $key) {
						$transeq = $key -> transeq ;
						$respon = $transeq + 1;
					}
				}
				else
				{
					$respon = 1;
				}

				return $respon;
			}


			function insertsalesorder($transdate,$transeq,$idcust,$iduser,$subtotal,$disc1,$ppn,$grantotal,$item,$qty,$price,$disc,$total,$warehouse)
			{
				$noorder = date('YmdHis');
				$data = array($transdate,$transeq,$noorder,$idcust,$subtotal,$disc1,$ppn,$grantotal,$iduser,$warehouse);
				$query = "INSERT INTO tb_orderheader(transdate,transeq,noorder,idcust,price,disc,ppn,total,useradd,status,idwarehouse)VALUES(?,?,?,?,?,?,?,?,?,'Waiting',?)";
				$eksekusi = $this->db->query($query,$data);
				if ($eksekusi == true) {

					for ($i=0; $i < count($item); $i++) { 
						$data1 = array($noorder,$item[$i],$qty[$i],$price[$i],$disc[$i],$total[$i]);
						$query1 = "INSERT INTO tb_orderdetail(noorder,iditem,qty,price,disc,total)VALUES(?,?,?,?,?,?)";
						$eksekusi1 = $this->db->query($query1,$data1);
						if ($eksekusi1 == true) {
							$respon = "Success";
						}
						else
						{
							$respon = "Failed";
						}
					}
				}
				else
				{
					$respon = "Failed";
				}

				return $respon;
			}

			function getlistorder()
			{
				$query = "SELECT * FROM tb_orderheader,tb_customer,tb_warehouse WHERE tb_orderheader.idcust = tb_customer.idcust AND tb_orderheader.idwarehouse = tb_warehouse.idwarehouse";
				$eksekusi = $this->db->query($query)->result_object();
				if (count($eksekusi) > 0) {
					$respon = array();
					foreach ($eksekusi as $key) {
						$f["transdate"] = $key -> transdate;
						$f["transeq"] = $key -> transeq;
						$f["noorder"] = $key -> noorder;
						$f["namecust"] = $key -> namecust;
						$f["total"] = $key -> total;
						$f["status"] = $key -> status;
						$f["idwarehouse"] = $key -> idwarehouse;
						$f["namewarehouse"] = $key -> namewarehouse;

						array_push($respon, $f);

					}
				}
				else
				{
					$respon = "Not Found";
				}

				return $respon;
			}

			function salesorderdetail($noorder,$idwarehouse)
			{
				$data = array($noorder);
				$query = "SELECT *, tb_orderdetail.price AS prices FROM tb_orderdetail,tb_item WHERE tb_orderdetail.noorder = ?  AND tb_orderdetail.iditem = tb_item.iditem";
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						$data1 = array($key -> iditem,$idwarehouse);
						$query1 = "SELECT * FROM tb_itemqty WHERE iditem = ? AND idwarehouse = ?";
						$eksekusi1 = $this->db->query($query1,$data1)->result_object();
						if (count($eksekusi1) > 0) {
							foreach ($eksekusi1 as $keyz ) {
								$f["qtyready"] = $keyz -> finalqty;
							}
						}
						else
						{
							$f["qtyready"] = 0;
						}

						$f["nameitem"] = $key -> nameitem;
						$f["sku"] = $key -> sku;
						$f["qty"] = $key -> qty;
						$f["price"] = $key -> prices;
						$f["disc"] = $key -> disc;
						$f["total"] = $key -> total;

						array_push($respon, $f);
					}
				}
				else
				{
					$respon = "No Found";
				}

				return $respon;
			}



		}




 ?>