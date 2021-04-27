//Crair layout dos produtos
$('.linhaPproduto').ready(function () {
    $.ajax({
        type: "POST",
        url: "src/api/produto.php",
        data: {
            type : 'getProdutos',
        },
        dataType: "json",
        success: function (response) {
            for (let index = 0; index < response.length; index++) {

                $('#linhaProduto').append('<div class="col-4" id="colunaProduto' + index +'"></div>');
                $('#colunaProduto' + index + '').append('<div id="produtos' + index + '" class="d-flex justify-content-left"></div>');
                $('#produtos'+ index +'').addClass('produtos');
                $('#produtos' + index + '').append('<div id="produto-card' + index + '"></div>');
                $('#produto-card'+ index +'').addClass('produto-card');
                $('#produto-card' + index + '').append('<div id="image' + index + '"></div>');
                $('#image' + index + '').append('<img style="width: 100%;" src="assets/img/' +  response[index].img_produto  +  '">');
                $('#produto-card' + index + '').append('<div class="d-flex justify-content-center"> <p id="descricao">' + response[index].descricao + ' </p></div>');
                $('#produtos' + index + '').append('<div id="produto-card' + index + '"></div>');
                $('#produto-card' + index + '').append('<p class="d-flex justify-content-center">' + response[index].preco +  ' R$</p>');
                $('#produto-card' + index + '').append('<button id="botaoComprarProduto' + index + '" class="comprarProduto">Comprar</button>');
                $('#botaoComprarProduto' +index + '').attr('data-produto' , response[index].id);

                redirecionaPagamento('#botaoComprarProduto' +index + '')
            }
        }
    });

})
// redirecionamento para adicionar o produto
$('#adicionarBotao').on('click', function () {

    window.location.href="src/page/adicionarProduto.html"
  })

function redirecionaPagamento(idProduto){
   $(idProduto).on('click', function () {
       let produto = $(idProduto).attr('data-produto');
       $.ajax({
           type: "POST",
           url: "src/api/Venda.php",
           data: {
               type: 'checkOut',
               idProduto : produto,
           },
           dataType: "json",
           success: function (response) {
               window.location.href=response.urlRetorno
           }
       });
  })
}