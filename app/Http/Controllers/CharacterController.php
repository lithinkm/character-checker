<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function showHome(Request $request) {
        $data['newword'] =  '';
        $data['occur'] = '';
        $data['input'] = '';
        $data['test'] = '';
        $test = '';
        if(isset($request->name) && $request->name!=''){
            $data['input'] = $request->name;
            $word = strtolower($request->name);
            for($x=0;$x<count($request->char_name);$x++){
                $test .= 'Character '.($x+1).' : '.$request->char_name[$x]. ' Cannot repeat more than : '.$request->char_count[$x]. '</br>';
                $char_name = strtolower($request->char_name[$x]);
                $char_count = $request->char_count[$x];
                $newWord ='';
                $wordAr = explode($char_name,$word);
                for($j=0;$j<=count($wordAr);$j++){
                    if(isset($wordAr[$j])){
                        $newWord .= $wordAr[$j];
                    }
                    if($j<$char_count){
                        $newWord .= $char_name;
                    }
                }
                $word = $newWord;
            }
            $data['newword'] =  $newWord;

            $occur ='';
            foreach (count_chars($newWord, 1) as $strr => $value) {
                if(chr($strr) != ' '){
                    $occur .=  chr($strr) . " :  Occurred a number of $value " . "</br>";
                }
            }
            $data['occur'] = $occur ;
            $data['test'] = $test;

        }
        return view('welcome',$data);
    }
}
