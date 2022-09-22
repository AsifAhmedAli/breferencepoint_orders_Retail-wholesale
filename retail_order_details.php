<?php
include("db.php");
$idoforder = $_GET['id'];
function secondsToTime($seconds) {
  $dtF = new \DateTime('@0');
  $dtT = new \DateTime("@$seconds");
  return $dtF->diff($dtT)->format('%a d, %h:%i:%s');
}
// echo "<script>alert('".$idoforder."')</script>";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Retail Order Details</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="responsive-nav">
          <a href="" class="logo">
            <img src="./assets/images/logo.svg" alt="" />
          </a>
          <button class="humburger" id="humburger"></button>
        </div>
        <nav id="nav">
          <div class="left">
            <a href="" class="logo">
              <img src="./assets/images/logo.svg" alt="" />
            </a>
          </div>
          <div class="right">
            <p class="company_name">Company Name,</p>
            <a href="" class="logout">Logout</a>
            <img src="./assets/images/company.png" class="profile-img" alt="" />
          </div>
        </nav>
      </div>
    </header>
    <main class="main1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xxl-4 col-lg-4 mb-lg-0 mb-5">
            <div class="d-flex align-items-center back-actions">
              <a href="./retail_orders.php" class="back-button"></a>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <?php 
                                    $sql432 = "SELECT o.status FROM mas_donuts_wholesale.retail_orders o WHERE o.id = '$idoforder'";
                                    $result432 = $conn->query($sql432);
                                    
                                    if ($result432->num_rows > 0) {
                                      while($row432 = $result432->fetch_assoc()) {
                                        $taba = $row432['status'];
                                        // echo "<script>console.log('".$taba."')</script>";
                                      }
                                    }
                  ?>
                  <li class="breadcrumb-item"><a href="./retail_orders.php?tab=<?php echo $taba; ?>">Calendar View</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Invoice Details
                  </li>
                </ol>
              </nav>
            </div>
            <div class="customer-info">
              <h5 class="heading">Customer Information</h5>
              <div class="customer-card">
                <img src="./assets/images/user_img.png" alt="" />
                <div class="customer-bio">
                  <?php
                  // $sql = "SELECT o.*,c.* 
                  // FROM orders o join customers c on o.customer_id = c.id
                  // WHERE o.id = '$idoforder' and o.type1 = 'retail'";

                  $sql = "SELECT o.*, u.id as uid, u.first_name, u.last_name, u.city, u.state, u.create_datetime FROM mas_donuts_wholesale.retail_orders o join useraccounts.retail_users u on u.id = o.retail_users_id  WHERE o.id = '$idoforder'";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      $order_date = $row['order_date'];
                      $create_datetime = $row['create_datetime'];
                      if($create_datetime == null){
                        $create_datetime = "Not Added";
                      }
                      $city = $row['city'];
                      $state = $row['state'];
                      $first_name = $row['first_name'];
                      $last_name = $row['last_name'];
                      $status1 = $row['status'];
                      $pickup_date = $row['pickup_date'];
                      // $email1 = $row['email1'];
                      // $address = $row['address'];
                      // $phone = $row['phone'];
                      // $joined = $row['joined'];
                      $deadlien=strtotime($pickup_date);
                      $remaining = $deadlien - strtotime(date("Y-m-d H:i:s"));
                      // $sql1 = "SELECT * FROM order_items WHERE order_id = '$idoforder'";
                      $sql1 = "SELECT * from mas_donuts_wholesale.retail_order_item where order_id = '$idoforder'";
                      $result1 = $conn->query($sql1);
                    }
                  }
                  ?>
                  <!-- <h5 class="customer-name">Customer Name</h5>
                  <p class="customer-location">USA California</p> -->
                  <h5 class="customer-name"><?php echo $first_name. " " . $last_name; ?></h5>
                  <p class="customer-location"><?php echo $city . " ". $state; ?></p>
                </div>
              </div>
              <hr />
              <div
                class="d-flex align-items-center justify-content-between flex-wrap"
              >
                <p class="mb-0">Joined In</p>
                <!-- <p class="mb-0 text-secondary">August 2022</p> -->
                <p class="mb-0 text-secondary"><?php echo $create_datetime; ?></p>
              </div>
              <hr />
              <div
                class="d-flex align-items-center justify-content-between flex-wrap"
              >
                <p class="mb-0 mr-2">Order Placed at</p>
                <p class="mb-0 text-secondary"><?php echo $order_date; ?></p>
              </div>
              <div class="text-center mt-xl-5 mt-3">
                <button class="btn btn-outline-danger refund-btn"
                <?php if($status1 == "cancelled"  || $status1 == "completed" || $status1 == "canceled" ){
                  echo "disabled";
                } ?>
                onclick="refund('<?php echo $idoforder; ?>')">
                  Refund Order
                </button>
              </div>
            </div>
            <div class="card print-calendar d-xxl-none d-lg-block d-none mt-4">
              <div class="card-header text-center">
                <h4 class="card-heading">Print Order</h4>
              </div>
              <div class="card-body text-center">
                <button class="btn btn-primary has-icon">
                  <img
                    src="./assets/images/icons/print.svg"
                    width="inherit"
                    height="inherit"
                    alt=""
                  />
                  Print Order
                </button>
              </div>
            </div>
          </div>
          
          <div class="col-xxl-5 col-lg-8 mb-lg-0 mb-5">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="subheading">Order's Items List</h4>
              <h5 class="my-badge red"><?php 
              
                              if($status1 == "completed"){
                                echo 'Completed';
                              }
                              else if($status1 == "cancelled"){
                                echo 'Cancelled';
                              }
                              if($pickup_date != null){
                                if($deadlien > strtotime(date("Y-m-d H:i:s"))){
                                  echo secondsToTime($remaining)." Remaining";
                                }
                                else if($deadlien < strtotime(date("Y-m-d H:i:s"))){
                                  echo 'Late';
                                }
                              }
                              if($pickup_date == null && $status1 != "completed" && $status1 != "cancelled"){
                                echo 'Undefined';
                              }



              ?></h5>
              <h4 class="subheading text-secondary">Order #<?php echo $idoforder; ?></h4>
            </div>
            <div class="table-responsive table-overflow fixed-header">
              <table class="table order-details">
                <thead>
                  <tr>
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Refund</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th colspan="3"></th>
                  </tr>
                  <!-- Start of Product -->
                  <?php 
                  
                  if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                      $item_name = $row1['name'];
                      $quantity = $row1['quantity'];
                      $id1 = $row1['product_id'];
                      // echo "<scritpt>console.log('".$id1."')</script>";
                      ?>
                  <tr>
                    <th><?php echo $item_name ?></th>

                    <?php if($quantity == 0){

}
else{
  ?>
                                  <th scope="col">x<?php echo $quantity ?></th>
  <?php
} ?>
                    
                    <th>
                      <button                 <?php if($status1 == "cancelled" || $status1 == "completed"){
                  echo "disabled";
                } ?> class="btn btn-outline-danger refund-btn">
                        Refund
                      </button>
                    </th>
                  </tr>
                  <tr class="product-divider">
                    <th colspan="3">
                      <hr />
                    </th>
                  </tr>
                      <?php
                      $sql2 = "SELECT * FROM mas_donuts_wholesale.retail_order_modifiers WHERE item_id = '$id1'";
                      $result2 = $conn->query($sql2);
                      if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                          $modifierid = $row2['modifier_id'];
                          $modifierquanitiy = $row2['modifier_quantity'];
                          $sql3 = "SELECT * FROM mas_donuts_wholesale.modifiers WHERE id = '$modifierid'";
                          $result3 = $conn->query($sql3);
                          if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {
                              $sub_item_name3 = $row3['name'];
                              // $quantity3 = $row3['quantity'];                              
                              ?>
                              <tr>
                                <td>- <?php echo $sub_item_name3 ?></td>
                                <?php if($modifierquanitiy == 0){

                                }
                                else{
                                  ?>
                                                                  <td>x<?php echo $modifierquanitiy; ?></td>
                                  <?php
                                } ?>

                                <td></td>
                              </tr>
                              <?php
                            }
                          }
                        }
                      }
                      ?>
                      <?php
                    }
                  }
                  ?>

                  <!-- End of Product -->

                  <!-- Start of Product -->
                  <!-- <tr>
                    <th>Large Hot Cofee</th>
                    <th scope="col">x1</th>
                    <th>
                      <button class="btn btn-outline-danger refund-btn">
                        Refund
                      </button>
                    </th>
                  </tr>
                  <tr class="product-divider">
                    <th colspan="3">
                      <hr />
                    </th>
                  </tr>
                  <tr>
                    <td>- Sugar</td>
                    <td>x2</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>- Marshmallow</td>
                    <td>x4</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>- Cream</td>
                    <td>x3</td>
                    <td></td>
                  </tr>
                  <tr class="product-divider-end">
                    <th colspan="3">
                      <hr />
                    </th>
                  </tr> -->
                  <!-- End of Product -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-3 mb-lg-0 mb-5">
            <div class="text-right d-xxl-block d-lg-none d-block">
              <button class="btn btn-primary has-icon">
                <img
                  src="./assets/images/icons/print.svg"
                  width="inherit"
                  height="inherit"
                  alt=""
                />
                Print Order
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div id="div1"> 

    </div>
    <!-- <script src="./assets/js/jquery.slim.min.js"></script> -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script>
    function refund(id){
      $.ajax({
          type: "post",
          data: {id:id},
          url: "backend/cancel_order.php",
          success: function (result) {
              $("#div1").html(result);
          }
      });
    }
    </script>

  </body>
</html>
