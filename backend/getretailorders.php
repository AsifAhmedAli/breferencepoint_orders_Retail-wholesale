<style>
    .order-card.green1 .card-header {
    background-color: rgba(2, 110, 31,.251);
    color: rgba(2, 110, 31);
}
.order-card.red1 .card-header {
    background-color: rgba(110, 2, 2,.251);
    color: rgba(110, 2, 2);
}
</style>
<?php
include("../db.php");

$current_month = $_POST['cuurentmonth'];
$current_year = $_POST['cuurentyear'];
$tab = $_POST['tab'];
// echo "<script>console.log('".$tab."')</script>";
if($tab == "pending"){
    getorders($conn, $current_month, $current_year);
}
if($tab == "completed"){
    getorders1($conn, $current_month, $current_year, $tab);
}
if($tab == "cancelled"){
    getorders2($conn, $current_month, $current_year, $tab);
}


function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a d, %h:%i:%s');
}
                      function getorders($conn, $current_month, $current_year){
                        
                        // $colors = ["blue", "pink", "purple", "info", "warning", "green1", "red1"];
  
                        // Display the first shuffle element of array
                        // echo $arr[0];
                        // console.log(random, months[random]);
                        $monthstart = $current_year."-".$current_month."-01";
                          $monthend =  date('Y/m/t', strtotime($current_month));
                          $monthstart =  date('Y/m/d', strtotime($monthstart));
                          $monthend = date("Y-m-d",strtotime ( '+1 day' , strtotime ( $monthend ) )) ;
                          // echo "<script>console.log('".$monthstart."')</script>";
                          // echo "<script>console.log('".$monthend."')</script>";
                        // $sql = "SELECT o.*,c.name
                        // FROM orders o join customers c on o.customer_id = c.id
                        // WHERE o.deadline > '$monthstart' AND o.deadline <=  '$monthend' and o.type1 = 'retail' and o.status1 = 'pending'";

                        // roi.quantity, roi.name
                        // join mas_donuts_wholesale.retail_order_item roi on o.id = roi.order_id
                        $sql = "SELECT o.*, u.id as uid, u.first_name, u.last_name FROM mas_donuts_wholesale.retail_orders o join useraccounts.retail_users u on u.id = o.retail_users_id WHERE o.order_date >= '$monthstart' AND o.order_date <=  '$monthend' and o.order_type = 'Retail' and (o.status = 'Paid' or o.status = 'Active' or o.status = 'paid' or o.status = 'active' ) order by o.order_date asc";
                        //       --make it inclusive for a datetime type
                        // --   AND DATEPART(hh,[dateColumn]) >= 6 AND DATEPART(hh,[dateColumn]) <= 22 
                        // --       -- gets the hour of the day from the datetime
                        // --   AND DATEPART(dw,[dateColumn]) >= 3 AND DATEPART(dw,[dateColumn]) <= 5"; 
                            //   -- gets the day of the week from the datetime"
                        // -- $sql = "SELECT o.*, c.* FROM orders o join customers c on o.customer_id = c.id";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          $i = 1;
                          while($row = $result->fetch_assoc()) {
                            // shuffle($colors);
                            // date_default_timezone_set("Pakistan");
                            // $d=mktime(13, 14, 54, 8, 12, 2014);
                            // date_default_timezone_set("America/New_York");
                            // echo date("Y-m-d H:i:s");

                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            if($status == "completed"  || $status == "Completed"){
                              $colors = "green1";
                            }
                            if($status == "canceled"  || $status == "Canceled"){
                              $colors = "red1";
                            }
                            if($status == "active" || $status == "Active"){
                              $colors = "info";
                            }
                            if($status == "Pending"  || $status == "pending"){
                              $colors = "purple";
                            }
                            if($status == "Paid"  || $status == "paid"){
                              $colors = "purple";
                            }
                            // echo $remaining;
                            
                            // $remaining = round($remaining / 60);
                              $order_id = $row['id'];
                            //   $placed_at = $row['deadline'];
                              $name = $row['name'];
                              $first_name = $row['first_name'];
                              $last_name = $row['last_name'];
                              
                                ?>
                          <div class="col-xl-2 col-lg-3 col-md-6 mb-xl-4 mb-3">
                              <a
                                href="./retail_order_details.php?id=<?php echo $order_id ?>"
                                class="order-card <?php echo $colors; 
                                if($row['status1'] == "completed"){
                                    echo " completed";
                                }
                                if($row['status1'] == "cancelled"){
                                  echo " cancelled";
                              }
                                
                                ?>"
                              >
                                <div class="card-header"><?php echo $i; ?> - Order #<?php echo $order_id; ?></div>
                                <div class="card-body">
                                  <div class="info">
                                    <img
                                      src="./assets/images/icons/field_time.svg"
                                      height="20"
                                      width="20"
                                      alt=""
                                    />
                                    <p>Placed at <span><?php echo $order_date; ?></span></p>
                                  </div>
                                  <div class="info">
                                    <img
                                      src="./assets/images/icons/time_picker.svg"
                                      height="20"
                                      width="20"
                                      alt=""
                                    />
                                    <p class="time">
                                        <?php 
                                      if($row['pickup_date'] == null){
                                        echo "No Date Added";
                                      }
                                      else{
                                        $deadlien = $row['pickup_date'];
                                        $deadlien1=strtotime($deadlien);
                                        $remaining = $deadlien1 - strtotime(date("Y-m-d H:i:s"));

                                        if( $deadlien1 > strtotime(date("Y-m-d H:i:s"))){
                                          echo 'Time remaining <span class="time_clock">'.secondsToTime($remaining).'</span>';
                                        }
                                        if( $deadlien1 < strtotime(date("Y-m-d H:i:s"))){
                                          echo 'Late';
                                        }
                                      }
                                        // if($row['status1'] == "completed"){
                                        //   echo 'Completed';
                                        // }

                                        // if($row['status1'] == "cancelled"){
                                        //   echo 'Cancelled';
                                        // }
                                        ?>

                                    </p>
                                  </div>
                                  <div class="user-info">
                                    <img
                                      src="./assets/images/user_img.png"
                                      width="45"
                                      height="45"
                                      alt=""
                                    />
                                    <p><?php echo $first_name . " ". $last_name; ?></p>
                                  </div>
                                </div>
                              </a>
                            </div>
                                        <?php
                                        $i++;
                          } 
                        }
                      }




                      function getorders1($conn, $current_month, $current_year, $tab){
                        
                        // $colors = ["blue", "pink", "purple", "info", "warning", "green1", "red1"];
  
                        // Display the first shuffle element of array
                        // echo $arr[0];
                        // console.log(random, months[random]);
                        $monthstart = $current_year."-".$current_month."-01";
                          $monthend =  date('Y/m/t', strtotime($current_month));
                          $monthstart =  date('Y/m/d', strtotime($monthstart));
                          $monthend = date("Y-m-d",strtotime ( '+1 day' , strtotime ( $monthend ) )) ;
                          // echo "<script>console.log('".$monthstart."')</script>";
                          // echo "<script>console.log('".$monthend."')</script>";
                        // $sql = "SELECT o.*,c.name
                        // FROM orders o join customers c on o.customer_id = c.id
                        // WHERE o.deadline > '$monthstart' AND o.deadline <=  '$monthend' and o.type1 = 'retail' and o.status1 = 'pending'";

                        // roi.quantity, roi.name
                        // join mas_donuts_wholesale.retail_order_item roi on o.id = roi.order_id
                        $sql = "SELECT o.*, u.id as uid, u.first_name, u.last_name FROM mas_donuts_wholesale.retail_orders o join useraccounts.retail_users u on u.id = o.retail_users_id WHERE o.order_date >= '$monthstart' AND o.order_date <=  '$monthend' and o.order_type = 'Retail' and (o.status = 'Completed' or o.status = 'completed') order by o.order_date asc";
                        //       --make it inclusive for a datetime type
                        // --   AND DATEPART(hh,[dateColumn]) >= 6 AND DATEPART(hh,[dateColumn]) <= 22 
                        // --       -- gets the hour of the day from the datetime
                        // --   AND DATEPART(dw,[dateColumn]) >= 3 AND DATEPART(dw,[dateColumn]) <= 5"; 
                            //   -- gets the day of the week from the datetime"
                        // -- $sql = "SELECT o.*, c.* FROM orders o join customers c on o.customer_id = c.id";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          $i = 1;
                          while($row = $result->fetch_assoc()) {
                            // shuffle($colors);
                            // date_default_timezone_set("Pakistan");
                            // $d=mktime(13, 14, 54, 8, 12, 2014);
                            // date_default_timezone_set("America/New_York");
                            // echo date("Y-m-d H:i:s");

                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            if($status == "completed"  || $status == "Completed"){
                              $colors = "green1";
                            }
                            if($status == "canceled"  || $status == "Canceled"){
                              $colors = "red1";
                            }
                            if($status == "active" || $status == "Active"){
                              $colors = "info";
                            }
                            if($status == "Pending"  || $status == "pending"){
                              $colors = "purple";
                            }
                            if($status == "Paid"  || $status == "paid"){
                              $colors = "purple";
                            }
                            // echo $remaining;
                            
                            // $remaining = round($remaining / 60);
                              $order_id = $row['id'];
                            //   $placed_at = $row['deadline'];
                              $name = $row['name'];
                              $first_name = $row['first_name'];
                              $last_name = $row['last_name'];
                              
                                ?>
                          <div class="col-xl-2 col-lg-3 col-md-6 mb-xl-4 mb-3">
                              <a
                                href="./retail_order_details.php?id=<?php echo $order_id ?>"
                                class="order-card <?php echo $colors; 
                                if($row['status1'] == "completed"){
                                    echo " completed";
                                }
                                if($row['status1'] == "cancelled"){
                                  echo " cancelled";
                              }
                                
                                ?>"
                              >
                                <div class="card-header"><?php echo $i; ?> - Order #<?php echo $order_id; ?></div>
                                <div class="card-body">
                                  <div class="info">
                                    <img
                                      src="./assets/images/icons/field_time.svg"
                                      height="20"
                                      width="20"
                                      alt=""
                                    />
                                    <p>Placed at <span><?php echo $order_date; ?></span></p>
                                  </div>
                                  <div class="info">
                                    <img
                                      src="./assets/images/icons/time_picker.svg"
                                      height="20"
                                      width="20"
                                      alt=""
                                    />
                                    <p class="time">
                                        <?php 
                                      if($row['pickup_date'] == null){
                                        echo "No Date Added";
                                      }
                                      else{
                                        $deadlien = $row['pickup_date'];
                                        $deadlien1=strtotime($deadlien);
                                        $remaining = $deadlien1 - strtotime(date("Y-m-d H:i:s"));

                                        if( $deadlien1 > strtotime(date("Y-m-d H:i:s"))){
                                          echo 'Time remaining <span class="time_clock">'.secondsToTime($remaining).'</span>';
                                        }
                                        if( $deadlien1 < strtotime(date("Y-m-d H:i:s"))){
                                          echo 'Late';
                                        }
                                      }
                                        // if($row['status1'] == "completed"){
                                        //   echo 'Completed';
                                        // }

                                        // if($row['status1'] == "cancelled"){
                                        //   echo 'Cancelled';
                                        // }
                                        ?>

                                    </p>
                                  </div>
                                  <div class="user-info">
                                    <img
                                      src="./assets/images/user_img.png"
                                      width="45"
                                      height="45"
                                      alt=""
                                    />
                                    <p><?php echo $first_name . " ". $last_name; ?></p>
                                  </div>
                                </div>
                              </a>
                            </div>
                                        <?php
                                        $i++;
                          } 
                        }
                    }





                    function getorders2($conn, $current_month, $current_year, $tab){
                        
                        // $colors = ["blue", "pink", "purple", "info", "warning", "green1", "red1"];
  
                        // Display the first shuffle element of array
                        // echo $arr[0];
                        // console.log(random, months[random]);
                        $monthstart = $current_year."-".$current_month."-01";
                          $monthend =  date('Y/m/t', strtotime($current_month));
                          $monthstart =  date('Y/m/d', strtotime($monthstart));
                          $monthend = date("Y-m-d",strtotime ( '+1 day' , strtotime ( $monthend ) )) ;
                          // echo "<script>console.log('".$monthstart."')</script>";
                          // echo "<script>console.log('".$monthend."')</script>";
                        // $sql = "SELECT o.*,c.name
                        // FROM orders o join customers c on o.customer_id = c.id
                        // WHERE o.deadline > '$monthstart' AND o.deadline <=  '$monthend' and o.type1 = 'retail' and o.status1 = 'pending'";

                        // roi.quantity, roi.name
                        // join mas_donuts_wholesale.retail_order_item roi on o.id = roi.order_id
                        $sql = "SELECT o.*, u.id as uid, u.first_name, u.last_name FROM mas_donuts_wholesale.retail_orders o join useraccounts.retail_users u on u.id = o.retail_users_id WHERE o.order_date >= '$monthstart' AND o.order_date <=  '$monthend' and o.order_type = 'Retail' and (o.status = 'Cancelled' or o.status = 'Canceled' or o.status = 'cancelled' or o.status = 'canceled')  order by o.order_date asc";
                        //       --make it inclusive for a datetime type
                        // --   AND DATEPART(hh,[dateColumn]) >= 6 AND DATEPART(hh,[dateColumn]) <= 22 
                        // --       -- gets the hour of the day from the datetime
                        // --   AND DATEPART(dw,[dateColumn]) >= 3 AND DATEPART(dw,[dateColumn]) <= 5"; 
                            //   -- gets the day of the week from the datetime"
                        // -- $sql = "SELECT o.*, c.* FROM orders o join customers c on o.customer_id = c.id";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          $i = 1;
                          while($row = $result->fetch_assoc()) {
                            // shuffle($colors);
                            // date_default_timezone_set("Pakistan");
                            // $d=mktime(13, 14, 54, 8, 12, 2014);
                            // date_default_timezone_set("America/New_York");
                            // echo date("Y-m-d H:i:s");

                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            if($status == "completed"  || $status == "Completed"){
                              $colors = "green1";
                            }
                            if($status == "cancelled"  || $status == "Cancelled" || $status == "canceled"  || $status == "Canceled"){
                              $colors = "red1";
                            }
                            if($status == "active" || $status == "Active"){
                              $colors = "info";
                            }
                            if($status == "Pending"  || $status == "pending"){
                              $colors = "purple";
                            }
                            if($status == "Paid"  || $status == "paid"){
                              $colors = "purple";
                            }
                            // echo $remaining;
                            
                            // $remaining = round($remaining / 60);
                              $order_id = $row['id'];
                            //   $placed_at = $row['deadline'];
                              $name = $row['name'];
                              $first_name = $row['first_name'];
                              $last_name = $row['last_name'];
                              
                                ?>
                          <div class="col-xl-2 col-lg-3 col-md-6 mb-xl-4 mb-3">
                              <a
                                href="./retail_order_details.php?id=<?php echo $order_id ?>"
                                class="order-card <?php echo $colors; 
                                if($row['status1'] == "completed"){
                                    echo " completed";
                                }
                                if($row['status1'] == "cancelled"){
                                  echo " cancelled";
                              }
                                
                                ?>"
                              >
                                <div class="card-header"><?php echo $i; ?> - Order #<?php echo $order_id; ?></div>
                                <div class="card-body">
                                  <div class="info">
                                    <img
                                      src="./assets/images/icons/field_time.svg"
                                      height="20"
                                      width="20"
                                      alt=""
                                    />
                                    <p>Placed at <span><?php echo $order_date; ?></span></p>
                                  </div>
                                  <div class="info">
                                    <img
                                      src="./assets/images/icons/time_picker.svg"
                                      height="20"
                                      width="20"
                                      alt=""
                                    />
                                    <p class="time">
                                        <?php 
                                      if($row['pickup_date'] == null){
                                        echo "No Date Added";
                                      }
                                      else{
                                        $deadlien = $row['pickup_date'];
                                        $deadlien1=strtotime($deadlien);
                                        $remaining = $deadlien1 - strtotime(date("Y-m-d H:i:s"));

                                        if( $deadlien1 > strtotime(date("Y-m-d H:i:s"))){
                                          echo 'Time remaining <span class="time_clock">'.secondsToTime($remaining).'</span>';
                                        }
                                        if( $deadlien1 < strtotime(date("Y-m-d H:i:s"))){
                                          echo 'Late';
                                        }
                                      }
                                        // if($row['status1'] == "completed"){
                                        //   echo 'Completed';
                                        // }

                                        // if($row['status1'] == "cancelled"){
                                        //   echo 'Cancelled';
                                        // }
                                        ?>

                                    </p>
                                  </div>
                                  <div class="user-info">
                                    <img
                                      src="./assets/images/user_img.png"
                                      width="45"
                                      height="45"
                                      alt=""
                                    />
                                    <p><?php echo $first_name . " ". $last_name; ?></p>
                                  </div>
                                </div>
                              </a>
                            </div>
                                        <?php
                                        $i++;
                          } 
                        }
                      }
                    ?>
                    