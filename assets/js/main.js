const insertedURL = document.getElementById('insertedURL');
const sendButton = document.getElementById('sendButton');

sendButton.onclick = () => {

  const url = insertedURL.value;

  if (url.trim().length < 5) {
    alert('Inseted URL is too short!');
    return;
  } else if (!/((https{0,1})\:\/\/){0,1}[a-zA-Z]{1,}\.{0,}[a-zA-Z]{3,}\.[a-zA-Z]{2,}/gm.test(url)) {

    alert('Invalid URL');
    return;

  }

  fetch('http://localhost:8080/assets/manager/addUrl.php', {
    method: 'POST',
    body: JSON.stringify({
      url: url
    })
  }).then(response => {
    response.text().then(text => console.log(text))
  });

}
