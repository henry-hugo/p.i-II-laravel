var myButton = document.getElementById('myButton');
var myLoadingIndicator = document.getElementById('myLoadingIndicator');

myButton.addEventListener('click', function() {
  myButton.style.display = 'none'; // oculta o botão
  myLoadingIndicator.style.display = 'block'; // exibe o indicador de carregamento

  setTimeout(function() {
    // Simula uma tarefa demorada
    myButton.style.display = 'block'; // exibe o botão novamente
    myLoadingIndicator.style.display = 'none'; // oculta o indicador de carregamento
  }, 10000); // Atraso de 10 segundos (10.000 milissegundos)

});