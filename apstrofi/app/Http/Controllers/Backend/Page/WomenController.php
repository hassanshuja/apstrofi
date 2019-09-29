<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\PageBuilder;


class WomenController extends Controller{

    public function index()
    {
        $page = PageBuilder::where('slug','women')->first();
        if(!empty($page)){
            if ($page['section_1']){
                $page['section_1'] = json_decode($page['section_1'],true);
            }else{
                $page['section_1'] = [];
            }
            if ($page['section_2']){
                $page['section_2'] = json_decode($page['section_2'],true);
            }else{
                $page['section_2'] = [];
            }
            if ($page['section_3']){
                $page['section_3'] = json_decode($page['section_3'],true);
            }else{
                $page['section_3'] = [];
            }
        }

        return view('backend.page.women.index', ['page_title' => 'Women Page Management','page'=>$page]);
    }


    public function storeSection1(){
        $data = request()->all();
        $niceNames = [
            'section_1.button_text' => 'Button Text',
            'section_1.button_text_l' => 'Button Text local',
            'section_1.button_color'=> 'Button Color',
            'section_1.redirect_link'=> 'Url',
            /*'section_1.*.image_url'=> 'Image',*/
        ];
        $this->validate(request(), [
            'section_1.button_text' => 'required',
            'section_1.button_text_l' => 'required',
            'section_1.button_color'=> 'required',
            'section_1.redirect_link'=> 'required',
            /*'section_1.*.image_url'=> 'required',*/
        ],[], $niceNames);
        if(isset($data['section_1']['image_url']) && !empty($data['section_1']['image_url'])) {
            $file = $data['section_1']['image_url'];
            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $file->getClientOriginalExtension();

            //filename to store
            $filenametostore = time().'.'.$extension;

            //Upload File
            $image_url = $file->storePubliclyAs('images/page/women', $filenametostore);
            $data['section_1']['image_url']= 'storage/'.$image_url;
        }else{
            if (isset($data['section_1']['image_url1'])){
                $data['section_1']['image_url']= $data['section_1']['image_url1'];
                unset($data['section_1']['image_url1']);
            }else{
                $data['section_1']['image_url']= '';
            }
        }
        if(isset($data['section_1']['mobile_image_url']) && !empty($data['section_1']['mobile_image_url'])) {
            $file = $data['section_1']['mobile_image_url'];
            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $file->getClientOriginalExtension();

            //filename to store
            $filenametostore = time().'.'.$extension;

            //Upload File
            $image_url = $file->storePubliclyAs('images/page/women', $filenametostore);
            $data['section_1']['mobile_image_url']= 'storage/'.$image_url;
        }else{
            if (isset($data['section_1']['mobile_image_url1'])){
                $data['section_1']['mobile_image_url']= $data['section_1']['mobile_image_url1'];
                unset($data['section_1']['mobile_image_url1']);
            }else{
                $data['section_1']['mobile_image_url']= '';
            }
        }
        PageBuilder::updateOrCreate(['slug'=>'women'],['section_1'=>json_encode($data['section_1'])]);
    }

    public function storeSection2(){
        $data = request()->all();
        $niceNames = [
            'section_2.button_text' => 'Button Text',
            'section_2.button_text_l' => 'Button Text local',
            'section_2.button_color'=> 'Button Color',
            'section_2.redirect_link'=> 'Url',
            /*'section_1.*.image_url'=> 'Image',*/
        ];
        $this->validate(request(), [
            'section_2.button_text' => 'required',
            'section_2.button_text_l' => 'required',
            'section_2.button_color'=> 'required',
            'section_2.redirect_link'=> 'required',
            /*'section_1.*.image_url'=> 'required',*/
        ],[], $niceNames);
        if(isset($data['section_2']['image_url']) && !empty($data['section_2']['image_url'])) {
            $file = $data['section_2']['image_url'];
            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $file->getClientOriginalExtension();

            //filename to store
            $filenametostore = time().'.'.$extension;

            //Upload File
            $image_url = $file->storePubliclyAs('images/page/women', $filenametostore);
            $data['section_2']['image_url']= 'storage/'.$image_url;
        }else{
            if (isset($data['section_2']['image_url1'])){
                $data['section_2']['image_url']= $data['section_2']['image_url1'];
                unset($data['section_2']['image_url1']);
            }else{
                $data['section_2']['image_url']= '';
            }
        }
        PageBuilder::updateOrCreate(['slug'=>'women'],['section_2'=>json_encode($data['section_2'])]);
    }

    public function storeSection3(){
        $data = request()->all();
        $niceNames = [
            'section_3.button_text' => 'Button Text',
            'section_3.button_text_l' => 'Button Text local',
            'section_3.button_color'=> 'Button Color',
            'section_3.redirect_link'=> 'Url',
            /*'section_1.*.image_url'=> 'Image',*/
        ];
        $this->validate(request(), [
            'section_3.button_text' => 'required',
            'section_3.button_text_l' => 'required',
            'section_3.button_color'=> 'required',
            'section_3.redirect_link'=> 'required',
            /*'section_1.*.image_url'=> 'required',*/
        ],[], $niceNames);
        if(isset($data['section_3']['image_url']) && !empty($data['section_3']['image_url'])) {
            $file = $data['section_3']['image_url'];
            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $file->getClientOriginalExtension();

            //filename to store
            $filenametostore = time().'.'.$extension;

            //Upload File
            $image_url = $file->storePubliclyAs('images/page/women', $filenametostore);
            $data['section_3']['image_url']= 'storage/'.$image_url;
        }else{
            if (isset($data['section_3']['image_url1'])){
                $data['section_3']['image_url']= $data['section_3']['image_url1'];
                unset($data['section_3']['image_url1']);
            }else{
                $data['section_3']['image_url']= '';
            }
        }
        PageBuilder::updateOrCreate(['slug'=>'women'],['section_3'=>json_encode($data['section_3'])]);
    }
}