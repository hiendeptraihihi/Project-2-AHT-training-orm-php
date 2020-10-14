<?php
    namespace Zino\Core;

    use Zino\Config\Database;

    class Model
    {
        public function getProperties()
        {
            return get_object_vars($this);
        }
    }
?>