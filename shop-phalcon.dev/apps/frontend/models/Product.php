<?php

namespace Multiple\Frontend\Models;

use Phalcon\Mvc\Model;

class Product extends Model
{
    public function getSource()
    {
        parent::getSource(); // TODO: Change the autogenerated stub
        return "products";
    }
}
