 $(function () {
            $("#header").load("header.html");
            $("#footer").load("footer.html");
         });
$('#form-login').submit(function(e) {
    e.preventDefault();
    const nomeTime = $('input[id="time"]').val();
    const anoDLanc = $('input[id="anoDLanc"]').val();
    const estrelaQUsou = $('input[id="estrelaQUsou"]').val();
    const jogoM = $('input[id="jogoM"]').val();
    const numero = $('input[id="numero"]').val();
    const imagem = $('input[id="imagem"]').val();
    $.ajax({
        url: 'catalogo.php', // rota para o script que vai processar os dados
        type: 'GET',
        data: {nomeTime: nomeTime, anoDLanc: anoDLanc, estrelaQUsou: estrelaQUsou, jogoM: jogoM, numero: numero, imagem: imagem},
        success: function(response) {
            $('#resp').html(response);
        },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
    return false;
    
});

function abrePopup() {
    $("#getCode").html(data);
    jQuery("#modal-mensagem").modal('show');

}
