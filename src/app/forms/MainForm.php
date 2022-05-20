<?php
namespace app\forms;

use std, gui, framework, app;
use php\io\Stream;

class MainForm extends AbstractForm
{

    /**
     * @event button4.click 
     */
    function doButton4Click(UXMouseEvent $e = null)
    {    
        $this->edit3->text = "10000000";
        $this->edit8->text = "10000000";
    }

    /**
     * @event button3.click 
     */
    function doButton3Click(UXMouseEvent $e = null)
    {    
       $this->edit3->text = "15000000";
       $this->edit8->text = "15000000"; 
    }

    /**
     * @event buttonAlt.click-Left 
     */
    function doButtonAltClickLeft(UXMouseEvent $e = null)
    {    
        $this->edit3->text = "20000000";
        $this->edit8->text = "20000000";
    }

    /**
     * @event button18.click 
     */
    function doButton18Click(UXMouseEvent $e = null)
    {    
        $this->edit3->text = "10000000";
        $this->edit8->text = "10000000";
    }

    /**
     * @event button17.click 
     */
    function doButton17Click(UXMouseEvent $e = null)
    {    
        $this->edit3->text = "15000000";
        $this->edit8->text = "15000000";
    }

    /**
     * @event button16.click 
     */
    function doButton16Click(UXMouseEvent $e = null)
    {    
        $this->edit3->text = "20000000";
        $this->edit8->text = "20000000";
    }

    /**
     * @event button29.click-Left 
     */
    function doButton29ClickLeft(UXMouseEvent $e = null)
    {    
        $cent_freq = $this->edit11->text;
        $samp_rate = $this->edit12->text;
        $cropBW = $this->edit10->text;
        $b1 = $cent_freq-(($samp_rate)/2)+$cropBW;
        $b2 = $cent_freq+(($samp_rate)/2)-$cropBW;
        $this->edit4->text = "$b1";
        $this->edit9->text = "$b2";
        
    }


    /**
     * @event button13.click 
     */
    function doButton13Click(UXMouseEvent $e = null)
    {    
       $l1 = $this->edit->text;
       $g1 = $this->editAlt->text;
       $s1 = $this->edit3->text;
       $f1 = $this->edit4->text;
       $l2 = $this->edit6->text;
       $g2 = $this->edit7->text;
       $s2 = $this->edit8->text;
       $f2 = $this->edit9->text;
       $a1 = $this->edit5->text;
       $a2 = $this->edit15->text;
       $outtype1 = $this->edit16->text;
       $outtype2 = $this->edit17->text;
       $board1 = $this->edit13->text;
       $board2 = $this->edit14->text;
       file_put_contents("start.bat", " @echo off
       hackrf_transfer -l $l1 -g $g1 -s $s1 -f $f1 $outtype1 $a1 -d $board1 -H 1 | hackrf_transfer -l $l2 -g $g2 -s $s2 -f $f2 $outtype2 $a2 -d $board2 -H 1");
       execute("cmd /c start start.bat");
    }

    /**
     * @event close 
     */
    function doClose(UXWindowEvent $e = null)
    {    
        unlink("./start.bat");
        $bs1 = $this->edit13->text;
        $bs2 = $this->edit14->text;
        file_put_contents("HackRF1.sn", "$bs1");
        file_put_contents("HackRF2.sn", "$bs2");
    }

    /**
     * @event button.click-Left 
     */
    function doButtonClickLeft(UXMouseEvent $e = null)
    {    
        $this->edit5->text = "-a 1";
        $this->button->enabled = false;
        $this->button->text = "Enabled";
    }

    /**
     * @event button15.click-Left 
     */
    function doButton15ClickLeft(UXMouseEvent $e = null)
    {    
        $this->edit15->text = "-a 1";
        $this->button15->enabled = false;
        $this->button15->text = "Enabled";
    }

    /**
     * @event button14.click 
     */
    function doButton14Click(UXMouseEvent $e = null)
    {
    $this->edit16->text = "-w";
    $this->edit17->text = "-w";
    $this->button14->textColor = Lime;
    $this->button14->enabled = false;
    $this->button19->enabled = false;
    }

    /**
     * @event button19.click 
     */
    function doButton19Click(UXMouseEvent $e = null)
    {
    $this->edit16->text = "-r HackRF1_RecBW.bin";
    $this->edit17->text = "-r HackRF2_RecBW.bin";
    $this->button19->textColor = Lime;
    $this->button14->enabled = false;
    $this->button19->enabled = false;
    }

    /**
     * @event button5.click 
     */
    function doButton5Click(UXMouseEvent $e = null)
    {    
        execute("cmd /c start hackrf_info_get.bat");
    }

    /**
     * @event construct 
     */
    function doConstruct(UXEvent $e = null)
    {    
        $b001 = file_get_contents('./HackRF1.sn');
        $b002 = file_get_contents('./HackRF2.sn');
        $this->edit13->text = "$b001";
        $this->edit14->text = "$b002";
    }








}
