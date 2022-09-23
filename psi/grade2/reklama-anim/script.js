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

  // const replacements = new Map(Object.entries({
  //   "&lt;": "<",
  //   "&gt;": ">",
  //   "&amp;": "&" // must be last, so it won't be recursive
  // }))

  // const unescapeHTML = (text) => {
  //   replacements.forEach((v, k) => {
  //     text = text.replaceAll(k, v)
  //   });
  //   return text
  // }

  const {
    ioInput, ioOutput, ioIbefore, ioObefore
  } = io;
  
  const deb = () => console.debug({html: consoleWindow.innerHTML, text: consoleWindow.dataset.stdin})

  consoleWindow.dataset.stdin = ioIbefore;
  consoleWindow.innerHTML = ioIbefore;
  
  consoleWindow.classList.remove("notready")

  // BUG jak są kolory, to tekst bez koloru się nie pojawia
  
  let inTag = false
  let inEsc = false
  for (ch of ioInput) {
    if (ch === "<" && !inTag) {
      inTag = true
      consoleWindow.dataset.stdin += ch
      deb()
      continue
    } else if (ch === "&" && !inEsc) {
      inEsc = true
      consoleWindow.dataset.stdin += ch
      deb()
      continue
    }
    consoleWindow.dataset.stdin += ch
    if (consoleWindow.dataset.stdin !== consoleWindow.innerHTML) {
      if (ch === ">" && inTag) {
        inTag = false
      } else if (ch === ";" && inEsc) {
        inEsc = false
      }
      if (inTag || inEsc) {
        continue
      }
    }
    consoleWindow.innerHTML = consoleWindow.dataset.stdin
    deb()
    if (!inTag && !inEsc) {
      await sleep(60)
    }
  }
  await sleep(500)
  consoleWindow.innerHTML += "\n" + ioObefore + ioOutput + "\n" + ioIbefore;
})();