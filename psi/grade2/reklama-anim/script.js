(async () => {
  const consoleWindow = document.querySelector("#con");

  /**
   * Equivalent to `time.sleep` from Python.
   * 
   * @param {number} ms The timeout in milliseconds.
   * @returns {Promise} An empty promise.
   */
  const sleep = (ms) => {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  const classList = ["ioIbefore", "ioInput", "ioObefore", "ioOutput"]

  const io = {}

  classList.forEach((e) => {
    io[e] = consoleWindow.querySelector("." + e).innerHTML
  })

  const {
    ioInput, ioOutput, ioIbefore, ioObefore
  } = io;

  consoleWindow.dataset.stdin = ioIbefore;
  consoleWindow.innerHTML = ioIbefore;
  
  consoleWindow.classList.remove("notready")
  
  let inTag = false
  let inEsc = false
  for (ch of ioInput) {
    consoleWindow.dataset.stdin += ch
    if (ch === "<" && !inTag) {
      inTag = true
      continue
    } else if (ch === "&" && !inEsc) {
      inEsc = true
      continue
    }
    if (ch === ">" && inTag) {
      inTag = false
    } else if (ch === ";" && inEsc) {
      inEsc = false
    }
    if (inTag || inEsc) {
      continue
    }
    consoleWindow.innerHTML = consoleWindow.dataset.stdin
    if (!inTag && !inEsc) {
      await sleep(60)
    }
  }
  await sleep(500)
  consoleWindow.innerHTML += "\n" + ioObefore + ioOutput + "\n" + ioIbefore;
})();