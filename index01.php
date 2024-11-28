<?php
//url 
$URL="https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response= file_get_contents($URL);
//print response
echo $response;
print_r($response);
// JSON response
$data= json_decode($response, true);

echo $response;
print_r($response);
//if statment to fetch data from the Bahrain Open Data Portal API
if(!$data ||!isset($data["results"])){
    die('error fetching the data from the api');
}
$result=$data["results"];
print_r( $result);

?>
<html>
    <head>
        <title>UOBstudent</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="sylesheet" herf="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
        <!--linking external style sheet to file-->
        <link rel="stylesheet" href="style.css">
</head>
    <body>
        <!--add table name-->
        <h1>University of Bahrain Students Enrollment by Nationality</h1>
        <table>
        <!--create table-->
            <thead>
                <tr>
                <th>Year</th>
                <th>Semster</th>
                <th>The programs</th>
                <th>Nationality</th>
                <th>Collages</th>
                <th>Number of students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //creat an array 
                foreach($result as $student){
                    ?>
                <tr>
                <td><?php echo $student["year"]?></td>
                <td><?php echo $student["semester"]?></td>
                <td><?php echo $student["the_programs"]?></td>
                <td><?php echo $student["nationality"]?></td>
                <td><?php echo $student["colleges"]?></td>
                <td><?php echo $student["number_of_students"]?></td>
            </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </body></html>