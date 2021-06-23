/*------------------------------------------- BOUTON SCORE */
var tableauScoresBtn = document.querySelector(".tableau-scores-btn");
var nextBtn = document.querySelector(".next-btn");

tableauScoresBtn.addEventListener("click", function () {
  document.body.classList.add("background-bleu");
  loadTableauScores();
  tableauScoresBtn.classList.add("display-none");
  nextBtn.classList.remove("display-none");
});

/*------------------------------------------- AJAX TABLEAU SCORES */

function loadTableauScores() {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (this.status == 200) {
      document.querySelector(".load_questions").textContent = "";
      document.querySelector(".tableau-scores").innerHTML = xhr.responseText;
      document.querySelector(".score").innerHTML = `${score}`;
    }
  };
  xhr.open("GET", "../php/result.php", true);
  xhr.send();
}

/*------------------------------------------- TIMER */

var counter = 0;
var timeleft = 6;
var score = 0;

function myTimer() {
  counter++;
  document.querySelector(".timer-article").innerHTML = `<h2>${
    timeleft - counter
  }</h2>`;

  if (counter == timeleft) {
    clearInterval(timeoutHandle);
    counter = 0;
    tableauScoresBtn.classList.remove("display-none");
    document
      .querySelectorAll('input[type="radio"]')
      .forEach(function (reponse) {
        reponse.classList.add("visibility-hidden");
      });

    /*------------------------------------------- AFFICHER BONNE REPONSE*/
    var reponses = document.querySelector(".reponses-section");
    if (reponses.dataset.mensonge !== reponses.dataset.reponse0) {
      document.querySelector(".rouge").style.background = "#c4c4c4";
    }
    if (reponses.dataset.mensonge !== reponses.dataset.reponse1) {
      document.querySelector(".bleu").style.background = "#c4c4c4";
    }
    if (reponses.dataset.mensonge !== reponses.dataset.reponse2) {
      document.querySelector(".jaune").style.background = "#c4c4c4";
    }
    if (reponses.dataset.mensonge !== reponses.dataset.reponse3) {
      document.querySelector(".vert").style.background = "#c4c4c4";
    }

    /*------------------------------------------- DONNER UN POINT */
    var rep0 = document.querySelector("#rep0");
    var rep1 = document.querySelector("#rep1");
    var rep2 = document.querySelector("#rep2");
    var rep3 = document.querySelector("#rep3");
    if (
      rep0.checked &&
      reponses.dataset.mensonge == reponses.dataset.reponse0
    ) {
      score += 1;
    }
    if (
      rep1.checked &&
      reponses.dataset.mensonge == reponses.dataset.reponse1
    ) {
      score += 1;
    }
    if (
      rep2.checked &&
      reponses.dataset.mensonge == reponses.dataset.reponse2
    ) {
      score += 1;
    }
    if (
      rep3.checked &&
      reponses.dataset.mensonge == reponses.dataset.reponse3
    ) {
      score += 1;
    }
    document.querySelector(".score").innerHTML = `${score}`;
  }
}

var timeoutHandle = window.setInterval(myTimer, 1000);

/*------------------------------------------- BOUTON QUESTION SUIVANTE */
function loadNext() {
  questionno = eval(questionno) + 1;
  loadQuestions(questionno);
}

nextBtn.addEventListener("click", function () {
  document.querySelector(".tableau-scores").textContent = "";
  document.body.classList.remove("background-bleu");
  loadNext();
  nextBtn.classList.add("display-none");
  window.clearInterval(timeoutHandle);
  timeoutHandle = window.setInterval(myTimer, 1000);
});

/*------------------------------------------- AJAX QUESTION SUIVANTE */
var questionno = "1";
loadQuestions(questionno);

function loadQuestions(questionno) {
  $(document).ready(function () {
    if (questionno == 15) {
      window.location = "../php/podium.php";
      document.querySelector(".score").innerHTML = `${score}`;
    } else {
      $.ajax({
        success: function () {
          $(".load_questions").load(
            "../php/load_questions.php?questionno=" + questionno
          );
        },
      });
    }
  });
}
