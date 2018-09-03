<?php

/*
 * LiveStreet CMS
 * Copyright © 2018 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2018 OOO "ЛС-СОФТ"
 * @author Oleg Demidov <boxmilo@gmail.com>
 *
 */

/**
 * Description of EventIndex
 *
 * @author oleg
 */
class ActionIndex_EventIndex extends Event{

    public function EventIndex() {
        /**
         * Устанавливаем шаблон вывода
         */
        $this->SetTemplateAction('index');
    }
}
