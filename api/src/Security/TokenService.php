<?php


namespace App\Security;

use App\Entity\User;
use Exception;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;
use Redis;
use Symfony\Component\Cache\Adapter\RedisAdapter;

class TokenService
{
    /**
     * @var Redis
     */
    private $redis;

    public function __construct()
    {
        $this->redis = RedisAdapter::createConnection("redis://localhost");
    }

    /**
     * @param User $user
     * @return bool|false|mixed|string
     * @throws Exception
     */
    public function getPrivateKey(User $user)
    {
        $privateKey = $this->redis->get($user->getId());
        if(is_null($privateKey)) {
            $privateKey = md5(random_bytes(16));
            $this->redis->set($user->getId(), $privateKey);
        }
        return $privateKey;
    }

    /**
     * @param User $user
     * @return string
     * @throws Exception
     */
    public function getPublicKey(User $user)
    {
        $publicKey = md5(random_bytes(16));
        $this->redis->set($publicKey, $user->getId());
        return $publicKey;
    }

    public function destroyPublicKey(User $user)
    {
        $publicKey = "null";
        $this->redis->set($publicKey, $user->getId());
        return $this;
    }

    /**
     * @param User $user
     * @return string
     * @throws Exception
     */
    public function provideToken(User $user)
    {
        $privateKey = $this->getPrivateKey($user);
        $publicKey = $this->getPublicKey($user);
        $token = (new Builder())
            ->withClaim("key", $publicKey)
            ->getToken(new Sha256(), new Key($privateKey));
        return (string) $token;
    }

}