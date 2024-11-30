<?php
//url 
$url="https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
//fetching data 
$response= file_get_contents($url);
// JSON response
$data= json_decode($response, true);
//if statment to fetch data from the Bahrain Open Data Portal API
if(!$data ||!isset($data["results"])){
    die('error fetching the data from the api');
}
$result=$data["results"];?>
<
<html>
    <head>
        <title>UOBstudent</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="sylesheet" herf="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
        
</head>
    <body>
        <!--add table name-->
        <h1>University of Bahrain Students Enrollment by Nationality</h1>
        <style>
            /*Css styling for table name*/
h1{
    text-align:left ;
    font-family:sans-serif ;
    font-weight:bolder;
    color: #4a0423e2;
}
        </style>
        <style>
        /*Css styling for table*/
table{
    border-collapse: collapse;
    background-color: #63063b;
    width: 1500px;
    height: 100px;
}</style>
        <table>
        <!--create table-->
            <thead>
                <tr>
                <th>Year</th>
                <th>Semster</th>
                <th>ThePrograms</th>
                <th>Nationality</th>
                <th>Collages</th>
                <th>Number of students</th>
                </tr>
           
            <style>
                th{
    color: #f9f7f7;
    background-color: #63063b;
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #b926688b;
}

.mybutton:hover{
    color: #630628;
    background-color: #f90365;
    transition-duration: 0.2s;
}
.mytable{
    padding-top: 36px;
    padding-bottom:36px;
    color: #630628;
}
            </style>
         </thead>
            <tbody>
                <?php
                //creat an array 
                foreach($result as $student){
                    ?>
                <tr><td><?php echo $student["year"]?></td>
                <td><?php echo $student["semester"]?></td>
                <td><?php echo $student["the_programs"]?></td>
                <td><?php echo $student["nationality"]?></td>
                <td><?php echo $student["colleges"]?></td>
                <td><?php echo $student["number_of_students"]?></td></tr>
                <!--create design for tabele data-->
                <style>
                    td{
                color: #752b72;
                padding:10px;
                text-align: center;
                background-color: #dcb5cb;
                                            }
                </style>

                
                <?php }
                ?>
            </tbody>
        </table>
    </body></html>

