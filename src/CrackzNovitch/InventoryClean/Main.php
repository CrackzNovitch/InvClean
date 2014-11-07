<?php


namespace CrackzNovitch\InventoryClean;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\EventExecutor;
use pocketmine\event\EventPriority;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\scheduler\PluginTask;

class InventoryClean extends BaseCommand{
    public function __construct(Loader $plugin){
        parent::__construct($plugin, "InventoryClean", "Clear your/other's inventory", "/inventoryclean [player]", ["ci", "clean", "clearinvent"]);
    }

    public function execute(CommandSender $sender, $alias, array $args){
        if(!$this->testPermission($sender)){
            return false;
        }
        switch(count($args)){
            case 0:
                if(!$sender instanceof Player){
                    $sender->sendMessage(TextFormat::RED . "Usage: /ic <player>"); // Som Us alias
                    return false;
                }
                $gm = $sender->getServer()->getGamemodeString($sender->getGamemode());
                if($gm === 1 || $gm === 3){
                    $sender->sendMessage(TextFormat::RED . "[Error] You're in " . ($gm === 1 ? "creative" : "adventure") . " mode");
                    return false;
                }


// TODO code Here
