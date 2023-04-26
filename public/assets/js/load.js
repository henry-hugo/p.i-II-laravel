var myButton = document.getElementById('myButton');
var myLoadingIndicator = document.getElementById('myLoadingIndicator');

console.log(myButton);
console.log(myLoadingIndicator);
myButton.addEventListener('click', function() {
  myButton.style.display = 'none'; // oculta o botão
  myLoadingIndicator.style.display = 'block'; // exibe o indicador de carregamento


});