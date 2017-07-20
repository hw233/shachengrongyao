-- 自动生成，请勿修改 
-- shine
-- 时间：2016-07-01  15:28:00

<?php


// function make_list_item($name, $type){
// 	if($type == 'byte'){
//     	echo "\t\tself.".$name."[i] = byteArray:readByte()\n";
//     }elseif($type == 'int8'){
//     	echo "\t\tself.".$name."[i] = byteArray:readByte()\n";
//     }elseif($type == 'int16'){
//    		echo "\t\tself.".$name."[i] = byteArray:readShort()\n";
//    	}elseif($type == 'int32'){
//    		echo "\t\tself.".$name."[i] = byteArray:readInt()\n";
//    	}elseif($type == 'boolean'){
//    		echo "\t\tself.".$name."[i] = byteArray:readBool()\n";
//    	}elseif($type == 'bytes'){
//    		echo "\t\tlocal len = byteArray:readInt()\n-- 创建二进制数据对象\n";
// 	    echo "\t\tself.".$name."[i] = ByteArray.new()\n";
// 	    echo "\t\tself.".$name."[i]:setEndian(ByteArray.ENDIAN_LITTLE)\n";
// 	    echo "\t\tif len>0 then\n\t\t\tbyteArray:readBytes(self.".$name."[i], 1, len-1)\n\t\t\tself.".$name."[i]:setPos(1)\n\tend";		
//    	}elseif($type == 'string' || $type == 'int64'){
//    		echo "\t\tself.".$name."[i] = byteArray:readStringUShort()\n";
//     }else{
//     	echo "\t\tself.".$name."[i] = require(\"app.gamenet.".$type."\").new(byteArray)\n";	
//     }
// }

echo "local ".$data_array['name']." = class(\"".$data_array['name']."\")\n\n";

echo "function ".$data_array['name'].":ctor(byteArray)\n";
    
    $fieldsInfo = $data_array['param_array'];
    $count = count($fieldsInfo) - 1;
    //$isArrayFun = false;
    for ($i = 0; $i <= $count; $i++) {
    	$field = $fieldsInfo[$i];
    	if($field['type'] == 'byte'){
    		echo "\tself.".$field['name']." = byteArray:readByte()\n";
    	}elseif($field['type'] == 'int8'){
    		echo "\tself.".$field['name']." = byteArray:readByte()\n";
    	}elseif($field['type'] == 'int16'){
    		echo "\tself.".$field['name']." = byteArray:readShort()\n";
    	}elseif($field['type'] == 'int32'){
    		echo "\tself.".$field['name']." = byteArray:readInt()\n";
    	}elseif($field['type'] == 'boolean'){
    		echo "\tself.".$field['name']." = byteArray:readBool()\n";
    	}elseif($field['type'] == 'bytes'){
    		echo "\tlocal len = byteArray:readInt()\n-- 创建二进制数据对象\n";
		    echo "\tself.".$field['name']." = ByteArray.new()\n";
		    echo "\tself.".$field['name'].":setEndian(ByteArray.ENDIAN_LITTLE)\n";
		    echo "\tif len>0 then\n\t\tbyteArray:readBytes(self.".$field['name'].", 1, len-1)\n\t\tself.".$field['name'].":setPos(1)\n\tend";		
    	}elseif($field['type'] == 'string' || $field['type'] == 'int64'){
    		echo "\tself.".$field['name']." = byteArray:readStringUShort()\n";
    	}elseif($field['type'] == 'list'){
    		//$isArrayFun = true;
    		echo "\tlocal len = byteArray:readShort()\n";
    		echo "\tself.".$field['name']." = create_array(len)\n";
    		echo "\tfor i=1,len do\n";

            switch ($field['sub_type']) {
            	case 'byte':
            		echo "\t\tself.".$field['name']."[i] = byteArray:readByte()\n";
            		break;
            	case 'int8':
            	    echo "\t\tself.".$field['name']."[i] = byteArray:readByte()\n";
            		break;
            	case 'int16':
                    echo "\t\tself.".$field['name']."[i] = byteArray:readShort()\n";
            	    break;
            	case 'int32':
            	    echo "\t\tself.".$field['name']."[i] = byteArray:readInt()\n";
            	    break;
            	case 'boolean':
            	    echo "\t\tself.".$field['name']."[i] = byteArray:readBool()\n";
            	    break;
            	case 'bytes':
            	    echo "\t\tlocal len = byteArray:readInt()\n";
	                echo "\t\tself.".$field['name']."[i] = ByteArray.new()\n";
	                echo "\t\tself.".$field['name']."[i]:setEndian(ByteArray.ENDIAN_LITTLE)\n";
	                echo "\t\tif len>0 then\n\t\t\tbyteArray:readBytes(self.".$field['name']."[i], 1, len-1)\n\t\t\tself.".$field['name']."[i]:setPos(1)\n\tend";
            		break;
            	case 'string':
            	case 'int64':
            	    echo "\t\tself.".$field['name']."[i] = byteArray:readStringUShort()\n";
            		break;
            	default:
            		echo "\t\tself.".$field['name']."[i] = require(\"app.gamenet.".$field['sub_type']."\").new(byteArray)\n";
            		break;
            }
		    echo "\tend\n";
    	}else{
    		echo "\tself.".$field['name']." = require(\"app.gamenet.".$field['type']."\").new(byteArray)\n";	
    	}
    	
    }






	
echo "end\n\n";


// if($isArrayFun){
// echo "function ".$data_array['name'].":create_array(size)\n\tif size > 64 then\n\t\treturn {true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true}\n\telseif size > 32  then\n\t\treturn {true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true}\n\telseif size > 16 then\n\t\treturn {true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true}\n\telseif size > 8 then\n\t\treturn {true,true,true,true,true,true,true,true,true}\n\telseif size > 4 then\n\t\treturn {true,true,true,true,true}\n\telseif size > 2 then\n\t\treturn {true,true,true}\n\telseif size > 1 then\n\t\treturn {true,true}\n\telseif size == 1 then\n\t\treturn {true}\n\telse\n\t\treturn {}\n\tend\nend\n\n";
// }



echo "return ".$data_array['name'];

?>