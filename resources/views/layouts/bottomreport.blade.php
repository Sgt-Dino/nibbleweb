<p style="visibility:hidden">This application is to be used by authrized Nibble users only. Nibble is the sole property of Skedaddle. Please contact Skedaddle for more information regarding Nibble and the use therof. The use of this application does not amdit you the right to edit or change it as you wish.</p>


            </div> <!-- id="content" -->     
        </div>


        <!-- jQuery CDN -->
         
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
                    $("#itemlist").click(function(e) {
                    $("#itemlist").removeClass("active");
                    $(e.target).addClass("active");
                    });
                    
                    $('#example').DataTable();
             });
         </script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH5nbLi84BB3QcgwUe-0lMgQZon2C_sB4&callback=myMap"></script>
    </body>
</html>
