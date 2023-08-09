<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $sql = public_path('db/db.sql');
//
//        $db = [
//            'username' => env('DB_USERNAME'),
//            'password' => env('DB_PASSWORD'),
//            'host' => env('DB_HOST'),
//            'database' => env('DB_DATABASE')
//        ];
//
//        exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sql");

        //DB Products
//        $route_of_use = array("Tiêm", "Đường hô hấp", "Uống", "Đặt trực tràng", "Dùng ngoài", "Tiêm truyền", "Nhỏ mắt", "Đặt dưới lưỡi", "Đường hô hấp");
//        $dosage = array("Dung dịch", "Khí hóa lỏng", "Viên", "Viên nén", "Viên đạn", "Bột pha dung dịch", "Bột pha tiêm", "Siro", "Hỗn dịch", "Ống thụt", "Miếng dán");
//        $content = array("400 mg", "200mg", "Từ 0,62 đến 0,74g/ml", "187g/100ml", "0.1mg/2ml", "0.25mg/ml", "1mg/72 giờ", "1.000.000 IU", "500.000 lU", "0,25%, 0,5%", "50mg/ml");
//        $instruction = array("Đối với hầu hết bệnh nhân,liều khởi đầu được khuyên dùng là 5mg-20mg, uống 1 lần/ngày. Với một vài bệnh nhân thì nên dùng liều khởi đầu thấp hơn.
//", "Người bệnh cần uống thuốc trước khi ăn ít nhất một giờ lúc bụng đói. Liều thường dùng là 1 viên/lần nhưng đôi khi có thể tăng lên 2 viên/lần, uống ba lần mỗi ngày nhưng không quá 150mg (tức 6 viên thuốc Mildocap) trong một ngày.", "Adrenaline thường được chỉ định trong những trường hợp cấp cứu khẩn cấp với liều ban đầu là 15 mg.Tác dụng chủ yếu của nó là kích thích vận chuyển máu về tim (thuốc trợ tim). Trong trường hợp khi tiêm một liều 15 mg mà kết quả không đạt được như mong muốn thì sẽ phải tiêm nhiều mũi khác với mỗi mũi tiêm cách nhau 15 phút.chỉ định: cấp cứu sốc phản vệ, suy tim, ngừng tim, tai biến mạch máu não.", "Thuốc Dimedrol có dạng tiêm với hàm lượng 1 ml. Liều dùng của Dimedrol cho người lớn thông thường là 10-50mg/ngày và liều tối đa là 400mg/24 giờ.", "Mỗi lần cách nhau 6 giờ, không quá 4 lần/ngày.
//", "Người lớn và trẻ em từ 12 tuổi trở lên: Có thể sử dụng liều từ 500mg đến 1g Paracetamol (1-2 viên/lần). Khoảng thời gian giữa mỗi lần uống là 4-6 giờ. Hàng ngày uống tối đa 4000mg và tuyệt đối không dùng cùng với các thuốc khác có chứa thành phần paracetamol.", "Liều lượng tiền mê của người lớn là 50 – 100 microgam tiêm tĩnh mạch chậm. Đối với trẻ em là 3 – 5 microgam/kg sau đó 1 microgam/kg nếu cần", "Trẻ em trên 6 tuổi: 1 giọt, 1 đến 2 lần mỗi ngày.
//", "Nên uống ampicillin vào dạ dày rỗng, tức là khoảng 30 phút đến 1 giờ trước khi ăn hoặc đợi sau khi ăn khoảng 2 giờ. Nên uống xa bữa ăn như vậy bởi nếu dùng cùng thức ăn thì lượng thuốc ampicillin được hấp thu vào cơ thể sẽ ít hơn, dẫn đến tác dụng của thuốc sẽ kém hơn. Ngoài ra nên uống thuốc với nhiều nước cũng sẽ giúp thuốc được hấp thu dễ dàng hơn.", "Liều từ 4-10mg/kg cân nặng mỗi 6-8 giờ. Liều tối đa là 40 mg/kg cân nặng. Trong trường hợp loại trừ nguyên nhân do sốt xuất huyết, dùng hạ sốt cho trẻ với liều 5mg/kg cân nặng khi thân nhiệt < 39,2 độ C cách mỗi 6-8h nếu trẻ sốt lại; liều 10mg/kg cân nặng khi số >=39,2 độ C cách mỗi 6-8h nếu trẻ sốt lại.", "Liều chung: 325 - 650mg/ liều cách 4-6 giờ hoặc 1000mg cách 6-8 giờ bằng đường uống hoặc đặt hậu môn.");
//        for($i=0; $i<200; $i++) {
//            $randMonth = rand(1,12);
//            if($randMonth >= 10) {
//                $create = rand(2014,2023)."-".$randMonth."-".rand(10,28)." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//            } else {
//                $create = rand(2014, 2023) . "-0" . $randMonth . "-" . rand(10, 28) . " " . rand(10, 23) . ":" . rand(10, 59) . ":" . rand(10, 59);
//            }
//            $characters = 'abcdefghiklmnopqrstuvxyz';
//            $charactersLength = strlen($characters);
//            $randomString = strtoupper($characters[rand(0, $charactersLength - 1)]);
//            for ($k = 0; $k < rand(6,8); $k++) {
//                $randomString .= $characters[rand(0, $charactersLength - 1)];
//            }
//            $random_route_of_use=array_rand($route_of_use,2);
//            $random_dosage=array_rand($dosage,2);
//            $random_content=array_rand($content,2);
//            $random_instruction=array_rand($instruction,2);
//
//            DB::table('products')->insert([
//                'id' => $i+1,
//                'category_id' => rand(3,47),
//                'product_name' => $randomString,
//                'product_image' => rand(2,40).".png",
//                'dosage' => $dosage[$random_dosage[0]],
//                'instruction' => $instruction[$random_instruction[0]],
//                'product_code' => rand(100000, 999999),
//                'content' => $content[$random_content[0]],
//                'route_of_use' => $route_of_use[$random_route_of_use[0]],
//                'created_at' => $create,
//                'updated_at' => $create,
//            ]);
//        }

        //DB Users
//        DB::table('users')->insert([
//            'firstname' => "Super",
//            'lastname' => "Admin",
//            'fullname' => "superadmin",
//            'email' => 'superadmin@gmail.com',
//            'gender' => 0,
//            'phone' => "123456789",
//            'address' => "hanoi",
//            'password' => Hash::make('superadmin'),
//            'role' => 2
//        ]);

        //DB export_prices
//        date_default_timezone_set('Asia/Ho_Chi_Minh');
//        $end_at = date('Y-m-d H:i:s', time());
//        $price = array("5000", "10000", "20000", "30000", "40000", "50000", "15000", "2000");
//        $price_update_time = array("16:53:57 10/09", "16:55:07 25/03", "16:56:58 24/06", "16:57:25 10/04", "16:57:44 10/09", "14:17:40 11/08", "11:00:06 25/06", "11:00:37 25/10", "00:42:08 28/10", "13:39:16 05/07", "13:51:04 05/11", "14:56:18 05/12", "12:06:48 05/01", "12:07:06 05/02");
//        for($i=0; $i<2000; $i++) {
//            $random_price=array_rand($price,2);
//            $random_price_update_time=array_rand($price_update_time,2);
//            DB::table("export_prices")->insert([
//                'id' => $i+1,
//                'product_id' => rand(1,224),
//                'current_price' => $price[$random_price[0]],
//                'price_update_time' => $price_update_time[$random_price_update_time[0]]."/".rand(2014,2022),
//                'created_at' => $end_at,
//                'updated_at' => $end_at,
//            ]);
//        }

        //DB supplier_products
//        date_default_timezone_set('Asia/Ho_Chi_Minh');
//        $create_at = date('Y-m-d H:i:s', time());
//        for($i=0; $i<500; $i++) {
//            DB::table("supplier_products")->insert([
//                'product_id' => rand(1,224),
//                'supplier_id' => rand(1,27),
//                'created_at' => $create_at,
//                'updated_at' => $create_at,
//            ]);
//        }

        //DB production_batches
//        $text = array("LV", "TX", "BT", "XS", "LP", "QM", "AD", "AL", "SY", "LA", "TM", "XP", "QK", "QS", "PA");
//        for($i=1; $i<1000; $i++) {
//            $randMonthOrder = rand(1,12);
//            if($randMonthOrder >= 10) {
//                $createOrder = rand(10,30)."/".$randMonthOrder."/".rand(2023,2030)." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//            } else if($randMonthOrder != 2) {
//                $createOrder = rand(10,31)."/0".$randMonthOrder."/".rand(2023,2030)." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//            } else
//                $createOrder = rand(10,28)."/0".$randMonthOrder."/".rand(2023,2030)." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//
//            $randMonthCreate = rand(1,8);
//            if($randMonthCreate >= 10) {
//                $createOrderTime = rand(2014,2023)."-".$randMonthCreate."-".rand(10,30)." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//            } else if($randMonthCreate != 2) {
//                $createOrderTime = rand(2014,2023)."-0".$randMonthCreate."-".rand(10,30)." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//            } else
//                $createOrderTime = rand(2014,2023)."-0".$randMonthCreate."-".rand(10,28)." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//
//            $random_text=array_rand($text,2);
//            DB::table("production_batches")->insert([
//                'id' => $i,
//                'product_id' => rand(1,224),
//                'production_batch_name' => $text[$random_text[0]].rand(100,999),
//                'expired_time' => $createOrder,
//                'created_at' => $createOrderTime,
//                'updated_at' => $createOrderTime,
//            ]);
//        }

        //DB invoices, sales
//        $count = 1;
//        for($i=0; $i<20000; $i++) {
//            $totalProduct = rand(1,3);
//            $totalInvoice = 0;
//            $randYear = rand(2014,2023);
//            if($randYear == 2023) {
//                $randMonth = rand(1,8);
//                if($randMonth == 8) {
//                    $randDay = "0".rand(1,9);
//                } else {
//                    $randDay = rand(10,28);
//                }
//            } else {
//                $randMonth = rand(1,12);
//                $randDay = rand(10,28);
//            }
//
//            if($randMonth >= 10) {
//                $create = $randYear."-".$randMonth."-".$randDay." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//            } else {
//                $create = $randYear."-0".$randMonth."-".$randDay." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//            }
//            for($k=0; $k<$totalProduct; $k++) {
//                $listTableCol = DB::table("products")
//                    ->pluck("product_name");
//                $listTable = $listTableCol->toArray();
//                $randomString = array_rand($listTable,2);
//                $amount = rand(1,3);
//                $listPrice = array("5000", "3000", "4000", "1000", "2000");
//                $random_price=array_rand($listPrice,2);
//                $price = $listPrice[$random_price[0]];
//                $totalPrice = (int)$amount * (int)$price;
//                DB::table("sales")->insert([
//                    'id' => $count,
//                    'product_name' => $listTable[$randomString[0]],
//                    'invoice_id' => $i+1,
//                    'amount' => $amount,
//                    'price' => $price,
//                    'total_price' => $totalPrice,
//                    'created_at' => $create,
//                    'updated_at' => $create,
//                ]);
//                $count ++;
//                $totalInvoice += $totalPrice;
//            }
//            $method = ["tien", "the"];
//            $random_method = array_rand($method, 2);
//            DB::table("invoices")->insert([
//                "id" => $i+1,
//                "money" => $totalInvoice,
//                "method" => $method[$random_method[0]],
//                "user_id" => rand(31,68),
//                'created_at' => $create,
//                'updated_at' => $create,
//            ]);
//        }

        //DB order, order_product
//        $count = 1;
//        $hehe = 1;
//        $countRec = 1;
//        for($i=0; $i<3000; $i++) {
//            $totalProduct = rand(1,4);
//            $totalOrder = 0;
//
//            $randYearOrder = rand(2014,2023);
//            if($randYearOrder == 2023) {
//                $randMonthOrder = rand(1,7);
//            } else {
//                $randMonthOrder = rand(1,12);
//            }
//            $randDayOrder = rand(10,28);
//            if($randMonthOrder < 10) {
//                $randMonthOrder = "0".$randMonthOrder;
//            }
//            $createOrder = $randDayOrder."/".$randMonthOrder."/".$randYearOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59);
//
//
//            for($k=0; $k<$totalProduct; $k++) {
//                $amount = rand(1,4);
//                $listPrice = array("5000", "3000", "4000", "2000", "10000", "15000");
//                $random_price=array_rand($listPrice,2);
//                $price = $listPrice[$random_price[0]];
//                $totalPrice = (int)$amount * (int)$price;
//                $productId = rand(1,220);
//                $listProductionBatch = DB::table("production_batches")
//                    ->where("product_id", $productId)
//                    ->pluck("id");
//                $listProductionBatchArr = $listProductionBatch->toArray();
//                if(count($listProductionBatchArr) == 1) {
//                    $productionBatchId = $listProductionBatchArr[0];
//                } else {
//                    $randomId = array_rand($listProductionBatchArr,2);
//                    $productionBatchId = $listProductionBatchArr[$randomId[0]];
//                }
//                DB::table("order_products")->insert([
//                    'id' => $count,
//                    'order_id' => $i+1,
//                    'product_id' => $productId,
//                    'production_batch_id' => $productionBatchId,
//                    'price_amount' => $price,
//                    'amount' => $amount,
//                    'total_price' => $totalPrice,
//                    'created_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59),
//                    'updated_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59)
//                ]);
//                $count ++;
//                $totalOrder += $totalPrice;
//            }
//
//            if($i < 2500)
//                $status = 2;
//            else $status = rand(0,2);
//            DB::table("orders")->insert([
//                "id" => $i+1,
//                "supplier_id" => rand(1,27),
//                "order_time" => $createOrder,
//                "order_code" => "#".$randYearOrder.rand(100000,999999),
//                "price_order" => $totalOrder,
//                "status" => $status,
//                "user_order_id" => rand(31,68),
//                'created_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59),
//                'updated_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59)
//            ]);
//
//            if($status == 2) {
//                DB::table("order_receiveds")->insert([
//                    "id" => $countRec,
//                    "order_id" => $i+1,
//                    "order_user_confirm_id" => rand(31,68),
//                    "order_received_time" => $createOrder,
//                    'created_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59),
//                    'updated_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59)
//                ]);
//
//                DB::table("order_received_users")->insert([
//                    "id" => $hehe,
//                    "order_received_id" => $countRec,
//                    "order_user_received_id" => rand(31,68),
//                    'created_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59),
//                    'updated_at' => $randYearOrder."-".$randMonthOrder."-".$randDayOrder." ".rand(10,23).":".rand(10,59).":".rand(10,59)
//                ]);
//                $countRec++;
//                $hehe++;
//            }
//        }
    }
}
