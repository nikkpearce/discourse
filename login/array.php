<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet' type='text/css'>
	<style type="text/css">
	body{
		font-family: arial;
	}

	h1,h2,h3,h4,h5,h6{
		font-family: 'Nunito', helvetica;
		font-weight: 700;
	}
	h3{
		font-size: 14px
	}
	</style>
</head>
<body>

<?php 

$data = array('msg' => 'found', 'f1' => array(
    'first' => 'arron', 'last' => 'ferguson'));

echo "<br><br> <h3>Answer 1</h3>";
echo $data['msg'];
echo "<br><br> <h3>Answer 2</h3>";
echo $data['f1']['last'];
echo "<br><br> <h3>Answer 3</h3>";
 ?>

 <script type="text/javascript">


var list = {status: 'success', items: 
    [{id: 1234}, {id: 3456, array: [1, 2, 3]}]};


  var ans3 = list['status'] + "<br><br>" ;
  document.write(ans3);

 document.write("<h3>Answer 4</h3>");

  var ans4 = list.items[0]['id'] + "<br><br>";
  document.write(ans4);

 document.write("<h3>Answer 5</h3>");

  var ans5 = list.items[1].array[2] + "<br><br>";
  document.write(ans5);

 </script>

</body>
</html>