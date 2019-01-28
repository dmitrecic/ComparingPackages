<?php
require("../core/autoloader.php");

/*

    Idea is to compare products with different input fields, rules as follows:

    Task: Tariff Comparison Develop a model to build up the following two products and to compare these products based on their annual costs. The comparison should accept the following input parameter:

    - Consumption (kWh/year)

    and create a list of these products with the columns

    - Tariff name
    - Annual costs (€/year) The list should be sorted by costs in ascending order.

    Products
    ===========
    Product A Name: “basic electricity tariff” Calculation model: base costs per month 5 € + consumption costs 22 cent/kWh Examples:
    Consumption = 3500 kWh/year => Annual costs = 830 €/year (5€ * 12 months = 60 € base costs + 3500 kWh/year * 22 cent/kWh = 770 € consumption costs)
    Consumption = 4500 kWh/year => Annual costs = 1050 €/year (5€ * 12 months = 60 € base costs + 4500 kWh/year * 22 cent/kWh = 990 € consumption costs)
    Consumption = 6000 kWh/year => Annual costs = 1380 €/year (5€ * 12 months = 60 € base costs + 6000 kWh/year * 22 cent/kWh = 1320 € consumption costs)

    Product B Name: “Packaged tariff” Calculation model: 800 € for up to 4000 kWh/year and above 4000 kWh/year additionally 30 cent/kWh. Examples:
    Consumption = 3500 kWh/year => Annual costs = 800 €/year
    Consumption = 4500 kWh/year => Annual costs = 950 €/year (800€ + 500 kWh * 30 cent/kWh = 150 € additional consumption costs)
    Consumption = 6000 kWh/year => Annual costs = 1400 €/year (800€ + 2000 kWh * 30 cent/kWh = 600 € additional consumption costs)

*/

/*
 * DATA TO WORK WITH:
 * (I choose to store data in array)
 */

$products=array();
$products[]=array('product'=>['name'=>'Basic Electricity tariff','monthly_base_cost'=>'5','consumption_cost'=>'0.22', 'price_per'=>'kwh']);
$products[]=array('product'=>['name'=>'Packaged tariff','package_limit'=>'4000','package_price'=>'800','package_model'=>'per year','above_package'=>'0.30','price_per'=>'kwh']);

$costs[]=array("consumption"=>["kwh"=>"3500"]);
$costs[]=array("consumption"=>["kwh"=>"4500"]);
$costs[]=array("consumption"=>["kwh"=>"6000"]);

/*
 * SOLUTION
 */

$compare=new Compare($products, $costs);
$list=$compare->getComparingResults()->sortByPriceAsc(); // or sortByPriceDesc();


$i=1;
echo "<table>";

foreach ($list as $item)
{
    echo "<tr>";
    echo "<td>".$i.") </td>";
    echo "<td>".$item["name"]."</td>";
    echo "<td>".$item["price"]." ".MONEY."</td>";
    echo "</tr>";
    $i++;
}

echo "</table>";
?>