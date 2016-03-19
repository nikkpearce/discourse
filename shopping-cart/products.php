<?php

require_once('init.php');
loadScripts();

    $data = array("status" => "not set!");

    if(Utils::isGET()) {
        $pm = new ProductManager();
        $rows = $pm->listProducts();

        $html = "";
        foreach($rows as $row) {
            $sku = $row['SKU'];
            $price = $row['item_price'];
            $desc = $row['description'];
            $image = $row['image'];
            $html .= "  
                        <div class='col-md-4' style='margin-bottom:30px;'>
                        <div data-sku-desc='$sku' style='font-weight:bolder;font-size:18px;font-family:nunito;margin-bottom:8px;'>$desc</div>
                        <div data-sku-price='$sku' style='float: none;position: absolute;left: 240px;top: 40px;font-family:nunito;font-weight:bolder;display: inline-block;background-color: #E74C3C;color: #fff;padding: 5px 8px;border-radius: 4px;'>$price</div>
                        <div><data-sku-image=$sku'><img src='$image' style='border-radius:5px;margin-bottom:5px;'/></div>
                        <div><input data-sku-add='$sku' type='button' class='btn btn-primary' value='Add'/></div>
                      </div>";
        }
        echo $html;
        return;

    } else {
        $data = array("status" => "error", "msg" => "Only GET allowed.");

    }

    echo json_encode($data, JSON_FORCE_OBJECT);

?>
