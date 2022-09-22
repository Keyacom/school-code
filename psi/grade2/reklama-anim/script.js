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

  const replacements = new Map(Object.entries({
    "&lt;": "<",
    "&gt;": ">",
    "&amp;": "&" // must be last, so it won't be recursive
  }))

  const unescapeHTML = (text) => {
    replacements.forEach((v, k) => {
      text = text.replaceAll(k, v)
    });
    return text
  }

  const {
    ioInput, ioOutput, ioIbefore, ioObefore
  } = io;

  consoleWindow.innerHTML = ioIbefore;
  
  consoleWindow.classList.remove("notready")

  let inTag = false
  let inEsc = false
  let strToAdd = ""
  for (ch of ioInput) {
    if (ch === "<") {
      inTag = true
      strToAdd += ch
    } else if (ch === "&") {
      inEsc = true
      strToAdd += ch
    } else if (ch === ">" && inTag) {
      inTag = false
      strToAdd += ch
    } else if (ch === ";" && inEsc) {
      inEsc = false
      strToAdd += ch
    }
    if (strToAdd) {
    }
    consoleWindow.innerHTML += ch
    //consoleWindow.innerHTML = unescapeHTML(consoleWindow.innerHTML)
    if (!inTag && !inEsc) {
      await sleep(60)
    }
  }
  await sleep(500)
  consoleWindow.innerHTML += "\n" + ioObefore + ioOutput;
})();