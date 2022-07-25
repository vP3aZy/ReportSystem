<?php

namespace vP3aZy\ReportSystem;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;
use vP3aZy\ReportSystem\commands\ReportCommand;

class ReportSystem extends PluginBase {
    use SingletonTrait;

    public $message;
    public $config;

    public function onLoad(): void {
        self::setInstance($this);
    }

    public function onEnable(): void {
        $this->saveResource("messages.yml");
        $this->saveResource("config.yml");
        $this->message = (new Config($this->getDataFolder() . "messages.yml", Config::YAML, []));
        $this->config = (new Config($this->getDataFolder() . "config.yml", Config::YAML, []));
        $this->getServer()->getCommandMap()->register("report", new ReportCommand());
    }
}