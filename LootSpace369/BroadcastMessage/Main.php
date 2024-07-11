<?php

declare(strict_types = 1);

namespace LootSpace369\BroadcastMessage;

use pocketmine\plugin\PluginBase;
use vennv\vapm\VapmPMMP;
use vennv\vapm\System;

class Main extends PluginBase {

  public function onEnable(): void {
    VapmPMMP::init($this);
    $this->saveDefaultConfig();
    System::setInterval(function() {
      foreach ($this->getText() as $text) {
        $this->getServer()->broadcastMessage($text);
      }
    },$this->getConfig()->get("delay")*1000);
  }

  public function getText(): array {
    return $this->getConfig()->get("text");
  }
}
