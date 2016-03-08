<?php
namespace App\Console\Commands;


use App\Component\Sms;
use App\Models\Notification\AnswerSend;
use App\Models\Notification\Phone;
use App\Models\Product\Answer;
use App\Services\LoadPageService;
use Illuminate\Console\Command;

class ParserAvitoPageCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'parser:avito:page';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load page for target';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        try {
            (new LoadPageService())->run();
        } catch (\Exception $e) {
            $this->info("ERROR :" . $e->getMessage());
        }

        // TODO: сделать логирование monolog
        $this->info("INFO: worke ready");
    }
}