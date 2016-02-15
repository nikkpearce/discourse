<?php


    require_once('../libs/PHPTAL-1.3.0/PHPTAL.php');

    // render the whole page using PHPTAL

    // finally, create a new template object
    $template = new PHPTAL('user-editor.xhtml'); //CHANGE index.xhtml

    // now add the variables for processing and that you created from above:
    $template->page_title = "Index Page with PHPTAL";


    // execute the template
    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }


?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>

        $(document).ready(function() {

            function loadUsers() {
                $.ajax({
                    url: "./users.php",
                    type: "GET",
                    dataType: 'html',
                    success: function(returnedData) {
                        //console.log("cart checkout response: ", returnedData);
                        $("#userrows").html(returnedData);
                        //window.location.href = "user-editor.html";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.statusText, textStatus);
                    }
                });
            }

            loadUsers();


            $("#addNewUser").submit(function(e) {
                e.preventDefault();

                // get values from form
                var firstName = $("#addFirstName").val();
                var lastName = $("#addLastName").val();
                var userName = $("#addUserName").val();
                 var password = $("#addPassword").val();

                //console.log(firstName, lastName, userName);

                $.ajax({
                    url: "users.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {action: "add", newFirstName: firstName,
                        newLastName: lastName, newUserName: userName, newPassword: password},
                    success: function(returnedData) {
                        loadUsers();
                        console.log(returnedData);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $("#p1").text(jqXHR.statusText);
                    }

                });

            });

            $('#users').on('click', '.delete', function() {
                var loginValue = this.getAttribute("id");
                loginValue = loginValue.replace("d-", "");

                $.ajax({
                    url: "./users.php",
                    type: "POST",
                    dataType: 'json',
                    data: {action: "delete", username: loginValue},
                    success: function(returnedData) {
                        loadUsers();

                        //window.location.href = "user-editor.html";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.statusText, textStatus);
                    }
                });

            });

            $('#users').on('click', '.update', function() {
                var loginValue = this.getAttribute("id");
                //var firstName = $(this).val(
                loginValue = loginValue.replace("u-", "");
                var editedFirstName = $(this).parent().parent().find(".first_name span").text();
                //console.log(loginValue, editedFirstName);

                $.ajax({
                    url: "./users.php",
                    type: "POST",
                    dataType: 'json',
                    data: {action: "update", username: loginValue, newFirstName: editedFirstName},
                    success: function(returnedData) {
                        loadUsers();

                        //window.location.href = "user-editor.html";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.statusText, textStatus);
                    }
                });

            });


            // http://stackoverflow.com/questions/11882693/change-table-cell-from-span-to-input-on-click
            $('#users').on('click', 'span', function() {

                var $td = $(this).parent();
                var $input = null;

                var val = $(this).html();

                if($td.attr('class') === 'first_name') {
                    //var val = $(this).html();
                    $td.html('<input type="text" value="' + val + '"/>');
                    var $input = $td.find('input');
                    $input.focus();
                    $input.select();
                }

                if($input != null) {

                    $input.on('blur', function() {
                        $(this).parent().html('<span>' + $(this).val() + '</span>');
                    });

                    $input.keyup(function(e) {
                        if(e.which == 13) {
                            $(this).parent().html('<span>' + $(this).val() + '</span>');
                        } else if(e.which == 27) {
                            // escape key, means user canceled operation
                            $(this).parent().html('<span>' + val + '</span>');
                        }
                    });
                }
            });



        });

    </script>
