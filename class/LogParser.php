<?php

// 하스스톤의 'power.log'에서 필요한 정보를 가져옵니다.
class LogParser
{
    // 로그를 배열의 형태로 반환합니다.
    public static function getArrLogContext()
    {
        return explode("\n", self::getContextByFile());
    }

    // 파일에서 로그를 전부 반환옵니다.
    public static function getContextByFile()
    {
        $powerlogFile = fopen(PATH, "r");
        return fread($powerlogFile, filesize(PATH));
    }
    
    // 해당 이름을 가진 플레이어가 이긴 횟수를 반환합니다.
    public static function getArrWonGameLog($arrContext, $strName)
    {
        $arrTargetWonCondition = Condition::getWonLogConditionWithName($strName);
        return self::getOrderNumberWhenCondition($arrContext, $arrTargetWonCondition);
    }

    // 해당 이름을 가진 플레이어가 이긴 횟수를 반환합니다.
    public static function getArrLostGameLog($arrContext, $strName)
    {
        $arrTargetLostCondition = Condition::getLostLogConditionWithName($strName);
        return self::getOrderNumberWhenCondition($arrContext, $arrTargetLostCondition);
    }

    // 조건을 통해 로그의 목록을 가져옵니다. (순서 포함)
    public static function getOrderNumberWhenCondition($arrContext, $arrCondition)
    {
        $arrOrder = array();
        $iContextLength = count($arrContext);

        for($i=0; $i < $iContextLength; $i++) 
        {
            $bResult = LogParser::isLogCondition($arrContext[$i], $arrCondition);
            
            if($bResult) {
                $arrOrder[$i] = $arrContext[$i];
            }
        }

        return $arrOrder;
    }

    // 조건을 통해 원하는 로그를 가져옵니다.
    public static function getLogsWhenCondition($arrContext, $arrCondition) 
    {
        $arrResult = array();
        $iContextLength = count($arrContext);

        for($i=0; $i < $iContextLength; $i++) 
        {
            $bResult = LogParser::isLogCondition($arrContext[$i], $arrCondition);
            
            if($bResult) {
                $arrResult[] = $arrContext[$i];
            }
        }

        return $arrResult;
    }

    // 로그 한 줄이 조건에 해당하는지 검사합니다.
    public static function isLogCondition($strContext, $arrCondition)
    {
        $iConditionCount = count($arrCondition); 
        $bresult = true;

        for($i=0; $i < $iConditionCount; $i++)
        {
            $bIs = strpos($strContext, $arrCondition[$i]);

            if($bIs === false) { 
                $bresult = false;
                break; 
            }
        }

        return $bresult;
    } 
}