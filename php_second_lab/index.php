<!-- 1-  Search for how to make \n work in browser. -->
<!-- <?php
    $text = "HELLO CMS!!\nPHP!";
    echo nl2br($text);
    ?> -->


<!-- 2-  Display $_SERVER in readable format. -->
<!-- <?php
        echo "<pre>";
        print_r($_SERVER);
        echo "</pre>";
    ?> -->

<!-- 3- Try any three functions from String or Arrays built in. -->
<!-- <?php
    echo strlen("HELLO CMS!!");


    $x = "\nHello World!\n";
    echo nl2br(strtolower($x));

    $dummy_array = [5,3,7,0,1];
    sort($dummy_array);
    foreach($dummy_array as $number){
        echo $number;
    }

    ?> -->

<!-- 4-  Write a PHP script to get the sum and avg of an indexed array
    with value = 45 in index =1
    with value = 12 in index =0
    with value = 25 in index =3
    with value = 10 in index =2
    after that sort it in a reverse order (highest to lowest). -->
<!-- <?php
        $index_array= [12,45,10,25];
        echo "the sum of the array is " , array_sum($index_array);
        echo "<br>";
        echo "the avg of the array is " , array_sum($index_array)/count($index_array);
        
        rsort($index_array);
        echo "<pre>";
        print_r($index_array);
        echo "</pre>"   
    ?> -->



<!-- 5-  Write a PHP script to sort the following associative array :
 
    array("Sara"=>31,"John"=>41,"Walaa"=>39,"Ramy"=>40) in 
    ************ -->
<?php
        $associative_array = array("Sara"=>31,"John"=>41,"Walaa"=>39,"Ramy"=>40);
        // a) ascending order sort by value
        asort($associative_array);
        echo "<pre>";
        print_r($associative_array);
        echo "</pre>";
        // b) ascending order sort by Key
        ksort($associative_array);
        echo "<pre>";
        print_r($associative_array);
        echo "</pre>";
        // c) descending order sorting by Value
        arsort($associative_array);
        echo "<pre>";
        print_r($associative_array);
        echo "</pre>";
        // d) descending order sorting by Key 
        krsort($associative_array);
        echo "<pre>";
        print_r($associative_array);
        echo "</pre>";

    ?>