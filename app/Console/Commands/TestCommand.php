<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\User;
use App\Models\VacancyTest;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sandbox:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        User::query()->get()->dd();
//
//        User::query()->create([
//            'name' => 'John',
//            'email' => 'dev@gmail.com',
//            'password' => 'Pass123',
//        ]);

        User::factory(5, [])->create();
        dd();

        $user = User::find(1);

        $company = new Company;
        $company->name = 'test';
        $company->website = 'test.en';

//        $company->user()->associate($user);
        $company->save();


//
//        User::query()
//            ->where('email', 'dev@gmail.com')
//            ->firstOrFail();

//        VacancyTest::query()->create([
//            'company' => 'pentalog',
//            'position' => 'developer',
//        ]);



        return 0;
    }
}
