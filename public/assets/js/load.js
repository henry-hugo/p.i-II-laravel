var myButton = document.getElementById('myButton');
var myLoadingIndicator = document.getElementById('myLoadingIndicator');

myButton.addEventListener('click', function() {
  myButton.style.display = 'none'; // oculta o botão
  myLoadingIndicator.style.display = 'block'; // exibe o indicador de carregamento


});