<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public $timestamps = false;

    function fetchArray() {
        $icsFile = file_get_contents($this->url);

        $icsData = explode("BEGIN:", $icsFile);
        foreach($icsData as $key => $value) {
            $icsDatesMeta[$key] = explode("\n", $value);
        }

        $icsDates = array();
        foreach($icsDatesMeta as $key => $value) {
            $lastKey = null;
            foreach($value as $subKey => $subValue) {
                if ($subValue != "") {
                    if ($key != 0 && $subKey == 0) {
                        $icsDates[$key]["BEGIN"] = $subValue;
                    } else {
                        $subValueArr = explode(":", $subValue, 2);
                        if (count($subValueArr) > 1) {
                            if (array_key_exists($subValueArr[0], $icsDates[$key])) {
                                if (is_array($icsDates[$key][$subValueArr[0]])) {
                                    $icsDates[$key][$subValueArr[0]][] = $subValueArr[1];
                                } else {
                                    $temp = $icsDates[$key][$subValueArr[0]];
                                    $icsDates[$key][$subValueArr[0]] = array($temp, $subValueArr[1]);
                                }
                            } else {
                                $icsDates[$key][$subValueArr[0]] = $subValueArr[1];
                            }
                            $lastKey = $subValueArr[0];
                        }
                        elseif ($lastKey != null && array_key_exists($key, $icsDates)) 
                            $icsDates[$key][$lastKey] .= "\n" . $subValue;
                    }
                }
                if (array_key_exists($key, $icsDates) && array_key_exists('UID', $icsDates[$key])) {
                    $res = HiddenEvent::where('uid', '=', trim($icsDates[$key]['UID']))->where('calendar', '=', $this->id)->first();
                    if (!is_null($res)) {
                        unset($icsDates[$key]);
                        break;
                    }
                }
            }
        }
        return $icsDates;
    }
}
