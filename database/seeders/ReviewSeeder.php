<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            ['comment' => 'Excellent product!', 'product_id' => 51, 'rating' => 5, 'user_id' => 1],
            ['comment' => 'Very good, but could be better.', 'product_id' => 52, 'rating' => 4, 'user_id' => 2],
            ['comment' => 'It was okay.', 'product_id' => 56, 'rating' => 3, 'user_id' => 3],
            ['comment' => 'Not what I expected.', 'product_id' => 57, 'rating' => 2, 'user_id' => 4],
            ['comment' => 'Very disappointing.', 'product_id' => 60, 'rating' => 1, 'user_id' => 5],
            ['comment' => 'Amazing taste!', 'product_id' => 61, 'rating' => 5, 'user_id' => 6],
            ['comment' => 'Quite good, will buy again.', 'product_id' => 62, 'rating' => 4, 'user_id' => 7],
            ['comment' => 'It was decent.', 'product_id' => 63, 'rating' => 3, 'user_id' => 8],
            ['comment' => 'Not worth the price.', 'product_id' => 64, 'rating' => 2, 'user_id' => 9],
            ['comment' => 'Would not recommend.', 'product_id' => 65, 'rating' => 1, 'user_id' => 10],
            ['comment' => 'Exceeded my expectations!', 'product_id' => 66, 'rating' => 5, 'user_id' => 11],
            ['comment' => 'Very good overall.', 'product_id' => 67, 'rating' => 4, 'user_id' => 12],
            ['comment' => 'Satisfactory.', 'product_id' => 68, 'rating' => 3, 'user_id' => 13],
            ['comment' => 'Not great, not terrible.', 'product_id' => 69, 'rating' => 2, 'user_id' => 14],
            ['comment' => 'Terrible experience.', 'product_id' => 70, 'rating' => 1, 'user_id' => 15],
            ['comment' => 'Perfect!', 'product_id' => 71, 'rating' => 5, 'user_id' => 16],
            ['comment' => 'Very nice product.', 'product_id' => 72, 'rating' => 4, 'user_id' => 17],
            ['comment' => 'Average quality.', 'product_id' => 73, 'rating' => 3, 'user_id' => 18],
            ['comment' => 'Not as expected.', 'product_id' => 74, 'rating' => 2, 'user_id' => 19],
            ['comment' => 'Very poor quality.', 'product_id' => 75, 'rating' => 1, 'user_id' => 20],
            ['comment' => 'Good, but could be improved.', 'product_id' => 76, 'rating' => 4, 'user_id' => 1],
        ];

        foreach ($reviews as $review) {
            DB::table('reviews')->insert($review);
        }
    }
}
