<?php
//data/products/getProductsByKw.php
header("Content-Type:application/json");
require_once("../init.php");
$kw=$_REQUEST["dname"];
if($kw==null){
    echo json_encode(['code'=>400,'msg'=>'��������Ϊ��']);
	break;
}
$sql="select product_name,lid from miya_category where";
//��$kw���ո��п�Ϊ����$kws
$kws=explode(" ",$kw);
for($i=0;$i<count($kws);$i++){//����$kws
	//��$kws�е�ǰλ�õĹؼ����滻Ϊtitle like '%...%'
	$kws[$i]=" product_name like '%$kws[$i]%' ";
}
//��$kws��" and "����Ϊһ�������ַ���$where
$where=implode(" and ",$kws);
//$sql=$sql." where ".$where
$sql.=" $where order by lid desc limit 0,10";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_all($result,1);
$output=['code'=>200,'data'=>$data];
echo json_encode($output);