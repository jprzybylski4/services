<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;



use Eventjuicer\Services\Resolver;
use Eventjuicer\Services\GetByRole;
use Eventjuicer\Jobs\GeneralExhibitorMessageJob as Job;
use Eventjuicer\Services\Revivers\ParticipantSendable;
use Eventjuicer\Services\CompanyData;

use Eventjuicer\ValueObjects\EmailAddress;
use Eventjuicer\Services\SaveOrder;
use Eventjuicer\Models\Participant;


class FixReps extends Command
{

 
    protected $signature = 'exhibitors:fixreps

        {--domain=} 
       
       ';
    
    protected $description = 'Check and fix representatives';
 
    public function __construct()
    {
        parent::__construct();
    }
 
    public function handle(GetByRole $repo, CompanyData $cd, SaveOrder $saveorder)
    {
       
        $domain     = $this->option("domain");
       
        $errors = [];

        if(empty($domain)) {
            $errors[] = "--domain= must be set!";
        }


        if(count($errors)){
            foreach($errors as $error){
                $this->error($error);
            }
            return;
        }
      

        /**
            LET'S FUCKING START!
        **/


        $route = new Resolver( $domain );

        $eventId =  $route->getEventId();

        $this->info("Event id: " . $eventId);

        $representatives = $repo->get($eventId, "representative");

        $this->info("Number of representatives: " . $representatives->count() );

        $done = 0;

        foreach($representatives as $rep)
        {
            //do we have company assigned?

            if(is_null($rep->parent))
            {
                $this->error("No PARENT assigned for " . $rep->email . " - skipped.");
                continue;
            }

            if($rep->parent->event_id != $eventId){
                $this->error("Bad parent!!!" . $rep->email . " - skipped.");
                continue;
            }

            // $companyProfile = $cd->toArray($ex->company);

            // $name = $companyProfile["name"];

            // if(strlen($name)<2){
            //     $this->error("No company name for " . $ex->email . " - skipped.");
            //     continue;
            // }

            // $saveorder->setParticipant($ex);

            // $saveorder->setFields(["cname2" => $name]);

            // $saveorder->updateFields();

            $done++;

        }   

        $this->info("Total fixed " . $done . "");


    }
}
