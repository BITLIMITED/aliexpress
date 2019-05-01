# aliexpress

## install
```composer req bitlimited/aliexpress```

## Use
```
use Bitlimited\Aliexpress\Service\AliexpressException;
use Bitlimited\Aliexpress\Service\AliexpressService;

class CustomController
{
    public function test()
    {
        try {
            $service = new AliexpressService();
            /**
             *
             * Install auth parameters
            */
            $service->setAuth(
                'email/login',
                'token',
                'password'
            );
            
            /**
             * 
             * Install request parameters
            */
            $options = [
                'method' => 'aliexpress.....',
                'params' => [ /* array */];
            ];
            
            /**
             *
             * Query
            */
            $result = $service->request($options);
            
        } catch(AliexpressException $e) {
            echo $e->getMessage();
        }
        
        return json_decode($result);
    }
}
```