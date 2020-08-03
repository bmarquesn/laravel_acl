$(function() {
    $("a").click(function(event) {
        if ($(this).attr("href") === "http://#" || $(this).attr("href") === "#" || $(this).attr("href") === "") {
            event.preventDefault();
        }
    });
    if(typeof(temTableSorter) != "undefined" && temTableSorter !== null){
        $("#tabela").tablesorter();
    }
    /** mascaras */
    $('input[name="cnpj"]').mask('00.000.000/0000-00', {reverse: true});
    $('input[name="cep"]').mask('00000-000');
    $('td.cep').mask('00000-000');
    /** validar exclusoes */
    $('input.btn.btn-danger[value="Excluir"]').on('click', function(){
        var confirmar=confirm('Deseja mesmo excluir o registro selecionado?');
        if(!confirmar){
            return false;
        }
    });
    /** menu e submenus pemissoes */
    $('ul#permissoes').find('a').on('click', function(){
        $(this).parent('li').children('ul').toggle('fast');
    });
});
