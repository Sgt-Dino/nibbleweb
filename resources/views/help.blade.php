@include('layouts.top')
<h1>Help</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Contact information</div>
                    <div class="panel-body">
                        <table class="table width=default table-striped">
                            <th class="text-center">Email</th>
                            <th class="text-center">Customer Care</th>
                            <tr>
                                <td align="center">nibble@gmail.com</td>
                                <td align="center">041 993 2589</td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <th>Customer arrives and checks-in</th>
                            <tr>
                                <td>When the customer arrives, the restaurant will check the customer in. This is to alert the system that the customer has arrived for their appointment.</td>
                            </tr>
                            <tr>
                                <td>After the customer has been 'checked-in', a status update will pop-up on the top of the page. </td>
                            </tr>
                        </table>
                        <br>
                                <img src="homecustomerarrived.png" alt="Home arrive" class="center" width="900" height="480">
                                    <br><br><br>
                                <img src="homecustomercheckedin.png" alt="Home checked-in" class="center" width="900" height="480">
                                    <br><br>
                    <hr>
                        <br>
                        <table class="table table-hover table-striped">
                            <th>Customer missed the booking request</th>
                            <tr>
                                <td>When the customer does not arrive, the restaurant assumes the customer 'missed' their appointment. This is to alert the system that the customer did not arrive for their appointment.</td>
                            </tr>
                            <tr>
                                <td>After the customer has 'missed' their appointment, a status update will pop-up on the top of the page. </td>
                            </tr>
                        </table>
                        <br>
                                <img src="homecustomermissed.png" alt="Home missed" class="center" width="900" height="480">
                                    <br><br><br>
                                <img src="homebookingdeclined.png" alt="Home declined" class="center" width="900" height="480">
                                    <br><br>
                    </div>
            </div>
        </div>
    </div>
</div>

    <br>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bookings</div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <th>Restaurant accepts booking request</th>
                        <tr>
                            <td>When a customer makes a booking request, the restaurant has the option to accept or decline the booking request. This is to alert the customer that the restaurant has accepted or declined the booking request.</td>
                        </tr>
                    </table>
                    <br>
                            <img src="bookingacceptrequest.png" alt="Booking accept" class="center" width="900" height="480">
                                <br><br><br>
                            <img src="bookingdeclinerequest.png" alt="Booking declined" class="center" width="900" height="480">
                                <br><br>
                <hr>
                    <br>
                    <table class="table table-hover table-striped">
                        <th>Restaurant accepts declined booking request</th>
                        <tr>
                            <td>When a customer makes a booking request and the restaurant declined the request, the restaurant has the option to "re-accept" the booking request that was declined.</td>
                        </tr>
                    </table>
                    <br>
                            <img src="bookingacceptdeclinedrequest.png" alt="Booking accept declined booking" class="center" width="900" height="480">
                                <br><br><br>
                <hr>
                    <br>
                    <table class="table table-hover table-striped">
                        <th>Restaurant booking requests accepted for this week</th>
                        <tr>
                            <td>When a booking request has been accepted by the restaurant, this is where it will be displayed.</td>
                        </tr>
                    </table>
                    <br>
                            <img src="bookingacceptedrequest.png" alt="Booking successfully accepted for this week" class="center" width="900" height="480">
                            <br><br>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <div class="panel-body">
                <hr>
                                <h3>Food</h3>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Edit/ update food</th>
                        </table>
                        <br>
                                    <img src="menufoodedit.png" alt="Edit food" class="center" width="900" height="480">
                                        <br><br><br>

                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Delete food</th>
                        </table>
                        <br>
                                        <img src="menufooddelete.png" alt="Delete food" class="center" width="900" height="480">
                                            <br><br><br>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Add new food</th>
                            <tr>
                                <td>The restaurant has the authority to add a new food.</td>
                            </tr>
                            <tr>
                                <td>Food name: example- Mushroom swizz burger</td>
                            </tr>
                            <tr>
                                <td>Item description: example- 150g beef burger will heaps of sauteed mushrooms.</td>
                            </tr>
                        </table>
                        <br>
                                    <img src="menuaddfood.png" alt="Add food" class="center" width="900" height="480">
                                    <br><br>
                <hr>
                                <h3>Category</h3>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Edit/ update category</th>
                        </table>
                        <br>
                                    <img src="menucategoryupdate.png" alt="Category update/edit" class="center" width="900" height="480">
                                        <br><br><br>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Delete category</th>
                        </table>
                        <br>
                                    <img src="menucategorydelete.png" alt="Category delete" class="center" width="900" height="480">
                                        <br><br><br>
                                    <img src="menucategorydeleteremoved.png" alt="Category removed successfully" class="center" width="900" height="480">
                                        <br><br><br>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Retrieve category</th>
                            <tr>
                                <td>If the restaurant has deleted the category but wants to reinstate it, there is an option to 'retrieve' the category.</td>
                            </tr>
                        </table>
                        <br>
                                    <img src="menucategoryretrieve.png" alt="Retrieve category" class="center" width="900" height="480">
                                        <br><br><br>
                                    <img src="menucategoryretrievesuccessful.png" alt="Category successfully retrieved" class="center" width="900" height="480">
                                        <br><br><br>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Create new category</th>
                        </table>
                        <br>
                                    <img src="menucatcreate.png" alt="Create category" class="center" width="900" height="480">
                                        <br><br>
                <hr>
                                <h3>Special</h3>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Create new special</th>
                        </table>
                        <br>
                                    <img src="menuspecials.png" alt="Specials" class="center" width="900" height="480">
                                        <br><br><br>
                    <hr>
                    <br>
                        <table class="table table-hover table-striped">
                            <th>Creating new special</th>
                            <tr>
                                <td>Special name: example- Avo ranch box meal</td>
                            </tr>
                            <tr>
                                <td>Special description: example- Avo burger, large chips, bottomless softdrink.</td>
                            </tr>
                        </table>
                        <br>
                                    <img src="menuspecialsadd.png" alt="Add specials" class="center" width="900" height="480">
                                        <br><br>
                            <hr>
                        <div id="copyright text-right">© Copyright 2018 Nibble</div>
                    </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.bottom')