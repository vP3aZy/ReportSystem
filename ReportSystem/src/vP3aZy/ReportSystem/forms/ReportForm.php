<?php

namespace vP3aZy\ReportSystem\forms;

use CortexPE\DiscordWebhookAPI\Embed;
use CortexPE\DiscordWebhookAPI\Message;
use CortexPE\DiscordWebhookAPI\Webhook;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\player\Player;
use pocketmine\Server;
use vP3aZy\ReportSystem\ReportSystem;

class ReportForm {

    public static function reportForm(Player $player) {
        $form = new CustomForm(function (Player $player, $data = null){
            if($data === null){
                return;
            }

            if($data[0] == null){
                $player->sendMessage(ReportSystem::getInstance()->message->get("NoPlayerGiven"));
                return true;
            }

            if($data[1] == null){
                $player->sendMessage(ReportSystem::getInstance()->message->get("NoReasonGiven"));
                return true;
            }

            $player->sendMessage(ReportSystem::getInstance()->message->get("ReportSendet"));
            foreach (Server::getInstance()->getOnlinePlayers() as $onlinePlayers) {
                if($onlinePlayers->hasPermission("report.view")) {
                    $onlinePlayers->sendMessage("§bNew Report!\n§fPlayer: §7" . $data[0] . "\n §fReason: §7" . $data[1] . "\n §fReporter: §7" . $player->getName());
                    $onlinePlayers->sendTitle("§cReport!", "§fPlayer: §7" . $data[0]);
                }
            }
            $webhook = new Webhook(ReportSystem::getInstance()->config->get("Link"));
            $msg = new Message();
            $embed = new Embed();
            $msg->setUsername(ReportSystem::getInstance()->config->get("Username"));
            $msg->setAvatarURL(ReportSystem::getInstance()->config->get("Avatar"));

            $embed->setTitle(ReportSystem::getInstance()->config->get("EmbedTitle"));
            $embed->addField("Player:", $data[0]);
            $embed->addField("Reason:", $data[1]);
            $embed->addField("Reporter:", $player->getName());
            $embed->setFooter(ReportSystem::getInstance()->config->get("EmbedFooter"));

            $msg->addEmbed($embed);
            $webhook->send($msg);
        });
        $form->setTitle(ReportSystem::getInstance()->config->get("FormTitle"));
        $form->addInput(ReportSystem::getInstance()->config->get("Input1"));
        $form->addInput(ReportSystem::getInstance()->config->get("Input2"));
        $form->sendToPlayer($player);
    }
}