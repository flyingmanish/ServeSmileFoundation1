<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class WordOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {

        $message_data = ["email"=>"buntyshirke22@gmail.com"];
         Mail::send('Test', [ 'message_data' => $message_data], function ($message) use($message_data)
         {
            $message->from('akashb.m786@gmail.com');
            $message->to($message_data['email'])->subject('this mail for job regarding');
        }); 
    }
}
