<?php
header("Content-Type:application/json;charset=UTF-8");
require("../init.php");
@$pname=$_REQUEST["pname"];
@$class=$_REQUEST['check'];
if($pname==null){
	echo json_encode(['code'=>404,'data'=>null]);
}else{
	 $sql="select product_name,lg,price,lid from miya_category where brand='$pname' ";
     switch($class){
	    case null:break;
	    case 1:$sql.=" ORDER BY v1 DESC ";
		       break;
        case 2:$sql.=" ORDER BY price DESC";
		       break;
        case 3:$sql.=" AND is_onsale=1 ";
		       break;
		case 4:$sql.=" ORDER BY price ";
		       break;
        default:break;
	 };
	$result=mysqli_query($conn,$sql);
    $data=mysqli_fetch_all($result,1);
	$output=['code'=>200,'data'=>$data];
    echo json_encode($output);
}
?>
