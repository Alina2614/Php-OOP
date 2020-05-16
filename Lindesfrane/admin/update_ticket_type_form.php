<?php include("header.php");?>
    <div class="container">
        <div class="greeting">
            <div class="form" style="width:30%;">
<form>
    <div class="form-group">
        <label for="ticket_type_name">Ticket type name:</label>
        <!--<input type="text" name="ticket_type_name" class="form-control" id="ticket_type_name">-->
        <select class="form-control" id="ticket_type_name">
            <option value="volvo">Ticket type 1</option>
            <option value="saab">Ticket type 2</option>
            <option value="opel">Ticket type 3</option>
            <option value="audi">Ticket type 4</option>
        </select>
    </div>
    <div class="form-group">
        <label for="ticket_price">Ticket price:</label>
        <input type="number" name="ticket_price" class="form-control" id="ticket_price">
    </div>
    <div class="form-group">
    <b>Offer discount:</b>
        <div class="material-switch pull-right" style="margin-top: 12px;">
            <input id="offer_discount" name="offer_discount" type="checkbox"/>
            <label for="offer_discount" class="label-default"></label>
        </div>
    </div>
    <div class="form-group" style="width: 75%;">
        <label for="discount_amount">Discount amount:</label>
        <input type="number" name="discount_amount" class="form-control" id="discount_amount">
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
    <input type="hidden" name="create_ticket_type">
    <button type="submit" name="save" class="btn btn-default">Save</button>
</form>
</div>
</div>
</div>