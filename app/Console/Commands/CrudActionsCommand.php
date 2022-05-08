<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\CrudActions;
use Illuminate\Console\Command;

class CrudActionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:actions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return number of execute CRUD actions while 13.33h last.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $actions = CrudActions::where('object_type', 'App\Models\Post')
            ->orWhere('object_type', 'App\Models\Comment')
            ->where('created_at', '>=', Carbon::now()->subHour(13)->subMinutes(33))
            ->get();

        $getActionCount = $actions->filter(function ($item) {
            return $item['action'] == 'GET';
        })->count();

        $postActionCount = $actions->filter(function ($item) {
            return $item['action'] == 'POST';
        })->count();

        $putActionCount = $actions->filter(function ($item) {
            return $item['action'] == 'PUT';
        })->count();

        $deleteActionCount = $actions->filter(function ($item) {
            return $item['action'] == 'DELETE';
        })->count();

        $this->info('Ilość wykonanych akcji typu CRUD: '.$actions->count().' (GET '.$getActionCount.', POST '.$postActionCount.', PUT '.$putActionCount.', DELETE '.$deleteActionCount.').');
    }
}
