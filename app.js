function load_total_que() {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (this.status == 200) {
      document.getElementById("total_que").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "load_total_que.php", true);
  xhr.send();
}

var questionno = "1";
loadQuestions(questionno);

function loadQuestions(questionno) {
  document.getElementById("current_que").innerHTML = questionno;
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (this.status == 200) {
      // HARDCODE !!!
      if (questionno == 15) {
        window.location = "result.php";
      } else {
        document.getElementById("load_questions").innerHTML = xhr.responseText;
        load_total_que();
      }
    }
  };
  xhr.open("GET", "load_questions.php?questionno=" + questionno, true);
  xhr.send();
}

function loadPrevious() {
  if (questionno == "1") {
    loadQuestions(questionno);
  } else {
    questionno = eval(questionno) - 1;
    loadQuestions(questionno);
  }
}
function loadNext() {
  questionno = eval(questionno) + 1;
  loadQuestions(questionno);
}

const btnPrevious = document.querySelector(".btn-previous");
btnPrevious.addEventListener("click", loadPrevious);

const btnNext = document.querySelector(".btn-next");
btnNext.addEventListener("click", loadNext);

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
