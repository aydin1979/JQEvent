<?php

namespace Event;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\plugin\PluginBase;

use pocketmine\{Player, Server};

use jojoe77777\FormAPI\SimpleForm;

class JQEvent extends PluginBase implements Listener{

    

    public function onEnable(){

        $this->getLogger()->info("§bEvent Aktif");    $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function girismesaj(PlayerJoinEvent $g){

        $o = $g->getPlayer();

        $isim = $o->getName();

        $g->setJoinMessage("§7$isim §a sunucuya katıldı");

        $this->girisMenu($o);

    }

        public function cikismesaj(PlayerQuitEvent $c){

            $o = $c->getPlayer();

            $isim = $o->getName();

            $c->setQuitMessage("§7$isim §csunudan ayrıldı");

    }

    public function girisMenu(Player $o){

      $f = new SimpleForm(function(Player $o, $data){

        if(!$data) return true;

        switch($data){

        case 0:

          break;

        }

      });

      $f->setTitle("Giriş Menüsü");

      $f->setContent("Yazacağınız mesaj");

      $f->addButton("Kapat");

      $f->sendToPlayer($o);

    }

}
