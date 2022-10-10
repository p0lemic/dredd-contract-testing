<?php

declare(strict_types=1);

namespace App\Tests\Feature;

use GuzzleHttp\Psr7\Uri;
use PhpPact\Standalone\ProviderVerifier\Model\VerifierConfig;
use PhpPact\Standalone\ProviderVerifier\Verifier;
use PHPUnit\Framework\TestCase;

class ProductProviderTest extends TestCase
{
    public function testProductProducer()
    {
        $config = new VerifierConfig();
        $config->setProviderName('productApi') // Providers name to fetch.
        ->setProviderVersion('1.0.0') // Providers version.
        ->setProviderBaseUrl(new Uri('http://localhost:8000')) // URL of the Provider.
        ->setBrokerUri(new Uri('http://localhost:9292'))
            ->setPublishResults(true);

        $verifier = new Verifier($config);
        $verifier->verifyFiles([__DIR__ . "/../../pacts/product-web-product-api.json"]);

        // This will not be reached if the PACT verifier throws an error, otherwise it was successful.
        $this->assertTrue(true, 'Pact Verification has failed.');
    }
}
