<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class Lib {

    public static function  importDir($path){
        foreach (glob("{$path}*.php") as $filename){
            include_once $filename;
        }
    }
    public static function generateCode($length=6) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

        $code = "";

        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];
        }

        return $code;

    }

    public static function cutString($string, $maxlen) {
        $string = strip_tags($string);
        $len = (mb_strlen($string) > $maxlen)
            ? mb_strripos(mb_substr($string, 0, $maxlen), ' ')
            : $maxlen
        ;
        $cutStr = mb_substr($string, 0, $len);
        return (mb_strlen($string) > $maxlen)
            ? ' ' . $cutStr . '... '
            : ' ' . $cutStr . ' '
            ;
    }

}