<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;



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
      view()->share('tabindex', 0);

      Blade::directive('dMy', function($fecha){
            return "<?php
              if($fecha)
              {
                echo \Date::parse($fecha)->format('d-M-y');
              }
            ?>"; //12-dic-17
      });

      Blade::directive('dmY', function($fecha){
        return "<?php if($fecha){ echo \Date::parse($fecha)->format('d-m-Y'); } ?>"; //12-01-2012
      });


      Blade::directive('linkYt', function($id){
        return "<?php
                    echo 'https://www.youtube.com/watch?v='.$id;
                ?>";
      });


      Blade::directive('embedYt', function($id){
        return "<?php
                    echo '<iframe src=https://www.youtube.com/embed/></iframe>';
                ?>";
      });


    }
}
