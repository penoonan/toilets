<?php namespace Toilets\Jobs;

use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Toilets\Models\Business;

class SetBusinessLatLong extends Job implements SelfHandling, ShouldQueue
{
    /**
     * @var Business
     */
    private $business;
    /**
     * @var Client
     */
    private $guzzle;

    /**
     * Create a new job instance.
     * @param Business $business
     * @param Client $guzzle
     */
    public function __construct(Business $business, Client $guzzle)
    {
        $this->business = $business;
        $this->guzzle = $guzzle;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $biz = $this->business;
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$biz->address;
        $result = $this->guzzle->get($url);

        dd($result);

        $result = json_decode($result->getBody()->getContents());
        $location = $result->results->geometry->location;
        $biz->latitude = $location->lat;
        $biz->longitude = $location->lng;

        $biz->save();
    }
}
