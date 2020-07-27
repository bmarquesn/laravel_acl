$(function() {
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $('input[name="logradouro"]').val("");
        $('input[name="bairro"]').val("");
        $('input[name="cidade"]').val("");
        $('select[name="estado"]').val("");
    }
    //Quando o campo cep perde o foco.
    $('input[name="cep"]').blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if (validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                $('input[name="logradouro"]').val("...");
                $('input[name="bairro"]').val("...");
                $('input[name="cidade"]').val("...");
                $('select[name="estado"]').val("...");
                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $('input[name="logradouro"]').val(dados.logradouro);
                        $('input[name="bairro"]').val(dados.bairro);
                        $('input[name="cidade"]').val(dados.localidade);
                        $('select[name="estado"]').val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});
