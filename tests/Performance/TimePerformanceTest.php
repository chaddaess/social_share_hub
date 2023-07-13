<?php

namespace App\Tests\Performance;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class TimePerformanceTest extends WebTestCase
{
    public function testSocialMediaRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/socialmedia');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }

    }

    public function testPostRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/post');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }
    }

    public function testArchiveRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/archive');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }

    }

    public function testLoginRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/login');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }

    }

    public function testRegisterRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/register');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }

    }
    public function testFacebookLoginRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/facebook/login');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }

    }

    public function testLinkedinLoginRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/linkedin/login');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }

    }

    public function testTwitterLoginRedirectTimeUnder500()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $request = new Request();
        $request->setSession(new Session());
        $session = $request->getSession();
        $crawler = $client->request('GET', '/twitter/login');
        if ($profile = $client->getProfile()) {
            // check the number of requests
            $this->assertLessThan(
                500, $profile->getCollector('time')->getDuration()
            );
        }

    }
}