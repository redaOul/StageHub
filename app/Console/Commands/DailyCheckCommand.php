<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Demande;
use Carbon\Carbon;

class DailyCheckCommand extends Command
{
    protected $signature = 'daily:check';

    protected $description = 'Perform daily checks and update if conditions are met';

    public function handle()
    {
        // Get records where "date-fin-stage" has already passed
        $expiredDemands = Demande::where('date_fin_stage', '<', now())->get();

        // Update "etat" column to "success" for each expired record
        foreach ($expiredDemands as $demand) {
            $demand->update(['etat' => 'success']);
        }

        $this->info('Daily check completed successfully.');
    }
}
