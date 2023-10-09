@if(isset($UserType) and isset($Email) and $UserType == "Company")
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('')}}/company/logout"><input type='button' name='Logout' Value='Logout' id='Logout' style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight: 400;"></a> &nbsp; &nbsp; 
<br>
<center><h1 style='color: white; background-color: green; border-radius: 29px;'>Company Desk</h1></center>
@else
<script>
<<<<<<< HEAD
      window.location.href = "https://njsmtiplacementscell.000webhostapp.com/login";
=======
        window.location.href = "https://njsmtiplacementscell.000webhostapp.com/logon";
>>>>>>> 3c7be8318fb699997152ab09ea0bc3429244ea16
</script>
@endif