<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\Reaction;
use Database\Factories\IdeaFactory;
use Database\Factories\IdeasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reaction::factory()->count(50)->create();
        $reactions = Reaction::all();

        foreach ($reactions as $reaction) {
            $idea = Idea::factory()->make(['reactionID'=>$reaction->id]);
            $idea->save();
            // $idea->reactionID = $reaction->id;
            // $idea = DB::table('ideas')->insert($idea);
        }

        foreach(Idea::all() as $idea) {
            $re = Reaction::where('id', $idea->id)->first();
            $re->ideaID = $idea->id;
            $re->save();
            // DB::table('roles')->insert($reac
        }
    }
}
