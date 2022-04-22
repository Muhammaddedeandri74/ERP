<?php


class Auth extends CI_Model
{
	function login($username, $password)
	{
		$data = array($username, $password);
		$query = "SELECT * FROM tb_user WHERE username = ? AND password = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$iduser;
			foreach ($eksekusi as $key) {
				$f["iduser"] = $key->iduser;
				$f["username"] = $key->username;
				$f["password"] = $key->password;
				$f["fullname"] = $key->fullname;
				$f["email"] = $key->email;
				$f["phone"] = $key->phone;
				$f["address"] = $key->address;
				$f["role"] = $key->role;

				$datax = array($f["role"]);
				$queryx = "SELECT * FROM tb_roledetail WHERE idrole = ?";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					$f["data"] = array();
					foreach ($eksekusix as $keyx) {
						$g["menu"] = $keyx->menu;

						array_push($f["data"], $g);
					}
				}
				$datax = array($f["role"]);
				$queryx = "SELECT * FROM tb_roledetail WHERE idrole = ? AND menu = 'Admin'";
				$eksekusix = $this->db->query($queryx, $datax)->result_object();
				if (count($eksekusix) > 0) {
					$f["admin"] = "Yes";
				} else {
					$f["admin"] = "No";
				}

				$respon["data"] = $f;
				$iduser = $key->iduser;
			}
			function get_client_ipsx()
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
			function get_client_browsersx()
			{
				$browser = '';
				$browser = substr(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'NO-AGENT', 0, 150);
				return $browser;
			};
			$sessioninfo = get_client_ipsx() . " - " . get_client_browsersx();
			$data3 = array($iduser);
			$query3 = "SELECT * FROM mastersession WHERE iduser = ?";
			$eksekusi3 = $this->db->query($query3, $data3)->result_object();
			if (count($eksekusi3) > 0) {

				date_default_timezone_set('Asia/Jakarta');
				$date = date("Y-m-d H:i:s");
				$expsession  = "";
				foreach ($eksekusi3 as $key) {
					$expsession = $key->expsession;
				}
				if ($date > $expsession) {
					$this->deletesession($iduser);
					$respon["pesan"] = "LOGIN";
					$respon["kode"] = 1;
					date_default_timezone_set('Asia/Jakarta');
					$expsession = date('Y-m-d H:i:s', time() + (60 * 60));
					$data2 = array($iduser, $sessioninfo, $expsession);
					$query2 = "INSERT INTO mastersession (iduser,sessioninfo,expsession) VALUES(?,?,?)";
					$eksekusi2 = $this->db->query($query2, $data2);
				} else {
					$querx = "DELETE FROM mastersession WHERE iduser = ?";
					$eksekusix = $this->db->query($querx, $data3);

					$respon["pesan"] = "LOGIN";
					$respon["kode"] = 1;
					date_default_timezone_set('Asia/Jakarta');
					$expsession = date('Y-m-d H:i:s', time() + (60 * 60));
					$data2 = array($iduser, $sessioninfo, $expsession);
					$query2 = "INSERT INTO mastersession (iduser,sessioninfo,expsession) VALUES(?,?,?)";
					$eksekusi2 = $this->db->query($query2, $data2);
				}
			} else {
				$respon["pesan"] = "LOGIN";
				$respon["kode"] = 1;
				date_default_timezone_set('Asia/Jakarta');
				$expsession = date('Y-m-d H:i:s', time() + (60 * 60));
				$data2 = array($iduser, $sessioninfo, $expsession);
				$query2 = "INSERT INTO mastersession (iduser,sessioninfo,expsession) VALUES(?,?,?)";
				$eksekusi2 = $this->db->query($query2, $data2);
			}
		} else {
			$respon["pesan"] = "Account Not 
			 Please Check username and password";
		}

		return $respon;
	}

	function get_client_ips()
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
	function get_client_browsers()
	{
		$browser = '';
		$browser = substr(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'NO-AGENT', 0, 150);
		return $browser;
	}

	function ceksession($id, $date)
	{

		$sessioninfo = $this->get_client_ips() . " - " . $this->get_client_browsers();
		$data = array($id, $date, $sessioninfo);
		$query = "SELECT * FROM mastersession WHERE iduser = ? AND expsession > ? AND sessioninfo = ?";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = "Session on";
			$expsession;
			foreach ($eksekusi as $key) {
				$expsession = date('Y-m-d H:i:s', strtotime($key->expsession) + (60 * 60));
			}
			$data2 = array($expsession, $id);
			$query2 = "UPDATE mastersession SET expsession = ? WHERE iduser= ?";
			$eksekusi2 = $this->db->query($query2, $data2);
		} else {
			$respon = "Session off";
		}
		return $respon;
	}

	function deletesession($id)
	{
		$data = array($id);
		$query = "DELETE FROM mastersession WHERE iduser = ?";
		$eksekusi = $this->db->query($query, $data);
	}


	function ceksessionbyip()
	{
		function get_client_ip()
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
		function get_client_browser()
		{
			$browser = '';
			$browser = substr(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'NO-AGENT', 0, 150);
			return $browser;
		};

		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-d H:i:s");
		$sessioninfo = get_client_ip() . " - " . get_client_browser();
		$data = array($sessioninfo, $date);
		$query = "SELECT * FROM tb_user, mastersession WHERE mastersession.sessioninfo = ?  AND mastersession.expsession > ? AND mastersession.iduser = tb_user.iduser";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			foreach ($eksekusi as $key) {
				$f["iduser"] = $key->iduser;
				$f["password"] = $key->password;
				$f["username"] = $key->username;
				$f["fullname"] = $key->fullname;
				$f["email"] = $key->email;
				$f["phone"] = $key->phone;
				$f["address"] = $key->address;
				$f["role"] = $key->role;
				$f["jam"] = $date;
				$f["session"] = $sessioninfo;
				$respon["data"] = $f;
			}
			$respon["pesan"] = "LOGIN";
		} else {
			$respon["pesan"] = "LOGOUT";
		}
		return $respon;
	}

	function chartqtybuy($iduser)
	{
		$data = array($iduser);
		$query = "SELECT transdate, Sum(qty) AS result FROM Transaksi_tb WHERE iduser = ? AND type = 'BUY' GROUP BY transdate ";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["transdate"] = $key->transdate;
				$f["in"] = $key->result;

				$data1 = array($iduser, $key->transdate);
				$query1  = "SELECT transdate, Sum(qty) AS result FROM Transaksi_tb WHERE iduser = ? AND type = 'SELL' AND transdate = ? GROUP BY transdate ";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $keys) {
						$f["out"] = $keys->result;
					}
				} else {
					$f["out"] = 0;
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}

	function chartqtybuycurency($iduser)
	{
		$data = array($iduser);
		$query = "SELECT transdate, Sum(total) AS result FROM Transaksi_tb WHERE iduser = ? AND type = 'BUY' GROUP BY transdate ";
		$eksekusi = $this->db->query($query, $data)->result_object();
		if (count($eksekusi) > 0) {
			$respon = array();
			foreach ($eksekusi as $key) {
				$f["transdate"] = $key->transdate;
				$f["in"] = $key->result;

				$data1 = array($iduser, $key->transdate);
				$query1  = "SELECT transdate, Sum(total) AS result FROM Transaksi_tb WHERE iduser = ? AND type = 'SELL' AND transdate = ? GROUP BY transdate ";
				$eksekusi1 = $this->db->query($query1, $data1)->result_object();
				if (count($eksekusi1) > 0) {
					foreach ($eksekusi1 as $keys) {
						$f["out"] = $keys->result;
					}
				} else {
					$f["out"] = 0;
				}

				array_push($respon, $f);
			}
		} else {
			$respon = "Not Found";
		}

		return $respon;
	}
}
