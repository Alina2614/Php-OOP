<ul class="nav nav-tabs">
    <li class="active"><a data-pid1="create_ticket_type" href="#">Create Ticket Type</a></li>
    <li><a  data-pid1="view_ticket_types" href="#">View Ticket Types</a></li>
</ul>

<div id="ticket_options_content-pane">
    <div class="container">
        <div class="greeting">
            <div class="form" style="width:30%;">
                <form method="POST" action="./action_pages/addTicketType.php">
                    <div class="form-group">
                        <label for="ticket_type_name">Ticket type name:</label>
                        <input type="text" name="ticket_type_name" class="form-control" id="ticket_type_name">
                    </div>
                    <div class="form-group">
                        <label for="ticket_price">Ticket price:</label>
                        <input type="text" name="ticket_price" class="form-control" id="ticket_price">
                    </div>
                    <div class="form-group">
                        <b>Offer discount:</b>
                        <div class="material-switch pull-right" style="margin-top: 12px;">
                            <input id="offer_discount" name="offer_discount" type="checkbox"/>
                            <label for="offer_discount" class="label-default" selected="false"></label>
                        </div>
                    </div>
                    <div class="form-group" style="width: 75%;">
                        <label for="discount_amount">Discount amount:</label>
                        <input type="text" name="discount_amount" class="form-control" id="discount_amount">
                    </div>
                    <b><span style="margin-left: 95%;
                             position: relative;
                             margin-top: -15%;
                             font-size:24px;
                             float: left;"> %</span></b>
                    <div class="form-group">
                        <label for="ticket_type_description">Description:</label>
                        <input type="textarea" name="ticket_type_description" class="form-control" id="ticket_type_description">
                    </div>
                    <button type="submit" name="save" class="btn btn-default">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    $('.nav-tabs li a').click(function(e) {
    $('.nav-tabs li.active').removeClass('active');
    var $parent = $(this).parent();
    $parent.addClass('active');
    e.preventDefault();
    });

    // $("#offer_discount").click(
    //     function() {
    //         alert( $("#offer_discount").val());
    //     }
    // );
    $("[data-pid1]").click(
    function() {
    var pid1 = $(this).data("pid1");
    if (pid1 === "create_ticket_type") {
    $("#ticket_options_content-pane").empty();
    $("#ticket_options_content-pane").load("./create_ticket_type_form.php");

    }else if(pid1==="view_ticket_types"){
    $("#ticket_options_content-pane").empty();
    $("#ticket_options_content-pane").load("./view_ticket_types.php");
    }
    });

    });
</script>