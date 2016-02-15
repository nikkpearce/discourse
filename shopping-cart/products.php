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
            $html .= "  <div class='container'>
                            <div class='row'>
                        <div class='.col-md-4'>
                        <div data-sku-desc='$sku'>$desc</div>
                        <div data-sku-price='$sku'>$price</div>
                        <div><data-sku-image=$sku'><img src='$image'/></div>
                        <div><input data-sku-add='$sku' type='button' value='Add'/></div>
                      </div>
                      </div>
                      </div>";
        }
        echo $html;
        return;

    } else {
        $data = array("status" => "error", "msg" => "Only GET allowed.");

    }

    echo json_encode($data, JSON_FORCE_OBJECT);

?>
