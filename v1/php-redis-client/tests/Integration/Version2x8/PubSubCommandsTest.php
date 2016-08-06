<?php
/**
 * This file is part of RedisClient.
 * git: https://github.com/cheprasov/php-redis-client
 *
 * (C) Alexander Cheprasov <cheprasov.84@ya.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Test\Integration\Version2x8;

include_once(__DIR__. '/../Version2x6/PubSubCommandsTest.php');

use RedisClient\Client\Version\RedisClient2x8;
use Test\Integration\Version2x6\PubSubCommandsTest as PubSubCommandsTestVersion2x6;

/**
 * @see \RedisClient\Command\Traits\Version2x8\PubSubCommandsTrait
 */
class PubSubCommandsTest extends PubSubCommandsTestVersion2x6 {

    const TEST_REDIS_SERVER_1 = TEST_REDIS_SERVER_2x8_1;

    /**
     * @inheritdoc
     */
    public static function setUpBeforeClass() {
        static::$Redis = new RedisClient2x8([
            'server' =>  static::TEST_REDIS_SERVER_1,
            'timeout' => 2,
        ]);
        static::$Redis2 = new RedisClient2x8([
            'server' =>  static::TEST_REDIS_SERVER_1,
            'timeout' => 2,
        ]);
    }
}
