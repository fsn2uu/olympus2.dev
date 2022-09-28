<?php

class RETS
{
    protected $this->connect;
    
    private function connect()
    {
        try
        {
            $config = new \PHRETS\Configuration;
            $config->setLoginUrl($url)
                    ->setUsername($username)
                    ->setPassword($password)
                    ->setRetsVersion('1.7.2');
            $rets = new \PHRETS\Session($config);

            $this->connect = $rets->Login();
        }
        catch(Exception $e)
        {
            //
        }
    }
}
