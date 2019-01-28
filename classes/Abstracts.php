<?php
trait Abstracts{

    public function calculateKwhConsumptionPrice($kwh,$price,$fixed=NULL)
    {
        if ($fixed===NULL) {
            return ($kwh * $price);
        } else {
            return $price;
        }
    }

    public function calculateTotalAnnualPrice($annual_price, $kwh_consumed, $price_per_kwh, $limit=NULL)
    {
        return ($annual_price+$kwh_consumed);
    }


}