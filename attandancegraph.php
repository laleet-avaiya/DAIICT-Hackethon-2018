

<?php 


 if(isset($_SESSION['usr_id'])) {
    $result = pg_query($con, "SELECT  * FROM students WHERE students.s_id = {$_SESSION['usr_id']} ");
    $result1 = pg_query($con,"select marks,sub_name from  subjects join (select * from stu_marks where s_id={$_SESSION['usr_id']}) A
    on (subjects.sub_id=A.sub_id)");
    $result2 = pg_query($con, "SELECT  * FROM students WHERE students.s_id = {$_SESSION['usr_id']} ");

    $result_attendance = pg_query($con,"SELECT sub_name,coun from subjects join (select sub_id,count(*) as coun from attendance where status='true' and s_id= {$_SESSION['usr_id']} group by sub_id) A on (subjects.sub_id=A.sub_id)");
    
    $x = 50;
    $y = 50;
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>

     <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
window.onload = function() {

    CanvasJS.addColorSet("greenShades",
                [//colorSet Array
                "green",
                "red",
                "yellow" ,
                "blue",
                "black"           
                ]);

var options = {
    animationEnabled: true,
    colorSet: "greenShades",
	title: {
		text: " "
	},
	data: [{
            
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "Math", y: <?php echo $x ?>},
				{ label: "Hindi", y: <?php echo $y ?> },
                { label: "Science", y: 36 },
				{ label: "English", y: 31 },
				{ label: "Gujarati", y: 7 },
			]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>


 </head>
 <body>


 
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"><b>Sr. No.</b></th>
      <th scope="col"><b>Subject</b></th>
      <th scope="col"><b>Attendance</b></th>
    </tr>
  </thead>
  <tbody>
  <?php $a = 1; while ($row = pg_fetch_row($result_attendance)) { ?>
    <tr>
      <th scope="row"> <?php echo "$a";?></th>
      <td><?php echo "$row[0]";?></td>
      <td><?php echo "$row[1]";?></td>
    </tr>
    <?php $a=$a+1; } ?>
  </tbody>
</table>


                           
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
                    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
                            
 </body>
 </html>


 