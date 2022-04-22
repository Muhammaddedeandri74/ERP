<?php 


	class MReporting extends CI_Model
	{

		function getcurrstatus($codetrans)
			{
				// $date = date("Y-m-d");
				// $data = array($date);
				$data=array($codetrans,$codetrans);
				$query = "SELECT top 1 * from (SELECT * FROM transstatus WHERE codetrans = ? union all
						  SELECT 0,'0',?,0,0,0,0 ) as x
						  order by idtrans desc ";
						  $eksekusi = $this->db->query($query,$data)->result_object();
					$respon = array();
					foreach ($eksekusi as $key ) {
						$f["codetrans"] =  $key -> codetrans;
						$f["s01"] =  $key -> s01;
						$f["s02"] =  $key -> s02;
						$f["s03"] =  $key -> s03;
						$f["s04"] =  $key -> s04;
						//array_push($respon,$f);
					}
				return $f;
			}

			function qtystockbook($sku,$codewh,$cari) 
			{
				$query ="exec qtystockbook ?,?,?";
				$data=array($sku,$codewh,$cari);
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0 ) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						foreach ($key as $key2 => $value) {
							$f[$key2]	=$value;
						}
						array_push($respon,$f);
					}
				}
				else
				{
					$respon = "Not Found";
				}
				return $respon;
			}

			function reportstockbook($date1,$date2,$sku,$codewh,$cari) 
			{
				$query ="exec reportstockbook ?,?,?,?,?";
				$data=array($date1,$date2,$sku,$codewh,$cari);
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0 ) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						foreach ($key as $key2 => $value) {
							$f[$key2]	=$value;
						}
						array_push($respon,$f);
					}
				}
				else
				{
					$respon = "Not Found";
				}
				return $respon;
			}

			function reportinbook($date1,$date2,$sku,$codewh,$cari) 
			{
				// $query = "SELECT 'In' as tipe, * from (
				// select 'Pindah ' + isnull(w2.namecomm,'') as nametrans,substring(a.codemove,9,10) as codetrans,a.datemove as datetrans,a.descinfo,b.qty,b.expdate,i.sku,i.nameitem,w.codecomm as codewh,w.namecomm as namewh,u1.username as madeuser,u2.username as upduser,'' as idsn,'' as idsn2
				// from movewh as a
				// inner join movewhdet as b on a.idmove=b.idmove
				// left join tb_user as u1 on a.madeuser=u1.iduser
				// left join tb_user as u2 on a.upduser=u2.iduser
				// left join (select iditem,sku,nameitem from dbo.tb_item ) as i on b.iditem=i.iditem
				// left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on b.idwh2=w.idcomm
				// left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w2 on b.idwh=w2.idcomm

				// union all 

				// select 'In Purchase ' + isnull(s.namecomm,'') as nametrans,substring(a.codein,9,10),a.datein,a.descinfo,b.qty,b.expdate,i.sku,i.nameitem,w.codecomm ,w.namecomm ,u1.username ,u2.username ,idsn,idsn2
				// from invin as a
				// inner join invindet as b on a.idin=b.idin
				// left join tb_user as u1 on a.madeuser=u1.iduser
				// left join tb_user as u2 on a.upduser=u2.iduser
				// left join (select iditem,sku,nameitem from dbo.tb_item ) as i on b.iditem=i.iditem
				// left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on b.idwh=w.idcomm
				// left join (select idcomm,codecomm,namecomm from common_detail where idgroup=1 or idgroup=2) as s on a.idsupp=s.idcomm

				// union all 

				// select 'Paket ' + isnull('','') as nametrans,substring(a.codepaket,9,10),a.datepaket,a.descinfo,b.qty,a.expdatep,i.sku,i.nameitem,w.codecomm ,w.namecomm ,u1.username ,u2.username ,idsnp,idsnp2
				// from paket as a
				// inner join paketdet as b on a.idpaket=b.idpaket
				// left join tb_user as u1 on a.madeuser=u1.iduser
				// left join tb_user as u2 on a.upduser=u2.iduser
				// left join (select iditem,sku,nameitem from dbo.tb_item ) as i on a.iditemp=i.iditem
				// left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm

				// union all 

				// select 'Split ' + isnull(i2.sku,'') as nametrans,substring(a.codepakets,9,10),a.datepakets,a.descinfo,b.qty,b.expdate,i.sku,i.nameitem,w.codecomm ,w.namecomm ,u1.username ,u2.username ,'' as idsn,'' as idsn2
				// from pakets as a
				// inner join paketsdet as b on a.idpakets=b.idpakets
				// left join tb_user as u1 on a.madeuser=u1.iduser
				// left join tb_user as u2 on a.upduser=u2.iduser
				// left join (select iditem,sku,nameitem from dbo.tb_item ) as i on b.iditem=i.iditem
				// left join (select iditem,sku,nameitem from dbo.tb_item ) as i2 on a.iditems=i2.iditem
				// left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on b.idwh=w.idcomm

				// ) as x
				// ";

				// $query = $query ." where x.datetrans between ? and ? and (x.sku= ?  or ? = '') and (x.codewh = ?  or ? = '')
				// and (?='' or nametrans like ('%'+ ? +'%') or descinfo like ('%'+ ? +'%') or nameitem like ('%'+ ? +'%') or idsn like ('%'+ ? +'%') or idsn2 like ('%'+ ? +'%'))
				
				// ";
				// $data=array($date1,$date2,$sku,$sku,$codewh,$codewh,$cari,$cari,$cari,$cari,$cari,$cari);

				$query ="exec reportinbook ?,?,?,?,?";
				$data=array($date1,$date2,$sku,$codewh,$cari);
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0 ) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						foreach ($key as $key2 => $value) {
							$f[$key2]	=$value;
						}
						array_push($respon,$f);
					}
				}
				else
				{
					$respon = "Not Found";
				}
				return $respon;
			}

			function reportoutbook($date1,$date2,$sku,$codewh,$cari) 
			{
				// $query = "SELECT 'Out' as tipe, * from (

				// 	select 'Pindah ' + isnull(w2.namecomm,'') as nametrans,substring(a.codemove,9,10) as codetrans,a.datemove as datetrans,a.descinfo,b.qty,b.expdate,i.sku,i.nameitem,w.codecomm as codewh,w.namecomm as namewh,u1.username as madeuser,u2.username as upduser,'' as idsn,'' as idsn2
				// 	from movewh as a
				// 	inner join movewhdet as b on a.idmove=b.idmove
				// 	left join tb_user as u1 on a.madeuser=u1.iduser
				// 	left join tb_user as u2 on a.upduser=u2.iduser
				// 	left join (select iditem,sku,nameitem from dbo.tb_item ) as i on b.iditem=i.iditem
				// 	left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w2 on b.idwh2=w2.idcomm
				// 	left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on b.idwh=w.idcomm
					
				// 	union all 
					
				// 	select 'Return Purchase ' + isnull(s.namecomm,'') as nametrans,substring(a.codeinret,9,10),a.dateinret,a.descinfo,b.qty,b.expdate,i.sku,i.nameitem,w.codecomm ,w.namecomm ,u1.username ,u2.username ,idsn,idsn2
				// 	from invinret as a
				// 	inner join invinretdet as b on a.idinret=b.idinret
				// 	left join tb_user as u1 on a.madeuser=u1.iduser
				// 	left join tb_user as u2 on a.upduser=u2.iduser
				// 	left join (select iditem,sku,nameitem from dbo.tb_item ) as i on b.iditem=i.iditem
				// 	left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on b.idwh=w.idcomm
				// 	left join (select idcomm,codecomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
					
				// 	union all 
					
				// 	select 'Paket ' + isnull(i2.sku,'') as nametrans,substring(a.codepaket,9,10),a.datepaket,a.descinfo,b.qty,a.expdatep,i.sku,i.nameitem,w.codecomm ,w.namecomm ,u1.username ,u2.username ,'',''
				// 	from paket as a
				// 	inner join paketdet as b on a.idpaket=b.idpaket
				// 	left join tb_user as u1 on a.madeuser=u1.iduser
				// 	left join tb_user as u2 on a.upduser=u2.iduser
				// 	left join (select iditem,sku,nameitem from dbo.tb_item ) as i on b.iditem=i.iditem
				// 	left join (select iditem,sku,nameitem from dbo.tb_item ) as i2 on a.iditemp=i2.iditem
				// 	left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on a.idwh=w.idcomm
					
				// 	union all 
					
				// 	select 'Split ' + isnull('','') as nametrans,substring(a.codepakets,9,10),a.datepakets,a.descinfo,b.qty,b.expdate,i.sku,i.nameitem,w.codecomm ,w.namecomm ,u1.username ,u2.username ,idsnp,idsnp2
				// 	from pakets as a
				// 	inner join paketsdet as b on a.idpakets=b.idpakets
				// 	left join tb_user as u1 on a.madeuser=u1.iduser
				// 	left join tb_user as u2 on a.upduser=u2.iduser
				// 	left join (select iditem,sku,nameitem from dbo.tb_item ) as i on a.iditems=i.iditem
				// 	left join (select idcomm,codecomm,namecomm from common_detail where idgroup=4) as w on b.idwh=w.idcomm
					
				// 	) as x
				// ";

				// $query = $query ." where x.datetrans between ? and ? and (x.sku= ?  or ? = '') and (x.codewh = ?  or ? = '')
				// and (?='' or nametrans like ('%'+ ? +'%') or descinfo like ('%'+ ? +'%') or nameitem like ('%'+ ? +'%') or idsn like ('%'+ ? +'%') or idsn2 like ('%'+ ? +'%'))
				
				// ";
				$query ="exec reportoutbook ?,?,?,?,?";

				//$data=array($date1,$date2,$sku,$sku,$codewh,$codewh,$cari,$cari,$cari,$cari,$cari,$cari);
				$data=array($date1,$date2,$sku,$codewh,$cari);
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0 ) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						foreach ($key as $key2 => $value) {
							$f[$key2]	=$value;
						}
						array_push($respon,$f);
					}
				}
				else
				{
					$respon = "Not Found";
				}
				return $respon;
			}


			function reportpr($date1,$date2,$status) 
			{
				// $date = date("Y-m-d");
				//$data = array($status);
				$query = "SELECT a.idpr,a.codepr,a.datepr,a.idsupp,a.idcurr,s.namecomm as namesupp,s.namecomm as namecurr,a.itempr as itemcount,a.totalpr,st. namecomm as statuspr,u1.username as madeuser,u2.username as upduser,a.qtypr,a.qtypo
				from (select idpr,codepr,datepr,idsupp,idcurr,itempr,qtypr,qtypo,totalpr,madeuser,upduser,case when qtypr<=qtypo then '03' else case when qtypo>0 and statuspr!='03' then '02' else statuspr end end as statuspr from pr) as a
				left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
				left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
				left join tb_user as u1 on a.madeuser=u1.iduser
				left join tb_user as u2 on a.upduser=u2.iduser
				left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspr=st.codecomm";

				$query = $query ." where a.datepr between ? and ? and (a.statuspr = ? or ? ='')";
				$data=array($date1,$date2,$status,$status);
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0 ) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						$f["codepr"]	=$key -> codepr;
						$f["datepr"]	=$key -> datepr;
						$f["idsupp"]	=$key -> idsupp;
						$f["idcurr"]	=$key -> idcurr;
						$f["namesupp"]	=$key -> namesupp;
						$f["itemcount"]	=$key -> itemcount;
						$f["totalpr"]	=$key -> totalpr;
						$f["statuspr"]	=$key -> statuspr;
						$f["madeuser"]	=$key -> madeuser;
						$f["upduser"]	=$key -> upduser;
						$f["qtypr"]		=$key -> qtypr;
						$f["qtypo"]		=$key -> qtypo;
						$f['idpr']		=$key -> idpr;
						array_push($respon,$f);
					}
				}
				else
				{
					$respon = "Not Found";
				}
				return $respon;
			}

			function reportpo($date1,$date2,$status) 
			{
				// $date = date("Y-m-d");
				//$data = array($status);
				$query = "SELECT a.idpo,a.codepo,a.datepo,a.idsupp,a.idcurr,s.namecomm as namesupp,s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st. namecomm as statuspo,u1.username as madeuser,u2.username as upduser,a.qtypo,a.qtyin
				from (select idpo,codepo,datepo,idsupp,idcurr,itempo,qtypo,qtyin,totalpo,madeuser,upduser,case when qtypo<=qtyin then '03' else case when qtyin>0 and statuspo!='03' then '02' else statuspo end end as statuspo from po) as a
				left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
				left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
				left join tb_user as u1 on a.madeuser=u1.iduser
				left join tb_user as u2 on a.upduser=u2.iduser
				left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspo=st.codecomm";

				$query = $query ." where a.datepo between ? and ? and (a.statuspo = ? or ? ='')";
				$data=array($date1,$date2,$status,$status);
				$eksekusi = $this->db->query($query,$data)->result_object();
				if (count($eksekusi) > 0 ) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						$f["codepo"]	=$key -> codepo;
						$f["datepo"]	=$key -> datepo;
						$f["idsupp"]	=$key -> idsupp;
						$f["idcurr"]	=$key -> idcurr;
						$f["namesupp"]	=$key -> namesupp;
						$f["itemcount"]	=$key -> itemcount;
						$f["totalpo"]	=$key -> totalpo;
						$f["statuspo"]	=$key -> statuspo;
						$f["madeuser"]	=$key -> madeuser;
						$f["upduser"]	=$key -> upduser;
						$f["qtypo"]		=$key -> qtypo;
						$f["qtyin"]		=$key -> qtyin;
						$f['idpo']		=$key -> idpo;
						array_push($respon,$f);
					}
				}
				else
				{
					$respon = "Not Found";
				}
				return $respon;
			}

			function getlistpo($cond)
			{
				$query = "SELECT a.idpo,a.codepo,a.datepo,p.idpr,p.codepr,a.idsupp,s.namecomm as namesupp,s.namecomm as namecurr,a.itempo as itemcount,a.totalpo,st. namecomm as statuspo,u1.username as madeuser,u2.username as upduser
				from po as a
				left join (select idpr,codepr from pr ) as p on a.idpr=p.idpr
				left join (select idcomm,namecomm from common_detail where idgroup=1) as s on a.idsupp=s.idcomm
				left join (select idcomm,namecomm from common_detail where idgroup=3) as c on a.idcurr=c.idcomm
				left join tb_user as u1 on a.madeuser=u1.iduser
				left join tb_user as u2 on a.upduser=u2.iduser
				left join (select codecomm,namecomm from common_detail where idgroup=8) as st on a.statuspo=st.codecomm";
				$query = $query ." where 1=1 " . $cond;
				$eksekusi = $this->db->query($query)->result_object();
				if (count($eksekusi) > 0 ) {
					$respon = array();
					foreach ($eksekusi as $key ) {
						$f["codepo"]	=$key -> codepo;
						$f["codepr"]	=$key -> codepr;
						$f["datepo"]	=$key -> datepo;
						$f["idsupp"]	=$key -> idsupp;
						$f["namesupp"]	=$key -> namesupp;
						$f["itemcount"]	=$key -> itemcount;
						$f["totalpo"]	=$key -> totalpo;
						$f["statuspo"]	=$key -> statuspo;
						$f["nameuser"]	=$key -> madeuser;
						$f['idpo']		=$key -> idpo;
						array_push($respon,$f);
					}
				}
				else
				{
					$respon = "Not Found";
				}
				return $respon;
			}

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