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
    <title>Wholesale Order Details</title>

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
          <button class="humburger" id="humburger">

          </button>
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
                  <li class="breadcrumb-item"><a href="./wholesale_orders_calendar.php">Calendar View</a></li>
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
                  $sql = "SELECT o.*
                  FROM mas_donuts_wholesale.retail_orders o
                  WHERE o.id = '$idoforder'";
                  
                  
                  // SELECT o.*, u.id as uid, u.first_name, u.last_name,
                  
                  // FROM orders o join customers c on o.customer_id = c.id
                  // WHERE o.id = '$idoforder' and o.type1 = 'wholesale'";



                        // WHERE o.order_date >= '$monthstart' AND o.order_date <=  '$monthend' order by o.order_date asc
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      $order_date = $row['order_date'];
                      // $placed_at = $row['placed_at'];
                      // $type1 = $row['type1'];
                      // $status1 = $row['status1'];
                      $first_name = $row['first_name'];
                      $last_name = $row['last_name'];
                      // $city = $row['city'];
                      // $state = $row['state'];
                      // $email1 = $row['email1'];
                      // $address = $row['address'];
                      // $phone = $row['phone'];
                      // $joined = $row['joined'];
                      // echo "<script>console.log('".$order_date.$first_name.$last_name.$city."')</script>";
                      $deadlien=strtotime($order_date);
                      $remaining = $deadlien - strtotime(date("Y-m-d H:i:s"));
                      $sql1 = "SELECT * FROM mas_donuts_wholesale.retail_order_item WHERE order_id = '$idoforder'";
                      // $sql1 = "SELECT o.*, p.id as pid from order_item o join product p on p.id = o.product_id where o.order_id = '$idoforder'";
                      $result1 = $conn->query($sql1);
                      // echo("Error description: " . $conn -> error);
                    }
                  }
                  ?>
                  <!-- <h5 class="customer-name">Customer Name</h5>
                  <p class="customer-location">USA California</p> -->
                  <h5 class="customer-name"><?php echo $first_name . " " . $last_name; ?></h5>
                  <!-- <p class="customer-location"><?php //echo $city." ". $state; ?></p> -->
                </div>
              </div>
              <hr />
              <div
                class="d-flex align-items-center justify-content-between flex-wrap"
              >
                <p class="mb-0">Joined In</p>
                <!-- <p class="mb-0 text-secondary"><?php //echo $joined; ?></p> -->
              </div>
              <hr />
              <div
                class="d-flex align-items-center justify-content-between flex-wrap"
              >
                <p class="mb-0 mr-2">Order Placed at</p>
                <p class="mb-0 text-secondary"><?php echo $order_date; ?></p>
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
              <h4 class="subheading text-secondary">Order #<?php echo $idoforder; ?></h4>
            </div>
            <div class="table-responsive table-overflow table-overflow2 fixed-header">
              <table class="table wholesale-order-details">
                <thead>
                  <tr>
                    <th scope="col">Item Number</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th colspan="2"></th>
                  </tr>
                  <!-- Row Start -->
                  <?php 
                  
                  if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                      $product_id = $row1['product_id'];
                      $quantity = $row1['quantity'];
                      // echo "<script>console.log('".$product_id.$quantity."')</script>";
                      // $id1 = $row1['id'];
                      ?>
                  <tr>
                    <td>
                      <a href="">#<?php  echo $product_id; ?></a>
                    </td>
                    <td><?php  echo $quantity; ?></td>
                  </tr>
                  <tr class="product-divider">
                    <th colspan="2">
                      <hr />
                    </th>
                  </tr>
                  <?php
                                      }
                                    }
                                  ?>
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
    <script src="./assets/js/jquery.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
  </body>
</html>
