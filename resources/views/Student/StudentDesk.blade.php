@if(isset($UserType) and isset($Email) and $UserType == "Student")
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('')}}/student/logout"><input type='button' name='Logout' Value='Logout' id='Logout' style="color: white;
    background-color: black; cursor: pointer; border-radius: 15.9px; font-size: 13.4px; font-weight: 400;"></a> &nbsp; &nbsp; 
<br>
<center><h1 style='color: white; background-color: green; border-radius: 29px;'>Student Desk</h1></center>
@else
<script>
    window.location.href = "https://njsmtiplacementscell.000webhostapp.com/login";
</script>
@endif