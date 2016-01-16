<?php

namespace Toilets\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';

    protected static $unguarded = true;

    // activity types are registered as constants
    // user types are prefixed with 1,
    // business types are prefixed with 2, etc...
    CONST user_registered = 10;
    CONST user_flagged_business = 11;
    CONST user_sent_business_message = 12;

    CONST business_was_flagged = 20;
    CONST business_status_changed = 21;
    CONST business_was_sent_user_message = 22;


    public function subject()
    {
        return $this->morphTo();
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * @return string
     */
    public function render()
    {
        switch ($this->description) {
            case self::user_flagged_business:
                return $this->renderUserFlaggedBusiness();
                break;
            default:
                return 'you did an activity';
        }
    }


    public function renderUserSentBusinessMessage()
    {
    }

    protected function renderUserFlaggedBusiness()
    {
        return 'You flagged a business called "'.$this->data->input->name.'"" on '. (new Carbon($this->created_at))->toFormattedDateString();
    }
}
