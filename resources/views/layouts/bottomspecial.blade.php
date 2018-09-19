<p style="visibility:hidden">This application is to be used by authrized Nibble users only. Nibble is the sole property of Skedaddle. Please contact Skedaddle for more information regarding Nibble and the use therof. The use of this application does not amdit you the right to edit or change it as you wish.</p>


            </div> <!-- id="content" -->     
        </div>


        <!-- jQuery CDN -->
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">

         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function() {
         $( "#calendar1" ).datepicker({
            format: 'yyyy-mm-dd'
         });
         $( "#calendar2" ).datepicker({
            format: 'yyyy-mm-dd'            
         });               
    });
</script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
                    $("#itemlist").click(function(e) {
                    $("#itemlist").removeClass("active");
                    $(e.target).addClass("active");
                    });
             });
         </script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH5nbLi84BB3QcgwUe-0lMgQZon2C_sB4&callback=myMap"></script>
    </body>
</html>
