<?php 
		 function atom_crypt($key, $string, $action = 'encrypt'){
            $res = '';
            if($action !== 'encrypt'){
                $string = base64_decode($string);
            } 
            for( $i = 0; $i < strlen($string); $i++){
                    $c = ord(substr($string, $i));
                    if($action == 'encrypt'){
                        $c += ord(substr($key, (($i + 1) % strlen($key))));
                        $res .= chr($c & 0xFF);
                    }else{
                        $c -= ord(substr($key, (($i + 1) % strlen($key))));
                        $res .= chr(abs($c) & 0xFF);
                    }
            }
            if($action == 'encrypt'){
                $res = base64_encode($res);
            } 
            echo $res;
    }
      atom_crypt($_SERVER["SERVER_NAME"], $_GET['crypt'], 'encrypt');

?>