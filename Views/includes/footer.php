    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/validaciones.js"></script>

    <script>
    $( "#exit" ).click(function() {
    // $( "#form_alta" ).addClass( "d-none" );
    // $( "#lista" ).removeClass( "col-md-8" ).addClass( "col-md-12" );   
    window.location.href = "index.php?c=usuarios&a=logout";

    });
    $( "#cancelar" ).click(function() {
    window.location.href = "index.php?c=empleados&a=index";
    });
    $( "#cancelarIndex" ).click(function() {
    window.location.href = "index.php?c=nosotros&a=informacion";
    });

  

    </script>
  </body>
</html>
