<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{



    public function show()
    {
     
        $data = Http::get('https://my-json-server.typicode.com/glendmaatita/userjsondemo/db');
        // return $data;
        return response()->json($data['data']);
    }
    public function list(Request $request)
    {
        $data = Http::get('https://my-json-server.typicode.com/glendmaatita/userjsondemo/db');

       



// kalo request nya gak ada di kasih 0 supaya di bagian logic stristr gak ada error
$filter_name = $request->filter['name']  ?? 0;
$filter_username = $request->filter['username']  ?? 0;
$filter_email = $request->filter['email']  ?? 0;
$filter_address_street = $request->filter['address']['street']  ?? 0;
$filter_phone = $request->filter['phone']  ?? 0;









           
            // -----------------------------bagian name
            foreach ($data['data'] as $key => $value) {
                $name[] =  [$value['name'], $value['id']]; // loop semua data nya terus tampung ke array baru dengan anama rray name yang berisi 2 array name sama id nya
            }
            foreach ($name as $key) {
                $merge_name[] = implode('|', $key); // terus loop lagi satuin per array biar name sama id nya nyatu di dalam array baru supaya mempermudah pencarian lewat stristr
            }
            foreach ($merge_name as $key => $value) {
                if (stristr($value, $filter_name) == '') { // nah stristr yang ini kalo gak ada isi nya bakal 0 biar gak null
                    $get_name[]     = ""; // jika stristr yang di cari nya kosong buat array baru yang nanti isi semua value nya ""/string kosong
                } else {
                    $get_name[] = $value; // jika stristr yang di cari nya ada ya masukin aja
                }
            }
            if (empty(array_filter($get_name))) {
                $dataa_name = []; // jika array yang di atas kosong maka buat variable baru yang isi nya array kosong
            }else{
                foreach ($get_name as $key => $value) { // jika array yang di atas ada
                    if ($value != "") {
                        $get_name_index[] = $value; // di if kalo yang ada isi nya di masukin ke array baru supaya ngefilter data yang ada value nya aja dari index 0
                    }
                }
                foreach ($get_name_index as $key) {
                    $extrac_name[] = explode('|', $key); // di loop lagi buat di pisah lagi seperti di awal jadi berisi 0 = value name nya kalo 1  = id nya
                }
                foreach ($extrac_name as $key => $value) {
    
                    $dataa_name[] = searchByValue(intval($value[1]), $data['data']); // di loop lagi sembari di check if function yang saya ambil dari stack overflow  buat nyari id nya di data fake atas dan di masukan ke array baru
                }
            }
            // -----------------------------end bagian name



             // -----------------------------bagian username
             foreach ($data['data'] as $key => $value) {
                $username[] =  [$value['username'], $value['id']];
            }
            foreach ($username as $key) {
                $merge_username[] = implode('|', $key);
            }
            foreach ($merge_username as $key => $value) {
                if (stristr($value, $filter_username) == '') {
                    $get_username[]     = "";
                } else {
                    $get_username[] = $value;
                }
            }
            if (empty(array_filter($get_username))) {
                $dataa_username = [];
            }else{
                foreach ($get_username as $key => $value) {
                    if ($value != "") {
                        $get_username_index[] = $value;
                    }
                }
                foreach ($get_username_index as $key) {
                    $extrac_username[] = explode('|', $key);
                }
                foreach ($extrac_username as $key => $value) {
    
                    $dataa_username[] = searchByValue(intval($value[1]), $data['data']);
                }
            }
            // -----------------------------end bagian username














            // -----------------------------bagian email
            foreach ($data['data'] as $key => $value) {
                $email[] =  [$value['email'], $value['id']];
            }
            foreach ($email as $key) {
                $merge_email[] = implode('|', $key);
            }
            foreach ($merge_email as $key => $value) {

                if (stristr($value, $filter_email) == '') {
                    $get_email[]     = "";
                } else {
                    $get_email[] = $value;
                }
            }
            if (empty(array_filter($get_email))) {
                $dataa_email = [];
            }else{
                foreach ($get_email as $key => $value) {
                    if ($value != "") {
                        $get_email_index[] = $value;
                    }
                }
                foreach ($get_email_index as $key) {
                    $extrac_email[] = explode('|', $key);
                }
                foreach ($extrac_email as $key => $value) {
    
                    $dataa_email[] = searchByValue(intval($value[1]), $data['data']);
                }
            }
            // -----------------------------end bagian email


            // ------------------------------bagian address street
            foreach ($data['data'] as $key => $value) {
                $address[] =  [$value['address']['street'], $value['id']];
            }
            foreach ($address as $key) {
                $merge_address[] = implode('|', $key);
            }
            foreach ($merge_address as $key => $value) {
              
                if (stristr($value, $filter_address_street) == '') {
                    $get_address[]     = "";
                } else {
                    $get_address[] = $value;
                }
            }
            if (empty(array_filter($get_address))) {
                $dataa_address_street = [];
            } else {
                foreach ($get_address as $key => $value) {
                    if ($value != "") {
                        $get_address_index[] = $value;
                    }
                }
                foreach ($get_address_index as $key) {
                    $extrac[] = explode('|', $key);
                }
                foreach ($extrac as $key => $value) {
    
                    $dataa_address_street[] = searchByValue(intval($value[1]), $data['data']);
                }
           
            }
            // ------------------------------end bagian address street

              // -----------------------------bagian phone
              foreach ($data['data'] as $key => $value) {
                $phone[] =  [$value['phone'], $value['id']];
            }
            foreach ($phone as $key) {
                $merge_phone[] = implode('|', $key);
            }
            foreach ($merge_phone as $key => $value) {

                if (stristr($value, $filter_phone) == '') {
                    $get_phone[]     = "";
                } else {
                    $get_phone[] = $value;
                }
            }
            if (empty(array_filter($get_phone))) {
                $dataa_phone = [];
            }else{
                foreach ($get_phone as $key => $value) {
                    if ($value != "") {
                        $get_phone_index[] = $value;
                    }
                }
                foreach ($get_phone_index as $key) {
                    $extrac_phone[] = explode('|', $key);
                }
                foreach ($extrac_phone as $key => $value) {
    
                    $dataa_phone[] = searchByValue(intval($value[1]), $data['data']);
                }
            }
            // -----------------------------end bagian phone





            $datas = array_merge($dataa_name,$dataa_username,$dataa_email,$dataa_address_street,$dataa_phone); // untuk yang lain patern nya sama tinggal di ubah aja bagian index yang mau di cari terus semua di satuan pakai array_merge
            $get_all_data = array_map("unserialize", array_unique(array_map("serialize", $datas))); // ini saya ambil dari stackoverflow juga keyword array unique multidimensional nya buat nyari kalo ada data yang duplicate di dalem array dari array yang di gabungkan ibarat biar unique 
            if (empty($get_all_data)) { 
                $res['success'] = false;
                $res['msg'] = 'Data tidak di temukan!';
                $res['data'] = null;
            }else{
                $res['success'] = true;
                $res['msg'] = 'Data di temukan!';
                $res['data'] = $get_all_data;
            }
          return  response()->json($res);

    }
    public function paging(Request $request)
    {
        $data = Http::get('https://my-json-server.typicode.com/glendmaatita/userjsondemo/db');
        $paging_page = $request->paging['page']  ?? 1;
        $paging_limit= $request->paging['limit']  ?? 0;

        $page = $paging_page;
        
        // dd($page);
        $total = count( $data['data'] ); //total items di array    
        $limit = $paging_limit; //per page    
        $totalPages = ceil( $total / $limit ); // total data nya di bagi limit  yang mau di keluarin terus di bulatinn ke atas 
        $page = max($page, 1); // semisal page nya gak ada maka jadi 1 karena nilai tertinggi di max itu 1
        $page = min($page, $totalPages); //get last page when paging_page > $totalPages
        $offset = ($page - 1) * $limit;
        if( $offset < 0 ){
            $offset = 0;
        } 

        $datas = array_slice( $data['data'], $offset, $limit );
        // dd($datas);
        return response()->json($datas);
    }
}
