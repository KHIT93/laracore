<?php

use App\Models\TextFilter;
use App\Libraries\StrFilter;
use Illuminate\Database\Seeder;

class TextFilterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TextFilter::create([
            'internal_name' => 'only_text',
            'name' => 'Only text',
            'description' => 'This text formatting filter does not allow any html tags. Html tags that are written in the textfield will be showed as text. This is normally used for comments and other content that is not authored by authorized users',
            'type' => StrFilter::PLAIN_TEXT,
            'weight' => 50
        ]);
        TextFilter::create([
            'internal_name' => 'restricted_html',
            'name' => 'Restricted HTML',
            'description' => 'This text formatting filter gives access to the usage of basic html tags that are commonly used by content authors',
            'type' => StrFilter::RESTRICTED_HTML,
            'allowed_tags' => '<a><b><blockquote><code><del><dd><dl><dt><em><h1><h2><h3><h4><h5><i><img><kbd><li><ol><p><pre><s><strong><ul><br><hr>',
            'weight' => 1
        ]);
        TextFilter::create([
            'internal_name' => 'full_html',
            'name' => 'Full HTML',
            'description' => 'This text formatting filter gives almost unrestricted access for writing HTML code',
            'type' => StrFilter::FULL_HTML,
            'weight' => 0
        ]);
    }
}
