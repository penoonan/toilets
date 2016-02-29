<?php

use GuzzleHttp\Client;
use Mockery as m;
use Toilets\Jobs\SetBusinessLatLong;
use Toilets\Models\Business;

class SetBusinessLatLongTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Toilets\Jobs\SetBusinessLatLong
     */
    protected $job;

    /**
     * @var Toilets\Models\Business
     */
    protected $business;

    /**
     * @var GuzzleHttp\Client
     */
    protected $client;

    public function setUp()
    {
        $this->business = m::mock(Business::class);
//        $this->client = m::mock(Client::class);
        $this->client = new Client();

        $this->job = new SetBusinessLatLong($this->business, $this->client);
    }

    public function test_it_instantiates()
    {
        $this->assertInstanceOf(SetBusinessLatLong::class, $this->job);
    }

    public function test_it_gets_address()
    {
        $this->job->handle();

    }

    public function tearDown()
    {
        unset($this->job, $this->business, $this->client);
    }

}