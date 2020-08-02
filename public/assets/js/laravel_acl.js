$(function() {
    if(typeof(temTableSorter) != "undefined" && temTableSorter !== null){
        $("#tabela").tablesorter();
    }
    /** mascaras */
    $('input[name="cnpj"]').mask('00.000.000/0000-00', {reverse: true});
    $('input[name="cep"]').mask('00000-000');
    $('td.cep').mask('00000-000');
});
