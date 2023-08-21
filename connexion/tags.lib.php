<?php
function tag($tag, $content=null, $attributs=array()){
	$str_att='';
	foreach($attributs as $name => $value){
		$str_att.=" $name='$value'";
	}
	if($content)$str= "<$tag$str_att>$content</$tag>";
	else $str = "<$tag$str_att/>";
	return $str;

}

function paragraphe($content,$attributs=array()){
	return tag('p',$content,$attributs);
}

function form($content, $action="#", $method="post", $attributs=array()){
	$attributs["method"]=$method;
	$attributs["action"]=$action;
	return tag('form', $content, $attributs);
}

function input($name, $type="text", $value="", $attributs=array()){
	$attributs["type"]=$type;
	$attributs["name"]=$name;
	$attributs["value"]=$value;
	return tag('input',null, $attributs);
}

function select($name, $onChange, $nbOption, $attributs=array(), $condition){
	$str_att="<select name='$name' onChange='$onChange'>";
	for($i=0; $i<=$nbOption;$i++){
		if($i==$condition){
			$str_att.=tag("option",$i,array("value"=>$i, "selected"=>""));
		}
		else{
			$str_att.=tag("option",$i,array("value"=>$i));
		}
	}
	$str_att.="</select>";
	return $str_att;
}

?>
