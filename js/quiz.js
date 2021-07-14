/*------------------------------------------- BOUTON SCORE */
var tableauScoresBtn = document.querySelector(".tableau-scores-btn");
var nextBtn = document.querySelector(".next-btn");

tableauScoresBtn.addEventListener("click", function () {
  document.body.classList.add("background-bleu");
  loadTableauScores();
  tableauScoresBtn.classList.add("display-none");
  setTimeout(() => {
    nextBtn.classList.remove("display-none");
  }, 550);
});

/*------------------------------------------- AJAX TABLEAU SCORES */
function loadTableauScores() {
  $(document).ready(function () {
    $.ajax({
      success: function () {
        $(".load-questions").fadeOut(500);
        setTimeout(() => {
          document.querySelector(".load-questions").innerHTML = "";
        }, 500);
        $(".tableau-scores").fadeIn(500);
        setTimeout(() => {
          $(".tableau-scores").load("../php/result.php");
        }, 500);
        showScore(550);
      },
    });
  });
}

/*------------------------------------------- TIMER */
var counter = 0;
var timeleft = 5;
var score = 0;
var questionMax = 1000;

function myTimer() {
  counter++;
  document.querySelector(".timer-article").innerHTML = `<h2>${
    timeleft - counter
  }</h2>`;

  /*------------------------------------------- CLICK BLOCK*/
  if (counter == timeleft) {
    clearInterval(timeoutHandle);
    counter = 0;
    tableauScoresBtn.classList.remove("display-none");
    document
      .querySelectorAll('input[type="radio"]')
      .forEach(function (reponse) {
        reponse.classList.add("visibility-hidden");
      });

    /*------------------------------------------- SHOW GOOD ANSWER*/
    var reponses = document.querySelector(".reponses-section");
    questionMax = eval(reponses.dataset.questiontotal) + 1;
    console.log(questionMax);
    var inputs = document.querySelectorAll(".reponse-article input");
    inputs.forEach((input) => {
      if (input.value != reponses.dataset.mensonge) {
        input.parentElement.style.background = "#c4c4c4";
      }
      /*------------------------------------------- GIVE POINT */
      if (input.checked && input.value == reponses.dataset.mensonge) {
        score += 1;
      }
    });
    showScore(0);
  }
}

function showScore(delay) {
  setTimeout(() => {
    try {
      document.querySelector(".score").innerHTML = `${score}`;
    } catch (error) {
      console.log("bug");
    }
  }, delay);
}

var timeoutHandle = window.setInterval(myTimer, 1000);

/*------------------------------------------- BOUTON QUESTION SUIVANTE */

nextBtn.addEventListener("click", function () {
  $(".tableau-scores").fadeOut(500);
  setTimeout(() => {
    document.querySelector(".tableau-scores").innerHTML = "";
  }, 500);
  document.body.classList.remove("background-bleu");
  setTimeout(() => {
    loadNext();
  }, 500);
  nextBtn.classList.add("display-none");
  window.clearInterval(timeoutHandle);
  timeoutHandle = window.setInterval(myTimer, 1000);
});

function loadNext() {
  questionno = eval(questionno) + 1;
  loadQuestions(questionno);
  showScore(250);
}
/*------------------------------------------- AJAX QUESTION SUIVANTE */
var questionno = "1";
loadQuestions();

function loadQuestions() {
  $(document).ready(function () {
    if (questionno == questionMax) {
      window.location = "../php/podium.php";
    } else {
      $.ajax({
        success: function () {
          $(".load-questions").fadeIn(500);
          $(".load-questions").load(
            "../php/load_questions.php?questionno=" + questionno
          );
        },
      });
    }
  });
}
