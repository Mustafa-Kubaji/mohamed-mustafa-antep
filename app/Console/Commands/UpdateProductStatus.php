<?php

namespace App\Console\Commands;

use App\Models\product;
use Illuminate\Console\Command;

class UpdateProductStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:product-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ürünlerin durumunu günceller';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*$products = product::all();

        foreach ($products as $product){
            $product->update([
                'status'=>true
            ]);
        }
        */

        $products = product::all();
        $products->each(function ($product){
            $product->update([
                'status'=>true
            ]);
        });



        return 0;
    }
}
