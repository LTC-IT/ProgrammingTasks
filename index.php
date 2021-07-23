<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-
B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
          crossorigin="anonymous">
    <!-- You can change the title to reflect the page contents.-->
    <title>Hello, world!</title>
</head>
<body>
<!--The majority of the code here in the body tag is to display in the browser/.-->
<?php
session_start();
$conn = new SQLite3('programmingtasks') or die("Unable to open database!");
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      method="post">
    <div class="container-fluid">
        <div class="row">
            <!--Customer Details-->
            <div class="col-md-6">
                <h2>Enter Form Data</h2>

                <p>Person 1: <input type="text"
                                    name="Person1Name"></p>
                <p>Person 2: <input type="text"
                                    name="Person2Name"></p>
                <p>Dessert<input type="text" name="Dessert"></p>
                <p>Vegetable<input type="text"
                                   name="Vegetable"></p>
                <p>Synonym for Like<input type="text"
                                          name="like"></p>
                <p>Synonym for Dislike<input type="text"
                                             name="dislike"></p>
                <p>Location<input type="text"
                                  name="location"></p>
                <p>Age<input type="number"
                             name="age"></p>
                <p>Year<input type="number"
                              name="year"></p>
            </div>

        </div>
    </div>
    <input type="submit" name="formSubmit" value="Submit">
</form>

<?php

//Declare variables
$person1Name = "";
$person2Name = "";
$dessert = "";
$vegetable = "";
$like = "";
$dislike = "";
$location = "";
$age = -1;
$year = 0;
// Input
if ($_SERVER["REQUEST_METHOD"] == "POST") { // It will run when the user presses submit
// Customer Details
    $person1Name = sanitise_data($_POST['Person1Name']);
    $person2Name = sanitise_data($_POST['Person2Name']);
    $dessert = sanitise_data($_POST['Dessert']);
    $vegetable = sanitise_data($_POST['Vegetable']);
    $like = sanitise_data($_POST['like']);
// Product Quantities
    $dislike = sanitise_data($_POST['dislike']);
    $location = sanitise_data($_POST['location']);
    $age = sanitise_data($_POST['age']);
    $year = sanitise_data($_POST['year']);

    // Store the data in the database.
    $sqlstmt = $conn->prepare("INSERT INTO 'users' (firstName, age, dateOfBirth) VALUES (:first_name, :age, :dob)");
    $sqlstmt->bindValue(':first_name', $person1Name);
    $sqlstmt->bindValue(':age', $age);
    $sqlstmt->bindValue(':dob', $year);
    $sqlstmt->execute();

}

function sanitise_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//
//// Processing & Output
//// q3 Multiply the age and the Year
//$answer = $age * $year;
//echo "<p>q3 Multiply the age and the Year: ".$answer;
//
//// q4 Divide the Year by the Age.
//echo "<p>q4 Divide the Year by the Age".$year/$age;
//
//// q5 Write a PHP loop displaying all numbers from 1 to 100 (inclusive)
//for ($allNumbers = 1; $allNumbers <= 100; $allNumbers++) {
//    echo "<br>The number is: $allNumbers ";
//}
//
//// q6 Write a PHP loop displaying all even numbers from 1 - 100
//for ($evenNumbers = 2; $evenNumbers <= 100; $evenNumbers = $evenNumbers + 2) {
//    echo "<br>The even number is: $evenNumbers ";
//}
//
//// 7) Write a PHP loop displaying all numbers divisible by 3 from 1-100
//for ($numbersDivThree = 3; $numbersDivThree <= 100; $numbersDivThree = $numbersDivThree + 3) {
//    echo "<br>The number divisible by 3 is: $numbersDivThree";
//}
//
////8) Output 3 different sentences with at least 3 different variables in it.
//echo "<br>Person 1 Name is ".$person1Name;
//echo "<br>My favourite Dessert is ".$dessert;
//echo "<br>My age is :".$age;
//
////10) Put an age below 18, output “Person 1 is age” until they are 20.
//if ($age < 18) {
//    while ($age<20){
//        echo "<br>Person 1 is ".$age;
//        $age++;
//    }
//}


?>

<script src="js/bootstrap.bundle.min.js" integrity="sha384-
Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonym
ous">
</script>
</body>
</html>





