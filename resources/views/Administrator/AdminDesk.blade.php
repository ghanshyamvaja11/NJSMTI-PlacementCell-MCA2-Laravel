@if(isset($UserType) and isset($Email) and $UserType == "Administrator")
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('')}}/administrator/logout"><input type='button' name='Logout' Value='Logout' id='Logout' style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight: 400;"></a> &nbsp; &nbsp; 
    {{-- <a href="{{url('')}}/administrator/changepassword"><input type="button" name="Change_Password" Value="Change Password" id="Change_Password" style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight:  400;"></a> &nbsp;&nbsp; <a href="{{url('')}}/administrator/changeemail"><input type="button" name="Change_Email" Value="Change Email" id="Change Email" style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight:  400;"></a> --}}
<br>
<center><h1 style='color: white; background-color: green; border-radius: 29px; padding-bottom: 4.2px;'>Administrator Desk</h1></center><br>
@else
<script>
<<<<<<< HEAD
    window.location.href = "https://njsmtiplacementscell.000webhostapp.com/login";
=======
    window.location.href = "https://njsmtiplacementscell.000webhostapp.com/logon";
>>>>>>> 3c7be8318fb699997152ab09ea0bc3429244ea16
</script>
@endif