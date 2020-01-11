<?php

namespace App\Providers;

use App\Absen;
use App\Jadwal;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        view()->composer(['layouts.header'], function ($view) {

            $absen = Absen::whereNotNull('jumlah')->where('status', 0)->where('tgl', Carbon::now()->format('d-m-Y'))->count();
            $minute = Absen::whereNotNull('jumlah')->where('tgl', Carbon::now()->format('d-m-Y'))->latest()->first();
            if (!$absen) {
                $absen = null;
            }
            if ($minute) {
                $formatMinute = Carbon::createFromTimeStamp(strtotime($minute->updated_at))->diffForHumans();
            } else {
                $formatMinute = null;
            }
            $data = [
                'absen' => $absen,
                'minute' => $formatMinute
            ];
            $view->with($data);
        });
    }
}
