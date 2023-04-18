const insertedURL = document.getElementById('insertedURL');
const sendButton = document.getElementById('sendButton');

const hashBox = document.getElementsByClassName('hash-box')[0];

sendButton.onclick = () => {

  const url = insertedURL.value;

  if (url.trim().length < 5) {
    alert('Inseted URL is too short!');
    return;
  } else if (!/((https{0,1})\:\/\/){0,1}[a-zA-Z]{1,}\.{0,}[a-zA-Z]{3,}\.[a-zA-Z]{2,}/gm.test(url)) {

    alert('Invalid URL');

    return;

  }

  fetch('./assets/manager/addUrl.php', {
    method: 'POST',
    body: JSON.stringify({
      url: url
    })
  }).then(response => {
    response.json().then(json => {

      if (json.result == 201) {

        hashBox.innerHTML = `<h3>Your hash is <span class="hash">${json.hash}</span></h3>`;
        hashBox.style.display = 'flex';

      }

    });
  });

}
