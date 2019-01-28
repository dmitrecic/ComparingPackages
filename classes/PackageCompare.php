<?php


class PackageCompare
{
    /*
     * Load traits first
     */
    use Abstracts;

    private $product;
    private $name;
    private $package_limit;
    private $package_price;
    private $package_model;
    private $above_package;
    private $price_per;

    public function __construct($args)
    {
        $product=$args["product"];
        $this->name=$product["name"];
        $this->package_limit=$product["package_limit"];
        $this->package_price=$product["package_price"];
        $this->above_package=$product["above_package"];
        $this->price_per=$product["price_per"];
    }

    public function calculate($args){
        $return="";
        foreach ($args as $arg)
        {
            $return[]=array(
                "price"=>$this->calculateCost($arg["consumption"]["kwh"]),
                "name"=>$this->name." ".$arg["consumption"]["kwh"]." kwh"
                );

        }
        return $return;
    }

    private function calculateCost($consumption){
        return ($consumption <= $this->package_limit ? $this->package_price : $this->calculateAboveLimitPrice($consumption));
        }

    private function calculateAboveLimitPrice($consumption)
        {
           return $this->package_price + ( ($consumption - $this->package_limit) * $this->above_package);
        }
}