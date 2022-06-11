<?php


class reporting extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model("Auth");
		$date = date("Y-m-d H:i:s");
		$f = $this->session->userdata("data");
		$session = $this->Auth->ceksession($f["iduser"], $date);
		if ($session != "Session on") {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Your Session Has Expired</div>');
			$this->session->unset_userdata("data");
			redirect('');
		}

		$this->load->model("MasterData");
		$this->load->model("MPrQuo");
		$this->load->model("mCommonMaster");
		$this->load->model("MReporting");
	}

	//pr
	function bookpr()
	{
		// $f = $this->session->userdata("data");
		$f["title"] = "gudang";
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$date1 = $this->input->get("date1");
		$date2 = $this->input->get("date2");
		$status = $this->input->get("status");
		if (empty($date1)) {
			$date1 = substr(date("Y-m-d"), 0, 7) . '-01';
		}
		if (empty($date2)) {
			$date2 = date("Y-m-d");
		}
		if (empty($status)) {
			$status = '';
		}
		$cek["date1"] = $date1;
		$cek["date2"] = $date2;
		$cek["statusbook"] = $status;
		$cek["data"] = $this->MReporting->reportpr($date1, $date2, $status);
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/prbook", $cek, $f);
		$this->load->view("Employe/footer");
	}


	//po
	function bookpo()
	{
		// $f = $this->session->userdata("data");
		$f["title"] = "Purchasing";
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$date1 = $this->input->get("date1");
		$date2 = $this->input->get("date2");
		$status = $this->input->get("status");
		if (empty($date1)) {
			$date1 = substr(date("Y-m-d"), 0, 7) . '-01';
		}
		if (empty($date2)) {
			$date2 = date("Y-m-d");
		}
		if (empty($status)) {
			$status = '';
		}
		$cek["date1"] = $date1;
		$cek["date2"] = $date2;
		$cek["statusbook"] = $status;
		$cek["data"] = $this->MReporting->reportpo($date1, $date2, $status);
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/pobook", $cek, $f);
		$this->load->view("Employe/footer");
	}

	// function loadpr()
	// {
	// // 	$f = $this->session->userdata("data");
	// 	echo json_encode($cek);
	// }


	//stockcard
	function stockbook()
	{
		// $f = $this->session->userdata("data");
		$f["title"] = "gudang";
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$sku = $this->input->get("sku");
		$codewh = $this->input->get("codewh");
		$cari = $this->input->get("cari");
		if (empty($codewh)) {
			$codewh = '';
		}
		if (empty($sku)) {
			$sku = '';
		}
		if (empty($cari)) {
			$cari = '';
		}
		$cek["datex"] = date("Y-m-d");
		$cek["sku"] = $sku;
		$cek["codewh"] = $codewh;
		$cek["cari"] = $cari;
		$cek["data"] = $this->MReporting->qtystockbook($sku, $codewh, $cari);

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockbook", $cek, $f);
		$this->load->view("Employe/footer");
	}

	//stockcard
	function stockcard2()
	{
		$f = $this->session->userdata("data");
		$f["title"] = "gudang";
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$date1 = $this->input->get("date1");
		$date2 = $this->input->get("date2");
		$sku = $this->input->get("sku");
		$codewh = $this->input->get("codewh");
		$cari = $this->input->get("cari");
		if (empty($date1)) {
			$date1 = substr(date("Y-m-d"), 0, 7) . '-01';
		}
		if (empty($date2)) {
			$date2 = date("Y-m-d");
		}


		foreach ($f["warehouse"] as $key) {
			if ($key["attrib3"] == "mainwarehouse") {
				$codewh = $key["codecomm"];
			}
		}

		if (empty($sku)) {
			$sku = '';
		}
		if (empty($cari)) {
			$cari = '';
		}
		$cek["date1"] = $date1;
		$cek["date2"] = $date2;
		$cek["skus"] = $sku;
		$cek["codewh"] = $codewh;
		$cek["cari"] = $cari;
		$cek["data"] = $this->MReporting->reportstockbook($date1, $date2, $sku, $codewh, $cari);
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcard2", $cek, $f);
		$this->load->view("Employe/footer");
	}


	function stockcard3()
	{
		$f = $this->session->userdata("data");
		$f["title"] = "counter";
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$date1 = $this->input->get("date1");
		$date2 = $this->input->get("date2");
		$sku = $this->input->get("sku");
		$codewh = $this->input->get("codewh");
		$cari = $this->input->get("cari");
		if (empty($date1)) {
			$date1 = substr(date("Y-m-d"), 0, 7) . '-01';
		}
		if (empty($date2)) {
			$date2 = date("Y-m-d");
		}


		foreach ($f["warehouse"] as $key) {
			if ($key["attrib3"] == "counter") {
				$codewh = $key["codecomm"];
			}
		}

		if (empty($sku)) {
			$sku = '';
		}
		if (empty($cari)) {
			$cari = '';
		}
		$cek["date1"] = $date1;
		$cek["date2"] = $date2;
		$cek["skus"] = $sku;
		$cek["codewh"] = $codewh;
		$cek["cari"] = $cari;
		$cek["data"] = $this->MReporting->reportstockbook($date1, $date2, $sku, $codewh, $cari);
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcard2", $cek, $f);
		$this->load->view("Employe/footer");
	}



	// function stockcard()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$f["data"]  = $this->MasterData->getitemwh();
	// 	$f["data1"] = $this->MasterData->getoutsn();
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("reporting/stockcard", $f);
	// 	$this->load->view("Employe/footer");
	// }

	function stockcard()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		if (!isset($search)) {
			$search = '';
		}


		$f["title"] = "Purchasing";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'reporting/stockcard';
		$config['total_rows'] = $this->MasterData->Countgetitemwh($filter, $search);
		// $config['per_page']   = 20;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 3;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		// $from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $end  = $from + $config["per_page"];

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");

		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();
		$f['title'] = 'Cari Item';

		// get item list
		$f["title"]          = "item";
		$f["data"]           = $this->MasterData->getitemwhpaginate($filter, $search);
		$f["data1"]          = $this->MasterData->getoutsn();

		// load view

		$f["title"] = "gudang";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcard", $f);
		$this->load->view("Employe/footer");
	}

	function search()
	{
		$this->load->library('pagination');

		//mengambil nilai keyword dari form pencarian
		$search = (trim($this->input->post('key', true))) ? trim($this->input->post('key', true)) : '';

		//jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
		$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;


		//mengambil nilari segmen 4 sebagai offset
		$dari   = $this->uri->segment('4');

		//limit data yang ditampilkan
		$sampai  = 10;

		//inisialisasi variabel $like
		$like      = '';

		//mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
		if ($search) $like = "(nameitem LIKE '%$search%') OR (sku LIKE '%$search%')";
		//hitung jumlah row
		$jumlah = $this->MasterData->Countgetitemwh($like);

		//inisialisasi array
		$config = array();

		//set base_url untuk setiap link page
		$config['base_url']         = base_url() . 'reporting/search/' . $search;

		//hitung jumlah row
		$config['total_rows'] = $jumlah;

		//mengatur total data yang tampil per page
		$config['per_page']   = $sampai;

		//mengatur jumlah nomor page yang tampil
		$config['num_links'] = $jumlah;

		//mengatur tag
		$config['num_links'] = 0;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);

		//inisialisasi array
		$data = array();

		// get item list
		$f = $this->session->userdata("data");

		$f["title"]          = "item";
		$f["data"]           = $this->MasterData->getitemwhpaginate($sampai, $dari, $like);
		$f["data1"]          = $this->MasterData->getoutsn();

		//Membuat link
		$str_links  = $this->pagination->create_links();
		$f["links"] = explode('&nbsp;', $str_links);
		$f['title'] = 'Cari Item';

		// load view

		$f["title"] = "gudang";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/FilterSearch/stockcardfilter");
		$this->load->view("Employe/footer");
	}

	function mailstockcardhabis()
	{

		$f["title"] = "counter";
		$f["data"] = $this->MasterData->getitemwh();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("reporting/stockcardhabis", $f);
		$this->load->view("Employe/footer");


		if (isset($_POST['submit'])) {
			$mail   = new PHPMailer\PHPMailer\PHPMailer();
			$email  = $this->input->post('email');

			//Server settings
			$mail->SMTPOptions = array(
				'ssl'               => array(
					'verify_peer'       => false,
					'verify_peer_name'  => false,
					'allow_self_signed' => true
				)
			);

			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                              // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'guesmail004@gmail.com';                     // SMTP username
			$mail->Password   = 'guesmail123';                               // SMTP password
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPSecure = 'tls';

			$data = array();
			$mesg = $this->load->view('reporting/SentMail/stockcardhabis', '', true);

			//Recipients
			$mail->setFrom('muhammaddedeandri98@gmail.com');
			$mail->addAddress($email);     // Add a recipient
			$mail->addReplyTo('muhammaddedeandri98@gmail.com');

			// Email subject
			$mail->Subject = 'Daftar Stock Barang Segera Habis';

			// Set email format to HTML
			$mail->isHTML(true);

			//Email body content
			$mail->Body    = '<p>' . $mesg . '</p>';

			if ($mail->send()) {
				$this->session->set_flashdata('flash_message', 'Email Has Been Send');
			} else {
				$this->session->set_flashdata('error', 'Erorr');
			}
		}
	}

	// function stockcardhabis()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$f["data"] = $this->MasterData->getitemwh();
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("reporting/stockcardhabis", $f);
	// 	$this->load->view("Employe/footer");
	// }

	function stockcardhabis()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		if (!isset($search)) {
			$search = '';
		}

		$f["title"] = "Purchasing";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'reporting/stockcardhabis';
		$config['total_rows'] = $this->MasterData->Countgetitemwh($filter, $search);
		$config['per_page']   = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]  = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 2;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$end  = $from + $config["per_page"];

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");

		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();
		$f['title'] = 'Cari Item';

		// get item list
		$f["title"]          = "item";
		$f["data"]           = $this->MasterData->getitemwhpaginate($filter, $search);
		// load view

		$f["title"] = "gudang";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcardhabis", $f);
		$this->load->view("Employe/footer");
	}

	// function stockcardexp()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$f["data"]  = $this->MasterData->getitemwh();
	// 	$f["data1"]  = $this->MasterData->getoutsn();
	// 	$f["data2"] = $this->MasterData->getitemwhsn();
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("reporting/stockcardexp", $f);
	// 	$this->load->view("Employe/footer");
	// }

	function stockcardexp()
	{
		date_default_timezone_set("Asia/Jakarta");
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		$dateexpaired = date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))));

		if (!isset($search)) {
			$search = '';
		}

		$f["title"] = "Purchasing";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'reporting/stockcardexp';
		$config['total_rows'] = $this->MasterData->Countgetitempaginationexpaired($filter, $search, $dateexpaired, 'mainwarehouse');
		$config['per_page']   = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]  = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 3;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$end  = $from + $config["per_page"];

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");

		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();
		$f['title'] = 'Cari Item';

		// get item list
		$f["title"]          = "item";
		$f["data"]           = $this->MasterData->getitemexppaginatation($from, $end, $filter, $search, $dateexpaired, 'mainwarehouse');
		$f["data1"]          = $this->MasterData->getoutsn();
		$f["data2"]          = $this->MasterData->getitemwhsn();

		// load view

		$f["title"] = "gudang";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcardexp", $f);
		$this->load->view("Employe/footer");
	}

	function mailstockcardexp()
	{

		$f["title"] = "counter";
		$f["data"]  = $this->MasterData->getitemwh();
		$f["data1"]  = $this->MasterData->getoutsn();
		$f["data2"] = $this->MasterData->getitemwhsn();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("reporting/stockcardexp", $f);
		$this->load->view("Employe/footer");


		if (isset($_POST['submit'])) {
			$mail   = new PHPMailer\PHPMailer\PHPMailer();
			$email  = $this->input->post('email');

			//Server settings
			$mail->SMTPOptions = array(
				'ssl'               => array(
					'verify_peer'       => false,
					'verify_peer_name'  => false,
					'allow_self_signed' => true
				)
			);

			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                              // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'guesmail004@gmail.com';                     // SMTP username
			$mail->Password   = 'guesmail123';                               // SMTP password
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPSecure = 'tls';

			$data = array();
			$mesg = $this->load->view('reporting/SentMail/stockcardexp', '', true);

			//Recipients
			$mail->setFrom('muhammaddedeandri98@gmail.com');
			$mail->addAddress($email);     // Add a recipient
			$mail->addReplyTo('muhammaddedeandri98@gmail.com');

			// Email subject
			$mail->Subject = 'Daftar Stock Barang Segera Expaired';

			// Set email format to HTML
			$mail->isHTML(true);

			//Email body content
			$mail->Body    = '<p>' . $mesg . '</p>';

			if ($mail->send()) {
				$this->session->set_flashdata('flash_message', 'Email Has Been Send');
			} else {
				$this->session->set_flashdata('error', 'Erorr');
			}
		}
	}

	// function stockcardopname()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$f["long"] = json_decode(base64_decode($this->input->post('long')));
	// 	$f["data"] = $this->MasterData->getitemwh();
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("reporting/stockcardopname", $f);
	// 	$this->load->view("Employe/footer");
	// }

	function stockcardopname()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		if (!isset($search)) {
			$search = '';
		}

		$f["title"] = "Purchasing";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'reporting/stockcardopname';
		$config['total_rows'] = $this->MasterData->Countgetitemwh($filter, $search);
		$config['per_page']   = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]  = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 3;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$end  = $from + $config["per_page"];

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");

		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();

		// get item list
		$f["title"]          = "item";
		$f["data"]           = $this->MasterData->getitemwhpaginate($filter, $search, $from, $end);
		$f["long"]           = json_decode(base64_decode($this->input->post('long')));

		// load view

		$f["title"] = "gudang";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcardopname", $f);
		$this->load->view("Employe/footer");
	}

	function addstockopname()
	{
		$iditem    = $this->input->post('iditem');
		$nameitem  = $this->input->post('nameitem');
		$sku       = $this->input->post('sku');
		$qtysystem = $this->input->post('qtysystem');
		$qtyactual = $this->input->post('qtyactual');
		$dateawal  = date('Y-m-d');
		$dateakhir = date('Y-m-d');
		$balancesystem = $this->input->post('balancesystem');
		$cek = $this->MasterData->addstockopname($iditem, $nameitem, $sku, $qtysystem, $qtyactual, $dateawal, $dateakhir, $balancesystem);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		// echo $cek;
		redirect('reporting/stockcardopname');
	}

	//stockcardin
	function stockcardin()
	{
		// $f = $this->session->userdata("data");
		$f["title"] = "gudang";
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$date1 = $this->input->get("date1");
		$date2 = $this->input->get("date2");
		$sku = $this->input->get("sku");
		$codewh = $this->input->get("codewh");
		$cari = $this->input->get("cari");
		if (empty($date1)) {
			$date1 = substr(date("Y-m-d"), 0, 7) . '-01';
		}
		if (empty($date2)) {
			$date2 = date("Y-m-d");
		}
		if (empty($codewh)) {
			$codewh = '';
		}
		if (empty($sku)) {
			$sku = '';
		}
		if (empty($cari)) {
			$cari = '';
		}
		$cek["date1"] = $date1;
		$cek["date2"] = $date2;
		$cek["sku"] = $sku;
		$cek["codewh"] = $codewh;
		$cek["cari"] = $cari;
		$cek["data"] = $this->MReporting->reportinbook($date1, $date2, $sku, $codewh, $cari);
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcardin", $cek, $f);
		$this->load->view("Employe/footer");
	}
	//stockcardout
	function stockcardout()
	{
		// $f = $this->session->userdata("data");
		$f["title"] = "gudang";
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$date1 = $this->input->get("date1");
		$date2 = $this->input->get("date2");
		$sku = $this->input->get("sku");
		$codewh = $this->input->get("codewh");
		$cari = $this->input->get("cari");
		if (empty($date1)) {
			$date1 = substr(date("Y-m-d"), 0, 7) . '-01';
		}
		if (empty($date2)) {
			$date2 = date("Y-m-d");
		}
		if (empty($codewh)) {
			$codewh = '';
		}
		if (empty($sku)) {
			$sku = '';
		}
		if (empty($cari)) {
			$cari = '';
		}
		$cek["date1"] = $date1;
		$cek["date2"] = $date2;
		$cek["sku"] = $sku;
		$cek["codewh"] = $codewh;
		$cek["cari"] = $cari;
		$cek["data"] = $this->MReporting->reportoutbook($date1, $date2, $sku, $codewh, $cari);
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("reporting/stockcardout", $cek, $f);
		$this->load->view("Employe/footer");
	}



	function newpr()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("PRQUO/addpr", $f);
		$this->load->view("xfooter");
	}

	function changepr()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MPrQuo->readheaderpr(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MPrQuo->readdetailpr(base64_decode($f["idtrans"]));
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("xfooter");
		$this->load->view("PRQUO/changepr", $f);
	}

	function loadpr()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MPrQuo->readheaderpr(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MPrQuo->readdetailpr(base64_decode($f["idtrans"]));
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("xfooter");
		$this->load->view("PRQUO/changepr", $f);
	}

	//PO
	function po()
	{
		// $f = $this->session->userdata("data");
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PO');
		$cek["data"]  = $this->MPrQuo->getlistpo('');
		$f["title"] = "Purchasing";

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("PRQUO/po", $cek, $f);
		$this->load->view("Employe/footer");
	}
}
