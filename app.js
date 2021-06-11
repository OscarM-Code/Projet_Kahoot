var questionno = "1";
loadQuestions(questionno);

function loadQuestions(questionno) {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (this.status == 200) {
      // HARDCODE !!!
      if (questionno == 15) {
        window.location = "podium.php";
      } else {
        document.getElementById("load_questions").innerHTML = xhr.responseText;
      }
    }
  };
  xhr.open("GET", "load_questions.php?questionno=" + questionno, true);
  xhr.send();
}

function loadNext() {
  questionno = eval(questionno) + 1;
  loadQuestions(questionno);
}

function loadTableauScores() {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (this.status == 200) {
      document.getElementById("load_questions").textContent = "";
      document.querySelector(".tableau-scores").innerHTML = xhr.responseText;
    }
  };
  xhr.open("GET", "result.php", true);
  xhr.send();
}
const tableauScoresBtn = document.querySelector(".tableau-scores-btn");
const nextBtn = document.querySelector(".next-btn");

tableauScoresBtn.addEventListener("click", function () {
  document.body.classList.add("background-bleu");
  loadTableauScores();
  tableauScoresBtn.classList.add("display-none");
  nextBtn.classList.remove("display-none");
});

// TIMER

var counter = 0;
var timeleft = 3;

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
    const reponses = document.querySelector(".reponses-section");
    if (reponses.dataset.mensonge !== reponses.dataset.reponserouge) {
      document.querySelector(".rouge").style.background = "#c4c4c4";
    }
    if (reponses.dataset.mensonge !== reponses.dataset.reponsebleu) {
      document.querySelector(".bleu").style.background = "#c4c4c4";
    }
    if (reponses.dataset.mensonge !== reponses.dataset.reponsejaune) {
      document.querySelector(".jaune").style.background = "#c4c4c4";
    }
    if (reponses.dataset.mensonge !== reponses.dataset.reponsevert) {
      document.querySelector(".vert").style.background = "#c4c4c4";
    }
  }
}
var timeoutHandle = window.setInterval(myTimer, 1000);

nextBtn.addEventListener("click", function () {
  document.querySelector(".tableau-scores").textContent = "";
  document.body.classList.remove("background-bleu");
  loadNext();
  nextBtn.classList.add("display-none");
  window.clearInterval(timeoutHandle);
  timeoutHandle = window.setInterval(myTimer, 1000);
});

// RADIOCLICK

function radioClick(radiovalue, questionno) {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (this.status == 200) {
    }
  };
  xhr.open(
    "GET",
    "save_answer_in_session.php?questionno=" +
      questionno +
      "&value1=" +
      radiovalue,
    true
  );
  xhr.send();
}
