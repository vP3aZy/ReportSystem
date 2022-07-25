<?php

namespace vP3aZy\ReportSystem\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use vP3aZy\ReportSystem\forms\ReportForm;
use vP3aZy\ReportSystem\ReportSystem;

class ReportCommand extends Command {

    public function __construct(){
        parent::__construct(ReportSystem::getInstance()->config->get("Command"), ReportSystem::getInstance()->config->get("Description"), ReportSystem::getInstance()->config->get("Usage"), ["reportsystem"]);
    }

    public function execute(CommandSender $player, string $commandLabel, array $args) {
        ReportForm::reportForm($player);
    }

}