<?php
session_start();
// session_unset();
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (file_exists("../configuration.php")) {
    require_once("../configuration.php");
} else {
    echo "Missing Configuration File";
    exit();
}
//Include Database Controller
if (file_exists("../include/database.php")) {
    require_once("../include/database.php");
} else {
    echo "Missing Database File";
    exit();
}
//Include System File
if (file_exists("../include/ariacms.php")) {
    require_once("../include/ariacms.php");
} else {
    echo "Missing System File";
    exit();
}
$database = new database($ariaConfig_server, $ariaConfig_username, $ariaConfig_password, $ariaConfig_database);
$ariacms = new ariacms();


global $ariacms;
global $params;
global $database;
global $web_home;
$pid = trim($_REQUEST["pid"]);
$quantity = trim($_REQUEST["quantity"]);
$type = trim($_REQUEST['type']);

switch ($type) {
    case 'add':
        if ($pid != '') {
            if (!isset($_SESSION['orderCart'])) 
            {
                $_SESSION['orderCart'] = array();
                $_SESSION['orderCart'][$pid] = 1;
            }
            else if(!isset($_SESSION['orderCart'][$pid]))
            {
                $_SESSION['orderCart'][$pid] = 1;
            }
            else
            {
                $_SESSION['orderCart'][$pid] += $quantity;
            }
        }
        break;
    case 'edit':
        foreach ($_SESSION['orderCart'] as $productID => $value) {
            if ($productID == $pid) {
                $_SESSION['orderCart'][$productID] = $quantity;
            }
        }
        break;
    case 'delete':
        if ($pid) {
            foreach ($_SESSION['orderCart'] as $productID => $value) {
                if ($productID == $pid) {
                    unset($_SESSION['orderCart'][$productID]);
                }
            }
        } else {
            unset($_SESSION['orderCart']);
        }
        break;
}

$total = 0;
foreach ($_SESSION['orderCart'] as $productID => $value) {
    $total += $value;
}

// get product
  if ($_SESSION['orderCart']) {
            foreach ($_SESSION['orderCart'] as $productID => $quantity) {
                $i += $quantity;
            }
            $id= array();
            foreach ($_SESSION['orderCart'] as $productID=>$value) {
                array_push($id,$productID); 
            }
        }

        $id=implode(",",(array)$id);
        $query = "SELECT  a.*
                FROM e4_posts a
                WHERE  a.id in ({$id})";
        $database->setQuery($query);
        $products = $database->loadObjectList();

       // print($products);

        $query = "SELECT a.* FROM e4_web_home a WHERE a.status = 'active'";
        $database->setQuery($query);
        $web_home = $database->loadObjectList();
?>

 <?php  if(!$products) {  ?>

                <h1>Gi??? h??ng</h1>
                <p>Gi??? h??ng tr???ng</p>

            <?php } else { ?>

            <h1>Gi??? h??ng</h1>
            <form action="" method="post" class=" form-desk cart table-wrap medium--hide small--hide">
                <table class="cart-table full table--responsive">
                    <thead class="cart__row cart__header-labels">
                        <th colspan="2" class="text-center">S???n ph???m</th>
                        <th class="text-center">????n gi??</th>
                        <th class="text-center">S??? l?????ng</th>
                        <th class="text-right">T???ng gi??</th>
                    </thead>
                    <tbody>
                         <?php 
                         // print_r($_SESSION);die; 
                         $total_price = 0;
                         foreach ($products as $key => $pro) {
                             if($pro->sale_percent == 0) {
                            $total_price += ($pro->product_sale * $_SESSION['orderCart'][$pro->id]);
                            } else {
                            $total_price += (($pro->product_sale * ( 100 - $pro->sale_percent) / 100) * $_SESSION['orderCart'][$pro->id]);
                            } ?>
                        <tr class="cart__row table__section">
                            <td data-label="S???n ph???m">
                                <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro->url_part . '.html'?>" class="cart__image">
                                    <img src="<?php echo $pro->image ?>" alt="<?php echo $pro->title_vi ?>">
                                </a>
                            </td>
                            <td>
                                <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro->url_part . '.html'?>" class="h4">
                                    <?php echo $pro->title_vi ?>
                                </a>
                               <!--  Khuy???n m??i: 1017960497 - Gi???m v?? th???i h???n 10% cho to??n b??? S??ch Kim ?????ng
                                <br> -->
                                <a href="" class="cart__remove" onclick="remove1(<?php echo $pro->id ?>)">
                                    <small>X??a</small>
                                </a>
                            </td>
                            <td data-label="????n gi??">
                                <?php if($pro->sale_percent == 0) { ?>
                                    <span class="h3">
                                       <?php echo number_format($pro->product_sale) ?>???
                                    </span>
                                <?php } else { 
                                    $giasale = $pro->product_sale * ( 100 - $pro->sale_percent) / 100;?>
                                    <span class="h3">
                                        <?php echo number_format($giasale) ?>???
                                    </span>
                                <?php } ?>
                            </td>
                            <td data-label="S??? l?????ng">
                                <input type="text" style="width:80px;" name="quantity1" id="sl1<?=$pro->id ?>" value="<?php echo $_SESSION['orderCart'][$pro->id] ?>" onchange="soluong1(<?php echo $pro->id ?>,<?php echo $pro->product_sale ?>)">
                            </td>
                            <td data-label="T???ng ti???n" class="text-right">
                                <span class="h3" id="tongtien1">
                                   <?php if($pro->sale_percent == 0) {
                                     echo number_format($pro->product_sale * $_SESSION['orderCart'][$pro->id]).'???';} else { echo number_format(($pro->product_sale * ( 100 - $pro->sale_percent) / 100) * $_SESSION['orderCart'][$pro->id]).'???';} ?>
                                </span>
                                
                            </td>
                        </tr>
                    <?php } ?>
                        
                    </tbody>
                </table>
                <div class="grid cart__row">
                    <div class="grid__item two-thirds small--one-whole">
                        <!-- <label for="CartSpecialInstructions">Ghi ch??</label>
                        <textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea> -->
                         <div class="form-vertical clearfix">
                          <label for="ContactFormName" class="hidden-label">name</label>
                          <input type="text"  class="input-full" name="txtName" placeholder="H??? v?? T??n" required>

                          <label for="ContactFormPhone" class="hidden-label">phone</label>
                          <input type="tel"  class="input-full" name="txtPhone" placeholder="S??? ??i???n tho???i" required>

                          <label for="ContactFormEmail" class="hidden-label">email</label>
                          <input type="email"  class="input-full" name="txtEmail" placeholder="Email" required>

                          <label for="ContactFormMessage" class="hidden-label">?????a ch???</label>
                          <textarea rows="5"  class="input-full" name="txtAddress" placeholder="S??? nh??, ???????ng ph???, x??/ph?????ng, qu???n/huy???n" required></textarea>

                         <!--  <button type="submit" name="btnSubmit" class="btn right btnContactSubmit" value="contact" > G???i </button> -->
                        </div>
                    </div>
                    
                    <div class="grid__item text-right one-third small--one-whole">
                        <p>
                            <span class="cart__subtotal-title">T???m t??nh</span>
                            <span class="h3 cart__subtotal"> <?php echo number_format($total_price) ; ?> ???</span>
                        </p>
                        <!-- <button type="submit" name="update" class="btn update-cart">C???p nh???t</button> -->
                        <button type="submit" value="sendOder" name="btnSubmit" class="btn">?????t h??ng</button>
                    </div>
                </div>
            </form>

            <form action="" method="post" class="form-mobile cart table-wrap large--hide">
                <table class="cart-table full">
                    <?php 
                         $total_price1 = 0;
                         foreach ($products as $key1 => $pro1) {
                             if($pro1->sale_percent == 0) {
                            $total_price1 += ($pro1->product_sale * $_SESSION['orderCart'][$pro1->id]);
                            } else {
                            $total_price1 += (($pro1->product_sale * ( 100 - $pro1->sale_percent) / 100) * $_SESSION['orderCart'][$pro1->id]);
                            } ?>
                    <div class="grid cart-item mg-left-0">
                        <div data-label="????n h??ng" class="grid__item medium--one-third small--one-third pd-left0">
                            <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro1->url_part . '.html'?>" class="cart__image">
                                <img src="<?php echo $pro1->image ?>" alt="<?php echo $pro1->title_vi ?>">
                                
                            </a>
                        </div>
                        <div class="grid__item medium--two-thirds small--two-thirds pd-left15">
                            <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro1->url_part . '.html'?>" class="h4">
                                <?php echo $pro1->title_vi ?>
                            </a>
                            <!-- Khuy???n m??i: 1017960497 - Gi???m v?? th???i h???n 10% cho to??n b??? S??ch Kim ?????ng
                            <br> -->
                            <div data-label="S??? l?????ng">
                                <input type="text" name="quantity2" id="sl2<?=$pro1->id ?>" value="<?php echo $_SESSION['orderCart'][$pro1->id] ?>" onchange="soluong2(<?php echo $pro1->id ?>,<?php echo $pro1->product_sale ?>)">
                            </div>
                            <div data-label="????n gi??" class="price">
                                 <?php if($pro1->sale_percent == 0) { ?>
                                    <span class="h3">
                                       <?php echo number_format($pro1->product_sale) ?>???
                                    </span>
                                <?php } else { 
                                    $giasale = $pro1->product_sale * ( 100 - $pro1->sale_percent) / 100;?>
                                    <span class="h3">
                                        <?php echo number_format($giasale) ?>???
                                    </span>
                                <?php } ?>
                            </div>
                            <a href="" onclick="remove2(<?php echo $pro1->id ?>)" class="cart__remove">
                                <small>X??a</small>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </table>
                <div class="grid cart__row">
                    <div class="grid__item two-thirds small--one-whole">
                        <!-- <label for="CartSpecialInstructions">Ghi ch??</label>
                        <textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea> -->
                         <div class="form-vertical clearfix">
                          <label for="ContactFormName" class="hidden-label">name</label>
                          <input type="text"  class="input-full" name="txtName" placeholder="H??? v?? T??n" required>

                          <label for="ContactFormPhone" class="hidden-label">phone</label>
                          <input type="tel"  class="input-full" name="txtPhone" placeholder="S??? ??i???n tho???i" required>

                          <label for="ContactFormEmail" class="hidden-label">email</label>
                          <input type="email"  class="input-full" name="txtEmail" placeholder="Email" required>

                          <label for="ContactFormMessage" class="hidden-label">?????a ch???</label>
                          <textarea rows="5"  class="input-full" name="txtAddress" placeholder="S??? nh??, ???????ng ph???, x??/ph?????ng, qu???n/huy???n" required></textarea>

                         <!--  <button type="submit" name="btnSubmit" class="btn right btnContactSubmit" value="contact" > G???i </button> -->
                        </div>
                    </div>
                    
                    <div class="grid__item text-right one-third small--one-whole">
                        <p>
                            <span class="cart__subtotal-title">T???m t??nh</span>
                            <span class="h3 cart__subtotal"><?php echo number_format($total_price1) ; ?> ???</span>
                        </p>
                        <!-- <button type="submit" name="update" class="btn update-cart">C???p nh???t</button> -->
                        <button type="submit" value="sendOder" name="btnSubmit" class="btn">?????t h??ng</button>
                    </div>
                </div>
            </form>
            <?php } ?>