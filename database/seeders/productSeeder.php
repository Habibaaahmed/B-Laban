<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Plain Rice Pudding', 'price' => 20.00, 'category_id' => 1, 'image' => 'plain_rice_pudding.jpg', 'description' => 'A classic rice pudding with a smooth texture and rich flavor.'],
            ['name' => 'Rice Pudding with Belgian Lotus', 'price' => 45.00, 'category_id' => 1, 'image' => 'rice_pudding_belgian_lotus.jpg', 'description' => 'Rice pudding topped with Belgian lotus biscuits.'],
            ['name' => 'Qashtouta Caramel', 'price' => 50.00, 'category_id' => 2, 'image' => 'qashtouta_caramel.jpg', 'description' => 'Sweet Qashtouta with a rich caramel flavor.'],
            ['name' => 'Qashtouta Lotus', 'price' => 70.00, 'category_id' => 2, 'image' => 'qashtouta_lotus.jpg', 'description' => 'Qashtouta enhanced with Lotus biscuit flavor.'],
            ['name' => 'Qashtouta Mango', 'price' => 65.00, 'category_id' => 2, 'image' => 'qashtouta_mango.jpg', 'description' => 'Qashtouta with a refreshing mango twist.'],
            ['name' => 'Rice Pudding with Qeshta & Nuts', 'price' => 55.00, 'category_id' => 1, 'image' => 'rice_pudding_qeshta_nuts.jpg', 'description' => 'Rice pudding with Qeshta and a mix of nuts.'],
            ['name' => 'Rice Pudding with Ice Cream', 'price' => 30.00, 'category_id' => 1, 'image' => 'rice_pudding_ice_cream.jpg', 'description' => 'A delightful combination of rice pudding and ice cream.'],
            ['name' => 'Oreo Nutella Koshary', 'price' => 55.00, 'category_id' => 5, 'image' => 'oreo_nutella_koshary.jpg', 'description' => 'Koshary with a unique blend of Oreo and Nutella flavors.'],
            ['name' => 'Om Ali with Qeshta and Nuts', 'price' => 65.00, 'category_id' => 4, 'image' => 'om_ali_qeshta_nuts.jpg', 'description' => 'Om Ali enriched with Qeshta and nuts.'],
            ['name' => 'Rice Pudding with Nuts', 'price' => 45.00, 'category_id' => 1, 'image' => 'rice_pudding_nuts.jpg', 'description' => 'Rice pudding topped with a variety of nuts.'],
            ['name' => 'Dopamine Rice Pudding', 'price' => 50.00, 'category_id' => 1, 'image' => 'dopamine_rice_pudding.jpg', 'description' => 'Rice pudding designed to boost your mood.'],
            ['name' => 'Serotonin Rice Pudding', 'price' => 55.00, 'category_id' => 1, 'image' => 'serotonin_rice_pudding.jpg', 'description' => 'Rice pudding to elevate your serotonin levels.'],
            ['name' => 'Adrenaline Rice Pudding', 'price' => 50.00, 'category_id' => 1, 'image' => 'adrenaline_rice_pudding.jpg', 'description' => 'A stimulating rice pudding for a quick boost.'],
            ['name' => 'El Sa\'ada Rice Pudding Plate', 'price' => 60.00, 'category_id' => 1, 'image' => 'el_saada_rice_pudding.jpg', 'description' => 'A special rice pudding plate from El Sa\'ada.'],
            ['name' => 'El Garema Rice Pudding', 'price' => 60.00, 'category_id' => 1, 'image' => 'el_garema_rice_pudding.jpg', 'description' => 'Rice pudding from El Garema with a unique taste.'],
            ['name' => 'Rice Pudding with Mango', 'price' => 45.00, 'category_id' => 1, 'image' => 'rice_pudding_mango.jpg', 'description' => 'Rice pudding infused with fresh mango.'],
            ['name' => 'Hazelnut Rice Pudding', 'price' => 65.00, 'category_id' => 1, 'image' => 'hazelnut_rice_pudding.jpg', 'description' => 'Rice pudding with a rich hazelnut flavor.'],
            ['name' => 'Kamen El Sherbeny Rice Pudding', 'price' => 65.00, 'category_id' => 1, 'image' => 'kamen_el_sherbeny_rice_pudding.jpg', 'description' => 'Special rice pudding from Kamen El Sherbeny.'],
            ['name' => 'Hazelnut Shakla\'a Rice Pudding', 'price' => 60.00, 'category_id' => 1, 'image' => 'hazelnut_shaklaa_rice_pudding.jpg', 'description' => 'Rice pudding with Hazelnut Shakla\'a.'],
            ['name' => 'Pistachio Rice Pudding', 'price' => 50.00, 'category_id' => 1, 'image' => 'pistachio_rice_pudding.jpg', 'description' => 'Rice pudding topped with pistachios.'],
            ['name' => 'Qonbela Rice Pudding', 'price' => 55.00, 'category_id' => 1, 'image' => 'qonbela_rice_pudding.jpg', 'description' => 'Rice pudding with a special Qonbela flavor.'],
            ['name' => 'Mango Qonbela Rice Pudding', 'price' => 70.00, 'category_id' => 1, 'image' => 'mango_qonbela_rice_pudding.jpg', 'description' => 'Rice pudding with Mango and Qonbela.'],
            ['name' => 'Ice Cream Cup', 'price' => 15.00, 'category_id' => 3, 'image' => 'ice_cream_cup.jpg', 'description' => 'A simple cup of delicious ice cream.'],
            ['name' => 'Pistachio & Hazelnut Ice Cream Small Cup', 'price' => 35.00, 'category_id' => 3, 'image' => 'pistachio_hazelnut_ice_cream.jpg', 'description' => 'Small cup of pistachio and hazelnut ice cream.'],
            ['name' => 'Cone Ice Cream', 'price' => 25.00, 'category_id' => 3, 'image' => 'cone_ice_cream.jpg', 'description' => 'Ice cream served in a cone.'],
            ['name' => 'Pistachio Cone Ice Cream', 'price' => 40.00, 'category_id' => 3, 'image' => 'pistachio_cone_ice_cream.jpg', 'description' => 'Pistachio ice cream in a cone.'],
            ['name' => 'Mesahab Ice Cream', 'price' => 80.00, 'category_id' => 3, 'image' => 'mesahab_ice_cream.jpg', 'description' => 'A special Mesahab ice cream with a unique flavor.'],
            ['name' => 'Qashtouta Ice Cream', 'price' => 70.00, 'category_id' => 3, 'image' => 'qashtouta_ice_cream.jpg', 'description' => 'Ice cream with Qashtouta flavor.'],
            ['name' => 'Om Ali with Qeshta', 'price' => 45.00, 'category_id' => 4, 'image' => 'om_ali_qeshta.jpg', 'description' => 'Om Ali dessert with Qeshta.'],
            ['name' => 'Om Ali with Nuts', 'price' => 55.00, 'category_id' => 4, 'image' => 'om_ali_nuts.jpg', 'description' => 'Om Ali dessert with a variety of nuts.'],
            ['name' => 'Om Ali Baraka Tagen', 'price' => 65.00, 'category_id' => 4, 'image' => 'om_ali_baraka_tagen.jpg', 'description' => 'Om Ali served in a traditional Baraka Tagen.'],
            ['name' => 'Om Ali Koshary', 'price' => 70.00, 'category_id' => 4, 'image' => 'om_ali_koshary.jpg', 'description' => 'Om Ali combined with Koshary.'],
            ['name' => 'Om Ali Mixed Nuts', 'price' => 65.00, 'category_id' => 4, 'image' => 'om_ali_mixed_nuts.jpg', 'description' => 'Om Ali dessert with mixed nuts.'],
            ['name' => 'Om Ali with Nutella', 'price' => 55.00, 'category_id' => 4, 'image' => 'om_ali_nutella.jpg', 'description' => 'Om Ali dessert topped with Nutella.'],
            ['name' => 'Cassata with Strawberries', 'price' => 70.00, 'category_id' => 6, 'image' => 'cassata_strawberries.jpg', 'description' => 'Cassata ice cream with fresh strawberries.'],
            ['name' => 'Cassata with Nuts', 'price' => 65.00, 'category_id' => 6, 'image' => 'cassata_nuts.jpg', 'description' => 'Cassata ice cream topped with nuts.'],
            ['name' => 'Cassata with Chocolate', 'price' => 75.00, 'category_id' => 6, 'image' => 'cassata_chocolate.jpg', 'description' => 'Cassata ice cream with a rich chocolate flavor.'],
            ['name' => 'Cassata Tropical Fruits', 'price' => 80.00, 'category_id' => 6, 'image' => 'cassata_tropical_fruits.jpg', 'description' => 'Cassata ice cream with tropical fruits.'],
            ['name' => 'Creme Brulee Caramel', 'price' => 55.00, 'category_id' => 8, 'image' => 'creme_brulee_caramel.jpg', 'description' => 'Creme brulee with a caramel topping.'],
            ['name' => 'Creme Brulee Vanilla', 'price' => 50.00, 'category_id' => 8, 'image' => 'creme_brulee_vanilla.jpg', 'description' => 'Vanilla-flavored creme brulee.'],
            ['name' => 'Creme Brulee Chocolate', 'price' => 60.00, 'category_id' => 8, 'image' => 'creme_brulee_chocolate.jpg', 'description' => 'Creme brulee with a rich chocolate flavor.'],
            ['name' => 'Creme Brulee Nuts', 'price' => 65.00, 'category_id' => 8, 'image' => 'creme_brulee_nuts.jpg', 'description' => 'Creme brulee topped with nuts.'],
            ['name' => 'Salankate with Pistachio', 'price' => 65.00, 'category_id' => 7, 'image' => 'salankate_pistachio.jpg', 'description' => 'Salankate with a pistachio flavor.'],
            ['name' => 'Salankate with Dates', 'price' => 70.00, 'category_id' => 7, 'image' => 'salankate_dates.jpg', 'description' => 'Salankate featuring sweet dates.'],
            ['name' => 'Salankate Mixed Nuts', 'price' => 75.00, 'category_id' => 7, 'image' => 'salankate_mixed_nuts.jpg', 'description' => 'Salankate with a mix of nuts.'],
            ['name' => 'Salankate with Qeshta', 'price' => 70.00, 'category_id' => 7, 'image' => 'salankate_qeshta.jpg', 'description' => 'Salankate with Qeshta.'],
            ['name' => 'Salankate with Honey', 'price' => 65.00, 'category_id' => 7, 'image' => 'salankate_honey.jpg', 'description' => 'Salankate sweetened with honey.'],
            ['name' => 'Salankate with Lotus', 'price' => 75.00, 'category_id' => 7, 'image' => 'salankate_lotus.jpg', 'description' => 'Salankate featuring Lotus biscuit flavor.'],
            ['name' => 'Chocolate Extras', 'price' => 10.00, 'category_id' => 9, 'image' => 'chocolate_extras.jpg', 'description' => 'Chocolate extras to complement your desserts.'],
            ['name' => 'Sweet Extras', 'price' => 12.00, 'category_id' => 9, 'image' => 'sweet_extras.jpg', 'description' => 'Various sweet extras for an added touch.'],
        ]);
    }
}
