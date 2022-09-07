# Keyacom.me
<img src="https://github.com/Keyacom/pages-from-school/blob/main/psi/keyacom.me/logo.png?raw=true" height="75" width="75">

This was a project for a website I'd name **Keyacom.me** that I worked on in April 2022. I kept everything in the same folder.

## Some mistakes

- Breaking the DRY rule (mainly in inclusion of the same elements throughout my pages). Broke it to some degree because it was intended to be frontend-only.
- Not using `defer` in `<script>` tags: I only realized its power later as I was learning more about web development.
- Not using an SVG logo: I didn't know many aspects of SVG at the time.
- Not using ES template literals over `\n`-ing and concatenation. I didn't know about them at the time.
- Not using event listeners. I underestimated the fact that this can add more than one event handler for each event (so you could add e.g. two `focus` handlers).

The less obvious ones:
- To prevent automatic scrolling when I have a link to the section (in [script.js](https://github.com/Keyacom/pages-from-school/blob/main/psi/keyacom.me/script.js)), I could have checked if it has a `#` sign that isn't trailing. A possible fix that somehow uses a regex without any alnum:
```js
if (!/#.+$/.test(location.href)) {
    window.scroll({
        top: -57,
        left: 0,
        behavior: 'auto'
    });
}
document.querySelector("html").classList.add("smooth-scroll");
```
- I hardly ever wanted to learn JQuery at the time, but I have since fallen in love with it. I hardly think this is a mistake: jQuery is just a simplification for DOM manipulation, Ajax, and animations.
