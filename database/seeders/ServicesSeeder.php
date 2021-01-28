<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $services_names = ["Market & Customer Research", "Business Research & Writing", "Process & Product Evaluation"];
        $services_short_descriptions = ["Anim consequat Lorem cillum elit laborum voluptate tempor consectetur cupidatat eiusmod.", "Anim consequat Lorem cillum elit laborum voluptate tempor consectetur cupidatat eiusmod 2.", "Anim consequat Lorem cillum elit laborum voluptate tempor consectetur cupidatat eiusmod 3."];
        $services_full_descriptions = ["Dolor sit pariatur ipsum duis pariatur. Id anim mollit cillum nulla ad sunt. Est cillum sunt tempor deserunt aliquip. Et irure enim sint enim est eu ipsum nulla dolor deserunt id nostrud duis irure. Deserunt do nisi nulla ut cillum id cillum id esse exercitation non. Dolor est exercitation exercitation aute mollit nostrud 1.", "Dolor sit pariatur ipsum duis pariatur. Id anim mollit cillum nulla ad sunt. Est cillum sunt tempor deserunt aliquip. Et irure enim sint enim est eu ipsum nulla dolor deserunt id nostrud duis irure. Deserunt do nisi nulla ut cillum id cillum id esse exercitation non. Dolor est exercitation exercitation aute mollit nostrud 2.", "Dolor sit pariatur ipsum duis pariatur. Id anim mollit cillum nulla ad sunt. Est cillum sunt tempor deserunt aliquip. Et irure enim sint enim est eu ipsum nulla dolor deserunt id nostrud duis irure. Deserunt do nisi nulla ut cillum id cillum id esse exercitation non. Dolor est exercitation exercitation aute mollit nostrud 3."];
        $services_slugs = ["Market-Customer-Research", "Business-Research-Writing", "Process-Product-Evaluation"];
        $services_meta_titles = ["Title: Market-Customer-Research", "Title: Business-Research-Writing", "Title: Process-Product-Evaluation"];
        $services_meta_descriptions = ["Description: Market-Customer-Research", "Description: Business-Research-Writing", "Description: Process-Product-Evaluation"];

        for($i = 0; $i < count($services_names); $i++){
            $service = new Service;
            $service->name = $services_names[$i];
            $service->short_description = $services_short_descriptions[$i];
            $service->full_description = $services_full_descriptions[$i];
            $service->slug = $services_slugs[$i];
            $service->meta_title = $services_meta_titles[$i];
            $service->meta_description = $services_meta_descriptions[$i];
            $service->save();
        }

    }
}
