<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $team_names = ["Aisvarya Adeseye", "Adeyemi Adeseye", "Benedicta Okosun", "Opeyemi Micheal", "Bukola Oloyede"];
        $team_roles = ["CEO", "COO", "Research Writer", "Research Writer", "Content Writer"];
        $team_genders = ["female", "male", "female", "male", "female"];

        for($i = 0; $i < count($team_names); $i++){
            
            $teammember = new TeamMember;
            $teammember->name = $team_names[$i];
            $teammember->role = $team_roles[$i];
            $teammember->gender = $team_genders[$i];
            $teammember->save();

        }
    }
}
