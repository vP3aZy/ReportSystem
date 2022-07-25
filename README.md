# ReportSystem
## >> Information:
 - This plugin add's a ReportSystem to your Server!
## >> Features:
- Everything is configurable in config.yml
- All messages are configurable in messages.yml
- Setup the command, your own
- Discord webhook support in config.yml
## >> Permissions:
```yaml
permissions:
  report.view:
    default: OP
```
## >> Command:
- You can setup the command, your own -> config.yml

## >> Config.yml:
```yaml

#Here you can Setup the Plugin!

#Command Setup!
Command: "report"
Description: "Report a Player!"
Usage: "/report"

#Form Setup!
FormTitle: "§bReport§7: "
Input1: "§7Give the Playername: "
Input2: "§7Give the Reason: "

#DiscordWebhook Setup!

#This Means the Webhook URL!
Link: ""

#Here you can set The webhook's Username!
Username: "Webhook"

#Here you can set the webhook's Avatar!
Avatar: ""

#DiscordMessage Setup!

#This Means the Title of the Message!
EmbedTitle: "REPORT!!!"

#This Means the Footer of the Message!
EmbedFooter: "Ban?"
```

## >> Messages.yml:
```yaml
#Here you can setup all the Form Languages

#This is the Message if no Player is given!
NoPlayerGiven: "§cThere is no player given!"

#This is the Message if no Reason is given!
NoReasonGiven: "§cThere is no reason given!"

#This is the Message if the report was sendet!
ReportSendet: "§aThe report was successfully sendet!"
```
