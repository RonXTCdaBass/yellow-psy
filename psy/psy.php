<?php
// Psy extension, https://github.com/annaesvensson/yellow-psy

class YellowPsy {
    const VERSION = "0.8.14";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "psy"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="psy") {
            $this->yellow->system->save($fileName, array("theme" => $this->yellow->system->getDifferent("theme")));
        }
    }
}
