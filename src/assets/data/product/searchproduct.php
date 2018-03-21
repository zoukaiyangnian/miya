<?php
//data/products/getProductsByKw.php
header("Content-Type:application/json");
require_once("../init.php");
$kw=$_REQUEST["dname"];
if($kw==null){
    echo json_encode(['code'=>400,'msg'=>'搜索内容为空']);
	break;
}
$sql="select product_name,lid from miya_category where";
//将$kw按空格切开为数组$kws
$kws=explode(" ",$kw);
for($i=0;$i<count($kws);$i++){//遍历$kws
	//将$kws中当前位置的关键词替换为title like '%...%'
	$kws[$i]=" product_name like '%$kws[$i]%' ";
}
//将$kws用" and "连接为一个条件字符串$where
$where=implode(" and ",$kws);
//$sql=$sql." where ".$where
$sql.=" $where order by lid desc limit 0,10";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_all($result,1);
$output=['code'=>200,'data'=>$data];
echo json_encode($output);