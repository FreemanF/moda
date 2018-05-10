<?php

class DisableDefaultScopeBehavior extends CActiveRecordBehavior
{
    const   SCOPE_FRONTEND = false;
    const   SCOPE_BACKEND  = true;
    const   SCOPE_SELECT   = 2;
    const   SCOPE_SEARCH   = 3;
    
    private $_defaultScopeDisabled = false; // Flag - whether defaultScope is disabled or not

    public function disableDefaultScope($level=self::SCOPE_BACKEND)
    {
          $this->_defaultScopeDisabled = $level;
          return $this->owner;
    }

    public function getDefaultScopeDisabled() {
        return $this->_defaultScopeDisabled;
    }

}
