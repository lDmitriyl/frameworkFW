<?php

namespace dmitriy\banner;

use fw\core\component\Base;

class Banner extends Base{

    public function executeComponent()
    {
        $this->result = $this->params;

        $this->template->render();
    }
}