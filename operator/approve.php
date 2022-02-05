<?php 
    session_start();
    if (!isset($_SESSION['user_type'])) {
        echo '<meta http-equiv="refresh" content="0; url=../join.php">';
     }
    include '../saver/db.php';
    include_once '../header.php';
    
    $id = $_GET['id'];
    $update = "UPDATE orders SET received = 1 WHERE order_id = $id";
    $query = $c->query($update);
    echo '<meta http-equiv="refresh" content="0; url=manage_orders.php">';
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>

</body>

</html> 