<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Leave;
use PDF;
use Dompdf\Dompdf;


class SendLeaveReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:send-leave-list';
    protected $description = 'Send daily leave list report to admin';


    /**
     * The console command description.
     *
     * @var string
     */


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $leaveList = Leave::orderBy('created_at', 'desc')->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('reports.leave_list', ['leaveList' => $leaveList])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        \Mail::raw('Daily Leave List Report', function ($message) use ($pdf) {
            $message->to('akashparikkal08@gmail.com');
            $message->subject('Daily Leave List Report');
            $message->attachData($pdf->output(), 'leave_list_report.pdf', [
                'mime' => 'application/pdf',
            ]);
        });

        $this->info('Daily Leave List Report Sent Successfully.');
    }
}
