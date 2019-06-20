<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use App\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;
use Illuminate\Http\Request;

class FundamentalPatternsController extends Controller
{
    public function propertyContainer(){

        $name = 'Контейнер свойств';
        $description = PropertyContainer::getDescription();

        $item = new BlogPost();

        $item->setTitle('Заголовок статьи');
        $item->setCategoryId(10);

        $item->addProperty('last_update', '2019-06-10');
        $item->setProperty('last_update', '2019-06-11');


        $item->addProperty('read_only', true);
        $item->deleteProperty('read_only');

        $item->addProperty('view_count', 100);

        $method = __METHOD__;
        return view('design-patterns.main', compact('name', 'description', 'item', 'method'));


    }
}
