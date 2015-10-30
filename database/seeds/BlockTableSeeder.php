<?php

use Illuminate\Database\Seeder;
use App\Models\Block;

class BlockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Block::create(['module' => 'system', 'delta' => 'main', 'theme' => 'default', 'position' => 0, 'section' => 'content', 'visibility' => 1, 'pages' => '', 'title' => '', 'description' => 'Primary content', 'body' => '']);

    }
}
