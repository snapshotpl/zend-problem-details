<?php
/**
 * @see       https://github.com/zendframework/zend-problem-details for the canonical source repository
 * @copyright Copyright (c) 2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-problem-details/blob/master/LICENSE.md New BSD License
 */

namespace ZendTest\ProblemDetails;

use PHPUnit\Framework\TestCase;
use Zend\ProblemDetails\ConfigProvider;
use Zend\ProblemDetails\ProblemDetailsMiddleware;
use Zend\ProblemDetails\ProblemDetailsResponseFactory;
use Zend\ServiceManager\ServiceManager;

class ConfigProviderTest extends TestCase
{
    public function testReturnsExpectedDependencies() : void
    {
        $provider = new ConfigProvider();
        $config = $provider();

        $serviceManger = new ServiceManager($config['dependencies']);

        $this->assertInstanceOf(ProblemDetailsResponseFactory::class, $serviceManger->get(ProblemDetailsResponseFactory::class));
        $this->assertInstanceOf(ProblemDetailsMiddleware::class, $serviceManger->get(ProblemDetailsMiddleware::class));
    }
}
