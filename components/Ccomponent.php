<?php

namespace app\components;

class Ccomponent {

    //เลขบัตรประชาชน format
    public static function FnIDX($cid) {
        $srt[0] = substr($cid, 0, 1);
        $srt[1] = substr($cid, 1, 4);
        $srt[2] = substr($cid, 5, 5);
        $srt[3] = substr($cid, 10, 2);
        $srt[4] = substr($cid, 12, 1);
        return $srt[0] . "-" . $srt[1] . "-" . $srt[2] . "-" . 'XX' . "-" . $srt[4];
    }

//วันที่
    public static function getThaiDate($scode, $rtype = 'S', $showtime = '') {
        $thaimtS = array('00' => '', '01' => 'ม.ค.', '02' => 'ก.พ.', '03' => 'มี.ค.', '04' => 'เม.ย.', '05' => 'พ.ค.', "06" => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.', '11' => 'พ.ย.', '12' => 'ธ.ค.');
        $thaimtL = array('00' => '', '01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');

        if (empty($scode)) {
            return '';
        }
        $day = (integer) substr($scode, 8, 2);
        $mt = substr($scode, 5, 2);
        $time = substr($scode, 10, 12);
        $year = (integer) substr($scode, 0, 4) + 543;
        if (strtoupper($rtype) == 'L') {
            $tmt = $thaimtL;
            return $day . ' ' . $tmt[$mt] . ' ' . $year . ($showtime <> '' ? ' : ' . $time : '');
        } else {
            $tmt = $thaimtS;
            return $day . ' ' . $tmt[$mt] . ' ' . substr($year, 2, 4) . ' ' . ($showtime <> '' ? $time : '');
        }
    }

}
