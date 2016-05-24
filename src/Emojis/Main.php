<?php

  namespace Emojis;
  
  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\event\PlayerChatEvent;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\command\Command;
  use pocketmine\command\CommandSender;
  
  class Main extends PluginBase implements Listener
  {
  
    const PREFIX = TF::RED . "[" . TF::AQUA . "Emojis" . TF::RED . "] " . TF::YELLOW;
  
    const SMILEY = "😀";
    
    const HAPPY = "😄";
    
    const SAD = "😢";
    
    const DISSAPOINTED = "😑";
    
    const WINK = "😉";
    
    const ANGRY = "😡";
    
    const LOVE = "😍";
    
    const CONFUSED = "😖";
    
    const THUMBS_UP = "👍";
    
    const EXHAUSTED = "😪";
  
    public function onEnable()
    {
    
      $this->getLogger()->info(PREFIX . "Enabled.");
    
    }
    
    public function onChat(PlayerChatEvent $event)
    {
    
      $player = $event->getPlayer();
      
      $player_name = $player->getName();
      
      $player_message = $event->getMessage();
      
      $new_message = str_replace(array("[:)]", "[:D]", "[:(]", "[-_-]", "[;)]", "[>:(]", "[:3]", "[:S]", "[:+1]", "[:'|]"), array(SMILE, HAPPY, SAD, DISSAPOINTED, WINK, ANGRY, LOVE, CONFUSED, THUMBS_UP, EXHAUSTED), $player_message);
      
      $event->setMessage($new_message);
    
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
    
      switch(strtolower($cmd->getName()))
      {
      
        case "emojis":
        
          $sender->sendMessage(PREFIX . "To use an emoji in chat, please use [EmojiHere] in your message. E.G: [:)] will produce a smile(😀)");
          
          return true;
        
        break;
      
      }
    
    }
  
  }

?>
