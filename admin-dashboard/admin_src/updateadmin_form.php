<?php
// get product id
$admin_id=isset($_GET['admin_id']) ? $_GET['admin_id'] : die('ERROR: Admin ID not found.');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/admin.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$admin = new Admin($db);
 
// set product id property
$admin->ID=$admin_id;
 
// read single product
$admin->readOneAdmin();
?>
<!--we have our html form here where new product information will be entered-->
<form id='update-admin-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        <tr>
            <td>User Name</td>
            <td><input type='text' name='user_name' class='form-control' value='<?php echo htmlspecialchars($admin->user_name, ENT_QUOTES); ?>' required /></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td>
            <input type='text' name='first_name' class='form-control' value='<?php echo htmlspecialchars($admin->first_name, ENT_QUOTES); ?>' required />
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type='text'  name='last_name' class='form-control' value='<?php echo htmlspecialchars($admin->last_name, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='text'  name='password' class='form-control' value='<?php echo htmlspecialchars($admin->password, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type='text' name='type' class='form-control' value='<?php echo htmlspecialchars($admin->type, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
            <td>
                <!-- hidden ID field so that we could identify what record is to be updated -->
                <input type='hidden' name='ID' value='<?php echo $admin_id ?>' /> 
            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-edit'></span> Save Changes
                </button>
            </td>
        </tr>
    </table>
</form>