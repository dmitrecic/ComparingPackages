# ComparingPackages
Comparing different product packages (services) 

    Idea is to compare products with different input fields, rules as follows:
    
    Tariff Comparison - develop a model to build up the following two products and to compare these products based on their annual costs. 
    The comparison should accept the following input parameter:
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
