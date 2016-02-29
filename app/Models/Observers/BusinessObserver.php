<?php namespace Toilets\Models\Observers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Toilets\Models\Business;

class BusinessObserver
{
    use DispatchesJobs;

    public function saving(Business $business)
    {
        $address_changed = in_array('address', $business->getDirty());

    }



}