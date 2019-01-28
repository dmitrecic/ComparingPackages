<?php

class Compare
{

    use Abstracts;
    private $return = "";
    private $args;
    private $products;
    private $costs;
    private $list;

    public function __construct($products, $costs)
    {
        $this->products = $products;
        $this->costs = $costs;
    }

    public function getComparingResults()
    {
        $this->setCompareModel();
        $this->sortResults();
        return $this;
    }

    private function setCompareModel()
    {
        foreach ($this->products as $product) {
            $this->list[] = CompareFactory::create($product)->calculate($this->costs);
        }
    }

    private function sortResults()
    {
        $this->list = call_user_func_array('array_merge', $this->list);
        return $this;
    }

    public function sortByPriceAsc()
    {
        asort($this->list);
        return $this->list;
    }

    public function sortByPriceDesc()
    {
        arsort($this->list);
        return $this->list;
    }

}