<?php
/**
 * Created by PhpStorm.
 * User: Bestony
 * Date: 2016/12/1
 * Time: 14:00
 */

namespace Bestony\Comb;
use Bestony\Comb;

class SecretKey
{
    /**
     * 创建密钥
     * @param $token
     * @param string $name
     * @return mixed
     */
    public function createSecretKey($token,$name=''){
        $http = new Comb\Http;
        $data= array(
            "key_name"=>$name
        );
        $header = array(
            "Authorization"=>"Token ".$token
        );
        $res = $http->makePostRequest('/api/v1/secret-keys',$data,$header);
        return $res;
    }
}