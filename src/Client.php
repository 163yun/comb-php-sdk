<?php
/**
 * Created by PhpStorm.
 * User: Bestony
 * Date: 2016/11/21
 * Time: 1:40
 */

namespace Bestony\Comb;
use Bestony\Comb;

class Client
{
    /**
     * Client constructor.
     * @param $accessKeyId
     * @param $accessKeySecret
     */
    public function __construct($app_key,$app_secret)
    {
        $this->app_key = $app_key;
        $this->app_secret = $app_secret;
        return $this;
    }
    //---------------------Public Function -------------------//
    /**
     * 获取用户的镜像
     * @param int $limit
     * @param int $offset
     * @return array|object|string
     */
    public function getImages($limit = 20,$offset = 0){
        $repo = new Comb\Repo;
        $token = $this->getToken();
        $images = $repo->getImages($token,$limit,$offset);
        return $images;
    }

    /**
     * 获取指定ID的镜像信息
     * @param $id
     * @return array|object|string
     */
    public function getImage($id){
        $repo = new Comb\Repo;
        $token = $this->getToken();
        $image = $repo->getImage($token,$id);
        return $image;
    }
    public function createSecretKeys($name){
        $secretkey = new Comb\SecretKey;
        $token = $this->getToken();
        $key = $secretkey->createSecretKey($token,$name);
        return $key;
    }

    //---------------------Private Function -------------------//
    /**
     * 获取Token
     * @return mixed
     */
    public function getToken(){
        $user = new Comb\User;
        $token = $user->getToken($this->app_key,$this->app_secret);
        return $token;
    }
}