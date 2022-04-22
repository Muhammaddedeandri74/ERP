<?php 


	class Request extends CI_Model
	{

		function getlastrequestseq()
			{
				$date = date("Y-m-d");
				$data = array($date);
				$query = "SELECT * FROM tb_requestheader WHERE transdate = ?";
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

		function insertquotation($transdate,$transeq,$idcust,$item,$qty,$adduser)
		{
			$norequest = date('YmdHis');
			$data = array($transdate,$transeq,$norequest,$idcust,$adduser);
			$query = "INSERT INTO tb_requestheader (transdate,transeq,norequest,idcust,adduser,idmedia,status)VALUES(?,?,?,?,?,'1','wait')";
			$eksekusi = $this->db->query($query,$data);
			if ($eksekusi == true) {
				for ($i=0; $i < count($item); $i++) { 
					$data1 = array($norequest,$item[$i],$qty[$i]);
					$query1 = "INSERT INTO tb_requestdetail (norequest,iditem,qty)VALUES(?,?,?)";
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
	}




 ?>