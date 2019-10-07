<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use DB;
class AddCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:category';

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
        Category::truncate();
        $emp = DB::connection('mysql2')->table('m_category')->select('*')->groupBy('code')->get()->toArray();
        $empArray = objectToArray($emp);
        $empInsert = [];
        $i = 0;
        //pr($empArray); die;
        foreach ($empArray as $key=>$val){
            $record = Category::create([
                'name'=>$val['name'],
                'name_l'=>$val['name'],
                'slug'=>str_slug($val['code']),
                'order'=>$val['order'],
                'old_id'=>$val['id'],
                'parent_id'=>$val['parent_id'],
                'status'=>$val['status_active'] == 'active' ? 1 : 0
            ]);
            if($val['shop_id'] == 0){
                $record->shops()->sync([1,2]);
            }else{
                $record->shops()->sync([$val['shop_id']]);
            }
        }
        $dt = Category::get();
        foreach ($dt as $key=>$val){
            Category::where('parent_id',$val['old_id'])->update(['parent_id'=>$val['id']]);
        }
    }
}
