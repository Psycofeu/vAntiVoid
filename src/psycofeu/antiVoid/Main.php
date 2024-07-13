<?php

namespace psycofeu\antiVoid;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->notice("Plugin enable");
    }
    public function onVoid(EntityDamageEvent $event)
    {
        if ($event->getCause() === EntityDamageEvent::CAUSE_VOID){
            $event->cancel();
            $event->getEntity()->teleport($event->getEntity()->getWorld()->getSpawnLocation());
        }
    }
}