<?php
session_start();
require_once("../includes.php");
require_once("../setup/dbCon.php");
$con = connect();
$sql = "select `name`, `email`, `user_type` from users where `email`='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $sql);
$arr= mysqli_fetch_array($result);
if($arr[2]=="0"){
    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Lindesfrane</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a data-pid ="Home" href="./admin_home.php">Home</a></li>
                <li><a data-pid ="ticket_options" href="#">Ticket</a></li>
                <li><a data-pid ="animal_options" href="#">Animals</a></li>
                <li><a data-pid ="vip_options" href="#">VIP</a></li>
                <li><a data-pid ="show_bookings" href="#">Show Bookings</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo("<a href='www.google.com'>" . $arr[0] . "</a>"); ?></li>
                <li><a id="logout" href="#">Log out</a></li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="margin-left: 0%;">
                    <div class="widget-simple-chart text-right card-box"
                    style="text-align: justify;">

                    <div id="content-pane">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.nav li a').click(function(e) {
            $('.nav li.active').removeClass('active');
            var $parent = $(this).parent();
            $parent.addClass('active');
            e.preventDefault();
        });

        $("[data-pid]").click(
            function() {
                var pid = $(this).data("pid");
                if (pid === "ticket_options") {
                    $("#content-pane").load("./admin_ticket_options.php");
                    
                }else if(pid==="animal_options"){
                   $("#content-pane").load("./admin_animal_options.php");
               }else if(pid==="vip_options"){
                   $("#content-pane").load("./admin_vip_options.php");
               }else if(pid==="show_bookings"){
                   $("#content-pane").load("./show_bookings.php");
               }


show_bookings
           });

        $("#logout").click(function(){
            window.location.href = "http://localhost/Lindesfrane/logout.php";
        });
    });
</script>
<?php }else {
    header("location:http://localhost/Lindesfrane/login.html");
}
?>