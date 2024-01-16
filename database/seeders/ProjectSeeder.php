<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('db.projects');
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->image = ProjectSeeder::storeimage($project['image'], $project['title']);
            $newProject->title = $project['title'];
            $newProject->body = $project['body'];
            $newProject->url = $project['url'];
            $newProject->user_id = 1;
            $newProject->slug = Str::slug($project['title'], '-');
            $newProject->save();
        }
    }

    public static function storeimage($image, $title)
    {
        $url = $image;
        $contents = file_get_contents($url);

        $title = Str::slug($title, '-') . '.jpg';
        $path = 'images/' . $title;
        Storage::put('images/' . $title, $contents);
        return $path;
    }
}
