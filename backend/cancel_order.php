<?php
include('../db.php');
$idoforder = $_POST['id'];
$sql = "UPDATE mas_donuts_wholesale.retail_orders SET status ='cancelled' WHERE id='$idoforder'";

if ($conn->query($sql) === TRUE) {
//   echo "Record updated successfully";
    echo "<script>Swal.fire({
      icon: 'success',
      title: 'Done...',
      text: 'Order has been cancelled!',
      allowOutsideClick: false
    })
    $( 'button.swal2-confirm' ).click(function() {
    window.location.reload();
    });
    </script>";
}
?>