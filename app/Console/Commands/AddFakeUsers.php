<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Carbon\Carbon;


class AddFakeUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AddFake:Add-Fake-Users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To add fake users with faker';

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
        $FakeUsersNumber_string = $this->ask('How many fake user you need to insert in database');
        $FakeUsersNumber = (int)$FakeUsersNumber_string; 
        if (is_integer($FakeUsersNumber)  ) {
            $confirmation = $this->confirm('Do you agree to insert '.$FakeUsersNumber.' fake user in user table');

            if ($confirmation) {
                
                $choice = $this->choice('What language do you want user to be in ',['ar_SA','zh_TW','en_US']);

                $faker = Faker::create($choice);
                for ($i=1; $i <= $FakeUsersNumber; $i++) { 
                    \DB::table('users')->insert([
                        'name' => $faker->name,
                        'email' => $faker->email, 
                        'password' => bcrypt('secret'),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                }

                 $this->info('\n You add fake users successfully');
                 
            }
        }else{
            $this->error('please enter integer number');
        }
       

       
      

    }
}
