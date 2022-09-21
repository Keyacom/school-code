const consoleWindow = document.querySelector("#con");

const {
  ioInput, ioOutput, ioIbefore, ioObefore
} = consoleWindow.dataset;

consoleWindow.innerText = ioIbefore;