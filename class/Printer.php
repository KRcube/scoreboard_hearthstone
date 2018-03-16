<?php

class Printer
{
    public static function printAllCount()
    {
        $arrLogContext = LogParser::getArrLogContext();
        $iWoncount = count(LogParser::getArrWonGameLog($arrLogContext, "Making97#1152"));
        $iLostcount = count(LogParser::getArrLostGameLog($arrLogContext, "Making97#1152"));

        echo($iWoncount + $iLostcount);
    }

    public static function printWonCount()
    {
        $arrLogContext = LogParser::getArrLogContext();
        $iWoncount = count(LogParser::getArrWonGameLog($arrLogContext, "Making97#1152"));

        echo($iWoncount);
    }

    public static function printLostCount()
    {
        $arrLogContext = LogParser::getArrLogContext();
        $iLostcount = count(LogParser::getArrLostGameLog($arrLogContext, "Making97#1152"));

        echo($iLostcount);
    }
}