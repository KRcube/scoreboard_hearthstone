<?php

class Condition
{
    // 이름과 조건을 이용해 패배에 대한 로그들을 반환합니다.
    public static function getWonLogConditionWithName($playerName) 
    {
        return array(
            "GameState.DebugPrintPower()",
            "value=WON",
            $playerName,
        ); 
    }

    // 이름과 조건을 이용해 승리에 대한 로그들을 반환합니다.
    public static function getLostLogConditionWithName($playerName) 
    {
        return array(
            "GameState.DebugPrintPower()",
            "value=LOST",
            $playerName,
        ); 
    }

}