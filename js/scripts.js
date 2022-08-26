/*!
* Start Bootstrap - Bare v5.0.7 (https://startbootstrap.com/template/bare)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-bare/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
function inserirLinhaTabela(descricao) {
    if (document.getElementById('tipoAtividade').selectedIndex<=0){
        alert("Selecione o tipo de atividade correto");
    }
    else{
        var tbodyRef = document.getElementById('tabelaAtividade').getElementsByTagName('tbody')[0];

        // Insert a row at the end of table
        var newRow = tbodyRef.insertRow();

        // Insert a cell at the end of the row
        var newCell = newRow.insertCell();

        // Append a text node to the cell
        var newText = document.createTextNode(descricao);
        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        var btn = document.createElement('button');
        btn.type = "button";
        btn.className = "btn";
        btn.innerHTML ="<i class=\"fas fa-trash\" style=\"font-size:16px;\"> Excluir</i>";
        btn.onclick = removerLinha;
        //newText = document.createTextNode('<button type="button" class="btn"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button>');
        newCell.appendChild(btn);

        document.getElementById('tipoAtividade').value="0";
    }    
}
function removerLinha() {
    // event.target will be the input element.
    var td = event.target.parentNode; 
    var tr = td.parentNode; // the row to be removed
    tr.parentNode.remove(tr);
}
function inserirLinhaTabelaMaterial(item,quantidade) {
    var valorRadio;
    if (document.getElementById('tipoMaterial').selectedIndex<=0){
        alert("Selecione o material correto");
    }
    else if(document.getElementById('quantidadeMaterial').value===""){
        alert("Digite a quantidade de material utilizada");
    }
    else if(document.getElementById('quantidadeMaterial').value===" "){
        alert("Digite a quantidade de material utilizada");
    }
    else if (parseInt(document.getElementById('quantidadeMaterial').value) < 1){
        alert("Digite a quantidade de material correta");
    }
    else if (isNaN(parseInt(document.getElementById('quantidadeMaterial').value))){
        alert("Digite a quantidade de material correta");
    }
    else if(!document.getElementById('retirada').checked && !document.getElementById('pmsbc').checked && !document.getElementById('consorcio').checked){
        alert("Informe se o material utilizado é da prefeitura, do consórcio ou foi apenas uma retirada");
    }
    else{
        if(document.getElementById('pmsbc').checked){
            valorRadio="PMSBC";
        }
        else if(document.getElementById('consorcio').checked){
            valorRadio="Consórcio";
        }
        else if(document.getElementById('retirada').checked){
            valorRadio="Retirada";
        }
        var tbodyRef = document.getElementById('tabelaMaterial').getElementsByTagName('tbody')[0];

        // Insert a row at the end of table
        var newRow = tbodyRef.insertRow();

        // Insert a cell at the end of the row
        var newCell = newRow.insertCell();

        // Append a text node to the cell
        var newText = document.createTextNode(item);
        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        newText = document.createTextNode(parseInt(quantidade));
        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        newText = document.createTextNode(valorRadio);
        newCell.className="align-middle";
        newCell.appendChild(newText);

        newCell = newRow.insertCell();
        var btn = document.createElement('button');
        btn.type = "button";
        btn.className = "btn";
        btn.innerHTML ="<i class=\"fas fa-trash\" style=\"font-size:16px;\"> Excluir</i>";
        btn.onclick = removerLinhaMaterial;
        //newText = document.createTextNode('<button type="button" class="btn"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button>');
        newCell.appendChild(btn);

        document.getElementById('tipoMaterial').value="0";
        document.getElementById('quantidadeMaterial').value="";
        document.getElementById('pmsbc').checked=false;
        document.getElementById('consorcio').checked=false;
        document.getElementById('retirada').checked=false;
    }    
}
function removerLinhaMaterial() {
    // event.target will be the input element.
    var td = event.target.parentNode; 
    var tr = td.parentNode; // the row to be removed
    tr.parentNode.remove(tr);
}
function gerarNovo(){
    $.ajax({
        url: 'geraNovoNumero.php',
        async:false,
        type: 'POST',
        data: {comando1:'diariaNova'},
        dataType:'text',
        done: function () {
            alert("feito");
        },
        success: function (resultado) {
            //console.log(resultado);
            if (resultado>0){
                var obj = document.getElementById("diariaNumero");
                //obj.removeAttribute("disabled");
                obj.value=resultado;

                obj= document.getElementById("novo");
                obj.setAttribute('disabled', '');

                obj= document.getElementById("pesquisar");
                obj.setAttribute('disabled', '');

                obj = document.getElementById("diariaData");
                obj.removeAttribute("disabled");
                colocarHojeNaData();

                obj = document.getElementById("origem");
                obj.removeAttribute("disabled");
                obj.value="0";

                obj = document.getElementById("numTalao");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("buscaEndereco");
                obj.removeAttribute("disabled");
                
                obj = document.getElementById("logradouro");
                obj.value="";
                obj = document.getElementById("bairro");
                obj.value="";
                obj = document.getElementById("numEndereco");
                obj.value="";

                obj = document.getElementById("ocorrencia");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("tipoServico");
                obj.removeAttribute("disabled");
                obj.value="0";

                obj = document.getElementById("tipoAtividade");
                obj.removeAttribute("disabled");
                obj.value="0";

                obj = document.getElementById("incluirNaLista");
                obj.removeAttribute("disabled");

                obj = document.getElementById("tipoMaterial");
                obj.removeAttribute("disabled");
                obj.value="0";

                obj = document.getElementById("quantidadeMaterial");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("retirada");
                obj.removeAttribute("disabled");
                obj.value=false;

                obj = document.getElementById("pmsbc");
                obj.removeAttribute("disabled");
                obj.value=false;

                obj = document.getElementById("consorcio");
                obj.removeAttribute("disabled");
                obj.value=false;

                obj = document.getElementById("incluirNaListaMaterial");
                obj.removeAttribute("disabled");

                obj = document.getElementById("horaRecebeu");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("horaChegou");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("horaInicio");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("horaFim");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("veiculo");
                obj.removeAttribute("disabled");
                obj.value="0";

                obj = document.getElementById("kmInicial");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("kmFinal");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("obs");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("salvar");
                obj.removeAttribute("disabled");
                //alert("Salvo!!");
            }
            else{
                alert("Errro ao salvar");
            }
        },
        fail: function(){
            alert("falha");
        },
        error: function(){
            alert("error");
        }
    });
}
function colocarHojeNaData(){
        var now = new Date();
     
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
    
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    
    
       $('#diariaData').val(today);
}
function enviarForm(){
    var table = document.getElementById("tabelaAtividade");
    var contador =0;
    var contadorErro=0;
    for (let i in table.rows) {
        let row = table.rows[i]
        //iterate through rows
        //rows would be accessed using the "row" variable assigned in the for loop
        for (let j in row.cells) {
            let col = row.cells[j]
            if (col.innerText==="Monitoramento via Central"){
                contador=1;
                break;
            }
            //iterate through columns
            //columns would be accessed using the "col" variable assigned in the for loop
        }  
        if (contador==1){
            break;
        }
    }
    if (contador==1 && document.getElementById('veiculo').value=="0"){
        //alert("Como não foi exercida a atividade 'Monitoramento via Central' é necessário selecionar o veículo utilizado");
        document.getElementById('veiculo').style.border = "3px solid #FF0000"
        contadorErro+=1;
    }
    else{
        document.getElementById('veiculo').style.border = "1px solid #ced4da"
    }
    if (parseInt(document.getElementById('veiculo').value) > 0 && (document.getElementById('kmInicial').value=='' || parseInt(document.getElementById('kmInicial').value) < 1 || document.getElementById('kmInicial').value==' ' || isNaN(parseInt(document.getElementById('kmInicial').value)) || (parseInt(document.getElementById('kmInicial').value)>parseInt(document.getElementById('kmFinal').value)))){
        //alert("Como não foi exercida a atividade 'Monitoramento via Central' é necessário selecionar o veículo utilizado e informar as quilometragens");
        document.getElementById('kmInicial').style.border = "3px solid #FF0000"
        contadorErro+=1;
    }
    else{
        document.getElementById('kmInicial').style.border = "1px solid #ced4da";
    }
    if(parseInt(document.getElementById('veiculo').value) > 0 && (document.getElementById('kmFinal').value=="" || parseInt(document.getElementById('kmFinal').value) < 1 || document.getElementById('kmFinal').value==' ' || isNaN(parseInt(document.getElementById('kmFinal').value))|| (parseInt(document.getElementById('kmFinal').value)<parseInt(document.getElementById('kmInicial').value)))){
        document.getElementById('kmFinal').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('kmFinal').style.border = "1px solid #ced4da";
    }
    
    if (document.getElementById('logradouro').innerText==''){
        //alert("Digite o endereço do local");
        document.getElementById('buscaEndereco').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('kmFinal').style.border = "none";
    }
    if (document.getElementById('origem').value=='0'){
        //alert("Selecione a origem da ocorrência");
        document.getElementById('origem').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('origem').style.border = "1px solid #ced4da";
    }
    if (isNaN(parseInt(document.getElementById('horaInicio').value))){
        //alert("Preencha o Horário que o serviço foi iniciado");
        document.getElementById('horaInicio').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('horaInicio').style.border = "1px solid #ced4da";
    }
    if (isNaN(parseInt(document.getElementById('horaFim').value))){
        //alert("Preencha o Horário que o serviço foi finalizado");
        document.getElementById('horaFim').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('horaFim').style.border = "1px solid #ced4da";
    }
    if(contadorErro>0){
        alert("Erro no preenchimento\nCorriga os campos destacados em vermelho");
    }
    else{
        //var form = document.getElementById("formulario");

        //form.submit();
    }
    
}
function buscarEndereco(enderecoDigitado){
    $.ajax({
        url: 'buscarEndereco.php',
        async:false,
        type: 'POST',
        data: {endereco: enderecoDigitado},
        dataType:'text',
        done: function () {
            alert("feito");
        },
        success: function (resultado) {
            //console.log(resultado);
            if (resultado!="Não encontrado"){
                var tabelaEndereco = document.getElementById('tabelaResultadoEndereco').getElementsByTagName('tbody')[0];
                tabelaEndereco.innerHTML=resultado;
            }
            else{
                alert("Endereço não encontrado.\nTente digitar apenas parte do nome");
            }
        },
        fail: function(){
            alert("falha");
        },
        error: function(){
            alert("error");
        }
    });
}