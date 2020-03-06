<?php

namespace app\modules\rgt\components;

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

}
