<?php
namespace App\Providers;

use App\Console\Commands\ParserAvitoPageCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('parser.avito.page', function() {
            return new ParserAvitoPageCommand();
        });


        $this->commands([
            'parser.avito.page'
        ]);
    }
}