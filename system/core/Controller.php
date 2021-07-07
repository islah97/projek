<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/'.$view . '.php';
    }

    public function render($view, $data = [])
    {
        include '../app/views/templates/header.php';
        include '../app/views/'.$view . '.php';
        include '../app/views/templates/footer.php';
    }

    public function model($model)
    {
        require_once '../app/models/'.$model . '.php';
        return new $model;
    }

    public function session()
    {
       $this->session = new \Configuration\SessionManager();

       if (!$this->session->has('userID')) {
          header('Location:' . base_url . 'auth/logout', true, 301);
       }
       
    }

    // set notification Toastr
    public function setToastr($type, $result)
    {
        
        if ($type == 'create') {

            if ($result > 0) {
                Flasher::setNotifications('Success !', 'Save successfully', 'success');
            }else{
                Flasher::setNotifications('Failed !', 'Save unsuccessfully', 'error');
            }

        }else if ($type == 'update') {

            if ($result > 0) {
                Flasher::setNotifications('Success !', 'Update successfully', 'success');
            }else{
                Flasher::setNotifications('Failed !', 'Update unsuccessfully', 'error');
            }

        }else if ($type == 'delete') {

            if ($result > 0) {
                Flasher::setNotifications('Success !', 'Remove successfully', 'success');
            }else{
                Flasher::setNotifications('Failed !', 'Remove unsuccessfully', 'error');
            }
            
        }
        
    }

    // return result in json
    public function jsonResult($result){
        // header("Content-type:application/json");
        echo json_encode($result);
    }

    private function encode_base64($sData) {
        $sBase64 = base64_encode($sData);
        return strtr($sBase64, '+/', '-_');
    }

    private function decode_base64($sData) {
        $sBase64 = strtr($sData, '-_', '+/');
        return base64_decode($sBase64);
    }

    public function normalcomma($array){
        $str = implode (",", $array);
        return $str;
    }

    public function explode($array){
        $str = explode(',', $array);
        return $str;
    }

    public function merge($array,$array2){
        $str = array_merge($array,$array2);
        return $str;
    }

    public function addcomma($array){
        $comma_separated = implode(',', array_map(function($i) { return $i; }, $array));
        return $comma_separated;
    }

    public function countcomma($str){
        if($str!=NULL){
            $count = substr_count( $str, ",") +1;
            return $count;
        }else{
            return 0;
        }
    }

    public function date_format($str, $type){
        if($str!=NULL){
            if($type==1){
                $date = date('d-m-Y',strtotime($str));
            }
            else if($type==2){
                $date = date('Y-m-d',strtotime($str));
            }
            else if($type==3){
                $date = date('d F Y',strtotime($str));
            }
            else if($type==4){ 
                $date = date('Ymd',strtotime($str));
            }
            else if($type==5){
                $date = date('d-M-Y',strtotime($str));
            }
            else if($type==6){
                $date = date('d/m/Y',strtotime($str));
            }
            return $date;
        }else{
            return 0;
        }
    }

    public function searcharrayExist($valueSearch, $array) 
    {
       foreach ($array as $keyData => $data) 
       {
            if ($keyData == $valueSearch) 
            {
                return true;
            }
       }
       return false;
    }

    public function error($type = NULL){

        if ($type == '403') {

            $data = [
                'title' => '403 FORBIDDEN',
            ];

            $this->view('error/403', $data);

        }else if ($type == '404') {

            $data = [
                'title' => '404 Page Not Found',
            ];

            $this->view('error/404', $data);

        }else if ($type == '500') {

            $data = [
                'title' => '500 Internal Errors',
            ];

            $this->view('error/500', $data);
        }
       
    }

    public function uppercase($str){
        $str = ucwords(strtolower($str));
        return $str;
    }

    // use to print data
    public function dump($str, $die=false){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        if($die) die;
    }

    public function currency_format($amount){
        return number_format((float)$amount, 2, '.', '');
    }

    public function convertText($num)
    {
        // convert to text
        $ones = array(
            0 =>"",  
            1 => "SATU",
            2 => "DUA",
            3 => "TIGA",
            4 => "EMPAT",
            5 => "LIMA",
            6 => "ENAM",
            7 => "TUJUH",
            8 => "LAPAN",
            9 => "SEMBILAN",
            10 => "SEPULUH",
            11 => "SEBELAS",
            12 => "DUA BELAS",
            13 => "TIGA BELAS",
            14 => "EMPAT BELAS",
            15 => "LIMA BELAS",
            16 => "ENAM BELAS",
            17 => "TUJUH BELAS",
            18 => "LAPAN BELAS",
            19 => "SEMBILAN BELAS",
            "014" => "EMPAT BELAS"
            );

        $tens = array( 
            0 => "",
            1 => "SEPULUH",
            2 => "DUA PULUH",
            3 => "TIGA PULUH", 
            4 => "EMPAT PULUH", 
            5 => "LIMA PULUH", 
            6 => "ENAM PULUH", 
            7 => "TUJUH PULUH", 
            8 => "LAPAN PULUH", 
            9 => "SEMBILAN PULUH" 
        ); 

        $hundreds = array( 
            "RATUS", 
            "RIBU", 
            "JUTA", 
            "BILION", 
            "TRILION", 
            "QUADRILLION" 
        ); /*limit t quadrillion */

        $num = number_format($num,2,".",","); 
        $num_arr = explode(".",$num); 
        $wholenum = $num_arr[0]; 
        $decnum = $num_arr[1]; 
        $whole_arr = array_reverse(explode(",",$wholenum)); 
        krsort($whole_arr,1); 
        $rettxt = ""; 

        foreach($whole_arr as $key => $i)
        {
            while(substr($i,0,1)=="0")

                $i=substr($i,1,5);
                if($i < 20)
                { 
                /* echo "getting:".$i; */
                    $rettxt .= $ones[$i]; 
                }
                elseif($i < 100)
                { 
                    if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
                    if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
                }
                else
                { 
                    if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
                    if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
                    if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
                } 

                if($key > 0)
                { 
                    $rettxt .= " ".$hundreds[$key]." "; 
                }
        }   

        $rettxt .= " RINGGIT"; 

        if($decnum > 0)
        {
            $rettxt .= " DAN ";
            if($decnum < 20)
            {
                $rettxt .= $ones[$decnum];
            }
            elseif($decnum < 100)
            {
                $rettxt .= $tens[substr($decnum,0,1)];
                $rettxt .= " ".$ones[substr($decnum,1,1)];
            }

            $rettxt .= " SEN"; 
        }

        $rettxt .= " SAHAJA"; 

        return $rettxt;
    }

    public function generateReffNo($rowRef)
    {

        $year = date('y');
        $month = date('m');

        if ($rowRef) 
        {
            $lastid = substr($rowRef['reference'], -3);

            if (empty($lastid)) 
            {
                $referenceId = "OR-".$year.$month."/001";
            }
            else
            {
                $post_Generate = $year.$month;
                $control_id = str_replace($post_Generate, "", $lastid);
                $no = str_pad($control_id + 1, 3, 0, STR_PAD_LEFT);
                // $referenceId = $post_Generate.$no;
                $referenceId = "OR-".$post_Generate.'/'.$no;
            }
        }
        else
        {
            $referenceId = "OR-".$year.$month."/001";
        }

        return $referenceId;
    }

}