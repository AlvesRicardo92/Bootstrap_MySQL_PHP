/*!
* Start Bootstrap - Bare v5.0.7 (https://startbootstrap.com/template/bare)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-bare/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
function inserirLinhaTabela(descricao) {
    if (document.getElementById('tipoServico').value===""){
        alert("Selecione um tipo de serviço");
    }
    else{
        var tbodyRef = document.getElementById('tabelaServico').getElementsByTagName('tbody')[0];

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

        document.getElementById('tipoServico').value="";
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
    if (document.getElementById('tipoMaterial').value===""){
        alert("Selecione um tipo de material");
    }
    else if(document.getElementById('quantidadeMaterial').value===""){
        alert("Digite a quantidade de material utilizada");
    }
    else if(!document.getElementById('pmsbc').checked && !document.getElementById('consorcio').checked){
        alert("Informe se o material utilizado é da prefeitura ou do consórcio");
    }
    else{
        if(document.getElementById('pmsbc').checked){
            valorRadio="PMSBC";
        }
        else if(document.getElementById('consorcio').checked){
            valorRadio="Consórcio";
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
        newText = document.createTextNode(quantidade);
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

        document.getElementById('tipoMaterial').value="";
        document.getElementById('quantidadeMaterial').value="";
        document.getElementById('pmsbc').checked=false;
        document.getElementById('consorcio').checked=false;
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
                obj.value="";

                obj = document.getElementById("incluirNaLista");
                obj.removeAttribute("disabled");

                obj = document.getElementById("tipoMaterial");
                obj.removeAttribute("disabled");
                obj.value="";

                obj = document.getElementById("quantidadeMaterial");
                obj.removeAttribute("disabled");
                obj.value="";

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
    var form = document.getElementById("formulario");

    form.submit();
}