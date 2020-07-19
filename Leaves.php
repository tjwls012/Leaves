<?php

/**
 * @name Leaves
 * @main tjwls012\leaves\Leaves
 * @author ["tjwls012"]
 * @version 0.1
 * @api 3.12.0
 * @description License : LGPL 3.0
 */
 
namespace tjwls012\leaves;
 
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\block\Block;
use pocketmine\event\block\LeavesDecayEvent;

use pocketmine\level\Level;

class Leaves extends PluginBase implements Listener{

  public $world = ["world"];
  
  public static $instance;
  
  public static function getInstance(){
  
    return self::$instance;
  }
  public function onLoad(){
  
    self::$instance = $this;
  }
  public function onEnable(){
  
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  public function onLeavesDecay(LeavesDecayEvent $e){
  
    $block = $e->getBlock();
    
    $level = $block->getLevel();
    $folder = $level->getFolderName();
    
    if(in_array($folder, $this->world)){
    
      $e->setCancelled(true);
    }
  }
}
