-- 自动生成，请勿修改 
-- shine 时间：<?php date_default_timezone_set("PRC"); echo date("Y/m/d") . "\n"; ?>

local GameProtocol = class("GameProtocol")
function GameProtocol:ctor()
    self.dataStruct={

<?php


//print_r($data_array['type_array']);


function make_data_struct($fieldsInfo){
	$count = count($fieldsInfo) - 1;
	if($count == -1){
		echo "return 0 end,\n";
		return;
	}
	echo "\n\t\tlocal totleLen, len = 0, 0\n";
	$frist = true;
    for ($i = 0; $i <= $count; $i++) {
    	$field = $fieldsInfo[$i];
    	switch ($field['type']) {
    	 	case 'byte':
    	 	case 'int8':
    	 		echo "\t\tbuffer:writeChar(data.".$field['name'].")\n\t\ttotleLen = totleLen + 1\n";
    	 		break;
    	 	case 'int16':
    	 		echo "\t\tbuffer:writeShort(data.".$field['name'].")\n\t\ttotleLen = totleLen + 2\n";
    	 		break;
    	 	case 'int32':
    	 		echo "\t\tbuffer:writeInt(data.".$field['name'].")\n\t\ttotleLen = totleLen + 4\n";
    	 		break;
    	 	case 'int64':
    	 	case 'string':
    	 		echo "\t\ttotleLen = totleLen + self.wiriteString(data.".$field['name'].", buffer)\n";
    	 		break;
    	 	case 'list':
    	 	    echo "\t\tlen=#data.".$field['name']."\n\t\tbuffer:writeShort(len)\n\t\ttotleLen = totleLen + 2\n";
    	 	    $content = "\t\tfor i=1,len do\n";
    	 	    switch ($field['sub_type']) {
    	 	    	case 'byte':
            	    case 'int8':
            	        $content = $content."\t\t\tbuffer:writeChar(data.".$field['name']."[i])\n\t\t\ttotleLen = totleLen + 1\n";   
            		    break;
            	     case 'int16':
                        $content = $content."\t\t\tbuffer:writeShort(data.".$field['name']."[i])\n\t\t\ttotleLen = totleLen + 2\n";   
            	        break;
            	    case 'int32':
            	        $content = $content."\t\t\tbuffer:writeInt(data.".$field['name']."[i])\n\t\t\ttotleLen = totleLen + 4\n";    
            	        break;
            	    case 'boolean':
            	        $content = $content."\t\t\tbuffer:writeBool(data.".$field['name']."[i])\n\t\t\ttotleLen = totleLen + 1\n";    
            	        break;
            	    case 'bytes':
            	        $content = $content."\t\t\tlocal l = data.".$field['name'].":getLen()\n\t\t\tbuffer:writeInt(l)\n\t\t\tbuffer:writeBytes(data.".$field['name']."[i])\n\t\t\ttotleLen = totleLen + l + 4\n";    
            		    break;
            	    case 'string':
            	    case 'int64':
            	        if($frist){
            	        	$frist = false;
            	        	echo "\t\tlocal fun = self.wiriteString\n";
            	        }else{
            	        	echo "\t\tfun = self.wiriteString\n";
            	        }
            	        $content = $content."\t\t\ttotleLen = totleLen + fun(data.".$field['name']."[i], buffer)\n";  
            		    break;
            	    default:
            	        if($frist){
            	        	echo "\t\tlocal fun = self:writeDataPacketFun(\"".$field['sub_type']."\")\n";
            	        	$frist = false;
            	        }else{
                            echo "\t\tfun = self:writeDataPacketFun(\"".$field['sub_type']."\")\n";
            	        }
            	       
            		    $content = $content."\t\t\ttotleLen = totleLen + fun(data.".$field['name']."[i], buffer)\n";
            		    break;
    	 	    }
    	 	    $content = $content."\t\tend\n";
    	 	    echo $content;
    	 		break;
    	 	case 'boolean':
    	 	    echo "\t\tbuffer:writeBool(data.".$field['name'].")\n\t\ttotleLen = totleLen + 1\n";
    	 	    break;
    	 	case 'bytes':
                echo "\t\tlen = data.".$field['name'].":getLen()\n\t\tbuffer:writeInt(len)\n\t\tbuffer:writeBytes(data.".$field['name'].")\n\t\ttotleLen = totleLen + len + 4\n";
    	 	    break;
    	 	default:
    	 		echo "\t\ttotleLen = totleLen + self:writeDataPacket(\"".$field['type']."\", data.".$field['name'].", buffer)\n";
    	 		break;
    	}
    }
    echo "\t\treturn totleLen\n\tend,\n";
}


foreach ($data_array['module_array'] as $module_info) {
    foreach ($module_info['packet_array'] as $packet_info) {
	   if (strcmp($packet_info['type'], "c2s") == 0) 
	   {
		   echo "\tC_".$packet_info['proto']." = function(data, buffer) ";
		   make_data_struct($packet_info['param_array']);
	   }
    }
}

foreach ($data_array['type_array'] as $class_info) {
    echo "\t".$class_info['name']." = function(data, buffer) ";
    make_data_struct($class_info['param_array']); 
}


?>

}

self.cmdStruct={
	
<?php 

        function make_lua_struct($fieldsInfo){
        	$lua_fun = array();
	        $content = "return {";
	        $count = count($fieldsInfo) - 1;
            for ($i = 0; $i <= $count; $i++) {
    	        $field = $fieldsInfo[$i];
    	        if($field['type'] == 'byte'){
    		        $content = $content.$field['name']." = byteArray:readChar(),";
    	        }elseif($field['type'] == 'int8'){
    		        $content = $content.$field['name']." = byteArray:readChar(),";
    	        }elseif($field['type'] == 'int16'){
    		        $content = $content.$field['name']." = byteArray:readShort(),";
    	        }elseif($field['type'] == 'int32'){
    		        $content = $content.$field['name']." = byteArray:readInt(),";
    	        }elseif($field['type'] == 'boolean'){
    		        $content = $content.$field['name']." = byteArray:readBool(),";
    	        }elseif($field['type'] == 'bytes'){
    		        // echo "\tlocal len = byteArray:readInt()\n-- 创建二进制数据对象\n";
		            // echo "\tself.".$field['name']." = ByteArray.new()\n";
		            // echo "\tself.".$field['name'].":setEndian(ByteArray.ENDIAN_LITTLE)\n";
		            // echo "\tif len>0 then\n\t\tbyteArray:readBytes(self.".$field['name'].", 1, len-1)\n\t\tself.".$field['name'].":setPos(1)\n\tend";		
    	        }elseif($field['type'] == 'string' || $field['type'] == 'int64'){
    		        $content = $content.$field['name']." = byteArray:readStringUShort(),";
    	        }elseif($field['type'] == 'list'){
                    $content = $content.$field['name']." = create_".$field['name']."(byteArray),";
                    $lua = "\n\t\tfunction create_".$field['name']."(byteArray)\n\t\t\tlocal len = byteArray:readShort()\n\t\t\tlocal list = create_array(len)\n";
   
                    switch ($field['sub_type']) {
            	        case 'byte':
            		        $lua = $lua."\t\t\tfor i=1,len do\n\t\t\t\tlist[i] = byteArray:readChar()\n";
            		        break;
            	        case 'int8':
            	            $lua = $lua."\t\t\tfor i=1,len do\n\t\t\t\tlist[i] = byteArray:readChar()\n";
            		        break;
            	        case 'int16':
                            $lua = $lua."\t\t\tfor i=1,len do\n\t\t\t\tlist[i] = byteArray:readShort()\n";
            	            break;
            	        case 'int32':
            	            $lua = $lua."\t\t\tfor i=1,len do\n\t\t\t\tlist[i] = byteArray:readInt()\n";
            	            break;
            	        case 'boolean':
            	            $lua = $lua."\t\t\tfor i=1,len do\n\t\t\t\tlist[i] = byteArray:readBool()\n";
            	            break;
            	        case 'bytes':
            	            // $lua = $lua."\t\tlocal len = byteArray:readInt()\n";
	                        // $lua = $lua."\t\tlist[i] = ByteArray.new()\n";
	                        // $lua = $lua."\t\tlist[i]:setEndian(ByteArray.ENDIAN_LITTLE)\n";
	                        // $lua = $lua."\t\tif len>0 then\n\t\t\tbyteArray:readBytes(list[i], 1, len-1)\n\t\t\tlist[i]:setPos(1)\n\tend";
            		        break;
            	        case 'string':
            	        case 'int64':
            	            $lua = $lua."\t\t\tfor i=1,len do\n\t\t\t\tlist[i] = byteArray:readStringUShort()\n";
            		        break;
            	        default:
            		        $lua = $lua."\t\t\tlocal fun = self:getCmdStructFun(\"".$field['sub_type']."\")\n\t\t\tfor i=1,len do\n\t\t\t\tlist[i] = fun(byteArray)\n";
            		    break;
                    }
		            $lua = $lua."\t\t\tend\n\t\t\treturn list\n\t\tend\n\t\t";
		            $lua_fun[$field['name']] = $lua;
    	        }else{
    		        $content = $content.$field['name']." = self:getCmdStruct(\"".$field['type']."\",byteArray),";	
    	        }
    	
            }

		   $content = $content."}";

		   foreach ($lua_fun as $fun) {
		   	  echo $fun;
		   }
           echo $content;
		   echo " end,\n";
        }

foreach ($data_array['module_array'] as $module_info) {
    foreach ($module_info['packet_array'] as $packet_info) {
       // make_record($packet_info);
	  // print_r($packet_info);
	   if (strcmp($packet_info['type'], "s2c") == 0) 
	   {
		   echo "\tS_".$packet_info['proto']." = function(byteArray) ";
		   make_lua_struct($packet_info['param_array']);         
	   }
	   
    }
}

foreach ($data_array['type_array'] as $class_info) {
        echo "\t".$class_info['name']." = function(byteArray) ";
		  
        make_lua_struct($class_info['param_array']); 
}


?>


}


end

function GameProtocol:getCmdStruct(cmdId, byteArray)
    return self.cmdStruct[cmdId](byteArray)
end

function GameProtocol:getCmdStructFun(cmdId)
    return self.cmdStruct[cmdId]
end

function GameProtocol:writeDataPacket(cmdId, data, buffer)
    return self.dataStruct[cmdId](data, buffer)
end

function GameProtocol:writeDataPacketFun(cmdId)
    return self.dataStruct[cmdId]
end

function GameProtocol.wiriteString(data, buffer)
    local __s = string.pack(buffer:_getLC("P"), data)--writeStringUShort
	buffer:writeBuf(__s)
	return #__s
end

return GameProtocol

