<?php

namespace App\Helpers;

trait TreeHelper
{

    public function getTreeList($categories)
    {   
        $listCategory = $this->getCategoryList($categories);
        $treeList = $this->getCategoryTree($listCategory);

        return $treeList;
    }

    private function getCategoryList($categories)
    {
        $listCategory = [];

        foreach ($categories as $category) {
            $listCategory[$category->name] = $category;
        }

        return $listCategory;
    }

    private function getCategoryTree($listCategory)
    {
        $treeList = [];

        foreach ($listCategory as $id => $row) {
            $treeList[$row->category_id][] = $id;
        }
        
        return $treeList;
    }

}
