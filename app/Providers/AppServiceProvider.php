<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use View;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });
        if(Schema::hasTable('tabel_setting')){
            view()->share('app_name', $this->getSetting('app_name'));
            view()->share('latitude_centre', $this->getSetting('latitude_centre'));
            view()->share('longitude_centre', $this->getSetting('longitude_centre'));
            view()->share('set_zoom', $this->getSetting('set_zoom'));
            view()->share('gmaps_api_key', $this->getSetting('gmaps_api_key'));
        }
        Schema::defaultStringLength(191);
    }

    public function getSetting($nama)
    {
        $data = Setting::where('nama',$nama)->first();
        if($data==null){
            return null;
        }else{
            return $data->value;
        }
    }
}
