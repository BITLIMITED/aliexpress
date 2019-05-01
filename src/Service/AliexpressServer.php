<?php


namespace Bitlimited\Service;


class AliexpressServer
{
    private $email;

    private $token;

    private $password;

    public function setAuth(string $email, string $token, string $password)
    {
        $this->email = $email;
        $this->token = $token;
        $this->password = $password;
    }

    public function request(array $param)
    {
        return $this->createAccessToken();
    }

    private function createAccessToken()
    {
        return $this->email;
    }

}