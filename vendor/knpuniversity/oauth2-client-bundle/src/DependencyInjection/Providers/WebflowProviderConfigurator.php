<?php

/*
 * OAuth2 Client Bundle
 * Copyright (c) KnpUniversity <http://knpuniversity.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KnpU\OAuth2ClientBundle\DependencyInjection\Providers;

use KnpU\OAuth2ClientBundle\Client\Provider\WebflowClient;
use Koalati\OAuth2\Client\Provider\Webflow;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

class WebflowProviderConfigurator implements ProviderConfiguratorInterface
{
    public function buildConfiguration(NodeBuilder $node)
    {
        // no custom options
    }

    public function getProviderClass(array $config)
    {
        return Webflow::class;
    }

    public function getProviderOptions(array $config)
    {
        return [
            'clientId' => $config['client_id'],
            'clientSecret' => $config['client_secret'],
        ];
    }

    public function getPackagistName()
    {
        return 'koalati/oauth2-webflow';
    }

    public function getLibraryHomepage()
    {
        return 'https://github.com/koalatiapp/oauth2-webflow';
    }

    public function getProviderDisplayName()
    {
        return 'Webflow';
    }

    public function getClientClass(array $config)
    {
        return WebflowClient::class;
    }
}
