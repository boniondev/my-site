<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('app:cleanup-expired-rate-limit-cache')]
#[Description('Delete expired rate limit entries')]
class CleanupExpiredRateLimitCache extends Command
{

    public function handle()
    {
        $n_deleted = DB::table(config('cache.stores.database.table'))->where('expiration', '<=', now()->timestamp)->delete();
        $this->info("Deleted " . $n_deleted . " entries.");
        return self::SUCCESS;
    }

}
