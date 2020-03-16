$(function() {
  function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  monoBG =
    "background-position: " +
    getRandomInt(0, 100) +
    "% " +
    getRandomInt(0, 100) +
    "%";

  colorBG =
    "background-position: " +
    getRandomInt(0, 100) +
    "% " +
    getRandomInt(0, 100) +
    "%";

  $(".background.mono").attr("style", monoBG);
  $(".background.color").attr("style", colorBG);
  // $(".background").addClass("visible");
});
