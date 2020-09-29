<?php

namespace App\Console\Commands;

use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChangeStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will Change Your Election Status.';

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
        $elections = DB::table('elections')->where('date', '=', date("Y/m/d"))->get();
        foreach ($elections as $election){
            if ($election->current_status === 'coming'){

                DB::table('elections')
                    ->where('id', '=', $election->id)
                    ->update(['current_status' => 'running']);
                $sub_elections = DB::table('sub_elections')->where('election_id', '=', $election->id)->get();
                foreach ($sub_elections as $sub_election) {
                    DB::table('sub_elections')
                        ->where('id', '=', $sub_election->id)
                        ->update(['current_status' => 'running']);
                }
            }
        }

        $elections = DB::table('elections')->where('ending_date', '=', date("Y/m/d"))->get();
        foreach ($elections as $election){
            if ($election->current_status === 'running'){
                DB::table('elections')
                    ->where('id', '=', $election->id)
                    ->update(['current_status' => 'done']);

                $sub_elections = DB::table('sub_elections')->where('election_id', '=', $election->id)->get();
                foreach ($sub_elections as $sub_election) {
                    DB::table('sub_elections')
                        ->where('id', '=', $sub_election->id)
                        ->update(['current_status' => 'done']);
                }
            }
        }
    }

}
