
<form id='create-product-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control' required></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' min='1' name='item_price' class='form-control' required /></td>
        </tr>
          <tr>
            <td>SKU</td>
            <td><input type='text' min='1' name='SKU' class='form-control' required /></td>
        </tr>
          <tr>
            <td>Image</td>
            <td><input type='text' min='1' name='image' class='form-control' required /></td>
        </tr>
        <tr>
            <td></td>
            <td>                
                <button type='submit' class='btn btn-primary'>
            <span class='glyphicon glyphicon-plus'></span> Create New Course
        </button>
            </td>
        </tr>
    </table>
</form>