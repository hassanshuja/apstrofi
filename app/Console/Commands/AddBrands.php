<?php

namespace App\Console\Commands;

use App\Models\Brand;
use Illuminate\Console\Command;
use DB;

class AddBrands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:brands';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        Brand::truncate();
        $emp = DB::connection('mysql2')->table('m_brand')->get()->toArray();
        $empArray = objectToArray($emp);
        $empInsert = [];
        $i = 0;
        //pr($empArray); die;
        foreach ($empArray as $key=>$val){
            $record = Brand::create([
                'name'=>$val['name'],
                'name_l'=>$val['name'],
                'code'=>str_slug($val['name']),
                'note'=>$val['note'],
                'status'=>$val['status_active'] == 'active' ? 1 : 0
            ]);
            $ids = DB::connection('mysql2')->table('m_shop_brand')->where('brand_id',$val['id'])->pluck('shop_id')->toArray();
            if(!empty($ids)){
                $record->shops()->sync($ids);
            }else{
                $record->shops()->sync([1,2]);
            }


        }
        echo 'done';
    }
}
