<?php 
session_start();
include "connexion.php";



$question_no="";
$question="";
$opt1=";";
$opt2=";";
$opt3=";";
$opt4=";";
$answer="";
$count=0;
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];
}

  $stmt = $pdo->query("SELECT * FROM verites_mensonge WHERE id=$_GET[questionno]");
  $count = $stmt->rowCount();

  if($count==0)
  {
      echo "over";
  }
  else
  {
        $post=$stmt->fetch();
        $question_no=$post->id;
        $question=$post->nom;

        $opt1=$post->verite_1;
        $opt2=$post->verite_2;
        $opt3=$post->verite_3;
        $opt4=$post->mensonge;  
  }

  $reponses = [ "$opt1", "$opt2", "$opt3", "$opt4"];

// shuffle($reponses);
// echo $reponses[0];
// echo $reponses[1];
// echo $reponses[2];
// echo $reponses[3];

?>

<h1> <?php echo "(".$question_no.")".$question;  ?> </h1>



<input type="radio" name="reponse" value="<?php echo $reponses[0]; ?>" onclick="radioClick(this.value,<?php echo $question_no ?>)"
<?php if($ans==$opt1){
    echo "checked";
}?>>
<label> <?php echo $opt1; ?></label>

<input type="radio" name="reponse" value="<?php echo $reponses[1]; ?>" onclick="radioClick(this.value,<?php echo $question_no ?>)"
<?php if($ans==$opt2){
    echo "checked";
}?>>
<label> <?php echo $opt2; ?></label>
<input type="radio" name="reponse" value="<?php echo $reponses[2]; ?>" onclick="radioClick(this.value,<?php echo $question_no ?>)"
<?php if($ans==$opt3){
    echo "checked";
}?>>
<label> <?php echo $opt3; ?></label>
<input type="radio" name="reponse" value="<?php echo $reponses[3]; ?>" onclick="radioClick(this.value,<?php echo $question_no ?>)"
<?php if($ans==$opt4){
    echo "checked";
}?>>
<label> <?php echo $opt4; ?></label>


<?php 

//  $stmt = $pdo->prepare("SELECT * FROM mensonges WHERE id=1");
//         $stmt->execute();
//         $post = $stmt->fetch();
//         $answer = $post->mensonge;

//         echo $answer;
//         echo "BRUH";

// $stmt = $pdo->prepare("SELECT * FROM mensonges WHERE id=$_GET[questionno]");
//         $stmt->execute();
//         $post = $stmt->fetch();
//         $answer = $post->mensonge;
//         echo $answer;
//         echo $ans;

?>