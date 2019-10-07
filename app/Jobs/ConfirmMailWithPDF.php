<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Mail\Mailer;
use PDF;
class ConfirmMailWithPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    /*public function handle()
    {
        Mail::to('shrenik@creative-hustlers.com')->send(new SendMailable());
    }*/
    public function handle(Mailer $mailer)
    {
        $value = $this->data;
        $s3 = \Storage::disk('public');
        $pdf = PDF::loadView('pdf.invoice', ['booking'=>$value['booking'],'type'=>$value['type']]);
        $s3->put($value['file_path'], $pdf->output(),'public');
        unset($value['booking']);
        $view = view($value['view'],['data'=>$value])->render();
        try{
            $mailer->send('emails.send-mail', ['data'=>$view], function ($message) use($value){
                $message->to($value['email']);
                $message->subject($value['subject']);
                $size = isset($value['attachment']) ? sizeOf($value['attachment']) : 0; //get the count of number of attachments

                for( $i=0; $i<$size; $i++ ){
                    $message->attach($value['attachment'][$i]); // change i to $i
                }
            });
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
