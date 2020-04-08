<?php

namespace App\Http\Controllers;

use App\Site;
use App\User;
use App\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Auth;

class UsernameController extends Controller{
    const langs=[
        'western'=>[['name','surname'],['name','second name','surname']],
        'south' =>[['family name','name'],['family name','name', 'second name'], ],
    ];
    const lang_letters=[
        'island'=>'aábdðeéfghiíjklmnoóprstuúvxyýþæöAÁBDÐEÉFGHIÍJKLMNOÓPRSTUÚVXYÝÞÆÖ',
        'western'=>'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvXxYyZz',
        'sweed'=>'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvXxYyZzåäöÅÄÖ',
        'arabic'=>'AaBbCcÇçDdEeƏəFfGgĞğHhXxIıİiJjKkQqLlMmNnOoÖöPpRrSsŞşTtUuÜüVvYyZz',

        'lang_set'=>[
            'english'=>"\u00C0\u01BF",
            'cyrillic'=>"\u0400\u04FF",
            'armenian'=>"\u0531\u058F",
            'hebrew'=>"\u0591\u05F4",
            'arabic'=>"\u0600\u06FF",
            'syriac'=>"\u0700\u074F",
            'thai'=>"\u0E00\u0E7F",
            'japanese'=>"\u3040\u30FF",
            'chinese'=>"\u4E00\u9FA5",
            ],
    ];
    function escape_sequence_decode($str) {
        $regex = '/\\\u([dD][89abAB][\da-fA-F]{2})\\\u([dD][c-fC-F][\da-fA-F]{2})
              |\\\u([\da-fA-F]{4})/sx';

        return preg_replace_callback($regex, function($matches) {

            if (isset($matches[3])) {
                $cp = hexdec($matches[3]);
            } else {
                $lead = hexdec($matches[1]);
                $trail = hexdec($matches[2]);
                $cp = ($lead << 10) + $trail + 0x10000 - (0xD800 << 10) - 0xDC00;
            }
            if ($cp > 0xD7FF && 0xE000 > $cp) {
                $cp = 0xFFFD;
            }
            if ($cp < 0x80) {
                return chr($cp);
            } else if ($cp < 0xA0) {
                return chr(0xC0 | $cp >> 6).chr(0x80 | $cp & 0x3F);
            }
            return html_entity_decode('&#'.$cp.';');
        }, $str);
    }

    public function getUserName(Request $r){
        if(Auth::guest())return redirect('login');
        $text = $r->get('text');
        $text = trim(str_replace("  ", " ",$text));
        $text_sliced = explode(' ',$text );
        for($i=0;$i<count($text_sliced);$i++)
            $text_sliced[$i]=self::escape_sequence_decode($text_sliced[$i]);
        $text = trim(str_replace(" ", "",$text));
        $_lang=self::lang_letters['lang_set'];
        $list = [];
        $text= self::escape_sequence_decode($text);
        for($i =0 ;$i<mb_strlen($text);$i++) {
            $code = mb_ord(mb_substr($text, $i, 1), 'UTF-16');
            if($code===0)$code = ord(substr($text, $i, 1));
            foreach ($_lang as $key => $str) {
                $str = self::escape_sequence_decode($str);
                $from = mb_ord(mb_substr($str, 0, 1), 'UTF-16');
                $to = mb_ord(mb_substr($str, 1, 1), 'UTF-16');
                if ($code >= $from && $code <= $to) {
                    if(isset($list[$key]))$list[$key]++ ;
                    else $list[$key]=1;
                    break;
                }
            }
        }
        $language = empty($list)?'english':array_keys($list, max($list));
        $size = count($text_sliced);
        $response =[];
        $index = 0;
        $group = 'south';
        if($size===3)$index=1;
        switch ($language){
            case 'japanese':case 'arabic':case 'syriac':case 'thai':case 'chinese':
            case 'cyrillic': case 'hebrew':
                $group='south';
                break;
            case 'english':
                $group='western';
                break;
        }
        for($i=0;$i<min($size,3);$i++) {
            $response[self::langs[$group][$index][$i]] = $text_sliced[$i];
            Username::create(
                [   'entity_id' => Auth::user()->id,
                    'fragment' => $text_sliced[$i],
                    'order' => self::langs[$group][$index][$i],
                    'script' => $language,
                    'cultural_context' => $group ]
            );
        }
        return $response;
    }




}