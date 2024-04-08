<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AbsensiReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:absensi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SMS reminder to do absensi each day to every user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::query()
            ->whereDoesntHave('absensis', function ($q) {
                return $q->where('tanggal_absensi', '=', now()->format('Y-m-d'));
            });
    }
}
