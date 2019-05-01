<?php


namespace Bitlimited\Aliexpress\Service;


use Bitlimited\Aliexpress\Exception\AliexpressException;

class AliexpressService
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

    public function request(array $param):array
    {
        $request = [
            'headers' => [
                'Authorization' => $this->createAccessToken(),
                'X-User-Authorization' => $this->createBasicToken()
            ]
        ];

        return $request;
    }

    private function createBasicToken():string
    {
        if(empty($this->password))
            $this->exceptionInstall("token");

        $token = "Basic ";
        $token .= base64_encode($this->email . ":" . $this->password);

        return $token;
    }

    private function createAccessToken():string
    {
        if(empty($this->email))
            $this->exceptionInstall("email");

        if(empty($this->token))
            $this->exceptionInstall("token");

        $token = "AccessToken ";
        $token .= $this->email . ":";
        $token .= md5($this->email . gmdate('dmYH') . $this->token);

        return $token;
    }

    protected function exceptionInstall(string $key)
    {
        throw new AliexpressException(sprintf('Empty %s parameter. Install %s for setAuth method',$key, $key),500);
    }
}