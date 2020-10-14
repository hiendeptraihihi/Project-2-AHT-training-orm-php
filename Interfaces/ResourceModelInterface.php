<?php

namespace Zino\Interfaces;

interface ResourceModelInterface
{
    public function _init($tablename, $id, $model);

    public function save($model);
//
//    public function delete();
}
