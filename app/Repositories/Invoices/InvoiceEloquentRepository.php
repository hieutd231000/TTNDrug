<?php

namespace App\Repositories\Invoices;

use App\Models\Invoices;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class InvoiceEloquentRepository extends EloquentRepository implements  InvoiceRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Invoices::class;
    }

    /**
     * @param $selectYear
     * @return int
     */
    public function getRevenue($selectYear)
    {
        $invoices = DB::table("invoices")
            ->select()
            ->get();
        $sumTotal = 0;
        foreach ($invoices as $invoice) {
            if(!is_null($invoice->created_at)) {
                $invoiceTime = explode(" ", $invoice->created_at);
                $invoiceDate = explode("-", $invoiceTime[0]);
                if($invoiceDate[0] == $selectYear)
                    $sumTotal += (int) $invoice->money;
            }
        }
        return $sumTotal;
    }

    /**
     * @return array
     */
    public function getProfitIn10Years() {
        //Khoang cach so ngay giua ngay hien tai va 10 nam truoc
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date('Y-m-d', time());
        $currentDates = explode("-", $currentDate);
        $date10yAgo = strval((int)$currentDates[0] - 10)."-".$currentDates[1]."-".$currentDate[2];
        $diff1 = strtotime($currentDate) - strtotime($date10yAgo);
        $betweenDate1 = abs(round($diff1 / 86400));
        //Tao array
        $profitByDay = array_fill(0, $betweenDate1 + 1, 0);
        $invoices = DB::table("invoices")
            ->select()
            ->get();
        foreach ($invoices as $invoice) {
            if(!is_null($invoice->created_at)) {
                $invoiceTime = explode(" ", $invoice->created_at);
                // 1 day = 24 hours
                // 24 * 60 * 60 = 86400 seconds
                $diff = strtotime($currentDate) - strtotime($invoiceTime[0]);
                $betweenDate = abs(round($diff / 86400));
                //TotalPrice
                $profitByDay[sizeof($profitByDay) - $betweenDate - 1] += (int)$invoice->money;
            }
        }
        return $profitByDay;
    }

    public function dateDiffInDays($date1, $date2) {
        $diff = strtotime($date2) - strtotime($date1);
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }
}
