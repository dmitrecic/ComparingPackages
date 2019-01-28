<?php


class BasicCompare
{
    /*
    * Load traits first
    */

    use Abstracts;

    private $product;
    private $name;
    private $monthly_base_cost;
    private $consumption_cost;
    private $price_per;


    public function __construct ($args)
    {
        $product=$args["product"];
        $this->name=$product["name"];
        $this->monthly_base_cost=$product["monthly_base_cost"];
        $this->consumption_cost=$product["consumption_cost"];
        $this->price_per=$product["price_per"];
    }

    public function calculate($args){
        $return="";

        foreach ($args as $arg) {
            $return[]=array(
                "price" => $this->calculateTotalAnnualPrice(
                    $this->annualBaseCost(),
                    $this->calculateKwhConsumptionPrice($arg["consumption"]["kwh"], $this->consumption_cost),
                    $this->consumption_cost
                ),
                "name"=>$this->name." ".$arg["consumption"]["kwh"]." kwh");
        }

        return $return;

    }

    private function annualBaseCost()
    {
        return ($this->monthly_base_cost * ANNUALY);
    }


}