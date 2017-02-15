<?php

namespace App\Jobs;

use Nova\Bus\QueueableTrait as Queueable;


abstract class Job
{
    /*
    |--------------------------------------------------------------------------
    | Queueable Jobs
    |--------------------------------------------------------------------------
    |
    | This job base class provides a central location to place any logic that
    | is shared across all of your jobs. The trait included with the class
    | provides access to the "delay" queue helper method.
    |
    */

    use Queueable;
}
