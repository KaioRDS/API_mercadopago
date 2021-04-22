$('.linhaPproduto').ready(function () {
        
    for (let index = 0; index < 3; index++) {

        $('#linhaProduto').append('<div class="col-4" id="colunaProduto' + index +'"></div>');
        $('#colunaProduto' + index + '').append('<div id="produtos' + index + '" class="d-flex justify-content-left"></div>');
        $('#produtos'+ index +'').addClass('produtos');
        $('#produtos' + index + '').append('<div id="produto-card' + index + '"></div>');
        $('#produto-card'+ index +'').addClass('produto-card');
        $('#produto-card' + index + '').append('<div id="image' + index + '"></div>');
        $('#image' + index + '').append('<img style="width: 100%;" src="assets/img/images.jpg">');
        $('#produto-card' + index + '').append('<div class="d-flex justify-content-center"> <p id="descricao">dwadwadwadawdwada </p></div>');
        $('#produtos' + index + '').append('<div id="produto-card' + index + '"></div>');
        $('#produto-card' + index + '').append('<p class="d-flex justify-content-center">82,00 R$</p>');
        $('#produto-card' + index + '').append('<button class="comprarProduto">Comprar</button>');

    }

})

$('#adicionarBotao').on('click', function () {

    window.location.href="src/page/adicionarProduto.html"
  })