<?php


    require_once('../libs/PHPTAL-1.3.0/PHPTAL.php');

    // render the whole page using PHPTAL

    // finally, create a new template object
    $template = new PHPTAL('dashboard.xhtml'); //CHANGE index.xhtml

    // now add the variables for processing and that you created from above:
    $template->page_title = "Admin Dashboard";


    // execute the template
    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }


?>
    <script src="../js/jquery-2.2.0.min.js">
    </script> 
    <script src="../js/bootstrap.min.js">
    </script> 
    <script type='text/javascript'>
        
    // COURSE EDITOR FUNCTIONS //     

    function changePageTitle(page_title){   

    $('#page-title').text(page_title);
     

    document.title=page_title;
    }
    </script> 
    <script type='text/javascript'>
    $(document).ready(function(){
     

    $('#create-product').click(function(){

        changePageTitle('Create New Course');
         
     
         
      
        $('#create-product').hide();
         
       
        $('#read-products').show();
         
       
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('course_src/create_form.php', function(){ 
             

                 
                
                $('#page-content').fadeIn('slow');
            });
        });
    });


    });
    $(document).on('submit', '#create-product-form', function() {


     

    $.post("course_src/create.php", $(this).serialize())
        .done(function(data) {
             
            
            $('#create-product').show();
             
            
            $('#read-products').hide();
             
            
            showProducts();
        });
             
    return false;
    });


    showProducts();


    $('#read-products').click(function(){
     


    $('#create-product').show();
     

    $('#read-products').hide();
     

    showProducts();
    });


    function showProducts(){
         
    // change page title
    changePageTitle('All Courses');
     

    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('course_src/read.php', function(){
          
          
             
            
            $('#page-content').fadeIn('slow');
        });
    });
    }
    $(document).on('click', '.edit-btn', function(){ 

    changePageTitle('Update Product');

    var product_id = $(this).closest('td').find('.product-id').text();
     

     

    $('#create-product').hide();
    $('#read-products').show();


    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('course_src/update_form.php?product_id=' + product_id, function(){
            
            
            $('#page-content').fadeIn('slow');
        });
    });
    }); 


    $(document).on('submit', '#update-product-form', function() {


     

    $.post("course_src/update.php", $(this).serialize())
        .done(function(data) {
             
           
            $('#create-product').show();
             
            
            $('#read-products').hide();
         
            
            showProducts();
        });
             
    return false;
    });

    $(document).on('click', '.delete-btn', function(){ 
    if(confirm('Are you sure you want to delete this course?')){
     
        
        var product_id = $(this).closest('td').find('.product-id').text();
         
       
        $.post("course_src/delete.php", { ID: product_id })
            .done(function(data){
                console.log(data);
                 
            
                 
                showProducts();
                 
            });
    }
    });
        
    // COURSE EDITOR FUNCTIONS END // 
        
         // ADMIN EDITOR FUNCTIONS //
        
        
 function changePageTitleAdmin(admin_page_title){   

    $('#admin-page-title').text(admin_page_title);
     

    document.title=admin_page_title;
    }       
    
$(document).ready(function(){       
$('#create-admin').click(function(){

        changePageTitleAdmin('Create New Admin User');
         
     
         
      
        $('#create-admin').hide();
         
       
        $('#read-admin').show();
         
       
        $('#admin-page-content').fadeOut('slow', function(){
            $('#admin-page-content').load('admin_src/createadmin_form.php', function(){ 
             

                 
                
                $('#admin-page-content').fadeIn('slow');
            });
        });
    });
});
    $(document).on('submit', '#create-admin-form', function() {


     

    $.post("admin_src/create.php", $(this).serialize())
        .done(function(data) {
             
            
            $('#create-admin').show();
             
            
            $('#read-admin').hide();
             
            
            showAdmins();
        });
             
    return false;
    });


    showAdmins();


    $('#read-admin').click(function(){
     


    $('#create-admin').show();
     

    $('#read-admin').hide();
     

    showAdmins();
    });


    function showAdmins(){
         
    // change page title
    changePageTitleAdmin('All Admin Users');
     

    $('#admin-page-content').fadeOut('slow', function(){
        $('#admin-page-content').load('admin_src/read.php', function(){
          
          
             
            
            $('#admin-page-content').fadeIn('slow');
        });
    });
    }
    $(document).on('click', '.admin-edit-btn', function(){ 

    changePageTitleAdmin('Update Admin User Information');

    var admin_id = $(this).closest('td').find('.admin-id').text();
     

     

    $('#create-admin').hide();
    $('#read-admin').show();


    $('#admin-page-content').fadeOut('slow', function(){
        $('#admin-page-content').load('admin_src/updateadmin_form.php?admin_id=' + admin_id, function(){
            
            
            $('#admin-page-content').fadeIn('slow');
        });
    });
    }); 


    $(document).on('submit', '#update-admin-form', function() {


     

    $.post("admin_src/update.php", $(this).serialize())
        .done(function(data) {
             
           
            $('#create-admin').show();
             
            
            $('#read-admin').hide();
         
            
            showAdmins();
        });
             
    return false;
    });

    $(document).on('click', '.admin-delete-btn', function(){ 
    if(confirm('Are you sure you want to delete this Admin?')){
     
        
        var admin_id = $(this).closest('td').find('.admin-id').text();
         
       
        $.post("admin_src/delete.php", { ID: admin_id })
            .done(function(data){
                console.log(data);
                 
            
                 
                showAdmins();
                 
            });
    }
    });        
    </script>
</body>
</html>