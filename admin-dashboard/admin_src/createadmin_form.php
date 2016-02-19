
<form id='create-admin-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>User Name</td>
            <td><input type='text' name='user_name' class='form-control' required /></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type='text' name='first_name' class='form-control' required></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type='text'  name='last_name' class='form-control' required /></td>
        </tr>
          <tr>
            <td>Password</td>
            <td><input type='text'  name='password' class='form-control' required /></td>
        </tr>
          <tr>
            <td>Type</td>
            <td><input type='text' name='type' class='form-control' required /></td>
        </tr>
        <tr>
            <td></td>
            <td>                
                <button type='submit' class='btn btn-primary'>
            <span class='glyphicon glyphicon-plus'></span> Create New Admin User
        </button>
            </td>
        </tr>
    </table>
</form>