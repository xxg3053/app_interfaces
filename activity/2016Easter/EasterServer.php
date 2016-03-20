<?php

class EasterServer {
    
    public static function index(){
        $result = array(
            "my_shake_tree"=>2,	//我的摇树次数
            "shake_tree_times"=>3,	//总摇树次数
            "dynamicGift"=>[		//摇奖纪录
                array("user"=>"aaa***","item"=>"Apple iPhone5s"),
                array("user"=>"ccc***","item"=>"Apple iPhone6s"),
                array("user"=>"bbb***","item"=>"Apple iPad"),
                array("user"=>"ddd***","item"=>"Apple iPad"),
                array("user"=>"eee***","item"=>"Apple iPad"),
                array("user"=>"ggg***","item"=>"Apple iPad"),
                array("user"=>"fff***","item"=>"Apple iPad"),
                array("user"=>"ddd***","item"=>"Apple iPad"),
                array("user"=>"eee***","item"=>"Apple iPad"),
                array("user"=>"ggg***","item"=>"Apple iPad"),
                array("user"=>"fff***","item"=>"Apple iPad")
            ],
            "mobile_code"=>[//目前已经领取过的游戏礼包
                array("title"=>"EZPZ","code"=>"dnjio920jcd","gameid"=>242),
                array("title"=>"pirateEmpire","code"=>"dnjio920jcd", "gameid"=>309)
            ]
        );
        
        return $result;
	}
	public static function myGift(){
        $result = [
            array("type"=>1,"awardid "=>5,"title"=>"礼包", "code"=>"ciorf9jv0293v"),
            array("type"=>2,"awardid"=>1,"title"=>"U盘","fill"=>false),
            array("type"=>2,"awardid"=>2,"title"=>"鼠标","fill"=>true ),
            array("type"=>2,"awardid"=>3,"title"=>"耳机", "fill"=>false),
            array("type"=>2,"awardid"=>4,"title"=>"鼠标垫","fill"=>true)
        ];
        return $result;
	
	}
	public static function getLuckPack($awardsID, $gameID, $flag){
        /**
        $result = [
            array("title"=>"EZPZ","code"=>"dnjio920jcd")
            //array("title"=>"pirateEmpire","code"=>"dnjio920jcd")
        ];**/
        $result = "dnjio920jcd";
        return $result;
	}
    /*
    *砸蛋
    */
	public static function shakeTree(){
        $result = array(
            "awardid"=>rand(0,3),	//awardid为0时，没中奖
            "type"=>rand(1,3),	//为1时，显示领取礼包按钮，为2时显示填写地址按钮
            "title"=>"R2定制U盘"
        );
        
        return $result;
	}

    public static function checkMyGoods(){
        return 'no data';
    }

    public static function submitInfo($data){
        
        return $data;
    }
    
    public static function getCode(){
        $result = array(
            "mobileCode"=>'abcdefe'.rand(0,8)
        );
       
        return $result;
        
    }
}

