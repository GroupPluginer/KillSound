<?php

namespace kill;

use pocketmine\plugin\PluginBase;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Main extends PluginBase implements Listener{

 public function onEnable(){
  $this->getServer()->getPluginManager()->registerEvents($this, $this);
   }
   
   public function onKill(PlayerDeathEvent $event){
    $cause = $event->getEntity()->getLastDamageCause();
     if($cause instanceof EntityDamagebyEntityEvent){
       $killer = $cause->getDamager();
                     
                     $killer->getLevel()->addSound(new AnvilUseSound($killer));
     }
   }
 }
             
