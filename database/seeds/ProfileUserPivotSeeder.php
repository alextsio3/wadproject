<?php

use Illuminate\Database\Seeder;

class ProfileUserPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get array of ids
        $userIds = DB::table('users')->pluck('id')->all();
        $profileIds = DB::table('profiles')->pluck('id')->all();

        //seed
        foreach ((range(1,40)) as $index){
            DB::table('profile_user')->insert(
                [
                'profile_id' => $profileIds[array_rand($profileIds)],
                'user_id' => $userIds[array_rand($userIds)]
            ]
        );

        }
    }
}
