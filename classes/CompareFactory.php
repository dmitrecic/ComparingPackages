<?php

class CompareFactory{

    public static function create($product)
    {
        /*
         * Depending of product array elements choose right class to instantiate
         * Basic product has 5 elements
         * Package product (flat) has 7 elements
         */

        if (count($product,COUNT_RECURSIVE)==5)
        {
            return new BasicCompare($product);

        } else {

            return new PackageCompare($product);
        }
    }
}