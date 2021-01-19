<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NotificationController;

class SavingNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Saving Challenge Notification to all users who have not comply with their challenge for the week';

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
        $controller = new NotificationController();
        $controller->sendNotification();
    }
}
